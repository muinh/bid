<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;
?>
<section class="b-main-content bg-404">
    <div class="site-error">
        <h3 class="site-error__header"><?= nl2br(Html::encode($message)) ?></h3>
        <p class="site-error__message">
            Вернуться на <a class="site-standard__link" href="<?= Url::to(['/'])?>">главную страницу</a>.
        </p>
    </div>
</section>
