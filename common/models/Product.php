<?php

namespace common\models;

use Yii;


/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $price
 * @property integer $quantity
 * @property integer $created_at
 * @property integer $updated_at
 *
 *
 */
class Product extends \yii\db\ActiveRecord implements CartPositionInterface
{
    public $attachments = null;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'price'], 'required'],
            [['description'], 'string'],
            [['price', 'quantity', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['created_at'], 'default', 'value'=> time()],
            [['updated_at'], 'default', 'value'=> time()],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'price' => 'Price',
            'quantity' => 'Quantity',
            'created_at' => 'Created On',
            'updated_at' => 'Updated On',
        ];
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getImage($id){
        $imageUrl = 'default.png';
        $Image = ProductImage::find()->where(['product_id' => $id])->one();
        if($Image){
            $imageUrl = $Image->uploaded_file;
        }
      return $imageUrl;
    }

    public function getCost($withDiscount = true){
        return ($this->quantity * $this->price);
    }

    public static function getAllProducts() {
        return Product::find()->orderBy('created_at DESC')->asArray()->all();
    }

    public function setQuantity($quantity){
        return $this->quantity = $quantity;
    }

}
