<?php
 

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\assets\AppAsset;
use yii\widgets\LinkPager;
use app\models\Category;
use kartik\depdrop\DepDrop;
use app\modules\admin\models\Oblast;
use app\modules\admin\models\Goroda;
use yii\helpers\Url;


AppAsset::register($this);
?>

<?php
 include Yii::$app->basePath.'/payconf.php';
?>

	
	 <style>
       @media (max-width: 1199px) {			 
		 .product-image-wrapper1{
		border:3px solid #dbdbd9;
		overflow: auto;
		margin-bottom:8px;
		height: 278px;
		max-width: 330px;
		border-radius: 8px;	
		 }	
   }		

		@media (min-width: 1200px) {	
        .product-image-wrapper1{
	border:3px solid #dbdbd9;
	overflow: auto;
	margin-bottom:10px;
    height: 303px;
	max-width: 330px;
    border-radius: 8px;	
		
   }
		}
   
    .product-image-wrapper5{
	border:3px solid red;
	overflow: auto;
	margin-bottom:10px;
    max-height: 270px;
	max-width: 400px;
    border-radius: 8px;		
		
   }

        .single-products1{
	max-height: 400px;
    max-width: 400px;
    margin-bottom: 5px;	
		}
        </style>
	
	<section>
		<div class="container" style="padding-top: 7px">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar" style="padding-left: 5px;">
					
					 <div id="brands_products1">  
						<h2>Все Категории</h2>
                      </div>       
                            
						 <div id="brands_products1">	 
						<ul class="catalog1 category-products">
            <?= \app\components\MenuWidget::widget(['tpl' => 'menu' ]) ?>

						</ul>
						
                <a href = "#"></a>
				    <div id="fixed">	
				
				        <center> <h2>поиск по магазину</h2> </center>	
				
        <form method="get" action="<?= Url::to(['category/search']) ?>">
		  <!-----------------Поиск по разделу магазин------------------->
	 <style>
	 .form-control {
    display: block;
    width: 100%!important;
    height: 34px!important;
	 }
	 
	
	
	</style>
	
	         <?php $form = ActiveForm::begin(); ?>
	
               <?php
                $model_obl = oblast::findAll([23,43,60,69]);
                foreach ($model_obl as $key => $item) {
					$model1 = $item;
				}				
                  $oblast1 = oblast::findAll([23,43,60,69]);
                foreach($oblast1 as $key => $item) {
                $id=$key;
				$oblast_region=$item; }
                $oblast = ArrayHelper::map($oblast1, 'id','oblast_region');
                $id_gorod1 = Goroda::find()->all();
                $id_gorod = ArrayHelper::map($id_gorod1, 'id','name');
               ?>
             					
		
                                                     
	 <center><table class="table table-hover">

 <tr>
 <td>
   <?php 
     echo $form->field($model1, 'oblast_region', ['template' => "{label}\n{input}"])
	 ->dropDownList($oblast,['id'=>'id_oblast','prompt' => '-Выберите регион-'])->label('Регион поиска');
   ?></td></tr>
   <?php
   
  /*  $id_gorod1 = Goroda::find()->select(['id','name'])->indexBy('name')->all();
         foreach ($id_gorod1 as $name=>$value){
          $id_gorod=$value;
         $gorod=$name;
       } */
	      $model_gor = Goroda::find()->all();
                foreach ($model_gor as $key => $item) {
					$id = $key;
					$model2 = $item;
				}	 
         
   ?>
   
   <tr> <td>
   <?php 
