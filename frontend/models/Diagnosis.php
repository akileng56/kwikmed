<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "diagnosis".
 *
 * @property integer $diagnosis_id
 * @property integer $consultation_id
 * @property string $diagnosis
 * @property string $advise
 */
class Diagnosis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diagnosis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['consultation_id', 'diagnosis', 'advise'], 'required'],
            [['consultation_id'], 'integer'],
            [['diagnosis', 'advise'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'diagnosis_id' => 'Diagnosis ID',
            'consultation_id' => 'Consultation ID',
            'diagnosis' => 'Diagnosis',
            'advise' => 'Advise',
        ];
    }
}
