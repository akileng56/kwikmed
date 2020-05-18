<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "partner".
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property integer $filesize
 * @property integer $created_by
 * @property integer $created_at
 */
class Partner extends \yii\db\ActiveRecord
{
    public $attachments = null;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partner';
    }

    const SCENARIO_UPLOAD = 'partner';
    public function scenarios() {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_UPLOAD] = ['image', 'id', 'filesize', 'created_at'];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'image', 'filesize', 'created_by', 'created_at'], 'required'],
            [['filesize', 'created_by', 'created_at'], 'integer'],
            [['name', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'image' => 'Image',
            'filesize' => 'Filesize',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
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
