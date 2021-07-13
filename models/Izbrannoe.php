<?php

namespace app\models;

use Yii;


class Izbrannoe extends \yii\db\ActiveRecord
{
    
	
    public static function tableName()
    {
        return 'izbrannoe';
    }

    /**
     * {@inheritdoc}
     */
  
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'login' => 'Логин',
            'text' => 'Ссылка',
			'data' => 'Дата',
        ];
    }
}
