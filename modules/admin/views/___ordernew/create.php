<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\ordernew */

$this->title = 'Create Ordernew';
$this->params['breadcrumbs'][] = ['label' => 'Ordernews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordernew-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
