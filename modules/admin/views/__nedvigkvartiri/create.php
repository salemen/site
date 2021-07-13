<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\NedvigKvartiri */

$this->title = 'Create Nedvig Kvartiri';
$this->params['breadcrumbs'][] = ['label' => 'Nedvig Kvartiris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nedvig-kvartiri-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
