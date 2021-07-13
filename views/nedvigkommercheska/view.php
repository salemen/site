<?php


use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;
use app\models\NedvigKommercheska;
use app\modules\admin\models\Oblast;
use app\modules\admin\models\Goroda;
use app\modules\admin\models\Raion;
use app\modules\admin\models\User;


AppAsset::register($this);


?>

<?php
    $oblast1 = Oblast::find()->select('oblast_region')
    ->where(['id' => $nedvigkommercheska->oblast])
    ->one();
       foreach($oblast1 as $item) {
                $nedvigkommercheska->oblast = $item;} 
				
		 if ($nedvigkommercheska->gorod ==0){         
      
	   }else{		
          
      $gorod1 = Goroda::find()->select('name')
    ->where(['id' => $nedvigkommercheska->gorod])
    ->one();
       foreach($gorod1 as $item) {
	   $nedvigkommercheska->gorod = $item;} }

     if ($nedvigkommercheska->raion ==0){         
      
	   }else {$raion1 = Raion::find()->select('raion')
    ->where(['id' => $nedvigkommercheska->raion])
    ->one();
       foreach($raion1 as $item) {
       $nedvigkommercheska->raion = $item;}};

       $price = $nedvigkommercheska->price;	   
       
       $this->title = 'Купить коммерческую недвижимость: 🏭 '. $nedvigkommercheska-> type_nedvigimosty. ', цена '. $price.' руб., г.' .$nedvigkommercheska->gorod.', id'. $nedvigkommercheska->id;	   
          $this->params['breadcrumbs'][] = $this->title; 

        $title2 = $nedvigkommercheska-> type_nedvigimosty. ', площадь '.$nedvigkommercheska -> plochad. ' м.кв., '. "$price".' руб.';	 		  
                      
    ?>

           <link rel="stylesheet" href="/owl-carousel/css/owl.carousel.css">
	    <link rel="stylesheet" href="/owl-carousel/css/owl.theme.default.css">

<section>


		<div class="container" style="padding-top: 10px">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar" style="padding-left: 5px;">
					 <div id="brands_products1">
						<h2>Категории недвижимости</h2>
						
                                                
						<ul class="catalog1 category-products">
