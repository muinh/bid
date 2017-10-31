<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Замовлення';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Додати замовлення', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'order_id',
            [
                'attribute' => 'status',
                'value' => function($data) {
                    return !$data->status ?
                        '<span class="text-danger">Активний</span>' :
                        '<span class="text-success">Виконаний</span>';
                },
                'format' => 'html',

            ],
            'customer_id',
            'quantity',
            'amount',
            // 'status',
            // 'name',
            // 'email:email',
            // 'phone',
            // 'address',
             'created_at',
             'modified_at',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
