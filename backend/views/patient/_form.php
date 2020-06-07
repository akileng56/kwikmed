<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;

$users = User::find()->all();
?>

<div class="patient-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map($users, 'id', 'phonenumber'),
        'options' => ['placeholder' => 'Select a user...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dob_holder')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter birth date ...'],
        'layout' => '{picker} {input}',
        'pickerButton' => ['icon' => 'time'],
        'pluginOptions' => [
            'autoclose'=>true
        ]
    ]);
    ?>

    <?= $form->field($model, 'gender')->dropDownList([
        'male' => 'Male',
        'female' => 'Female',
    ]) ?>

    <?= $form->field($model, 'relation')->dropDownList([
        'wife' => 'Wife',
        'husband' => 'Husband',
        'son' => 'Son',
        'daughter' => 'Daughter',
        'brother' => 'Brother',
        'sister' => 'Sister',
        'father' => 'Father',
        'mother' => 'Mother',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
