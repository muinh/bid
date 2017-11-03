<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Користувачі', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Оновити', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Ви впевнені, що хочете видалити користувача??',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'first_name',
            'last_name',
            'date_of_birth',
            'phone',
            'email:email',
            'city',
            'address',
            'created_at',
            'updated_at',
            [
                'attribute' => 'isAdmin',
                'value' => !$model->isAdmin ?
                    '<span class="text-danger">Ні</span>' :
                    '<span class="text-success">Так</span>',
                'format' => 'html',
            ],
        ],
    ]) ?>

</div>
