<?php

use yii\helpers\Url;


/*
 * Vertical Navigation on the left of the page
 */
?>
<!-- START Menu-->

<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li><a href="<?= Url::to(['user/all-users']); ?>" title="All users">
                    <i class="fa fa-users"></i>
                    <span>ALL USERS</span>
                </a>
            </li>
            <li><a href="#" title="Specialities">
                    <i class="fa fa-object-group"></i>
                    <span>SPECIALITIES</span>
                </a>
            </li>
            <li><a href="#" title="Symptoms">
                    <i class="fa fa-tasks"></i>
                    <span>SYMPTOMS</span>
                </a>
            </li>

            <hr>
            <li><a href="#" title="Languages">
                    <i class="fa fa-cube"></i>
                    <span>LANGUAGES</span>
                </a>
            </li>
            <li><a href="#" title="Consultations">
                    <i class="fa fa-picture-o"></i>
                    <span>CONSULTATIONS</span>
                </a>
            </li>

            <li><a href="#" title="Transactions">
                    <i class="fa fa-newspaper-o"></i>
                    <span>TRANSACTIONS</span>
                </a>
            </li>

            <li><a href="#" title="News">
                    <i class="fa fa-file-powerpoint-o"></i>
                    <span>PARTNERS</span>
                </a>
            </li>
            <hr>
            <li><a href="<?= Url::to(['admin/assignment']); ?>" title="Access Management">
                    <i class="fa fa-cog"></i>
                    <span>ACCESS MANAGEMENT</span>
                </a>
            </li>
        </ul>
    </section>
</aside>

