<?php

/* @var $this \yii\web\АView */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
use app\modules\admin\models\Oblast;
use GeoIp2\Database\Reader;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

            <!-------------АВТОТЕХНИКА--------------->
			 <!-----ОПРЕДЕЛЕНИЕ IP1 АДРЕСА И РЕГИОНА-->
	
	<?php									
 require_once Yii::$app->basePath . "/vendor/geoip2/geoip2/geoip2.phar";
require_once Yii::$app->basePath . "/vendor/autoload.php";
// This creates the Reader object, which should be reused across
// lookups.
$reader = new Reader (Yii::$app->basePath ."/vendor/geoip2/geoip2/GeoLite2-City.mmdb");

// Replace "city" with the appropriate method for your database, e.g.,
// "country".
$ip = Yii::$app->request->userIP;
$record = $reader->city('46.29.15.255');
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
$oblast1 = "Выберите регион";

?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
     <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>Автотехника. Купи-Продай и отдыхай</title>
	<?= $this->registerMetaTag(['name' => 'keywords', 'content' => 'Покупка, продажа автотехники и сопутствующих товаров. Грузова, легковая, спецтехника, мототехника и катера, яхты, лодки. Все услуги сайта Бесплатные ']);
        $this->registerMetaTag(['name' => 'description', 'content' => 'Покупка, продажа автотехники и сопутствующих товаров. Грузова, легковая, спецтехника, мототехника и катера, яхты, лодки. Все услуги сайта Бесплатные ']);?>
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
     <link rel="shortcut icon" href="/images/favicon.jpeg">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<?php $this->beginBody() ?>
    
     <style> 
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
	height:50px;
	 width: 100%;
	padding-left: 6px; 
    padding-right: 10px;
}

 .fixed {
  position: fixed;
  width: 100%;
  padding-left: 6px; 
  padding-right: 10px;
  z-index: 100;
   //opacity: 0.9;

}

div.fix_block {
	position: fixed; 
	bottom: 5px; 
	left: 5px; 
	padding: 5px; 
	z-index: 100;
	opacity: 0.8;
}

.jbl {
  background: none repeat scroll 0 0 #cccaca;
  display: inline-block;
   padding: 1px 1px;
    margin-bottom: 0;
    font-size: 29px;
    font-weight: normal;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid blue;
    border-radius: 8px;
    margin-top: 2px;
	min-width: 35px;
	max-height: 40px;
}

