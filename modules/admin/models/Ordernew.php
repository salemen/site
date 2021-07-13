<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property string $id
 * @property string $created_at
 * @property string $updated_at
 * @property int $qty
 * @property double $sum
 * @property string $status
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $index
 * @property string $region
 * @property string $area
 * @property string $city
 * @property string $street
 * @property int $house number
 * @property int $apartment number
 */
class Ordernew extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'qty', 'sum', 'name', 'email', 'phone', 'index', 'region', 'area', 'city', 'street', 'house number', 'apartment number'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['qty', 'house number', 'apartment number'], 'integer'],
            [['sum'], 'number'],
            [['status'], 'string'],
            [['name', 'email', 'phone', 'index', 'region', 'area', 'city', 'street'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'qty' => 'Qty',
            'sum' => 'Сумма',
            'status' => 'Статус',
            'name' => 'Имя',
            'email' => 'E-mail',
            'phone' => 'Телефон',
            'index' => 'Индекс',
            'region' => 'Регион',
            'area' => 'Район',
            'city' => 'Город',
            'street' => 'Улица',
            'house_number' => 'Номер дома',
            'apartment_number' => 'Номер квартиры',
        ];
    }
}
