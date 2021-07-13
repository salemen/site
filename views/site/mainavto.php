<?php
  
  use yii\helpers\Html;
  use app\assets\AppAsset;
  use yii\widgets\ActiveForm;
  use app\models\Avtoleg;
  use app\models\Avtogruz;
  use app\models\Avtospec;
  use app\models\Avtomoto;
  use app\models\Avtovodnik;
  use app\models\Avtokomplekt;
  use app\models\Avtokomplekttip;
  use app\models\Category;
  use yii\widgets\LinkPager;
  use yii\helpers\Url;
  use app\modules\admin\models\Marka;
  use app\modules\admin\models\Model;
  use GeoIp2\Database\Reader;
  use kartik\select2\Select2; // or kartik\select2\Select2
  use yii\web\JsExpression;
  
 AppAsset::register($this);
 
$this->title = 'Вся Автотехника здесь и все что связано с автотехникой.';

?>
<!-- $cache = Yii::$app->cache;
 $ip = Yii::$app->request->userIP;
 $key = "$ip";
 $oblast_reg= $cache->get($key);-->

<section id="advertisement">
		<div class="container">
			<img src="/images/shop/авто.jpg" alt="" />
		</div>
	</section>
	
	
	
	<section>
		<div class="container" style = "padding-top: 10px">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar" style="padding-left: 5px;">
                                            
                                            
						<h2>Категории Автотехники</h2>
                               						   
                                                
<ul class="catalog1 category-products">
<?= \app\components\MenuWidgetavto::widget(['tpl' => 'menuavto' ]) ?>
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

			                    <center><a onclick="return showSearchavto()" ><i class="btn btn-warning">Поиск Автотехники</i></a></center>
									
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
                           

 <style>
        .product-image-wrapper3{
	border:3px solid #e2e2db;
	overflow: auto;
	margin-bottom:10px;
    max-height: 300px;
	max-width: 400px;	
	border-radius: 8px;
		
}

 .product-image-wrapper5{
	border:4px solid red;
	overflow: auto;
	margin-bottom:6px;
    max-height: 303px;
	max-width: 400px;	
	border-radius: 8px;
		
}
       
		.left-sidebar{
			padding-left: 3px; 
			padding-right: 3px;
		}
        </style>						   
                            	
							
                            <div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
                                            <h2 class="title text-center">Избранные легковые</h2>
				
				       <?php if (!$oblast){
	                           $hits = avtoleg::find()->where(['hit'=>'1'])->orderBy('RAND()')->limit(12)->all();
                               } else {
	                           $hits = avtoleg::find()->where(['hit'=>'1'])->andWhere(['Like', 'oblast',  $oblast_reg])->orderBy('RAND()')->limit(16)->all();
                                     }
				 				    ?>
                                    
                                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
		  <div class="owl-carousel slide-leg owl-theme"> 
           
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
				
				  <?php
					 $marka1 = marka::find()->select('mark')
					->where(['id' => $hit->marka])->one();
					 foreach($marka1 as $item) {
						   $hit->marka = $item;} 
					 if (!$hit->model){

				   }else{$model1 = model::find()->select('name')->where(['id' => $hit->model])->one();
					 foreach($model1 as $item) {
				   $hit->model = $item;} }  
					
					
					  $s = $hit->marka;
											
					  $s = (string) $s; // преобразуем в строковое значение
					  $s = strip_tags($s); // убираем HTML-теги
					  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
					  $s = trim($s); // убираем пробелы в начале и конце строки
					  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
					  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
					  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
					  $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
				   
					  $s1 = $hit->model;
											
					  //$s = (string) $s; // преобразуем в строковое значение
					  //$s = strip_tags($s); // убираем HTML-теги
					  $s1 = preg_replace("/\s+/", ' ', $s1); // удаляем повторяющие пробелы
					  $s1 = trim($s1); // убираем пробелы в начале и конце строки
					  $s1 = function_exists('mb_strtolower') ? mb_strtolower($s1) : strtolower($s1); // переводим строку в нижний регистр (иногда надо задать локаль)
					  $s1 = strtr($s1, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
					  $s1 = preg_replace("/[^0-9a-z-_ ]/i", "", $s1); // очищаем строку от недопустимых символов
					  $s1 = str_replace(" ", "-", $s1); // заменяем пробелы знаком минус
				      ?>
				
                    <div class="productinfo text-center">
                        <?php $model = Avtoleg::findOne($avtoleg->id);?>
                                                                       
                            <?php $imageTitle = $hit->getImage();?>
							
                         <?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                 <a href="<?= yii\helpers\Url::to(['avtoleg/'.$hit->id, 'ads'=>$s.'_'.$s1.'_price_'.$hit->price]) ?>"
												 <li><?=Html::img($imageTitle->getUrl(''), ['alt' => 'Продажа легково автомобиля, кузов '.$hit->tip.' цена '.$hit->price]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												 <a href="<?= yii\helpers\Url::to(['avtoleg/'.$hit->id, 'ads'=>$s.'_'.$s1.'_price_'.$hit->price]) ?>"
												 <li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => 'Продажа легково автомобиля, кузов '.$hit->tip.' цена '.$hit->price]) ?></li></a>
												 
												                             <?php } ?>
																			 
																			 
							                                    
						
																			 
                         <h5><?= $hit->tip?></h5> 
                         
                         <h5><?= $hit->marka?> <?= $hit->model?></h5>
                          <h5>Пробег: <?= $hit->probeg?></h5>
                        <h5>Цена: <?= $formatted_number = number_format($hit->price, 0, ',', ' ');?> руб.</h5>
                       
                                       
                    </div>
                </div>
            </div>
			</center>
        </div>
