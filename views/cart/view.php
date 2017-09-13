<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>

<section class="b-main-content">
    <div class="container b-main-content__container">
        <div class="row-order-prepare">
            <?php if(Yii::$app->session->hasFlash('success')): ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?php echo Yii::$app->session->getFlash('success'); ?>
                </div>
            <?php endif; ?>

            <?php if(Yii::$app->session->hasFlash('error')): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?php echo Yii::$app->session->getFlash('error'); ?>
                </div>
            <?php endif; ?>
            <div class="col-md-12">
                <div class="tabbable-panel">
                    <div class="tabbable-line">
                        <ul class="nav nav-tabs ">
                            <li class="active b-tab">
                                <h3 class="cart-title">Оформление заказа</h3>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_default_3">
                                <div>
                                    <p>
                                        <?php if(!empty($session['cart'])): ?>
                                        <div class="table-responsive">
                                            <table class="table table-hover table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Фото</th>
                                                    <th>Наименование</th>
                                                    <th>Кол-во</th>
                                                    <th>Цена</th>
                                                    <th>Сумма</th>
                                                    <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($session['cart'] as $id => $event): ?>
                                                    <tr>
                                                        <td><?= Html::img("@web/images/events/{$event['img']}", ['alt' => $event['name'], 'height' => 64]) ?></td>
                                                        <td><a href="<?= Url::to(['event/view', 'id' => $id]) ?>"><?= $event['name'] ?></a></td>
                                                        <td><?= $event['qty'] ?></td>
                                                        <td><?= $event['price'] ?></td>
                                                        <td><?= $event['qty'] * $event['price'] ?>.00</td>
                                                        <td><span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                                                    </tr>
                                                <?php endforeach ?>
                                                <tr>
                                                    <td colspan="5">Билетов в корзине:</td>
                                                    <td><?= $session['cart.qtyTotal'] ?> шт</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">На сумму:</td>
                                                    <td><?= $session['cart.amount']?>.00 грн</td>
                                                </tbody>
                                            </table>
                                            <hr>
                                            <?php $form = ActiveForm::begin() ?>
                                            <?= $form->field($order, 'name') ?>
                                            <?= $form->field($order, 'email') ?>
                                            <?= $form->field($order, 'phone') ?>
                                            <?= $form->field($order, 'address') ?>
                                            <?= Html::submitButton('Заказать', ['class' => 'btn btn-success']) ?>
                                            <?php ActiveForm::end(); ?>
                                        </div>
                                        <?php else: ?>
                                            <h3>Корзина пуста</h3>
                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>