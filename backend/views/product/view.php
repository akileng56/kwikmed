<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Membership;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$formatter = \Yii::$app->formatter;
?>
<div class="product-view">

    <h1><?= Html::encode($model->name) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Add stock', ['add', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Remove stock', ['remove', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'description:ntext',
            'price',
            'quantity',
            'created_at:date'
        ],
    ]) ?>

</div>

<h1><?= Html::encode('Stock Trail') ?></h1>
<div class="box box-success">
    <div style="margin: 20px">
        <table class="table table-striped" id="records_list">
            <thead>
            <tr>
                <th>Action</th>
                <th>
                    Quantity
                </th>
                <th>
                    Created By
                </th>
                <th>
                    Created on
                </th>
                <th>
                    Supplier's Name
                </th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($productTracks AS $productTrack) {
                 $supplier = Membership::find()->where(['id'=>$productTrack['supplier_id']])->one();
                 $user = User::find()->where(['id'=>$productTrack['user_id']])->one();
                 $createdDate = $formatter->asDate($productTrack->created_at, 'long');
                ?>
                <tr>
                    <th><?= $productTrack['action']; ?></th>
                    <td> <?= $productTrack['quantity']; ?>  </td>
                    <td> <?= $user['firstname'].' '.$user['lastname']; ?>  </td>
                    <td> <?= $createdDate; ?>  </td>
                    <td> <?= $supplier['name']; ?>  </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>