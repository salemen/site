<?php

namespace app\models;

use Yii;


class Message extends \yii\db\ActiveRecord
{
    
	
    public static function tableName()
    {
        return 'message';
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
            'login-moy' => 'логин мой',
			'login-in' => 'логин его',
            'text-moy' => 'текст мой',
			'text-in' => 'текст его',
			'img' => 'изображение',
			'name' => 'название',
			'data' => 'дата',
        ];
    }
}
