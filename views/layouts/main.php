<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Category;

AppAsset::register($this);
?>

<?php $this->beginPage();
    $this->title = 'bid gl&hf';
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
                    <?= Html::img("@web/images/logo.png", ['alt' => '.bid logo', 'class' => 'b-logo__img']) ?>
				</div>
				<div class="b-title">
					<p class="b-title__text">have fun</p>
				</div>
			</div>
			<div class="b-header__menu">
				<div class="b-primary-menu">
					<ul class="b-primary-menu__list">
						<li class="b-pmenu-item"><a href="index.html" class="b-menu-link">Події</a></li>
						<li class="b-pmenu-item"><a href="about.html" class="b-menu-link">Про сервіс</a></li>
						<li class="b-pmenu-item"><a href="support.html" class="b-menu-link">Як користуватись?</a></li>
						<li class="b-pmenu-item"><a href="contact.html" class="b-menu-link">Напишіть нам</a></li>
					</ul>
				</div>
				<div class="b-auth-menu">
					<ul class="b-auth-menu__list">
						<li class="b-amenu-item"><a href="register.html" class="b-menu-link">Реєстрація</a></li>
						<li class="b-amenu-item"><a href="login.html" class="b-menu-link">Вхід</a></li>
					</ul>
				</div>
			</div>
		</header>
		<section class="b-content">
			<aside class="b-content__sidebar">
				<ul class="b-categories">
                    <?= Category::renderCategories();?>
				</ul>
			</aside>
	<?= $content ?>
        </section>

	<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>