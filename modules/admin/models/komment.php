<?php
 
namespace app\modules\admin\models;
use yii\db\ActiveRecord; // подключаем ActiveRecord потому что будем работать с базой данных
 
class komment extends \yii\db\ActiveRecord {
	
    // добавляем метод tableName потому что у нас таблица называется не как модель
    public static function tableName()
    {
        return "komment";
    }
	
	
	 public function rules()
    {
        return [
            [['komment','login'], 'string'],
        ];
    }
	
	 public function attributeLabels()
    {
        return [
            'login' => 'Логин',
            'komment' => 'Комментарий',
        ];
    }
}
 
?>