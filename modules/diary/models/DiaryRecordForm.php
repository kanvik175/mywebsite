<?php
/**
 * Created by PhpStorm.
 * User: rus
 * Date: 05.05.19
 * Time: 12:26
 */

namespace app\modules\diary\models;

use app\models\File;
use yii\base\Model;

class DiaryRecordForm extends Model
{
    public $name;
    public $date;
    public $day_rate;
    public $weight;
    public $pull_up;
    public $num_mad;
    public $image;

    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 100],
            [['day_rate'], 'number', 'max' => 5],
            [['weight'], 'string'],
            [['pull_up'], 'number', 'max' => 150],
            [['num_mad'], 'number', 'max' => '100'],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            [['date'], 'required']
        ];
    }

    /**
     * Сохранение значений из формы в соответствующих моделях
     *
     * @param id
     * @return bool
     */

    public function save($id = null)
    {
        $success_save = false;

        if ($this->validate()) {
            $diary = isset($id) ? DiaryRecord::findOne($id) : new DiaryRecord();
            $indicator = isset($id) ? $diary->getIndicators()->one() : new Indicator();

            $diary->name = $this->name;
            $diary->date = $this->date;
            $success_save = $diary->save();

            $indicator->day_rate = $this->day_rate;
            $indicator->weight = $this->weight;
            $indicator->pull_up = $this->pull_up;
            $indicator->num_mad = $this->num_mad;
            $indicator->id_diary = $diary->id;

            $success_save = $success_save && $indicator->save();

            $image = isset($id) ? $diary->getFile()->one() : new File();
            $image->file = $this->image;
            $image->type = File::IMG_TYPE;
            $image->type_obj = 0;
            $image->id_obj = $diary->id;
            $image->upload();

            $success_save = $success_save && $image->save();
        }


        return $success_save;
    }

    /**
     * Сохранение значений модели diaryRecord
     *
     * @param $diary_record
     */

    public function setProperties($diary_record)
    {
       $this->name = $diary_record->name;
       $this->date = $diary_record->date;
       $this->day_rate = $diary_record->day_rate;
       $this->weight = $diary_record->weight;
       $this->pull_up = $diary_record->pull_up;
       $this->num_mad = $diary_record->num_mad;
    }
}