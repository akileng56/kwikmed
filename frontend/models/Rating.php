<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "rating".
 *
 * @property integer $rating_id
 * @property integer $rating
 * @property integer $doctor_id
 * @property integer $consultation_id
 */
class Rating extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rating';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rating', 'doctor_id', 'consultation_id'], 'required'],
            [['rating', 'doctor_id', 'consultation_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rating_id' => 'Rating ID',
            'rating' => 'Rating',
            'doctor_id' => 'Doctor ID',
            'consultation_id' => 'Consultation ID',
        ];
    }
}
