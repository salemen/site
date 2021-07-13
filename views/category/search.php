<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;
use app\assets\AppAsset;
use app\models\Category;
use yii\helpers\Url;
use kartik\depdrop\DepDrop;
use app\modules\admin\models\Oblast;
use app\modules\admin\models\Goroda;
use yii\widgets\LinkPager;
use kartik\select2\Select2; // or kartik\select2\Select2
use yii\web\JsExpression;

AppAsset::register($this);
?>

<?php
 include Yii::$app->basePath.'/payconf.php';
?>


	<section>
		<div class="container" style = "padding-top: 10px">
		
                <div id="brands_products1">  
				<div class="col-sm-3">
									
					
						<!--<h2>Все Категории</h2>
                   	
						<ul class="catalog1 category-products">
 \app\components\MenuWidget::widget(['tpl' => 'menu' ]) 
               </ul>                       
						<a href = "#"></a>	-->
					 
					  <div id="fixed">	
					 	<div id="brands_products1" class="left-sidebar">
					       
							 <center> <h2>поиск по магазину</h2> </center>	
				
        <form method="get" action="<?= Url::to(['category/search']) ?>">
		  <!-----------------Поиск по разделу магазин------------------->
	 <style>
	 .form-control {
    display: block;
    width: 100%!important;
    height: 34px!important;
	 }
	 
		
	small.ttip {
		display:inline-block;
		margin-left:10px;
		border-bottom:2px dashed #AA1428;
		color:#AA1428;
		position:relative;
		}
	small.ttip:hover {
		cursor:pointer;
	}
	small.ttip span {
		display:none;
		}
	small.ttip:hover span {
		display:block;
		z-index:2;
		border:1px solid #AA1428;
		border-radius: 8px;
		color:#000;
		position:absolute;
		max-width:360px;
		min-width:300px;
		top:-2px;
		left:-190px;
		background-color:#FCFBDC;
		padding:10px;
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

      <!-------Живой поиск--------->
<tr>
<td>
 	<?php
	
	         $model_cat = Category::find()->all();
                foreach ($model_cat as $key => $item) {
					$id = $key;
					$model3 = $item;
				}	
				
   $url = Url::toRoute(['/cart/city-list']);
   
	$cityDesc = empty($model3->name) ? '' : Category::findOne($model3->name)->Description;
	
 
echo $form->field($model3, 'name', ['template' => "{label}\n{input}"])->widget(Select2::classname(), [
    'options' => ['multiple'=>true,'placeholder' => 'Можете выбрать несколько категорий'],
    'pluginOptions' => [
        'allowClear' => true,
        'minimumInputLength' => 2,
        'ajax' => [
            'url' => $url,
			'type' =>"GET",
			//'contentType' => 'application/json; charset=utf-8',
            'dataType' => 'json',
            'data' => new JsExpression('function(params) { return {q:params.term}; }'),
        ],
		
        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
        'templateResult' => new JsExpression('function(name) { return name.text; }'),
        'templateSelection' => new JsExpression('function (name) { return name.text; }'),
    ],
])->label('Поиск категории(й) магазина.');?>
 </td>
 </tr>
 
 <!---------------Конец живого поиска-------------------->               
 
             
 
				<tr><td style="padding-left: 10px;">	 <input type="text" style = "height: 30px; width: 200px;" placeholder=" текст поиска" name="p3"/>
				<small class="ttip">что это ?<span><?=$textmag;?></span></small></td></tr>
               <tr><td style="padding-left: 10px;">	 <input type="tel" style = "height: 30px; width: 200px;" placeholder=" макс. цена цифрами" name="p2"/></td></tr>
              
                <tr><td>	<center> <input id="drugie" class="drugie"  type="submit" class="btn btn-warning" name="search" value="ПОИСК"></center></td></tr>
              <?php ActiveForm::end();?>
			  </table></center></form></div>
			     </div>
					
						
					</div>
				</div>
				
				<style>
				
	@media (max-width: 1199px) {			 
		 .product-image-wrapper1{
		border:3px solid #dbdbd9;
		overflow: auto;
		margin-bottom:8px;
		height: 285px;
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
	border:4px solid red;
	overflow: auto;
	margin-bottom:10px;
    height: 285px;
	max-width: 340px;
    border-radius: 8px;		
		
   }
        .single-products1{
	max-height: 400px;
    max-width: 400px;
    margin-bottom: 5px;		
		}
        </style>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
                                            
											<?php $categori = $_GET[Category][name]; 
											if ($categori) {
												foreach ($categori as $name)
												   $category1 = $name;
												   $category2 = Category::find()->where(['id' => $category1])->select('name')->all();
												foreach ($category2 as $name)   
												   $category = $name;
												}
														   
											?>
											
											<?php $page = $_GET[page];
                                                 
											?>
											
                                             <h1 style = "font-size: 16px; 
						             margin-top: 1px; 
									 color: #397F8C; 
									 text-transform: uppercase; 
									 font-weight: 700;
									 font-family: 'Roboto', sans-serif;" class="title text-center">
																						
											<?php if ($categori) {  echo $category->name.'. ';}
											                                                else { echo $p3.'. '; } if($page){echo страница .' '."$page";}?> 
                                            <a href ="<?= Url::to (['cart/magaz']) ?>" class= "showSearchmag">
										               <span class="letter"><img src="/images/nastroika.png" alt="поиск"></span></a>
					                        </h1>
                                             
                                                <?php if (!empty($products)): ?>
                                                <?php foreach ($products as $product): ?>
												<?php if ($product->moder == 1) { ?>
												
								  <?php 
								
								  
								  if($product->oblast_region ==0){         
      
									   }else{$oblast1 = oblast::find()->select('oblast_region')
											->where(['id' => $product->oblast_region])
											->one();
									   foreach($oblast1 as $item) {
									   $product->oblast_region = $item;}}  
								  
								  	if ($product->gorod ==0){         
      
										   }										
										   else {$gorod1 = Goroda::find()->select('name')
										->where(['id' => $product->gorod])
										->one();
										   foreach($gorod1 as $item) {
										   $product->gorod = $item;}}; 
								  
						  $s = $product->name;
						  
						
								  //$s = (string) $s; // преобразуем в строковое значение
								  //$s = strip_tags($s); // убираем HTML-теги
								  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
								  $s = trim($s); // убираем пробелы в начале и конце строки
								  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
								  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
								  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
								  $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
								  
								  
							  $s2 = $product -> category->name;
						  						
						  //$s = (string) $s; // преобразуем в строковое значение
						  //$s = strip_tags($s); // убираем HTML-теги
						  $s2 = preg_replace("/\s+/", ' ', $s2); // удаляем повторяющие пробелы
						  $s2 = trim($s2); // убираем пробелы в начале и конце строки
						  $s2 = function_exists('mb_strtolower') ? mb_strtolower($s2) : strtolower($s2); // переводим строку в нижний регистр (иногда надо задать локаль)
						  $s2 = strtr($s2, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
						  $s2 = preg_replace("/[^0-9a-z-_ ]/i", "", $s2); // очищаем строку от недопустимых символов
						  $s2 = str_replace(" ", "-", $s2); // заменяем пробелы знаком минус	  
						?>					
												
												 <?php $mainImg = $product->getImage();  ?>
						<div class="col-sm-3 animated pulse faster">
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
												 <li><?=Html::img($mainImg->getUrl(''), ['alt' => 'Объявление: '.$product->name.', '.$product->price.'руб. '. $product->oblast_region.' '.$product->gorod]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												 <a href="<?= Url::to(['product/'.$product->id,'ads' =>$s.'_price_'.$product->price]) ?>">
												 <li><?=Html::img($mainImg->getUrl('x200'), ['alt' => 'Объявление: '.$product->name.', '.$product->price.'руб. '. $product->oblast_region.' '.$product->gorod]) ?></li></a>
												 
												                             <?php } ?>
					
                 <strong> <p itemprop="name"><a style="color:#034176" href="<?=Url::to(['category/'.$product ->category-> id,'ads'=>$s2])?>"><?= $product -> category->name ?></strong>
					
					<br> объявление: 
		   <?php if($product->gorod) { 
		       echo г.'. '."$product->gorod";
		   }else{
			   echo "$product->oblast_region";
		   }?> </a> <br>  <?php  
												      $name = $product->name;    
												  $name = mb_strtolower($name);  ?>                     
																<?= $name ?></p>
	   				
					 <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">									
								<h5 itemprop="price" style = "padding-bottom: 5px;">Цена: <?= $formatted_number = number_format($product->price, 0, ',', ' '); ?> руб.</h5>	
								<meta itemprop="priceCurrency" content="RUB">
                        	</div>	
							
                          </div>

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
							</div></center>
						</div>
                                                <?php $i++ ?>
                                                <?php if ($i % 4 == 0):?>
                                                     <div class="clearfix"></div>
                                                
                                                <?php endif; ?>
												 <?php } ?>
                                                <?php endforeach; ?>
                                                <div class="clearfix"></div>
                                                <center><?php 
                                                echo LinkPager::widget([
                                                'pagination' => $pages,
                                                   ]);
                                                 ?>  </center>                                      
						<?php else:?>
						<a href = "#"></a>
						<table class="table table-hover table-striped"> 
						<tr align="center">
                                               <td align="center"> <h4>По запросу: <b><?= $category->name ?></b> ничего не найдено ((</h4></td>
						</tr>						
						</table>
                                                
						<?php endif; ?>
                                                
                                                <div class="clearfix"></div>
                                              
						
					</div><!--features_items-->
					<br> 
					<table class="table table-hover table-striped"> 
       <tr align="center">
		<td align="center"><input class="button" type="button" value="Вернуться назад" onclick="javascript:history.go(-1)" /></td>
	</tr>
   </table>
				</div>
			</div>
		</div>
	</section>
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


