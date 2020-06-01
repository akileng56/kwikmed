<?php

use yii\helpers\Html;
use common\models\User;
use backend\models\Speciality;
use backend\models\Language;

$this->title = 'Doctor\'s Details:';
$this->params['breadcrumbs'][] = ['label' => 'Doctors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$user = User::findOne($model->user_id);
$speciality = Speciality::findOne($model->speciality);
?>
<div class="doctor-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <div class="row">
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="mt-4">
                        <img width="150" src="<?= HELP_BASE_PATH.'backend/images/'.$model->photo ?>">
                        <h4 class="card-title mt-2"><?= $model->fullname ?></h4>
                        <h6 class="card-subtitle"><?= $user->email ?></h6>
                        <p>
                            <?= Html::a('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Change Photo', ['profile', 'id' => $model->doctor_id], ['class' => 'btn btn-primary']) ?>
                        </p>
                    </center>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Basic Information</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="profile" role="tabpanel">
                        <div class="card-body">
                            <div class="row m-3">
                                <div class="col-lg-6 col-xlg-6 col-md-6">
                                    <small class="text-muted">Fullname </small>
                                    <h4><?= $model->fullname ?></h4>
                                    <small class="text-muted">Email address </small>
                                    <h4><?= $user->email ?></h4>
                                    <small class="text-muted">Hospital</small>
                                    <h4><?= $model->hospital ?></h4>
                                    <small class="text-muted">Speciality </small>
                                    <h4><?= $speciality->name ?></h4>
                                    <small class="text-muted">Years of Experience </small>
                                    <h4><?= $model->years_of_exp ?></h4>
                                </div>
                                <div class="col-lg-6 col-xlg-6 col-md-6 ">
                                    <small class="text-muted">Consultation Fees </small>
                                    <h4><?= $model->fee ?></h4>
                                    <small class="text-muted">Qualification </small>
                                    <h4><?= $model->qualification ?></h4>
                                    <small class="text-muted">License No </small>
                                    <h4><?= $model->license_id ?></h4>
                                    <small class="text-muted">Validation Status </small>
                                    <h4><?= $model->validation_status ?></h4>
                                </div>

                                <div class="col-md-12 col-sm-12 p-20">
                                    <h4 class="card-title">Languages Spoken</h4>
                                    <ul class="list-group">
                                        <?php foreach ($languages As $language){?>
                                            <li class="list-group-item">
                                                <i class="qwikmed-lang-icon fa fa-check-square-o" aria-hidden="true"></i>
                                                <?= Language::findOne($language['language_id'])->name?>
                                            </li>
                                        <?php }?>
                                    </ul>
                                </div>
                            </div>
                            <p class="ml-3">
                                <?= Html::a('<i class="fa fa-eraser" aria-hidden="true"></i> Update Details', ['update', 'id' => $model->doctor_id], ['class' => 'btn btn-success']) ?>
                                <?= Html::a('<i class="fa fa-trash" aria-hidden="true"></i> Delete Doctor', ['delete', 'id' => $model->doctor_id], [
                                    'class' => 'btn btn-danger',
                                    'data' => [
                                        'confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
