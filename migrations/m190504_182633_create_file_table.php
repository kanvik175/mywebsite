<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%file}}`.
 */
class m190504_182633_create_file_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%file}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(20),
            'type' => $this->tinyInteger(),
            'type_obj' => $this->tinyInteger()->unsigned(),
            'id_obj' => $this->integer()->unsigned()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%file}}');
    }
}
