<?php


use yii\helpers\Html;
use app\assets\AppAsset;
use app\models\Nedviggaragi;
use app\modules\admin\models\Oblast;
use app\modules\admin\models\Goroda;
use app\modules\admin\models\Raion;
use app\modules\admin\models\User;

AppAsset::register($this);


?>

<?php
    $oblast1 = Oblast::find()->select('oblast_region')
    ->where(['id' => $nedviggaragi->oblast])
    ->one();
       foreach($oblast1 as $item) {
                $nedviggaragi->oblast = $item;} 
          
      $gorod1 = Goroda::find()->select('name')
    ->where(['id' => $nedviggaragi->gorod])
    ->one();
       foreach($gorod1 as $item) {
                $nedviggaragi->gorod = $item;}      
       
       if ($nedviggaragi->raion ==0){         
      
	   }
	   else {$raion1 = Raion::find()->select('raion')
    ->where(['id' => $nedviggaragi->raion])
    ->one();
       foreach($raion1 as $item) {
       $nedviggaragi->raion = $item;}};
                      
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
					
					<div class="brands-name">
							<h2>Популярное на сайте</h2>
								<ul class="nav nav-pills nav-stacked">
										<li><a href ="<?= yii\helpers\Url::to (['nedvigcategory/2','ads'=>'doma-cottage']) ?>"> <span class="pull-right">(🏠)</span>Дома, Коттеджи</a></li>
									 <li><a href="<?= yii\helpers\Url::to (['nedvigcategory/14','ads'=>'vse-uchastki']) ?>"><span class="pull-right">(🌎)</span>Земельные участки</a></li>
									<li><a href="<?= yii\helpers\Url::to (['nedvigcategory/8','ads'=>'vse-kvartiri']) ?>"> <span class="pull-right">(🌇)</span>Квартиры</a></li>
									<li><a href="<?= yii\helpers\Url::to (['nedvigcategory/19','ads'=>'vsy-kommercheskaya']) ?>"> <span class="pull-right">(🏠)</span>Коммерческая недвижимость</a></li>
									<li><a href="<?= yii\helpers\Url::to (['category/53','ads'=>'vakansii-rabota']) ?>"> <span class="pull-right">(🎩)</span>Работа<<Вакансии</a></li>
									<li><a href="https://salemen.ru/admin"> <span class="pull-right">(✏️)</span>Подать объявление</a></li>
								</ul>
							</div>
						
						</div>
						
					</div>
				</div>
				
                            <?php
                             
                             $mainImg = $nedviggaragi->getImage();
                             $gallery = $nedviggaragi->getImages();
                             
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
				
					<div class="product-details animated fadeInDown faster"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
							
				<div id="similar-product" class="owl-carousel slide-one owl-theme">
                                                     
                      <?php $count = count ($gallery); $i=0; foreach ($gallery as $mainImg):?>
					    <?php if($i % 1===0):?>         
                                                     
                                <div class="item <?php if($i==0) echo 'active'?>">
                                    
                                                  <?php endif; ?>   
                              <?php if ($mainImg['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                 <li><?=Html::img($mainImg->getUrl(''), ['alt' => 'гараж в '. $nedviggaragi -> gorod]) ?></li>
												                  
																			 <?php } else { ?> 
																			 
												 <li><?=Html::img($mainImg->getUrl('350X270'), ['alt' => 'гараж в '. $nedviggaragi -> gorod]) ?></li>
												 
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
                                                            
                                                            
                                                            
						<center><h1><?= $this->title ?></h1></center>
						
					<p><a href ="<?= yii\helpers\Url::to (['cart/addgaragi', 'id'=> $nedviggaragi->id]) ?>" data-id = "<?= $nedviggaragi->id?>"
                          class="btn btn-warning1 add-to-cartgaragi"><i>добавить в избранное</i></a></p>
								
								
								<span>
									<p><strong>Цена:</strong> <?= $formatted_number = number_format($nedviggaragi->price, 0, ',', ' '); ?> <strong>руб.</strong></p>
                                                                         
                                                                        <hr>
                                                                        <p><strong>Область(регион):</strong> <?= $nedviggaragi -> oblast ?></p>
                                                                        <p><strong>Город(поселок):</strong> <?= $nedviggaragi -> gorod ?></p>
																		 <p><strong>Район:</strong> <?= $nedviggaragi -> raion ?></p>
                                                                            <p><strong>Адрес:</strong> <?= $nedviggaragi -> adress ?></p>
                                                                 
                                    
                                                                       
								</span>
                                                                <hr>
                                                                <p><strong>Площадь:</strong> <?= $nedviggaragi -> plochad?></p>
                                                                <p><strong>Охрана:</strong> <?= $nedviggaragi -> ochrana?></p>
                                                               
                                                                   <p><strong>Материал:</strong> <?= $nedviggaragi ->type_materiala ?></p>
                                                            
                                                                 <hr>
                     <p><a onclick="return showTel()" class="btn btn-default1"> <i class="fa fa-phone"></i> Позвонить</i></a>
					  <a onclick="return showMessage()" class="btn btn-default1"> <i class="fa fa-comments-o"></i> Написать</i></a>
		   <a onclick="return showUsers()" class="btn btn-default1"> <i class="fa fa-file-text-o"></i> Профиль продавца</i></a></p>
                                                                <hr>
                                                                <p><h4>Описание</h4> 
				<h2 style = "font-size: 15px; font-weight: 500; color: #696763; margin-bottom: 5px; line-height: 1.2em"><?= $nedviggaragi->opisanie ?></h2></p>
							</div><!--/product-information-->
                                 <?php if ($nedviggaragi->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'newarrival' ]) ?>
                                                                    <?php endif ?>
                                                                    
                                                    <?php if ($nedviggaragi->sale):?>
                                                                    <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'salearrival' ]) ?>
                                                                    <?php endif ?>                              
						</div>
					</div>
                                   
                               
					
					<style>
					
							 
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
					  
					   $username = $nedviggaragi -> username;
					    $tel = $nedviggaragi -> telephone;
						
					   
					   $users1 = user::find()->where(['like', 'username', $username])->andWhere(['telephone' => $tel])->all();
					   foreach($users1 as $users) 
                        
                          $mainImg = $users->getImage(); 						
							
					   ?>
					   
					    <div class="col-sm-12">
						
								<div class="single-products">
                                    <form method="get" action="<?= yii\helpers\Url::to(['nedviggaragi/searchprof']) ?>">                            
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
					$idd = $nedviggaragi -> id;
					$priceup = $nedviggaragi -> price;
					//$operaciya = $nedviggaragi -> operaciya;
					$oblast1 = $nedviggaragi -> oblast;
					$oblast = oblast::find()->select('id')->where(['like','oblast_region',$oblast1])->indexBy('id');
					$raion1 = $nedviggaragi -> raion;
					$raion = raion::find()->select('id')->where(['like','raion',$raion1])->indexBy('id');
					round ($priceup);
					$proc = 30;
					$proc = $priceup/100*$proc;
					$recultup = $proc + $priceup;
					$recultdown = $priceup - $proc;
					round ($recultup);
					round ($recultdown);
					
					  $pox = Nedviggaragi::find()->where(['between', 'price', $recultdown, $recultup])->andWhere(['moder' => 1])->andWhere(['not in', 'id', ["$idd"]])
					  ->andWhere(['raion' => $raion])->andWhere(['oblast' => $oblast])->limit(8)->orderBy('RAND()')->all();?>
					  
					  <?php if ($pox){ ?> 
				 
					  <h2 class="title text-center" style="padding-top: 5px;">похожее по цене и типу</h2> 
					  
					          <div class="carousel-inner"> 
					  
					 <?php $count = count($pox); $i = 0; foreach($pox as $poxs): ?>
<?php if($i % 8 == 0): ?>
    <div class="item <?php if($i == 0) echo 'active' ?>">
<?php endif; ?>
        <div class="col-sm-2">
            <center> <?php if(!empty($poxs->videl)){ ?> 
						<div class="product-image-wrapper22">
						<?php } else { ?> 
							<div class="product-image-wrapper2">
						<?php } ?>
                <div class="single-products2">
                    <div class="productinfo1 text-center">
					
					<?php $mainImg1 = $poxs->getImage();
						  if ($mainImg1['urlAlias']==='placeHolder') { ?>
																			 													 
                                  <a href="<?= yii\helpers\Url::to(['nedviggaragi/'.$poxs->id,'ads' =>'garag_plochad_'.$poxs->plochad.'m.kv._price_'.$poxs->price]) ?>">
								  <li><?=Html::img($mainImg1->getUrl(''), ['alt' => 'гараж. Охрана '.$poxs -> ochrana]) ?></li></a>
												                  
										 <?php } else { ?> 
																			 
								<a href="<?= yii\helpers\Url::to(['nedviggaragi/'.$poxs->id,'ads' =>'garag_plochad_'.$poxs->plochad.'m.kv._price_'.$poxs->price]) ?>">
								<li><?=Html::img($mainImg1->getUrl('120X120'), ['alt' => 'гараж. Охрана '.$poxs -> ochrana]) ?></li></a>
												 
												  <?php } ?>
					
                        <?php if ($poxs->raion ==0){         
      
	   }
	   else {$raion1 = Raion::find()->select('raion')
    ->where(['id' => $poxs->raion])
    ->one();
       foreach($raion1 as $item) {
       $poxs->raion = $item;}};?>
					   
                       <h5><?= $poxs -> raion ?><h5> 
						
						  <h5>Площадь: <?= $poxs -> plochad ?> м.кв.</h5>
						    <h5>Охрана: <?= $poxs -> ochrana ?></h5>
                        <h5>Цена: <?= $formatted_number = number_format($poxs->price, 0, ',', ' ');?> руб.</h5>
                        
                    </div>
				
					
                </div>
				
				                                    
            </div></center>
        </div>
<?php $i++; if($i % 8 == 0 || $i == $count): ?>
    </div>
<?php endif; ?>
<?php endforeach; ?>
 </div>
        
    </div>
	<?php } ?>
	               <!-----------Рекомендуем------------->
		
					
 					<div class="recommended_items">
    <!--recommended_items-->
    <h2 class="title text-center">рекомендуем посмотреть</h2>

   <div id="recommended-item-carousel">
         <div class="owl-carousel slide-two owl-theme">  
        <?php
              $hits = Nedviggaragi::find()->where(['rekom'=> 1])->andWhere(['moder' => 1])->orderBy('RAND()')->limit(24)->all();
			   ?>  
