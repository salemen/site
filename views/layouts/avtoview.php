<?php

/* @var $this \yii\web\АView */
/* @var $content string */

use yii\helpers\Url;
use yii\helpers\Html;
use app\assets\AppAsset;
use yii\widgets\ActiveForm;
use app\models\Category;
use kartik\select2\Select2;
use yii\web\JsExpression;
use yii\bootstrap\Modal;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

            <!-------------АВТОТЕХНИКА--------------->
			
	
<?php	  $cookies = Yii::$app->response->cookies;
// add a new cookie to the response to be sent
$cookies->add(new \yii\web\Cookie([
    'name' => 'dcjq-accordion',
    //'value' => 'zh-CN',
]));
// remove a cookie
unset($cookies['dcjq-accordion']);
	?>
	
	 <!-----ОПРЕДЕЛЕНИЕ IP1 АДРЕСА И РЕГИОНА-->
	<?php									
 /*require_once Yii::$app->basePath . "/vendor/geoip2/geoip2/geoip2.phar";
require_once Yii::$app->basePath . "/vendor/autoload.php";
// This creates the Reader object, which should be reused across
// lookups.
$reader = new Reader (Yii::$app->basePath ."/vendor/geoip2/geoip2/GeoLite2-City.mmdb");

// Replace "city" with the appropriate method for your database, e.g.,
// "country".
$ip = Yii::$app->request->userIP;
$record = $reader->city($ip);
$key = "$ip";
$obl = $record->mostSpecificSubdivision->name;
$obl1 = 'Saratovskaya Oblast';

$obl2 = strpos($obl, $obl1);

  if ($obl2 === false){
	
} else {
	$oblast_reg = 64;
} 

$obl1 = 'Krasnodarskiy Kray';
$obl2 = strpos($obl, $obl1);

if ($obl2 === false){
	
} else {
	$oblast_reg = 23; 	
}
$cache = Yii::$app->cache;
$cache->set($key, $oblast_reg);
$oblast1 = "Выберите регион"; */

?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
     <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1.5, user-scalable=no">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> ● Бесплатная Доска объявлений Краснодара, Краснодарского края и юга России</title>
	<?= $this->registerMetaTag(['name' => 'keywords', 'content' => 'Покупка, продажа автотехники и сопутствующих товаров. Грузова, легковая, спецтехника, мототехника и катера, яхты, лодки. Все услуги сайта Бесплатные ']);
        $this->registerMetaTag(['name' => 'description', 'content' => 'Покупка, продажа автотехники и сопутствующих товаров в Краснодаре и Краснодарском крае. Грузова, легковая, спецтехника, мототехника и катера, яхты, лодки. Все услуги сайта Бесплатные. Бесплатная Доска объявлений<div style="display: none;"> Краснодара Краснодарского края и юга России</div> SaleMen. ']);?>
    <?php $this->head() ?>
    
   <!-- Yandex.Metrika counter -->
<script type="text/javascript" >
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

