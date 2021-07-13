<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Goroda */

$this->title = 'Create Goroda';
$this->params['breadcrumbs'][] = ['label' => 'Gorodas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goroda-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
