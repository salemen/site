<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $telephone
 * @property string $gorod
 * @property string $adress
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string $role
 * @property string $opisanie
 * @property string $image
 */
class User extends \yii\db\ActiveRecord
{
    public $image;
    public $gallery;
    
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
     
    
    public function rules()
    {
        return [
            [['telephone', 'gorod'], 'required'],
            [['telephone', 'status', 'created_at', 'updated_at'], 'integer'],
			[['name'], 'string', 'max' => 50],
            [['username', 'password', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'gorod', 'adress', 'role', 'opisanie'], 'string', 'max' => 255],
            
            [['image'],'file','extensions'=> 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Ваш логин',
            'password' => 'Пароль',
			'date' => 'Дата регистрации',
            'auth_key' => 'Запомнить',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
			'name' => 'Ваше имя или название компании',
            'email' => 'E-mail',
            'telephone' => 'Телефон',
            'gorod' => 'Город/Поселок',
            'adress' => 'Адрес',
            'status' => 'Статус',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'role' => 'Роль',
            'opisanie' => 'Описание Вашего профиля',
            'image' => 'Фото',
        ];
    }
    
    public function upload(){
        if($this->validate ()){
            $path = 'upload/store/'.$this->image->baseName.'.'.$this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path, true);
            @unlink($path);
            return true;
        }else{
            return false;
        }
                
    }
    
    public function uploadGallery(){
        if($this->validate ()){
            foreach ($this->gallery as $file){
                $path = 'upload/store/'.$file->baseName.'.'.$file->extension;
            $file->saveAs($path);
            $this->attachImage($path);
            @unlink($path);
                
            }
            
            return true;
        }else{
            return false;
        }
                
    }
}
