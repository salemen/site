<?php

use yii\helpers\Html;
use app\assets\AppAsset;
use app\models\NedvigKvartiri;
use app\models\NedvigDoma;
use app\models\NedvigKomnati;
use app\models\NedvigKommercheska;
use app\models\NedvigGaragi;
use app\models\NedvigBiznes;
use app\models\NedvigZemli;
use app\modules\admin\models\Oblast;
use app\modules\admin\models\Goroda;
use app\modules\admin\models\Raion;
use yii\helpers\Url;
use GeoIp2\Database\Reader;


AppAsset::register($this);

$this->title = 'Купить, продать, арендовать: квартиру, дом, участок, коммерческую недвижимость, готовый бизнес. Краснодар и Краснодарский край';
?>


 <!-----ОПРЕДЕЛЕНИЕ IP1 АДРЕСА И РЕГИОНА-->
											
<?php										
/* require_once Yii::$app->basePath . "/vendor/geoip2/geoip2/geoip2.phar";
require_once Yii::$app->basePath . "/vendor/autoload.php";
// This creates the Reader object, which should be reused across
// lookups.
$reader = new Reader (Yii::$app->basePath ."/vendor/geoip2/geoip2/GeoLite2-City.mmdb");

// Replace "city" with the appropriate method for your database, e.g.,
// "country".
$ip = Yii::$app->request->userIP;
$record = $reader->city($ip);
$key = "$ip";

$oblast_reg = $record->mostSpecificSubdivision->name;
 //$cache->set($key, $oblast_reg, 6400); */
 ?>



<link rel="stylesheet" href="/owl-carousel/css/owl.carousel.css">
	    <link rel="stylesheet" href="/owl-carousel/css/owl.theme.default.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <script src="/owl-carousel/js/owl.carousel.js"></script>
		

<section id="advertisement">
		<div class="container">
			<img src="/images/shop/sarmetr.jpg" alt="" />
		</div>
	</section>


	
	<section>
		<div class="container" style="padding-top: 10px">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar" style="padding-left: 5px;">
                                            
                                            
						<h2>Категории недвижимости</h2>
                       
						  
