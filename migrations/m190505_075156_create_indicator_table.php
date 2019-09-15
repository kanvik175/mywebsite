<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%indicator}}`.
 */
class m190505_075156_create_indicator_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%indicator}}', [
            'id' => $this->primaryKey(),
            'day_assessment' => $this->tinyInteger(1)->unsigned(),
            'weight' => $this->tinyInteger()->unsigned(),
            'pull_up' => $this->tinyInteger()->unsigned(),
            'num_mad' => $this->tinyInteger()->unsigned(),
            'id_diary' => $this->integer()->unsigned()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%indicator}}');
    }
}
