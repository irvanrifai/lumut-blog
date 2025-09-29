<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 */
class m250929_020806_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('post', [
            'idpost' => $this->primaryKey(),
            'title' => $this->text()->notNull(),
            'content' => $this->text()->notNull(),
            'date' => $this->dateTime()->notNull(),
            'username' => $this->string(45)->notNull(),
        ]);

        // Index + foreign key ke account
        $this->createIndex('idx_post_username', 'post', 'username');
        $this->addForeignKey(
            'fk_post_account',
            'post',
            'username',
            'account',
            'username',
            'NO ACTION',
            'NO ACTION'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_post_account', 'post');
        $this->dropIndex('idx_post_username', 'post');
        $this->dropTable('post');
    }
}