<ul class="catalog1 category-products">
<?= \app\components\MenuWidgetned::widget(['tpl' => 'menuned' ]) ?>
</ul>

                    <div id="fixed">
					  <div id="brands_products1">
							
							<div class="brands-name">
							<h2>Популярное на сайте</h2>
								<ul class="nav nav-pills nav-stacked">
								  	<li><a href ="<?= yii\helpers\Url::to (['nedvigcategory/2','ads'=>'doma-cottage']) ?>"> <span class="pull-right">(🏠)</span>Дома, Коттеджи</a></li>
									 <li><a href="<?= yii\helpers\Url::to (['nedvigcategory/14','ads'=>'vse-uchastki']) ?>"><span class="pull-right">(🌎)</span>Земельные участки</a></li>
									<li><a href="<?= yii\helpers\Url::to (['nedvigcategory/8','ads'=>'vse-kvartiri']) ?>"> <span class="pull-right">(🌇)</span>Квартиры</a></li>
									<li><a href="<?= yii\helpers\Url::to (['nedvigcategory/19','ads'=>'vsy-kommercheskaya']) ?>"> <span class="pull-right">(🏠)</span>Коммерческая недвижимость</a></li>
									<li><a href="<?= yii\helpers\Url::to (['category/53','ads'=>'vakansii-rabota']) ?>"> <span class="pull-right">(🎩)</span>Работа<<Вакансии</a></li>
									<li><a href="https://salemen.ru/admin"> <span class="pull-right">(✏️)</span>Подать объявление</a></li>
									
								<center><a onclick="return showSearchned()" ><i class="btn btn-warning">Поиск Недвижимости</i></a></center>	
								</ul>
							</div>
						</div>
					</div>	
						
						<div id="brands_products2">
					
						<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						
						<div class="carousel-inner">
							<div class="item active">
								 <center><div style ="padding-bottom: 5px;">					
						
										<a href ="<?= yii\helpers\Url::to (['nedvigcategory/2','ads'=>'doma-cottage']) ?>"> <span><img class="animate1" src="/images/dom.png" alt="дом"></span></a>
									 <a href="<?= yii\helpers\Url::to (['nedvigcategory/14','ads'=>'vse-uchastki']) ?>"> <span><img class="animate1" src="/images/zemli.png" alt="участок"></span></a>
									<a href="<?= yii\helpers\Url::to (['nedvigcategory/8','ads'=>'vse-kvartiri']) ?>">  <span><img class="animate1" src="/images/kvartira.png" alt="квартира"></span></a>
									<a href="<?= yii\helpers\Url::to (['avtocategory/1','ads'=>'legkovie-avto']) ?>"> <span><img class="animate1" src="/images/avto.png" alt="легковой"></span></a>
									<!--<a href="https://salemen.ru/category/76"> <span><img class="animate1" src="/images/sud.png" alt="юристы"></span></a>&nbsp; -->
									<a href="<?= yii\helpers\Url::to (['category/53','ads'=>'vakansii-rabota']) ?>"> <span><img class="animate1" src="/images/rabota.png" alt="работа"></span></a>
									<a href="https://salemen.ru/admin"> <span><img class="animate1" src="/images/lk.png" alt="ЛК"></span></a>
							
					</div></center>
							</div>
							<div class="item">
								 <center><div style ="padding-bottom: 5px;">
					
						
										<a href="<?= yii\helpers\Url::to (['avtocategory/3','ads'=>'spec-tehnika']) ?>"> <span><img class="animate1" src="/images/bulldozer.png" alt="спецтехника"></span></a>
									<a href="<?= yii\helpers\Url::to (['nedvigcategory/4','ads'=>'vsy-kommercheskaya']) ?>"> <span><img class="animate1" src="/images/shop.png" alt="коммерческая"></span></a>
									<a href="<?= yii\helpers\Url::to (['nedvigcategory/3','ads'=>'komnati']) ?>"> <span><img class="animate1" src="/images/komnata.png" alt="комнаты"></span></a>
									<a href="<?= yii\helpers\Url::to (['avtocategory/2','ads'=>'gruzovie-avto']) ?>"> <span><img class="animate1" src="/images/gruzovik.png" alt="грузовой"></span></a>
									<a href="<?= yii\helpers\Url::to (['category/76','ads'=>'delovye-uslugi-yuristy']) ?>"> <span><img class="animate1" src="/images/sud.png" alt="юристы"></span></a>
									<!--<a href="https://salemen.ru/category/174"> <span><img class="animate1" src="/images/stroika.png" alt="строительство"></span></a>-->
									<a href="https://salemen.ru/admin"> <span><img class="animate1" src="/images/lk.png" alt="ЛК"></span></a>
							
					</div></center>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
					</div>
											
					</div>
				</div>
                            
                            
				
				<div class="col-sm-9 padding-right">
				
				<center><h1><span style="font-size: 16px">
               <div>Хотите купить или продать дом, квартиру, земельный участок или арендовать, сдать в аренду коммерческую недвижимость ?</div>
			    <div id="some_text" style="display: none;">
К Вашим услугам доска объявлений в Краснодаре, Краснодарском крае и юге России, SaleMen.ru. Здесь Вы можете найти покупателя или продавца на свою недвижимость, можете бесплатно подать объявление о продаже квартиры, дома или например офиса и другой коммерческой недвижимости.
Наша доска объявлений быстрая, удобная, бесплатная, легкая.
Заходите покупайте, продавайте, любую недвижимость Краснодара и Краснодарского края.
Расширенный поиск по доске объявлений отдельно в каждой категории: квартиры, комнаты, земельные участки, дома/коттеджи, бизнес и коммерческая недвижимость.
Живой поиск в разделах.
Поиск по категориям с быстрым переходом в самые популярные категории: 1 комнатная квартира, 2 комнатная квартира, 3 комнатная квартира, а также по участкам ИЖС, сельхозназначения, промназначения, СНТ/Дачные участки.
Ждем Вас на SaleMen.ru у нас есть вся Недвижимость Краснодара, Краснодарского края и юга России.</span>
				
              </div></h1>
                <a id="link">Показать полностью</a></center>
				
					<div class="features_items"><!--features_items-->
                                            
						
         <style>
        .product-image-wrapper3{
	border:3px solid #e2e2db;
	overflow: auto;
	margin-bottom:10px;
    max-height: 350px;
	max-width: 400px;	
	border-radius: 8px;
		
}

    .product-image-wrapper5{
	border:4px solid red;
	overflow: auto;
	margin-bottom:10px;
    max-height: 350px;
	max-width: 400px;	
	border-radius: 8px;
		
}

		
		.left-sidebar{
			padding-left: 3px; 
			padding-right: 3px;
		}
        </style>
                                         
                                            
                                           <div class="recommended_items">
                                               <h2 class="title text-center">избранные квартиры</h2>
                                        
                                       
         <div id="recommended-item-carousel">
		   <div class="carousel-inner">
         <div class="owl-carousel slide-kva owl-theme"> 
		  <?php /*  if (!$oblast_reg||$oblast_reg===false){  */
	                           $hits = nedvigkvartiri::find()->where(['hit'=>'1'])->orderBy('RAND()')->limit(24)->all();
                               /*  } else {
	                           $hits = nedvigkvartiri::find()->where(['hit'=>'1'])->andWhere(['Like', 'oblast_region',  $oblast_reg])->orderBy('RAND()')->limit(20)->all();
                                     }  */
				 				    ?>
     
      
