<?php

namespace app\models;
use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
    public function addToCart($event, $qty = 1)
    {
        if(isset($_SESSION['cart'][$event->event_id])){
            $_SESSION['cart'][$event->event_id]['qty'] += $qty;
        } else {
            $_SESSION['cart'][$event->event_id] = [
                'name' => $event->title,
                'qty' => $qty,
                'price' => $event->price,
                'img' => $event->image
            ];
        }
        $_SESSION['cart.qtyTotal'] = isset($_SESSION['cart.qtyTotal']) ? $_SESSION['cart.qtyTotal'] + $qty : $qty;
        $_SESSION['cart.amount'] = isset($_SESSION['cart.amount']) ? $_SESSION['cart.amount'] + $qty * $event->price : $qty * $event->price;
    }

    public function renderCart($id)
    {
        if(!isset($_SESSION['cart'][$id])) return false;
        $_SESSION['cart.qtyTotal'] -= $_SESSION['cart'][$id]['qty'];
        $_SESSION['cart.amount'] -= $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
        unset($_SESSION['cart'][$id]);
    }
}