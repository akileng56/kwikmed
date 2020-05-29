<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "consultation".
 *
 * @property integer $consultation_id
 * @property integer $doctor_id
 * @property integer $patient_id
 * @property string $status
 * @property integer $date_time
 * @property integer $triage_id
 */
class Consultation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'consultation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['doctor_id', 'patient_id', 'status', 'date_time', 'triage_id'], 'required'],
            [['doctor_id', 'patient_id', 'date_time', 'triage_id'], 'integer'],
            [['status'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'consultation_id' => 'Consultation ID',
            'doctor_id' => 'Doctor ID',
            'patient_id' => 'Patient ID',
            'status' => 'Status',
            'date_time' => 'Date Time',
            'triage_id' => 'Triage ID',
        ];
    }
}
