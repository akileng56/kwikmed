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
        <a href="<?= Url::to(['specialities']); ?>" class="waves-effect">
            <i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>
            Consult Now
        </a>
    </li>
    <li>
        <a href="<?= Url::to(['my-consultations']); ?>" class="waves-effect">
            <i class="fa fa-columns m-r-10" aria-hidden="true"></i>
            My Consultations
        </a>
    </li>
    <li>
        <a href="<?= Url::to(['family']); ?>" class="waves-effect">
            <i class="fa fa-info-circle m-r-10" aria-hidden="true"></i>
            Family
        </a>
    </li>
</ul>