<?php

namespace app\modules\diary\models;

use Yii;

/**
 * This is the model class for table "goodThing".
 *
 * @property int $id
 * @property string $text
 * @property string $id_diary
 */
class GoodThing extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'goodThing';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_diary'], 'integer'],
            [['text'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'id_diary' => 'Id Diary',
        ];
    }
}
