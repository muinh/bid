<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;

?>
<?php if(!empty($featured)): ?>
<section class="b-main-content">
    <?php foreach($featured as $feature): ?>
    <article class="b-main-content__article">
        <div class="b-article-pic">
            <?=
                Html::a(
                    Html::img("@web/images/events/{$feature->image}",
                    ['alt' => $feature->title, 'class' => 'b-article-pic__image']),
                ['event/view', 'id' => $feature->event_id]);
            ?>
        </div>
        <div class="b-article-wrap">
            <div class="b-article-meta">
                <div class="b-article-meta__info">
                    <span class="b-meta-text"><?= $feature->date; ?></span>
                    <span class="b-meta-text"><?= $feature->place; ?></span>
                    <span class="b-meta-text"><?= $feature->city; ?></span>
                </div>
            </div>
            <div class="b-article-about">
                <div class="b-article-about__header">
                    <h2 class="b-about-header">
                        <?= Html::a($feature->title, ['event/view', 'id' => $feature->event_id]); ?>
                    </h2>
                </div>
                <div class="b-article-about__text">
                    <p class="b-about-content">
                        <span><?= $feature->description; ?></span>
                    </p>
                </div>
            </div>
            <div class="b-article-buttons">
                <div class="b-article-about__bid">
                    <a class="btn btn-lg btn-warning bid-ticket">
                        <i class="fa fa-trophy" aria-hidden="true"></i>
                        <?= $feature->bid; ?>₴
                    </a>
                </div>
                <div class="b-article-about__buy">
                    <a href="<?= Url::to(['cart/add', 'id' => $feature->event_id]) ?>" data-id="<?= $feature->event_id ?>" class="btn btn btn-lg btn-info add-to-cart">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <?= $feature->price; ?>₴
                    </a>
                </div>
            </div>
        </div>
    </article>
    <?php endforeach; ?>
<?php endif; ?>
</section>
