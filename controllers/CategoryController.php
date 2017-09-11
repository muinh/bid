<?php

namespace app\controllers;
use Yii;
use yii\web\HttpException;

use app\models\Category;
use app\models\Event;


class CategoryController extends AppController
{
    public function actionIndex()
    {
        $featured = Event::find()->where(['is_featured' => 1])->all();
        return $this->render('index', compact('featured'));
    }

    public function actionView($id)
    {
        $category = Category::findOne($id);
        if(empty($category)) {
            throw new HttpException(404, 'Такой категории не существует.');
        }

        $events = Event::find()->where(['category_id' => $id])->all();
        return $this->render('view', compact('events'));
    }
}