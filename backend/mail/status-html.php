<?php
use yii\helpers\Html;
use common\models\Product;
/* 
 * Notifcation emails for a ticket
 */
$url = HELP_BASE_PATH.'membership';
?>
<div class="password-reset">
    <p>Hello <strong><?= Html::encode($user->firstname) ?></strong>,</p>

    <p>Your order No:<b>#<?= $order->id ?></b> of amount: <b>UGX - <?= $order->amount ?></b> has been <b><?= $status ?>.</b></p>
    <table>
        <thead>
        <tr>
            <th style="padding-right: 40px;"></th>
            <th style="padding: 0 40px;">Product</th>
            <th style="padding: 0 40px;">Quantity</th>
            <th>Price</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($orderItems as $orderItem){
            $product = Product::findOne($orderItem['product_id'])
            ?>
            <tr>
                <?php $imgUrl = HELP_BASE_PATH.'backend/attachments/'.$product->getImage($product->id); ?>
                <th><img src="<?= $imgUrl ?>" alt="" style="height: 70px;object-fit: contain;"></th>
                <td style="text-align: center;"> <?= $product['name']; ?>  </td>
                <td style="text-align: center;"> <?= $orderItem['quantity']; ?>  </td>
                <td style="text-align: center;"> UGX - <?= $orderItem['quantity']*$orderItem['price']; ?>  </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
