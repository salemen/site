<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;
use yii\widgets\LinkPager;
use app\models\Product;
use app\modules\admin\models\Oblast;
use app\modules\admin\models\Goroda;
//use app\modules\admin\models\Raion;

//use div\geoip\Geo;
AppAsset::register($this);
?>



<section id="slider"><!--slider-->

           
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
				
						
							 <div > 
								<center><div class="col-sm-12 animated bounceIn faster">
                                                                                                 
		<h2><font face="cursive"><span style="color:#FF7F50; font-size: 19px">Бесплатные Объявления</span> 
		       <span style="color:blue; font-size: 19px">Краснодара,</span><span style="color:#FF7F50; font-size: 19px"> Краснодарского края </span>
			   <span style="color:blue; font-size: 19px"> и юга России, Sale</span><span style="color:#FF7F50; font-size: 19px">Men</span></font></h2>
									
				<a href= "<?= Url::to (['/admin']) ?>"class="btn btn-warning"> <strong> Подать Бесплатно объявление</strong></a>
								</div></center>
								
								</div>								
						</div>
			    </div>
         </div> 
	</section>
	
	<section >
		<div class="container" style="padding-top: 7px">
		
			<div class="row">
				<div class="col-sm-3">
					
                    
                     <style>

   @media (max-width: 919px) {			 
		 .product-image-wrapper4{
		 	border:2px solid #dbdbd9!important;
		 	overflow: auto;
			margin-bottom:8px;
			height: auto;
		    max-width: 100%!important;
		    border-radius: 8px;	
		 }	
   }	

	@media (min-width: 920px)and(max-width: 1199px) {			 
		 .product-image-wrapper4{
			border:3px solid #dbdbd9;
			overflow: auto;
			margin-bottom:8px;
			height: 275px;
			max-width: 330px;
			border-radius: 8px;	
		 }	
   }		

		@media (min-width: 1200px) {	
        .product-image-wrapper4{
			border:3px solid #dbdbd9;
			overflow: auto;
			margin-bottom:10px;
		    height: 310px;
			max-width: 330px;
		    border-radius: 8px;	
		
   }
		}

    .product-image-wrapper5 {
	    border: 3px solid red;
	    background: aquamarine;
	    overflow: auto;
	    margin-bottom: 8px;
	    height: 310px;
	    max-width: 330px;
	    border-radius: 8px;
	}
	
		.btn{
		    margin-top: 2px;
			margin-bottom: 2px;
		}
		
		
		h1{
			font-size: 19px;
		    margin-bottom: 5px;
		    margin-top: 10px;	
		}
		
		.left-sidebar{
			padding-left: 3px; 
			padding-right: 3px;
		}
		
		h5{
		margin-top: 5px;
        margin-bottom: 5px;
		}
		
	.open{
		  display: block;
		}

	.hidden1{
		  display: none;
		}	 
        </style>					  
                       <div class="brands-name left-sidebar"  id="brands_products1">
							<div id="fixed">
							<h3>Популярное на сайте</h3>
								<ul class="nav nav-pills nav-stacked">
									<li><a href ="<?= Url::to (['nedvigcategory/2','ads'=>'doma-cottage']) ?>"> <span class="pull-right">(🏠)</span>Дома, Коттеджи</a></li>
									 <li><a href="<?= Url::to (['nedvigcategory/14','ads'=>'vse-uchastki']) ?>"><span class="pull-right">(🌎)</span>Земельные участки</a></li>
									<li><a href="<?= Url::to (['nedvigcategory/8','ads'=>'vse-kvartiri']) ?>"> <span class="pull-right">(🌇)</span>Квартиры</a></li>
									<li><a href="<?= Url::to (['nedvigcategory/19','ads'=>'vsy-kommercheskaya']) ?>"> <span class="pull-right">(🏠)</span>Коммерческая недвижимость</a></li>
									<li><a href="<?= Url::to (['category/53','ads'=>'vakansii-rabota']) ?>"> <span class="pull-right">(🎩)</span>Работа<<Вакансии</a></li>
									<li><a href="<?= Url::to (['avtocategory/3','ads'=>'spec-tehnika']) ?>"> <span class="pull-right">(🚗)</span>Спецтехника</a></li>
									<li><a href="<?= Url::to (['category/75','ads'=>'gruzoperevozki']) ?>"> <span class="pull-right">(🚗)</span>Грузоперевозки</a></li>
									<li><a href="<?= Url::to (['category/174','ads'=>'stroitelstvo']) ?>"> <span class="pull-right">(🌇)</span>Строительство</a></li>
									<li><a href="<?= Url::to (['avtocategory/1','ads'=>'legkovie-avto']) ?>"> <span class="pull-right">(🚗)</span>Легковые Авто</a></li>
									<li><a href="<?= Url::to (['category/76','ads'=>'delovye-uslugi-yuristy']) ?>"> <span class="pull-right">(🎩)</span>Юристы</a></li>
									<li><a href="<?= Url::to (['category/85','ads'=>'reklama']) ?>"> <span class="pull-right">(🎩)</span>Реклама</a></li>
								    <li><a href="<?= Url::to (['category/95?ads=jenskaya-zimnyaya-odejda']) ?>"> <span class="pull-right">(🎩)</span>Женская одежда </a></li>
								    <li><a href="<?= Url::to (['category/98?ads=jenskaya-letnyaya-obuv']) ?>"> <span class="pull-right">(🎩)</span>Женская обувь </a></li>
									<li><a href="https://salemen.ru/admin"> <span class="pull-right">(✏️)</span>Подать объявление</a></li>
								</ul>
								<center><a onclick="return showSearchsearch()" ><i class="btn btn-warning" style= "margin-top: 5px; " >
	                                     <i class="fa fa-search"></i> Расширенный Поиск</i></a></center>
							</div>
						</div>
				
					<div id="brands_products2">
					     
								 <center>				
						 <div class="polaroid">
									<a href ="<?= Url::to (['nedvigcategory/2','ads'=>'doma-cottage']) ?>"> <span><img class="animate1" src="/images/dom.png" alt="дом"></span></a>
									 <a href="<?= Url::to (['nedvigcategory/14','ads'=>'vse-uchastki']) ?>"> <span><img class="animate1" src="/images/zemli.png" alt="участок"></span></a>
									<a href="<?= Url::to (['nedvigcategory/8','ads'=>'vse-kvartiri']) ?>">  <span><img class="animate1" src="/images/kvartira.png" alt="квартира"></span></a>
									<a href="<?= Url::to (['avtocategory/1','ads'=>'legkovie-avto']) ?>"> <span><img class="animate1" src="/images/avto.png" alt="легковой"></span></a>
									<!--<a href="https://salemen.ru/category/76"> <span><img class="animate1" src="/images/sud.png" alt="юристы"></span></a>&nbsp; -->
									<a href="<?= Url::to (['category/53','ads'=>'vakansii-rabota']) ?>"> <span><img class="animate1" src="/images/rabota.png" alt="работа"></span></a>
									<a href="https://salemen.ru/admin"> <span><img class="animate1" src="/images/lk.png" alt="ЛК"></span></a>
							</div>
					      </center>
						</div>
				<center><div>
					
					<a href="<?= Url::to (['/photo']) ?>"> <span><img class="animate1" src="/images/column.png" alt="Два"></span></a>

				</div></center>
					</div> 
	                 
				<center>
				<div class="col-sm-9 padding-right">
				
					<div class="features_items"><!--features_items-->
					
                                            <?php if (!empty($hits)): ?>
											<div id="brands_products1">
                                            <h2 class="title text-center">Новые объявления на Главной
											  <a href ="<?= Url::to (['cart/magaz']) ?>" class= "showSearchmag">
										               <span class="letter"><img src="/images/nastroika.png" alt="поиск"></span></a>
											</h2>
											</div>						 
                                      																 
											
											<!--------НАВЕРХУ В ИЗБРАННЫХ-------->
										<?php $date = date("Y-m-d H:i:s");		
											
							$verhs = Product::find()->where(['verh' => 1])->andWhere(['moder' => 1])->andWhere(['>=','verhdate',$date])->orderBy('RAND()')->all();
							
											  if (!empty($verhs)): ?>
											 <?php foreach ($verhs as $verh):?>
                                            
                                             <?php if ($verh -> moder == 1&&$verh -> verh == 1 ) { ?>
                              <?php $mainImg = $verh->getImage();  ?>
                                    
                      <?php 
						  $s = $verh->name;
						  
						
						  //$s = (string) $s; // преобразуем в строковое значение
						  //$s = strip_tags($s); // убираем HTML-теги
						  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
						  $s = trim($s); // убираем пробелы в начале и конце строки
						  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
						  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
						  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
						  $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
						

                          $s2 = $verh -> category->name;
						  						
						  //$s = (string) $s; // преобразуем в строковое значение
						  //$s = strip_tags($s); // убираем HTML-теги
						  $s2 = preg_replace("/\s+/", ' ', $s2); // удаляем повторяющие пробелы
						  $s2 = trim($s2); // убираем пробелы в начале и конце строки
						  $s2 = function_exists('mb_strtolower') ? mb_strtolower($s2) : strtolower($s2); // переводим строку в нижний регистр (иногда надо задать локаль)
						  $s2 = strtr($s2, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
						  $s2 = preg_replace("/[^0-9a-z-_ ]/i", "", $s2); // очищаем строку от недопустимых символов
						  $s2 = str_replace(" ", "-", $s2); // заменяем пробелы знаком минус
						 
						?>							
									 
						<div class="col-sm-3">
						<?php if(!empty($verh->videl)){ ?> 
						<div class="product-image-wrapper5">
						<?php } else { ?> 
							<div class="product-image-wrapper4">
						<?php } ?>
								<div class="single-products1">
                                                                    
										<div class="productinfo text-center">
										
										 <?php if ($mainImg['urlAlias']==='placeHolder') { ?>
																			 
													 
                     <a href="<?= Url::to(['product/'.$verh->id,'ads' =>$s.'_price_'.$verh->price]) ?>">
	                                   <li><?=Html::img($mainImg->getUrl(''), ['alt' => 'Объявление: '.$verh->name.', '.  $verh->oblast_region.' '.$verh->gorod]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
                       <a href="<?= Url::to(['product/'.$verh->id,'ads' =>$s.'_price_'.$verh->price]) ?>">
                                    <li><?=Html::img($mainImg->getUrl('x200'), ['alt' => 'Объявление: '.$verh->name.', '.  $verh->oblast_region.' '.$verh->gorod]) ?></li></a>
												 
												                             <?php } ?>
                                                                        
                                                                                     
											
        <h2 style = 
	   "font-family: 'Roboto', sans-serif;
		font-size: 14px;
		font-weight: 400;
		color: #696763;
		margin-top: 7px;
        margin-bottom: 7px;"
	   
	   ><b>Категория объявлений:</b><br> <a href="<?= Url::to(['category/'.$verh ->category-> id, 'ads'=>$s2])?>"><?= $verh -> category->name ?></a></h2>
                                                   
												   <?php 
												        $verhname = $verh->name;
												        $verhname = mb_strtolower($verhname);  ?>          
																<p><?= $verhname ?></p>
																 
					<h5>Цена: <?= $formatted_number = number_format($verh->price, 0, ',', ' '); ?> руб.</h5>											 
																 					
										</div>
                                                                    
									
							<?php if ($verh->new):?>
							<?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
							<?php endif ?>
							
							<?php if ($verh->sale):?>
							<?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'sale' ]) ?>
							<?php endif ?>
							
							<p><a href ="<?= Url::to (['cart/add', 'id'=> $verh->id]) ?>" data-id = "<?= $verh->id?>"
                          class="btn-iz add-to-cart"><img class="animate1" src="/images/iz.png" alt=""></span></a></p>
						  
						    <div class="btn-podrob">
									 <ul class="nav navbar-nav collapse navbar-collapse">        
							   <li class="dropdown"><img class="animate1" src="/images/podrobno5.png" alt="">		    			 
							     <ul role="menu" class="sub-menu1">
							
                        <li>краткое описание <br><?= mb_substr($verh->content, 0, 100);  ?><br>
									 <a href="<?= Url::to(['product/'.$verh->id,'ads' =>$s.'_price_'.$verh->price]) ?>" class="btn btn-default1">подробнее</a>
						</li>
							
							     </ul>
							   </li>				
								</ul>
						  </div>
						  
						  	<div id="brands_products2">
									  <div class="btn-podrob">
									<small class="podrob"><img class="animate1" src="/images/podrobno5.png" alt="">
									<span>краткое описание <br><?= mb_substr($verh->content, 0, 150);  ?><br>
									 <a href="tel:<?= $verh -> telephone ?>" target="_blank" class="btn btn-default1"> позвонить</a>
									   <a href="<?= Url::to(['product/'.$verh->id,'ads' =>$s.'_price_'.$verh->price]) ?>" class="btn btn-default1">подробнее</a>
									</span></small>
									 </div>
									</div>
								
		
								</div>
 								
							</div>
						</div>
						
											 <?php }; ?>
						<?php endforeach;?>
											 <?php endif; ?>
											
										
											<!------КОНЕЦ НАВЕРХУ В ИЗБРАННЫХ------------------->
							  
							  <?php foreach ($hits as $hit):?>
                                                                                      
                              <?php $mainImg = $hit->getImage();  ?>
                                
					<?php
							if($hit->oblast_region ==0){         
						  
						   }else{$oblast1 = oblast::find()->select('oblast_region')
								->where(['id' => $hit->oblast_region])
								->one();
						   foreach($oblast1 as $item) {
						   $hit->oblast_region = $item;}}   			
										
							if($hit->gorod ==0){         
						  
						   }else{$gorod1 = Goroda::find()->select('name')
								->where(['id' => $hit->gorod])
								->one();
						   foreach($gorod1 as $item) {
						   $hit->gorod = $item;}}      
       
    
						  $s = $hit->name;
						  
						
								  //$s = (string) $s; // преобразуем в строковое значение
								  //$s = strip_tags($s); // убираем HTML-теги
								  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
								  $s = trim($s); // убираем пробелы в начале и конце строки
								  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
								  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
								  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
								  $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
								  
						   $s2 = $hit -> category->name;
						  						
						  //$s = (string) $s; // преобразуем в строковое значение
						  //$s = strip_tags($s); // убираем HTML-теги
						  $s2 = preg_replace("/\s+/", ' ', $s2); // удаляем повторяющие пробелы
						  $s2 = trim($s2); // убираем пробелы в начале и конце строки
						  $s2 = function_exists('mb_strtolower') ? mb_strtolower($s2) : strtolower($s2); // переводим строку в нижний регистр (иногда надо задать локаль)
						  $s2 = strtr($s2, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
						  $s2 = preg_replace("/[^0-9a-z-_ ]/i", "", $s2); // очищаем строку от недопустимых символов
						  $s2 = str_replace(" ", "-", $s2); // заменяем пробелы знаком минус
						?>	
						<div itemscope itemtype="http://schema.org/Product">			 
						<div class="col-sm-3">
						<?php if(!empty($hit->videl)){ ?> 
						<div class="product-image-wrapper5">
						<?php } else { ?> 
							<div class="product-image-wrapper4">
						<?php } ?>
								<div class="single-products1">
								
								                                 
										<div class="productinfo text-center">
										
										
																				
										 <?php if ($mainImg['urlAlias']==='placeHolder') { ?>
																			 
													 
                     <a href="<?= Url::to(['product/'.$hit->id,'ads' =>$s.'_price_'.$hit->price]) ?>">
	                                   <li><?=Html::img($mainImg->getUrl(''), ['alt' => 'Объявление: '.$hit->name.', '.$hit->price.'руб. '.$hit->oblast_region.' '.$hit->gorod]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
                       <a href="<?= Url::to(['product/'.$hit->id,'ads' =>$s.'_price_'.$hit->price]) ?>">
                                    <li><?=Html::img($mainImg->getUrl('x200'), ['alt' => 'Объявление: '.$hit->name.', '.$hit->price.'руб. '.$hit->oblast_region.' '.$hit->gorod]) ?></li></a>
												 
												                             <?php } ?>
                                                                                                                                                           
			 	
             <h2 style = 
	   "font-family: 'Roboto', sans-serif;
		font-size: 14px;
		font-weight: 400;
		color: #696763;
		margin-top: 7px;
        margin-bottom: 7px;"
	   
	   > <strong><a style="color:#034176" href="<?= Url::to(['category/'.$hit ->category-> id,'ads'=>$s2])?>"><?= $hit -> category->name ?></strong>
           	<br>	
           объявление: 
		   <?php if($hit->gorod) { 
		       echo г.'. '."$hit->gorod";
		   }else{
			   echo "$hit->oblast_region";
		   }?> </a></h2>           <?php  
												      $name = $hit->name;    
												  $name = mb_strtolower($name);  ?>                     
																<strong><?= $name ?></strong>
	   				
					<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">									
								<center><h5 itemprop="price"><strong>Цена:</strong> <?= $formatted_number = number_format($hit->price, 0, ',', ' '); ?> <strong>руб.</strong></h5></center>	
								<meta itemprop="priceCurrency" content="RUB">
                        	</div>	
						   </div>
						   
										<?php if ($hit->new):?>
										<?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
										<?php endif ?>
										
										<?php if ($hit->sale):?>
										<?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'sale' ]) ?>
										<?php endif ?>
										
									
										<p><a href ="<?= Url::to (['/cart/add', 'id'=> $hit->id]) ?>" data-id = "<?= $hit->id?>"
									  class="btn-iz add-to-cart"><img class="animate1" src="/images/iz.png" alt=""></span></a></p>
									  
									  <div class="btn-podrob">
									 <ul class="nav navbar-nav collapse navbar-collapse">        
							   <li class="dropdown"><img class="animate1" src="/images/podrobno5.png" alt="">		    			 
							     <ul role="menu" class="sub-menu1">
							
                        <li itemprop="description"> КРАТКОЕ ОПИСАНИЕ:<p style = opacity:0>объявление Краснодарского края</p><?= mb_substr($hit->content, 0, 150);  ?><br>
									  <a href="<?= Url::to(['product/'.$hit->id,'ads' =>$s.'_price_'.$hit->price]) ?>" class="btn btn-default1">подробнее о объявлении</a>
							
							     </ul>
							   </li>				
								</ul>
								      </div>
									  
									<div id="brands_products2">
									  <div class="btn-podrob">
									<small class="podrob"><img class="animate1" src="/images/podrobno5.png" alt="">
									<span>КРАТКОЕ ОПИСАНИЕ:<p style = opacity:0> доска объявлений Краснодара</p><?= mb_substr($hit->content, 0, 150);  ?><br>
									 <a href="<?= Url::to(['product/'.$hit->id,'ads' =>$s.'_price_'.$hit->price]) ?>" class="btn btn-default1">подробнее о объявлении</a>
									 <a href="tel:<?= $hit -> telephone ?>" target="_blank" class="btn btn-default1"> позвонить</a>
									  
									</span>								
									</small>
									 </div>
									</div>
								
								
								</div>
                           	
							</div>
						</div>
						 	

						<?php endforeach;?>
                                            <?php endif; ?>
					</div>
					</div><!--features_items-->
					
					 <?php 
                                                  echo LinkPager::widget([
                                                'pagination' => $pages,
                                                   ]);   
                                                 ?>   
												 
	        <h1>
				 Ищете доску объявлений в Краснодаре, Краснодарском крае и юге России для активных продаж ? Мечтаете сделать свою продукцию узнаваемой или выгодно продать вещи, которые давно не использовали?<br>
                  А может, находитесь в поиске подходящей одежды, мебели или даже современного автомобиля и недвижимости ?
				  
				К вашим услугам доска объявлений SaleMen.ru – молодой, но уже известный онлайн-сервис, который дает возможность жителям Краснодарского края и юга России с легкостью найти, продать, купить необходимый товар или предложить свои услуги.<br>

				Главное преимущество SaleMen.ru – возможность вести поиск и организовать реализацию даже не выходя из дома, причем совершенно бесплатно.
				<em>Продаете?</em>
				Правильный выбор площадки для продаж – одна из важных составляющих успеха, именно поэтому многие продавцы годами ищут свой сервис и стараются рассказать о себе везде, где только можно. Знакомство с SaleMen.ru избавит вас от лишней работы и трат, ведь предлагает совершенно бесплатно разместить объявления на самой популярной площадке жителей Краснодарского края.
				Хотите, чтобы о вашем товаре или услугах узнали как можно больше клиентов? <br>
				Желаете продать или купить квартиру, дом, земельный участок ?
				• Зарегистрируйтесь на сайте объявлений;<br>
				• Укажите максимум информации о себе;<br>
				• Создайте объявления о продаже/услугах.

				Подать можно неограниченное количество рекламных объявлений, что, без сомнения, увеличит количество просмотров и продаж. Хотите быть еще более заметным на сайте? Круглосуточная поддержка с удовольствием расскажет, как это сделать.<br>
				<em>Покупаете?</em><br>
				Покупателям на сайте SaleMen.ru удобно и комфортно, ведь здесь собраны все актуальные объявления Краснодарского края, Краснодара и юга России. С помощью онлайн-площадки без проблем можно:
				• Купить любые личные вещи: от одежды до мебели;<br>
				• Подобрать электронику или современные цифровые устройства;<br>
				• Приобрести автомобиль, самокат, трактор и другое средство передвижения;<br>
				• Найти недвижимость(квартиру, комнату, дом/коттеджи или земельный участок) для съема или покупки не только в Краснодаре, но и ближайших городах и областях.<br>
				• Составить резюме и познакомиться с работодателем, ведь многие компании на юге России и конкретно в Краснодарском крае и Краснодаре ищут сотрудников и подают объявления именно на сайте SaleMen.ru
				Все без исключения объявления Краснодара проходят проверку и модерацию, поэтому опасаться покупок в интернете нет необходимости. С SaleMen.ru вы сможете подыскать необходимые товары и услуги быстро и максимально недорого, к тому же сэкономить на пересылке.
				Ждем вас на SaleMen.ru – идеальной площадке, где можно купить, продать и отдыхать!</span>
				  
                   
            </h1>
					
					</center>

					
				</div>	
				
				
			</div>

		</div>

		
	</section>


	
<script>
	

	function showSTR1(trueTel) {
document.getElementById('translationTel1').firstChild.replaceData (0 , trueTel.length, trueTel);
}

</script>



