<?php

namespace app\modules\admin\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "event".
 *
 * @property integer $event_id
 * @property integer $category_id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $date
 * @property string $place
 * @property string $city
 * @property string $price
 * @property integer $bid
 * @property integer $is_published
 * @property integer $is_featured
 */
class Event extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event';
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['category_id' => 'category_id']);
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'title', 'description', 'image', 'date', 'place', 'city', 'price', 'bid', 'is_published', 'is_featured'], 'required'],
            [['category_id', 'bid', 'is_published', 'is_featured'], 'integer'],
            [['description'], 'string'],
            [['date'], 'safe'],
            [['price'], 'number'],
            [['title', 'image', 'place', 'city'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'event_id' => 'Номер події',
            'category_id' => 'Категорія',
            'title' => 'Назва',
            'description' => 'Опис',
            'image' => 'Назва файла листівки',
            'date' => 'Дата події',
            'place' => 'Місце проведення',
            'city' => 'Місто',
            'price' => 'Ціна',
            'bid' => 'Розмір ставки',
            'is_published' => 'Опублікована',
            'is_featured' => 'На головній',
        ];
    }
}
