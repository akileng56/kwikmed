<?php

use yii\helpers\Url;
use yii\helpers\Html;

?>

<section class="doctor-index qwikmed-header-text">
    <h1>Doctors</h1>
    <small>All doctor registered in the system</small>
</section>

<p>
    <?= Html::a('<i class="mdi mdi-plus-circle"></i> Create Doctor', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<div class="box box-success">
    <div style="margin: 20px">
        <table class="table table-striped qwikmed-table" id="records">
            <thead>
            <tr>
                <th>FullName</th>
                <th>Speciality</th>
                <th>Hospital</th>
                <th>Years of Exp</th>
                <th>License No</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($doctors AS $doctor) { ?>
                <tr>
                    <td> <?= $doctor['fullname']; ?>  </td>
                    <td> <?= $doctor['speciality']; ?>  </td>
                    <td> <?= $doctor['hospital']; ?>  </td>
                    <td> <?= $doctor['years_of_exp']; ?>  </td>
                    <td> <?= $doctor['license_id']; ?>  </td>
                    <td>
                        <a href='<?= Url::to(['doctor/view', 'id' => $doctor['doctor_id']]); ?>' class='btn btn-default'>
                            <i class='fa fa-eye'></i> view
                        </a>
                    </td>
                    <td>
                        <a href='<?= Url::to(['doctor/update', 'id' => $doctor['doctor_id']]); ?>' class='btn btn-default'>
                            <i class='fa fa-pencil'></i> Edit
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>