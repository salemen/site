<?php

/* @var $this \yii\web\АView */
/* @var $content string */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;
use app\models\Category;
use kartik\select2\Select2;
//use GeoIp2\Database\Reader;
use yii\web\JsExpression;
use yii\bootstrap\Modal;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

             

<!DOCTYPE HTML>
<html lang="<?= Yii::$app->language ?>">
<head>
    <?php $page = $_GET[page]; ?>
     <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1.5, user-scalable=no">
     <?=Html::csrfMetaTags() ?>
	<?php 
	if ($page){
	$this->title ='✅ Главная Бесплатная доска объявлений Краснодара, Краснодарского края и юга России. страница'.' '. "$page" ;
	}else{
		$this->title ='✅ Главная Бесплатная доска объявлений Краснодара, Краснодарского края и юга России.';
	}
      $this->params['breadcrumbs'][] = $this->title; ?>
   <title><?=$this->title?></title>
	<?=$this->registerMetaTag(['name' => 'keywords', 'content' => 'SaleMen: Универсальная, удобная и бесплатная платформа для покупок и продаж. Купить, продать, арендовать квартиру, дом, земельный участок и т.п. или предложить свои услуги, найти работу или предложить вакансию можно на SaleMen.ru. Объявления Кранодара ']);
    $this->registerMetaTag(['name' => 'description', 'content' => 'БЕСПЛАТНАЯ доска объявлений в Краснодаре, Краснодарском крае и юге России. Купить квартиру,дом,участок или другую недвижимость,найти работу или услугу в Краснодаре и Краснодарском крае. Купить, продать автомобиль. Подать объявление БЕСПЛАТНО']);?>
    <?php $this->head() ?>
		
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-178457707-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-178457707-1');
</script>

    
   <!-- Yandex.Metrika counter -->
