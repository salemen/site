<?php

/* @var $this \yii\web\АView */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>

                 

                                    <!--------------------------------------->

<!DOCTYPE HTML>
<html lang="<?= Yii::$app->language ?>">
<head>
     <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1.5, user-scalable=no">
     <?=Html::csrfMetaTags() ?>
    <title>Ошибка</title>
	<?=$this->registerMetaTag(['name' => 'keywords', 'content' => 'SaleMen Купи продай и отдыхай. Универсальная, удобная и бесплатная платформа для покупок и продаж. ']);
    $this->registerMetaTag(['name' => 'description', 'content' => 'SaleMen Купи продай и отдыхай. Бесплатная доска объявлений. Универсальная, удобная и бесплатная платформа для покупок и продаж. ']);?>
    <?php $this->head() ?>
    
 
     
   <link rel="shortcut icon" href="/images/faviconka_ss.ico">
	<link rel="stilesheet" href="css/jquery-ui.theme.css">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body style="background-color: rgb(255, 255, 255) !important";>
<?php $this->beginBody() ?>
    
     
     <style> 
	 
	 ul.category-products {
  
    padding: 1px 5px!important;
    margin-top: 5px;
	
	 }
	 
li {
    list-style-type: none; 
   }	 
#blink2 {
  -webkit-animation: blink2 2s linear infinite;
  animation: blink2 1s cubic-bezier(.89,.24,0,1.71) infinite;
}
@-webkit-keyframes blink2 {
  100% { color: rgba(9, 200, 58, 1); }
}
@keyframes blink2 {
  100% { color: rgba(251,8,31,1); }
}
 
  .header-middle1{
	height:43px;
	 width: 100%;
     padding-left: 6px; 
     padding-right: 10px;
}


.btn-warning {
    color: #131212 !important;
}


