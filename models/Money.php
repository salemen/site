<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "money".
 *
 * @property int $id
 * @property int $summa
 * @property string $oplataDate
 * @property int $result
 * @property string $komment
 */
class Money extends \yii\db\ActiveRecord
{
   
   public function behaviors() {
      return [
          'timestamp' => [
              'class' => TimestampBehavior::className(),
              'attributes' => [
              ActiveRecord::EVENT_BEFORE_INSERT => ['oplataDate'],
                  
              ],
              'value' => new Expression('NOW()'),
          ]
      ];
   }
   
   
    public static function tableName()
    {
        return 'money';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['summa', 'result'], 'required'],
            [['summa', 'result'], 'integer'],
            [['oplataDate'], 'safe'],
            [['komment'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
           
            'summa' => 'Сумма',
            'oplataDate' => 'Дата оплаты',
            'result' => 'Результат',
            'komment' => 'Комментарий',
        ];
    }
}
