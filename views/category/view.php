<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

use app\models\Event;

?>
<?php if (!empty($events)): ?>
<section class="b-main-content">
    <?php foreach ($events as $event): ?>
        <article class="b-main-content__article b-main-content__article-<?= $event->category_id ?>">
            <div class="b-article-pic">
                <?=
                Html::img("@web/images/events/{$event->image}",
                    ['alt' => $event->title, 'class' => 'b-article-pic__image']);
                ?>
                <a class="b-article-pic__link" href="<?= Url::to(['event/view', 'id' => $event->event_id]) ?>">
                    <div class="b-article-block b-article-block-<?= $event->category_id; ?>">
                        <div class="b-article-wrap">
                            <div class="b-article-details">
                                <div class="b-article-details__info">
                                    <span class="b-details-text"><?= $event->date; ?></span>
                                    <span class="b-details-text"><?= $event->place; ?></span>
                                    <span class="b-details-text"><?= $event->city; ?></span>
                                </div>
                            </div>
                            <div class="b-article-about">
                                <div class="b-article-about__header">
                                    <h2 class="b-about-header-inlist"><?= $event->title; ?></h2>
                                </div>
                                <div class="b-article-about__text">
                                    <p class="b-about-content">
                                        <p class="b-about-content__paragraph">
                                            <?= Event::renderDescription($event); ?>
                                        </p>
                                    </p>
                                </div>
                            </div>
                            <div class="b-article-buttons">
                                <div class="b-article-about__bid">
                                    <a class="btn btn-lg btn-warning bid-ticket">
                                        <i class="fa fa-trophy" aria-hidden="true"></i> <?= $event->bid ?>₴
                                    </a>
                                </div>
                                <div class="b-article-about__buy">
                                    <a href="<?= Url::to(['cart/add', 'id' => $event->event_id]) ?>"
                                       data-id="<?= $event->event_id ?>"
                                       class="btn btn btn-lg btn-info buy-ticket add-to-cart">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> <?= $event->price ?>₴
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </article>
    <?php endforeach; ?>
    <?php else: ?>
        <section class="b-main-content">
            <h3 class="b-main-content__cat-empty">В цій категорії подій немає</h3>
        </section>
    <?php endif; ?>
</section>
