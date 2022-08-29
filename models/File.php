<?php

namespace app\models;

use yii\db\ActiveRecord;

class File extends ActiveRecord
{
    public static function tableName()
    {
        return '{{file}}';
    }

    public function rules()
    {
        return [
            // тут определяются правила валидации
            [['audio_path'], 'required'],
            [['audio_path'], 'string', 'max' => 128],

            [['image_path'], 'required'],
            [['image_path'], 'string', 'max' => 128],
        ];
    }

    public function attributeLabels()
        {
            return [
                'audio_path' => 'Audio File',
                'image_path' => 'Image File',
            ];
        }
}
