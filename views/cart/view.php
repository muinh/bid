<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\ContactForm;
?>

<section class="b-main-content">
    <div class="container b-main-content__container">
        <div class="row-order-prepare">
            <?php if(Yii::$app->session->hasFlash('success')): ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span>&times;</span>
                    </button>
                    <?php echo Yii::$app->session->getFlash('success'); ?>
                </div>
            <?php endif; ?>

            <?php if(Yii::$app->session->hasFlash('error')): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span>&times;</span>
                    </button>
                    <?php echo Yii::$app->session->getFlash('error'); ?>
                </div>
            <?php endif; ?>
            <div class="col-md-12">
                <div class="tabbable-panel">
                    <div class="tabbable-line">
                        <ul class="nav nav-tabs ">
                            <li class="active b-tab">
                                <h3 class="cart-title">Оформлення замовлення</h3>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_default_3">
                                <div id="cart">
                                    <div class="cart-container">
                                        <?php if(!empty($session['cart'])): ?>
                                        <div class="table-responsive">
                                            <table class="table table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Фото</th>
                                                        <th>Назва</th>
                                                        <th>Кількість</th>
                                                        <th>Ціна</th>
                                                        <th>Сума</th>
                                                        <th><span class="glyphicon glyphicon-remove"></span></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($session['cart'] as $id => $event): ?>
                                                    <tr>
                                                        <td><?= Html::img("@web/images/events/{$event['img']}", ['alt' => $event['name'], 'height' => 64]) ?></td>
                                                        <td><a class="site-standard__link" href="<?= Url::to(['event/view', 'id' => $id]) ?>"><?= $event['name'] ?></a></td>
                                                        <td><?= $event['qty'] ?></td>
                                                        <td><?= $event['price'] ?></td>
                                                        <td><?= number_format($event['qty'] * $event['price'],2, '.', '') ?></td>
                                                        <td><span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-item"></span></td>
                                                    </tr>
                                                <?php endforeach ?>
                                                <tr>
                                                    <td colspan="5">Квитків в кошику:</td>
                                                    <td><?= $session['cart.qtyTotal'] ?> шт</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">На суму:</td>
                                                    <td><?= number_format($session['cart.amount'], 2, '.', '')?> грн</td>
                                                </tbody>
                                            </table>
                                            <hr>
                                            <?php
                                                $id = Yii::$app->user->id;
                                                $form = ActiveForm::begin();
                                                if(is_null($id)) { ?>
                                                    <?= $form->field($order, 'name'); ?>
                                                    <?= $form->field($order, 'email'); ?>
                                                    <?= $form->field($order, 'phone'); ?>
                                                    <?= $form->field($order, 'address'); ?>
                                                <?php
                                                } else { ?>
                                                    <?= $form->field($order, 'customer_id')
                                                        ->hiddenInput(['value' => $id])
                                                        ->label(false) ;
                                                }?>
                                                <?= Html::submitButton('Замовити', ['class' => 'btn btn-success']);
                                                ActiveForm::end(); ?>
                                        </div>
                                        <?php else: ?>
                                            <h3>Кошик пустий</h3>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>