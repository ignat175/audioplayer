<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%file}}`.
 */
class m220723_011923_create_file_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%file}}', [
            'id' => $this->primaryKey(),
            'audio_path' => $this->string(128)->notNull()->unique(),
            'image_path' => $this->string(128)->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%file}}');
    }
}