<script>
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(53770444, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/53770444" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<meta name="yandex-verification" content="27131fedda8c620d" />
<!-- /Yandex.Metrika counter -->
   
   <!-- pr-cy 6b96807381bf466ce72cf96023d5a09f -->
   
   <link rel="shortcut icon" href="/images/faviconka_ss.ico">
   <link rel="stilesheet" href="css/jquery-ui.theme.css">

</head>

<div class="wrapper">
<body>
<?php $this->beginBody() ?>

 <style>
	 
	 ul.category-products {
  
    padding: 1px 5px!important;
    margin-top: 5px;
	
	 }
	 
	
	 
li {
    list-style-type: none; 
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


<header id="header">
	
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
			  
			  <li> <a href="<?=Url::home()?>" >Доска объявлений<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li>  <a href = "#"></a>	
			    <li> <a href="<?=Url::to (['/photo'])?>" >ФотоАльбом объявлений<div style="display: none;"> Краснодара Краснодарского края и юга России</div> </a></li>
			    
				</div>
			  </ul>
            </li> 
			
	<li class="dropdown" id="brands_products2">
           
			  <ul role="menu" class="sub-menu">
                <div class="brands-name1">       
			  
			  <li> <a href="<?=Url::home()?>" class="link1">Доска объявлений11<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li>
			    <li> <a href="<?=Url::to (['/photo'])?>" class="link1">ФотоАльбом объявлений<div style="display: none;"> Краснодара Краснодарского края и юга России</div> </a></li>
			    
				</div>
			  </ul>
            </li> 	
			
           <li class="dropdown"><a href="<?=Url::to (['/site/mainned'])?>"><font face="Arial" ><span style="color:#397f8c"><b>НЕДВИЖИМОСТЬ<div style="display: none;"> Краснодара Краснодарского края и юга России</div></b></span></font></a>
		    
			 
			 <ul role="menu" class="sub-menu">
                <div class="brands-name1">   
     
				
     <li><a href="<?=Url::to (['/nedvigcategory/8', 'ads' =>$tkva])?>">Квартиры<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li>

     <li><a href="<?= Url::to(['/nedvigcategory/2', 'ads' =>$tdom])?>">Дома/Коттеджи/Дачи<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li> 
	 
	  <li><a href="<?=Url::to (['/nedvigcategory/3', 'ads' =>$tkom])?>">Комнаты</a></li>

     <li><a href="<?= Url::to(['/nedvigcategory/19', 'ads' =>$tkomm])?>">Коммерческая<div style="display: none;"> недвижимость Краснодара Краснодарского края и юга России</div></a></li> 
	 
	  <li><a href="<?=Url::to (['/nedvigcategory/14', 'ads' =>$tucha])?>">Земельные участки<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li>

     <li><a href="<?= Url::to(['/nedvigcategory/6', 'ads' =>$tgarag])?>">Гаражи</a></li> 
	 
	 <li><a href="<?= Url::to(['/nedvigcategory/7', 'ads' =>$tbiznes])?>">Готовый бизнес<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li> 
                        </div>                                                         
                                    </ul>
		  
		   </li>

       <li class="dropdown"><a href="<?=Yii::$app->urlManager->createAbsoluteUrl('/site/mainavto');?>"><font face="Arial" ><span style="color:#397f8c"><b>АВТОТЕХНИКА</b></span></font></a>
	  
	    <ul role="menu" class="sub-menu">
                <div class="brands-name1">                         
     <li><a href="<?=Url::to (['/avtocategory/1', 'ads' =>$aleg])?>">Легковые</a></li>

     <li><a href="<?= Url::to(['/avtocategory/2', 'ads' =>$agruz])?>">Грузовые//Автобусы</a></li> 
	 
	  <li><a href="<?=Url::to (['/avtocategory/3', 'ads' =>$aspec])?>">Спецтехника</a></li>

     <li><a href="<?= Url::to(['/avtocategory/4', 'ads' =>$amoto])?>">Мототехника</a></li> 
	 
	  <li><a href="<?=Url::to (['/avtocategory/5', 'ads' =>$akompl])?>">Комплектующие для авто</a></li>

     <li><a href="<?= Url::to(['/avtocategory/6', 'ads' =>$avod])?>">Водный транспорт</a></li> 
		 </div>
		</ul>
	  
	   </li>
			 
	<li class="dropdown"><a href= "<?= Url::to (['/admin']) ?>"> <font face="Arial"><span style="color:#397f8c"> <b>Личный Кабинет</b></font></a>
	 <ul role="menu" class="sub-menu">
                <div class="brands-name1"> 
				
     
	  <li><a href="<?=Url::to (['/admin/dobavit/'])?>">Подать объявление</a></li>   
	  
	   <li><a href="<?=Url::to (['/admin/dobavitvashi/'])?>">Ваши объявления</a></li>   
	   
	    <li><a href="<?=Url::to (['/admin/user/'])?>">Ваш Профиль</a></li> 

        <?php if (!Yii:: $app->user->isGuest): ?>
                                   
     <li><a href="<?= Url::to (['/site/logout'])?>" >Выход</a></li>
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
			  
			  <li> <a href="<?=Url::home()?>" >Доска объявлений<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li>
			    <li> <a href="<?=Url::to (['/photo'])?>" >ФотоАльбом объявлений<div style="display: none;"> Краснодара Краснодарского края и юга России</div> </a></li>
			    
				</div>
			  </ul>
            </li> 
			
	<li class="dropdown" id="brands_products2">
           
			  <ul role="menu" class="sub-menu">
                <div class="brands-name1">       
			  
			  <li> <a href="<?=Url::home()?>" >Доска объявлений<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li>
			    <li> <a href="<?=Url::to (['/photo'])?>" >ФотоАльбом объявлений<div style="display: none;"> Краснодара Краснодарского края и юга России</div> </a></li>
			    
				</div>
			  </ul>
            </li> 	
			
	<li class="dropdown">
	 <ul role="menu" class="sub-menu">
                <div class="brands-name1"> 
				
     
	  <li><a href="<?=Url::to (['/admin/dobavit/'])?>">Подать объявление</a></li>   
	  
	   <li><a href="<?=Url::to (['/admin/dobavitvashi/'])?>">Ваши объявления</a></li>   
	   
	    <li><a href="<?=Url::to (['/admin/user/'])?>">Личный Кабинет</a></li> 

       
    </div>
		</ul>				
		
	</li>
                                                         
               		
			
           <li class="dropdown"><a href="<?=Url::to (['/site/mainned'])?>"><font face="Arial" ><span style="color:#397f8c"><b>НЕДВИЖИМОСТЬ<div style="display: none;"> Краснодара Краснодарского края и юга России</div></b></span></font></a>
		    
			 
			 <ul role="menu" class="sub-menu">
                <div class="brands-name1">   
     
				
     <li><a href="<?=Url::to (['/nedvigcategory/8', 'ads' =>$tkva])?>">Квартиры<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li>

     <li><a href="<?= Url::to(['/nedvigcategory/2', 'ads' =>$tdom])?>">Дома/Коттеджи/Дачи<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li> 
	 
	  <li><a href="<?=Url::to (['/nedvigcategory/3', 'ads' =>$tkom])?>">Комнаты</a></li>

     <li><a href="<?= Url::to(['/nedvigcategory/19', 'ads' =>$tkomm])?>">Коммерческая<div style="display: none;"> недвижимость Краснодара Краснодарского края и юга России</div></a></li> 
	 
	  <li><a href="<?=Url::to (['/nedvigcategory/14', 'ads' =>$tucha])?>">Земельные участки<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li>

     <li><a href="<?= Url::to(['/nedvigcategory/6', 'ads' =>$tgarag])?>">Гаражи</a></li> 
	 
	 <li><a href="<?= Url::to(['/nedvigcategory/7', 'ads' =>$tbiznes])?>">Готовый бизнес<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li> 
                        </div>                                                         
                                    </ul>
		  
		   </li>

       <li class="dropdown"><a href="<?=Yii::$app->urlManager->createAbsoluteUrl('/site/mainavto');?>"><font face="Arial" ><span style="color:#397f8c"><b>АВТОТЕХНИКА</b></span></font></a>
	  
	    <ul role="menu" class="sub-menu">
                <div class="brands-name1">                         
     <li><a href="<?=Url::to (['/avtocategory/1', 'ads' =>$aleg])?>">Легковые</a></li>

     <li><a href="<?= Url::to(['/avtocategory/2', 'ads' =>$agruz])?>">Грузовые//Автобусы</a></li> 
	 
	  <li><a href="<?=Url::to (['/avtocategory/3', 'ads' =>$aspec])?>">Спецтехника</a></li>

     <li><a href="<?= Url::to(['/avtocategory/4', 'ads' =>$amoto])?>">Мототехника</a></li> 
	 
	  <li><a href="<?=Url::to (['/avtocategory/5', 'ads' =>$akompl])?>">Комплектующие для авто</a></li>

     <li><a href="<?= Url::to(['/avtocategory/6', 'ads' =>$avod])?>">Водный транспорт</a></li> 
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
			  
			  <li> <a href="<?=Url::home()?>" >Доска объявлений<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li>
			    <li> <a href="<?=Url::to (['/photo'])?>" >ФотоАльбом объявлений<div style="display: none;"> Краснодара Краснодарского края и юга России</div> </a></li>
			    
				</div>
			  </ul>
            </li> 
			
	<li class="dropdown" id="brands_products2">
           
			  <ul role="menu" class="sub-menu">
                <div class="brands-name1">       
			  
			  <li> <a href="<?=Url::home()?>" class="link1">Доска объявлений<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li>
			    <li> <a href="<?=Url::to (['/photo'])?>" class="link1">ФотоАльбом объявлений<div style="display: none;"> Краснодара Краснодарского края и юга России</div> </a></li>
			    
				</div>
			  </ul>
            </li> 	
			
           <li class="dropdown"><a href="<?=Url::to (['/site/mainned'])?>"><font face="Arial" ><span style="color:#397f8c"><b>НЕДВИЖИМОСТЬ<div style="display: none;"> Краснодара Краснодарского края и юга России</div></b></span></font></a>
		    
			 
			 <ul role="menu" class="sub-menu">
                <div class="brands-name1">   
     
				
     <li><a href="<?=Url::to (['/nedvigcategory/8', 'ads' =>$tkva])?>">Квартиры<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li>

     <li><a href="<?= Url::to(['/nedvigcategory/2', 'ads' =>$tdom])?>">Дома/Коттеджи/Дачи<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li> 
	 
	  <li><a href="<?=Url::to (['/nedvigcategory/3', 'ads' =>$tkom])?>">Комнаты</a></li>

     <li><a href="<?= Url::to(['/nedvigcategory/19', 'ads' =>$tkomm])?>">Коммерческая<div style="display: none;"> недвижимость Краснодара Краснодарского края и юга России</div></a></li> 
	 
	  <li><a href="<?=Url::to (['/nedvigcategory/14', 'ads' =>$tucha])?>">Земельные участки<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li>

     <li><a href="<?= Url::to(['/nedvigcategory/6', 'ads' =>$tgarag])?>">Гаражи</a></li> 
	 
	 <li><a href="<?= Url::to(['/nedvigcategory/7', 'ads' =>$tbiznes])?>">Готовый бизнес<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li> 
                        </div>                                                         
                                    </ul>
		  
		   </li>

       <li class="dropdown"><a href="<?=Yii::$app->urlManager->createAbsoluteUrl('/site/mainavto');?>"><font face="Arial" ><span style="color:#397f8c"><b>АВТОТЕХНИКА</b></span></font></a>
	  
	    <ul role="menu" class="sub-menu">
                <div class="brands-name1">                         
     <li><a href="<?=Url::to (['/avtocategory/1', 'ads' =>$aleg])?>">Легковые</a></li>

     <li><a href="<?= Url::to(['/avtocategory/2', 'ads' =>$agruz])?>">Грузовые//Автобусы</a></li> 
	 
	  <li><a href="<?=Url::to (['/avtocategory/3', 'ads' =>$aspec])?>">Спецтехника</a></li>

     <li><a href="<?= Url::to(['/avtocategory/4', 'ads' =>$amoto])?>">Мототехника</a></li> 
	 
	  <li><a href="<?=Url::to (['/avtocategory/5', 'ads' =>$akompl])?>">Комплектующие для авто</a></li>

     <li><a href="<?= Url::to(['/avtocategory/6', 'ads' =>$avod])?>">Водный транспорт</a></li> 
		 </div>
		</ul>
	  
	   </li>
			 
	<li class="dropdown"><a href= "<?= Url::to (['/admin']) ?>"> <font face="Arial"><span style="color:#397f8c"> <b>Личный Кабинет</b></font></a>
	 <ul role="menu" class="sub-menu">
                <div class="brands-name1"> 
				
     
	  <li><a href="<?=Url::to (['/admin/dobavit/'])?>">Подать объявление</a></li>   
	  
	   <li><a href="<?=Url::to (['/admin/dobavitvashi/'])?>">Ваши объявления</a></li>   
	   
	    <li><a href="<?=Url::to (['/admin/user/'])?>">Ваш Профиль</a></li> 

        <?php if (!Yii:: $app->user->isGuest): ?>
                                   
     <li><a href="<?= Url::to (['/site/logout'])?>" >Выход</a></li>
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
			  
			  <li> <a href="<?=Url::home()?>" >Доска объявлений<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li>
			    <li> <a href="<?=Url::to (['/photo'])?>" >ФотоАльбом объявлений<div style="display: none;"> Краснодара Краснодарского края и юга России</div> </a></li>
			    
				</div>
			  </ul>
            </li> 
			
	<li class="dropdown" id="brands_products2">
           
			  <ul role="menu" class="sub-menu">
                <div class="brands-name1">       
			  
			  <li> <a href="<?=Url::home()?>" >Доска объявлений<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li>
			    <li> <a href="<?=Url::to (['/photo'])?>" >ФотоАльбом объявлений<div style="display: none;"> Краснодара Краснодарского края и юга России</div> </a></li>
			    
				</div>
			  </ul>
            </li> 	
			
	<li class="dropdown">
	 <ul role="menu" class="sub-menu">
                <div class="brands-name1"> 
				
     
	  <li><a href="<?=Url::to (['/admin/dobavit/'])?>">Подать объявление</a></li>   
	  
	   <li><a href="<?=Url::to (['/admin/dobavitvashi/'])?>">Ваши объявления</a></li>   
	   
	    <li><a href="<?=Url::to (['/admin/user/'])?>">Личный Кабинет</a></li> 

       
    </div>
		</ul>				
		
	</li>
                                                         
               		
			
           <li class="dropdown"><a href="<?=Url::to (['/site/mainned'])?>"><font face="Arial" ><span style="color:#397f8c"><b>НЕДВИЖИМОСТЬ<div style="display: none;"> Краснодара Краснодарского края и юга России</div></b></span></font></a>
		    
			 
			 <ul role="menu" class="sub-menu">
                <div class="brands-name1">   
     
				
     <li><a href="<?=Url::to (['/nedvigcategory/8', 'ads' =>$tkva])?>">Квартиры<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li>

     <li><a href="<?= Url::to(['/nedvigcategory/2', 'ads' =>$tdom])?>">Дома/Коттеджи/Дачи<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li> 
	 
	  <li><a href="<?=Url::to (['/nedvigcategory/3', 'ads' =>$tkom])?>">Комнаты</a></li>

     <li><a href="<?= Url::to(['/nedvigcategory/19', 'ads' =>$tkomm])?>">Коммерческая<div style="display: none;"> недвижимость Краснодара Краснодарского края и юга России</div></a></li> 
	 
	  <li><a href="<?=Url::to (['/nedvigcategory/14', 'ads' =>$tucha])?>">Земельные участки<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li>

     <li><a href="<?= Url::to(['/nedvigcategory/6', 'ads' =>$tgarag])?>">Гаражи</a></li> 
	 
	 <li><a href="<?= Url::to(['/nedvigcategory/7', 'ads' =>$tbiznes])?>">Готовый бизнес<div style="display: none;"> Краснодара Краснодарского края и юга России</div></a></li> 
                        </div>                                                         
                                    </ul>
		  
		   </li>

       <li class="dropdown"><a href="<?=Yii::$app->urlManager->createAbsoluteUrl('/site/mainavto');?>"><font face="Arial" ><span style="color:#397f8c"><b>АВТОТЕХНИКА</b></span></font></a>
	  
	    <ul role="menu" class="sub-menu">
                <div class="brands-name1">                         
     <li><a href="<?=Url::to (['/avtocategory/1', 'ads' =>$aleg])?>">Легковые</a></li>

     <li><a href="<?= Url::to(['/avtocategory/2', 'ads' =>$agruz])?>">Грузовые//Автобусы</a></li> 
	 
	  <li><a href="<?=Url::to (['/avtocategory/3', 'ads' =>$aspec])?>">Спецтехника</a></li>

     <li><a href="<?= Url::to(['/avtocategory/4', 'ads' =>$amoto])?>">Мототехника</a></li> 
	 
	  <li><a href="<?=Url::to (['/avtocategory/5', 'ads' =>$akompl])?>">Комплектующие для авто</a></li>

     <li><a href="<?= Url::to(['/avtocategory/6', 'ads' =>$avod])?>">Водный транспорт</a></li> 
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
	
	<a href= "<?= Url::to (['/admin']) ?>"class="btn btn-warning" style ="background-color: #b6efab"> <i class="fa fa-plus"></i></a>
	
	<a onclick="return getCart()" class="btn btn-warning"><i class="fa fa-heart"></i></a>
	</li>
	
	
	<li id="brands_products1">
	<a href= "<?= Url::to (['/admin']) ?>"class="btn btn-warning" style ="background-color: #b6efab"; > <i class="fa fa-plus"></i></a>
	<a onclick="return showSearchsearch()" ><i class="btn btn-warning" style= "margin-top: 1px; " >
	<i class="fa fa-search"></i> Расширенный Поиск</i></a>
	 
	</li>
              			 
					    </div>   
					   
					   </div>
					   
					   <div id="brands_products1"> <div class="col-sm-4">
                        
	<li id="brands_products2"><a onclick="return showSearchsearch()" ><i class="btn btn-warning" style= "margin-top: 1px; border-color: green;);" >
	<i class="fa fa-search"></i> Расширенный ПОИСК </i></a>
	
	<a href= "<?= Url::to (['/admin']) ?>"class="btn btn-warning2"> <i class="fa fa-plus"></i></a>
	
	<a onclick="return getCart()" class="btn btn-warning"><i class="fa fa-heart"></i></a>
	</li>
	
	
	<li id="brands_products1">
	<a href= "<?= Url::to (['/admin']) ?>"class="btn btn-warning2" > <i class="fa fa-plus"></i> Подать объявление</a>
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
				 <div id="brands_products1">
					<div class="col-sm-4">
						<div class="logo pull-left">
                <a href="<?=Url::home()?>"><?=Html::img('@web/images/home/logo.png', ['alt' => 'SaleMen'])?></a> 
					</div>	
					</div>
					</div>
					<div class="col-sm-4">
		<!-- <a href="#" onclick="return showReg()" ><i class="btn btn-default"> if ($oblast_reg){ 
		                                                                         $oblast2 = Oblast::find()->select('oblast_region')
                                                                                             ->where(['id' => $oblast_reg])->one();
                                                                                  foreach($oblast2 as $item) {
	                                                                                       $oblast_reg = $item;}?> 
		                                                                               echo ("$oblast_reg");} 
		                                                                          else{ echo ("$oblast1");}?></i></a>   -->
					  <!-------Живой поиск--------->
						 
						 <style>
						 .form-group {
						 margin-bottom: 2px;
						 margin-left: 5px;
						 margin-right: 5px;						
                         border-radius: 8px;
						 }
						 
						
						 .someClass{
						    margin-bottom: 3px; 
					    	text-align: center !important;
							color: #160378;
							font-weight: normal;
							font-size: 15px;
						 }
						 
						  input[type="submit"] {
							width: 38px; /* Ширина кнопки */
							height: 38px; /* Высота кнопки */
							margin-left: 2px;
							border-radius: 8px;
							border: none;
							background: url(/images/search.png) no-repeat 50% 50%; /* Параметры фона */
							box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.6);
						   }
						   
							input[type="submit"]:hover { 
                            width: 38px; /* Ширина кнопки */
							height: 38px; /* Высота кнопки */
							margin-left: 2px;
							background: url(/images/search1.png) no-repeat 50% 50%; /* Параметры фона */
							box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.6);							
							border-radius: 8px;
							
						   }
						 </style>
						 
						 
						  <form method="get" action="<?= Url::to(['category/search']) ?>">
						  <?php $form = ActiveForm::begin(); ?>
						  

 	<?php
	
	
	
	$addon = [
        'append' => [
            'content' => '<input type="submit"  name="search" value="">', [
                'class' => 'btn btn-primary', 
                'title' => 'Mark on map', 
                'data-toggle' => 'tooltip'
            ],
            'asButton' => true
        ]];
	
	     $model_cat = Category::find()->where(['not in', 'id', [0,1,2,3,4,5,6,7,8,11,63,19,20,21,22,23,24,55,56,86,87,24,29,30,36,65,69,178,179,210]])
			 ->all();
                foreach ($model_cat as $key => $item) {
					$id = $key;
					$model3 = $item;
				}	
				
   $url = Url::toRoute(['/cart/city-list']);
   	

