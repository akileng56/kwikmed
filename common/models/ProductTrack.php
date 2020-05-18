<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_track".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $quantity
 * @property string $action
 * @property integer $user_id
 * @property integer $supplier_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class ProductTrack extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_track';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'quantity', 'action', 'user_id'], 'required'],
            [['product_id', 'quantity', 'user_id', 'supplier_id', 'created_at', 'updated_at'], 'integer'],
            [['action'], 'string', 'max' => 64],
            [['created_at'], 'default', 'value' => time()],
            [['updated_at'], 'default', 'value' => time()],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'quantity' => 'Quantity',
            'action' => 'Action',
            'user_id' => 'User ID',
            'supplier_id' => 'Supplier ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
