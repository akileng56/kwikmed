<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p>Hello <?= Html::encode($user->firstname) ?>,</p>

    <p>We received a request to reset the password to your account.</p>

    <p>Please <?= Html::a(Html::encode('click here'), $resetLink) ?> to set a new password.</p>
    <p>If you did not make such request, please ignore this email</p>
</div>
