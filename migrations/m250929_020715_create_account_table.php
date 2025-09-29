<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%account}}`.
 */
class m250929_020715_create_account_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('account', [
            'username' => $this->string(45)->notNull(),
            'password' => $this->string(250)->notNull(),
            'name' => $this->string(45)->notNull(),
            'role' => $this->string(45)->notNull(),
            'PRIMARY KEY(username)',
        ]);

        // Seed dummy users
        $this->insert('account', [
            'username' => 'admin',
            'password' => md5('admin'),
            'name' => 'Administrator',
            'role' => 'admin',
        ]);

        $this->insert('account', [
            'username' => 'author',
            'password' => md5('author'),
            'name' => 'Penulis',
            'role' => 'author',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('account');
    }
}
