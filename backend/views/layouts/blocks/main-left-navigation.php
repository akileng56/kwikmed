<?php

use common\models\HelpToolDropdowns;
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
            <li><a href="<?= Url::to(['membership/all']); ?>" title="Membership">
                    <i class="fa fa-object-group"></i>
                    <span>MEMBERSHIP</span>
                </a>
            </li>

            <li><a href="<?= Url::to(['product/all']); ?>" title="Products">
                    <i class="fa fa-shopping-basket"></i>
                    <span>PRODUCTS</span>
                </a>
            </li>
            <li><a href="<?= Url::to(['order/all']); ?>" title="Orders">
                    <i class="fa fa-tasks"></i>
                    <span>ORDERS</span>
                </a>
            </li>

            <hr>
            <li><a href="<?= Url::to(['project/all']); ?>" title="Projects">
                    <i class="fa fa-cube"></i>
                    <span>PROJECTS</span>
                </a>
            </li>
            <li><a href="<?= Url::to(['gallery/all']); ?>" title="Gallery">
                    <i class="fa fa-picture-o"></i>
                    <span>GALLERY</span>
                </a>
            </li>

            <li><a href="<?= Url::to(['news/all']); ?>" title="News">
                    <i class="fa fa-newspaper-o"></i>
                    <span>NEWS</span>
                </a>
            </li>

            <li><a href="<?= Url::to(['partner/all']); ?>" title="News">
                    <i class="fa fa-file-powerpoint-o"></i>
                    <span>PARTNERS</span>
                </a>
            </li>
            <hr>
            <li><a href="<?= Url::to(['product/supplies']); ?>" title="All supplies">
                    <i class="fa fa-tasks"></i>
                    <span>ALL SUPPLIES REPORT</span>
                </a>
            </li>

            <hr>
            <li><a href="<?= Url::to(['configs/all']); ?>" title="Configs Management">
                    <i class="fa fa-cogs"></i>
                    <span>System Configs</span>
                </a>
            </li>
            <li><a href="<?= Url::to(['admin/assignment']); ?>" title="Access Management">
                    <i class="fa fa-cog"></i>
                    <span>Access Management</span>
                </a>
            </li>
        </ul>
    </section>
</aside>

