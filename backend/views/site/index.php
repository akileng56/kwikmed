<?php
 $auth = Yii::$app->authManager;

$this->title = 'URA Help Center - Admi Panel';
$this->params['page_description'] = 'Welcome to the admin Panel';

//Ceate roles
//$role = $auth->createRole('system_admin');
//$auth->assign($role, 1);
?>
<div class="row">
    <div class="col-lg-3 col-md-6">
        <!-- START panel-->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <em class="fa fa-cubes fa-5x"></em>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="text-lg">3</div>
                        <p class="m0">Business Units</p>
                    </div>
                </div>
            </div>
            <a href="javascript:void(0);" class="panel-footer bg-dark bt0 clearfix btn-block">
                <span class="pull-left">All Business Units</span>
                <span class="pull-right">
                    <em class="fa fa-chevron-circle-right"></em>
                </span>
            </a>
            <!-- END panel-->
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <!-- START panel-->
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <em class="fa fa-users fa-5x"></em>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="text-lg">12</div>
                        <p class="m0">Support Staff</p>
                    </div>
                </div>
            </div>
            <a href="javascript:void(0);" class="panel-footer bg-dark bt0 clearfix btn-block">
                <span class="pull-left">All Staff</span>
                <span class="pull-right">
                    <em class="fa fa-chevron-circle-right"></em>
                </span>
            </a>
        </div>
        <!-- END panel-->
    </div>
    <div class="col-lg-3 col-md-6">
        <!-- START panel-->
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <em class="fa fa-warning fa-5x"></em>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="text-lg">124</div>
                        <p class="m0">Known Issues</p>
                    </div>
                </div>
            </div>
            <a href="javascript:void(0);" class="panel-footer bg-dark bt0 clearfix btn-block">
                <span class="pull-left">View Details</span>
                <span class="pull-right">
                    <em class="fa fa-chevron-circle-right"></em>
                </span>
            </a>
        </div>
        <!-- END panel-->
    </div>
    <div class="col-lg-3 col-md-6">
        <!-- START panel-->
        <div class="panel panel-danger">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <em class="fa fa-support fa-5x"></em>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="text-lg">13</div>
                        <p class="m0">Support Tickets!</p>
                    </div>
                </div>
            </div>
            <a href="javascript:void(0);" class="panel-footer bg-dark bt0 clearfix btn-block">
                <span class="pull-left">See all Tickets</span>
                <span class="pull-right">
                    <em class="fa fa-chevron-circle-right"></em>
                </span>
            </a>
        </div>
        <!-- END panel-->
    </div>
</div>
