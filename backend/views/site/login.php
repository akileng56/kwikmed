<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-signin">
    <div class="qwikmed-backend-logo">
        <img src="<?= HELP_BASE_PATH ?>html/app/img/logo.png" width="auto">
        <span>QWIKMED</span>
    </div>

    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

    <?= $form->field($model, 'phonenumber')->textInput() ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Login', ['class' => 'btn qwikmed-btn btn-block', 'name' => 'login-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
