<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\time\TimePicker;
use kartik\date\DatePicker;
?>

<div class="schedule-form">
    <h1><?= Html::encode('Update Daily Schedule') ?></h1>
    <?php $form = ActiveForm::begin(['action'=> Url::to(['doctor/edit-schedule', 'id' => $model->schedule_id]),'id' => 'form-schedule']); ?>
    <table class="table">
        <tr>
            <td>
                <?= $form->field($model, 'day_of_week')->dropDownList([
                    'monday' => 'Monday',
                    'tuesday' => 'Tuesday',
                    'wednesday' => 'Wednesday',
                    'thursday' => 'Thursday',
                    'friday' => 'Friday',
                    'saturday' => 'Saturday',
                    'sunday' => 'Sunday',
                ]) ?>
            </td>
            <td>
                <?= $form->field($model, 'slot_duration')->input('number',['min'=>10, 'max'=>60]) ?>
            </td>
        </tr>
        <tr>
            <td>
                <?=$form->field($model, 'start_time_holder')->widget(TimePicker::className(), [
                    'pluginOptions' => [
                        'defaultTime' => '08:00 AM',
                    ]
                ]); ?>
            </td>
            <td>
                <?= $form->field($model, 'end_time_holder')->widget(TimePicker::className(), [
                    'pluginOptions' => [
                        'defaultTime' => '05:00 PM',
                    ]
                ]); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?= $form->field($model, 'break_start_time_holder')->widget(TimePicker::className(), [
                    'pluginOptions' => [
                        'defaultTime' => '01:00 PM',
                    ]
                ]); ?>
            </td>
            <td>
                <?= $form->field($model, 'break_end_time_holder')->widget(TimePicker::className(), [
                    'pluginOptions' => [
                        'defaultTime' => '02:00 PM',
                    ]
                ]); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?= $form->field($model, 'availability_status')->dropDownList([
                    '1' => 'Am Available',
                    '0' => 'Am Not Available'
                ]) ?>

            </td>
        </tr>
        <tr>
            <td>
                <div class="form-group">
                    <?= Html::submitButton( 'Update Schedule', ['class' => 'btn btn-success']) ?>
                </div>
            </td>

        </tr>
    </table>
    <?php ActiveForm::end(); ?>

</div>
