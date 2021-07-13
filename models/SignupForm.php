<?php
namespace app\models;
use yii\base\Model;

class SignupForm extends Model{
 
 public $username;
 public $password;
 public $telephone;
 public $email;
 public $verifyCode;
 
  public function rules() {
 return [
 [['username', 'password','telephone'], 'required', 'message' => 'Заполните поле'],
 ['username', 'unique', 'targetClass' => User::className(),  'message' => 'Этот логин уже занят'],
 [['email',], 'string', 'max' => 50],
 [['username',], 'string', 'max' => 20],
 [['telephone',], 'string', 'max' => 20],
 //['verifyCode', 'captcha'],
 ];
 }
 
 public function attributeLabels() {
 return [
 'username' => 'Придумайте Логин',
 'password' => 'Придумайте Пароль',
 'telephone' => 'Ваш номер телефона',
 'email' => 'Электронная почта',
 'verifyCode' => 'Введите код',
 ];
 }
 
}