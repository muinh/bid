<?php

use yii\db\Migration;

class m170821_072326_create_category_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('category', [
            'category_id' => $this->primaryKey(11),
            'name' => $this->string()->notNull(),
            'title' => $this->string()->notNull(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
        $this->alterColumn('category', 'category_id', $this->smallInteger(8) . ' NOT NULL AUTO_INCREMENT');
    }

    public function safeDown()
    {
        $this->dropTable('category');
    }
}
