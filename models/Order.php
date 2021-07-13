<?php

namespace app\models;
use yii\db\ActiveRecord;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

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
 * @property string $address
 */
class Order extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }
    
    public function getOrderItems(){
        return $this->hasMany(OrderItems::ClassName(), ['order_id' =>'id']);  
   
    }
    
    public function behaviors () {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'city','index','region','area','street','house_number','apartment_number'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['qty'], 'integer'],
            [['sum'], 'number'],
            [['status'], 'boolean'],
            [['name', 'email', 'phone', 'city'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
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
            'name' => 'Фамилия Имя Отчество',
            'email' => 'E-mail',
            'phone' => 'Телефон',
            'index' => 'Индекс',
            'region' => 'Регион, область',
            'area' => 'Район',
            'city' => 'Город',
            'street' => 'Улица',
            'house_number' => 'Номер дома',
            'apartment_number' => 'Номер квартиры',
        ];
    }
}
