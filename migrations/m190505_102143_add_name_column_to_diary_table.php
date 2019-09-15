<?php

use yii\db\Migration;

/**
 * Handles adding name to table `{{%diary}}`.
 */
class m190505_102143_add_name_column_to_diary_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('diary', 'name', $this->string('100')->after('id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
