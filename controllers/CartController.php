<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;

use app\models\Cart;
use app\models\Event;
use app\models\Order;
use app\models\OrderItems;


class CartController extends Controller
{
    /**
     * Displays pop-up window with detailed cart preview.
     * Adds extra event to the existed data.
     * Increases total amount in a sum of the added items.
     *
     * @return Response|boolean|string
     */
    public function actionAdd()
    {
        $id = Yii::$app->request->get('id');
        $qty = Yii::$app->request->get('qty');
        $qty = !$qty ? 1 : $qty;
        $event = Event::findOne($id);

        if (empty($event)) return false;

        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($event, $qty);
        if (!Yii::$app->request->isAjax) {
            return $this->redirect(Yii::$app->request->referrer);
        }

        $this->layout = false;
        return $this->render('preview', compact('session'));
    }

    /**
     * Displays pop-up window with empty cart.
     *
     * @return Response|string
     */
    public function actionClear()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qtyTotal');
        $session->remove('cart.amount');
        $this->layout = false;
        return $this->render('preview', compact('session'));
    }

    /**
     * Displays pop-up window with deleted event.
     * Decreases the total amount of items in cart
     * on the value of deleted items.
     *
     * @return Response|string
     */
    public function actionDelete()
    {
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->renderCart($id);
        $this->layout = false;
        return $this->render('preview', compact('session'));
    }

    /**
     * Displays pop-up window with detailed cart preview.
     *
     * @return Response|string
     */
    public function actionShow()
    {
        $session = Yii::$app->session;
        $session->open();
        $this->layout = false;
        return $this->render('preview', compact('session'));
    }

    /**
     * Displays detailed cart preview with opportunity
     * to send order.
     *
     * @return mixed
     */
    public function actionView()
    {
        $session = Yii::$app->session;
        $session->open();
        $order = new Order();
        if ($order->load(Yii::$app->request->post())) {
            $order->quantity = $session['cart.qtyTotal'];
            $order->amount = $session['cart.amount'];
            if ($order->save()) {
                OrderItems::saveOrderItems($session['cart'], $order->order_id);
                Yii::$app->session->setFlash('success', 'Ваше замовлення прийнято. 
               Всю інформацію відносно отримання квитків надіслано на вказану електронну адресу.');
                Yii::$app->mailer->compose('sendorder', ['session' => $session])
                    ->setFrom(['dmytropopov.ua@gmail.com' => 'bid.ua'])
                    ->setTo($order->email)
                    ->setSubject('Замовлення квитків на bid.ua успішно завершено.')
                    ->send();
                $session->remove('cart');
                $session->remove('cart.qtyTotal');
                $session->remove('cart.amount');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Помилка оформлення замовлення.
               Спробуйте ще раз або напишіть менеджеру через форму зворотнього зв`язку.');
            }
        }

        return $this->render('view', compact('session', 'order'));
    }
}