<?php $count = count($hits); $i = 0; foreach($hits as $hit): ?>
<?php if($i % 4 == 0): ?>
    <div class="item <?php if($i == 0) echo 'active' ?>">
<?php endif; ?>
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
																			 
													 
                                                  <a href="<?= yii\helpers\Url::to(['nedviggaragi/'.$hit->id,'ads' =>'garag_plochad_'.$hit->plochad.'m.kv._price_'.$hit->price]) ?>">
												  <li><?=Html::img($imageTitle->getUrl(''), ['alt' =>'гараж. площадь '. $hit->plochad]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												  <a href="<?= yii\helpers\Url::to(['nedviggaragi/'.$hit->id,'ads' =>'garag_plochad_'.$hit->plochad.'m.kv._price_'.$hit->price]) ?>">
												  <li><?=Html::img($imageTitle->getUrl('x200'), ['alt' =>'гараж. площадь '. $hit->plochad]) ?></li></a>
												 
												                             <?php } ?>
						 
						 <?php if ($hit->raion ==0){           
	                                 }
	                    else {$raion1 = Raion::find()->select('raion')->where(['id' => $hit->raion])->one();
                             foreach($raion1 as $item) {
                                     $hit->raion = $item;}};?>
                         <h5>р-он: <?= $hit -> raion?></h5> 
                         
                         <h5><p>Площадь: <?= $hit->plochad?> м.кв.</p></h5>
                         
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
       
        </a>
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
		
		<?php if (!$nedviggaragi->declat AND !$nedviggaragi->declong) {?>
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
					<?php if ($nedviggaragi->declat AND $nedviggaragi->declong) { ?>
					center: [<?php echo $nedviggaragi->declat;?>,<?php echo $nedviggaragi->declong;?>],
					<?php } else { ?>
					center: [45.04484,38.97603],
					<?php } ?>
					zoom: 16
					
				}, {
					balloonMaxWidth: 200
					
				});
				myCollection = new ymaps.GeoObjectCollection();
				
				<?php if ($nedviggaragi->declat AND $nedviggaragi->declong) { ?>
				var myPlacemark = new ymaps.Placemark([<?php echo $nedviggaragi->declat;?>,<?php echo $nedviggaragi->declong;?>],{
					iconContent:'гараж'
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
							   <?php if ($nedviggaragi -> telephone){ ?>
											 <a class="btn btn-warning" href="tel:<?= $nedviggaragi -> telephone ?>" target="_blank"> 
											 <?php echo $nedviggaragi -> telephone;?> </a>
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
			
    <center><p><h4> Что бы воспользоваться службой сообщений,<br> <a href="<?= yii\helpers\Url::to (['/site/signup']) ?>"class="btn btn-default"> Зарегистрируйтесь</a></h4></p></center>

  <hr>

   
</div>
			 
		<?php } else {?>
		
		 
		 <?php $id = Yii::$app->request->get('id'); 
			   $telephone = Yii::$app->user->identity['telephone'];
			    $username = Yii::$app->user->identity['username'];
		 ?>
		
		  <form method="get" action="<?= yii\helpers\Url::to(['/cart/garagimessage' ]) ?>"> 
     
    <div>   
    <center>
  <center><p>
            
             <textarea class="none" readonly="readonly" name="tipp" style="max-width:100px; height:31px" >Гараж</textarea>
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






