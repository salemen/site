<?php


use yii\helpers\Url;

$this->title = 'Выбор раздела Автотехники';
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="avtoleg-index">
    <br>
                        <center>
                                   <font face="comic sans ms" >Выберите нужный подраздел автотехники </font>
                        </center>
     
        <!--Html::a('Добавить легковые', ['<a href=" \yii\helpers\Url::to(['avtoleg/create'])">'], ['class' => 'btn btn-success'])--> 
        <center> 
            
         <a href="<?= Url::to(['avtoleg/create']) ?>" class="btn btn-success">Легковые</a>
         <a href="<?= Url::to(['avtogruz/create']) ?>" class="btn btn-success">Грузовые/Автобусы</a>
         <a href="<?= Url::to(['avtospec/create']) ?>" class="btn btn-success">Спецтехника</a>
         <a href="<?= Url::to(['avtomoto/create']) ?>" class="btn btn-success">Мототехника</a>
         <a href="<?= Url::to(['avtokomplekt/create']) ?>" class="btn btn-success">Комплектующие и автозапчасти</a>
         <a href="<?= Url::to(['avtovodnik/create']) ?>" class="btn btn-success">Водный транспорт</a>
            
         </center>
     
<hr>
</div>