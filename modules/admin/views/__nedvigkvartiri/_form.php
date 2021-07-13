<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\NedvigKvartiri */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nedvig-kvartiri-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    
    <table class="table table-hover table-striped">
        
 <tr>
   <td><?= $form->field($model, 'oblast_region')->textarea(['rows' => 1]) ?></td>

   <td><?= $form->field($model, 'gorod')->textarea(['rows' => 1]) ?></td>

   <td><?= $form->field($model, 'raion')->textarea(['rows' => 1]) ?></td>
</tr>
<tr>
     <td><?= $form->field($model, 'kolichestvo_komnat')->textInput() ?></td>

    <td><?= $form->field($model, 'operaciya')->textarea(['rows' => 1]) ?></td>

    <td><?= $form->field($model, 'vtorichka_novostroi')->textarea(['rows' => 1]) ?></td>
</tr>

<tr>
   <td><?= $form->field($model, 'street')->textarea(['rows' => 1]) ?></td>

   <td><?= $form->field($model, 'number_doma')->textInput() ?></td>

   <td><?= $form->field($model, 'number_kvartir')->textInput() ?></td>
</tr>
<tr>
   
    <td><?= $form->field($model, 'tip_doma')->textarea(['rows' => 1]) ?></td>

    <td><?= $form->field($model, 'etag')->textInput() ?></td>

    <td><?= $form->field($model, 'etagey_v_dome')->textInput() ?></td>
</tr>
<tr>
    <td><?= $form->field($model, 'plochad_obchy')->textInput() ?></td>

    <td><?= $form->field($model, 'plochad_gilaya')->textInput() ?></td>

    <td><?= $form->field($model, 'plochad_kuxni')->textInput() ?></td>
</tr>

    <?= $form->field($model, 'kadastrovi_nomer')->textarea(['rows' => 1, 'placeholder' => 'желательное, но не обязательное поле']) ?>

    <?= $form->field($model, 'opisanie')->textarea(['rows' => 6]) ?>
<tr>
    <td>  <?= $form->field($model, 'price')->textInput() ?></td>
 </tr>       
   
    </table>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>

</div>
