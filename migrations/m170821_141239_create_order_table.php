<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order`.
 */
class m170821_141239_create_order_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('order', [
            'order_id' => $this->primaryKey(),
            'customer_id' => $this->integer()->notNull(),
            'quantity' => $this->integer()->notNull(),
            'amount' => $this->decimal(8,2)->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'modified_at' => $this->dateTime()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('order');
    }
}
