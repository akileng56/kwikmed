<?php

namespace backend\models;

use Yii;
use backend\models\SpecialitySymptom;

/**
 * This is the model class for table "speciality".
 *
 * @property integer $speciality_id
 * @property string $name
 * @property integer $upper_bound_fee
 * @property integer $lower_bound_fee
 *
 */
class Speciality extends \yii\db\ActiveRecord
{
    public $symptoms;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'speciality';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'upper_bound_fee', 'lower_bound_fee','symptoms'], 'required'],
            [['name'], 'string'],
            [['upper_bound_fee', 'lower_bound_fee'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'speciality_id' => 'Speciality ID',
            'name' => 'Name',
            'upper_bound_fee' => 'Upper Bound Fee',
            'lower_bound_fee' => 'Lower Bound Fee',
        ];
    }

    public function getSymptoms() {
        return $this->hasMany(SpecialitySymptom::className(), ['speciality_id' => 'speciality_id']);
    }

    public function getSymptomDetails($id) {
        return Symptom::find(['symptom_id' => $id]);
    }

    public function formatSymptomArray($array){
        $modules = [];
        foreach($array as $symptomModule){
            $modules[] = $symptomModule['symptom_id'];
        }

        return $modules;
    }
}