<?php $i++; if($i % 4 == 0 || $i == $count): ?>
    </div>
<?php endif; ?>
<?php } else { 
 echo '<center>Избранных легковых нет</center>'; 
 }?> 
<?php endforeach; ?>
        </div>
       
    </div>
						
        </div><!--features_items-->
                                       
                           
                           
                                        <div class="features_items">
                                         <h2 class="title text-center">Избранные грузовые</h2>
                                        
                                         <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
		  <div class="owl-carousel slide-leg owl-theme"> 
		  <?php if (!$oblast){
	                           $hits = avtogruz::find()->where(['hit'=>'1'])->orderBy('RAND()')->limit(12)->all();
                               } else {
	                           $hits = avtogruz::find()->where(['hit'=>'1'])->andWhere(['Like', 'oblast',  $oblast_reg])->orderBy('RAND()')->limit(16)->all();
                                     }
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
				
				 <?php 
					  $s1 = $hit->marka;
											
					  //$s = (string) $s; // преобразуем в строковое значение
					  //$s = strip_tags($s); // убираем HTML-теги
					  $s1 = preg_replace("/\s+/", ' ', $s1); // удаляем повторяющие пробелы
					  $s1 = trim($s1); // убираем пробелы в начале и конце строки
					  $s1 = function_exists('mb_strtolower') ? mb_strtolower($s1) : strtolower($s1); // переводим строку в нижний регистр (иногда надо задать локаль)
					  $s1 = strtr($s1, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
					  $s1 = preg_replace("/[^0-9a-z-_ ]/i", "", $s1); // очищаем строку от недопустимых символов
					  $s1 = str_replace(" ", "-", $s1); // заменяем пробелы знаком минус
					  
					  
					  $s2 = $hit->tip;
											
					  //$s = (string) $s; // преобразуем в строковое значение
					  //$s = strip_tags($s); // убираем HTML-теги
					  $s2 = preg_replace("/\s+/", ' ', $s2); // удаляем повторяющие пробелы
					  $s2 = trim($s2); // убираем пробелы в начале и конце строки
					  $s2 = function_exists('mb_strtolower') ? mb_strtolower($s2) : strtolower($s2); // переводим строку в нижний регистр (иногда надо задать локаль)
					  $s2 = strtr($s2, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
					  $s2 = preg_replace("/[^0-9a-z-_ ]/i", "", $s2); // очищаем строку от недопустимых символов
					  $s2 = str_replace(" ", "-", $s2); // заменяем пробелы знаком минус
				      ?>
				
                    <div class="productinfo text-center">
                        <?php $model = Avtogruz::findOne($avtogruz->id);?>
                                                                       
                            <?php $imageTitle = $hit->getImage();?>
                                                                    
                          <?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                <a href="<?= yii\helpers\Url::to(['avtogruz/'.$hit->id, 'ads'=>$s2.'_'.$s1.'_price_'.$hit->price]) ?>"
												<li><?=Html::img($imageTitle->getUrl(''), ['alt' => 'Продажа грузового автомобиля, тип '.$hit->tip.' цена '.$hit->price]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												 <a href="<?= yii\helpers\Url::to(['avtogruz/'.$hit->id, 'ads'=>$s2.'_'.$s1.'_price_'.$hit->price]) ?>"
												 <li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => 'Продажа грузового автомобиля, тип '.$hit->tip.' цена '.$hit->price]) ?></li></a>
												 
												                             <?php } ?>
                         <h5><?= $hit->tip?></h5> 
                         
                         <h5><?= $hit->marka?></h5>
                          <h5>Пробег: <?= $hit->probeg?></h5>
                        <h5>Цена: <?= $formatted_number = number_format($hit->price, 0, ',', ' ');?> руб.</h5>
                       
                       
                    </div>
                </div>
            </div>
			</center>
        </div>