.jbl:hover {
    border: 3px solid green;
    border-radius: 8px;
   // margin-top: 2px;
	min-width: 35px;
	max-height: 40px;
	
}

  </style>  
    
    
	<header id="header"><!--header-->

		
	  <center><div class="fixed">
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
					<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
                                           
                                            
						<div class="mainmenu pull-left">
                                                    
						<ul class="nav navbar-nav collapse navbar-collapse">
                          
                        <!------------->
						<div class="navbar-collapse pull-right nav-main-collapse collapse submenu-dark">
						<nav class="nav-main">
                          <li class="dropdown"><!-- HOME -->
										<a class="dropdown-toggle" href="#">
											HOME
										</a>
										<ul class="dropdown-menu">
											<li class="dropdown">
												<a class="dropdown-toggle" href="#">
													HOME CORPORATE
												</a>
												<ul class="dropdown-menu">
													<li><a href="index-corporate-1.html">CORPORATE LAYOUT 1</a></li>
													<li><a href="index-corporate-2.html">CORPORATE LAYOUT 2</a></li>
													<li><a href="index-corporate-3.html">CORPORATE LAYOUT 3</a></li>
													<li><a href="index-corporate-4.html">CORPORATE LAYOUT 4</a></li>
													<li><a href="index-corporate-5.html">CORPORATE LAYOUT 5</a></li>
													<li><a href="index-corporate-6.html">CORPORATE LAYOUT 6</a></li>
													<li><a href="index-corporate-7.html">CORPORATE LAYOUT 7</a></li>
												</ul>
											</li>
											<li class="dropdown">
												<a class="dropdown-toggle" href="#">
													HOME PORTFOLIO
												</a>
												<ul class="dropdown-menu">
													<li><a href="index-portfolio-1.html">PORTFOLIO LAYOUT 1</a></li>
													<li><a href="index-portfolio-2.html">PORTFOLIO LAYOUT 2</a></li>
													<li><a href="index-portfolio-masonry.html">PORTFOLIO MASONRY</a></li>
												</ul>
											</li>
											<li class="dropdown">
												<a class="dropdown-toggle" href="#">
													HOME BLOG
												</a>
												<ul class="dropdown-menu">
													<li><a href="index-blog-1.html">BLOG LAYOUT 1</a></li>
													<li><a href="index-blog-2.html">BLOG LAYOUT 2</a></li>
													<li><a href="index-blog-3.html">BLOG LAYOUT 3</a></li>
													<li><a href="index-blog-4.html">BLOG LAYOUT 4</a></li>
												</ul>
											</li>
											<li class="dropdown">
												<a class="dropdown-toggle" href="#">
													HOME SHOP
												</a>
												<ul class="dropdown-menu">
													<li><a href="index-shop-1.html">SHOP LAYOUT 1</a></li>
													<li><a href="index-shop-2.html">SHOP LAYOUT 2</a></li>
													<li><a href="index-shop-3.html">SHOP LAYOUT 3</a></li>
													<li><a href="index-shop-4.html">SHOP LAYOUT 4</a></li>
													<li><a href="index-shop-5.html">SHOP LAYOUT 5</a></li>
												</ul>
											</li>
											<li class="dropdown">
												<a class="dropdown-toggle" href="#">
													HOME MAGAZINE
												</a>
												<ul class="dropdown-menu">
													<li><a href="index-magazine-1.html">MAGAZINE LAYOUT 1</a></li>
													<li><a href="index-magazine-2.html">MAGAZINE LAYOUT 2</a></li>
												</ul>
											</li>
											<li class="dropdown">
												<a class="dropdown-toggle" href="#">
													HOME LANDING PAGE
												</a>
												<ul class="dropdown-menu">
													<li><a href="index-landing-1.html">LANDING PAGE LAYOUT 1</a></li>
													<li><a href="index-landing-2.html">LANDING PAGE LAYOUT 2</a></li>
													<li><a href="index-landing-3.html">LANDING PAGE LAYOUT 3</a></li>
													<li><a href="index-landing-4.html">LANDING PAGE LAYOUT 4</a></li>
													<li><a href="index-landing-5.html">LANDING PAGE LAYOUT 5</a></li>
												</ul>
											</li>
											<li class="dropdown">
												<a class="dropdown-toggle" href="#">
													HOME FULLSCREEN
												</a>
												<ul class="dropdown-menu">
													<li><a href="index-fullscreen-revolution.html">FULLSCREEN - REVOLUTION</a></li>
													<li><a href="index-fullscreen-youtube.html">FULLSCREEN - YOUTUBE</a></li>
													<li><a href="index-fullscreen-local-video.html">FULLSCREEN - LOCAL VIDEO</a></li>
													<li><a href="index-fullscreen-image.html">FULLSCREEN - IMAGE</a></li>
													<li><a href="index-fullscreen-txt-rotator.html">FULLSCREEN - TEXT ROTATOR</a></li>
												</ul>
											</li>
											<li class="dropdown">
												<a class="dropdown-toggle" href="#">
													HOME ONE PAGE
												</a>
												<ul class="dropdown-menu">
													<li><a href="index-onepage-default.html">ONE PAGE - DEFAULT</a></li>
													<li><a href="index-onepage-revolution.html">ONE PAGE - REVOLUTION</a></li>
													<li><a href="index-onepage-image.html">ONE PAGE - IMAGE</a></li>
													<li><a href="index-onepage-parallax.html">ONE PAGE - PARALLAX</a></li>
													<li><a href="index-onepage-youtube.html">ONE PAGE - YOUTUBE</a></li>
													<li><a href="index-onepage-text-rotator.html">ONE PAGE - TEXT ROTATOR</a></li>
													<li><a href="start.html#onepage"><span class="label label-success pull-right">new</span> MORE LAYOUTS</a></li>
												</ul>
											</li>
											<li class="divider"></li>
											<li class="dropdown">
												<a class="dropdown-toggle" href="#">
													HOME - THEMATICS <i class="fa fa-heart margin-left-10"></i>
												</a>
												<ul class="dropdown-menu">
													<li><a href="index-thematics-restaurant.html">HOME - RESTAURANT</a></li>
													<li><a href="index-thematics-education.html">HOME - EDUCATION</a></li>
													<li><a href="index-thematics-construction.html">HOME - CONSTRUCTION</a></li>
													<li><a href="index-thematics-medical.html">HOME - MEDICAL</a></li>
													<li><a href="index-thematics-church.html">HOME - CHURCH</a></li>
													<li><a href="index-thematics-fashion.html">HOME - FASHION</a></li>
													<li><a href="index-thematics-wedding.html">HOME - WEDDING</a></li>
													<li><a href="index-thematics-events.html">HOME - EVENTS</a></li>
												<li><a href="http://www.stepofweb.com/propose-design.html" data-toggle="tooltip" data-placement="top" title="Do you need a specific home design? We can include it in the next update!" target="_blank"><span class="label label-danger pull-right">hot</span> PROPOSE THEMATIC</a></li>
												</ul>
											</li>
											<li class="divider"></li>
											<li><a href="start.html#newrevslider" data-toggle="tooltip" data-placement="top" title="32 More Revolution Slider V5"><span class="label label-danger pull-right">new</span> 32 MORE LAYOUTS</a></li>
											<li class="divider"></li>
											<li><a href="index-simple-revolution.html">HOME SIMPLE - REVOLUTION</a></li>
											<li><a href="index-simple-layerslider.html">HOME SIMPLE - LAYERSLIDER</a></li>
											<li><a href="index-simple-parallax.html">HOME SIMPLE - PARALLAX</a></li>
											<li><a href="index-simple-youtube.html">HOME SIMPLE - YOUTUBE</a></li>
										</ul>
									</li>
									</nav>
									</div>
                         <!----------------->                   
            <li><a href="<?=\yii\helpers\Url::home()?>"><font face="Arial"  ><span style="color:#397f8c"><b>МАГАЗИН</b></span></font></a></li>

            <li class="dropdown"><a href="<?=\yii\helpers\Url::to (['/site/mainned'])?>"><font face="Arial" ><span style="color:#397f8c"><b>НЕДВИЖИМОСТЬ</b></span></font></a>
			
			 <ul role="menu" class="sub-menu">
                <div class="brands-name1"> 
       				
     <li class="dropdown"><a href="<?=\yii\helpers\Url::to (['/nedvigcategory/view?id=1'])?>">Квартиры</a>
          <ul role="menu" class="sub-menu">
		    <div class="brands-name1"> 
		    <li><a href="<?= \yii\helpers\Url::to(['/nedvigcategory/view?id=2'])?>">????</a></li> 
			</div>
		  </ul>
		  </li>
     <li><a href="<?= \yii\helpers\Url::to(['/nedvigcategory/view?id=2'])?>">Дома/Коттеджи/Дачи</a></li> 
	 
	  <li><a href="<?=\yii\helpers\Url::to (['/nedvigcategory/view?id=3'])?>">Комнаты</a></li>

     <li><a href="<?= \yii\helpers\Url::to(['/nedvigcategory/view?id=4'])?>">Коммерческая</a></li> 
	 
	  <li><a href="<?=\yii\helpers\Url::to (['/nedvigcategory/view?id=5'])?>">Земельные участки</a></li>

     <li><a href="<?= \yii\helpers\Url::to(['/nedvigcategory/view?id=6'])?>">Гаражи</a></li> 
	 
	 <li><a href="<?= \yii\helpers\Url::to(['/nedvigcategory/view?id=7'])?>">Готовый бизнес</a></li> 
                        </div>                                                         
                                    </ul>
			
			</li>

             <li class="dropdown"><a href="<?=Yii::$app->urlManager->createAbsoluteUrl('/site/mainavto');?>"><font face="Arial" style="color:blue"><span style="color:#ef7204" ><b>АВТОТЕХНИКА</b> </font></a>
			  
			   <ul role="menu" class="sub-menu">
                <div class="brands-name1">                         
     <li><a href="<?=\yii\helpers\Url::to (['/avtocategory/view?id=1'])?>">Легковые</a></li>

     <li><a href="<?= \yii\helpers\Url::to(['/avtocategory/view?id=2'])?>">Грузовые//Автобусы</a></li> 
	 
	  <li><a href="<?=\yii\helpers\Url::to (['/avtocategory/view?id=3'])?>">Спецтехника</a></li>

     <li><a href="<?= \yii\helpers\Url::to(['/avtocategory/view?id=4'])?>">Мототехника</a></li> 
	 
	  <li><a href="<?=\yii\helpers\Url::to (['/avtocategory/view?id=5'])?>">Комплектующие для авто</a></li>

     <li><a href="<?= \yii\helpers\Url::to(['/avtocategory/view?id=6'])?>">Водный транспорт</a></li> 
		 </div>
		</ul>
			
			 </li>
			
			<li><a href= "<?= yii\helpers\Url::to (['/admin']) ?>"> <font face="cursive"><span style="color:#397f8c"> <b>Личный Кабинет</b></span></font></a></li>
                                                                
            <!-- <li><a href="<?=\yii\helpers\Url::home()?>"><font face="Arial" style="color:#397f8c"><span style="color:#f59d27"><b>МАГАЗИН</b></span></font></a></li> -->
                             
							</ul>
						</div>
					</div>
					
                                    <!-- поиск -->
