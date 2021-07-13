<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use app\assets\AppAsset;

AppAsset::register($this);

$this->title = 'Войдите в Личный Кабинет';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
.btn1 {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 7px;
    font-size: 16px;
    font-weight: normal;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 2px solid transparent;
	border-color: #198c19;
    border-radius: 14px;
    margin-top: 8px;
}

.btn1:hover {
	border: 2px solid transparent;
	border-color: #ffd8a4;
	color: #fff!important;
    background-color: #198c19!important;
	text-decoration: none;
}

.container {
    padding-right: 5px;
    padding-left: 5px;
    margin-right: 5px;
    margin-left: 5px;
}

.form-control {
	padding-right: 10px!important;
    padding-left: 10px!important;
}
.col-sm-6{
	padding-right: 15px!important;
    padding-left: 15px!important;
}
.control-label{
	 padding-left: 15px!important;
}
</style>


<hr>
<center>
<div class="site-login container">
    <center><h5>Для размещения объявлений</h5><h4><?= Html::encode($this->title) ?> или <a href="<?= yii\helpers\Url::to (['/site/signup']) ?>"class="btn1 btn-default"><i class="fa fa-crosshairs "></i>  Зарегистрируйтесь</a></h4></center>

  <hr>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
       
    ]); ?>

       <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>
				

        <?= $form->field($model, 'rememberMe')->checkbox() ?>

        <div class="form-group">
           
               <center> <?= Html::submitButton('Войти в Личный кабинет', ['class' => 'btn btn-success', 'name' => 'login-button']) ?> </center>
           
        </div>
    
    <!-- Виджет Авторизации, регистрация -->
    
  <hr>

    <?php ActiveForm::end(); ?>

    <br><br><br>
   
</div>
</center>
