
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model common\models\Membership */

$this->title = 'Create New Product';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <?php
    $form = ActiveForm::begin(['action'=>Url::to(['product/create']),
        'options' => ['enctype' => 'multipart/form-data','method'=>'get']]);
    echo $form->errorSummary($model, ['header' => '<b>We found some errors. Please correct these:</b>']);
    ?>
    <table class="table">
        <tr>
            <td>
                <?= $form->field($model, 'name')->label('Product Name'); ?>
            </td>

        </tr>
        <tr>
            <td><?= $form->field($model, 'description')->textarea(['rows' => 3]) ?></td>

        </tr>
        <tr>
            <td><?= $form->field($model, 'price')->textInput() ?></td>

        </tr>
        <tr>
            <td>
                <?=
                FileInput::widget([
                    'model' => $model,
                    'attribute' => 'attachments[]',
                    'pluginOptions' => [
                        'maxFileSize' => 600,
                        'maxFileCount' => 1,
                        'showUpload' => false,
                        'allowedFileExtensions' => ["jpg", "jpeg"]
                    ]
                ]);
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
