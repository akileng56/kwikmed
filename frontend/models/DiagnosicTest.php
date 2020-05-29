<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "diagnosic_test".
 *
 * @property integer $diagnosic_test_id
 * @property integer $consultation_id
 * @property string $name
 */
class DiagnosicTest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diagnosic_test';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['consultation_id', 'name'], 'required'],
            [['consultation_id'], 'integer'],
            [['name'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'diagnosic_test_id' => 'Diagnosic Test ID',
            'consultation_id' => 'Consultation ID',
            'name' => 'Name',
        ];
    }
}
