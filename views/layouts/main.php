<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Category;

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
                    // Html::img("@web/images/logo.png", ['alt' => '.bid logo', 'class' => 'b-logo__img']) 
                    Html::a(Html::img('@web/images/logo.png', ['alt' => '.bid logo', 'class' => 'b-logo__img']), '/bid.loc/web/');
                    ?>
				</div>
				<div class="b-title">
					<p class="b-title__text">have fun</p>
				</div>
			</div>
			<div class="b-header__menu">
				<div class="b-primary-menu">
					<ul class="b-primary-menu__list">
						<li class="b-pmenu-item"><a href="/bid.loc/web/" class="b-menu-link">Події</a></li>
						<li class="b-pmenu-item"><a href="about" class="b-menu-link">Про сервіс</a></li>
						<li class="b-pmenu-item"><a href="support" class="b-menu-link">Як користуватись?</a></li>
						<li class="b-pmenu-item"><a href="contact" class="b-menu-link">Напишіть нам</a></li>
					</ul>
				</div>
				<div class="b-auth-menu">
					<ul class="b-auth-menu__list">
						<li class="b-amenu-item"><a class="b-menu-link" onclick="return getCart()"><i class="fa-lg fa fa-shopping-cart fa-fw" aria-hidden="true"></i></a></li>
						<li class="b-amenu-item"><a href="register" class="b-menu-link">Реєстрація / Вхід</a></li>
					</ul>
				</div>
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
					&copy; 2017 All rights reserved
				</div>
			</div>
        </footer>
        <?php
            Modal::begin([
                'header' => '<div class="tabbable-panel">
						        <div class="tabbable-line">
							        <ul class="nav nav-tabs ">
								        <li class="active b-tab">
									        <h3 class="cart-title">Корзина</h3>
								        </li>
							        </ul>
						        </div>
					        </div>',
                'id' => 'cart',
                'size' => 'modal-lg',
                'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">
                                Продолжить покупки
                             </button>
                             <a href="'. Url::to(['cart/view']) .'" type="button" class="btn btn-success">
                                Оформить заказ
                             </a>
                            <button type="button" class="btn btn-danger" onclick="clearCart()">
                                Очистить корзину
                            </button>',
            ]);
            Modal::end();
        ?>

	<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>