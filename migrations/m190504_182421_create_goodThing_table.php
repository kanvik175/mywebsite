<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%goodThing}}`.
 */
class m190504_182421_create_goodThing_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%goodThing}}', [
            'id' => $this->primaryKey(),
            'text' => $this->string(),
            'id_diary' => $this->integer()->unsigned()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%goodThing}}');
    }
}
