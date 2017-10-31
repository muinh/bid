<?php

namespace app\models;

use yii\db\ActiveRecord;

class Event extends ActiveRecord
{
    /**
     * Returns the name of the table.
     *
     * @return string
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * Returns the name of the category.
     *
     * @return string
     */
    public function getCategory() {
        return $this->hasOne(Category::className(), ['category_id' => 'category_id']);
    }

    /**
     * Trims event description to 300 characters in
     * order to make a preview for the event.
     *
     * @return string
     */
    public static function renderDescription($event)
    {
        $desc = mb_substr($event->description, 0, 300);
        $desc = rtrim($desc, "!,.-");
        $desc = substr($desc, 0, strrpos($desc, ' ')) . '...';
        return $desc;
    }
}