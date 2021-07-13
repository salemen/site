<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Raion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="raion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_raion')->textInput() ?>

    <?= $form->field($model, 'raion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
