<?php

use yii\helpers\Url;

$this->title = 'Выбор типа дома';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="nedvig-kvartiri-index">
       
	  <br>
                               <center>
                                   <font face="comic sans ms" >Тип дома....</font>
                               </center>
     
        <center> 
            
         <a href="<?= Url::to(['nedvigkvartiri/create']) ?>" class="btn btn-primary">Вторичка</a>
         <a href="<?= Url::to(['nedvigdoma/create']) ?>" class="btn btn-primary">Новостройка</a> 
        
            
         </center>
    
    <hr>
   </div> 