<!-- /Yandex.Metrika counter -->
   
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
      <link rel="shortcut icon" href="/images/faviconka_ss.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

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
#blink2 {
  -webkit-animation: blink2 2s linear infinite;
  animation: blink2 1s linear infinite;
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
    margin-bottom: 3px !important;
	color: #131212 !important;
}

  </style>  
    
    
	<header id="header"><!--header-->

		
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
           			  
                                               
         <li class="dropdown" id="brands_products1"><a><font face="Arial" style="color:#397f8c"><b>ГЛАВНАЯ </b></font></a>
           
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

       <li class="dropdown"><a href="<?=Yii::$app->urlManager->createAbsoluteUrl('/site/mainavto');?>"><font face="Arial" ><span style="color:#ef7204"><b>АВТОТЕХНИКА</b></span></font></a>
	  
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
			 
	<li class="dropdown"><a href= "<?= yii\helpers\Url::to (['/admin']) ?>"> <font face="Arial"><span style="color:#397f8c"> <b>Личный Кабинет</b></font></a>
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
           			  
                                               
         <li class="dropdown" id="brands_products1"><a><font face="Arial" style="color:#397f8c"><b>ГЛАВНАЯ </b></font></a>
           
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

       <li class="dropdown"><a href="<?=Yii::$app->urlManager->createAbsoluteUrl('/site/mainavto');?>"><font face="Arial" ><span style="color:#ef7204"><b>АВТОТЕХНИКА</b></span></font></a>
	  
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
           			  
                                               
         <li class="dropdown" id="brands_products1"> <a><font face="Arial" style="color:#397f8c"><b>ГЛАВНАЯ </b></font></a>
           
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

       <li class="dropdown"><a href="<?=Yii::$app->urlManager->createAbsoluteUrl('/site/mainavto');?>"><font face="Arial" ><span style="color:#ef7204"><b>АВТОТЕХНИКА</b></span></font></a>
	  
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
			 
	<li class="dropdown"><a href= "<?= yii\helpers\Url::to (['/admin']) ?>"> <font face="Arial"><span style="color:#397f8c"> <b>Личный Кабинет</b></font></a>
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
           			  
                                               
         <li class="dropdown" id="brands_products1"><a><font face="Arial" style="color:#397f8c"><b>ГЛАВНАЯ </b></font></a>
           
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

       <li class="dropdown"><a href="<?=Yii::$app->urlManager->createAbsoluteUrl('/site/mainavto');?>"><font face="Arial" ><span style="color:#ef7204"><b>АВТОТЕХНИКА</b></span></font></a>
	  
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
				 <div id="brands_products1">
					<div class="col-sm-4">
						<div class="logo pull-left">
                <a href="<?=Url::home()?>"><?=Html::img('@web/images/home/logo.png', ['alt' => 'SaleMen'])?></a> 
					</div>	
					</div>
					</div>
					<center><div class="col-sm-4">
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
						 
						 
						  <form method="get" action="<?= yii\helpers\Url::to(['category/search']) ?>">
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
                                
                    </div></center>
												
					
					<center><div class="col-sm-4" id="brands_products1">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
                                          
								
