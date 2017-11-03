<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

use app\models\User;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Замовлення', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1>Детали замовлення №<?= $model->order_id ?></h1>

    <p>
        <?= Html::a('Оновити', ['update', 'id' => $model->order_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->order_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Ви впевнені, що хочете видалити замовлення?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'order_id',
            'customer_id',
            'quantity',
            'amount',
            [
                'attribute' => 'status',
                'value' => !$model->status ?
                    '<span class="text-danger">Активний</span>' :
                    '<span class="text-success">Виконаний</span>',
                'format' => 'html',
            ],
            [
                'attribute' => 'name',
                'value' => function($data) {
                    if ($data->customer_id != null) {
                        $user = User::find()->where(['id' => $data->customer_id])->one();
                        return $user->first_name;
                    }
                    return $data->name;
                },
                'format' => 'html',
            ],
            [
                'attribute' => 'email',
                'value' => function($data) {
                    if ($data->customer_id != null) {
                        $user = User::find()->where(['id' => $data->customer_id])->one();
                        return $user->email;
                    }
                    return $data->email;
                },
                'format' => 'html',
            ],
            [
                'attribute' => 'phone',
                'value' => function($data) {
                    if ($data->customer_id != null) {
                        $user = User::find()->where(['id' => $data->customer_id])->one();
                        return $user->phone;
                    }
                    return $data->phone;
                },
                'format' => 'html',
            ],
            [
                'attribute' => 'address',
                'value' => function($data) {
                    if ($data->customer_id != null) {
                        $user = User::find()->where(['id' => $data->customer_id])->one();
                        return $user->address;
                    }
                    return $data->address;
                },
                'format' => 'html',
            ],
            'created_at',
            'modified_at',
        ],
    ]) ?>

    <?php $events = $model->orderItems; ?>
    <div class="b-order-container col-md-12">
        <div class="tabbable-panel">
            <div class="tabbable-line">
                <ul class="nav nav-tabs ">
                    <li class="active b-tab">
                        <h3 class="cart-title">Список квитків:</h3>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_default_3">
                        <div id="cart">
                            <div class="cart-container">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>Назва</th>
                                            <th>Кількість</th>
                                            <th>Ціна</th>
                                            <th>Сума</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($events as $event): ?>
                                            <tr>
                                                <td><a class="site-standard__link" href="<?= Url::to(['/event/view', 'id' => $event['id']]) ?>"><?= $event['name'] ?></a></td>
                                                <td><?= $event['quantity'] ?></td>
                                                <td><?= $event['price'] ?></td>
                                                <td><?= $event['amount'] ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