<?= \app\components\MenuWidgetned::widget(['tpl' => 'menuned' ]) ?>
</ul>
						<div class="brands_products"><li><a href=""></li></div>
						<div id="fixed">	
						<div class="brands-name">
							<h2>Популярное на сайте</h2>
								<ul class="nav nav-pills nav-stacked">
										<li><a href ="<?= Url::to (['nedvigcategory/2','ads'=>'doma-cottage']) ?>"> <span class="pull-right">(🏠)</span>Дома, Коттеджи</a></li>
									 <li><a href="<?= Url::to (['nedvigcategory/14','ads'=>'vse-uchastki']) ?>"><span class="pull-right">(🌎)</span>Земельные участки</a></li>
									<li><a href="<?= Url::to (['nedvigcategory/8','ads'=>'vse-kvartiri']) ?>"> <span class="pull-right">(🌇)</span>Квартиры</a></li>
									<li><a href="<?= Url::to (['nedvigcategory/19','ads'=>'vsy-kommercheskaya']) ?>"> <span class="pull-right">(🏠)</span>Коммерческая недвижимость</a></li>
									<li><a href="<?= Url::to (['category/53','ads'=>'vakansii-rabota']) ?>"> <span class="pull-right">(🎩)</span>Работа<<Вакансии</a></li>
									<li><a href="https://salemen.ru/admin"> <span class="pull-right">(✏️)</span>Подать объявление</a></li>
								<center> <a onclick="return showKommerch()" ><i class="btn btn-warning" style= "margin-top: 5px; background-color: #f7d9ae">Поиск<div style="display: none;"> коммерческой недвижимости Краснодара Краснодарского края и юга России</div></i></a></center>
								</ul>
							</div>
						</div>
						</div>
												
					</div>
				</div>
				
                            <?php
                             
                             $mainImg = $nedvigkommercheska->getImage();
                             $gallery = $nedvigkommercheska->getImages();
                             
                             ?>
                         
                            
				<div class="col-sm-9 padding-right">
				
				 <div>
            
    <?php if(Yii::$app->session->hasFlash('success22')): ?>
    <div class="alert alert-success alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('success22'); ?>
    </div>
    <?php endif; ?>
        </div> 
		         	<div itemscope itemtype="http://schema.org/Product">
					<div class="product-details animated fadeInDown faster"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
                             
                           <div id="similar-product" class="owl-carousel slide-one owl-theme">
                                                     
                      <?php $count = count ($gallery); $i=0; foreach ($gallery as $mainImg):?>
					    <?php if($i % 1===0):?>         
                                                     
                                <div class="item <?php if($i==0) echo 'active'?>">
                                    
                                                  <?php endif; ?>   
                              <?php if ($mainImg['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                 <li><?=Html::img($mainImg->getUrl(''), ['alt' => 'Купить коммерческую недвижимость: 🏭 '. $nedvigkommercheska-> type_nedvigimosty. ', цена '. $price.' руб., г.' .$nedvigkommercheska->gorod]) ?></li>
												                  
																			 <?php } else { ?> 
																			 
												 <li><?=Html::img($mainImg->getUrl('350X270'), ['alt' => 'Купить коммерческую недвижимость: 🏭 '. $nedvigkommercheska-> type_nedvigimosty. ', цена '. $price.' руб., г.' .$nedvigkommercheska->gorod]) ?></li>
												 
												                             <?php } ?>
                                                            <?php $i++; if($i % 1===0 || $i==$count): ?>   
										</div>
                                                     <?php endif; ?>
						<?php endforeach;?>
                          	
							</div></center>
							
							
						</div>
						
						                     <!--////////////////////Яндекс карта/////////////////////-->
										   
										  <center> <a onclick="return showMaps()" ><i class="btn btn-default" 
	                              style= "margin-left: 10px; margin-top: 8px;" ><i class="fa fa-flag"></i> Посмотреть на карте</i></a></center>
										   
										 
										          <!------------Конец Яндекс карты------------>
                            </div>                
                                          
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
<!--								<img src="/images/product-details/new.jpg" class="newarrival" alt="" />-->
                                                            
                                                            
                                                            
								<center><h1 itemprop="name"><?= $title2; if ($nedvigkommercheska -> gorod){
									echo ' '.$nedvigkommercheska -> gorod.'. ';
								}else{
									echo ' '.$nedvigkommercheska -> oblast.'. ';
								}?> <span style = "font-size: 14px";> id <?= $nedvigkommercheska -> id ?></span></h1></center>
							
						<p><a href ="<?= Url::to (['cart/addkommer', 'id'=> $nedvigkommercheska->id]) ?>" data-id = "<?= $nedvigkommercheska->id?>"
                          class="btn btn-warning1 add-to-cartkommer"><i>добавить в избранное</i></a></p>
								
								
								<span>
								<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">	
									<p itemprop="price"><strong>Цена:</strong> <?= $formatted_number = number_format($nedvigkommercheska->price, 0, ',', ' '); ?> <strong>руб.</strong></p>
                                  <meta itemprop="priceCurrency" content="RUB">   
								 </div>                                        
                                                                        <hr>
                                                                <p><strong>Тип недвижимости: </strong> <?= $nedvigkommercheska-> type_nedvigimosty ?></p>
                                                                <p><strong>Название:</strong> <?= $nedvigkommercheska ->nazvanie_obiekta ?> </p>
                                                                        <p><strong>Область(регион):</strong> <?= $nedvigkommercheska -> oblast ?></p>
                                                                        <p><strong>Город(поселок):</strong> <?= $nedvigkommercheska -> gorod ?></p>
															<?php if ($nedvigkommercheska->raion ==0){         
      
	                                                        }else {?> <p><strong>Район:</strong> <?= $nedvigkommercheska -> raion ?></p><?php } ?>
	                                                          
																		
                                                                            <p><strong>Адрес:</strong> <?= $nedvigkommercheska -> adress ?></p>

                                                                       
								</span>
                                                                <hr>
                                                                <p><strong>Площадь:</strong> <?= $nedvigkommercheska -> plochad ?> м.кв.</p>
                                                                <p><strong>Этажей:</strong> <?= $nedvigkommercheska -> kolichestvo_etagei ?></p>
                                                              <?php if ($nedvigkommercheska -> plochad_uchastka) { ?>
                                                                <p><strong>Площадь участка:</strong> <?= $nedvigkommercheska -> plochad_uchastka ?> сот.</p>
															  <?php } ?>  
                                                            <hr>
                <p><a onclick="return showTel()" class="btn btn-default1"> <i class="fa fa-phone"></i> Позвонить</i></a>
				  <a onclick="return showMessage()" class="btn btn-default1"> <i class="fa fa-comments-o"></i> Написать</i></a>
		   <a onclick="return showUsers()" class="btn btn-default1"> <i class="fa fa-file-text-o"></i> Профиль продавца</i></a></p>
										   
										 
										          <!------------Конец Профиля------------>
				   </p>
                                                                
                                                                <hr>
                                                                <p><h4>Описание</h4> 
				<h2 itemprop="description" style = "font-size: 15px; font-weight: 500; color: #696763; margin-bottom: 5px; line-height: 1.2em"><?= $nedvigkommercheska->opisanie ?></h2></p>
							</div><!--/product-information-->
                                 <?php if ($nedvigkommercheska->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'newarrival' ]) ?>
                                                                    <?php endif ?>
                                                                    
                                                    <?php if ($nedvigkommercheska->sale):?>
                                                                    <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'salearrival' ]) ?>
                                                                    <?php endif ?>                             
						</div>
					</div>
                                    
                     </div>            
                                    
                                 
					
					<style>
					
			.productinfo img {
		margin-top: 1px !important;	
		}
		
		.item {
    padding-left: 1px;
    padding-right: 1px;
		}
					
		.product-image-wrapper2{
	border:3px solid #daddfb;
	overflow: auto;
	margin-bottom:10px;
    height: 220px;
	max-width: 300px;
    border-radius: 8px;		
		
}