// Child # 1
echo $form->field($model2, 'name', ['template' => "{label}\n{input}"])->widget(DepDrop::classname(), [
   
    'options'=>['id'=>'id_gorod'],
    'pluginOptions'=>[
       
        'depends'=>['id_oblast'],
        'placeholder'=>'-Можете выбрать город-',
        'url'=>Url::to(['/site/gorod'])
    ]
])->label('Город');
?>
</td></tr>

             
 
				<tr><td style="padding-left: 10px;">	 <input type="text" style = "height: 30px; width: 200px;" placeholder=" текст поиска" name="p3"/>
				<small class="ttip">что это ?<span><?=$textmag;?></span></small></td></tr>
               <tr><td style="padding-left: 10px;">	 <input type="tel" style = "height: 30px; width: 200px;" placeholder=" макс. цена цифрами" name="p2"/></td></tr>
              
                <tr><td>	<center> <input id="drugie" class="drugie"  type="submit" class="btn btn-warning" name="search" value="ПОИСК"></center></td></tr>
              <?php ActiveForm::end();?>
			  </table></center></form>
							
					</div>
						</div>
						
						 <div id="brands_products2">
					
						<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						
						<div class="carousel-inner">
							<div class="item active">
								 <center><div style ="padding-bottom: 5px;">					
						
									<a href ="<?= Url::to (['nedvigcategory/2','ads'=>'doma-cottage']) ?>"> <span><img class="animate1" src="/images/dom.png" alt="дом"></span></a>
									 <a href="<?= Url::to (['nedvigcategory/14','ads'=>'vse-uchastki']) ?>"> <span><img class="animate1" src="/images/zemli.png" alt="участок"></span></a>
									<a href="<?= Url::to (['nedvigcategory/8','ads'=>'vse-kvartiri']) ?>">  <span><img class="animate1" src="/images/kvartira.png" alt="квартира"></span></a>
									<a href="<?= Url::to (['avtocategory/1','ads'=>'legkovie-avto']) ?>"> <span><img class="animate1" src="/images/avto.png" alt="легковой"></span></a>
									<!--<a href="https://salemen.ru/category/76"> <span><img class="animate1" src="/images/sud.png" alt="юристы"></span></a>&nbsp; -->
									<a href="<?= Url::to (['category/53','ads'=>'vakansii-rabota']) ?>"> <span><img class="animate1" src="/images/rabota.png" alt="работа"></span></a>
									<a href="https://salemen.ru/admin"> <span><img class="animate1" src="/images/lk.png" alt="ЛК"></span></a>
							
					</div></center>
							</div>
							<div class="item">
								 <center><div style ="padding-bottom: 5px;">
					
						
									<a href="<?= Url::to (['avtocategory/3','ads'=>'spec-tehnika']) ?>"> <span><img class="animate1" src="/images/bulldozer.png" alt="спецтехника"></span></a>
									<a href="<?= Url::to (['nedvigcategory/4','ads'=>'vsy-kommercheskaya']) ?>"> <span><img class="animate1" src="/images/shop.png" alt="коммерческая"></span></a>
									<a href="<?= Url::to (['nedvigcategory/3','ads'=>'komnati']) ?>"> <span><img class="animate1" src="/images/komnata.png" alt="комнаты"></span></a>
									<a href="<?= Url::to (['avtocategory/2','ads'=>'gruzovie-avto']) ?>"> <span><img class="animate1" src="/images/gruzovik.png" alt="грузовой"></span></a>
									<a href="<?= Url::to (['category/76','ads'=>'delovye-uslugi-yuristy']) ?>"> <span><img class="animate1" src="/images/sud.png" alt="юристы"></span></a>
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
                            
                           <?php
