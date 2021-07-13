<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Автомобили / Админ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="avto-index">

    <h4><u><center>Ваши объявления. Выберите раздел.</center></u></h4>

    <p>
        <!--Html::a('Добавить легковые', ['<a href=" \yii\helpers\Url::to(['avtoleg/create'])">'], ['class' => 'btn btn-success'])--> 
        <center> 
         <a href="<?= yii\helpers\Url::to(['avtoleg/index']) ?>" class="btn btn-success">Легковые</a> | 
         <a href="<?= yii\helpers\Url::to(['avtogruz/index']) ?>" class="btn btn-success">Грузовые</a> | 
         <a href="<?= yii\helpers\Url::to(['avtospec/index']) ?>" class="btn btn-success">Спецтехника</a> | 
         <a href="<?= yii\helpers\Url::to(['avtomoto/index']) ?>" class="btn btn-success">Мототехника</a> | 
         <a href="<?= yii\helpers\Url::to(['avtokomplekt/index']) ?>" class="btn btn-success">Комплектующие</a> | 
         <a href="<?= yii\helpers\Url::to(['avtovodnik/index']) ?>" class="btn btn-success">Водный транспорт</a>
         
         </center>
    </p>

 <hr>
   
</div>
