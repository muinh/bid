<?php

namespace app\controllers;
use Yii;

use app\models\Event;
use app\models\Cart;
use app\models\Order;
use app\models\OrderItems;


class CartController extends AppController
{
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
        if(!Yii::$app->request->isAjax) {
            return $this->redirect(Yii::$app->request->referrer);
        }

        $this->layout = false;
        return $this->render('preview', compact('session'));
    }

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

    public function actionShow()
    {
        $session = Yii::$app->session;
        $session->open();
        $this->layout = false;
        return $this->render('preview', compact('session'));
    }

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
               Yii::$app->session->setFlash('success', 'Ваш заказ принят. 
               Вся информация относительно получения билетов отправлена на указанную почту.');
               Yii::$app->mailer->compose('sendorder', ['session' => $session])
                   ->setFrom(['dmytropopov.ua@gmail.com' => 'bid.ua'])
                   ->setTo($order->email)
                   ->setSubject('Заказ билетов на bid.ua успешно выполнен.')
                   ->send();
               $session->remove('cart');
               $session->remove('cart.qtyTotal');
               $session->remove('cart.amount');
               return $this->refresh();
           } else {
               Yii::$app->session->setFlash('error', 'Ошибка оформления заказа.
               Попробуйте еще раз или напишите менеджеру через форму обратной связи.');
           }
        }

        return $this->render('view', compact('session','order'));
    }
}