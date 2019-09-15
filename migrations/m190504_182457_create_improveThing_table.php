<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%improveThing}}`.
 */
class m190504_182457_create_improveThing_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%improveThing}}', [
            'id' => $this->primaryKey(),
            'text' => $this->string(),
            'id_diary' => $this->integer()->unsigned(),
            'id_tag' => $this->integer()->unsigned()
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%improveThing}}');
    }
}
