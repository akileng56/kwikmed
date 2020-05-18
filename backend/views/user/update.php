<?php

use common\models\HelpToolDropdowns;
use kartik\checkbox\CheckboxX;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

//Business Units

$this->title = 'Update Member details';
?>
<div class="row">
    <?php
    $form = ActiveForm::begin(['id' => 'form-signup']);
    echo $form->errorSummary($model, ['header' => '<b>We found some errors. Please correct these:</b>']);
    ?>
    <table class="table">
        <tr>
            <td>
                <?= $form->field($model, 'firstname')->label('First Name'); ?>
            </td>
            <td>
                <?= $form->field($model, 'lastname')->label('Last Name'); ?>
            </td>
            <td>
                <?=
                $form->field($model, 'category')->radioList(
                    [
                        'admin' => 'Administrator',
                        'user' => 'User'
                    ]
                )
                ?>
            </td>
        </tr>
        <tr>
            <td><?= $form->field($model, 'telephone')->label('Telephone No.'); ?></td>
            <td><?= $form->field($model, 'email') ?></td>
        </tr>
        <tr>


        </tr>
        <tr>
            <td>
                <?= Html::submitButton('Update User Details', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
            </td>

        </tr>
    </table>
    <?php ActiveForm::end(); ?>
</div>