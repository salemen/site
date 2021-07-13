<?php


use yii\helpers\Html;
use app\assets\AppAsset;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\models\Category;
use app\models\Avtovodnik;
use app\modules\admin\models\User;
use kartik\select2\Select2; // or kartik\select2\Select2
use yii\web\JsExpression;

AppAsset::register($this);


?>

<section>
        
		<link rel="stylesheet" href="/owl-carousel/css/owl.carousel.css">
	    <link rel="stylesheet" href="/owl-carousel/css/owl.theme.default.css">
		

		<div class="container"style="padding-top: 10px">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar" style="padding-left: 5px;">
					 <div id="brands_products1">
						 
						<h2>Категории автотехники</h2>
												
                                                
						<ul class="catalog1 category-products">
<?= \app\components\MenuWidgetavto::widget(['tpl' => 'menuavto' ]) ?>
</ul>
					
				<a href = "#"></a>			
						
				
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
                             
                             $mainImg = $avtovodnik->getImage();
                             $gallery = $avtovodnik->getImages();
                             
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
                             
<!--								<img src="/images/product-details/1.jpg" alt="" />-->
                                         <div id="similar-product" class="owl-carousel slide-one owl-theme" >
								
                                                     
                      <?php $count = count ($gallery); $i=0; foreach ($gallery as $mainImg):?>
					    <?php if($i % 1===0):?>         
                                                     
                                <div class="item <?php if($i==0) echo 'active'?>">
                                    
                                                  <?php endif; ?>   
                              <?php if ($mainImg['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                 <li><?=Html::img($mainImg->getUrl(''), ['alt' => $avtovodnik ->tip]) ?></li>
												                  
																			 <?php } else { ?> 
																			 
												 <li><?=Html::img($mainImg->getUrl('350X270'), ['alt' => $avtovodnik ->tip]) ?></li>
												 
												                             <?php } ?>
                                                            <?php $i++; if($i % 1===0 || $i==$count): ?>   
										</div>
                                                     <?php endif; ?>
						<?php endforeach;?>
                          	
							</div>
						
						</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
<!--								<img src="/images/product-details/new.jpg" class="newarrival" alt="" />-->
                                                            
                                                            
                                                            
				<center><h1><?= $this->title;?></h1></center>
							
				<p><a href ="<?= yii\helpers\Url::to (['cart/addvoda', 'id'=> $avtovodnik->id]) ?>" data-id = "<?= $avtovodnik->id?>"
                          class="btn btn-warning1 add-to-cartvoda"><i>добавить в избранное</i></a></p>
								
								<span>
									<p><strong>Цена: </strong><?= $avtovodnik -> price ?> <strong>руб.</strong></p>
                                                                         
                                                                        
                                                                        <hr>
                                                                        <p><strong>Тип: </strong> <?= $avtovodnik -> tip ?></p>
                                                                        <p><strong>Тип двигателя: </strong> <?= $avtovodnik -> tip_dvigatel ?></p>
                                                                        <?php if ($avtovodnik -> l_s) {?>   
																		<p><strong>Лошадиных сил: </strong> <?= $avtovodnik -> l_s ?></p> <?php } ?>
                                      
								                               </span>
                                                                <hr>
                                                                
                                                                   <p><strong>Состояние: </strong> <?= $avtovodnik ->sostoyanie?> </p>
                                                            
                                                                <hr>
   <p><a onclick="return showTel()" class="btn btn-default1"> <i class="fa fa-phone"></i> Позвонить</i></a>
    <a onclick="return showMessage()" class="btn btn-default1"> <i class="fa fa-comments-o"></i> Написать</i></a>
		   <a onclick="return showUsers()" class="btn btn-default1"> <i class="fa fa-file-text-o"></i> Профиль продавца</i></a></p>
                                                                <hr>
                                                                <p><h4>Описание</h4> 
			<h2 style = "font-size: 15px; font-weight: 500; color: #696763; margin-bottom: 5px; line-height: 1.2em"><?= $avtovodnik->opisanie ?></h2></p>
							</div><!--/product-information-->
                               <?php if ($avtovodnik->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'newarrival' ]) ?>
                                                                    <?php endif ?>
                                                                    
                                                    <?php if ($avtovodnik->sale):?>
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
	border:4px solid red;
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
					  
					   $username = $avtovodnik -> username;
					    $tel = $avtovodnik -> telephone;
						
					   
					   $users1 = user::find()->where(['like', 'username', $username])->andWhere(['telephone' => $tel])->all();
					   foreach($users1 as $users) 
                       
                          $mainImg = $users->getImage(); 					   
							
					   ?>
					   
					    <div class="col-sm-12">
						
								<div class="single-products">
                                      <form method="get" action="<?= yii\helpers\Url::to(['avtovodnik/searchprof']) ?>">                                   
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
					   
		
		                <!------запрос на похожее------>
					
					<?php
					$idd = $avtovodnik -> id;
					$priceup = $avtovodnik -> price;
					$tip = $avtovodnik -> tip;
					
					round ($priceup);
					$proc = 30;
					$proc = $priceup/100*$proc;
					$recultup = $proc + $priceup;
					$recultdown = $priceup - $proc;
					round ($recultup);
					round ($recultdown);
					
					  $pox = Avtovodnik::find()->where(['between', 'price', $recultdown, $recultup])->andWhere(['moder' => 1])->andWhere(['not in', 'id', ["$idd"]])
					  ->andWhere([ 'like', 'tip', $tip])->limit(6)->orderBy('RAND()')->all();?>
					  
					  <?php if ($pox) {?>
					  
					   <div id="similar-product" class="carousel slide" data-ride="carousel">
					  <h2 class="title text-center" style="padding-top: 5px;">похожее по цене и типу</h2> <?php } ?>
					  
					         <div class="carousel-inner"> 
					  
					 <?php $count = count($pox); $i = 0; foreach($pox as $poxs): ?>
