<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $price
 * @property string $created_at
 * @property string $img
 * @property string $hot
 * @property string $status
 * @property string $stock
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ["id"
            => "category_id"]);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'price'], 'required'],
            [['description', 'status'], 'string'],
            [['price'], 'number'],
            [['created_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['img'], 'file', 'extensions'
                => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'price' => 'Price',
            'created_at' => 'Created At',
            'status' => 'Status',
        ];
    }

    public function formatPrice()
    {
        return $this->price . " $";
    }

    public function imageBig()
    {
        return "/uploads/" . $this->img;
    }
}
