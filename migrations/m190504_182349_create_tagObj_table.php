<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tagObj}}`.
 */
class m190504_182349_create_tagObj_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tagObj}}', [
            'id' => $this->primaryKey(),
            'id_tag' => $this->integer()->unsigned(),
            'type_obj' => $this->tinyInteger()->unsigned(),
            'id_obj' => $this->integer()->unsigned()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tagObj}}');
    }
}
