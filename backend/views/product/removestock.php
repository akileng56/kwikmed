
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Membership;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;

$supplier = Membership::getApprovedSuppliers();
/* @var $this yii\web\View */
/* @var $model common\models\Membership */

$this->title = 'Remove/Reduce stock for: '.$product->name;
$this->params['breadcrumbs'][] = ['label' => 'Remove stock', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <?php
    $form = ActiveForm::begin();
    echo $form->errorSummary($model, ['header' => '<b>We found some errors. Please correct these:</b>']);
    ?>
    <table class="table">
        <tr>
            <td>
                <?= $form->field($model, 'quantity')->label('Quantity'); ?>
            </td>

        </tr>
        <tr>
            <td>
                <?=
                 $form->field($model, 'supplier_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map($supplier, 'id', function($model){ return $model['name']; }),
                    'options' => ['placeholder' => 'Select supplier','class'=>'form-control'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label('Supplier\'s Name');
                ?>
            </td>

        </tr>
        <tr>
            <td>
                <?= Html::submitButton('Submit Details', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
            </td>

        </tr>
    </table>
    <?php ActiveForm::end(); ?>
</div>
