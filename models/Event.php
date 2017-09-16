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

    public static function renderDescription($event)
    {
        $desc = mb_substr($event->description, 0, 300);
        $desc = rtrim($desc, "!,.-");
        $desc = substr($desc, 0, strrpos($desc, ' ')) . '...';
        return $desc;
    }
}