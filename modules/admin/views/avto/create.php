<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Avto */

$this->title = 'Добавить (редактировать) объявление: Автомобили';
$this->params['breadcrumbs'][] = ['label' => 'Avtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="avto-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
