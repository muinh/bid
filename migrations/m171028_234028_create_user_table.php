<?php

use yii\db\Migration;

class m171028_234028_create_user_table extends Migration
{

    public function safeUp()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'isAdmin' => $this->boolean()->defaultValue(0),
            'email' => $this->string()->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'date_of_birth' => $this->date(),
            'phone' => $this->string(20),
            'city' => $this->string(),
            'address' => $this->string(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('user');
    }

}