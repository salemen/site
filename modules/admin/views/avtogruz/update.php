<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Avtogruz */

$this->title = 'Редактировать объявление № ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Avtogruzs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="avtogruz-update">

    <center><h4><?= Html::encode($this->title) ?></h4></center>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
