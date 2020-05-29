<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "prescription".
 *
 * @property integer $prescription_id
 * @property integer $diagnosis_id
 * @property string $medicine_name
 * @property string $dosage
 * @property string $frequency
 * @property string $duration
 * @property string $instructions
 */
class Prescription extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prescription';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['diagnosis_id', 'medicine_name', 'dosage', 'frequency', 'duration', 'instructions'], 'required'],
            [['diagnosis_id'], 'integer'],
            [['medicine_name', 'instructions'], 'string'],
            [['dosage', 'frequency', 'duration'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'prescription_id' => 'Prescription ID',
            'diagnosis_id' => 'Diagnosis ID',
            'medicine_name' => 'Medicine Name',
            'dosage' => 'Dosage',
            'frequency' => 'Frequency',
            'duration' => 'Duration',
            'instructions' => 'Instructions',
        ];
    }
}
