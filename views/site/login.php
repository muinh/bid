<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Вхід';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login container">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Для того, щоб ввійти заповніть поля:</p>
    <div class="row">
        <div class="col-md-12">
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'class' => 'login-form',
            ]); ?>

            <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox() ?>

            <div class="form-group">
                <div>
                    <?= Html::submitButton('Ввійти', ['class' => 'btn btn-primary btn-send', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

            <div>
                <?= Html::a('Забув пароль?', ['/reset-password']) ?>
            </div>
            <div>
                <?= Html::a('Немає аккаунта? Зареєструватись!', ['/signup']) ?>
            </div>
        </div>
    </div>
</div>