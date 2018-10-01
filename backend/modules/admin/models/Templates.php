<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "templates".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $file_name
 * @property string $date_create
 * @property string $date_change
 */
class Templates extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'templates';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'file_name'], 'required'],
            [['content'], 'string'],
            [['date_create', 'date_change'], 'safe'],
            [['title', 'file_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'file_name' => 'File Name',
            'date_create' => 'Date Create',
            'date_change' => 'Date Change',
        ];
    }
}
