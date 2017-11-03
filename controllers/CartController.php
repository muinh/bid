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
               Менеджер зв`яжеться із Вами найближчим часом.');
                return $this->redirect(['/cart/pay']);
            } else {
                Yii::$app->session->setFlash('error', 'Помилка оформлення замовлення.
               Спробуйте ще раз або напишіть менеджеру через форму зворотнього зв`язку.');
            }
        }

        return $this->render('view', compact('session', 'order'));
    }

    public function actionPay()
    {
        $session = Yii::$app->session;
        $session->open();

        $id = Yii::$app->user->id;
        $public_key = Yii::$app->params['public_key'];
        $private_key = Yii::$app->params['private_key'];

        $params = array(
            "public_key" => $public_key,
            "version" => "3",
            "action" => "pay",
            "amount" => $session['cart.amount'],
            "currency" => "UAH",
            "description" => date('dmy') . "___" . "id" . $id,
        );

        $json = json_encode($params);
        $data = base64_encode($json);
        $sign_string = $private_key . $data . $private_key;
        $signature = base64_encode( sha1( $sign_string, 1) );

        $session->remove('cart');
        $session->remove('cart.qtyTotal');
        $session->remove('cart.amount');

        return $this->render('pay', [
            'data' => $data,
            'signature' => $signature,
        ]);
    }
}