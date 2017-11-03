<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Напишіть нам';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Дякуємо за Ваше звернення. Найближчим часом ми надамо відповідь.
        </div>

    <?php else: ?>
        <div class="row b-contact-form__container">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name', ['inputOptions' => ['placeholder' => 'Тарас Шевченко']])->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email', ['inputOptions' => ['placeholder' => 'kobzar1840@gmail.com']]) ?>

                    <?= $form->field($model, 'subject', ['inputOptions' => ['placeholder' => 'Мій відгук щодо роботи сервіса']]) ?>

                    <?= $form->field($model, 'body', ['inputOptions' => ['placeholder' => 'Хлопці, ви неперевершені. Так тримати!']])->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Надіслати повідомлення', ['class' => 'btn btn-success btn-send', 'name' => 'contact-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
            <div class="b-main-content__contact-form-text">
                <ul class="b-contact-form-text">
                    <li class="alert alert-info b-contact-form-text__item">Чому Вам сподобався сервіс або, навпаки, чим він не сподобався?</li>
                    <li class="alert alert-warning b-contact-form-text__item">Що необхідно покращити чи додати або просто якщо Ви знайшли помилку в роботі сайту.</li>
                    <li class="alert alert-info b-contact-form-text__item">Пишіть, у випадку, якщо виникли труднощі із користанням сервісом.<em><br> Проте, спочатку радимо прочитати Інструкцію з користування.</em></li>
                    <li class="alert alert-warning b-contact-form-text__item">Надсилайте Ваші цікаві пропозиції щодо співпраці.</li>
                    <li class="alert alert-info b-contact-form-text__item">Якщо необхідно зв'язатись із веб-розробником сторінки.</li>
                </ul>
            </div>
        </div>

    <?php endif; ?>
</div>
