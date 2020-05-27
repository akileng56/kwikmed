<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\widgets\FileInput;

?>

<div class="doctor-form">

    <?php $form = ActiveForm::begin(['action'=>Url::to(['doctor/profile', 'id' => $model->doctor_id]),
        'options' => ['enctype' => 'multipart/form-data','method'=>'get']]); ?>

    <table class="table">

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
        </tr>

        <tr>
            <td><?= Html::submitButton('update' , ['class' =>'btn btn-success']) ?></td>
        </tr>
    </table>

    <?php ActiveForm::end(); ?>

</div>
