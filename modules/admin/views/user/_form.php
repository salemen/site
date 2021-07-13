<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\models\User;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
 tr{
  max-width: 130px;
} 
 table{
	 width: 100%;
 }
 .user-form div{
	 max-width: 600px;
 }
</style>

<div class="user-form">


    <?php $form = ActiveForm::begin(); ?>
     
	  <?php 
		        $username = Yii::$app->user->identity['username'];
				 $idn = $_GET['id'];
				 if ($idn){
				 $username1= user::find()->where(['id' => $idn])->andWhere(['username' => $username])->all();}?>
				 
				 <?php if ($username1||!$idn||$username=='sarmetradmin'){?> 	
     
   <center><table class="table table-hover table-striped"> 
    <!--$form->field($model, 'password')->passwordInput(['maxlength' => true]) -->
<tr>
    <?= $form->field($model, 'name')->input('name') ?>
</tr>
<tr>
    <?= $form->field($model, 'email')->input('email') ?>
</tr>
<tr>
    <?= $form->field($model, 'telephone')->input('tel') ?>
</tr>
<tr>
    <?= $form->field($model, 'gorod')->textInput(['placeholder' => 'Обязательное поле']) ?>
</tr>
<tr>
    <?= $form->field($model, 'adress')->textInput(['maxlength' => true]) ?>
</tr>
<tr>
    <?= $form->field($model, 'opisanie')->textarea(['rows' => 3]) ?>
</tr>
<tr>
    <?= $form->field($model, 'image')->fileInput() ?>
    </tr></table></center>
	
	
    <center><div class="form-group">
        <?= Html::submitButton('Сохранить изменения', ['class' => 'btn btn-success']) ?>
    </div></center>

   <?php } else { ?> 
		
		<center><?php echo 'Такого логина нет'; }?></center>

    <?php ActiveForm::end(); ?>

</div>
