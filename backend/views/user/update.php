<?php

use common\models\HelpToolDropdowns;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

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
                <?= $form->field($model, 'phonenumber')->label('Phone Number'); ?>
            </td>
            <td>
                <?= $form->field($model, 'email')->label('Email'); ?>
            </td>
        </tr>


        </tr>
        <td>
            <?=
            $form->field($model, 'role')
                ->dropDownList(
                    ['admin' => 'Administrator', 'user' => 'User'],
                    ['prompt'=>'']
                );
            ?>
        </td>
        </tr>

        <tr>
            <td>
                <?= Html::submitButton('Update User Details', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
            </td>

        </tr>
    </table>
    <?php ActiveForm::end(); ?>
</div>