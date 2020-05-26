<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "doctor_language".
 *
 * @property integer $doctor_id
 * @property integer $language_id
 */
class DoctorLanguage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doctor_language';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['doctor_id', 'language_id'], 'required'],
            [['doctor_id', 'language_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'doctor_id' => 'Doctor ID',
            'language_id' => 'Language ID',
        ];
    }
}
