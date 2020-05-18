<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MembershipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */



$formatter = \Yii::$app->formatter;
?>
<section class="nogamu-content-header content-header">
    <h3>
        <span class="nogamu-header-text">Suppliers & Products</span>
        <small>List of all the quantities of products supplied</small>
    </h3>
</section>

<div class="membership-index box box-success">
    <div style="margin: 20px">
        <table class="table table-striped" id="records_list">
            <thead>
            <tr>
                <th>Supplier</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($productTracks AS $productTrack) {
               $product = \common\models\Product::findOne($productTrack['product_id']);
                $supplier = \common\models\Membership::findOne($productTrack['supplier_id']);
                ?>
                <tr>
                    <th> <?= $supplier['name']; ?></th>
                    <td> <?= $product['name']; ?>  </td>
                    <td> <?= $productTrack['quantity']; ?>  </td>
                    <td> <?= $product['price']; ?>  </td>
                    <td> <?= $formatter->asDate($productTrack['created_at'], 'long'); ?> </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>







