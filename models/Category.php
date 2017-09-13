<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\helpers\Html;

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return 'category';
    }

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

    public static function renderCategories() 
    {
        $categories = self::getCategories();
        foreach($categories as $category) {
            ?>
                <li class="b-categories__item b-categories__<?= $category["name"]; ?>">
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

        //set categories cached
        Yii::$app->cache->set('catCached', $categories, 60);
    }

    public function getEvents() 
    {
        return $this->hasMany(Event::className(), ['category_id' => 'category_id']);
    }
}
