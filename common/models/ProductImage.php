<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_image".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $filesize
 * @property string $uploaded_file
 * @property integer $created_at
 * @property integer $updated_at
 */
class ProductImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_image';
    }
    //Scenarios
    const SCENARIO_UPLOAD = 'upload';

    public function scenarios() {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_UPLOAD] = ['uploaded_file', 'product_id', 'filesize', 'created_at'];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id','filesize','uploaded_file'], 'required', 'on' => self::SCENARIO_UPLOAD],
            [['product_id', 'created_at', 'updated_at','filesize'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'filesize' => 'File Size',
            'uploaded_file' => 'Uploaded File',

        ];
    }

    public function upload($attachments, $id) {
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
                    $filename = Yii::getAlias('@webroot') . '/attachments/' . $file_name;
                    $file->saveAs($filename);

                    $upload = new self();
                    $upload->product_id = $id;
                    $upload->filesize = $file_size;
                    $upload->uploaded_file = $file_name;
                    $upload->created_at = time();
                    $upload->updated_at = time();
                    $upload->save();
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
