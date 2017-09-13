<?php

use \yii\helpers\Html;

?>

<?php if(!empty($session['cart'])): ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Фото</th>
                    <th>Наименование</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($session['cart'] as $id => $event): ?>
                <tr>
                    <td><?= Html::img("@web/images/events/{$event['img']}", ['alt' => $event['name'], 'height' => 64]) ?></td>
                    <td><?= $event['name'] ?></td>
                    <td><?= $event['qty'] ?></td>
                    <td><?= $event['price'] ?></td>
                    <td><span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                </tr>
            <?php endforeach ?>
                <tr>
                    <td colspan="4">Билетов в корзине:</td>
                    <td><?= $session['cart.qtyTotal'] ?> шт</td>
                </tr>
                <tr>
                    <td colspan="4">На сумму:</td>
                    <td><?= $session['cart.amount']?>.00 грн</td>
                </tr>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <h3>Корзина пуста</h3>
<?php endif; ?>
