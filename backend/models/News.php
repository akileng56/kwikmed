<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property integer $filesize
 * @property string $description
 * @property integer $created_at
 * @property integer $created_by
 */
class News extends \yii\db\ActiveRecord
{

    public $attachments = null;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'image', 'description', 'created_at', 'created_by'], 'required'],
            [['filesize', 'created_at', 'created_by'], 'integer'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 255],
            [['created_at'],'default','value' =>time()]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'image' => 'Image',
            'filesize' => 'Filesize',
            'description' => 'Description',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
        ];
    }

    public function upload($attachments, $model) {
        //Try to upload the File
        if (!empty($attachments)) {
            $failedUploads = [];
            foreach ($attachments as $file){
                if($file->size <= 0){
                    $failedUploads[] = $file->baseName;
                }
            }
            if(empty($failedUploads)){
                foreach ($attachments AS $file) {

                    $file_name = $this->scenario.'_'.md5(uniqid()) . '.' . $file->extension;
                    $file_size = $file->size;
                    $filename = Yii::getAlias('@webroot') . '/newsImages/' . $file_name;
                    $file->saveAs($filename);

                    $model->filesize = $file_size;
                    $model->image = $file_name;
                    $model->created_at = time();
                    $model->save();
                }
                return ['status' => 'success'];
            } else {
                return ['status' => 'failed', 'files' => $failedUploads];
            }
        } else {
            return ['status' => 'success'];
        }
    }
}
