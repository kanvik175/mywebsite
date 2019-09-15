<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "link".
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property int $type_obj
 * @property string $id_obj
 */
class Link extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'link';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_obj', 'id_obj'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['url'], 'string', 'max' => 256],
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
            'url' => 'Url',
            'type_obj' => 'Type Obj',
            'id_obj' => 'Id Obj',
        ];
    }
}
