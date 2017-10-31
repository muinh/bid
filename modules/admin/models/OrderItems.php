<?php

namespace app\modules\admin\models;

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
 *
 * @property Order $order
 */
class OrderItems extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_items';
    }

    public function getOrder()
    {
        return $this->hasOne(Order::className(), [ 'order_id' => 'order_id']);
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
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'order_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер',
            'order_id' => 'Номер замовлення',
            'product_id' => 'Номер події',
            'name' => 'Назва',
            'price' => 'Ціна',
            'quantity' => 'Кількість',
            'amount' => 'Сума',
        ];
    }
}
