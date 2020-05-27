<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\widgets\FileInput;

$action = $model->isNewRecord ? 'create' : 'update';
$url = $model->isNewRecord ? ['doctor/'.$action] : ['doctor/update', 'id' => $model->doctor_id];
?>

<div class="doctor-form">

    <?php $form = ActiveForm::begin(['action'=>Url::to($url),
        'options' => ['enctype' => 'multipart/form-data','method'=>'get']]); ?>

    <table class="table">
        <tr>
            <td><?= $form->field($model, 'fullname')->textInput() ?></td>
            <td>
                <?= $form->field($model, 'speciality')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map($specialities, 'speciality_id', function ($speciality){
                        return $speciality['name'].' ('. $speciality['lower_bound_fee'].'-'. $speciality['upper_bound_fee'].')';
                    }),
                    'options' => ['placeholder' => 'Select a speciality...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
            </td>
        </tr>
        <tr>
            <td><?= $form->field($model, 'years_of_exp')->textInput() ?></td>
            <td><?= $form->field($model, 'license_id')->textInput() ?></td>
        </tr>
        <tr>
            <td><?= $form->field($model, 'fee')->textInput() ?></td>
            <td>
                <?= $form->field($model, 'languages')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map($languages, 'id', 'name'),
                    'options' => ['multiple' => true,'placeholder' => 'Select a language...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
            </td>
        </tr>
        <tr>
            <td><?= $form->field($model, 'hospital')->textarea(['rows' => 2]) ?></td>
            <td><?= $form->field($model, 'qualification')->textarea(['rows' => 2]) ?></td>
        </tr>
        <tr>
            <td><?= $form->field($userModel, 'phonenumber')->textInput() ?></td>
            <td><?= $form->field($userModel, 'email')->textInput() ?></td>
        </tr>
        <?php
        if($action == 'create'){
        ?>
        <tr>
            <td><?= FileInput::widget([
                    'model' => $model,
                    'attribute' => 'attachments[]',
                    'pluginOptions' => [
                        'maxFileSize' => 600,
                        'maxFileCount' => 1,
                        'showUpload' => false,
                        'allowedFileExtensions' => ["png", "jpg", "jpeg"]
                    ]
                ]);
                ?>
            </td>
            <td><?= $form->field($userModel, 'password')->passwordInput() ?></td>
        </tr>
        <?php } ?>
        <tr>
            <td><?= Html::submitButton($action, ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?></td>
        </tr>
    </table>

    <?php ActiveForm::end(); ?>

</div>
