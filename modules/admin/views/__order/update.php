<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\order */

$this->title = 'Update Order: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-update">

    <h2>Редактирование заказа № <?= $model->id ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
