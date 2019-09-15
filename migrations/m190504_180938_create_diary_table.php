<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%diary}}`.
 */
class m190504_180938_create_diary_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%diary}}', [
            'id' => $this->primaryKey(),
            'date' => $this->date()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%diary}}');
    }
}
