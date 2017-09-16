<?php

namespace app\controllers;
use PHPUnit\Framework\Exception;
use Yii;

use app\models\Category;
use app\models\Event;

class EventController extends AppController
{
    public function actionView($id)
    {
        $event = Event::findOne($id);
        if (empty($event)) {
            throw new \yii\web\HttpException(404, 'Такого события не существует :(');
        }
        return $this->render('view', compact('event'));
    }
}