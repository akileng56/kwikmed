<?php
use yii\helpers\Html;
/* 
 * Notifcation emails for a ticket
 */
$url = HELP_BASE_PATH.'membership';
?>
<div class="password-reset">
    <p>Hello <strong><?= Html::encode($member->name) ?></strong>,</p>

    <p>Your membership application has been <b><?= $member->membership_status ?>.</b></p>

    <p>Follow the link below to visit our Approved Members:</p>

    <p><?= Html::a(Html::encode($url), $url) ?></p>
</div>