<!--					<div class="col-sm-3">
						<div class="search_box pull-right">
                                                    <form method="get" action="<?= yii\helpers\Url::to(['category/search' ]) ?>">
							<input type="text" placeholder="Поиск. Введите запрос и нажмите Enter" name="q"/>
                                                    </form>  
						</div>
					</div>-->
					
					<?php
					
					$id = Yii::$app->request->get(id);?>
					
					<?php if (!$id) {?>  
					
					<div class="col-sm-3">
                        
	<li><a onclick="return showSearchavto()" >
	                                 <i class="btn btn-warning"><i class="fa fa-globe"></i> Поиск по разделу Автотехника</i></a></li>
                       
					 </div>
					
					<?php } elseif ($id == 1) {?>                
					<div class="col-sm-3">
                        
	 <a href ="<?= yii\helpers\Url::to (['cart/avtoleg']) ?>" class= "showSearchleg">
										<i class="btn btn-warning"><i class="fa fa-globe"></i> Поиск по разделу Легковые</i></a> 

                       
					 </div>
					  <?php }elseif($id == 2) {?>                
					<div class="col-sm-3">
                        
	<a href ="<?= yii\helpers\Url::to (['cart/avtogruz']) ?>" class= "showSearchgruz">
										<i class="btn btn-warning"><i class="fa fa-globe"></i> Поиск по разделу Грузовые</i></a>  	
			 
					 </div> 
					 
					 <?php } elseif($id == 3) {?>                
					 <div class="col-sm-3">
                        
    <a href ="<?= yii\helpers\Url::to (['cart/avtospec']) ?>" class= "showSearchspec">
										<i class="btn btn-warning"><i class="fa fa-globe"></i> Поиск по разделу Спецтехника</i></a>  										
                        
			 
					 </div> 
					 
					 <?php } elseif($id == 4) {?>                
					 <div class="col-sm-3">
                        
	<a href ="<?= yii\helpers\Url::to (['cart/avtomoto']) ?>" class= "showSearchmoto">
										<i class="btn btn-warning"><i class="fa fa-globe"></i> Поиск по разделу Мототехника</i></a>  
			 
					 </div> 
					 
					 <?php } elseif($id == 5) {?>                
					 <div class="col-sm-3">
                        
	<a href ="<?= yii\helpers\Url::to (['cart/avtokomplekt']) ?>" class= "showSearchzemli">
										<i class="btn btn-warning"><i class="fa fa-globe"></i> Поиск по разделу Комплектующие</i></a>	
			 
					 </div> 
					 
					 <?php } elseif($id == 6) {?>                
					 <div class="col-sm-3">
                        
	<a href ="<?= yii\helpers\Url::to (['cart/avtovodnik']) ?>" class= "showSearchvodnik">
										<i class="btn btn-warning"><i class="fa fa-globe"></i> Поиск по разделу Водный транспорт</i></a>  
			 
					 </div> 
					 
					 <?php } elseif ($id > 6) {?>                
					<div class="col-sm-3">
                        
	<a onclick="return showSearchsearch()" ><i class="btn btn-warning" 
	                              style= "margin-left: 10px; margin-top: 1px;" ><i class="fa fa-globe"></i> ПОИСК по всем категориям</i></a>

                       
					 </div>
					  <?php }?> 
					
				</div>
			</div>
		</div><!--/header-bottom-->
           </div></center>
         <center><div class="header-middle1">
		  
            </div>	</center>
         
		<div class="header-middle" style="padding-top: 3px">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
                <a href="<?=\yii\helpers\Url::home()?>"><?=Html::img('@web/images/home/logo.png', ['alt' => 'SaleMen'])?></a>
						
		<!--<a href="#" onclick="return showReg()" ><i class="btn btn-default"> if ($oblast_reg){ 
		                                                                         $oblast2 = Oblast::find()->select('oblast_region')
                                                                                             ->where(['id' => $oblast_reg])->one();
                                                                                  foreach($oblast2 as $item) {
	                                                                                       $oblast_reg = $item;}?> 
		                                                                               echo ("$oblast_reg");} 
		                                                                          else{ echo ("$oblast1");}?></i></a> -->   
                                
                                                </div>
												
					</div>
					<div class="col-sm-8">
						<center><div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
                                          
								