.product-image-wrapper22{
	border:3px solid red;
	background: aquamarine;
	overflow: auto;
	margin-bottom:10px;
    height: 220px;
	max-width: 300px;
    border-radius: 8px;		
		
}


     .btn-warning1{
			 padding: 3px 5px!important;
			 background-color: #f5ebdd;
			 border: 1px solid #929090;
		 }
		 
		 .btn-warning1:hover{
			 padding: 3px 5px!important;
			 background-color: #b6efab;
			 border: 1px solid green;
		 }
		 
		 .btn-default{
			 background-color: #f5ebdd;
		 }

      
        .product-image-wrapper1{
	border:3px solid #efefeb;
	overflow: auto;
	margin-bottom:10px;
    height: max-content;
	max-width: 400px;
    border-radius: 8px;		
		
}

.product-image-wrapper11{
	border:4px solid red;
	overflow: auto;
	margin-bottom:10px;
    height: max-content;
	max-width: 400px;
    border-radius: 8px;		
		
}

      
		
		  input[type="tel"] { display: none; }
		  
		  
        </style>
		
		 <!-----------------ПРОФИЛЬ----------------->
					   
					   <?
         
         \yii\bootstrap\Modal::begin ([
             'headerOptions' => [
            'style' => 'display:none;'
           ],
		   'bodyOptions'=> [
           'style' => 'padding: 3px;'
		   ],
		   'footerOptions'=> [
           'style' => 'padding: 5px;'
		   ],
             'id'=> 'users',
			 //'clientOptions' => ['show' => true],
             'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
			 
               
         ]);?>
					   
					   <?php 
					  
					   $username = $nedvigkommercheska -> username;
					    $tel = $nedvigkommercheska -> telephone;
						
					   
					   $users1 = user::find()->where(['like', 'username', $username])->andWhere(['telephone' => $tel])->all();
					   foreach($users1 as $users) 
                        
                          $mainImg = $users->getImage(); 						
							
					   ?>
					   
					    <div class="col-sm-12">
						 
								<div class="single-products">
                                 <form method="get" action="<?= Url::to(['nedvigkommercheska/searchprof']) ?>">                               
										<div class="productinfo text-center">
                                                                                    
                                                                                                                        
                                   <?php if ($mainImg['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                 <li><?=Html::img($mainImg->getUrl(''), ['alt' => '']) ?></li>
												                  
																			 <?php } else { ?> 
																			 
												 <li><?=Html::img($mainImg->getUrl('x200'), ['alt' => '']) ?></li>
												 
												                             <?php } ?>  
								   <br>
                                           <p><strong>Дата регистрации: </strong><?php if ($users -> date){
											 echo $users -> date;}
											 else {echo "нет";} ?></p>
                                             
                                            <p><strong>Имя:</strong> <?php if ($users -> name){
											 echo $users -> name;}
											 else {echo "нет";} ?></p>												 
										 
											 <p><strong>Телефон:</strong> <?php if ($users -> telephone){ ?>
											 <a href="tel:<?= $users -> telephone ?>" target="_blank"> 
											 <?php echo $users -> telephone;?> </a>
					                         <?php } else {echo "нет";} ?> </p>
											 
											 <p><strong>Город: </strong><?php if ($users -> gorod){
											 echo $users -> gorod;}
											 else {echo "нет";} ?></p>
											 
											 <p><strong>Адрес: </strong><?php if ($users -> adress){
											 echo $users -> adress;}
											 else {echo "нет";} ?></p>
											 
											 <p><strong>Описание профиля: </strong><?php if ($users -> opisanie){
											 echo $users -> opisanie;}
											 else {echo "нет";} ?></p>
											 
                            
										</div>
                                        <input type="tel" name="tel" value=<?php echo $tel ?> >                                   
                                <input type="tel" name="username" value=<?php echo $username ?> >
								 <center><input id="drugie" class="drugie" type="submit" class="btn btn-default" name="search" value="другие объявления"></center>
								 </form>                               

								</div>
                         
						</div>
					   
					   <?
		  \yii\bootstrap\Modal::end();
         
         ?>
					   
					   <!--------------------КОНЕЦ ПРОФИЛЯ---------------------->
		
		      <!------запрос на похожее в этом районе------>
					
					<?php
					$idd = $nedvigkommercheska -> id;
					$tip = $nedvigkommercheska -> type_nedvigimosty;
					$priceup = $nedvigkommercheska -> price;
					$operaciya = $nedvigkommercheska -> operaciya;
					$oblast1 = $nedvigkommercheska -> oblast;
					$oblast = oblast::find()->select('id')->where(['like','oblast_region',$oblast1])->indexBy('id');
					$raion = $nedvigkommercheska -> raion;
					round ($priceup);
					$proc = 30;
					$proc = $priceup/100*$proc;
					$recultup = $proc + $priceup;
					$recultdown = $priceup - $proc;
					round ($recultup);
					round ($recultdown);
					
					  $pox = Nedvigkommercheska::find()->where(['between', 'price', $recultdown, $recultup])->andWhere(['not in', 'id', ["$idd"]])
					  ->andWhere([ 'like', 'type_nedvigimosty', $tip])->andWhere(['moder' => 1])
					  ->andWhere([ 'like', 'operaciya', $operaciya])->andWhere(['oblast' => $oblast])->limit(8)->orderBy('RAND()')->all();?>
					  
					  <?php if ($pox) {?>
					  
					  <div id="similar-product" class="carousel slide" data-ride="carousel">
					  <h2 class="title text-center" style="padding-top: 5px;">похожее по цене и типу</h2> <?php } ?>
					  
					          <div class="carousel-inner"> 
					  
					 <?php $count = count($pox); $i = 0; foreach($pox as $poxs): ?>
					 
					 <?php	 if ($poxs->gorod ==0){         
												  
						   }										
						   else {$gorod1 = Goroda::find()->select('name')
						->where(['id' => $poxs->gorod])
						->one();
						   foreach($gorod1 as $item) {
						   $poxs->gorod = $item;}};  
                    ?>	
					 
<?php if($i % 8 == 0): ?>
    <div class="item <?php if($i == 0) echo 'active' ?>">
<?php endif; ?>
<?php $zem = $poxs->type_nedvigimosty;
											   
		   if ($zem === "Офисное"){
			   $zem = "ofisnaya";
		   }elseif($zem === "Производственное"){
			   $zem = "proizvodsvennoe";
		   }elseif($zem === "Торговое"){
			   $zem = "torgovoe";
		   }elseif($zem === "Гостиничное"){
			   $zem = "gostinichnie";
		   }elseif($zem === "Складское"){
			   $zem = "sklad";
		   }elseif($zem == "Гаражного типа"){
			   $zem = "garagnogo_tipa";
		   }?>
        <div class="col-sm-2">
            <center><?php if(!empty($poxs->videl)){ ?> 
						<div class="product-image-wrapper22">
						<?php } else { ?> 
							<div class="product-image-wrapper2">
						<?php } ?>
                <div class="single-products2">
                    <div class="productinfo1 text-center">
                        <?php $mainImg1 = $poxs->getImage();
						  if ($mainImg1['urlAlias']==='placeHolder') { ?>
																			 													 
                                  <a href="<?= Url::to(['nedvigkommercheska/'.$poxs->id,'ads' =>$zem.'_kommerch_nedvigimost_'.$poxs->plochad.'m.kv._price_'.$poxs->price]) ?>">
								  <li><?=Html::img($mainImg1->getUrl(''), ['alt' => 'Купить коммерческую недвижимость: 🏭 '. $poxs-> type_nedvigimosty. ', цена '. $poxs->price.' руб., г.' .$poxs->gorod]) ?></li></a>
												                  
										 <?php } else { ?> 
																			 
								 <a href="<?= Url::to(['nedvigkommercheska/'.$poxs->id,'ads' =>$zem.'_kommerch_nedvigimost_'.$poxs->plochad.'m.kv._price_'.$poxs->price]) ?>">
								<li><?=Html::img($mainImg1->getUrl('120X120'), ['alt' => 'Купить коммерческую недвижимость: 🏭 '. $poxs-> type_nedvigimosty. ', цена '. $poxs->price.' руб., г.' .$poxs->gorod]) ?></li></a>
												 
												  <?php } ?>
						
						  <h5><?= $poxs ->type_nedvigimosty ?></h5>
						  <h5><?= $poxs -> plochad ?> м.кв.</h5>
						  
                        <h5><?= $formatted_number = number_format($poxs->price, 0, ',', ' ');?> руб.</h5>
                       
					   
					    <?php if ($poxs->raion ==0){         
      
	   }
	   else {$raion1 = Raion::find()->select('raion')
    ->where(['id' => $poxs->raion])
    ->one();
       foreach($raion1 as $item) {
       $poxs->raion = $item;}};?>
	   
                       <h5><?= $poxs -> raion ?><h5> 
                    </div>
					
					
                </div>
				
				                                    
            </div></center>
        </div>
<?php $i++; if($i % 8 == 0 || $i == $count): ?>
    </div>
<?php endif; ?>
<?php endforeach; ?>
 </div>
        
	
	               <!-----------Рекомендуем------------->
					
 					<div class="recommended_items">
    <!--recommended_items-->
    <h2 class="title text-center">рекомендуем посмотреть</h2>

   <div id="recommended-item-carousel">
         <div class="owl-carousel slide-two owl-theme"> 
		 <?php /*  if (!$oblast||$oblast===0||$oblast==0){ */
              $hits = Nedvigkommercheska::find()->where(['rekom'=>'1'])->andWhere(['moder' => 1])->orderBy('RAND()')->limit(24)->all();
			 /*  }else {$hits = Nedvigkommercheska::find()->where(['rekom'=>'1'])->andWhere(['moder' => 1])->andWhere(['Like', 'oblast',  $oblast])
			  ->orderBy('RAND()')->limit(24)->all();} */ ?>
<?php $count = count($hits); $i = 0; foreach($hits as $hit): ?>

<?php	 if ($hit->gorod ==0){         
												  
	   }										
	   else {$gorod1 = Goroda::find()->select('name')
	->where(['id' => $hit->gorod])
	->one();
	   foreach($gorod1 as $item) {
	   $hit->gorod = $item;}};  
                    ?>	

<?php if($i % 4 == 0): ?>
    <div class="item <?php if($i == 0) echo 'active' ?>">
<?php endif; ?>

  <?php $zem1 = $hit->type_nedvigimosty;
											   
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
		   }?>

        <div class="col-sm-3">
          <?php if(!empty($hit->videl)){ ?> 
						<div class="product-image-wrapper11">
						<?php } else { ?> 
							<div class="product-image-wrapper1">
						<?php } ?>
                <div class="single-products1">
                    <div class="productinfo text-center">
                       <?php $imageTitle = $hit->getImage();?>
                       <?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                 <a href="<?= Url::to(['nedvigkommercheska/'.$hit->id,'ads' =>$zem1.'_kommerch_nedvigimost_'.$hit->plochad.'m.kv._price_'.$hit->price]) ?>">
												 <li><?=Html::img($imageTitle->getUrl(''), ['alt' => 'Купить коммерческую недвижимость: 🏭 '. $hit-> type_nedvigimosty. ', цена '. $hit->price.' руб., г.' .$hit->gorod]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												  <a href="<?= Url::to(['nedvigkommercheska/'.$hit->id,'ads' =>$zem1.'_kommerch_nedvigimost_'.$hit->plochad.'m.kv._price_'.$hit->price]) ?>">
												  <li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => 'Купить коммерческую недвижимость: 🏭 '. $hit-> type_nedvigimosty. ', цена '. $hit->price.' руб., г.' .$hit->gorod]) ?></li></a>
												 
												                             <?php } ?>
                         <h4><?= $hit->type_nedvigimosty?></h4> 
                         <h4><p>Площадь: <?= $hit->plochad?> м.кв.</p></h4>
                        
                          <h5>г. <?= $hit->gorod?></h5>
                        <h5>Цена: <?= $formatted_number = number_format($hit->price, 0, ',', ' ');?> руб.</h5>
                       
                      
                    </div>
                </div>
            </div>
			
        </div>
