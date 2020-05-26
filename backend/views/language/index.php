<?php

use yii\helpers\Url;
use yii\helpers\Html;

?>

<section class="language-index qwikmed-header-text">
    <h1>Languages</h1>
    <small>Common languages spoken in uganda</small>
</section>

<p>
    <?= Html::a('<i class="mdi mdi-plus-circle"></i> Create Language', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<div class="box box-success">
    <div style="margin: 20px">
        <table class="table table-striped qwikmed-table" id="records">
            <thead>
            <tr>
                <th>Language No</th>
                <th>
                    Name
                </th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($languages AS $language) { ?>
                <tr>
                    <td> <?= $language['id']; ?>  </td>
                    <td> <?= $language['name']; ?>  </td>
                    <td>
                        <a href='<?= Url::to(['language/update', 'id' => $language['id']]); ?>' class='btn btn-default'>
                            <i class='fa fa-pencil'></i> Edit
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>