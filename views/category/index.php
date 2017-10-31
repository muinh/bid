<?php

use yii\helpers\Html;
use yii\helpers\Url;

use app\models\Event;

?>
<?php if (!empty($featured)): ?>
<section class="b-main-content">
    <?php foreach ($featured as $feature): ?>
        <article class="b-main-content__article b-main-content__article-<?= $feature->category_id ?>">
            <div class="b-article-pic">
                <?=
                Html::img("@web/images/events/{$feature->image}",
                    ['alt' => $feature->title, 'class' => 'b-article-pic__image']);
                ?>
                <a class="b-article-pic__link" href="<?= Url::to(['event/view', 'id' => $feature->event_id]) ?>">
                    <div class="b-article-block b-article-block-<?= $feature->category_id; ?>">
                        <div class="b-article-wrap">
                            <div class="b-article-details">
                                <div class="b-article-details__info">
                                    <span class="b-details-text"><?= $feature->date; ?></span>
                                    <span class="b-details-text"><?= $feature->place; ?></span>
                                    <span class="b-details-text"><?= $feature->city; ?></span>
                                </div>
                            </div>
                            <div class="b-article-about">
                                <div class="b-article-about__header">
                                    <h2 class="b-about-header-inlist"><?= $feature->title; ?></h2>
                                </div>
                                <div class="b-article-about__text">
                                    <p class="b-about-content">
                                        <p class="b-about-content__paragraph">
                                            <?= Event::renderDescription($feature); ?>
                                        </p>
                                    </p>
                                </div>
                            </div>
                            <div class="b-article-buttons">
                                <div class="b-article-about__bid">
                                    <a class="btn btn-lg btn-warning bid-ticket">
                                        <i class="fa fa-trophy" aria-hidden="true"></i> <?= $feature->bid ?>₴
                                    </a>
                                </div>
                                <div class="b-article-about__buy">
                                    <a href="<?= Url::to(['cart/add', 'id' => $feature->event_id]) ?>"
                                       data-id="<?= $feature->event_id ?>"
                                       class="btn btn btn-lg btn-info buy-ticket add-to-cart">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> <?= $feature->price ?>
                                        ₴
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </article>
    <?php endforeach; ?>
    <?php endif; ?>
</section>
