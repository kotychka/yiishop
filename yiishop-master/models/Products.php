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
 * @property string $hot
 * @property string $image
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
        return $this->hasOne(Categories::className(), ["id" => "category_id"]);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'price'], 'required'],
            [['description'], 'string'],
            [['price'], 'number'],
            [['created_at'], 'safe'],
            [['title'], 'string', 'max' => 254],
            [['status', 'image'], 'safe'],
            // [['image'], 'file'],
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
        ];
    }

    public function formatPrice()
    {
        return $this->price . " $";
    }

    public function imageOriginal()
    {
        return "/uploads/" . $this->image;
    }

    public function imageThumb()
    {
        if ($this->image == "") {
            return false;
        }

        return "/uploads/thumbs/" . $this->image;
    }
}
