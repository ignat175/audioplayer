<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\File;
use app\models\forms\UploadForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
         * Displays homepage.
         *
         * @return string
         */
        public function actionUpload()
        {
            $uploadForm = new UploadForm();

            if (Yii::$app->request->isPost) {
                $uploadForm->audioFile = UploadedFile::getInstance($uploadForm, 'audioFile');

                if ($uploadForm->validate()) {
                    $dir = 'audio/';
                    $filename = $uploadForm->audioFile->baseName . '.' . $uploadForm->audioFile->extension;
                    $uploadForm->audioFile->saveAs($dir . $filename);

                    $file = new File();
                    $file->audio_path = $filename;
                    $file->image_path = 'example.jpg';

                    $file->save();

                    return $this->render('index');
                }
            }

            return $this->render('upload', ['model' => $uploadForm]);
        }
}