<?php $i++; if($i % 4 == 0 || $i == $count): ?>
    </div>
<?php endif; ?>
<?php endforeach; ?>
        </div>
        
    </div>
</div><!--/recommended_items-->
<table class="table table-hover table-striped"> 
       <tr align="center">
		<td align="center"><input class="button" type="button" value="Вернуться назад" onclick="javascript:history.go(-1)" /></td>
	</tr>
   </table>
</div>
</div>
</div>

                          <!-----------Карта-------------->

<?
         
         \yii\bootstrap\Modal::begin ([
             'headerOptions' => [
            'style' => 'display:none;'
           ],
		   'bodyOptions'=> [
           'style' => 'padding: 3px;'
		   ],
		   'footerOptions'=> [
           'style' => 'padding: 5px;'
		   ],
             'id'=> 'maps',
			 //'clientOptions' => ['show' => true],
             'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
			 
               
         ]);?>
		 
		   <table class="table table-hover table-striped">  
	
   <tr id="thisguys" class="noshowtrue">
	<td align="left" colspan="2">
		
		<?php if (!$nedvigkommercheska->declat AND !$nedvigkommercheska->declong) {?>
		<center><p>местоположение не указано</p></center> <?php } ?>
		 <script src="https://api-maps.yandex.ru/2.1.75/?lang=ru_RU&apikey=03c1e2cb-88bb-4cbe-9038-d76af518009d" type="text/javascript"></script>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<div id="mapp" style="width: 100%; height: 400px"></div>
		<script type="text/javascript">
			$.noConflict();
			
			
			ymaps.ready(function () {

			function crdss(ttt1,ttt2) {
				document.getElementById('declat').value = ttt1;
				document.getElementById('declong').value = ttt2;
			}
						
				myMap = new ymaps.Map("mapp", {
					<?php if ($nedvigkommercheska->declat AND $nedvigkommercheska->declong) { ?>
					center: [<?php echo $nedvigkommercheska->declat;?>,<?php echo $nedvigkommercheska->declong;?>],
					<?php } else { ?>
					center: [45.04484,38.97603],
					<?php } ?>
					zoom: 16
					
				}, {
					balloonMaxWidth: 200
					
				});
				myCollection = new ymaps.GeoObjectCollection();
				
				<?php if ($nedvigkommercheska->declat AND $nedvigkommercheska->declong) { ?>
				var myPlacemark = new ymaps.Placemark([<?php echo $nedvigkommercheska->declat;?>,<?php echo $nedvigkommercheska->declong;?>],{
					iconContent:'недвижимость'
				},{
             // Задаем стиль метки (метка в виде круга).
              preset: 'islands#redStretchyIcon',
             // Задаем цвет метки (в формате RGB).
             // iconColor: 
                });
				myCollection.add(myPlacemark);
				myMap.geoObjects.add(myCollection);
				<?php } ?>
          
		       
				myMap.events.add('contextmenu', function (e) {
					myMap.hint.open(e.get('coords'), 'Нажмите левой кнопкой мыши');
				});
				
			});
		</script>
	
	</td>
