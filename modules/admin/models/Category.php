<?php

namespace app\modules\admin\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "category".
 *
 * @property integer $category_id
 * @property string $name
 * @property string $title
 */
class Category extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'title'], 'required'],
            [['name', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Номер категорії',
            'name' => 'Аліас',
            'title' => 'Назва',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id']);
    }

    public static function getCategories()
    {
        return Category::find()->asArray()->all();
    }
}

