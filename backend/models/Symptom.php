<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "symptom".
 *
 * @property integer $symptom_id
 * @property string $name
 */
class Symptom extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'symptom';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'symptom_id' => 'Symptom ID',
            'name' => 'Name',
        ];
    }
}
