<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "transaction".
 *
 * @property integer $transaction_id
 * @property integer $party
 * @property integer $amount
 * @property integer $date
 * @property string $type
 */
class Transaction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transaction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['party', 'amount', 'date', 'type'], 'required'],
            [['party', 'amount', 'date'], 'integer'],
            [['type'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'transaction_id' => 'Transaction ID',
            'party' => 'Party',
            'amount' => 'Amount',
            'date' => 'Date',
            'type' => 'Type',
        ];
    }
}
