<?php

namespace app\modules\admin\models;

/**
 * This is the model class for table "order".
 *
 * @property integer $order_id
 * @property integer $customer_id
 * @property integer $quantity
 * @property string $amount
 * @property integer $status
 * @property string $name
 * @property string $email
 * @property integer $phone
 * @property string $address
 * @property string $created_at
 * @property string $modified_at
 *
 * @property OrderItems[] $orderItems
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::className(), ['order_id' => 'order_id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'quantity', 'status', 'phone'], 'integer'],
            [['quantity', 'amount', 'name', 'email', 'phone', 'created_at', 'modified_at'], 'required'],
            [['amount'], 'number'],
            [['created_at', 'modified_at'], 'safe'],
            [['name', 'email', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Номер замовлення',
            'customer_id' => 'Номер клієнта',
            'quantity' => 'Кількість',
            'amount' => 'Сума',
            'status' => 'Статус',
            'name' => 'Ім`я',
            'email' => 'Електронна адреса',
            'phone' => 'Телефон',
            'address' => 'Адреса',
            'created_at' => 'Дата створення',
            'modified_at' => 'Дата модифікації',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
}