<?php $i++; if($i % 4 == 0 || $i == $count): ?>
    </div>
<?php endif; ?>
<?php } elseif ($hit -> moder == 0 ) { 
}else{echo '<center>Избранной грузовой техники нет</center>'; 
 }?> 
<?php endforeach; ?>
        </div>
    </div>
           </div>
                                         
                            
                            
                                         <div class="features_items">
                                        <h2 class="title text-center">Избранная спецтехника</h2>
                                        
                                         <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
		  <div class="owl-carousel slide-leg owl-theme"> 
		   <?php if (!$oblast){
	                           $hits = avtospec::find()->where(['hit'=>'1'])->orderBy('RAND()')->limit(12)->all();
                               } else {
	                           $hits = avtospec::find()->where(['hit'=>'1'])->andWhere(['Like', 'oblast',  $oblast_reg])->orderBy('RAND()')->limit(16)->all();
                                     }
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
				
				<?php 
					  $s = $hit->tip;
											
					  //$s = (string) $s; // преобразуем в строковое значение
					  //$s = strip_tags($s); // убираем HTML-теги
					  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
					  $s = trim($s); // убираем пробелы в начале и конце строки
					  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
					  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
					  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
					  $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
				   
					  $s1 = $hit->marka;
											
					  //$s = (string) $s; // преобразуем в строковое значение
					  //$s = strip_tags($s); // убираем HTML-теги
					  $s1 = preg_replace("/\s+/", ' ', $s1); // удаляем повторяющие пробелы
					  $s1 = trim($s1); // убираем пробелы в начале и конце строки
					  $s1 = function_exists('mb_strtolower') ? mb_strtolower($s1) : strtolower($s1); // переводим строку в нижний регистр (иногда надо задать локаль)
					  $s1 = strtr($s1, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
					  $s1 = preg_replace("/[^0-9a-z-_ ]/i", "", $s1); // очищаем строку от недопустимых символов
					  $s1 = str_replace(" ", "-", $s1); // заменяем пробелы знаком минус
				      ?>
				
                    <div class="productinfo text-center">
                        <?php $model = Avtospec::findOne($avtospec->id);?>
                                                                       
                            <?php $imageTitle = $hit->getImage();?>
                                                                    
                          <?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                  <a href="<?= yii\helpers\Url::to(['avtospec/'.$hit->id, 'ads'=>$s.'_'.$s1.'_price_'.$hit->price]) ?>"
												  <li><?=Html::img($imageTitle->getUrl(''), ['alt' => 'Продажа спецтехники, тип '.$hit->tip.' цена '.$hit->price]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												  <a href="<?= yii\helpers\Url::to(['avtospec/'.$hit->id, 'ads'=>$s.'_'.$s1.'_price_'.$hit->price]) ?>"
												  <li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => 'Продажа спецтехники, тип '.$hit->tip.' цена '.$hit->price]) ?></li></a>
												 
												                             <?php } ?>
                         <h5><?= $hit->tip?></h5> 
                          <h5><?= $hit->marka?></h5>
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
			
			
			                               <h2 class="title text-center">Избранная мототехника</h2>
                                        
                                         <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
		  <div class="owl-carousel slide-leg owl-theme"> 
		  <?php if (!$oblast){
	                           $hits = avtomoto::find()->where(['hit'=>'1'])->orderBy('RAND()')->limit(12)->all();
                               } else {
	                           $hits = avtomoto::find()->where(['hit'=>'1'])->andWhere(['Like', 'oblast',  $oblast_reg])->orderBy('RAND()')->limit(16)->all();
                                     }
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
                        <?php $model = Avtomoto::findOne($avtomoto->id);?>
                                                                       
                            <?php $imageTitle = $hit->getImage();?>
                                                                    
                          <?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                <a href="<?= yii\helpers\Url::to(['avtomoto/'.$hit->id]) ?>"
												<li><?=Html::img($imageTitle->getUrl(''), ['alt' => 'Продажа мототехники, тип '.$hit->tip.' цена '.$hit->price]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												 <a href="<?= yii\helpers\Url::to(['avtomoto/'.$hit->id]) ?>"
												 <li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => 'Продажа мототехники, тип '.$hit->tip.' цена '.$hit->price]) ?></li></a>
												 
												                             <?php } ?>
                         <h5><?= $hit->tip?></h5> 
                         
                         <h5><?= $hit->marka?></h5>
                          <h5>Пробег: <?= $hit->probeg?></h5>
                        <h5>Цена: <?= $formatted_number = number_format($hit->price, 0, ',', ' ');?> руб.</h5>
                       
                       
                    </div>
                </div>
            </div>
			</center>
        </div>
