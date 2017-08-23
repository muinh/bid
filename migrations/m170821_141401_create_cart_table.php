<?php

use yii\db\Migration;

/**
 * Handles the creation of table `cart`.
 */
class m170821_141401_create_cart_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('cart', [
            'product_id' => $this->primaryKey(),
            'order_id' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('cart');
    }
}
