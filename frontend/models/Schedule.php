<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property integer $schedule_id
 * @property integer $doctor_id
 * @property string $day_of_week
 * @property integer $start_time
 * @property integer $break_start_time
 * @property integer $break_end_time
 * @property integer $end_time
 * @property integer $slot_duration
 * @property integer $availability_status
 */
class Schedule extends \yii\db\ActiveRecord
{
    public $start_time_holder;
    public $break_start_time_holder;
    public $break_end_time_holder;
    public $end_time_holder;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schedule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['start_time_holder','break_start_time_holder','break_end_time_holder','end_time_holder','doctor_id', 'day_of_week', 'start_time', 'break_start_time', 'break_end_time', 'end_time', 'slot_duration', 'availability_status'], 'required'],
            [['doctor_id', 'start_time', 'break_start_time', 'break_end_time', 'end_time', 'slot_duration', 'availability_status'], 'integer'],
            [['day_of_week', 'start_time_holder','break_start_time_holder','break_end_time_holder','end_time_holder'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'schedule_id' => 'Schedule ID',
            'doctor_id' => 'Doctor ID',
            'day_of_week' => 'Day Of The Week',
            'start_time' => 'Start Time',
            'break_start_time' => 'Break Start Time',
            'break_end_time' => 'Break End Time',
            'end_time' => 'End Time',
            'slot_duration' => 'Slot Duration',
            'availability_status' => 'Availability Status',
            'start_time_holder' => 'Start Of Day Time',
            'break_start_time_holder' => 'Break Start Time',
            'break_end_time_holder' => 'Break End Time',
            'end_time_holder' => 'End Of Day Time'

        ];
    }
}
