<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "patient".
 *
 * @property integer $patient_id
 * @property integer $user_id
 * @property string $fullname
 * @property integer $dob
 * @property string $gender
 * @property string $relation
 */
class Patient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'fullname', 'dob', 'gender', 'relation'], 'required'],
            [['user_id', 'dob'], 'integer'],
            [['fullname'], 'string', 'max' => 100],
            [['gender', 'relation'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'patient_id' => 'Patient ID',
            'user_id' => 'User ID',
            'fullname' => 'Fullname',
            'dob' => 'Dob',
            'gender' => 'Gender',
            'relation' => 'Relation',
        ];
    }
}
