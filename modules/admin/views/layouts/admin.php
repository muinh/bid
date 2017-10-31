<?php

use yii\helpers\Html;
use yii\helpers\Url;

use app\assets\AppAsset;
use app\models\Category;
use app\models\User;

AppAsset::register($this);
?>

<?php $this->beginPage();
$this->title = 'gl&hf';
?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title>bid.ua | Панель управления</title>
        <?php $this->head() ?>
    </head>
    <body class="b-page">
    <?php $this->beginBody() ?>
    <?php if (User::isAdmin()): ?>
    <header class="b-header b-bg-cms">
        <div class="b-header__logo">
            <div class="b-title">
                <p class="b-title__text">CMS</p>
            </div>
            <div class="b-logo">
                <?=
                Html::a(Html::img('@web/images/logo.png', ['alt' => '.bid logo', 'class' => 'b-logo__img']), '/bid.loc/web/');
                ?>
            </div>
            <div class="b-title">
                <p class="b-title__text">Панель адміністратора</p>
            </div>
        </div>
        <div class="b-header__menu">
            <nav id="nav-wrap" class="b-primary-menu">
                <ul id="nav" class="b-primary-menu__list">
                    <li class="b-pmenu-item"><a href="<?= Url::to(['/']) ?>" class="b-menu-link">Головна</a></li>
                    <li class="b-pmenu-item"><a href="<?= Url::to(['/admin/order']) ?>" class="b-menu-link">Замовлення</a></li>
                    <li class="b-pmenu-item"><a href="<?= Url::to(['/admin/category']) ?>" class="b-menu-link">Категорії</a></li>
                    <li class="b-pmenu-item"><a href="<?= Url::to(['/admin/event']) ?>" class="b-menu-link">Події</a></li>
                    <li class="b-pmenu-item"><a href="<?= Url::to(['/admin/user']) ?>" class="b-menu-link">Користувачі</a></li>
                    <?php if (!Yii::$app->user->isGuest): ?>
                        <li class="b-amenu-item"><a href="<?= Url::to(['/site/logout']) ?>" class="b-menu-link"><?= Yii::$app->user->identity['username'] ?> (Вихід)</a></li>
                    <?php endif ?>
                </ul>
            </nav>
        </div>
    </header>
    <section class="b-content">
        <aside class="b-content__sidebar">
            <ul class="b-categories menu">
                <?= Category::renderCategories();?>
            </ul>
        </aside>
        <div class="container">
            <?php if(Yii::$app->session->hasFlash('success')): ?>
                <div class="b-main-content__container alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?php echo Yii::$app->session->getFlash('success'); ?>
                </div>
            <?php endif; ?>
            <?= $content ?>
        </div>
    </section>
    <footer class="b-footer">
        <div class="b-footer__wrapper">
            <div class="b-footer__logo">
                <?= Html::a(Html::img('@web/images/logo.png', ['alt' => '.bid logo', 'class' => 'b-logo__img']), '/'); ?>
            </div>
            <div class="b-footer__text">
                &copy; 2017 Усі права захищено.
            </div>
        </div>
    </footer>
    <?php endif ?>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>