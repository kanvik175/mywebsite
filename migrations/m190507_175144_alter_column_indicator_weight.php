<?php

use yii\db\Migration;

/**
 * Class m190507_175144_alter_column_indicator_weight
 */
class m190507_175144_alter_column_indicator_weight extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('indicator', 'weight', 'float');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190507_175144_alter_column_indicator_weight cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190507_175144_alter_column_indicator_weight cannot be reverted.\n";

        return false;
    }
    */
}
