<?php

namespace app\modules\diary\models;

use Yii;

/**
 * This is the model class for table "diaryRecord".
 *
 * @property int $id
 * @property string $name
 * @property string $date
 */
class DiaryRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}d
     */
    public static function tableName()
    {
        return 'diaryRecord';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 100],
            [['date'], 'date', 'format' => 'php:Y-m-d']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'date' => 'Date',
        ];
    }

    /**
     * Получение всех показателей за день
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndicators()
    {
        return $this->hasOne(Indicator::className(), ['id_diary' => 'id']);
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        $indicators = $this->getIndicators()->one();
        return $indicators->weight;
    }
}