<?php $count = count($hits); $i = 0; foreach($hits as $hit): ?>
 <?php if ($hit -> moder == 1 ) { ?>
<?php if($i % 4 == 0): ?>
    <div class="item <?php if($i == 0) echo 'active' ?>">
<?php endif; ?>
        <div class="col-sm-3">
		<center>
           <?php if(!empty($hit->videl)){ ?> 
				<div class="product-image-wrapper5">
					<?php } else { ?> 
						<div class="product-image-wrapper3">
						   <?php } ?>
                <div class="single-products1">
                    <div class="productinfo text-center">
                        <?php $model = nedvigkvartiri::findOne($nedvigkvartiri->id);?>
                                                                       
                            <?php $imageTitle = $hit->getImage();?>
                                                     
                               <?php $gorod1 = Goroda::find()->select('name')->where(['id' => $hit->gorod])->one();
                                           foreach($gorod1 as $item) {
                                                 $hit->gorod = $item;}
												
												$gor = $hit->gorod;
                                                $type = $hit->type;
												
										$pl = $hit -> plochad_obchy;
										 $oper = $hit -> operaciya;
										$tip = $hit -> type;
										$kom = $hit -> kolichestvo_komnat;
										$gor = $hit -> gorod;
										$price = $hit -> price;	
								?>																
												 
                          <?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
																
                                               
                                                 <a href="<?= yii\helpers\Url::to(['nedvigkvartiri/'.$hit->id,'ads' =>'kvartira_plochad_'.$hit->plochad_obchy.'_komn_'.$hit->kolichestvo_komnat.'_price_'.$hit->price]) ?>">
												 <li><?=Html::img($imageTitle->getUrl(''), ['alt' => "$kom" .' комнатная  🏙  ' ."$tip" .', '. "$oper".', '."$pl".' м.кв. '."$price".' руб. '."$gor"]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												 <a href="<?= yii\helpers\Url::to(['nedvigkvartiri/'.$hit->id,'ads' =>'kvartira_plochad_'.$hit->plochad_obchy.'_komn_'.$hit->kolichestvo_komnat.'_price_'.$hit->price]) ?>">
												 <li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => "$kom" .' комнатная  🏙  ' ."$tip" .', '. "$oper".', '."$pl".' м.кв. '."$price".' руб. '."$gor"]) ?></li></a>
												 
												                             <?php } ?>
                         
                         
                         <h4><p><?= $hit->operaciya?> <?= $hit->kolichestvo_komnat?> ком.</p></h4>
					
                          <h4> <?= $hit->gorod?></h4>
						  
						   <?php if ($hit->raion ==0){         
	                                        }
	                            else {$raion1 = Raion::find()->select('raion')->where(['id' => $hit->raion])->one();
                                      foreach($raion1 as $item) {
                                         $hit->raion = $item;}};?>
						  <h5> Район: <?= $hit->raion?></h5> 
                        <h5>Цена: <?= $formatted_number = number_format($hit->price, 0, ',', ' ');?> руб.</h5>
                       
                      
                    </div>
					
					                <!--<?php if ($hit->new){?>
                                       <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
					                <?php } ?>
                                                                    
									<?php if ($hit->sale){?>
									   <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'sale' ]) ?>
									<?php } ?>-->
					                              
                </div>
				
            </div>
			
			</center>
        </div>
<?php $i++; if($i % 4 == 0 || $i == $count): ?>
    </div>
<?php endif; ?>
 <?php }; ?>
<?php endforeach; ?>
        </div>
       
   </div>
      </div>                                         
                                          
										  <h2 class="title text-center">избранные дома/коттеджи</h2>
                                        
                                         <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
		<div class="owl-carousel slide-dom owl-theme"> 
		 <?php /* if (!$oblast_reg||$oblast_reg===false){ */
	                           $hits = nedvigdoma::find()->where(['hit'=>'1'])->orderBy('RAND()')->limit(24)->all();
                               /* } else {
	                           $hits = nedvigdoma::find()->where(['hit'=>'1'])->andWhere(['Like', 'oblast',  $oblast_reg])->orderBy('RAND()')->limit(20)->all();
                                     } */
				 				    ?>
     
