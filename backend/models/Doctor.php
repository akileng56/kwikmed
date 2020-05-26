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
 * @property string $email
 */
class Doctor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doctor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'hospital', 'speciality', 'years_of_exp', 'qualification', 'license_id', 'fee', 'photo'], 'required'],
            [['user_id', 'speciality', 'years_of_exp', 'validation_status', 'license_id', 'fee'], 'integer'],
            [['hospital', 'qualification', 'photo'], 'string'],
            [['email'], 'string', 'max' => 100],
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
            'years_of_exp' => 'Years Of Exp',
            'validation_status' => 'Validation Status',
            'qualification' => 'Qualification',
            'license_id' => 'License ID',
            'fee' => 'Fee',
            'photo' => 'Photo',
            'email' => 'Email',
        ];
    }
}
