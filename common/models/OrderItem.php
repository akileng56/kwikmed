<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_item".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $product_id
 * @property integer $price
 * @property integer $quantity
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 */
class OrderItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'price', 'quantity', 'created_at', 'updated_at'], 'integer'],
            [['status'],'string'],
            [['created_at'],'default', 'value' => time()],
            [['updated_at'],'default', 'value' => time()]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'product_id' => 'Product ID',
            'price' => 'Price',
            'quantity' => 'Quantity',
            'created_at' => 'Created On',
            'updated_at' => 'Updated On',
            'status' => 'Status',
        ];
    }
}
