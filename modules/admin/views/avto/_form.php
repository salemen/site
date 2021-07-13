<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Avto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="avto-form">
<table>
    <?php $form = ActiveForm::begin(); ?>
    
      <table>
        <tr>
            <td><?php $username = Yii::$app->user->identity['username']?>

                <?= $form->field($model, 'username')->textinput(['value'=>$username, 'readonly'=>1]) ?></td>
        </tr>
      </table>

  <table class="table table-hover table-striped">
     <tr>  
    <td><?= $form->field($model, 'tip')->textInput(['maxlength' => true]) ?></td>

    <td><?= $form->field($model, 'marka')->textInput(['maxlength' => true]) ?></td>
    </tr>

    <tr>
    <td><?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?></td>

    <td><?= $form->field($model, 'god')->textInput(['maxlength' => true]) ?></td>
    </tr>
<tr>
   <td> <?= $form->field($model, 'probeg')->textInput() ?></td>

    <td><?= $form->field($model, 'korobka')->textInput(['maxlength' => true]) ?></td>
</tr>
<tr>
   <td> <?= $form->field($model, 'kuzov')->textInput(['maxlength' => true]) ?></td>

   <td><?= $form->field($model, 'dvigatel')->textInput(['maxlength' => true]) ?></td>
</tr>    
<tr>
    <td><?= $form->field($model, 'privod')->textInput(['maxlength' => true]) ?></td>

    <td> <?= $form->field($model, 'sostoyanie')->textInput(['maxlength' => true]) ?></td>
</tr>
       
    <?= $form->field($model, 'opisanie')->textarea(['rows' => 6]) ?>
<tr>
    <td><?= $form->field($model, 'price')->textInput() ?></td>
</tr>
  
   <tr>
   <td><?= $form->field($model, 'image')->fileInput() ?> </td>
   </tr>
   <tr>
   <td><?= $form->field($model, 'gallery[]')->fileInput(['multiple'=> true, 'accept'=>'image/*']) ?> Не более 6-ти за раз. </td>
 </tr>  
 
</table>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