<!--    <li><a href="<?= yii\helpers\Url::to (['/site/signup']) ?>"><i class="fa fa-crosshairs"></i><strong> Регистрация</strong></a></li>
                                                                
                                                            
 <li><a href= "<?= yii\helpers\Url::to (['/admin']) ?>"class="btn btn-info" style ="padding: 4px; border-color: #397F8C"> <i class="fa fa-user" style ="padding-left: 2px"></i>
 <strong id="blink2" style ="padding-right: 2px"> Подать объявление</strong></a></li>-->
 
   <li style = "padding-right: 10px;"><a onclick="return getCart()" class="btn btn-info" style ="padding: 4px; border-color: #397F8C"><i class="fa fa-heart" style ="padding-left: 2px"></i> Ваше Избранное</a></li>
  
                                       <?php if (!Yii:: $app->user->isGuest): ?>
                                   
     <!--<li><a href="<?= Url::to (['/site/logout'])?>" class="btn btn-warning" style ="padding-right: 4px; border-color: #ffd8a4" ><i class="fa fa-user" style ="padding-left: 4px"></i>Выход из Л.К.</a></li>-->
                                                    <?php endif;?> 
                                                                
      <!--<li><a href= "<?= yii\helpers\Url::to (['/admin']) ?>"class="btn btn-info" style ="padding-right: 4px; border-color: #f19214"> <i class="fa fa-lock" style ="padding-left: 4px"></i> Личный кабинет</a></li>-->
							</ul>
						</div>
					</div></center>
				</div>
			</div>
		</div>
                
	</header><!--/header-->
        
        
        
	  <?= $content; ?>

	
    <div class="fix_block">
	   <li><a href= "<?= yii\helpers\Url::to (['/admin']) ?>"class="jbl" >✍</a></li>
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
		<!--/Footer-->
        
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
		 
	<a href ="<?= yii\helpers\Url::to (['cart/magaz']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Магазин</i></a>	<br/>		 
                                                
	<a onclick="return showSearchned()" ><i class="btn btn-warning">Недвижимость<div style="display: none;"> Краснодара Краснодарского края и юга России</div></i></a>
	
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
		 
		                <!----------------РАСШИРЕННЫЙ ПОИСК НЕДВИЖИМОСТЬ<div style="display: none;"> Краснодара Краснодарского края и юга России</div>----------->
						
						  <? Modal::begin([
    'header' => '<h4>Выберите категорию</h4>',
    'id' => 'searchned',
	 'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
                               ]) ?>
         
       <center><div>
                    
	<a onclick="return showKvart()" ><i class="btn btn-warning">Квартиры<div style="display: none;"> Краснодара Краснодарского края и юга России</div></i></a>
										
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

        <a href ="<?= yii\helpers\Url::to (['cart/kvart']) ?>" class= "showSearchdoma">
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

        <a href ="<?= yii\helpers\Url::to (['cart/kvart']) ?>" class= "showSearchdoma">
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

		<a href ="<?= yii\helpers\Url::to (['nedvigkvartiri/search1aren']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">1 комнатная</i></a>
										
		<a href ="<?= yii\helpers\Url::to (['nedvigkvartiri/search2aren']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">2 комнатная</i></a>	

        <a href ="<?= yii\helpers\Url::to (['nedvigkvartiri/search3aren']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">3 комнатная</i></a>
										
		<a href ="<?= yii\helpers\Url::to (['nedvigkvartiri/search4aren']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">4 комнатная</i></a><br>

        <a href ="<?= yii\helpers\Url::to (['cart/kvart']) ?>" class= "showSearchdoma">
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

		<a href ="<?= yii\helpers\Url::to (['nedvigzemli/searchigs']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">ИЖС</i></a>
										
		<a href ="<?= yii\helpers\Url::to (['nedvigzemli/searchprom']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Промназначения</i></a>	

        <a href ="<?= yii\helpers\Url::to (['nedvigzemli/searchselh']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Сельхозназначения</i></a>
										
		<a href ="<?= yii\helpers\Url::to (['nedvigzemli/searchsnt']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Дачные/СНТ</i></a>	<br>

        <a href ="<?= yii\helpers\Url::to (['cart/zemli']) ?>" class= "showSearchdoma">
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
                        

    <a href ="<?= yii\helpers\Url::to (['cart/avtoleg']) ?>" class= "showSearchleg">
										<i class="btn btn-warning">Легковые</i></a>   

     <a href ="<?= yii\helpers\Url::to (['cart/avtogruz']) ?>" class= "showSearchgruz">
										<i class="btn btn-warning">Грузовые//Автобусы</i></a>  										
                        
	
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
   Modal::end();
         
         ?>
		 
		 
		  <!-----------------Поиск по разделу магазин------------------->
		  
	<? Modal::begin([
    'header' => '<h4>Поиск по разделу магазин</h4>',
    'id' => 'searchprod',
	 'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
                               ]) ?>
	
							   
		  <form method="get" action="<?= yii\helpers\Url::to(['category/search']) ?>">
                                                     
			 
			 
			 
		<label>Категория</label>
               
<select id="product-category_id" class="form-control" name="Product[category_id]">
   
     <?= \app\components\MenuWidget::widget (['tpl'=> 'select_product', 'model' => $model])?>

