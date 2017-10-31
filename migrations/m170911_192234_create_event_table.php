<?php

use yii\db\Migration;

/**
 * Handles the creation of table `event`.
 */
class m170911_192234_create_event_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('event', [
            'event_id' => $this->primaryKey(11),
            'category_id' => $this->Integer()->notNull(),
            'title' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'image' => $this->string()->notNull(),
            'date' => $this->date()->notNull(),
            'place' => $this->string()->notNull(),
            'city' => $this->string()->notNull(),
            'price' => $this->decimal(10,2)->notNull(),
            'bid' => $this->integer()->notNull(),
            'is_published' => $this->boolean()->notNull(),
            'is_featured' => $this->boolean()->notNull(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    public function safeDown()
    {
        $this->dropTable('event');
    }
}
