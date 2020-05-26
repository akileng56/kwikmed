<?php

use yii\helpers\Url;
use yii\helpers\Html;

?>

<section class="speciality-index qwikmed-header-text">
    <h1>Specialities</h1>
    <small>Common specialities a doctor can belong to</small>
</section>

<p>
    <?= Html::a('Create Speciality', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<div class="box box-success">
    <div style="margin: 20px">
        <table class="table table-striped qwikmed-table" id="records">
            <thead>
            <tr>
                <th>Speciality No</th>
                <th>Name</th>
                <th>Upper Bound Fee</th>
                <th>Lower Bound Fee</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($specialities AS $speciality) { ?>
                <tr>
                    <td> <?= $speciality['speciality_id']; ?>  </td>
                    <td> <?= $speciality['name']; ?>  </td>
                    <td> <?= $speciality['upper_bound_fee']; ?>  </td>
                    <td> <?= $speciality['lower_bound_fee']; ?>  </td>
                    <td>
                        <a href='<?= Url::to(['speciality/update', 'id' => $speciality['speciality_id']]); ?>' class='btn btn-default'>
                            <i class='fa fa-pencil'></i> Edit
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>