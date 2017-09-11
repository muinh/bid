<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<section class="b-main-content">
    <article style="display: flex; margin-top: 17px">
        <div class="b-article-pic">
            <?= Html::img("@web/images/events/$event->image", ['alt' => $event->title, 'width' => 270, 'height' => 381]); ?>
        </div>
        <div class="b-article-wrap" style="margin: 0 5%">
            <div class="b-article-meta">
                <div class="b-article-meta__info">
                    <span class="b-meta-text"><?= $event->date; ?></span>
                    <span class="b-meta-text"><?= $event->place; ?></span>
                    <span class="b-meta-text"><?= $event->city; ?></span>
                </div>
            </div>
            <div class="b-article-about">
                <div class="b-article-about__header">
                    <h2 class="b-about-header"><?= $event->title; ?></h2>
                </div>
                <div class="b-article-about__text">
                    <p class="b-about-content">
                        <span><?= $event->description; ?></span>
                    </p>
                </div>
            </div>
            <input class="b-set-quantity" type="text" value="1" />
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Призовой фонд<span style="background-color:#5cb85c" class="badge badge-success">2 билета</span></li>
                    <li class="list-group-item">Размер ставки<span style="background-color:#5cb85c" class="badge badge-success"><?= $event->bid; ?> грн</span></li>
                    <li class="list-group-item">
                        <span>Участники</span><span style="background-color:#5cb85c" class="badge badge-success">5 / 20</span>
                        <div class="progress" style="margin: 5px 0 0px 0;">
                            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 25%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </li><br>
                    <li class="list-group-item"><input type="checkbox">  С правилами ознакомлен<span style="background-color:#5cb85c" class="badge badge-success">Правила</span></li>
                </ul>
            </div>
            <div class="b-article-buttons">
                <div class="b-article-about__bid">
                    <a class="btn btn-lg btn-warning bid-ticket">
                        <i class="fa fa-trophy" aria-hidden="true"></i>
                        <?= $event->bid ?>₴
                    </a>
                </div>
                <div class="b-article-about__buy">
                    <a data-id="<?= $event->event_id ?>" class="btn btn btn-lg btn-info add-to-cart">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <?= $event->price; ?>₴
                    </a>
                </div>
            </div>
        </div>
    </article>
</section>
