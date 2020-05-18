<?php
use common\models\HelpToolDropdowns;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

//Business Units
$units = HelpToolDropdowns::getListOfBusinessUnits();

$this->title = 'Register a new Member of Staff';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .error-summary{
        background:#faa;
        border:1px solid maroon;
        color:red;
    }
    textarea,
    select,
    input{
        border-radius: 0px !important;
    }
</style>
<div class="site-signup">
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
                            ['staff_support' => 'Support Staff',
                                'staff_user' => 'System User'])
                    ?>
                </td>
            </tr>
            <tr>
                <td><?= $form->field($model, 'tin_number') ?></td>
                <td><?= $form->field($model, 'telephone1')->label('Primary Telephone No.'); ?></td>
                <td><?= $form->field($model, 'telephone2')->label('Alternative Telephone No.') ?></td>
            </tr>
            <tr>
                <td>
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                </td>
                <td>
                    <?= $form->field($model, 'email') ?>
                </td>

            </tr>
            <tr>
                <td>
                    <?=
                    $form->field($model, 'escalation_level')->radioList(
                            ['1' => 'Level 1',
                                '2' => 'Level 2',
                                '3' => 'Level 3'])
                    ?>
                </td>
                <td>
                    <?= $form->field($model, 'business_id')->dropDownList(ArrayHelper::map($units, 'id', 'name'))->label('Business Unit'); ?>
                </td>
                <td>

                </td>
            </tr>
            <tr>
                <td>
                    <?= Html::submitButton('Register Staff Member', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?> 
                </td>
                <td colspan="2">
                    <?= $form->field($model, 'password')->hiddenInput()->label(false); ?>
                    <?= $form->field($model, 'auth_agent')->hiddenInput(['value' => 'localdb'])->label(false); ?>
                    <?= $form->field($model, 'reg_mode')->hiddenInput(['value' => 'self'])->label(false); ?>
                </td>
            </tr>
        </table>
        <?php ActiveForm::end(); ?>
    </div>
</div>
