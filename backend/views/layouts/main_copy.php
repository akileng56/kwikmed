<?php
/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);

$user = Yii::$app->user->identity;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie ie6 lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="ie ie7 lt-ie9 lt-ie8"        lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="ie ie8 lt-ie9"               lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="ie ie9"                      lang="en"> <![endif]-->
<!--[if !IE]><!-->
<?php $this->beginPage() ?>
<html lang="en" class="no-ie">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?>NOGAMU | UGANDA</title>
        <link rel="icon" href="<?= HELP_BASE_PATH ?>html/app/img/favicon.png">
        <?php $this->head() ?>
    </head>
    <?php $this->beginBody() ?>
    <body class="hold-transition skin-blue sidebar-mini">
        <!-- START Main wrapper-->
        <div class="wrapper">
            <!-- START Top Navbar-->
            <header class="main-header"> <!-- Logo --> <a class="logo"> <!-- mini logo for sidebar mini 50x50 pixels -->

                    <span class="logo-mini"><img height="50" alt="URA Logo"
                                                 src="<?= HELP_BASE_PATH ?>html/app/img/nogamu_logo2.png"></span>
                        <span class="logo-lg"> <img class="image-style" height="50" alt="URA Logo"
                                                    src="<?= HELP_BASE_PATH ?>html/app/img/nogamu_logo2.png">
		</span>
                </a>  <nav
                        class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu"
                       role="button"> <i class="ion ion-md-reorder" style="font-size: 20px;"></i>
                    </a>

                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img
                                            src="<?= HELP_BASE_PATH ?>html/app/img/user.png" class="user-image" alt="User Image">
                                    <?php if($user) {?>
                                    <span class="hidden-xs"><?= $user->phonenumber; ?></span>
                                     <?php } ?>
                                </a>
                                <ul class="dropdown-menu">
                                        <div>
                                            <a href="<?= HELP_BASE_PATH ?>" class="list-group-item">
                                                <div class="media" style="display: flex">
                                                    <i class="fa fa-tv fa-2x text-info" style="margin-top: 2px; margin-right: 5px;"></i>
                                                    <div class="media-body clearfix">
                                                        <strong>Frontend Section</strong><br>
                                                        <small>Login as user to work with the system</small>

                                                    </div>
                                                </div>
                                            </a>

                                            <a href="<?= Url::to(['site/logout']); ?>" class="list-group-item">
                                                <div class="media" style="display: flex">
                                                    <i class="fa fa-lock fa-2x text-danger" style="margin-top: 2px; margin-right: 5px;"></i>
                                                    <div class="media-body clearfix">
                                                        <strong>Logout</strong><br>
                                                        <small>Lock this page to keep your work private</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- END list group-->
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                </nav> </header>

            <?= $this->render('blocks/main-left-navigation'); ?>


            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h3>
                        <?php if (!empty($this->params['can_add_new_item']) && $this->params['can_add_new_item']) { ?>
                            <a href='<?= $this->params['new_item_link']; ?>' class='btn btn-primary pull-right text-center'>    
                                <i class='fa fa-plus'></i>
                                &nbsp;<?= $this->params['new_item_label']; ?>
                            </a>
                        <?php } ?>

                        <span style='font-weight:700;line-height:1;color:#08c;'><?= $this->title; ?></span>
                        <small><?= empty($this->params['page_description']) ? ('') : ($this->params['page_description']); ?></small>
                    </h3>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-lg-12">
                            <?= Alert::widget() ?>
                            <?= $content ?>
                        </div>
                    </div>
                </section>

            </div>

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    Developed by <b>BelaCals Technologies</b>
                </div>
                <strong>Copyright &copy; 2020.</strong> All rights reserved.
            </footer>
            <!-- END Main section-->
        </div>
        <!-- END Main wrapper-->
    </body>
    <?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>