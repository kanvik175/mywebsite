<?php

namespace app\models;

use app\models\TypeObj;
use Yii;

/**
 * This is the model class for table "file".
 *
 * @property int $id
 * @property string $name
 * @property int $type
 * @property int $type_obj
 * @property string $id_obj
 */
class File extends \yii\db\ActiveRecord
{

    const IMG_TYPE = 0;

    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'file';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'type_obj', 'id_obj'], 'integer'],
            [['name'], 'string', 'max' => 20],
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
            'type' => 'Type',
            'type_obj' => 'Type Obj',
            'id_obj' => 'Id Obj',
        ];
    }

    /**
     * {@inheritdoc}
     * @return FileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FileQuery(get_called_class());
    }

    public function getLocation()
    {
        return '/uploads/' . TypeObj::TYPE[$this->type_obj] . '/';
    }

    public function getName()
    {
        return date('d.m.Y_H:i') . '.' . $this->file->extension;
    }

    public function upload()
    {
        $webroot = Yii::getAlias('@webroot');
        $this->file->saveAs($webroot . $this->getLocation() . $this->getName());
        if (isset($this->name) && file_exists($webroot . $this->getLocation() . $this->name)) {
            unlink($webroot . $this->getLocation() . $this->name);
        }
        $this->name = $this->getName();
    }
}
