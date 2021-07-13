<?php

use yii\helpers\Url;

$this->title = 'Выбор раздела недвижимости';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="nedvig-kvartiri-index">
       
	  <br>
                               <center>
                                   <font face="comic sans ms" >Выберите нужный подраздел недвижимости</font>
                               </center>
     
        <center> 
            
         <a href="<?= Url::to(['nedvigkvartiri/create']) ?>" class="btn btn-primary">Квартиры</a>
         <a href="<?= Url::to(['nedvigdoma/create']) ?>" class="btn btn-primary">Дома / Коттеджи</a> 
         <a href="<?= Url::to(['nedvigkomnati/create']) ?>" class="btn btn-primary">Комнаты</a>
         <a href="<?= Url::to(['nedvigkommercheska/create']) ?>" class="btn btn-primary">Коммерческая недвижимость</a> 
         <a href="<?= Url::to(['nedvigzemli/create']) ?>" class="btn btn-primary">Земельные участки</a>
		 <a href="<?= Url::to(['nedvigbiznes/create']) ?>" class="btn btn-primary">Готовый бизнес</a> 
         <a href="<?= Url::to(['nedviggaragi/create']) ?>" class="btn btn-primary">Гаражи и машиноместа</a> 
         
            
         </center>
    
    <hr>
   </div> 