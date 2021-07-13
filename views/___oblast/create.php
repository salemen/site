<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Oblast */

$this->title = 'Create Oblast';
$this->params['breadcrumbs'][] = ['label' => 'Oblasts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oblast-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
