<?php

namespace app\modules\diary\models;

use Yii;

/**
 * This is the model class for table "improveThing".
 *
 * @property int $id
 * @property string $text
 * @property string $id_diary
 * @property string $id_tag
 */
class ImproveThing extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'improveThing';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_diary', 'id_tag'], 'integer'],
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
            'id_tag' => 'Id Tag',
        ];
    }
}
