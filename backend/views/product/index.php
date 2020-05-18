<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MembershipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */




?>
<section class="nogamu-content-header content-header">
    <h3>
        <span class="nogamu-header-text">All Products</span>
        <small>List of all the registered products</small>
    </h3>
</section>

<p>
    <?= Html::a('Create new product', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<div class="membership-index box box-success">
    <div style="margin: 20px">
        <table class="table table-striped" id="records_list">
            <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Description</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($products AS $product) { ?>
                <tr>
                    <th> <?= $product['name']; ?></th>
                    <td> <?= $product['price']; ?>  </td>
                    <td> <?= $product['quantity']; ?>  </td>
                    <td> <?= $product['description']; ?>  </td>
                    <td>
                        <a href='<?= Url::to(['product/view', 'id' => $product['id']]); ?>' class='btn btn-default'>
                            <i class='fa fa-eye'></i> Details
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>







