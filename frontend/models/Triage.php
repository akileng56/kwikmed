<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "triage".
 *
 * @property integer $triage_id
 * @property string $weight
 * @property string $height
 * @property integer $patient_details
 * @property string $previous_medication
 * @property string $drug_allergies
 */
class Triage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'triage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['weight', 'height', 'patient_details', 'previous_medication', 'drug_allergies'], 'required'],
            [['weight', 'height'], 'number'],
            [['patient_details'], 'integer'],
            [['previous_medication', 'drug_allergies'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'triage_id' => 'Triage ID',
            'weight' => 'Weight',
            'height' => 'Height',
            'patient_details' => 'Patient Details',
            'previous_medication' => 'Previous Medication',
            'drug_allergies' => 'Drug Allergies',
        ];
    }
}
