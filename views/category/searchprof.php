<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\ActiveRecord;
use app\assets\AppAsset;
use app\models\Category;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use kartik\select2\Select2; // or kartik\select2\Select2
use yii\web\JsExpression;

AppAsset::register($this);
?>
<section id="advertisement">
		<!--<div class="container">
			<img src="/images/shop/advertisement.jpg" alt="" />
		</div> -->
	</section>
	
	<section>
		<div class="container" style = "padding-top: 10px">
		
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar" style="padding-left: 5px;">
					
					
					 <div id="brands_products1">  
						<h2>Все Категории</h2>
					</div>	
                                
                  
								
						<ul class="catalog1 category-products">
<?= \app\components\MenuWidget::widget(['tpl' => 'menu' ]) ?>
</ul>
                                                
						<a href = "#"></a>	
					 
					 <div class="brands_products">
					   					  
							<div class="brands-name">
							<h2>Популярное на сайте</h2>
								<ul class="nav nav-pills nav-stacked">
									<li><a href="https://salemen.ru/nedvigcategory/view?id=2"> <span class="pull-right">(🏠)</span>Дома, Коттеджи</a></li>
									 <li><a href="https://www.salemen.ru/nedvigcategory/view?id=5"> <span class="pull-right">(🌎)</span>Земельные участки</a></li>
									<li><a href="https://www.salemen.ru/nedvigcategory/view?id=1"> <span class="pull-right">(🌇)</span>Квартиры</a></li>
									<li><a href="https://www.salemen.ru/avtocategory/view?id=1"> <span class="pull-right">(🚗)</span>Легковые Авто</a></li>
									<li><a href="https://salemen.ru/category/76"> <span class="pull-right">(🎩)</span>Юристы</a></li>
									<li><a href="https://salemen.ru/admin"> <span class="pull-right">(✏️)</span>Подать свое объявление</a></li>
								</ul>
							</div>
						</div>
					
					</div>
				</div>
				
				<style>
        .product-image-wrapper1{
	border:3px solid #efefeb;
	overflow: auto;
	margin-bottom:5px;
    height: 264px;
	max-width: 300px;	
		
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
											
                                            <h2 class="title text-center"> другие объявления в этом разделе</h2>
                                             
                                                <?php if (!empty($products)): ?>
                                                <?php foreach ($products as $product): ?>
												<?php if ($product->moder == 1) { ?>
												
												
										  <?php 
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
												
												 <?php $mainImg = $product->getImage();  ?>
						<div class="col-sm-3">
							<center><div class="product-image-wrapper1">
								<div class="single-products1">
									<div class="productinfo text-center">
									<?php if ($mainImg['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                 <a href="<?= yii\helpers\Url::to(['product/'.$product->id,'ads' =>$s.'_price_'.$product->price]) ?>">
												 <li><?=Html::img($mainImg->getUrl(''), ['alt' => $product->name]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												 <a href="<?= yii\helpers\Url::to(['product/'.$product->id,'ads' =>$s.'_price_'.$product->price]) ?>">
												 <li><?=Html::img($mainImg->getUrl('x200'), ['alt' => $product->name]) ?></li></a>
												 
												                             <?php } ?>
										
										<h5>Цена: <?= $formatted_number = number_format($product->price, 0, ',', ' '); ?> руб.</h5>
										
			
						<p><a href ="<?= yii\helpers\Url::to(['product/'.$product->id,'ads' =>$s.'_price_'.$product->price])  ?>"><?= $product->name ?></a></p>
                                 

									</div>

                                                    <?php if ($product->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>
                                                                    
                                                    <?php if ($product->sale):?>
                                                                    <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'sale' ]) ?>
                                                                    <?php endif ?>
																	
																	

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
                                                <?php 
                                                echo LinkPager::widget([
                                                'pagination' => $pages,
                                                   ]);
                                                 ?>                                        
						<?php else:?>
						<a href = "#"></a>
						<table class="table table-hover table-striped"> 
						<tr align="center">
                                               <td align="center"> <h4>К сожалению больше ничего нет</h4></td>
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




