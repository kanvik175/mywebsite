<?php

namespace app\modules\diary\models;

use app\models\File;
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

    public function getFile()
    {
        return $this->hasOne(File::className(), ['id_obj' => 'id']);
    }

    public function getImage()
    {
        $file = $this->getFile()->one();
        $image = isset($file) ? $file->getLocation() . $file->name : "";
        return $image;
    }

    /**
     * @return bool
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */

    public function delete()
    {
        $indicator = $this->getindicators()->one();
        $file = $this->getFile()->one();
        $success = isset($indicator, $file) ? $indicator->delete() && $file->delete() : true;
        return $success && parent::delete();
    }

}
