<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;

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
	<meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="b-page">
	<?php $this->beginBody() ?>
		<header class="b-header">
			<div class="b-header__logo">
				<div class="b-title">
						<p class="b-title__text">good luck</p>
					</div>
				<div class="b-logo">
                    <?=
                        Html::a(Html::img('@web/images/logo.png', ['alt' => '.bid logo', 'class' => 'b-logo__img']), '/bid.loc/web/');
                    ?>
				</div>
				<div class="b-title">
					<p class="b-title__text">have fun</p>
				</div>
			</div>
			<div class="b-header__menu">
				<nav id="nav-wrap" class="b-primary-menu">
					<ul id="nav" class="b-primary-menu__list">
                        <li class="b-pmenu-item"><a href="<?= Url::to(['/']) ?>" class="b-menu-link">Події</a></li>
                        <li class="b-pmenu-item"><a href="<?= Url::to(['/about']) ?>" class="b-menu-link">Про сервіс</a></li>
                        <li class="b-pmenu-item"><a href="<?= Url::to(['/contact']) ?>" class="b-menu-link">Напишіть нам</a></li>
                        <li class="b-pmenu-item"><a class="b-menu-link" onclick="return getCart()"><i class="fa-lg fa fa-shopping-cart fa-fw" aria-hidden="true"></i></a></li>
                        <?php if (Yii::$app->user->isGuest): ?>
                            <li class="b-pmenu-item"><a href="<?= Url::to(['/login']) ?>" class="b-menu-link">Вхід в аккаунт</a></li>
                        <?php endif ?>
                        <?php if (!Yii::$app->user->isGuest): ?>
                            <li class="b-pmenu-item"><a href="<?= Url::to(['/logout']) ?>" class="b-menu-link"><?= Yii::$app->user->identity['username'] ?> (Вихід)</a></li>
                        <?php endif ?>
                        <?php if (User::isAdmin()): ?>
                            <li class="b-pmenu-item"><a href="<?= Url::to(['/admin']) ?>" class="b-menu-link">Адмін-панель</a></li>
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
			<?= $content ?>
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
        <?php
            Modal::begin([
                'header' => '<div class="tabbable-panel">
						        <div class="tabbable-line">
							        <ul class="nav nav-tabs ">
								        <li class="active b-tab">
									        <h3 class="cart-title">Кошик</h3>
								        </li>
							        </ul>
						        </div>
					        </div>',
                'id' => 'cart',
                'size' => 'modal-lg',
                'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">
                                Продовжити покупки
                             </button>
                             <a href="'. Url::to(['cart/view']) .'" type="button" class="btn btn-success">
                                Оформити замовлення
                             </a>
                            <button type="button" class="btn btn-danger" onclick="clearCart()">
                                Очистити кошик
                            </button>',
            ]);
            Modal::end();
        ?>
	<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>