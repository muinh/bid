<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Html;

class Category extends ActiveRecord
{
    /**
     * Returns the name of the table.
     *
     * @return string
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * Gets categories by id.
     * From cache or from database.
     *
     * @return string
     * */
    public static function getCategories()
    {
        //get cached categories
        $catCached = Yii::$app->cache->get('catCached');
        if ($catCached) {
            return $catCached;
        } else {
            return self::find()->indexBy('category_id')->asArray()->all();
        }
    }

    /**
     * Renders categories sidebar with
     * dynamic changing colors and names.
     *
     * @return void
     */
    public static function renderCategories() 
    {
        $categories = self::find()->indexBy('category_id')->asArray()->all();
        foreach($categories as $category) {
            ?>
                <li class="b-categories__item b-categories__<?= $category["name"]; ?> transition3">
                    <ul class="submenu">
                        <li>
                            <?= Html::a(
                                    Html::tag('span', mb_strtoupper($category["title"]),
                                    ['class' => 'b-categories__link']),
                                ['category/view', 'id' => $category['category_id']],
                                ['class' => [$category["name"], 'b-categories__alink']]
                            ) ?>
                        </li>
                    </ul>
                </li>
            <?php
        }
    }

    /**
     * Returns events from special category.
     *
     * @return string
     */
    public function getEvents() 
    {
        return $this->hasMany(Event::className(), ['category_id' => 'category_id']);
    }
}