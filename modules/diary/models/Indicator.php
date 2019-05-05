<?php

namespace app\modules\diary\models;

use Yii;

/**
 * This is the model class for table "indicator".
 *
 * @property int $id
 * @property int $day_assessment
 * @property int $weight
 * @property int $pull_up
 * @property int $num_mad
 * @property string $id_diary
 */
class Indicator extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'indicator';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['day_assessment', 'weight', 'pull_up', 'num_mad', 'id_diary'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'day_assessment' => 'Day Assessment',
            'weight' => 'Weight',
            'pull_up' => 'Pull Up',
            'num_mad' => 'Num Mad',
            'id_diary' => 'Id Diary',
        ];
    }
}