<?php $count = count($hits); $i = 0; foreach($hits as $hit): ?>

    <?php  if ($hit->oblast ==0){         
													  
			   }										
			   else {$oblast1 = oblast::find()->select('oblast_region')
			->where(['id' => $hit->oblast])
			->one();
			   foreach($oblast1 as $item) {
			   $hit->oblast = $item;}}; 
      ?>

<?php if ($hit -> moder == 1 ) { ?>
<?php if($i % 4 == 0): ?>
    <div class="item <?php if($i == 0) echo 'active' ?>">
<?php endif; ?>
        <div class="col-sm-3">
		<center>
           <?php if(!empty($hit->videl)){ ?> 
				<div class="product-image-wrapper5">
					<?php } else { ?> 
						<div class="product-image-wrapper3">
						   <?php } ?>
                <div class="single-products1">
                    <div class="productinfo text-center">
                        <?php $model = nedvigdoma::findOne($nedvigdoma->id);?>
                                                                       
                            <?php $imageTitle = $hit->getImage();?>
                                                                    
                        <?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                  <a href="<?= yii\helpers\Url::to(['nedvigdoma/'.$hit->id,'ads' =>'dom_plochad_'.$hit->plochad_doma.'_uchastok_'.$hit->plochad_uchastka.'_sot_price_'.$hit->price]) ?>">
												  <li><?=Html::img($imageTitle->getUrl(''), ['alt' => '🏡 Купить '.$hit->vid_obiekta .' '.$hit -> plochad_doma . ' м.кв., участок '.$hit ->plochad_uchastka .' сот., '.$hit ->price.' руб. '. $hit->oblast]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												  <a href="<?= yii\helpers\Url::to(['nedvigdoma/'.$hit->id,'ads' =>'dom_plochad_'.$hit->plochad_doma.'_uchastok_'.$hit->plochad_uchastka.'_sot_price_'.$hit->price]) ?>">
												  <li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => '🏡 Купить '.$hit->vid_obiekta .' '.$hit -> plochad_doma . ' м.кв., участок '.$hit ->plochad_uchastka .' сот., '.$hit ->price.' руб. '. $hit->oblast]) ?></li></a>
												 
												                             <?php } ?>
                        
                         <h4><p><?= $hit->vid_obiekta?>, <?= $hit->plochad_doma?> м.кв.</p></h4>
						 
                          <h4><p>Участок: <?= $hit->plochad_uchastka?> сот.</p></h4>
                        <h5>Цена: <?= $formatted_number = number_format($hit->price, 0, ',', ' ');?> руб.</h5>
                       
                     
                    </div>
					                                
                </div>
            </div>
			</center>
        </div>
<?php $i++; if($i % 4 == 0 || $i == $count): ?>
    </div>
<?php endif; ?>
 <?php }; ?>
<?php endforeach; ?>
        </div>
        </div>
    </div>
	
	
	                                         <h2 class="title text-center">избранные комнаты</h2>
                                        
                                         <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
		<div class="owl-carousel slide-dom owl-theme"> 
		 <?php /* if (!$oblast_reg||$oblast_reg===false){ */
	                           $hits = nedvigkomnati::find()->where(['hit'=>'1'])->orderBy('RAND()')->limit(24)->all();
                               /* } else {
	                           $hits = nedvigkomnati::find()->where(['hit'=>'1'])->andWhere(['Like', 'oblast',  $oblast_reg])->orderBy('RAND()')->limit(20)->all();
                                     } */
				 				    ?>
     
<?php $count = count($hits); $i = 0; foreach($hits as $hit): ?>

<?php  if ($hit->gorod ==0){         
												  
	   }else{$gorod1 = goroda::find()->select('name')
	->where(['id' => $hit->gorod])->one();
	   foreach($gorod1 as $item) {
	   $hit->gorod = $item;}};  
?>	   

