<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "doctor".
 *
 * @property integer $doctor_id
 * @property integer $user_id
 * @property string $hospital
 * @property integer $speciality
 * @property integer $years_of_exp
 * @property integer $validation_status
 * @property string $qualification
 * @property integer $license_id
 * @property integer $fee
 * @property string $photo
 * @property string $fullname
 */
class Doctor extends \yii\db\ActiveRecord
{
    public $languages;
    public $attachments = null;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doctor';
    }

    const SCENARIO_UPLOAD = 'photo';
    public function scenarios() {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_UPLOAD] = ['photo'];
        return $scenarios;
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id','fullname', 'hospital', 'speciality', 'years_of_exp', 'qualification', 'license_id',
                'languages','fee', 'photo'], 'required'],
            [['user_id', 'speciality', 'years_of_exp', 'validation_status', 'license_id', 'fee'], 'integer'],
            [['hospital', 'qualification', 'photo'], 'string'],
            [['fullname'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'doctor_id' => 'Doctor ID',
            'user_id' => 'User ID',
            'hospital' => 'Hospital',
            'speciality' => 'Speciality',
            'years_of_exp' => 'Years Of Experience',
            'validation_status' => 'Validation Status',
            'qualification' => 'Qualification',
            'license_id' => 'License ID',
            'fee' => 'Consultation Fee',
            'photo' => 'Photo',
            'fullname' => 'Full Name',
        ];
    }
    public function getSpeciality(){
        $speciality = Speciality::findOne($this->speciality);
        return $speciality->name;
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
                    $filename = Yii::getAlias('@webroot') . '/images/' . $file_name;
                    $file->saveAs($filename);

                    $model->photo = $file_name;
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