</select>
                <br>
                <!--<input type="text" placeholder="мин Цена" name="p1"/><br><hr>-->
                <input type="tel" style = "height: 30px" placeholder=" макс. Цена цифрами" name="p2"/>
                <hr>
      
                 <input type="submit" class="btn btn-warning" name="search" value="ЗАПУСТИТЬ ПОИСК">
               </form>
         <?
   Modal::end();
         
         ?>
	
		 
	
          <!--------------ОПРЕДЕЛЕНИЕ РЕГИОНА---------------------->
		 
		 <? Modal::begin([
    'headerOptions' => [
        'style' => 'display:none;'
    ],
    'id' => 'reg',
	 'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
                               ]) ?>          
                                          
										   
		 <form method="get">
		   <?php if ($oblast_reg){	?>
				 <?php $vasch = 'Ваш регион';
           print($vasch.': '. $oblast_reg );?> <br><br>
		   
           <center> <a href="#" onclick="return showReg1()" ><i class="btn btn-default">Изменить регион</i></a> </center>
		   <?php } ?>
		   <center><p> Если после изменения региона он не изменился(такое увы бывает). Просто перезагрузите страницу и все поменяется.</p></center>
		   
            <?php if (!$oblast_reg){	?>
            <?php $form = ActiveForm::begin(); ?>
			  <center><table class="table table-hover table-striped">

		        <?php
                /*$model_obl = oblast::findAll([64,23]);
                foreach ($model_obl as $key => $item) {
					$model = $item;
				}				
                $oblast1 = oblast::findAll([64,23]);;
                foreach($oblast1 as $id => $item) {
                $id=$id;
				$oblast_region=$item; }
                $oblast = ArrayHelper::map($oblast1, 'id','oblast_region');
              
   echo $form->field($model, 'oblast_region', ['template' => "{label}\n{input}"])
	 ->dropDownList($oblast,['id'=>'id_oblast','prompt' => 'Выбрать регион'])->label('Регион'); */
   
           
			/*  $oblast_reg = $_GET['Oblast']['oblast_region'];
			 $ip = Yii::$app->request->userIP;
			 $key = "$ip";
			 $cache->set($key, $oblast_reg);  */?>
			 
              
                <input type="submit" class="btn btn-warning" name="search" value="Выбрать">
				
				</table></center>
				 <?php
    ActiveForm::end();
?>
			<?php } ?>      
				
</form>
                                      
	 <?
   Modal::end();
         
         ?> 
		 
		                
                <!------------Изменить Регион-------------->
				
	 <? Modal::begin([
    'headerOptions' => [
        'style' => 'display:none;'
    ],
    'id' => 'reg1',
	 'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
                               ]) ?>          
                                          
										   
		 <form method="get">
		 
            <?php $form = ActiveForm::begin(); ?>
			 <center><table class="table table-hover table-striped">

		        <?php
              /*   $model_obl = oblast::findAll([64,23]);
                foreach ($model_obl as $key => $item) {
					$model = $item;
				}				
                $oblast1 = oblast::findAll([64,23]);;
                foreach($oblast1 as $id => $item) {
                $id=$id;
				$oblast_region=$item; }
                $oblast = ArrayHelper::map($oblast1, 'id','oblast_region');
              
   echo $form->field($model, 'oblast_region', ['template' => "{label}\n{input}"])
	 ->dropDownList($oblast,['id'=>'id_oblast','prompt' => 'Выберите другой регион'])->label('Регион');
   
             $cache = Yii::$app->cache;
			 $ip = Yii::$app->request->userIP;
			 $key = "$ip";
		    function deleteFragmentCacheByKey($key)
            {
           return Yii::$app->cache->delete(['yii\widgets\FragmentCache', $key]);
            } 
			 $oblast_reg = $_GET['Oblast']['oblast_region'];
			
			 $cache->set($key, $oblast_reg); */  ?>
			 
              
                <input type="submit" class="btn btn-warning" name="search" value="Изменить">
				
				</table></center>
				 <?php
    ActiveForm::end();
       ?>
			 
				
</form>
                                      
	 <?
   Modal::end();
         
         ?> 

 <script>   
 function showSTR1(trueTel) {
document.getElementById('translationTel1').firstChild.replaceData (0 , trueTel.length, trueTel);
}
</script>   
    
	<?php $this->endBody() ?>
	
</body>
</html>
<?php $this->endPage() ?>





