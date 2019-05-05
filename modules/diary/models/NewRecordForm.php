<?php
/**
 * Created by PhpStorm.
 * User: rus
 * Date: 05.05.19
 * Time: 12:26
 */

namespace app\modules\diary\models;

use yii\base\Model;

class NewRecordForm extends Model
{
    public $name;
    public $date;

    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 100],
            [['date'], 'required']
        ];
    }

    public function save()
    {
        $diary = new Diary();
        $diary->name = $this->name;
        $diary->date = $this->date;
        return $diary->save();
    }
}