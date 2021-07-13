<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\NedvigKomnati */

$this->title = 'Редактировать объявление № ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nedvig Komnatis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nedvig-komnati-update">

   <center> <h4><?= Html::encode($this->title) ?></h4> </center>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
