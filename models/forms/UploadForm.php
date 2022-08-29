<?php

namespace app\models\forms;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $audioFile;

    public function rules()
    {
        return [
            [['audioFile'], 'required'],
            [['audioFile'], 'file'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'audioFile' => 'Audio File',
        ];
    }
}