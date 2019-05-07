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
     * Общая оценка дня
     *
     * @return mixed
     */
    public function getDayRate()
    {
        $indicators = $this->getIndicators()->one();
        return $indicators->day_rate;
    }

    /**
     * Вес
     *
     * @return mixed
     */
    public function getWeight()
    {
        $indicators = $this->getIndicators()->one();
        return $indicators->weight;
    }

    /**
     * Количество повторений при подтягивании
     *
     * @return mixed
     */
    public function getPullUp()
    {
        $indicators = $this->getIndicators()->one();
        return $indicators->pull_up;
    }

    /**
     * Сколько раз вышел из себя
     *
     * @return mixed
     */
    public function getNumMad()
    {
        $indicators = $this->getIndicators()->one();
        return $indicators->num_mad;
    }

}