<?php if($i % 6 == 0): ?>
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
					
                         <?php 
						  $s = $poxs->tip;
						  						
						  //$s = (string) $s; // преобразуем в строковое значение
						  //$s = strip_tags($s); // убираем HTML-теги
						  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
						  $s = trim($s); // убираем пробелы в начале и конце строки
						  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
						  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
						  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
						  $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
						?>
						
						 <?php $mainImg1 = $poxs->getImage();
						  if ($mainImg1['urlAlias']==='placeHolder') { ?>
																			 													 
                                 <a href="<?= yii\helpers\Url::to(['avtovodnik/'.$poxs->id,'ads' =>'_'.$s.'_price_'.$poxs->price]) ?>">
								  <li><?=Html::img($mainImg1->getUrl(''), ['alt' => $poxs -> tip]) ?></li></a>
												                  
										 <?php } else { ?> 
																			 
								<a href="<?= yii\helpers\Url::to(['avtovodnik/'.$poxs->id,'ads' =>'_'.$s.'_price_'.$poxs->price]) ?>">
								<li><?=Html::img($mainImg1->getUrl('120X120'), ['alt' => $poxs -> tip]) ?></li></a>
												 
												  <?php } ?>
						 
						    <h5><?= $poxs -> tip ?></h5>
							
							<h5><?= $poxs ->sostoyanie?></h5>
                        <h5><?= $poxs->price?> руб.</h5>
                       
                       
                    </div>
					
					<div id="brands_products2">
						  <div class="btn-podrob2">
						<small class="podrob"><img class="animate1" src="/images/podrobno5.png" alt="">
						<span>КРАТКОЕ ОПИСАНИЕ<br><?= mb_substr($poxs->opisanie, 0, 200);  ?><br>
						 <a href="tel:<?= $poxs -> telephone ?>" target="_blank" class="btn btn-default1"> позвонить</a>
						   <a href="<?= yii\helpers\Url::to(['avtovodnik/'.$poxs->id,'ads' =>'_'.$s.'_price_'.$poxs->price]) ?>" class="btn btn-default1">подробнее</a>
						</span></small>
						 </div>
						</div>
					
                </div>
				
				                                    
            </div></center>
        </div>
