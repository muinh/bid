<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
?>
<?php if(!empty($featured)): ?>
<section class="b-main-content">
    <?php foreach($featured as $feature): ?>
    <article class="b-main-content__article">
        <div class="b-article-pic">
            <?= Html::img("@web/images/events/{$feature->image}", ['alt' => $feature->title, 'class' => 'b-article-pic__image']) ?>
        </div>
        <div class="b-article-wrap">
            <div class="b-article-meta">
                <div class="b-article-meta__info">
                    <span class="b-meta-text"><?php echo $feature->date; ?></span>
                    <span class="b-meta-text"><?php echo $feature->place; ?></span>
                    <span class="b-meta-text"><?php echo $feature->city; ?></span>
                </div>
            </div>
            <div class="b-article-about">
                <div class="b-article-about__header">
                    <h2 class="b-about-header"><?php echo $feature->title; ?></h2>
                </div>
                <div class="b-article-about__text">
                    <p class="b-about-content">
                        <span><?php echo $feature->description; ?></span>
                    </p>
                </div>
            </div>
            <div class="b-article-buttons">
                <div class="b-article-about__bid">
                    <button class="btn btn-lg btn-warning bid-ticket">bid <?php echo $feature->bid; ?>₴</button>
                </div>
                <div class="b-article-about__buy">
                    <button class="btn btn btn-lg btn-info buy-ticket">buy <?php echo $feature->price; ?>₴</button>
                </div>
            </div>
        </div>
    </article>
    <?php endforeach; ?>
<?php endif; ?>
</section>
