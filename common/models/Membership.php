<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "membership".
 *
 * @property string $name
 * @property string $address
 * @property string $location
 * @property string $telephone
 * @property string $email
 * @property string $contact_person
 * @property string $mobileno
 * @property string $certifier
 * @property string $certification_status
 * @property string $membership_status
 * @property string $products
 * @property string $remarks
 * @property string $category
 * @property integer $id
 * @property string $subscription_category
 */
class Membership extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'membership';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address', 'location', 'telephone', 'contact_person', 'mobileno', 'category','subscription_category'], 'required'],
            [['contact_person','email','name', 'address', 'location', 'telephone', 'mobileno', 'certifier', 'certification_status', 'membership_status', 'products', 'remarks', 'category'], 'string'],
            [['id'], 'integer'],
            [['email'], 'email']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Company Name',
            'address' => 'Address',
            'location' => 'Location',
            'telephone' => 'Telephone',
            'email' => 'Email',
            'contact_person' => 'Contact Person',
            'mobileno' => 'Mobile Number',
            'certifier' => 'Certifier',
            'certification_status' => 'Are You Certified',
            'membership_status' => 'Membership Status',
            'products' => 'Products',
            'remarks' => 'Remarks',
            'category' => 'Category',
            'id' => 'ID',
            'subscription_category' => 'Subscription Category'
        ];
    }

    public static function getAllMemberships() {
        return Membership::find()->asArray()->all();
    }

    public static function getApprovedSuppliers(){
        return Membership::find()->where(['category'=>'supplier'])->andWhere(['membership_status'=>'Approved'])->all();
    }
}