<?php if ($hit -> moder == 1 ) { ?>
<?php if($i % 4 == 0): ?>
    <div class="item <?php if($i == 0) echo 'active' ?>">
<?php endif; ?>
        <div class="col-sm-3">
		<center>
           <?php if(!empty($hit->videl)){ ?> 
				<div class="product-image-wrapper5">
					<?php } else { ?> 
						<div class="product-image-wrapper3">
						   <?php } ?>
                <div class="single-products1">
                    <div class="productinfo text-center">
                        <?php $model = nedvigkomnati::findOne($nedvigkomnati->id);?>
                                                                       
                            <?php $imageTitle = $hit->getImage();?>
                                                                    
                        <?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                  <a href="<?= yii\helpers\Url::to(['nedvigkomnati/'.$hit->id,'ads' =>'komnata_plochad_'.$hit->plochad.'m.kv._price_'.$hit->price]) ?>">
												  <li><?=Html::img($imageTitle->getUrl(''), ['alt' => 'Купить комнату '. $hit -> plochad .' м.кв. цена '.$hit -> price.' руб. г.'.$hit->gorod]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												  <a href="<?= yii\helpers\Url::to(['nedvigkomnati/'.$hit->id,'ads' =>'komnata_plochad_'.$hit->plochad.'m.kv._price_'.$hit->price]) ?>">
												  <li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => 'Купить комнату '. $hit -> plochad .' м.кв. цена '.$hit -> price.' руб. г.'.$hit->gorod]) ?></li></a>
												 
												                             <?php } ?>

                         <h5>г. <?= $hit->gorod?>, <?= $hit->operaciya?></h5>
                          <h5><?= $hit->plochad?> м.кв.</h5>
                        <h5>Цена: <?= $formatted_number = number_format($hit->price, 0, ',', ' ');?> руб.</h5>
                       
                     
                    </div>
					                                
                </div>
            </div>
			</center>
        </div>
<?php $i++; if($i % 4 == 0 || $i == $count): ?>
    </div>
<?php endif; ?>
 <?php }; ?>
<?php endforeach; ?>
        </div>
        </div>
    </div>
	
	                                         <h2 class="title text-center">избранная коммерческая недвижимость</h2>
												

                                        
                                         <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
		<div class="owl-carousel slide-komm owl-theme"> 
		 <?php /* if (!$oblast_reg||$oblast_reg===false){ */
	                           $hits = nedvigkommercheska::find()->where(['hit'=>'1'])->orderBy('RAND()')->limit(24)->all();
                              /*  } else {
	                           $hits = nedvigkommercheska::find()->where(['hit'=>'1'])->andWhere(['Like', 'oblast',  $oblast_reg])->orderBy('RAND()')->limit(20)->all();
                                     } */
				 				    ?>
          
            
<?php $count = count($hits); $i = 0; foreach($hits as $hit): ?>

<?php 
$oblast1 = Oblast::find()->select('oblast_region')->where(['id' => $hit->oblast])->one();
			   foreach($oblast1 as $item) {
						$hit->oblast = $item;} 		
										
if (!$hit->gorod){
	
}else{$gorod1 = Goroda::find()->select('name')->where(['id' => $hit->gorod])->one();
			   foreach($gorod1 as $item) {
      $hit->gorod = $item;}} ?> 

<?php if ($hit -> moder == 1 ) { ?>
<?php if($i % 4 == 0): ?>
    <div class="item <?php if($i == 0) echo 'active' ?>">
<?php endif; ?>


        <div class="col-sm-3">
		
		<center>
           <?php if(!empty($hit->videl)){ ?> 
				<div class="product-image-wrapper5">
					<?php } else { ?> 
						<div class="product-image-wrapper3">
						   <?php } ?>
                <div class="single-products1">
				<?php
				 $zem1 = $hit->type_nedvigimosty;
											   
			   if ($zem1 === "Офисное"){
				   $zem1 = "ofisnaya";
			   }elseif($zem1 === "Производственное"){
				   $zem1 = "proizvodsvennoe";
			   }elseif($zem1 === "Торговое"){
				   $zem1 = "torgovoe";
			   }elseif($zem1 === "Гостиничное"){
				   $zem1 = "gostinichnie";
			   }elseif($zem1 === "Складское"){
				   $zem1 = "sklad";
			   }elseif($zem1 == "Гаражного типа"){
				   $zem1 = "garagnogo_tipa";
			   }elseif($zem1 == "Свободного"){
				   $zem1 = "svobodnogo_tipa";
			   }
				?>
                    <div class="productinfo text-center">
					
					
					
                        <?php $model = nedvigkommercheska::findOne($nedvigkommercheska->id);?>
                                                                       
                            <?php $imageTitle = $hit->getImage();?>
							
							
							
							 <?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                 <a href="<?= yii\helpers\Url::to(['nedvigkommercheska/'.$hit->id,'ads' =>$zem1.'_kommerch_nedvigimos_'.$hit->plochad.'m.kv._price_'.$hit->price]) ?>">
												 <li><?=Html::img($imageTitle->getUrl(''), ['alt' => 'Купить коммерческую недвижимость: 🏭 '. $hit-> type_nedvigimosty. ', цена '. $hit->price.' руб., ' .$hit->oblast.' '.$hit->gorod]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												<a href="<?= yii\helpers\Url::to(['nedvigkommercheska/'.$hit->id,'ads' =>$zem1.'_kommerch_nedvigimos_'.$hit->plochad.'m.kv._price_'.$hit->price]) ?>">
												<li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => 'Купить коммерческую недвижимость: 🏭 '. $hit-> type_nedvigimosty. ', цена '. $hit->price.' руб., ' .$hit->oblast.' '.$hit->gorod]) ?></li></a>
												 
												                             <?php } ?>
						 
                         <h4><?= $hit->type_nedvigimosty?></h4> 
                         
                         <h4><p> <?= $hit->operaciya?></p></h4>
                          	
                          <h4> <?= $hit->gorod?></h4>
                        <h5>Цена: <?= $formatted_number = number_format($hit->price, 0, ',', ' ');?> руб.</h5>
                       
                       
                    </div>
					                                
                </div>
            </div>
			</center>
        </div>
