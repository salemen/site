<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Raion */

$this->title = 'Create Raion';
$this->params['breadcrumbs'][] = ['label' => 'Raions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
