<?php

use yii\helpers\Html;

$this->title = 'Додати подію: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Події', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->event_id]];
$this->params['breadcrumbs'][] = 'Оновити';
?>
<div class="event-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