<?php $i++; if($i % 4 == 0 || $i == $count): ?>
    </div>
<?php endif; ?>
<?php } else { 
 echo '<center>Избранной мототехники нет</center>'; 
 }?> 
<?php endforeach; ?>
        </div>
    </div>
           </div>
                                 
                                         
                                         <div class="features_items">
                                         <h2 class="title text-center">Избранные комплектующие</h2>
                                        
                                         <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
		  <div class="owl-carousel slide-kom owl-theme"> 
		  <?php if (!$oblast){
	                           $hits = avtokomplekt::find()->where(['hit'=>'1'])->orderBy('RAND()')->limit(12)->all();
                               } else {
	                           $hits = avtokomplekt::find()->where(['hit'=>'1'])->andWhere(['Like', 'oblast',  $oblast_reg])->orderBy('RAND()')->limit(16)->all();
                                     }
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
				
				<?php 
					  $s = $hit->name;
											
					  //$s = (string) $s; // преобразуем в строковое значение
					  //$s = strip_tags($s); // убираем HTML-теги
					  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
					  $s = trim($s); // убираем пробелы в начале и конце строки
					  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
					  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
					  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
					  $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
				     
					 
					 if ($hit -> tip ==0){         
      
					   }
					   else{ 
                     $tipp = avtokomplekttip::find()->select('tip')
						->where(['id' => $hit -> tip])
						->one();
						   foreach($tipp as $item) {
					   $hit -> tip = $item;}; }  

					 ?>
				
                    <div class="productinfo text-center">
                        <?php $model = avtokomplekt::findOne($avtokomplekt->id);?>
                                                                       
                            <?php $imageTitle = $hit->getImage();?>
                                                                    
                         <?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                   <a href="<?= yii\helpers\Url::to(['avtokomplekt/'.$hit->id, 'ads'=>$s.'_price_'.$hit->price]) ?>" 
												   <li><?=Html::img($imageTitle->getUrl(''), ['alt' => 'Продажа автокомплектующих и запчастей, тип '.$hit->tip.' цена '.$hit->price]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												   <a href="<?= yii\helpers\Url::to(['avtokomplekt/'.$hit->id, 'ads'=>$s.'_price_'.$hit->price]) ?>" 
												   <li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => 'Продажа автокомплектующих и запчастей, тип '.$hit->tip.' цена '.$hit->price]) ?></li></a>
												 
												                             <?php } ?>
                         <h5><?= $hit->tip?></h5> 
                         
                         <h5>Состояние: <?= $hit->sostoyanie?></h5>
                         
                        <h5>Цена: <?= $formatted_number = number_format($hit->price, 0, ',', ' ');?> руб.</h5>
                       
                    
                    </div>
                </div>
            </div>
			</center>
        </div>
