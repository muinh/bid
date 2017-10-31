<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Відновлення пароля';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container site-request-password-reset">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Будь-ласка, вкажіть вашу електронну адресу. Вам буде надіслано лист із посиланням для відновлення пароля.</p>
    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
            <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
            <div class="form-group">
                <?= Html::submitButton('Надіслати', ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>