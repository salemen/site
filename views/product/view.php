
<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;
use app\models\Product;
use app\models\User;
use app\modules\admin\models\Oblast;
use app\modules\admin\models\Goroda;

AppAsset::register($this);

?>

<?php
if ($product->oblast_region ==0){         
      
	   }else{
$oblast1 = Oblast::find()->select('oblast_region')
    ->where(['id' => $product->oblast_region])
    ->one();
       foreach($oblast1 as $item) {
	   $product->oblast_region = $item;} }

 if ($product->gorod ==0){         
      
	   }
	   else{$gorod1 = Goroda::find()->select('name')
    ->where(['id' => $product->gorod])
    ->one();
       foreach($gorod1 as $item) {
	   $product->gorod = $item;}} 


    $titles = $product -> name ;
	if ($product->gorod){  
	 $titles2 = $product->gorod;
	} else{
		$titles2 = $product->oblast_region;}
		
		

$this->title = 'Объявление, '."$titles" .'... '. "$titles2".', цена '.$product->price.' руб.'.', id'. $product->id;
$this->params['breadcrumbs'][] = $this->title;
$title2 =  '..'."$titles";
$title3 = $product->content;
?>

 

<section>

	<link rel="stylesheet" href="/owl-carousel/css/owl.carousel.css">
		<link rel="stylesheet" href="/owl-carousel/css/owl.theme.green.css">
		<!-- <link rel="stylesheet" href="/css/anim.css"/> -->
		
		
		
		
		<div class="container" style="padding-top: 10px">
			<div class="row">
				<div class="col-sm-3">
					
						
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
						 
						
		               </style>
						 						
                		
							<div class="brands-name left-sidebar"  id="brands_products1">
							<div id="fixed">
							<h2>Популярное на сайте</h2>
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
									<li><a href="https://salemen.ru/admin"> <span class="pull-right">(✏️)</span>Подать объявление</a></li>
								
								</ul>
							
							<center><a onclick="return showSearchsearch()" ><i class="btn btn-warning" style= "margin-top: 5px; background-color: #f7d9ae" >
	                           <i class="fa fa-search"></i> Расширенный Поиск</i></a></center>
							   </div>
						</div>
					
				</div>
				
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
				       
                            <?php
                             $mainImg = $product->getImage();
                             $gallery = $product->getImages();
                             
                             ?>
                            
				<?php if ($product->moder == 1){?>
				<div itemscope itemtype="http://schema.org/Product">
					<div class="product-details animated fadeInDown faster"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								
						 <div id="similar-product" class="owl-carousel slide-one owl-theme ">
                                                     
                      <?php $count = count ($gallery); $i=0; foreach ($gallery as $mainImg):?>
					    <?php if($i % 1===0):?>         
                                                     
                                <center><div class="item <?php if($i==0) echo 'active'?>">
                                    
                                                  <?php endif; ?>   
                              <?php if ($mainImg['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                 <li><?=Html::img($mainImg->getUrl(''), ['alt' => $this->title]) ?></li>
												                  
																			 <?php } else { ?> 
																			 
												 <li><?=Html::img($mainImg->getUrl('350X270'), ['alt' => $this->title] )?></li>
												 
												                             <?php } ?>
                                                            <?php $i++; if($i % 1===0 || $i==$count): ?>   
										</div></center>
                                                     <?php endif; ?>
						<?php endforeach;?>
                          	
							</div>
					
										</div>
										
										
						                   <!--////////////////////Яндекс карта/////////////////////-->
										   
										  <center> <a onclick="return showMaps()" ><i class="btn btn-default" 
	                              style= "margin-left: 10px; margin-top: 8px; margin-bottom: 8px;" ><i class="fa fa-flag"></i> Открыть карту</i></a></center>
										   
										 
										          <!------------Конец Яндекс карты------------>
								
						               </div>
							
						<div class="col-sm-7">
						
						<?php $s2 = $product -> category->name;
						  						
						  //$s = (string) $s; // преобразуем в строковое значение
						  //$s = strip_tags($s); // убираем HTML-теги
						  $s2 = preg_replace("/\s+/", ' ', $s2); // удаляем повторяющие пробелы
						  $s2 = trim($s2); // убираем пробелы в начале и конце строки
						  $s2 = function_exists('mb_strtolower') ? mb_strtolower($s2) : strtolower($s2); // переводим строку в нижний регистр (иногда надо задать локаль)
						  $s2 = strtr($s2, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
						  $s2 = preg_replace("/[^0-9a-z-_ ]/i", "", $s2); // очищаем строку от недопустимых символов
						  $s2 = str_replace(" ", "-", $s2); // заменяем пробелы знаком минус
						?>
							<div class="product-information"><!--/product-information-->
<!--								<img src="/images/product-details/new.jpg" class="newarrival" alt="" />-->
                                                            
                                                            
								<center><p><h1 itemprop="name"><?= $product -> category->name.' '.$title2.' '.$product->price.' руб.'?><?php if ($product->gorod){
									echo ', г.'."$product->gorod".'. ';
								}else{
									echo '.. '."$product->oblast_region".'. ';
								}?><span style = "font-size: 14px";> id <?= $product -> id ?></span></h1></center>
								
								<p><a href ="<?= Url::to (['cart/add', 'id'=> $product->id]) ?>" data-id = "<?= $product->id?>"
                          class="btn btn-warning1 add-to-cart"><i style="color:#337ab7">добавить в избранное</i></a></p>
																
								<span>
								    <p><?= $product->oblast_region?>, <?= $product -> gorod ?></p>
								
								  <p><b>Категория объявлений:</b> <a href="<?= Url::to(['category/'.$product ->category -> id, 'ads'=>$s2])?>">
		                           <?= $product -> category->name ?></a></p>
								   
							<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
					<p itemprop="price"><strong>цена: </strong><?= $formatted_number = number_format($product->price, 0, ',', ' '); ?> <strong>руб.</strong></p>
                			<meta itemprop="priceCurrency" content="RUB">
							</div>
                                </span>
																
								<hr>
																
        <div id = "sticky">
		    <a onclick="return showTel()" class="btn btn-default1"> <i class="fa fa-phone"></i> Позвонить</i></a>
		    <a onclick="return showMessage()" class="btn btn-default1"> <i class="fa fa-comments-o"></i> Написать</i></a>
		    <a onclick="return showUsers()" class="btn btn-default1"> <i class="fa fa-file-text-o"></i> Профиль продавца</i></a>
		</div>	
                                                                   <hr>
																    <p><b>Объявление:  <?= $product->name ?> ..</b> </p>
																 
			
				 <h2 itemprop="description" style = "font-size: 15px; font-weight: 500; color: #696763; margin-bottom: 5px; line-height: 1.2em"> 
				  <?= $product->content; ?></h2>
							</div><!--/product-information-->
                                <?php if ($product->new):?>
                                              <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'newarrival' ]) ?>
                                 <?php endif ?>
                                                                    
                              <?php if ($product->sale):?>
                                              <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'salearrival' ]) ?>
                               <?php endif ?>                              
						</div>
					</div>
					</div>
                    <?php } else { ?>
					<center>
					<br><br>
					<table>
					<td>
					 <b>Ничего нет или объявления находятся на модерации</b>
					 </td>
					</table><br></center>
					<?php } ?>
				            
                      
					<style>
		.productinfo img {
			margin-top: 1px !important;	
			}
			
		.item {
			padding-left: 1px;
			padding-right: 1px;
			}

		@media (max-width: 1199px) {			 
		 .product-image-wrapper2{
			border:3px solid #daddfb;
			overflow: auto;
			margin-bottom:10px;
			height: 219px!important;
			max-width: 300px;
			border-radius: 8px;		
				
		   }
	    }
			
		@media (min-width: 1200px) {				
		.product-image-wrapper2{
			border:3px solid #daddfb;
			overflow: auto;
			margin-bottom:10px;
			height: 205px!important;
			max-width: 300px;
			border-radius: 8px;		
				
		   }
		}

		.product-image-wrapper22{
			border:3px solid red;
			background: aquamarine;
			overflow: auto;
			margin-bottom:10px;
			height: 225px;
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

      
	    .btn-warning {
			margin-bottom: 2px !important;

			   }	
		
		.h4{
			margin-bottom: 5px;
			margin-top: 5px;
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
              
					   $username = $product -> username;
					    $tel = $product -> telephone;
						
					   
					   $users1 = user::find()->where(['like', 'username', $username])->andWhere(['telephone' => $tel])->all();
					   foreach($users1 as $users) 
                        
					  $mainImg = $users->getImage(); 
                       						
					   ?>
					   
					    <div class="col-sm-12">
						 
							
								<div class="single-products">
                                 <form method="get" action="<?= Url::to(['category/searchprof']) ?>">                       
										<div class="productinfo text-center">
                                        
								   <br>
								             <?php if ($mainImg['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                 <li><?=Html::img($mainImg->getUrl(''), ['alt' => '']) ?></li>
												                  
																			 <?php } else { ?> 
																			 
												 <li><?=Html::img($mainImg->getUrl('x200'), ['alt' => '']) ?></li>
												 
												                             <?php } ?> 
								   
                                           <p><strong>Дата регистрации:</strong> <?php if ($users -> date){
											 echo $users -> date;}
											 else {echo "нет";} ?></p>
                                              
                                             <p><strong>Имя:</strong> <?php if ($users -> name){
											 echo $users -> name;}
											 else {echo "нет";} ?></p>											  
										 
											 <p><strong>Телефон:</strong> <?php if ($users -> telephone){ ?>
											 <a href="tel:<?= $users -> telephone ?>" target="_blank"> 
											 <?php echo $users -> telephone;?> </a>
					                         <?php } else {echo "нет";} ?> </p>
											 
											 <p><strong>Город:</strong> <?php if ($users -> gorod){
											 echo $users -> gorod;}
											 else {echo "нет";} ?></p>
											 
											 <p><strong>Адрес:</strong> <?php if ($users -> adress){
											 echo $users -> adress;}
											 else {echo "нет";} ?></p>
											 
											 <p><strong>Описание профиля:</strong> <?php if ($users -> opisanie){
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
					
					$idd = $product -> id;
					$priceup = $product -> price;
					$tip = $product ->category_id;
					$oblast1 = $product -> oblast_region;
					$oblast = oblast::find()->select('id')->where(['like','oblast_region',$oblast1])->indexBy('id');
					round ($priceup);
					$proc = 30;
					$proc = $priceup/100*$proc;
					$recultup = $proc + $priceup;
					$recultdown = $priceup - $proc;
					round ($recultup);
					round ($recultdown);
					
					  $pox = Product::find()->where(['between', 'price', $recultdown, $recultup])->andWhere(['not in', 'id', ["$idd"]])
					  ->andWhere(['category_id' => $tip])->andWhere(['moder' => 1])->andWhere(['oblast_region' => $oblast])->limit(8)->orderBy('RAND()')->all();
					
					  ?>
					  
					  <?php if ($pox) {?>
					  
					   <div id="similar-product" class="carousel slide" data-ride="carousel">
					  
					  <h2 class="title text-center" style="padding-top: 5px;">похожие объявления</h2> 
					  
					 
        <div class="carousel-inner"> 
					  
					 <?php $count = count($pox); $i = 0; foreach($pox as $poxs): ?>
					 
					<?php if ($poxs->oblast_region ==0){         
      
						   }else{$oblast1 = oblast::find()->select('oblast_region')
							->where(['id' => $poxs->oblast_region])
							->one();
						   foreach($oblast1 as $item) {
						   $poxs->oblast_region = $item;}} 					 
									 
						 if ($poxs->gorod ==0){         

						   }else{$gorod1 = Goroda::find()->select('name')
							->where(['id' => $poxs->gorod])
							->one();
						   foreach($gorod1 as $item) {
						   $poxs->gorod = $item;}} 
						   ?>
					 
<?php if($i % 8 == 0): ?>
    <div class="item <?php if($i == 0) echo 'active' ?>">
<?php endif; ?>

    <?php 
	  $s = $poxs->name;

	  //$s = (string) $s; // преобразуем в строковое значение
	  //$s = strip_tags($s); // убираем HTML-теги
	  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
	  $s = trim($s); // убираем пробелы в начале и конце строки
	  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
	  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
	  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
	  $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
	
	$s2 = $poxs -> category->name;
						  						
	  //$s = (string) $s; // преобразуем в строковое значение
	  //$s = strip_tags($s); // убираем HTML-теги
	  $s2 = preg_replace("/\s+/", ' ', $s2); // удаляем повторяющие пробелы
	  $s2 = trim($s2); // убираем пробелы в начале и конце строки
	  $s2 = function_exists('mb_strtolower') ? mb_strtolower($s2) : strtolower($s2); // переводим строку в нижний регистр (иногда надо задать локаль)
	  $s2 = strtr($s2, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
	  $s2 = preg_replace("/[^0-9a-z-_ ]/i", "", $s2); // очищаем строку от недопустимых символов
	  $s2 = str_replace(" ", "-", $s2); // заменяем пробелы знаком минус
	?>	 

        <div class="col-sm-2">
            <center>
			<?php if(!empty($poxs->videl)){ ?> 
						<div class="product-image-wrapper22">
						<?php } else { ?> 
							<div class="product-image-wrapper2">
						<?php } ?>
                <div class="single-products2">
                    <div class="productinfo1 text-center">
					
					 <?php $mainImg1 = $poxs->getImage();
					 if ($mainImg1['urlAlias']==='placeHolder') { ?>
																			 

                                      <a href="<?= Url::to(['product/'.$poxs->id,'ads' =>$s.'_price_'.$poxs->price]) ?>">
									  <li><?=Html::img($mainImg1->getUrl(''), ['alt' => 'Объявление: '.$poxs->name.', '.$poxs->price.'руб. '. $poxs->oblast_region.' '.$poxs->gorod]) ?></li></a>
												                  
											 <?php } else { ?> 
																			 
									 <a href="<?= Url::to(['product/'.$poxs->id,'ads' =>$s.'_price_'.$poxs->price]) ?>">
									 <li><?=Html::img($mainImg1->getUrl('350X270'), ['alt' => 'Объявление: '.$poxs->name.', '.$poxs->price.'руб. '. $poxs->oblast_region.' '.$poxs->gorod]) ?></li></a>
												 
						                          <?php } ?>
                        
          <h5 style ="margin-top: 5px;
				      margin-bottom: 7px;"> <a href="<?= Url::to(['category/'.$poxs ->category -> id, 'ads'=>$s2])?>"><?= $poxs -> category->name ?></a></h5>
							
                        <h5>цена: <?= $formatted_number = number_format($poxs->price, 0, ',', ' ');?> руб.</h5>
		                         <?php  
									  $name = $poxs->name;    
								      $name = mb_strtolower($name);  ?>                     
																
                                <h5> <?= $name ?> </h5>
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
		  <?php /* if (!$oblast||$oblast===0||$oblast==0){ */
              $hits = Product::find()->where(['rekom'=>'1'])->andWhere(['moder' => 1])->orderBy('RAND()')->limit(24)->all();
			 /*  }else {$hits = Product::find()->where(['rekom'=>'1'])->andWhere(['moder' => 1])->andWhere(['oblast_region' => $oblast])
			  ->orderBy('RAND()')->limit(16)->all();} */ ?>
<?php $count = count($hits); $i = 0; foreach($hits as $hit): ?>

<?php if ($hit->oblast_region ==0){         
      
		   }else{$oblast1 = oblast::find()->select('oblast_region')
			->where(['id' => $hit->oblast_region])
			->one();
		   foreach($oblast1 as $item) {
		   $hit->oblast_region = $item;}} 					 
					 
		 if ($hit->gorod ==0){         

		   }else{$gorod1 = Goroda::find()->select('name')
			->where(['id' => $hit->gorod])
			->one();
		   foreach($gorod1 as $item) {
		   $hit->gorod = $item;}} 
	  ?>

<?php if($i % 4 == 0): ?>
    <div class="item <?php if($i == 0) echo 'active' ?>">
<?php endif; ?>
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
	  
	  
	$s3 = $hit -> category->name;
						  						
	  //$s = (string) $s; // преобразуем в строковое значение
	  //$s = strip_tags($s); // убираем HTML-теги
	  $s3 = preg_replace("/\s+/", ' ', $s3); // удаляем повторяющие пробелы
	  $s3 = trim($s3); // убираем пробелы в начале и конце строки
	  $s3 = function_exists('mb_strtolower') ? mb_strtolower($s3) : strtolower($s3); // переводим строку в нижний регистр (иногда надо задать локаль)
	  $s3 = strtr($s3, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
	  $s3 = preg_replace("/[^0-9a-z-_ ]/i", "", $s3); // очищаем строку от недопустимых символов
	  $s3 = str_replace(" ", "-", $s3); // заменяем пробелы знаком минус	  
	 ?>	
        <div class="col-sm-3">
            <?php if(!empty($hit->videl)){ ?> 
						<div class="product-image-wrapper11">
						<?php } else { ?> 
							<div class="product-image-wrapper1">
						<?php } ?>
                <div class="single-products1">
                    <div class="productinfo text-center">
					  <?php $mainImg = $hit->getImage();  ?>
                        <?php if ($mainImg['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                  <a href="<?= Url::to(['product/'.$hit->id,'ads' =>$s.'_price_'.$hit->price]) ?>">
												  <li><?=Html::img($mainImg->getUrl(''), ['alt' => 'Объявление: '.$hit->name.', '.$hit->price.'руб. '. $hit->oblast_region.' '.$hit->gorod]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												  <a href="<?= Url::to(['product/'.$hit->id,'ads' =>$s.'_price_'.$hit->price]) ?>">
												  <li><?=Html::img($mainImg->getUrl('x200'), ['alt' => 'Объявление: '.$hit->name.', '.$hit->price.'руб. '. $hit->oblast_region.' '.$hit->gorod]) ?></li></a>
												 
												                             <?php } ?>
                        
                         <p><b>Категория объявления:</b><br> <a href="<?= Url::to(['category/'.$hit ->category-> id, 'ads'=>$s3])?>"><?= $hit -> category->name ?></a></p>
                         <p><?= $formatted_number = number_format($hit->price, 0, ',', ' '); ?> р.</p>
                        
						<?php $category1 = $hit -> category->name; ?>
						
						  <p><?= $hit->name?></p>
<!--                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>-->
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
		<?php if (!$product->declat AND !$product->declong) {?>
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
				//jQuery('input#declat').value(ttt1);
				//$('input[name=owncoords]').hide();
			}
			
			
				myMap = new ymaps.Map("mapp", {
					<?php if ($product->declat AND $product->declong) { ?>
					center: [<?php echo $product->declat;?>,<?php echo $product->declong;?>],
					<?php } else { ?>
					center: [45.04484,38.97603],
					<?php } ?>
					zoom: 16
					
				}, {
					balloonMaxWidth: 200
					
				});
				myCollection = new ymaps.GeoObjectCollection();
				
				<?php if ($product->declat AND $product->declong) { ?>
				var myPlacemark = new ymaps.Placemark([<?php echo $product->declat;?>,<?php echo $product->declong;?>],{
					iconContent:'&#10004;'
				},{
             // Задаем стиль метки (метка в виде круга).
              preset: 'islands#redStretchyIcon',
             // Задаем цвет метки (в формате RGB).
             // iconColor: 
                });
				myCollection.add(myPlacemark);
				myMap.geoObjects.add(myCollection);
				<?php } ?>
          
		       
				myMap.events.add('click', function (e) {
					if (!myMap.balloon.isOpen()) {
						var coords = e.get('coords');
						crdss(coords[0].toPrecision(6), coords[1].toPrecision(6));
						myCollection.removeAll();
						var myPlacemark = new ymaps.Placemark([coords[0].toPrecision(6),coords[1].toPrecision(6)]);
						myCollection.add(myPlacemark);
						myMap.geoObjects.add(myCollection);
					}
					else {
						myMap.balloon.close();
					}
				});

				myMap.events.add('contextmenu', function (e) {
					myMap.hint.open(e.get('coords'), 'Нажмите левой кнопкой мыши');
				});
				/*
				myMap.events.add('balloonopen', function (e) {
					myMap.hint.close();
				});*/
			
			
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
							   <?php if ($product -> telephone){ ?>
											 <a class="btn btn-warning" href="tel:<?= $product -> telephone ?>" target="_blank"> 
											 <?php echo $product -> telephone;?> </a>
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
			    $username = Yii::$app->user->identity['username'];
		 ?>
		
		  <form method="get" action="<?= Url::to(['/cart/prodmessage' ]) ?>"> 
     
    <div>   
    <center>
  <center><p>
            		
             <textarea class="none" readonly="readonly" name="tipp" style="max-width:100px; height:31px" ><?= $product -> category->name ?> </textarea>
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
		autoHeight:true,
		items:1,
		margin:10,
		touchDrag:true,		
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