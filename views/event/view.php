<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<section class="b-main-content">
    <article class="b-main-content__container">
        <div class="b-article-pic b-article-event-pic">
            <?= Html::img("@web/images/events/$event->image", ['alt' => $event->title, 'width' => 350, 'height' => 496]); ?>
        </div>
        <div class="b-article-wrap">
            <div class="b-article-about">
                <div class="b-article-about__header">
                    <h2 class="b-about-header-event"><?= $event->title; ?></h2>
                </div>
                <div class="b-article-about__text">
                    <p class="b-about-content b-about-content-desc">
                        <span><?= $event->description; ?></span>
                    </p>
                </div>
            </div>
            <div class="b-article-details">
                <ul class="list-group list-group-flush list-padding">
                    <li class="list-group-item">Дата події
                        <span class="badge badge-success list-group-item__order-badge">
                            <?= $event->date; ?>
                        </span>
                    </li>
                    <li class="list-group-item">Місце проведення
                        <span class="badge badge-success list-group-item__order-badge">
                            <?= $event->place; ?>
                        </span>
                    </li>
                    <li class="list-group-item">Місто
                        <span class="badge badge-success list-group-item__order-badge">
                            <?= $event->city; ?>
                        </span>
                    </li>
                    <li class="list-group-item order-qty">Вкажіть кількість квитків
                        <span class="order-qty__right">
                            <input class="form-control b-set-quantity order-qty__dimensions" type="number" value="1"  min="1" max="20">
                        </span>
                    </li>
                </ul>
            </div>
            <div class="b-article-buttons">
                <div class="b-article-about__bid">
                    <a class="btn btn-lg btn-warning bid-ticket">
                        <i class="fa fa-trophy"></i> <?= $event->bid ?>₴</a>
                </div>
                <div class="b-article-about__buy">
                    <a href="<?= Url::to(['cart/add', 'id' => $event->event_id]) ?>"
                       data-id="<?= $event->event_id ?>"
                       class="btn btn-lg btn-info buy-ticket add-to-cart">
                        <i class="fa fa-shopping-cart"></i> <?= $event->price ?>₴</a>
                </div>
            </div>
        </div>
    </article>
    <article class="b-main-content__comments">
        <h3 class="b-main-content__comments-header">Коментарі</h3>
    </article>
</section>
