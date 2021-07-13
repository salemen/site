<?php


use yii\helpers\Url;

$this->title = 'Выбор типа сделки';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="nedvig-kvartiri-index">
       
	  <br>
                               <center>
                                   <font face="comic sans ms" >Вы хотите....</font>
                               </center>
     
        <center> 
            
         <a href="<?= Url::to(['nedvigkvartiri/create']) ?>" class="btn btn-primary">Продать</a>
         <a href="<?= Url::to(['nedvigdoma/create']) ?>" class="btn btn-primary">Сдать в аренду</a> 
         <a href="<?= Url::to(['nedvigkomnati/create']) ?>" class="btn btn-primary">Купить</a>
         <a href="<?= Url::to(['nedvigkommercheska/create']) ?>" class="btn btn-primary">Арендовать</a> 
         
         
            
         </center>
    
    <hr>
   </div> 