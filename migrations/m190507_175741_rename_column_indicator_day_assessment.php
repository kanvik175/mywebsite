<?php

use yii\db\Migration;

/**
 * Class m190507_175741_rename_column_indicator_day_assessment
 */
class m190507_175741_rename_column_indicator_day_assessment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('indicator', 'day_assessment', 'day_rate');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190507_175741_rename_column_indicator_day_assessment cannot be reverted.\n";

        return false;
    }

}
