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
    public function getDay_Rate()
    {
        $indicator = $this->getIndicators()->one();
        return isset($indicator) ? $indicator->day_rate : null;
    }

    /**
     * Вес
     *
     * @return mixed
     */
    public function getWeight()
    {
        $indicator = $this->getIndicators()->one();
        return $indicator->weight;
    }

    /**
     * Количество повторений при подтягивании
     *
     * @return mixed
     */
    public function getPull_Up()
    {
        $indicator = $this->getIndicators()->one();
        return $indicator->pull_up;
    }

    /**
     * Сколько раз вышел из себя
     *
     * @return mixed
     */
    public function getNum_Mad()
    {
        $indicator = $this->getIndicators()->one();
        return $indicator->num_mad;
    }

}
