<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ordernews';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordernew-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ordernew', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'created_at',
            'updated_at',
            'qty',
            'sum',
            //'status',
            //'name',
            //'email:email',
            //'phone',
            //'index',
            //'region',
            //'area',
            //'city',
            //'street',
            //'house number',
            //'apartment number',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
