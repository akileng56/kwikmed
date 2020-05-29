<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "consultation_payment".
 *
 * @property integer $payment_id
 * @property integer $amount
 * @property integer $patient_id
 * @property integer $doctor_id
 * @property integer $date
 * @property string $reference_no
 */
class ConsultationPayment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'consultation_payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amount', 'patient_id', 'doctor_id', 'date', 'reference_no'], 'required'],
            [['amount', 'patient_id', 'doctor_id', 'date'], 'integer'],
            [['reference_no'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'payment_id' => 'Payment ID',
            'amount' => 'Amount',
            'patient_id' => 'Patient ID',
            'doctor_id' => 'Doctor ID',
            'date' => 'Date',
            'reference_no' => 'Reference No',
        ];
    }
}
