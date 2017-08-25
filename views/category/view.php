<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
?>

<?php if(!empty($events)): ?>
    <section class="b-main-content">
    <?php foreach($events as $event): ?>
        <article class="b-main-content__article">
            <div class="b-article-pic">
                <?= Html::img("@web/images/events/{$event->image}", ['alt' => $event->title, 'class' => 'b-article-pic__image']) ?>
            </div>
            <div class="b-article-wrap">
                <div class="b-article-meta">
                    <div class="b-article-meta__info">
                        <span class="b-meta-text"><?= $event->date ?></span>
                        <span class="b-meta-text"><?= $event->place ?></span>
                        <span class="b-meta-text"><?= $event->date ?></span>
                    </div>
                </div>
                <div class="b-article-about">
                    <div class="b-article-about__header">
                        <h2 class="b-about-header"><?= $event->title ?></h2>
                    </div>
                    <div class="b-article-about__text">
                        <p class="b-about-content">
                            <span><?= $event->description ?></span>
                        </p>
                    </div>
                </div>
                <div class="b-article-buttons">
                    <div class="b-article-about__bid">
                        <button class="btn btn-lg btn-warning bid-ticket">bid <?= $event->bid ?>₴</button>
                    </div>
                    <div class="b-article-about__buy">
                        <button class="btn btn btn-lg btn-info buy-ticket">buy <?= $event->price ?>₴</button>
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
