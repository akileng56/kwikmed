<?php

use yii\helpers\Url;
use yii\helpers\Html;

?>

<section class="symptom-index qwikmed-header-text">
    <h1>Symptoms</h1>
    <small>Common symptoms for most conditions</small>
</section>

<p>
    <?= Html::a('Create Symptom', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<div class="box box-success">
    <div style="margin: 20px">
        <table class="table table-striped qwikmed-table" id="records">
            <thead>
            <tr>
                <th>Symptom No</th>
                <th>
                    Name
                </th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($symptoms AS $symptom) { ?>
                <tr>
                    <td> <?= $symptom['symptom_id']; ?>  </td>
                    <td> <?= $symptom['name']; ?>  </td>
                    <td>
                        <a href='<?= Url::to(['symptom/update', 'id' => $symptom['symptom_id']]); ?>' class='btn btn-default'>
                            <i class='fa fa-pencil'></i> Edit
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>