</style>  
    
	<header id="header">
		
		<?php

		$tdom = 'doma-cottage';
		$tkva = 'vse-kvartiri';
		$tkom = 'komnati';
		$tkomm = 'vsy-kommercheskaya';
		$tucha = 'vse-uchastki';
		$tgarag = 'garagi';
		$tbiznes = 'gotovi-biznes';
		
		$aleg = 'legkovie-avto';
		$agruz = 'gruzovie-avto';
		$aspec = 'spec-tehnika';
		$amoto = 'moto-technika';
		$akompl = 'komplekt-avto';
		$avod = 'vodnii-tranport';
	
	?>
		
		<center><div class="fixed">
		
		<div class="header-bottom" >
			<div class="container">
				<div class="row">
			
					<div id="brands_products2" <div class="col-sm-9" >
				
				    <div class="navbar-header">
					
					
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
                                           
                                            
						<div class="mainmenu pull-left" id="brands_products1">
                                                    
						<ul class="nav navbar-nav collapse navbar-collapse">                 
           			  
                                               
         <li class="dropdown" id="brands_products1"><a><font face="Arial" style="color:#397f8c"><span style="color:#ef7204" ><b>ГЛАВНАЯ </b></font></a>
           
			  <ul role="menu" class="sub-menu">
                <div class="brands-name1">       
			  
			  <li> <a href="<?=\yii\helpers\Url::home()?>" >Доска объявлений<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li>  <a href = "#"></a>	
			    <li> <a href="<?=\yii\helpers\Url::to (['/photo'])?>" >ФотоАльбом объявлений<div style="display: none;"> Краснодара Краснодарского края и юга России</div> </a></li>
			    
				</div>
			  </ul>
            </li> 
			
	<li class="dropdown" id="brands_products2">
           
			  <ul role="menu" class="sub-menu">
                <div class="brands-name1">       
			  
			  <li> <a href="<?=\yii\helpers\Url::home()?>" class="link1">Доска объявлений<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li>
			    <li> <a href="<?=\yii\helpers\Url::to (['/photo'])?>" class="link1">ФотоАльбом объявлений<div style="display: none;"> Краснодара Краснодарского края и юга России</div> </a></li>
			    
				</div>
			  </ul>
            </li> 	
			
           <li class="dropdown"><a href="<?=\yii\helpers\Url::to (['/site/mainned'])?>"><font face="Arial" ><span style="color:#397f8c"><b>НЕДВИЖИМОСТЬ<div style="display: none;"> Краснодара Краснодарского края и юга России</div></b></span></font></a>
		    
			 
			 <ul role="menu" class="sub-menu">
                <div class="brands-name1">   
     
				
     <li><a href="<?=\yii\helpers\Url::to (['/nedvigcategory/8', 'ads' =>$tkva])?>">Квартиры<div style="display: none;"> Краснодара Краснодарского края и юга России</div><div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li>

     <li><a href="<?= \yii\helpers\Url::to(['/nedvigcategory/2', 'ads' =>$tdom])?>">Дома/Коттеджи/Дачи<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li> 
	 
	  <li><a href="<?=\yii\helpers\Url::to (['/nedvigcategory/3', 'ads' =>$tkom])?>">Комнаты</a></li>

     <li><a href="<?= \yii\helpers\Url::to(['/nedvigcategory/19', 'ads' =>$tkomm])?>">Коммерческая<div style="display: none;"> недвижимость Краснодара Краснодарского края и юга России</div></a></li> 
	 
	  <li><a href="<?=\yii\helpers\Url::to (['/nedvigcategory/14', 'ads' =>$tucha])?>">Земельные участки<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li>

     <li><a href="<?= \yii\helpers\Url::to(['/nedvigcategory/6', 'ads' =>$tgarag])?>">Гаражи</a></li> 
	 
	 <li><a href="<?= \yii\helpers\Url::to(['/nedvigcategory/7', 'ads' =>$tbiznes])?>">Готовый бизнес<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li> 
                        </div>                                                         
                                    </ul>
		  
		   </li>

       <li class="dropdown"><a href="<?=Yii::$app->urlManager->createAbsoluteUrl('/site/mainavto');?>"><font face="Arial" ><span style="color:#397f8c"><b>АВТОТЕХНИКА</b></span></font></a>
	  
	    <ul role="menu" class="sub-menu">
                <div class="brands-name1">                         
     <li><a href="<?=\yii\helpers\Url::to (['/avtocategory/1', 'ads' =>$aleg])?>">Легковые</a></li>

     <li><a href="<?= \yii\helpers\Url::to(['/avtocategory/2', 'ads' =>$agruz])?>">Грузовые//Автобусы</a></li> 
	 
	  <li><a href="<?=\yii\helpers\Url::to (['/avtocategory/3', 'ads' =>$aspec])?>">Спецтехника</a></li>

     <li><a href="<?= \yii\helpers\Url::to(['/avtocategory/4', 'ads' =>$amoto])?>">Мототехника</a></li> 
	 
	  <li><a href="<?=\yii\helpers\Url::to (['/avtocategory/5', 'ads' =>$akompl])?>">Комплектующие для авто</a></li>

     <li><a href="<?= \yii\helpers\Url::to(['/avtocategory/6', 'ads' =>$avod])?>">Водный транспорт</a></li> 
		 </div>
		</ul>
	  
	   </li>
			 
	<li class="dropdown"><a href= "<?= yii\helpers\Url::to (['/admin']) ?>"> <font face="Arial"><span style="color:#397f8c"> <b>Личный Кабинет</b></font></a>
	 <ul role="menu" class="sub-menu">
                <div class="brands-name1"> 
				
     
	  <li><a href="<?=\yii\helpers\Url::to (['/admin/dobavit/'])?>">Подать объявление</a></li>   
	  
	   <li><a href="<?=\yii\helpers\Url::to (['/admin/dobavitvashi/'])?>">Ваши объявления</a></li>   
	   
	    <li><a href="<?=\yii\helpers\Url::to (['/admin/user/'])?>">Ваш Профиль</a></li> 

        <?php if (!Yii:: $app->user->isGuest): ?>
                                   
     <li><a href="<?= \yii\helpers\Url::to (['/site/logout'])?>" >Выход</a></li>
                     <?php endif;?> 		

    </div>
		</ul>				
		
	</li>
                                                         
                            
							</ul>
					 </div>
					 
					 <div class="mainmenu pull-left" id="brands_products2">
                                                    
						<ul class="nav navbar-nav collapse navbar-collapse">                 
           			  
                                               
         <li class="dropdown" id="brands_products1"><a><font face="Arial" style="color:#397f8c"><span style="color:#ef7204" ><b>ГЛАВНАЯ </b></font></a>
           
			  <ul role="menu" class="sub-menu">
                <div class="brands-name1">       
			  
			  <li> <a href="<?=\yii\helpers\Url::home()?>" >Доска объявлений<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li>
			    <li> <a href="<?=\yii\helpers\Url::to (['/photo'])?>" >ФотоАльбом объявлений<div style="display: none;"> Краснодара Краснодарского края и юга России</div> </a></li>
			    
				</div>
			  </ul>
            </li> 
			
	<li class="dropdown" id="brands_products2">
           
			  <ul role="menu" class="sub-menu">
                <div class="brands-name1">       
			  
			  <li> <a href="<?=\yii\helpers\Url::home()?>" >Доска объявлений<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li>
			    <li> <a href="<?=\yii\helpers\Url::to (['/photo'])?>" >ФотоАльбом объявлений<div style="display: none;"> Краснодара Краснодарского края и юга России</div> </a></li>
			    
				</div>
			  </ul>
            </li> 	
			
	<li class="dropdown">
	 <ul role="menu" class="sub-menu">
                <div class="brands-name1"> 
				
     
	  <li><a href="<?=\yii\helpers\Url::to (['/admin/dobavit/'])?>">Подать объявление</a></li>   
	  
	   <li><a href="<?=\yii\helpers\Url::to (['/admin/dobavitvashi/'])?>">Ваши объявления</a></li>   
	   
	    <li><a href="<?=\yii\helpers\Url::to (['/admin/user/'])?>">Личный Кабинет</a></li> 

       
    </div>
		</ul>				
		
	</li>
                                                         
               		
			
           <li class="dropdown"><a href="<?=\yii\helpers\Url::to (['/site/mainned'])?>"><font face="Arial" ><span style="color:#397f8c"><b>НЕДВИЖИМОСТЬ<div style="display: none;"> Краснодара Краснодарского края и юга России</div></b></span></font></a>
		    
			 
			 <ul role="menu" class="sub-menu">
                <div class="brands-name1">   
     
				
     <li><a href="<?=\yii\helpers\Url::to (['/nedvigcategory/8', 'ads' =>$tkva])?>">Квартиры<div style="display: none;"> Краснодара Краснодарского края и юга России</div><div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li>

     <li><a href="<?= \yii\helpers\Url::to(['/nedvigcategory/2', 'ads' =>$tdom])?>">Дома/Коттеджи/Дачи<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li> 
	 
	  <li><a href="<?=\yii\helpers\Url::to (['/nedvigcategory/3', 'ads' =>$tkom])?>">Комнаты</a></li>

     <li><a href="<?= \yii\helpers\Url::to(['/nedvigcategory/19', 'ads' =>$tkomm])?>">Коммерческая<div style="display: none;"> недвижимость Краснодара Краснодарского края и юга России</div></a></li> 
	 
	  <li><a href="<?=\yii\helpers\Url::to (['/nedvigcategory/14', 'ads' =>$tucha])?>">Земельные участки<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li>

     <li><a href="<?= \yii\helpers\Url::to(['/nedvigcategory/6', 'ads' =>$tgarag])?>">Гаражи</a></li> 
	 
	 <li><a href="<?= \yii\helpers\Url::to(['/nedvigcategory/7', 'ads' =>$tbiznes])?>">Готовый бизнес<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li> 
                        </div>                                                         
                                    </ul>
		  
		   </li>

       <li class="dropdown"><a href="<?=Yii::$app->urlManager->createAbsoluteUrl('/site/mainavto');?>"><font face="Arial" ><span style="color:#397f8c"><b>АВТОТЕХНИКА</b></span></font></a>
	  
	    <ul role="menu" class="sub-menu">
                <div class="brands-name1">                         
     <li><a href="<?=\yii\helpers\Url::to (['/avtocategory/1', 'ads' =>$aleg])?>">Легковые</a></li>

     <li><a href="<?= \yii\helpers\Url::to(['/avtocategory/2', 'ads' =>$agruz])?>">Грузовые//Автобусы</a></li> 
	 
	  <li><a href="<?=\yii\helpers\Url::to (['/avtocategory/3', 'ads' =>$aspec])?>">Спецтехника</a></li>

     <li><a href="<?= \yii\helpers\Url::to(['/avtocategory/4', 'ads' =>$amoto])?>">Мототехника</a></li> 
	 
	  <li><a href="<?=\yii\helpers\Url::to (['/avtocategory/5', 'ads' =>$akompl])?>">Комплектующие для авто</a></li>

     <li><a href="<?= \yii\helpers\Url::to(['/avtocategory/6', 'ads' =>$avod])?>">Водный транспорт</a></li> 
		 </div>
		</ul>
	  
	   </li>
			 
	             
							</ul>
					 </div>
					 
					 
					</div>
					
					</div>
					<div id="brands_products1"> <div class="col-sm-8">
			
					<div class="navbar-header">
					
					
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
                                           
                                            
						<div class="mainmenu pull-left" id="brands_products1">
                                                    
						<ul class="nav navbar-nav collapse navbar-collapse">                 
           			  
                                               
         <li class="dropdown" id="brands_products1"> <a><font face="Arial" style="color:#397f8c"><span style="color:#ef7204" ><b>ГЛАВНАЯ </b></font></a>
           
			  <ul role="menu" class="sub-menu">
                <div class="brands-name1">       
			  
			  <li> <a href="<?=\yii\helpers\Url::home()?>" >Доска объявлений<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li>
			    <li> <a href="<?=\yii\helpers\Url::to (['/photo'])?>" >ФотоАльбом объявлений<div style="display: none;"> Краснодара Краснодарского края и юга России</div> </a></li>
			    
				</div>
			  </ul>
            </li> 
			
	<li class="dropdown" id="brands_products2">
           
			  <ul role="menu" class="sub-menu">
                <div class="brands-name1">       
			  
			  <li> <a href="<?=\yii\helpers\Url::home()?>" class="link1">Доска объявлений<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li>
			    <li> <a href="<?=\yii\helpers\Url::to (['/photo'])?>" class="link1">ФотоАльбом объявлений<div style="display: none;"> Краснодара Краснодарского края и юга России</div> </a></li>
			    
				</div>
			  </ul>
            </li> 	
			
           <li class="dropdown"><a href="<?=\yii\helpers\Url::to (['/site/mainned'])?>"><font face="Arial" ><span style="color:#397f8c"><b>НЕДВИЖИМОСТЬ<div style="display: none;"> Краснодара Краснодарского края и юга России</div></b></span></font></a>
		    
			 
			 <ul role="menu" class="sub-menu">
                <div class="brands-name1">   
     
				
     <li><a href="<?=\yii\helpers\Url::to (['/nedvigcategory/8', 'ads' =>$tkva])?>">Квартиры<div style="display: none;"> Краснодара Краснодарского края и юга России</div><div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li>

     <li><a href="<?= \yii\helpers\Url::to(['/nedvigcategory/2', 'ads' =>$tdom])?>">Дома/Коттеджи/Дачи<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li> 
	 
	  <li><a href="<?=\yii\helpers\Url::to (['/nedvigcategory/3', 'ads' =>$tkom])?>">Комнаты</a></li>

     <li><a href="<?= \yii\helpers\Url::to(['/nedvigcategory/19', 'ads' =>$tkomm])?>">Коммерческая<div style="display: none;"> недвижимость Краснодара Краснодарского края и юга России</div></a></li> 
	 
	  <li><a href="<?=\yii\helpers\Url::to (['/nedvigcategory/14', 'ads' =>$tucha])?>">Земельные участки<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li>

     <li><a href="<?= \yii\helpers\Url::to(['/nedvigcategory/6', 'ads' =>$tgarag])?>">Гаражи</a></li> 
	 
	 <li><a href="<?= \yii\helpers\Url::to(['/nedvigcategory/7', 'ads' =>$tbiznes])?>">Готовый бизнес<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li> 
                        </div>                                                         
                                    </ul>
		  
		   </li>

       <li class="dropdown"><a href="<?=Yii::$app->urlManager->createAbsoluteUrl('/site/mainavto');?>"><font face="Arial" ><span style="color:#397f8c"><b>АВТОТЕХНИКА</b></span></font></a>
	  
	    <ul role="menu" class="sub-menu">
                <div class="brands-name1">                         
     <li><a href="<?=\yii\helpers\Url::to (['/avtocategory/1', 'ads' =>$aleg])?>">Легковые</a></li>

     <li><a href="<?= \yii\helpers\Url::to(['/avtocategory/2', 'ads' =>$agruz])?>">Грузовые//Автобусы</a></li> 
	 
	  <li><a href="<?=\yii\helpers\Url::to (['/avtocategory/3', 'ads' =>$aspec])?>">Спецтехника</a></li>

     <li><a href="<?= \yii\helpers\Url::to(['/avtocategory/4', 'ads' =>$amoto])?>">Мототехника</a></li> 
	 
	  <li><a href="<?=\yii\helpers\Url::to (['/avtocategory/5', 'ads' =>$akompl])?>">Комплектующие для авто</a></li>

     <li><a href="<?= \yii\helpers\Url::to(['/avtocategory/6', 'ads' =>$avod])?>">Водный транспорт</a></li> 
		 </div>
		</ul>
	  
	   </li>
			 
	<li class="dropdown"><a href= "<?= yii\helpers\Url::to (['/admin']) ?>"> <font face="Arial"><span style="color:#397f8c"> <b>Личный Кабинет</b></font></a>
	 <ul role="menu" class="sub-menu">
                <div class="brands-name1"> 
				
     
	  <li><a href="<?=\yii\helpers\Url::to (['/admin/dobavit/'])?>">Подать объявление</a></li>   
	  
	   <li><a href="<?=\yii\helpers\Url::to (['/admin/dobavitvashi/'])?>">Ваши объявления</a></li>   
	   
	    <li><a href="<?=\yii\helpers\Url::to (['/admin/user/'])?>">Ваш Профиль</a></li> 

        <?php if (!Yii:: $app->user->isGuest): ?>
                                   
     <li><a href="<?= \yii\helpers\Url::to (['/site/logout'])?>" >Выход</a></li>
                     <?php endif;?> 		

    </div>
		</ul>				
		
	</li>
                                                         
                            
							</ul>
					 </div>
					 
					 <div class="mainmenu pull-left" id="brands_products2">
                                                    
						<ul class="nav navbar-nav collapse navbar-collapse">                 
           			  
                                               
         <li class="dropdown" id="brands_products1"><a><font face="Arial" style="color:#397f8c"><span style="color:#ef7204" ><b>ГЛАВНАЯ </b></font></a>
           
			  <ul role="menu" class="sub-menu">
                <div class="brands-name1">       
			  
			  <li> <a href="<?=\yii\helpers\Url::home()?>" >Доска объявлений<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li>
			    <li> <a href="<?=\yii\helpers\Url::to (['/photo'])?>" >ФотоАльбом объявлений<div style="display: none;"> Краснодара Краснодарского края и юга России</div> </a></li>
			    
				</div>
			  </ul>
            </li> 
			
	<li class="dropdown" id="brands_products2">
           
			  <ul role="menu" class="sub-menu">
                <div class="brands-name1">       
			  
			  <li> <a href="<?=\yii\helpers\Url::home()?>" >Доска объявлений<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li>
			    <li> <a href="<?=\yii\helpers\Url::to (['/photo'])?>" >ФотоАльбом объявлений<div style="display: none;"> Краснодара Краснодарского края и юга России</div> </a></li>
			    
				</div>
			  </ul>
            </li> 	
			
	<li class="dropdown">
	 <ul role="menu" class="sub-menu">
                <div class="brands-name1"> 
				
     
	  <li><a href="<?=\yii\helpers\Url::to (['/admin/dobavit/'])?>">Подать объявление</a></li>   
	  
	   <li><a href="<?=\yii\helpers\Url::to (['/admin/dobavitvashi/'])?>">Ваши объявления</a></li>   
	   
	    <li><a href="<?=\yii\helpers\Url::to (['/admin/user/'])?>">Личный Кабинет</a></li> 

       
    </div>
		</ul>				
		
	</li>
                                                         
               		
			
           <li class="dropdown"><a href="<?=\yii\helpers\Url::to (['/site/mainned'])?>"><font face="Arial" ><span style="color:#397f8c"><b>НЕДВИЖИМОСТЬ<div style="display: none;"> Краснодара Краснодарского края и юга России</div></b></span></font></a>
		    
			 
			 <ul role="menu" class="sub-menu">
                <div class="brands-name1">   
     
				
     <li><a href="<?=\yii\helpers\Url::to (['/nedvigcategory/8', 'ads' =>$tkva])?>">Квартиры<div style="display: none;"> Краснодара Краснодарского края и юга России</div><div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li>

     <li><a href="<?= \yii\helpers\Url::to(['/nedvigcategory/2', 'ads' =>$tdom])?>">Дома/Коттеджи/Дачи<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li> 
	 
	  <li><a href="<?=\yii\helpers\Url::to (['/nedvigcategory/3', 'ads' =>$tkom])?>">Комнаты</a></li>

     <li><a href="<?= \yii\helpers\Url::to(['/nedvigcategory/19', 'ads' =>$tkomm])?>">Коммерческая<div style="display: none;"> недвижимость Краснодара Краснодарского края и юга России</div></a></li> 
	 
	  <li><a href="<?=\yii\helpers\Url::to (['/nedvigcategory/14', 'ads' =>$tucha])?>">Земельные участки<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li>

     <li><a href="<?= \yii\helpers\Url::to(['/nedvigcategory/6', 'ads' =>$tgarag])?>">Гаражи</a></li> 
	 
	 <li><a href="<?= \yii\helpers\Url::to(['/nedvigcategory/7', 'ads' =>$tbiznes])?>">Готовый бизнес<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li> 
                        </div>                                                         
                                    </ul>
		  
		   </li>

       <li class="dropdown"><a href="<?=Yii::$app->urlManager->createAbsoluteUrl('/site/mainavto');?>"><font face="Arial" ><span style="color:#397f8c"><b>АВТОТЕХНИКА</b></span></font></a>
	  
	    <ul role="menu" class="sub-menu">
                <div class="brands-name1">                         
     <li><a href="<?=\yii\helpers\Url::to (['/avtocategory/1', 'ads' =>$aleg])?>">Легковые</a></li>

     <li><a href="<?= \yii\helpers\Url::to(['/avtocategory/2', 'ads' =>$agruz])?>">Грузовые//Автобусы</a></li> 
	 
	  <li><a href="<?=\yii\helpers\Url::to (['/avtocategory/3', 'ads' =>$aspec])?>">Спецтехника</a></li>

     <li><a href="<?= \yii\helpers\Url::to(['/avtocategory/4', 'ads' =>$amoto])?>">Мототехника</a></li> 
	 
	  <li><a href="<?=\yii\helpers\Url::to (['/avtocategory/5', 'ads' =>$akompl])?>">Комплектующие для авто</a></li>

     <li><a href="<?= \yii\helpers\Url::to(['/avtocategory/6', 'ads' =>$avod])?>">Водный транспорт</a></li> 
		 </div>
		</ul>
	  
	   </li>
			 
	             
							</ul>
					 </div>
					 
					 
					</div>
                      </div>
                    					  
                       <div id="brands_products2"> <div class="col-sm-3">
					   
					   <li id="brands_products2"><a onclick="return showSearchsearch()" ><i class="btn btn-warning" style= "margin-top: 1px; border-color: green;);" >
	<i class="fa fa-search"></i> Расширенный ПОИСК </i></a>
	
	<a href= "<?= yii\helpers\Url::to (['/admin']) ?>"class="btn btn-warning" style ="background-color: #b6efab"> <i class="fa fa-plus"></i></a>
	
	<a onclick="return getCart()" class="btn btn-warning"><i class="fa fa-heart"></i></a>
	</li>
	
	
	<li id="brands_products1">
	<a href= "<?= yii\helpers\Url::to (['/admin']) ?>"class="btn btn-warning" style ="background-color: #b6efab"; > <i class="fa fa-plus"></i></a>
	<a onclick="return showSearchsearch()" ><i class="btn btn-warning" style= "margin-top: 1px; " >
	<i class="fa fa-search"></i> Расширенный Поиск</i></a>
	 
	</li>
              			 
					    </div>   
					   
					   </div>
					   
					    <div id="brands_products1"> <div class="col-sm-4">
                        
	<li id="brands_products2"><a onclick="return showSearchsearch()" ><i class="btn btn-warning" style= "margin-top: 1px; border-color: green;);" >
	<i class="fa fa-search"></i> Расширенный ПОИСК </i></a>
	
	<a href= "<?= yii\helpers\Url::to (['/admin']) ?>"class="btn btn-warning2"> <i class="fa fa-plus"></i></a>
	
	<a onclick="return getCart()" class="btn btn-warning"><i class="fa fa-heart"></i></a>
	</li>
	
	
	<li id="brands_products1">
	<a href= "<?= yii\helpers\Url::to (['/admin']) ?>"class="btn btn-warning2" > <i class="fa fa-plus"></i> Подать объявление</a>
	<a onclick="return showSearchsearch()" ><i class="btn btn-warning" style= "margin-top: 1px; " >
	<i class="fa fa-search"></i> Расширенный Поиск</i></a>
	
	</li>
              			 
					    </div>             
                          </div>             
                   
				</div>
			</div>
		</div>
		
		</div></center>
           <center><div class="header-middle1">
		  
            </div>	</center>	
		
		<div class="header-middle";>
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
                <a href="<?=\yii\helpers\Url::home()?>"><?=Html::img('@web/images/home/logo.png', ['alt' => 'SaleMen'])?></a>
						
                                                </div>
												
					</div>
					
				</div>
			</div>
		</div>
	
		
                            
	</header>
	
	 <center><div class="container">
            
    <?php if(Yii::$app->session->hasFlash('success2')): ?>
    <div class="alert alert-success alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('success2'); ?>
    </div>
    <?php endif; ?>
        </div></center>
        
        
	<?= $content ?>

       <div class="fix_block">
	   <li><a href= "<?= yii\helpers\Url::to (['/admin']) ?>"class="jbl" >✍</a></li>
	   </div>
		<footer id="footer"><!--Footer-->
		<div class="footer-widget">
			
		<div class="container">		
							
	<center><p id = "translationTel1">+7 XXX XXX  <span id = "showTel" onclick = "showSTR1('+7(8452)93-59-69 | 1@salemen.ru')"> Телефон и эл.почта поддержки</span> г. Краснодар ул.Фабричная 10</p></center>
		
		</div>	
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 SaleMen.</p>
					<div class="social-icons pull-right">
					<ul class="nav navbar-nav">
								
								<li><a href="https://www.facebook.com/salemensar/" target="_blank"><i class="fa fa-facebook"></i></a></li> 
								<li><a href="https://twitter.com/mobail79?s=09" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://vk.com/smsar" target="_blank"><i class="fa fa-vk"></i></a></li>
								<li><a href="https://www.instagram.com/salemensar/" target="_blank"><i class="fa fa-instagram"></i></a></li>
								<li><a href="https://www.youtube.com/channel/UCfAjV-2sveAiRVJ6neBxXYw/videos?view_as=subscriber" target="_blank"><i class="fa fa-google-plus"></i></a></li>
							</ul>
							</div>
					
				</div>
			</div>
		</div>
		
		         
		 
	                <!-------------Поиск по сайту------------->
					
					<?
         
         \yii\bootstrap\Modal::begin ([
             'header'=> '<h4>Выберите раздел сайта</h4>',
             'id'=> 'searchsearch',
			 //'clientOptions' => ['show' => true],
             'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
			 
               
         ]);?>
		 
		 <center><div>
                        
	<a href="#" onclick="return showSearchned()" ><i class="btn btn-warning">Недвижимость<div style="display: none;"> Краснодара Краснодарского края и юга России</div></i></a>
	
	<a href="#" onclick="return showSearchavto()" ><i class="btn btn-warning">Автотехника</i></a>
	
	<a href ="<?= yii\helpers\Url::to (['cart/magaz']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Магазин</i></a>
         </div></center>
          <?
		  \yii\bootstrap\Modal::end();
         
         ?>
		 
		 
		  <!----------------РАСШИРЕННЫЙ ПОИСК НЕДВИЖИМОСТЬ<div style="display: none;"> Краснодара Краснодарского края и юга России</div>----------->
						
						  <? \yii\bootstrap\Modal::begin([
    'header' => '<h4>Выберите категорию</h4>',
    'id' => 'searchned',
	 'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
                               ]) ?>
         
       <center><div>
                    
	<a onclick="return showKvart()" ><i class="btn btn-warning">Квартиры<div style="display: none;"> Краснодара Краснодарского края и юга России</div><div style="display: none;"> Краснодара Краснодарского края и юга России</div></i></a>
										
	 <a onclick="return showPricedom()" ><i class="btn btn-warning">Дома/Коттеджи/Дачи<div style="display: none;"> Краснодара Краснодарского края и юга России</div></i></a>	
                       				
    <a href ="<?= yii\helpers\Url::to (['cart/komn']) ?>" class= "showSearchkomnati">
										<i class="btn btn-warning">Комнаты</i></a>									
                    
	 <a onclick="return showKommerch()" ><i class="btn btn-warning">Коммерческая<div style="display: none;"> недвижимость Краснодара Краснодарского края и юга России</div><div style="display: none;"> Краснодара Краснодарского края и юга России</div></i></a>									
                    				
	 <a onclick="return showZemli()" ><i class="btn btn-warning">Земельные участки<div style="display: none;"> Краснодара Краснодарского края и юга России</div></i></a>		
                        
	<a href ="<?= yii\helpers\Url::to (['cart/biznes']) ?>" class= "showSearchbiznes">
										<i class="btn btn-warning">Готовый бизнес<div style="display: none;"> Краснодара Краснодарского края и юга России</div></i></a>	
	
	<a href ="<?= yii\helpers\Url::to (['cart/garagi']) ?>" class= "showSearchgaragi">
										<i class="btn btn-warning">Гаражи</i></a>	
										
    <!--<a href="#" onclick="return showSearchgaragi()" ><i class="btn btn-warning">Гаражи</i></a></li>-->
			 
					 </div> </center>
   
   
      <?
   \yii\bootstrap\Modal::end();
         
         ?>
		 
		 
		           <!----------------ПОИСК КВАРТИРЫ----------->
						
						  <? \yii\bootstrap\Modal::begin([
    'header' => '<h4>Тип сделки</h4>',
    'id' => 'kvart',
	 'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
                               ]) ?>
         
       <center><div>

		 <a onclick="return showKomnat()" ><i class="btn btn-warning">Купить квартиру</i></a>		 

         <a onclick="return showKomnataren()" ><i class="btn btn-warning">Арендовать квартиру</i></a>			

        <a href ="<?= yii\helpers\Url::to (['cart/kvart']) ?>" class= "showSearchdoma">
										<i class="btn btn-warning">еще варианты</i></a>														   
		
		 </div> </center>
   
   
      <?
   \yii\bootstrap\Modal::end();
         
         ?>
		 
		 
	  <!----------------ПОИСК КОЛИЧЕСТВО КОМНАТ ПРОДАЖА----------->
						
						  <? \yii\bootstrap\Modal::begin([
    'header' => '<h4>Количество комнат</h4>',
    'id' => 'komnat',
	 'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
                               ]) ?>
         
       <center><div>

		 <a onclick="return showPriceprod1()"><i class="btn btn-warning">1 комнатная</i></a>
										
		 <a onclick="return showPriceprod2()"><i class="btn btn-warning">2 комнатная</i></a>

        <a onclick="return showPriceprod3()"><i class="btn btn-warning">3 комнатная</i></a>
										
		 <a onclick="return showPriceprod4()"><i class="btn btn-warning">4 комнатная</i></a>

        <a href ="<?= yii\helpers\Url::to (['cart/kvart']) ?>" class= "showSearchdoma">
										<i class="btn btn-warning">еще варианты</i></a>													   
		
		 </div> </center>
   
   
      <?
   \yii\bootstrap\Modal::end();
         
         ?>
		 
		 
		  <!----------------ПОИСК Цена 1 КВАРТИРЫ----------->
						
						  <? \yii\bootstrap\Modal::begin([
    'header' => '<h4>Максимальная Цена</h4>',
    'id' => 'priceprod1',
	 'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
                               ]) ?>
         
       <center><div>

		<a href ="<?= yii\helpers\Url::to (['nedvigkvartiri/search1']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 1,5 млн.р.</i></a>
										
		<a href ="<?= yii\helpers\Url::to (['nedvigkvartiri/search2']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 2 млн.р.</i></a>	

        <a href ="<?= yii\helpers\Url::to (['nedvigkvartiri/search3']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 2,5 мл.р.</i></a>
										
		<a href ="<?= yii\helpers\Url::to (['nedvigkvartiri/search4']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 3 млн.р.</i></a><br>
													   
	   <a href ="<?= yii\helpers\Url::to (['nedvigkvartiri/search5']) ?>" class= "showSearchkvartt">
	                                                   <i class="btn btn-warning">Цена до 4 млн.р.</i></a><br>

        <a href ="<?= yii\helpers\Url::to (['cart/kvart']) ?>" class= "showSearchdoma">
										<i class="btn btn-warning">еще варианты</i></a>													   
		
		 </div> </center>
   
   
      <?
   \yii\bootstrap\Modal::end();
         
         ?>
		 
		 
		  <!----------------ПОИСК Цена 2 КВАРТИРЫ----------->
						
						  <? \yii\bootstrap\Modal::begin([
    'header' => '<h4>Максимальная Цена</h4>',
    'id' => 'priceprod2',
	 'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
                               ]) ?>
         
       <center><div>

		<a href ="<?= yii\helpers\Url::to (['nedvigkvartiri/search21']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 1,5 млн.р.</i></a>
										
		<a href ="<?= yii\helpers\Url::to (['nedvigkvartiri/search22']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 2 млн.р.</i></a>	

        <a href ="<?= yii\helpers\Url::to (['nedvigkvartiri/search23']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 2,5 мл.р.</i></a>
										
		<a href ="<?= yii\helpers\Url::to (['nedvigkvartiri/search24']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 3 млн.р.</i></a><br>
													   
	   <a href ="<?= yii\helpers\Url::to (['nedvigkvartiri/search25']) ?>" class= "showSearchkvartt">
	                                                   <i class="btn btn-warning">Цена до 4 млн.р.</i></a><br>

        <a href ="<?= yii\helpers\Url::to (['cart/kvart']) ?>" class= "showSearchdoma">
										<i class="btn btn-warning">еще варианты</i></a>													   
		
		 </div> </center>
   
   
      <?
   \yii\bootstrap\Modal::end();
         
         ?>
		 
		  <!----------------ПОИСК Цена 3 КВАРТИРЫ----------->
						
						  <? \yii\bootstrap\Modal::begin([
    'header' => '<h4>Максимальная Цена</h4>',
    'id' => 'priceprod3',
	 'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
                               ]) ?>
         
       <center><div>

		<a href ="<?= yii\helpers\Url::to (['nedvigkvartiri/search31']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 1,5 млн.р.</i></a>
										
		<a href ="<?= yii\helpers\Url::to (['nedvigkvartiri/search32']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 2 млн.р.</i></a>	

        <a href ="<?= yii\helpers\Url::to (['nedvigkvartiri/search33']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 2,5 мл.р.</i></a>
										
		<a href ="<?= yii\helpers\Url::to (['nedvigkvartiri/search34']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 3 млн.р.</i></a><br>
													   
	   <a href ="<?= yii\helpers\Url::to (['nedvigkvartiri/search35']) ?>" class= "showSearchkvartt">
	                                                   <i class="btn btn-warning">Цена до 4 млн.р.</i></a><br>

        <a href ="<?= yii\helpers\Url::to (['cart/kvart']) ?>" class= "showSearchdoma">
										<i class="btn btn-warning">еще варианты</i></a>													   
		
		 </div> </center>
   
   
      <?
   \yii\bootstrap\Modal::end();
         
         ?>
		 
		 
		  <!----------------ПОИСК Цена 4 КВАРТИРЫ----------->
						
						  <? \yii\bootstrap\Modal::begin([
    'header' => '<h4>Максимальная Цена</h4>',
    'id' => 'priceprod4',
	 'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
                               ]) ?>
         
       <center><div>

		<a href ="<?= yii\helpers\Url::to (['nedvigkvartiri/search41']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 1,5 млн.р.</i></a>
										
		<a href ="<?= yii\helpers\Url::to (['nedvigkvartiri/search42']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 2 млн.р.</i></a>	

        <a href ="<?= yii\helpers\Url::to (['nedvigkvartiri/search43']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 2,5 мл.р.</i></a>
										
		<a href ="<?= yii\helpers\Url::to (['nedvigkvartiri/search44']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 3 млн.р.</i></a><br>
													   
	   <a href ="<?= yii\helpers\Url::to (['nedvigkvartiri/search45']) ?>" class= "showSearchkvartt">
	                                                   <i class="btn btn-warning">Цена до 4 млн.р.</i></a><br>

        <a href ="<?= yii\helpers\Url::to (['cart/kvart']) ?>" class= "showSearchdoma">
										<i class="btn btn-warning">еще варианты</i></a>													   
		
		 </div> </center>
   
   
      <?
   \yii\bootstrap\Modal::end();
         
         ?>
		 
		 
		 <!----------------ПОИСК Цена ДОМА----------->
						
						  <? \yii\bootstrap\Modal::begin([
    'header' => '<h4>Максимальная Цена</h4>',
    'id' => 'pricedom',
	 'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
                               ]) ?>
         
       <center><div>

		<a href ="<?= yii\helpers\Url::to (['nedvigdoma/search1']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 1,5 млн.р.</i></a>
										
		<a href ="<?= yii\helpers\Url::to (['nedvigdoma/search2']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 2 млн.р.</i></a>	

        <a href ="<?= yii\helpers\Url::to (['nedvigdoma/search3']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 2,5 мл.р.</i></a>
										
		<a href ="<?= yii\helpers\Url::to (['nedvigdoma/search4']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 3 млн.р.</i></a><br>
													   
	   <a href ="<?= yii\helpers\Url::to (['nedvigdoma/search5']) ?>" class= "showSearchkvartt">
	                                                   <i class="btn btn-warning">Цена до 4 млн.р.</i></a><br>

        <a href ="<?= yii\helpers\Url::to (['cart/dom']) ?>" class= "showSearchdoma">
										<i class="btn btn-warning">еще варианты</i></a>													   
		
		 </div> </center>
   
   
      <?
   \yii\bootstrap\Modal::end();
         
         ?>
		 
		 <!----------------ПОИСК КОЛИЧЕСТВО КОМНАТ АРЕНДА----------->
						
						  <? \yii\bootstrap\Modal::begin([
    'header' => '<h4>Количество комнат</h4>',
    'id' => 'komnataren',
	 'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
                               ]) ?>
         
       <center><div>

		<a href ="<?= yii\helpers\Url::to (['nedvigkvartiri/search1aren']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">1 комнатная</i></a>
										
		<a href ="<?= yii\helpers\Url::to (['nedvigkvartiri/search2aren']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">2 комнатная</i></a>	

        <a href ="<?= yii\helpers\Url::to (['nedvigkvartiri/search3aren']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">3 комнатная</i></a>
										
		<a href ="<?= yii\helpers\Url::to (['nedvigkvartiri/search4aren']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">4 комнатная</i></a><br>

        <a href ="<?= yii\helpers\Url::to (['cart/kvart']) ?>" class= "showSearchdoma">
										<i class="btn btn-warning">еще варианты</i></a>													   
		
		 </div> </center>
   
   
      <?
   \yii\bootstrap\Modal::end();
         
         ?>
		 
		 
		 
		  <!----------------ПОИСК ЗЕМЛИ----------->
						
						  <? \yii\bootstrap\Modal::begin([
    'header' => '<h4>Тип участка</h4>',
    'id' => 'zemli',
	 'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
                               ]) ?>
         
       <center><div>

		<a href ="<?= yii\helpers\Url::to (['nedvigzemli/searchigs']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">ИЖС</i></a>
										
		<a href ="<?= yii\helpers\Url::to (['nedvigzemli/searchprom']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Промназначения</i></a>	

        <a href ="<?= yii\helpers\Url::to (['nedvigzemli/searchselh']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Сельхозназначения</i></a>
										
		<a href ="<?= yii\helpers\Url::to (['nedvigzemli/searchsnt']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Дачные/СНТ</i></a>	<br>

        <a href ="<?= yii\helpers\Url::to (['cart/zemli']) ?>" class= "showSearchdoma">
										<i class="btn btn-warning">еще варианты</i></a>																				   
		
		 </div> </center>
   
   
      <?
   \yii\bootstrap\Modal::end();
         
         ?>
		 
		  <!----------------ПОИСК КОММЕРЧЕСКОЙ----------->
						
						  <? \yii\bootstrap\Modal::begin([
    'header' => '<h4>Тип </h4>',
    'id' => 'kommerch',
	 'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
                               ]) ?>
         
       <center><div>

		<a href ="<?= yii\helpers\Url::to (['nedvigkommercheska/searchofis']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Офисные</i></a>
										
		<a href ="<?= yii\helpers\Url::to (['nedvigkommercheska/searchtorg']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Торговые</i></a>	

        <a href ="<?= yii\helpers\Url::to (['nedvigkommercheska/searchsvobod']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Свободного типа</i></a>
										
		<a href ="<?= yii\helpers\Url::to (['nedvigkommercheska/searchgostin']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Гостничные</i></a>	

        <a href ="<?= yii\helpers\Url::to (['nedvigkommercheska/searchsklad']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Складские</i></a>	

        <a href ="<?= yii\helpers\Url::to (['nedvigkommercheska/searchproizvod']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Производственные</i></a>	

        <a href ="<?= yii\helpers\Url::to (['nedvigkommercheska/searchgaragi']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Гаражного типа</i></a>	<br>

        <a href ="<?= yii\helpers\Url::to (['cart/kommerch']) ?>" class= "showSearchdoma">
										<i class="btn btn-warning">еще варианты</i></a>																				   
		
		 </div> </center>
   
   
      <?
   \yii\bootstrap\Modal::end();
         
         ?>
		 
		 
		 
		     <!----------------РАСШИРЕННЫЙ ПОИСК АВТОТЕХНИКА----------------------->
			 
		  
		  <? \yii\bootstrap\Modal::begin([
    'header' => '<h4>Выберите категорию</h4>',
    'id' => 'searchavto',
	 'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
                               ]) ?>
		 
		  <center><div>
                        

    <a href ="<?= yii\helpers\Url::to (['cart/avtoleg']) ?>" class= "showSearchleg">
										<i class="btn btn-warning">Легковые</i></a>   

     <a href ="<?= yii\helpers\Url::to (['cart/avtogruz']) ?>" class= "showSearchgruz">
										<i class="btn btn-warning">Грузовые // Автобусы</i></a>  										
                        
	 <a href ="<?= yii\helpers\Url::to (['cart/avtospec']) ?>" class= "showSearchspec">
										<i class="btn btn-warning">Спецтехника</i></a>  										
                        
    <a href ="<?= yii\helpers\Url::to (['cart/avtomoto']) ?>" class= "showSearchmoto">
										<i class="btn btn-warning">Мототехника</i></a>  										
                        
    <a href ="<?= yii\helpers\Url::to (['cart/avtokomplekt']) ?>" class= "showSearchkomplekt">
										<i class="btn btn-warning">Комплектующие</i></a>  
                        
	<a href ="<?= yii\helpers\Url::to (['cart/avtovodnik']) ?>" class= "showSearchvodnik">
										<i class="btn btn-warning">Водный транспорт</i></a>  
	
	
	        </div></center>
		 
		  <?
   \yii\bootstrap\Modal::end();
         
         ?>
		 
				
                      
		
	</footer><!--/Footer-->
        
   <script>   
 function showSTR1(trueTel) {
document.getElementById('translationTel1').firstChild.replaceData (0 , trueTel.length, trueTel);
}
</script>  
    
	<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>