</tr>
					</table>					   
          <?
		  \yii\bootstrap\Modal::end();
         
         ?>

                       <!------------Конец карты------------>
					   
					 <style>
					 .productinfo img {
						width: 100%;
						max-width: 190px;
						height: 150px;
						border-radius: 8px;
					 }
					 
					  	
					 </style>
					 
					 
					  
					   <!---------НОМЕР ТЕЛЕФОНА-------->
		 <?
         
         \yii\bootstrap\Modal::begin ([
            
		   'bodyOptions'=> [
           'style' => 'padding: 6px;'
		   ],
		   'footerOptions'=> [
           'style' => 'padding: 5px;'
		   ],
             'id'=> 'tel',
			 //'clientOptions' => ['show' => true],
             'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
			 
               
         ]);?>	


							   <center><p><strong>Телефон (нажмите чтобы позвонить)</strong> </br>
							   <?php if ($nedvigkommercheska -> telephone){ ?>
											 <a class="btn btn-warning" href="tel:<?= $nedvigkommercheska -> telephone ?>" target="_blank"> 
											 <?php echo $nedvigkommercheska -> telephone;?> </a>
					                         <?php } else {echo "нет";} ?> </p></center>

        	 <?
		  \yii\bootstrap\Modal::end();
         
         ?>	 
					   
					   <!------------------------->
				  
					   
					    <!-----------СООБЩЕНИЕ----------->
        
             <?
         
         \yii\bootstrap\Modal::begin ([
             'header'=> '<center><h4>Сообщение</h4></center>',
             'id'=> 'message',
             'footer' => '<button type="button" data-dismiss="modal">Закрыть</button>'            
            ]);?>
         
		 <?php if (Yii::$app->user->isGuest) { ?>
			 
			<div>
			
    <center><p><h4> Что бы воспользоваться службой сообщений,<br><a href="<?= Url::to (['/site/signup']) ?>"class="btn btn-default"> Зарегистрируйтесь</a></h4></p></center>

  <hr>

   
</div>
			 
		<?php } else {?>
		
		 
		 <?php $id = Yii::$app->request->get('id'); 
			   $telephone = Yii::$app->user->identity['telephone'];
			    
		 ?>
		
		  <form method="get" action="<?= Url::to(['/cart/kommerchmessage' ]) ?>"> 
     
    <div>   
    <center>
  <center><p>
            
             <textarea class="none" readonly="readonly" name="tipp" style="max-width:100px; height:31px" > Коммерческая </textarea>
			 <textarea class="none" readonly="readonly" name="id" style="width:40px; height:31px" ><?= $id ?> </textarea>
             <textarea class="none" readonly="readonly" name="loginin" style="max-width:150px; height:31px" ><?= $users->username ?> </textarea>
			  <textarea class="none" readonly="readonly" name="telephone" style="max-width:100px; height:31px" ><?= $telephone ?> </textarea>
			 
   </p></center><br>
  
    <p><textarea placeholder = "текст сообщения" style="max-width:430px;height:100px;resize:vertical" maxlength="150" name="komment" id ="kom"></textarea></p>
	
	
 <p> <input class="messag" type = "submit" class="btn btn-default" value="Отправить" id="message"> </p></center>
    </div>
</form>               

		<?php } ?>
		 
         <? 
		 \yii\bootstrap\Modal::end();
         ?>

            <!--КОНЕЦ СООБЩЕНИЙ-->
			
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <script src="/owl-carousel/js/owl.carousel.js"></script>	

<script>


	$(".slide-one").owlCarousel({
		nav:true,
		loop:true,
		touchDrag:true,
		autoHeight:true,
		items:1,
		margin:10,
		center:true,
		nav: true,
		navText : ['назад','вперед'],
		smartSpeed:300,
		autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
		responsiveClass:true,
		responsive:{ //Адаптация в зависимости от разрешения экрана
            0:{
                items:1,
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

    $(".slide-two").owlCarousel({
		nav:true,
		loop:true,
		touchDrag:true,
		//items:1,
		center:true,
		nav: true,
		navText : ['назад','вперед'],
		smartSpeed:300,
		autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
		responsiveClass:true,
		responsive:{ //Адаптация в зависимости от разрешения экрана
            0:{
                items:1,
				nav:false,
            },
            600:{
                items:1,
				nav:false,
            },
            1000:{
                items:1
            }
        }
	});
	
	
</script>

</section>




