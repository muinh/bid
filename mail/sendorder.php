<?php

use \yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th>Наименование</th>
            <th>Кол-во</th>
            <th>Цена</th>
            <th>Сумма</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($session['cart'] as $id => $event): ?>
            <tr>
                <td><a class="site-standard__link" href="<?= Url::to(['event/view', 'id' => $id]) ?>"><?= $event['name'] ?></a></td>
                <td><?= $event['qty'] ?></td>
                <td><?= $event['price'] ?></td>
                <td><?= number_format($event['qty'] * $event['price'],2, '.', '') ?></td>
            </tr>
        <?php endforeach ?>
        <tr>
            <td colspan="3">Билетов куплено:</td>
            <td><?= $session['cart.qtyTotal'] ?> шт</td>
        </tr>
        <tr>
            <td colspan="3">На сумму:</td>
            <td><?= number_format($session['cart.amount'], 2, '.', '')?> грн</td>
        </tr>
        </tbody>
    </table>
</div>
