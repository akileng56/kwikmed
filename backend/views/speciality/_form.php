<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Speciality */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="speciality-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'upper_bound_fee')->textInput() ?>

    <?= $form->field($model, 'lower_bound_fee')->textInput() ?>

    <?= $form->field($model, 'symptoms')->widget(Select2::classname(), [
        'data' => ArrayHelper::map($symptoms, 'symptom_id', 'name'),
        'options' => ['multiple' => true,'placeholder' => 'Select a symptom...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
