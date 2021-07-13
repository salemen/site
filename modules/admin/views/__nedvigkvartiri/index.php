<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Квартиры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nedvig-kvartiri-index">

    <h3><?= Html::encode($this->title) ?></h3></br><h4>Здесь показаны краткие описание Ваших объявлений</h4>

    <p>
        <?= Html::a('Добавить объявление', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'type:ntext',
            'operaciya:ntext',
            //'vtorichka_novostroi:ntext',
            //'oblast_region:ntext',
            'gorod:ntext',
            //'raion:ntext',
            'street:ntext',
            'number_doma',
            //'number_kvartir',
            'kolichestvo_komnat',
            //'tip_doma:ntext',
            //'etag',
            //'etagey_v_dome',
            //'plochad_obchy',
            //'plochad_gilaya',
            //'plochad_kuxni',
            //'kadastrovi_nomer:ntext',
            'opisanie:ntext',
            'price',
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