<?php $i++; if($i % 4 == 0 || $i == $count): ?>
    </div>
<?php endif; ?>
<?php } else { 
 echo '<center>Избранных комплектующих нет</center>'; 
 }?> 
<?php endforeach; ?>
        </div>
        
    </div>                        
           </div>
           </div>
		   
		                                     <h2 class="title text-center">Избранный водный транспорт</h2>
                                        
                                         <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
		  <div class="owl-carousel slide-leg owl-theme"> 
		  <?php if (!$oblast){
	                           $hits = avtovodnik::find()->where(['hit'=>'1'])->orderBy('RAND()')->limit(12)->all();
                               } else {
	                           $hits = avtovodnik::find()->where(['hit'=>'1'])->andWhere(['Like', 'oblast',  $oblast_reg])->orderBy('RAND()')->limit(16)->all();
                                     }
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
                        <?php $model = Avtovodnik::findOne($avtovodnik->id);?>
                                                                       
                            <?php $imageTitle = $hit->getImage();?>
                                                                    
                          <?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                <a href="<?= yii\helpers\Url::to(['avtovodnik/view', 'id'=>$hit->id]) ?>"
												<li><?=Html::img($imageTitle->getUrl(''), ['alt' => $hit->tip]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												 <a href="<?= yii\helpers\Url::to(['avtovodnik/view', 'id'=>$hit->id]) ?>"
												 <li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => $hit->tip]) ?></li></a>
												 
												                             <?php } ?>
                         <h5><?= $hit->tip?></h5> 
                         
                         <h5><?= $hit->sostoyanie?></h5>
                         
                        <h5>Цена: <?= $formatted_number = number_format($hit->price, 0, ',', ' ');?> руб.</h5>
                       
                       
                    </div>
                </div>
            </div>
			</center>
        </div>
<?php $i++; if($i % 4 == 0 || $i == $count): ?>
    </div>
<?php endif; ?>
<?php } elseif (!$hit){
	echo '<center>Избранного водного транспорта нет</center>'; 
 }?> 
<?php endforeach; ?>
        </div>
    </div>
           </div>
                    
			</div>
		</div>
		
		<link rel="stylesheet" href="/owl-carousel/css/owl.carousel.css">
	    <link rel="stylesheet" href="/owl-carousel/css/owl.theme.default.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <script src="/owl-carousel/js/owl.carousel.js"></script>
		
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

	
    $(".slide-leg").owlCarousel({
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
	
	$(".slide-gruz").owlCarousel({
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
	
	$(".slide-spec").owlCarousel({
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
	
	$(".slide-kom").owlCarousel({
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

