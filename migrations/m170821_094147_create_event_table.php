<?php

use yii\db\Migration;

class m170821_094147_create_event_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('event', [
            'event_id' => $this->primaryKey(11),
            'category_id' => $this->smallInteger()->notNull(),
            'name' => $this->string()->notNull(),
            'title' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'image' => $this->string()->notNull(),
            'date' => $this->date()->notNull(),
            'place' => $this->string()->notNull(),
            'city' => $this->string()->notNull(),
            'is_published' => $this->boolean()->notNull(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
        $this->alterColumn('event', 'event_id', $this->smallInteger(8) . ' NOT NULL AUTO_INCREMENT');
    }

    public function safeDown()
    {
        $this->dropTable('event');
    }
}
