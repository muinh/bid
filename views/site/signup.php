<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Реєстрація';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Заповніть наведені поля для реєстрації:</p>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <?= $form->field($model, 'username') ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'first_name') ?>
            <?= $form->field($model, 'last_name') ?>
            <?= $form->field($model, 'date_of_birth') ?>
            <?= $form->field($model, 'phone') ?>
            <?= $form->field($model, 'city') ?>
            <?= $form->field($model, 'address') ?>
            <div class="form-group">
                <?= Html::submitButton('Надіслати форму', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
            <div>
                <?= Html::a('Забув пароль?', ['/reset-password']) ?>
            </div>
            <div>
                <?= Html::a('Вхід в обліковий запис', ['/login']) ?>
            </div>
        </div>
    </div>
</div>