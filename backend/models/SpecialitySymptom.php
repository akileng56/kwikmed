<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "speciality_symptom".
 *
 * @property integer $speciality_id
 * @property integer $symptom_id
 */
class SpecialitySymptom extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'speciality_symptom';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['speciality_id', 'symptom_id'], 'required'],
            [['speciality_id', 'symptom_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'speciality_id' => 'Speciality ID',
            'symptom_id' => 'Symptom ID',
        ];
    }
}