echo $form->field($model3, 'name', ['template' => "{label}\n{input}"], '<input type="submit" value="">')->widget(Select2::classname(), [
    'name' => 'kv-state-230',
	'addon'=>$addon,
    'options' => ['multiple'=>true, 'placeholder' => 'поиск объявлений..'],
    'pluginOptions' => [
        'allowClear' => true,
        'minimumInputLength' => 2,
        'ajax' => [
            'url' => $url,
			'type' =>"GET",
			'type' =>"GET",
			//'contentType' => 'application/json; charset=utf-8',
            'dataType' => 'json',
            'data' => new JsExpression('function(params) { return {q:params.term}; }'),
        ],
		
        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
        'templateResult' => new JsExpression('function(name) { return name.text; }'),
        'templateSelection' => new JsExpression('function (name) { return name.text; }'),
    ],
])->label(false);?>

 
 <?php ActiveForm::end();?></form>
 
 <!---------------Конец живого поиска-------------------->             															  
                                
                                                </div>
												
					
					<div class="col-sm-4" id="brands_products1">
						<center><div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
                               
  <li><a onclick="return getCart()" class="btn btn-info" style ="padding: 4px; border-color: #397F8C"><i class="fa fa-heart" style ="padding-left: 2px"></i> Ваше Избранное</a></li>
  
                                      </ul>
						</div></center>
					</div>
				</div>
			</div>
		</div>
	
		
                            
	</header>
        
  
	
	<?= $content ?>

       <div class="fix_block">
	   <li><a href= "<?= Url::to (['/admin']) ?>"class="jbl" >✍</a></li>
	   </div>
		<footer id="footer"><!--Footer-->
		<div class="footer-widget">
			
		<div class="container">		
							
	<center><p id = "translationTel1">@mail<span id = "showTel" onclick = "showSTR1('1@salemen.ru')"> эл.почта поддержки</span></p></center>
		
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
								<li><a href="https://www.instagram.com/salemen.ru/" target="_blank"><i class="fa fa-instagram"></i></a></li>
								<li><a href="https://www.youtube.com/channel/UCfAjV-2sveAiRVJ6neBxXYw/videos?view_as=subscriber" target="_blank"><i class="fa fa-google-plus"></i></a></li>
							</ul>
							</div>
					
				</div>
			</div>
		</div>
		
		
		
		
		          <!-------------Избранное--------------->
		
		<?
         
         Modal::begin ([
             'header'=> '<h4>Избранное</h4>',
             'id'=> 'cart',
             'size'=> 'modal-lg', 
             'footer' => '<button type="button" data-dismiss="modal">Закрыть</button>'
             
                                    ]);
         
		
		 
          Modal::end();
         
         ?>
		 
		 
	                <!-------------Поиск по сайту------------->
					
					<?
         
         Modal::begin ([
             'header'=> '<h4>Выберите раздел сайта</h4>',
             'id'=> 'searchsearch',
			 //'clientOptions' => ['show' => true],
             'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
			 
               
         ]);?>
		 
		 <center><div>
		 
	<a href ="<?= Url::to (['cart/magaz']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Магазин</i></a>	<br/>		 
                        
	<a onclick="return showSearchned()" ><i class="btn btn-warning">Недвижимость</i></a>
	
	<a onclick="return showSearchavto()" ><i class="btn btn-warning">Автотехника</i></a>
	
	
         </div></center>
		  <a href = "#"></a>	
		  <ul class="catalog1 category-products">
			 
			 
        <?= \app\components\MenuWidget::widget(['tpl' => 'menu']); ?>  
		
		  
               </ul>
         <a href = "#"></a>	
          <?
		  Modal::end();
         
         ?>
		 
		 
		  <!----------------РАСШИРЕННЫЙ ПОИСК НЕДВИЖИМОСТЬ----------->
						
						  <? Modal::begin([
    'header' => '<h4>Выберите категорию</h4>',
    'id' => 'searchned',
	 'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
                               ]) ?>
         
       <center><div>
                    
										
	<a onclick="return showKvart()" ><i class="btn btn-warning">Квартиры<div style="display: none;"> Краснодара Краснодарского края и юга России</div></i></a>
											
	<a onclick="return showPricedom()" ><i class="btn btn-warning">Дома/Коттеджи/Дачи<div style="display: none;"> Краснодара Краснодарского края и юга России</div></i></a>
                       				
    <a href ="<?= Url::to (['cart/komn']) ?>" class= "showSearchkomnati">
										<i class="btn btn-warning">Комнаты</i></a>									
                    									
     
    <a onclick="return showKommerch()" ><i class="btn btn-warning">Коммерческая<div style="display: none;"> недвижимость Краснодара Краснодарского края и юга России</div></i></a>		 

    <a onclick="return showZemli()" ><i class="btn btn-warning">Земельные участки<div style="display: none;"> Краснодара Краснодарского края и юга России</div></i></a>										
                        
	<a href ="<?= Url::to (['cart/biznes']) ?>" class= "showSearchbiznes">
										<i class="btn btn-warning">Готовый бизнес<div style="display: none;"> Краснодара Краснодарского края и юга России</div></i></a>	
	
	<a href ="<?= Url::to (['cart/garagi']) ?>" class= "showSearchgaragi">
										<i class="btn btn-warning">Гаражи</i></a>	
										
			 
					 </div> </center>
   
   
      <?
   Modal::end();
         
         ?>
		 
		
           <!----------------ПОИСК КВАРТИРЫ----------->
						
						  <? Modal::begin([
    'header' => '<h4>Тип сделки</h4>',
    'id' => 'kvart',
	 'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
                               ]) ?>
         
       <center><div>

		 <a onclick="return showKomnat()" ><i class="btn btn-warning">Купить квартиру</i></a>		 

         <a onclick="return showKomnataren()" ><i class="btn btn-warning">Арендовать квартиру</i></a>			

        <a href ="<?= Url::to (['cart/kvart']) ?>" class= "showSearchdoma">
										<i class="btn btn-warning">еще варианты<p style="display:none">объявлений Краснодарского края</p></i></a>														   
		
		 </div> </center>
   
   
      <?
   Modal::end();
         
         ?>
		 
		 
	  <!----------------ПОИСК КОЛИЧЕСТВО КОМНАТ ПРОДАЖА----------->
						
						  <? Modal::begin([
    'header' => '<h4>Количество комнат</h4>',
    'id' => 'komnat',
	 'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
                               ]) ?>
         
       <center><div>

		 <a onclick="return showPriceprod1()"><i class="btn btn-warning">1 комнатная</i></a>
										
		 <a onclick="return showPriceprod2()"><i class="btn btn-warning">2 комнатная</i></a>

        <a onclick="return showPriceprod3()"><i class="btn btn-warning">3 комнатная</i></a>
										
		 <a onclick="return showPriceprod4()"><i class="btn btn-warning">4 комнатная</i></a>

        <a href ="<?= Url::to (['cart/kvart']) ?>" class= "showSearchdoma">
										<i class="btn btn-warning">еще варианты<p style="display:none">объявлений Краснодарского края</p></i></a>													   
		
		 </div> </center>
   
   
      <?
   Modal::end();
         
         ?>
		 
		 
		  <!----------------ПОИСК Цена 1 КВАРТИРЫ----------->
						
						  <? Modal::begin([
    'header' => '<h4>Максимальная Цена</h4>',
    'id' => 'priceprod1',
	 'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
                               ]) ?>
         
       <center><div>

		<a href ="<?= Url::to (['nedvigkvartiri/search1']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 1,5 млн.р.</i></a>
										
		<a href ="<?= Url::to (['nedvigkvartiri/search2']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 2 млн.р.</i></a>	

        <a href ="<?= Url::to (['nedvigkvartiri/search3']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 2,5 мл.р.</i></a>
										
		<a href ="<?= Url::to (['nedvigkvartiri/search4']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 3 млн.р.</i></a><br>
													   
	   <a href ="<?= Url::to (['nedvigkvartiri/search5']) ?>" class= "showSearchkvartt">
	                                                   <i class="btn btn-warning">Цена до 4 млн.р.</i></a><br>

        <a href ="<?= Url::to (['cart/kvart']) ?>" class= "showSearchdoma">
										<i class="btn btn-warning">еще варианты<p style="display:none">объявлений Краснодарского края</p></i></a>													   
		
		 </div> </center>
   
   
      <?
   Modal::end();
         
         ?>
		 
		 
		  <!----------------ПОИСК Цена 2 КВАРТИРЫ----------->
						
						  <? Modal::begin([
    'header' => '<h4>Максимальная Цена</h4>',
    'id' => 'priceprod2',
	 'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
                               ]) ?>
         
       <center><div>

		<a href ="<?= Url::to (['nedvigkvartiri/search21']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 1,5 млн.р.</i></a>
										
		<a href ="<?= Url::to (['nedvigkvartiri/search22']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 2 млн.р.</i></a>	

        <a href ="<?= Url::to (['nedvigkvartiri/search23']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 2,5 мл.р.</i></a>
										
		<a href ="<?= Url::to (['nedvigkvartiri/search24']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 3 млн.р.</i></a><br>
													   
	   <a href ="<?= Url::to (['nedvigkvartiri/search25']) ?>" class= "showSearchkvartt">
	                                                   <i class="btn btn-warning">Цена до 4 млн.р.</i></a><br>

        <a href ="<?= Url::to (['cart/kvart']) ?>" class= "showSearchdoma">
										<i class="btn btn-warning">еще варианты<p style="display:none">объявлений Краснодарского края</p></i></a>													   
		
		 </div> </center>
   
   
      <?
   Modal::end();
         
         ?>
		 
		  <!----------------ПОИСК Цена 3 КВАРТИРЫ----------->
						
						  <? Modal::begin([
    'header' => '<h4>Максимальная Цена</h4>',
    'id' => 'priceprod3',
	 'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
                               ]) ?>
         
       <center><div>

		<a href ="<?= Url::to (['nedvigkvartiri/search31']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 1,5 млн.р.</i></a>
										
		<a href ="<?= Url::to (['nedvigkvartiri/search32']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 2 млн.р.</i></a>	

        <a href ="<?= Url::to (['nedvigkvartiri/search33']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 2,5 мл.р.</i></a>
										
		<a href ="<?= Url::to (['nedvigkvartiri/search34']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 3 млн.р.</i></a><br>
													   
	   <a href ="<?= Url::to (['nedvigkvartiri/search35']) ?>" class= "showSearchkvartt">
	                                                   <i class="btn btn-warning">Цена до 4 млн.р.</i></a><br>

        <a href ="<?= Url::to (['cart/kvart']) ?>" class= "showSearchdoma">
										<i class="btn btn-warning">еще варианты<p style="display:none">объявлений Краснодарского края</p></i></a>													   
		
		 </div> </center>
   
   
      <?
   Modal::end();
         
         ?>
		 
		 
		  <!----------------ПОИСК Цена 4 КВАРТИРЫ----------->
						
						  <? Modal::begin([
    'header' => '<h4>Максимальная Цена</h4>',
    'id' => 'priceprod4',
	 'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
                               ]) ?>
         
       <center><div>

		<a href ="<?= Url::to (['nedvigkvartiri/search41']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 1,5 млн.р.</i></a>
										
		<a href ="<?= Url::to (['nedvigkvartiri/search42']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 2 млн.р.</i></a>	

        <a href ="<?= Url::to (['nedvigkvartiri/search43']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 2,5 мл.р.</i></a>
										
		<a href ="<?= Url::to (['nedvigkvartiri/search44']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 3 млн.р.</i></a><br>
													   
	   <a href ="<?= Url::to (['nedvigkvartiri/search45']) ?>" class= "showSearchkvartt">
	                                                   <i class="btn btn-warning">Цена до 4 млн.р.</i></a><br>

        <a href ="<?= Url::to (['cart/kvart']) ?>" class= "showSearchdoma">
										<i class="btn btn-warning">еще варианты<p style="display:none">объявлений Краснодарского края</p></i></a>													   
		
		 </div> </center>
   
   
      <?
   Modal::end();
         
         ?>
		 
		 
		 <!----------------ПОИСК Цена ДОМА----------->
						
						  <? Modal::begin([
    'header' => '<h4>Максимальная Цена</h4>',
    'id' => 'pricedom',
	 'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
                               ]) ?>
         
       <center><div>

		<a href ="<?= Url::to (['nedvigdoma/search1']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 1,5 млн.р.</i></a>
										
		<a href ="<?= Url::to (['nedvigdoma/search2']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 2 млн.р.</i></a>	

        <a href ="<?= Url::to (['nedvigdoma/search3']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 2,5 мл.р.</i></a>
										
		<a href ="<?= Url::to (['nedvigdoma/search4']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Цена до 3 млн.р.</i></a><br>
													   
	   <a href ="<?= Url::to (['nedvigdoma/search5']) ?>" class= "showSearchkvartt">
	                                                   <i class="btn btn-warning">Цена до 4 млн.р.</i></a><br>

        <a href ="<?= Url::to (['cart/dom']) ?>" class= "showSearchdoma">
										<i class="btn btn-warning">еще варианты<p style="display:none">объявлений Краснодарского края</p></i></a>													   
		
		 </div> </center>
   
   
      <?
   Modal::end();
         
         ?>
		 
		 <!----------------ПОИСК КОЛИЧЕСТВО КОМНАТ АРЕНДА----------->
						
						  <? Modal::begin([
    'header' => '<h4>Количество комнат</h4>',
    'id' => 'komnataren',
	 'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
                               ]) ?>
         
       <center><div>

		<a href ="<?= Url::to (['nedvigkvartiri/search1aren']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">1 комнатная</i></a>
										
		<a href ="<?= Url::to (['nedvigkvartiri/search2aren']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">2 комнатная</i></a>	

        <a href ="<?= Url::to (['nedvigkvartiri/search3aren']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">3 комнатная</i></a>
										
		<a href ="<?= Url::to (['nedvigkvartiri/search4aren']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">4 комнатная</i></a><br>

        <a href ="<?= Url::to (['cart/kvart']) ?>" class= "showSearchdoma">
										<i class="btn btn-warning">еще варианты<p style="display:none">объявлений Краснодарского края</p></i></a>													   
		
		 </div> </center>
   
   
      <?
   Modal::end();
         
         ?>
		 
		 
		 
		  <!----------------ПОИСК ЗЕМЛИ----------->
						
						  <? Modal::begin([
    'header' => '<h4>Тип участка</h4>',
    'id' => 'zemli',
	 'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
                               ]) ?>
         
       <center><div>

		<a href ="<?= Url::to (['nedvigzemli/searchigs']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">ИЖС</i></a>
										
		<a href ="<?= Url::to (['nedvigzemli/searchprom']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Промназначения</i></a>	

        <a href ="<?= Url::to (['nedvigzemli/searchselh']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Сельхозназначения</i></a>
										
		<a href ="<?= Url::to (['nedvigzemli/searchsnt']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Дачные/СНТ</i></a>	<br>

        <a href ="<?= Url::to (['cart/zemli']) ?>" class= "showSearchdoma">
										<i class="btn btn-warning">еще варианты<p style="display:none">объявлений Краснодарского края</p></i></a>																				   
		
		 </div> </center>
   
   
      <?
   Modal::end();
         
         ?>
		 
		  <!----------------ПОИСК КОММЕРЧЕСКОЙ----------->
						
						  <? Modal::begin([
    'header' => '<h4>Тип </h4>',
    'id' => 'kommerch',
	 'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
                               ]) ?>
         
       <center><div>

		<a href ="<?= Url::to (['nedvigkommercheska/searchofis']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Офисные</i></a>
										
		<a href ="<?= Url::to (['nedvigkommercheska/searchtorg']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Торговые</i></a>	

        <a href ="<?= Url::to (['nedvigkommercheska/searchsvobod']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Свободного типа</i></a>
										
		<a href ="<?= Url::to (['nedvigkommercheska/searchgostin']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Гостничные</i></a>	

        <a href ="<?= Url::to (['nedvigkommercheska/searchsklad']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Складские</i></a>	

        <a href ="<?= Url::to (['nedvigkommercheska/searchproizvod']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Производственные</i></a>	

        <a href ="<?= Url::to (['nedvigkommercheska/searchgaragi']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Гаражного типа</i></a>	<br>

        <a href ="<?= Url::to (['cart/kommerch']) ?>" class= "showSearchdoma">
										<i class="btn btn-warning">еще варианты<p style="display:none">объявлений Краснодарского края</p></i></a>																				   
		
		 </div> </center>
   
   
      <?
   Modal::end();
         
         ?>
		 
		 
		     <!----------------РАСШИРЕННЫЙ ПОИСК АВТОТЕХНИКА----------------------->
			 
		  
		  <? Modal::begin([
    'header' => '<h4>Выберите категорию</h4>',
    'id' => 'searchavto',
	 'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
                               ]) ?>
		 
		  <center><div>
                        

    <a href ="<?= Url::to (['cart/avtoleg']) ?>" class= "showSearchleg">
										<i class="btn btn-warning">Легковые</i></a>   

     <a href ="<?= Url::to (['cart/avtogruz']) ?>" class= "showSearchgruz">
										<i class="btn btn-warning">Грузовые // Автобусы</i></a>  										
                        
	 <a href ="<?= Url::to (['cart/avtospec']) ?>" class= "showSearchspec">
										<i class="btn btn-warning">Спецтехника</i></a>  										
                        
    <a href ="<?= Url::to (['cart/avtomoto']) ?>" class= "showSearchmoto">
										<i class="btn btn-warning">Мототехника</i></a>  										
                        
    <a href ="<?= Url::to (['cart/avtokomplekt']) ?>" class= "showSearchkomplekt">
										<i class="btn btn-warning">Комплектующие</i></a>  
                        
	<a href ="<?= Url::to (['cart/avtovodnik']) ?>" class= "showSearchvodnik">
										<i class="btn btn-warning">Водный транспорт</i></a>  
	
	
	        </div></center>
		 
		  <?
   Modal::end();
         
         ?>
		 
		 
		 
	</footer>
        

	<?php $this->endBody() ?>
</body>

</div>
</html>
<?php $this->endPage() ?>



