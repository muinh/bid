<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Користувачі';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Додати користувача', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'email',
            'created_at',
            'updated_at',
            [
                    'attribute' => 'isAdmin',
                    'value' => function($data) {
                        return !$data->isAdmin ?
                            '<span class="text-danger">Ні</span>' :
                            '<span class="text-success">Так</span>';
                    },
                    'format' => 'html',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
