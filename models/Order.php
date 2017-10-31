<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

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
 */
class Order extends ActiveRecord
{
    /**
     * Returns the name of the table.
     *
     * @return string
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'modified_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['modified_at'],
                ],
                 'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * Returns all items from the order.
     *
     * @return string
     */
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
            'name' => 'Ім`я',
            'email' => 'Електронна адреса',
            'phone' => 'Телефон',
            'address' => 'Адреса',
        ];
    }
}
