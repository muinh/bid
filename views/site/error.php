<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<section class="b-main-content">
    <div class="site-error">
        <h1><?= Html::encode($this->title) ?></h1>
        <div class="alert alert-danger">
            <?= nl2br(Html::encode($message)) ?>
        </div>
        <p>
            Во время обработки запроса произошла ошибка.
        </p>
        <p>
            Вернуться на <a href="<?= \yii\helpers\Url::to(['/'])?>">главную страницу</a>.
        </p>
    </div>
</section>
