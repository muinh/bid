<?php

namespace app\controllers;
use app\models\Category;
use app\models\Event;
use Yii;

class CategoryController extends AppController
{
    public function actionIndex()
    {
        $featured = Event::find()->where(['is_featured' => 1])->all();
        return $this->render('index', compact('featured'));
    }

    public function actionView($id)
    {
        $id = Yii::$app->request->get('id');
        $events = Event::find()->where(['category_id' => $id])->all();
        return $this->render('view', compact('events'));
    }
}