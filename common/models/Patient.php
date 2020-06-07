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
    public $dob_holder;
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
            [['user_id', 'fullname', 'dob', 'gender', 'relation', 'dob_holder'], 'required'],
            [['user_id', 'dob'], 'integer'],
            [['fullname', 'dob_holder'], 'string', 'max' => 100],
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
            'user_id' => 'User',
            'fullname' => 'Fullname',
            'dob' => 'Date of Birth',
            'gender' => 'Gender',
            'relation' => 'Relation',
            'dob_holder' => 'Date of Birth',
        ];
    }
}
