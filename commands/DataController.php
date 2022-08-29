<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\File;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class DataController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionImport()
    {
        $default_data = [
            [
                'audio_path' => 'Skid_Row_-_18_And_Life_48161915.mp3',
                'image_path' => '1.jpg',
            ],
            [
                'audio_path' => 'Roxsett_gitare.mp3',
                'image_path' => '2.jpg',
            ],
            [
                'audio_path' => 'Enya_-_Caribbean_Blue_48071793.mp3',
                'image_path' => '3.jpg',
            ],
            [
                'audio_path' => 'Hans_Zimmer_Gavin_Greenaway_Lisa_Gerrard_The_Lyndhurst_Orchestra_Walt_Fowler_Bruce_Fowler_-_Now_We_Are_Free_48085687.mp3',
                'image_path' => '4.jpg',
            ],
            [
                'audio_path' => 'David Nevue - At Last Light.mp3',
                'image_path' => '5.jpg',
            ],
            [
                'audio_path' => 'A_nu-ka_pesnyu_nam_propojj_vesjolyjj_veter_62824544.mp3',
                'image_path' => '6.jpg',
            ],
            [
                'audio_path' => 'Pesenka_Paganelya_Kapitan_ulybnites_62661133.mp3',
                'image_path' => '7.jpg',
            ],
            [
                'audio_path' => 'Helene_Fischer_-_So_kann_das_Leben_sein_71318103.mp3',
                'image_path' => '8.jpg',
            ],
            [
                'audio_path' => 'Joan_Jett_The_Blackhearts_-_I_Hate_Myself_for_Loving_You_58879852.mp3',
                'image_path' => '9.jpg',
            ],
            [
                'audio_path' => 'Metallica_-_Nothing_Else_Matters_47954420.mp3',
                'image_path' => '10.jpg',
            ],
        ];

        foreach ($default_data as $item) {
            $file = new File();
            $file->audio_path = $item['audio_path'];
            $file->image_path = $item['image_path'];

            $file->save();
        }

        // foreach ($defaultData as ['audio_path' => $audio_path, 'image_path' => $image_path]) {
        //     $file = new File();
        //     $file->audio_path = $audio_path;
        //     $file->image_path = $image_path;

        //     $file->save();
        // }

        return ExitCode::OK;
    }
}
