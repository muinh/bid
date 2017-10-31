<?php

namespace app\controllers;

use yii\web\Controller;
use yii\web\HttpException;
use yii\web\Response;

use app\models\Category;
use app\models\Event;


class CategoryController extends Controller
{
    /**
     * Displays all events with 'is_featured' flag in DB.
     *
     * @return Response|string
     */
    public function actionIndex()
    {
        $featured = Event::find()->where(['is_featured' => 1])->all();
        return $this->render('index', compact('featured'));
    }

    /**
     * Displays all events of the special category.
     *
     * @return Response|string
     */
    public function actionView($id)
    {
        $category = Category::findOne($id);
        if (empty($category)) {
            throw new HttpException(404, 'Така категорія не існує :(');
        }

        $events = Event::find()->where(['category_id' => $id])->all();
        return $this->render('view', compact('events'));
    }
}