//                             $mainImg = $product->getImage();
//                             $gallery = $product->getImages();
                             
                             ?>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
                        <?php $page = $_GET[page]; ?>                    
						<h1 class="title text-center">Объявления: <?= $category->name.'. '; ?> <?php if($page){echo страница .' '."$page";}?> 
						 <a href ="<?= Url::to (['cart/magaz']) ?>" class= "showSearchmag">
										      <span class="letter"><img src="/images/nastroika.png" alt="поиск"></span></a>
						</h1>
                                                
                                                <?php if (!empty($products)): ?>
                                                <?php foreach ($products as $product): ?>
												
												 <?php 
												 
									 if ($product->oblast_region ==0){         
      
									   }else{$oblast1 = oblast::find()->select('oblast_region')
										->where(['id' => $product->oblast_region])
										->one();
									   foreach($oblast1 as $item) {
									   $product->oblast_region = $item;}} 					 
												 
									 if ($product->gorod ==0){         
      
									   }else{$gorod1 = Goroda::find()->select('name')
										->where(['id' => $product->gorod])
										->one();
									   foreach($gorod1 as $item) {
									   $product->gorod = $item;}} 			 
												 
						          $s = $product->name;
						  
						
								  //$s = (string) $s; // преобразуем в строковое значение
								  //$s = strip_tags($s); // убираем HTML-теги
								  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
								  $s = trim($s); // убираем пробелы в начале и конце строки
								  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
								  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
								  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
								  $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
						         ?>		
												
                                                   <?php $mainImg = $product->getImage();?>
						<div class="col-sm-3">
							<center><?php if(!empty($product->videl)){ ?> 
						<div class="product-image-wrapper5">
						<?php } else { ?> 
							<div class="product-image-wrapper1">
						<?php } ?>
						<div itemscope itemtype="http://schema.org/Product">
								<div class="single-products1">
									<div class="productinfo text-center">
									
                                                                            
                                                            <?php if ($mainImg['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                  <a href="<?= Url::to(['product/'.$product->id,'ads' =>$s.'_price_'.$product->price]) ?>">
												  <li><?=Html::img($mainImg->getUrl(''), ['alt' =>'Объявление: '.$product->name.', '.$product->price.'руб. '. $product->oblast_region.' '.$product->gorod ]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												  <a href="<?= Url::to(['product/'.$product->id,'ads' =>$s.'_price_'.$product->price]) ?>">
												  <li><?=Html::img($mainImg->getUrl('x200'), ['alt' =>'Объявление: '.$product->name.', '.$product->price.'руб. '. $product->oblast_region.' '.$product->gorod]) ?></li></a>
												 
												                             <?php } ?>                 
                                       
					<p itemprop="name"> <strong><a style="color:#034176" href ="<?= Url::to(['product/'.$product->id,'ads' =>$s.'_price_'.$product->price])  ?>">
										
										  <?php 
												        $name = $product->name;
												        $name = mb_strtolower($name);  ?>  
										                 Объявления: <?= $name ?></strong><br><?= $product->gorod ?></a></p>
														 
                                      <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">	               
										<h5 itemprop="price">цена: <?= $formatted_number = number_format($product->price, 0, ',', ' '); ?> руб.</h5>
										  <meta itemprop="priceCurrency" content="RUB">  
								       </div> 
                                                                                
<!--								<a href="#" data-id = "<?= $product->id ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>-->
									</div>
<!--									<div class="product-overlay">
										<div class="overlay-content">
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>-->
                                                    <?php if ($product->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>

                                                    
                                                                    
                                                    <?php if ($product->sale):?>
                                                                    <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'sale' ]) ?>
                                                                    <?php endif ?>
																	
													<p><a href ="<?= Url::to (['/cart/add', 'id'=> $product->id]) ?>" data-id = "<?= $product->id?>"
                          class="btn-iz add-to-cart"><img class="animate1" src="/images/iz.png" alt=""></span></a></p>	

                           <div class="btn-podrob">
									 <ul class="nav navbar-nav collapse navbar-collapse">        
							   <li class="dropdown"><img class="animate1" src="/images/podrobno5.png" alt="">		    			 
							     <ul role="menu" class="sub-menu1">
							
                        <li itemprop="description"> КРАТКОЕ ОПИСАНИЕ:<hr><?= mb_substr($product->content, 0, 150);  ?><br>
									  <a href="<?= Url::to(['product/'.$product->id,'ads' =>$s.'_price_'.$product->price]) ?>" class="btn btn-default1">подробнее о объявлении</a>
							
							     </ul>
							   </li>				
								</ul>
								      </div>
									  
									<div id="brands_products2">
									  <div class="btn-podrob">
									<small class="podrob"><img class="animate1" src="/images/podrobno5.png" alt="">
									<span>КРАТКОЕ ОПИСАНИЕ:<hr><?= mb_substr($product->content, 0, 230);  ?><br>
									  <a href="<?= Url::to(['product/'.$product->id,'ads' =>$s.'_price_'.$product->price]) ?>" class="btn btn-default1">подробнее о объявлении</a>
									 <a href="tel:<?= $product -> telephone ?>" target="_blank" class="btn btn-default1"> позвонить</a>
									 
									</span>								
									</small>
									 </div>
									</div>								  

								</div>
                                </div>                          
										
							</div>
						</div>
                                                <?php $i++ ?>
                                                <?php if ($i % 4 == 0):?>
                                                     <div class="clearfix"></div>
                                                
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                                <div class="clearfix"></div>
                                                <center><?php 
                                                echo LinkPager::widget([
                                                'pagination' => $pages,
                                                   ]);
                                                 ?>  </center>                                      
						<?php else:?>
						<a href = "#"></a>
						<table>
                                                <center><h4>В категории <b><?= $category->name ?></b>, пока ничего нет. <br>
											<a href= "<?= Url::to (['/admin']) ?>" <i class="fa fa-plus-square"></i> Подать объявление в категории</a>.</h4></center>
                             </table>                   
						<?php endif; ?>
                                                
                                                <div class="clearfix"></div>
                                                
<!--						<ul class="pagination">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">&raquo;</a></li>
						</ul>-->
					</center></div><!--features_items-->
				</div>
			</div>
		</div>
            
       </div>     
	</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>




