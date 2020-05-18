<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $amount
 * @property string $delivery_type
 * @property string $status
 * @property string $payment_type
 * @property string $delivery_address
 * @property integer $created_at
 * @property integer $updated_at
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'amount'], 'required'],
            [['user_id', 'amount', 'created_at', 'updated_at'], 'integer'],
            [['delivery_type', 'status', 'payment_type', 'delivery_address'], 'string'],
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
            'user_id' => 'User ID',
            'amount' => 'Amount',
            'delivery_type' => 'Delivery Type',
            'status' => 'Status',
            'payment_type' => 'Payment Type',
            'delivery_address' => 'Delivery Address',
            'created_at' => 'Created On',
            'updated_at' => 'Updated On',
        ];
    }
}
