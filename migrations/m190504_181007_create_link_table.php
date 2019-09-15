<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%link}}`.
 */
class m190504_181007_create_link_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%link}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50),
            'url' => $this->string(256),
            'type_obj' => $this->tinyInteger()->unsigned(),
            'id_obj' => $this->integer()->unsigned()
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%link}}');
    }
}
