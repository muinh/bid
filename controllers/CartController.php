<?php

namespace app\controllers;
use Yii;
use app\models\Event;
use app\models\Cart;


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
        return $this->render('view');
    }
}