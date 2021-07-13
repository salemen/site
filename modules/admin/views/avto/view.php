<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Avto */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Avtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="avto-view">

    <h3>Объявление № <?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы дейстивительно хотите удалить это объявление?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'parent_id',
            'data',
            'username',
            'tip',
            'marka',
            'model',
            'god',
            'probeg',
            'korobka',
            'kuzov',
            'dvigatel',
            'privod',
            'sostoyanie',
            'opisanie',
            'price',
            'image',
            'gallery',
        ],
    ]) ?>

</div>