<?php $i++; if($i % 6 == 0 || $i == $count): ?>
    </div>
<?php endif; ?>
<?php endforeach; ?>
 </div>
        
    </div>
	
	               <!-----------Рекомендуем------------->
					
 					<div class="recommended_items">
    <!--recommended_items-->
    <h2 class="title text-center">Рекомендуем посмотреть</h2>

   <div id="recommended-item-carousel">
         <div class="owl-carousel slide-two owl-theme">  
            
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
				
				 <?php 
						  $s1 = $hit->tip;
						  						
						  //$s = (string) $s; // преобразуем в строковое значение
						  //$s = strip_tags($s); // убираем HTML-теги
						  $s1 = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
						  $s1 = trim($s); // убираем пробелы в начале и конце строки
						  $s1 = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
						  $s1 = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
						  $s1 = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
						  $s1 = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
						?>
				
                    <div class="productinfo text-center">
                        <?php $imageTitle = $hit->getImage();?>
                         <?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
													 
                                <a href="<?= yii\helpers\Url::to(['avtovodnik/'.$hit->id,'ads' =>'_'.$s1.'_price_'.$hit->price]) ?>">
								<li><?=Html::img($imageTitle->getUrl(''), ['alt' => $avtovodnik -> tip]) ?></li></a>
						                  
						<?php } else { ?> 
																			 
								<a href="<?= yii\helpers\Url::to(['avtovodnik/'.$hit->id,'ads' =>'_'.$s1.'_price_'.$hit->price]) ?>">
								<li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => $avtovodnik -> tip]) ?></li></a>
												 
			              <?php } ?>
                         <h4><?= $hit->tip?></h4> 
                         <h4><p>Тип двигателя: <?= $hit->tip_dvigatel?></p></h4>
                         
                          <h5>Состояние: <?= $hit->sostoyanie?></h5>
                        <h5>Цена: <?= $hit->price?> руб.</h5>
                       
                      
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
							   <?php if ($avtovodnik -> telephone){ ?>
											 <a class="btn btn-warning" href="tel:<?= $avtovodnik -> telephone ?>" target="_blank"> 
											 <?php echo $avtovodnik -> telephone;?> </a>
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
			
    <center><p><h4> Что бы воспользоваться службой сообщений,<br><a href="<?= yii\helpers\Url::to (['/site/signup']) ?>"class="btn btn-default"> Зарегистрируйтесь</a></h4></p></center>

  <hr>

   
</div>
			 
		<?php } else {?>
		
		 
		 <?php $id = Yii::$app->request->get('id'); 
			   $telephone = Yii::$app->user->identity['telephone'];
			    $username = Yii::$app->user->identity['username'];
		 ?>
		
		  <form method="get" action="<?= yii\helpers\Url::to(['/cart/avtovodamessage' ]) ?>"> 
     
    <div>   
    <center>
  <center><p>
            		
             <textarea class="none" readonly="readonly" name="tipp" style="max-width:100px; height:31px" > Водный транспорт </textarea>
			 <textarea class="none" readonly="readonly" name="id" style="width:40px; height:31px" ><?= $id ?> </textarea>
             <textarea class="none" readonly="readonly" name="loginin" style="max-width:150px; height:31px" ><?= $users->username ?> </textarea>
			  <textarea class="none" readonly="readonly" name="telephone" style="max-width:100px; height:31px" ><?= $telephone ?> </textarea>
			  
   </p></center><br>
  
    <p><textarea placeholder = "текст сообщения" style="max-width:430px;height:100px;resize:vertical" maxlength="150" name="komment" id ="kom"></textarea></p>
	
	
 <p> <input class="messag" type = "submit" class="btn btn-warning" value="Отправить" id="message"> </p></center>
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
        autoplayTimeout: 4000,
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
        autoplayHoverPause:true,
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







 

