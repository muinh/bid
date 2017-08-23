<?php

use yii\db\Migration;

/**
 * Handles the creation of table `customer`.
 */
class m170822_095441_create_customer_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('customer', [
            'customer_id' => $this->primaryKey(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'phone' => $this->string(),
            'email' => $this->string(),
            'city' => $this->string(),
            'address' => $this->string(),
            'created_at' => $this->dateTime(),
            'modified_at' => $this->dateTime(),
            'isAdmin' => $this->boolean(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('customer');
    }
}
