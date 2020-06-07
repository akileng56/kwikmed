<?php

use yii\helpers\Url;


/*
 * Vertical Navigation on the left of the page
 */
?>
<!-- START Menu-->


    <nav class="sidebar-nav active">
        <ul id="sidebarnav" class="in">
            <li>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <i class="fa fa-users"></i>
                    <span>USERS</span>
                </a>
                <ul aria-expanded="false" class="collapse" style="">
                    <li><a href="<?= Url::to(['user/all-users']); ?>">User Accounts</a></li>
                    <li><a href="<?= Url::to(['doctor/all']); ?>">Doctors</a></li>
                    <li><a href="<?= Url::to(['patient/all']); ?>">Patients</a></li>
                </ul>
            </li>
            <li><a href="<?= Url::to(['speciality/all']); ?>" title="Specialities">
                    <i class="fa fa-object-group"></i>
                    <span>SPECIALITIES</span>
                </a>
            </li>
            <li><a href="<?= Url::to(['symptom/all']); ?>" title="Symptoms">
                    <i class="fa fa-tasks"></i>
                    <span>SYMPTOMS</span>
                </a>
            </li>

            <hr>
            <li><a href="<?= Url::to(['language/all']); ?>" title="Languages">
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
            <hr>
            <li><a href="<?= Url::to(['admin/assignment']); ?>" title="Access Management">
                    <i class="fa fa-cog"></i>
                    <span class="sidebar-item-custom">ACCESS MANAGEMENT</span>
                </a>
            </li>
        </ul>
    </nav>


