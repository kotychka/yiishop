<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $country
 * @property string $city
 * @property string $region
 * @property string $address
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'country', 'city', 'region', 'address', 'total', 'products'], 'required'],
            [['name', 'email', 'country', 'city', 'region', 'address'], 'string', 'max' => 254],
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
            'email' => 'Email',
            'country' => 'Country',
            'city' => 'City',
            'region' => 'Region',
            'address' => 'Address',
        ];
    }
}
