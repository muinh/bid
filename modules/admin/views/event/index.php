<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Події';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Додати подію', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'event_id',
            'title',
            [
                'attribute' => 'category_id',
                'value' => function ($data) {
                    return $data->category->title;
                },
            ],
            'image',
            'price',
            'bid',
            [
                'attribute' => 'is_published',
                'value' => function($data) {
                   return !$data->is_published ? '<span class="text-danger">Ні</span>' : '<span class="text-success">Так</span>';
                },
                'format' => 'html'
            ],
            [
                'attribute' => 'is_featured',
                'value' => function($data) {
                    return !$data->is_featured ? '<span class="text-danger">Ні</span>' : '<span class="text-success">Так</span>';
                },
                'format' => 'html'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
