<?php

use yii\helpers\Url;
use yii\helpers\Html;
use common\models\User;

$formatter = \Yii::$app->formatter;
?>

<section class="doctor-index qwikmed-header-text">
    <h1>Patients</h1>
    <small>All patients registered in the system</small>
</section>

<p>
    <?= Html::a('<i class="mdi mdi-plus-circle"></i> Create Patient', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<div class="box box-success">
    <div style="margin: 20px">
        <table class="table table-striped qwikmed-table" id="records">
            <thead>
            <tr>
                <th>FullName</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Attached to Account</th>
                <th>Relation</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($patients AS $patient) { ?>
                <tr>
                    <td> <?= $patient['fullname']; ?>  </td>
                    <td> <?= date('m/d/Y', $patient['dob']); ?>  </td>
                    <td> <?= $patient['gender']; ?>  </td>
                    <td> <?= User::findOne($patient['user_id'])->phonenumber ; ?>  </td>
                    <td> <?= $patient['relation']; ?>  </td>
                    <td>
                        <a href='<?= Url::to(['patient/view', 'id' => $patient['patient_id']]); ?>' class='btn btn-default'>
                            <i class='fa fa-eye'></i> view
                        </a>
                    </td>
                    <td>
                        <a href='<?= Url::to(['patient/update', 'id' => $patient['patient_id']]); ?>' class='btn btn-default'>
                            <i class='fa fa-pencil'></i> Edit
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>