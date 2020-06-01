<?php
/**
 * Created by PhpStorm.
 * User: AKILENG
 * Date: 5/22/2020
 * Time: 12:34 AM
 */
use yii\helpers\Url;
?>

<ul id="sidebarnav">
    <li>
        <a href="<?= Url::to(['doctor/profile']); ?>" class="waves-effect">
            <i class="ti-user" aria-hidden="true"></i>My Profile
        </a>
    </li>
    <li>
        <a href="<?= Url::to(['doctor/consultations']); ?>" class="waves-effect">
            <i class="fa fa-columns" aria-hidden="true"></i>Pending Consultations
        </a>
    </li>
    <li>
        <a href="<?= Url::to(['doctor/consultations']); ?>" class="waves-effect">
            <i class="fa fa-tasks" aria-hidden="true"></i>All Consultations
        </a>
    </li>
    <li>
        <a href="<?= Url::to(['doctor/schedule']); ?>" class="waves-effect">
            <i class="fa fa-clock-o" aria-hidden="true"></i>My Schedule
        </a>
    </li>
</ul>