<?php

namespace app\controllers;

use yii\web\Controller;
use yii\web\HttpException;
use yii\web\Response;

use app\models\Event;

class EventController extends Controller
{
    /**
     * Displays event page with special id.
     *
     * @param $id
     * @return Response|string
     * @throws HttpException
     */
    public function actionView($id)
    {
        $event = Event::findOne($id);
        if (empty($event)) {
            throw new HttpException(404, 'Така подія не існує :(');
        }
        return $this->render('view', compact('event'));
    }
}