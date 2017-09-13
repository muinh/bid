<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order`.
 */
class m170911_191016_create_order_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('order', [
            'order_id' =>   $this->primaryKey(),
            'customer_id' => $this->integer(),
            'quantity' => $this->integer()->notNull(),
            'amount' => $this->decimal(8,2)->notNull(),
            'status' => $this->boolean()->notNull(),
            'name' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'phone' => $this->integer()->notNull(),
            'address' => $this->string(),
            'created_at' => $this->dateTime()->notNull(),
            'modified_at' => $this->dateTime()->notNull(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    public function safeDown()
    {
        $this->dropTable('order');
    }
}
