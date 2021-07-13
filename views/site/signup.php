
<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use app\assets\AppAsset;

AppAsset::register($this);
$this->title = 'Быстрая регистрация на сайте';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
.container {
    padding-right: 25px;
    padding-left: 25px;
    margin-right: auto;
    margin-left: auto;
}
</style>
<div class="site-login container">
    <hr>
    <h4><center><?= Html::encode($this->title) ?>
    <a href="<?= yii\helpers\Url::to (['/site/login']) ?>"class="btn1 btn-default"> <i class="fa fa-sign-in" aria-hidden="true"></i></a></center>
    </h4>
    <hr>
    
<?php $form = ActiveForm::begin([
       
        'layout' => 'horizontal',
        
    ]); ?>

<?= $form->field($model, 'username') ?>
<?= $form->field($model, 'password')->passwordInput() ?>
<?= $form->field($model, 'telephone')->input('number',['placeholder' => 'Будет виден в объявлениях.']) ?>
 <?= $form->field($model, 'email')->input('email',['placeholder' => 'Необязательное но желательное поле.']) ?>
  <!-- $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) -->

  
<div class="form-group">
 <div>
     <center><?= Html::submitButton('Регистрация на сайте', ['class' => 'btn btn-success']) ?></center>
 </div>
</div>

<hr>

<?php ActiveForm::end() ?>
<br><br><br>
</div>