<?php $i++; if($i % 4 == 0 || $i == $count): ?>
    </div>
<?php endif; ?>
 <?php }; ?>
<?php endforeach; ?>
        </div>
       </div>
    </div>
                                        
</div>
	
	
                                           
                                               <h2 class="title text-center">избранные земельные участки</h2>
                                        
                                         <div id="recommended-item-carousel">
		   <div class="carousel-inner">
         <div class="owl-carousel slide-kva owl-theme"> 
		 <?php /* if (!$oblast_reg||$oblast_reg===false){ */
	                           $hits = nedvigzemli::find()->where(['hit'=>'1'])->orderBy('RAND()')->limit(24)->all();
                              /*  } else {
	                           $hits = nedvigzemli::find()->where(['hit'=>'1'])->andWhere(['Like', 'oblast',  $oblast_reg])->orderBy('RAND()')->limit(20)->all();
                                     } */
				 				    ?>
        
            
<?php $count = count($hits); $i = 0; foreach($hits as $hit): ?>

<?php $oblast1 = Oblast::find()->select('oblast_region')
			->where(['id' => $hit->oblast])
			->one();
			   foreach($oblast1 as $item) {
						$hit->oblast = $item;} 
			
			if ($hit->gorod ==0){         
		  
		   }										
		   else {$gorod1 = Goroda::find()->select('name')
		->where(['id' => $hit->gorod])
		->one();
		   foreach($gorod1 as $item) {
		   $hit->gorod = $item;}}; 
?>		   

<?php if ($hit -> moder == 1 ) { ?>
<?php if($i % 4 == 0): ?>
    <div class="item <?php if($i == 0) echo 'active' ?>">
	
	
	
<?php endif; ?>
        <div class="col-sm-3">
		<center>
           <?php if(!empty($hit->videl)){ ?> 
				<div class="product-image-wrapper5">
					<?php } else { ?> 
						<div class="product-image-wrapper3">
						   <?php } ?>
                <div class="single-products1">
				
				<?php $zem2 = $hit -> typ_uchastka;
											   
				   if ($zem2 === "ИЖС"){
					   $zem2 = "igs";
				   }elseif($zem2 === "Промназначения"){
					   $zem2 = "promn";
				   }elseif($zem2 === "Сельхозназначения"){
					   $zem2 = "selhoz";
				   }elseif($zem2 === "Гостиничное"){
					   $zem2 = "gostinichnie";
				   }elseif($zem2 === "Дачный/СНТ"){
					   $zem2 = "dachni_snt";
					}?>
				
                    <div class="productinfo text-center">
                        <?php $model = nedvigzemli::findOne($nedvigzemli->id);?>
                                                                       
                            <?php $imageTitle = $hit->getImage();?>
                                                                    
                          <?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                 <a href="<?= yii\helpers\Url::to(['nedvigzemli/'.$hit->id,'ads' =>'uchastok_'.$zem2.'_plochad_'.$hit->plochad_uchastka.'sot._price_'.$hit->price]) ?>">
												 <li><?=Html::img($imageTitle->getUrl(''), ['alt' => 'Купить участок 🏝 '. $hit->typ_uchastka. ', ' .$hit ->plochad_uchastka. ' сот. '.$hit->price.' руб, '.$hit->oblast.' '.$hit->gorod]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												<a href="<?= yii\helpers\Url::to(['nedvigzemli/'.$hit->id,'ads' =>'uchastok_'.$zem2.'_plochad_'.$hit->plochad_uchastka.'sot._price_'.$hit->price]) ?>">
												<li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => 'Купить участок 🏝 '. $hit->typ_uchastka. ', ' .$hit ->plochad_uchastka. ' сот. '.$hit->price.' руб, '.$hit->oblast.' '.$hit->gorod]) ?></li></a>
												 
												                             <?php } ?>
                         <h4><?= $hit->typ_uchastka?></h4> 
                         
                         <h4><p> Площадь: <?= $hit->plochad_uchastka?></p></h4>
						  <?php if ($hit->raion ==0){         
	                                        }
	                            else {$raion1 = Raion::find()->select('raion')->where(['id' => $hit->raion])->one();
                                      foreach($raion1 as $item) {
                                         $hit->raion = $item;}};?>
						  <h5> Район: <?= $hit->raion?></h5> 
                          
                        <h5>Цена: <?= $formatted_number = number_format($hit->price, 0, ',', ' ');?> руб.</h5>
                       
                      
                    </div>
					                                 
                </div>
            </div>
			</center>
        </div>
