<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "order_items".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $product_id
 * @property string $name
 * @property string $price
 * @property integer $quantity
 * @property string $amount
 */

class OrderItems extends ActiveRecord
{
    /**
     * Returns the name of the table.
     *
     * @return string
     */
    public static function tableName()
    {
        return 'order_items';
    }

    /**
     * Returns order by id.
     *
     * @return string
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['order_id' => 'order_id']);
    }

    /**
     * Saves events from the order to the database.
     *
     * @param items
     * @param order_id
     *
     * @return void
     */
    public static function saveOrderItems($items, $order_id)
    {
        foreach ($items as $id => $item) {
            $order_items = new OrderItems();
            $order_items->order_id = $order_id;
            $order_items->product_id = $id;
            $order_items->name = $item['name'];
            $order_items->price = $item['price'];
            $order_items->quantity = $item['qty'];
            $order_items->amount = $item['price'] * $item['qty'];
            $order_items->save();
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'name', 'price', 'quantity', 'amount'], 'required'],
            [['order_id', 'product_id', 'quantity'], 'integer'],
            [['price', 'amount'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }
}
