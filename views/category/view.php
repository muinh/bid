<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;

?>
<?php if(!empty($events)): ?>
<section class="b-main-content">
    <?php foreach($events as $event): ?>
    <article class="b-main-content__article">
        <div class="b-article-pic">
            <?=
                Html::a(
                    Html::img("@web/images/events/{$event->image}",
                    ['alt' => $event->title, 'class' => 'b-article-pic__image']),
                ['event/view', 'id' => $event->event_id]);
            ?>
        </div>
        <div class="b-article-wrap">
            <div class="b-article-meta">
                <div class="b-article-meta__info">
                    <span class="b-meta-text"><?= $event->date ?></span>
                    <span class="b-meta-text"><?= $event->place ?></span>
                    <span class="b-meta-text"><?= $event->city ?></span>
                </div>
            </div>
            <div class="b-article-about">
                <div class="b-article-about__header">
                    <h2 class="b-about-header">
                        <?= Html::a($event->title, ['event/view', 'id' => $event->event_id]); ?>
                    </h2>
                </div>
                <div class="b-article-about__text">
                    <p class="b-about-content">
                        <span><?= $event->description ?></span>
                    </p>
                </div>
            </div>
            <div class="b-article-buttons">
                <div class="b-article-about__bid">
                    <a class="btn btn-lg btn-warning bid-ticket">
                        <i class="fa fa-trophy" aria-hidden="true"></i>
                         <?= $event->bid ?>₴
                    </a>
                </div>
                <div class="b-article-about__buy">
                    <a href="<?= Url::to(['cart/add', 'id' => $event->event_id]) ?>" data-id="<?= $event->event_id ?>" class="btn btn btn-lg btn-info add-to-cart">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <?= $event->price; ?>₴
                    </a>
                </div>
            </div>
        </div>
    </article>
    <?php endforeach; ?>
<?php else: ?>
    <section class="b-main-content"
        <h2>There are no events in here!</h2>
    </section>
<?php endif; ?>
</section>