<?php $i++; if($i % 4 == 0 || $i == $count): ?>
    </div>
<?php endif; ?>
 <?php }; ?>
<?php endforeach; ?>
        </div>
       </div>
    </div>
                                               
                                             <h2 class="title text-center">избранные гаражи</h2>
												

                                        
                                         <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
		<div class="owl-carousel slide-komm owl-theme"> 
		 <?php /* if (!$oblast_reg||$oblast_reg===false){ */
	                           $hits = nedviggaragi::find()->where(['hit'=>'1'])->orderBy('RAND()')->limit(24)->all();
                               /* } else {
	                           $hits = nedviggaragi::find()->where(['hit'=>'1'])->andWhere(['Like', 'oblast',  $oblast_reg])->orderBy('RAND()')->limit(20)->all();
                                     } */
				 				    ?>
          
            
<?php $count = count($hits); $i = 0; foreach($hits as $hit): ?>
<?php if ($hit -> moder == 1 ) { ?>
<?php if($i % 4 == 0): ?>
    <div class="item <?php if($i == 0) echo 'active' ?>">
<?php endif; ?>


        <div class="col-sm-3">
		
		<center>
           <?php if(!empty($hit->videl)){ ?> 
				<div class="product-image-wrapper5">
					<?php } else { ?> 
						<div class="product-image-wrapper3">
						   <?php } ?>
                <div class="single-products1">
                    <div class="productinfo text-center">
					
					
					
                        <?php $model = nedviggaragi::findOne($nedviggaragi->id);?>
                                                                       
                            <?php $imageTitle = $hit->getImage();?>
							
							
							
							 <?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                 <a href="<?= yii\helpers\Url::to(['nedviggaragi/'.$hit->id,'ads' =>'garag_plochad_'.$hit->plochad.'m.kv._price_'.$hit->price]) ?>">
												 <li><?=Html::img($imageTitle->getUrl(''), ['alt' => $hit->id]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												<a href="<?= yii\helpers\Url::to(['nedviggaragi/'.$hit->id,'ads' =>'garag_plochad_'.$hit->plochad.'m.kv._price_'.$hit->price]) ?>">
												<li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => $hit->id]) ?></li></a>
												 
												                             <?php } ?>
						 <?php $gorod1 = Goroda::find()->select('name')->where(['id' => $hit->gorod])->one();
                               foreach($gorod1 as $item) {
                                      $hit->gorod = $item;} ?> 	
						 <h5> <?= $hit->gorod?></h5>
                         <h5>Площадь <?= $hit->plochad?></h5>
                         
                         <h5>Охрана <?= $hit->ochrana?></h5>
                                                  
                        <h5>Цена: <?= $formatted_number = number_format($hit->price, 0, ',', ' ');?> руб.</h5>
                       
                       
                    </div>
					                                
                </div>
            </div>
			</center>
        </div>
<?php $i++; if($i % 4 == 0 || $i == $count): ?>
    </div>
<?php endif; ?>
 <?php } ?> 
<?php endforeach; ?>
        </div>
       </div>
    </div>
                                        
</div>                                       

                                           <h2 class="title text-center">избранный бизнес</h2>
												

                                        
                                         <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
		<div class="owl-carousel slide-komm owl-theme"> 
		 <?php /* if (!$oblast_reg||$oblast_reg===false){ */
		   $hits = nedvigbiznes::find()->where(['hit'=>'1'])->orderBy('RAND()')->limit(24)->all();
		  /*  } else {
		   $hits = nedvigbiznes::find()->where(['hit'=>'1'])->andWhere(['Like', 'oblast',  $oblast_reg])->orderBy('RAND()')->limit(20)->all();
				 } */
				?>
          
            