<!--    <li><a href="<?= yii\helpers\Url::to (['/site/signup']) ?>"><i class="fa fa-crosshairs"></i><strong> Регистрация</strong></a></li>-->
                                                                
                                                            
 <li><a href= "<?= yii\helpers\Url::to (['/admin']) ?>"class="btn btn-info" > <i class="fa fa-user" style ="padding-left: 4px"></i>
 <strong id="blink2" style ="padding-right: 4px"> Разместить объявление</strong></a></li>
 
  <li><a href="#" onclick="return getCart()" class="btn btn-info" style ="padding-right: 4px; border-color: #f19214"><i class="fa fa-shopping-cart" style ="padding-left: 4px"></i> Избранное</a></li>
  
                                       <?php if (!Yii:: $app->user->isGuest): ?>
                                   
     <!--<li><a href="<?= \yii\helpers\Url::to (['/site/logout'])?>" class="btn btn-warning" style ="padding-right: 4px; border-color: #ffd8a4" ><i class="fa fa-user" style ="padding-left: 4px"></i>Выход из Л.К.</a></li>-->
                                                    <?php endif;?> 
                                                                
      <!--<li><a href= "<?= yii\helpers\Url::to (['/admin']) ?>"class="btn btn-info" style ="padding-right: 4px; border-color: #f19214"> <i class="fa fa-lock" style ="padding-left: 4px"></i> Личный кабинет</a></li>-->
							</ul>
						</div></center>
					</div>
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
				<div class="row">
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<h5><strong>Сервис:</strong></h5>
							
						<div class="contactinfo">
							<ul class="nav nav-pills">
	<p id = "translationTel1">+7 XXX XXX  <span id = "showTel" onclick = "showSTR1('+7(8452)93-59-69 | 1@salemen.ru')"><strong> <br>показать телефон и эл.почту</span></p>
							</ul>
						</div>
					
							<!-- <ul class="nav navbar-nav">
								<li><a href="#"> Online Help |</a></li>
								<li><a href="#"> Contact Us |</a></li>
								<li><a href="#"> Order Status |</a></li>
								<li><a href="#"> Change Location |</a></li>
								<li><a href="#"> FAQ’s</a></li>
								
								
							</ul> -->
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
						<h5><strong>Мы в соцсетях: заходите в гости</strong></h5>
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
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 SaleMen.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.salemen.ru">SaleMen</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
        
        <?
         
         \yii\bootstrap\Modal::begin ([
             'header'=> '<h3>Избранное</h3> <button type="button" class="btn btn-default" onclick ="clearCart()">Очистить</button>',
             'id'=> 'cart',
             'size'=> 'modal-lg', 
             'footer' => '<button type="button" class="btn btn-danger" data-dismiss="modal">Продолжить</button>'
             
             
                
         ]);
         
          \yii\bootstrap\Modal::end();
         
         ?>
		 
		 
		  <!-------------Поиск по сайту------------->
					
					<?
         
         \yii\bootstrap\Modal::begin ([
             'header'=> '<h4>Выберите раздел сайта</h4>',
             'id'=> 'searchsearch',
			 //'clientOptions' => ['show' => true],
             'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
			 
               
         ]);?>
		 
		 <center><div>
                        
	<a href="#" onclick="return showSearchned()" ><i class="btn btn-warning">Недвижимость</i></a>
	
	<a href="#" onclick="return showSearchavto()" ><i class="btn btn-warning">Автотехника</i></a>
	
	<a href ="<?= yii\helpers\Url::to (['cart/magaz']) ?>" class= "showSearchkvartt">
										               <i class="btn btn-warning">Магазин</i></a>
	
         </div></center>
          <?
		  \yii\bootstrap\Modal::end();
         
         ?>
		 
		                <!----------------РАСШИРЕННЫЙ ПОИСК НЕДВИЖИМОСТЬ----------->
						
						  <? \yii\bootstrap\Modal::begin([
    'header' => '<h4>Выберите категорию</h4>',
    'id' => 'searchned',
	 'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
                               ]) ?>
         
       <center><div>
                    
	<a href ="<?= yii\helpers\Url::to (['cart/kvart']) ?>" class= "showSearchkvartt">
										<i class="btn btn-warning">Квартиры</i></a>
										
	<a href ="<?= yii\helpers\Url::to (['cart/dom']) ?>" class= "showSearchdoma">
										<i class="btn btn-warning">Дома, Коттеджи, Дачи</i></a>									

                       				
    <a href ="<?= yii\helpers\Url::to (['cart/komn']) ?>" class= "showSearchkomnati">
										<i class="btn btn-warning">Комнаты</i></a>									
                    
	<a href ="<?= yii\helpers\Url::to (['cart/kommerch']) ?>" class= "showSearchkomm">
										<i class="btn btn-warning">Коммерческая недвижимость</i></a>									
                    				
	<a href ="<?= yii\helpers\Url::to (['cart/zemli']) ?>" class= "showSearchzemli">
										<i class="btn btn-warning">Земельные участки</i></a>	
                        
	<a href ="<?= yii\helpers\Url::to (['cart/biznes']) ?>" class= "showSearchbiznes">
										<i class="btn btn-warning">Готовый бизнес</i></a>	
	
	<a href ="<?= yii\helpers\Url::to (['cart/garagi']) ?>" class= "showSearchgaragi">
										<i class="btn btn-warning">Гаражи</i></a>	
										
    <!--<a href="#" onclick="return showSearchgaragi()" ><i class="btn btn-warning">Гаражи</i></a></li>-->
			 
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
   \yii\bootstrap\Modal::end();
         
         ?>
		 
		 
		  <!-----------------Поиск по разделу магазин------------------->
		  
	<? \yii\bootstrap\Modal::begin([
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
                <!--<input type="text" placeholder="мин стоимость" name="p1"/><br><hr>-->
                <input type="tel" style = "height: 30px" placeholder=" макс. стоимость цифрами" name="p2"/>
                <hr>
      
                 <input type="submit" class="btn btn-warning" name="search" value="ЗАПУСТИТЬ ПОИСК">
               </form>
         <?
   \yii\bootstrap\Modal::end();
         
         ?>
	
		 
	
          <!--------------ОПРЕДЕЛЕНИЕ РЕГИОНА---------------------->
		 
		 <? \yii\bootstrap\Modal::begin([
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
                $model_obl = oblast::findAll([64,23]);
                foreach ($model_obl as $key => $item) {
					$model = $item;
				}				
                $oblast1 = oblast::findAll([64,23]);;
                foreach($oblast1 as $id => $item) {
                $id=$id;
				$oblast_region=$item; }
                $oblast = ArrayHelper::map($oblast1, 'id','oblast_region');
              
   echo $form->field($model, 'oblast_region', ['template' => "{label}\n{input}"])
	 ->dropDownList($oblast,['id'=>'id_oblast','prompt' => 'Выбрать регион'])->label('Регион');
   
           
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
   \yii\bootstrap\Modal::end();
         
         ?> 
		 
		                
                <!------------Изменить Регион-------------->
				
	 <? \yii\bootstrap\Modal::begin([
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
                $model_obl = oblast::findAll([64,23]);
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
   
           /*  $cache = Yii::$app->cache;
			 $ip = Yii::$app->request->userIP;
			 $key = "$ip";
		  /*  function deleteFragmentCacheByKey($key)
            {
           return Yii::$app->cache->delete(['yii\widgets\FragmentCache', $key]);
            } 
			 $oblast_reg = $_GET['Oblast']['oblast_region'];
			
			 $cache->set($key, $oblast_reg); */ ?>
			 
              
                <input type="submit" class="btn btn-warning" name="search" value="Изменить">
				
				</table></center>
				 <?php
    ActiveForm::end();
       ?>
			 
				
</form>
                                      
	 <?
   \yii\bootstrap\Modal::end();
         
         ?> 
  
    
	<?php $this->endBody() ?>
	<script>
function showSTR1(trueTel) {
document.getElementById('translationTel1').firstChild.replaceData (0 , trueTel.length, trueTel);
}
</script>
</body>
</html>
<?php $this->endPage() ?>





