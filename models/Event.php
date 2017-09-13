<?php

namespace app\models;
use yii\db\ActiveRecord;

class Event extends ActiveRecord
{
    public static function tableName()
    {
        return 'event';
    }

    public function getCategory() {
        return $this->hasOne(Category::className(), ['category_id' => 'category_id']);
    }
}