<?php $count = count($hits); $i = 0; foreach($hits as $hit): ?>
<?php if ($hit -> moder == 1 ) { ?>
<?php if($i % 4 == 0): ?>
    <div class="item <?php if($i == 0) echo 'active' ?>">
<?php endif; ?>


        <div class="col-sm-3">
		
		<center>
           <?php if(!empty($hit->videl)){ ?> 
				<div class="product-image-wrapper5">
					<?php } else { ?> 
						<div class="product-image-wrapper3">
						   <?php } ?>
                <div class="single-products1">
                    <div class="productinfo text-center">
					
					
					
                        <?php $model = nedvigbiznes::findOne($nedvigbiznes->id);?>
                                                                       
                            <?php $imageTitle = $hit->getImage();?>
							
							
							
							 <?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                 <a href="<?= yii\helpers\Url::to(['nedvigbiznes/'.$hit->id,'ads' =>'biznes_price_'.$hit->price]) ?>"
												 <li><?=Html::img($imageTitle->getUrl(''), ['alt' => $hit->id]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												<a href="<?= yii\helpers\Url::to(['nedvigbiznes/'.$hit->id,'ads' =>'biznes_price_'.$hit->price]) ?>"
												<li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => $hit->id]) ?></li></a>
												 
												                             <?php } ?>
						 
						  <?php $gorod1 = Goroda::find()->select('name')->where(['id' => $hit->gorod])->one();
                               foreach($gorod1 as $item) {
                                      $hit->gorod = $item;} ?> 	
                          
                         <h5> <?= $hit->gorod?></h5>
						 <h5><?= $hit->type?></h5>
                         
                         <h5><?= $hit->operaciya?></h5>
                         
                        <h5>Цена: <?= $formatted_number = number_format($hit->price, 0, ',', ' ');?> руб.</h5>
                       
                       
                    </div>
					                                
                </div>
            </div>
			</center>
        </div>
<?php $i++; if($i % 4 == 0 || $i == $count): ?>
    </div>
<?php endif; ?>
 <?php }?>
 
<?php endforeach; ?>
        </div>
       </div>
                                 
            
				    </div>
					</div>  
				</div>
			</div>
		</div>
	
<script type="text/javascript">
$('#link').click(function(){
    if($('#some_text').is(':visible')){
        $('#some_text').slideUp();
        $(this).text('Показать полностью');
    }
    else{
        $('#some_text').slideDown();
        $(this).text('Скрыть текст');
    }
    return false;
});
</script>
	
		
		<script>
		
		 $(function() {
		var offset = $("#fixed").offset();
		var topPadding = 70;
		$(window).scroll(function() {
			if ($(window).scrollTop() > offset.top) {
				$("#fixed").stop().animate({marginTop: $(window).scrollTop() - offset.top + topPadding});
			}
			else {$("#fixed").stop().animate({marginTop: 0});};});
	});
		

    $(".slide-kva").owlCarousel({
		nav:true,
		loop:true,
		//navText: false,
		touchDrag:true,
		//items:1,
		center:true,
		navText : ['назад','вперед'],
		smartSpeed:300,
		autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: false,
		responsiveClass:true,
		responsive:{ //Адаптация в зависимости от разрешения экрана
            0:{
                items:2,
				nav:false,
            },
            600:{
                items:2,
				nav:false,
            },
            1000:{
                items:1
            }
        }
	});
	
	$(".slide-zem").owlCarousel({
		nav:true,
		loop:true,
		//navText: false,
		touchDrag:true,
		//items:1,
		center:true,
		navText : ['назад','вперед'],
		smartSpeed:300,
		autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: false,
		responsiveClass:true,
		responsive:{ //Адаптация в зависимости от разрешения экрана
            0:{
                items:2,
				nav:false,
            },
            600:{
                items:2,
				nav:false,
            },
            1000:{
                items:1
            }
        }
	});
	
	$(".slide-komm").owlCarousel({
		nav:true,
		loop:true,
		//navText: false,
		touchDrag:true,
		//items:1,
		center:true,
		navText : ['назад','вперед'],
		smartSpeed:300,
		autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: false,
		responsiveClass:true,
		responsive:{ //Адаптация в зависимости от разрешения экрана
            0:{
                items:2,
				nav:false,
            },
            600:{
                items:2,
				nav:false,
            },
            1000:{
                items:1
            }
        }
	});
	
	$(".slide-dom").owlCarousel({
		nav:true,
		loop:true,
		//navText: false,
		touchDrag:true,
		//items:1,
		center:true,
		navText : ['назад','вперед'],
		smartSpeed:300,
		autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: false,
		responsiveClass:true,
		responsive:{ //Адаптация в зависимости от разрешения экрана
            0:{
                items:2,
				nav:false,
            },
            600:{
                items:2,
				nav:false,
            },
            1000:{
                items:1
            }
        }
	});

	</script>
		
	</section>

