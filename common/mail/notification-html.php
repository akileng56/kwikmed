<?php
/* 
 * Notifcation emails for a ticket
 */
$url = Yii::$app->urlManager->createAbsoluteUrl(['site/membership']);

?>
<div class="password-reset">
    <p>Hello <?= Html::encode($member->name) ?>,</p>

    <p>Follow the link below to visit our Approved Members:</p>

    <p><?= Html::a(Html::encode($url), $url) ?></p>
</div>
