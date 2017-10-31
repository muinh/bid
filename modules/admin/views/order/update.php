<?php

$this->title = 'Оновити замовлення: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Замовлення', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->order_id]];
$this->params['breadcrumbs'][] = 'Оновити';
?>
<div class="order-update">

    <h1>Оновити замовлення №<?= $model->order_id ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
