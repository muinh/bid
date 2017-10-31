<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order_items`.
 */
class m170911_175828_create_order_items_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('order_items', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'price' => $this->decimal(8,2)->notNull(),
            'quantity' => $this->integer()->notNull(),
            'amount' => $this->decimal(8,2)->notNull(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('order_items');
    }
}
