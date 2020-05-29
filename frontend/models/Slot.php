<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "slot".
 *
 * @property integer $slot_id
 * @property integer $schedule_id
 * @property integer $start_time
 * @property integer $end_time
 * @property integer $date
 */
class Slot extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slot';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['schedule_id', 'start_time', 'end_time', 'date'], 'required'],
            [['schedule_id', 'start_time', 'end_time', 'date'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'slot_id' => 'Slot ID',
            'schedule_id' => 'Schedule ID',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'date' => 'Date',
        ];
    }
}
