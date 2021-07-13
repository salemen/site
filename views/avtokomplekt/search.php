<?
use yii\helpers\Html;
use app\assets\AppAsset;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\models\Category;
use app\models\Avtocategory;
use app\models\Avtokomplekt;
use yii\data\Pagination;
use yii\widgets\LinkPager;
use kartik\select2\Select2; // or kartik\select2\Select2
use yii\web\JsExpression;

AppAsset::register($this);

?>


 
<section id="advertisement">
		
	</section>
	
	<section>
		<div class="container" style = "padding-top: 10px">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Категории Автотехника</h2>
						
                                                
						<ul class="catalog1 category-products">
<?= \app\components\MenuWidgetavto::widget(['tpl' => 'menuavto' ]) ?>
</ul>
<a href = "#"></a>	
                                               
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
                                            
                                           <style>
         .product-image-wrapper1{
	border:3px solid #e2e2de!important;
	overflow: auto;
	margin-bottom:10px;
    height: max-content;
	max-width: 320px;	
		
}

       .product-image-wrapper11{
	border:4px solid red;
	overflow: auto;
	margin-bottom:10px;
    height: max-content;
	max-width: 340px;
    border-radius: 8px;			
		
}
      
        </style>
                                            
                                            <h2 class="title text-center"> Расширенный поиск комплектующих
											 <a href ="<?= yii\helpers\Url::to (['cart/avtokomplekt']) ?>" class= "showSearchkomplekt">
											 <span class="letter"><img src="/images/nastroika.png" alt="поиск"></span></a>	
											</h2>
                                                 
												
                                                <?php if (!empty($avtokomplekt)): ?>
												
												
                                                <?php foreach ($avtokomplekt as $avtokomplekts):?>
												
					                             <?php if ($avtokomplekts->moder == 1) { ?>
                                                <?php $mainImg = $avtokomplekts->getImage();  ?>
						<div class="col-sm-3 animated pulse faster">
							<center><?php if(!empty($avtokomplekts->videl)){ ?> 
						<div class="product-image-wrapper11">
						<?php } else { ?> 
							<div class="product-image-wrapper1">
						<?php } ?>
								<div class="single-products1">
								
								<?php 
					  $s = $avtokomplekts->name;
											
					  //$s = (string) $s; // преобразуем в строковое значение
					  //$s = strip_tags($s); // убираем HTML-теги
					  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
					  $s = trim($s); // убираем пробелы в начале и конце строки
					  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
					  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
					  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
					  $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
				      ?>
								
									<div class="productinfo text-center">
									
										
										  <?php if ($mainImg['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                  <a href="<?= yii\helpers\Url::to(['avtokomplekt/'.$avtokomplekts->id, 'ads'=>$s.'_price_'.$avtokomplekts->price]) ?>">
												  <li><?=Html::img($mainImg->getUrl(''), ['alt'=> $avtokomplekts->tip]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												  <a href="<?= yii\helpers\Url::to(['avtokomplekt/'.$avtokomplekts->id, 'ads'=>$s.'_price_'.$avtokomplekts->price]) ?>">
												  <li><?=Html::img($mainImg->getUrl('335X210'), ['alt'=> $avtokomplekts->tip]) ?></li></a>
												 
												                             <?php } ?>
										 
										 
				<p><h5><?= $avtokomplekts -> name ?></h5></p>
					 <h5><b>состояние: </b><?= $avtokomplekts -> sostoyanie ?></h5>
										<h5><b>цена:</b> <?= $avtokomplekts -> price ?> <b>руб.</b></h5>
		
									</div>
									
                                                    <?php if ($avtokomplekts->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>
                                                                    
                                                    <?php if ($avtokomplekts->sale):?>
                                                                    <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'sale' ]) ?>
                                                                    <?php endif ?>
																	
								 <div class="btn-podrob">
									 <ul class="nav navbar-nav collapse navbar-collapse">        
							   <li class="dropdown"><img class="animate1" src="/images/podrobno5.png" alt="">		    			 
							     <ul role="menu" class="sub-menu1">
							
                        <li> КРАТКОЕ ОПИСАНИЕ:<hr><?= mb_substr($avtokomplekts->opisanie, 0, 150);  ?></li>
							
							     </ul>
							   </li>				
								</ul>
								      </div>

                             <div id="brands_products2">
									  <div class="btn-podrob">
									<small class="podrob"><img class="animate1" src="/images/podrobno5.png" alt="">
									<span>КРАТКОЕ ОПИСАНИЕ:<hr><?= mb_substr($avtokomplekts->opisanie, 0, 230);  ?><br>
									 <a href="tel:<?= $avtokomplekts -> telephone ?>" target="_blank" class="btn btn-default1"> позвонить</a>
									 <a href="<?= yii\helpers\Url::to(['avtokomplekt/'.$avtokomplekts->id, 'ads'=>$s.'_price_'.$avtokomplekts->price]) ?>" class="btn btn-default1">подробнее</a>
									
									</span></small>
									 </div>
									</div>										  

								</div>
								
							</div>
						</div>
                                                <?php $i++ ?>
                                                <?php if ($i % 4 == 0):?>
                                                     <div class="clearfix"></div>
                                                
                                                <?php endif; ?>
												 <?php } ?>
                                                <?php endforeach; ?>
                                                <div class="clearfix"></div>
                                               <center> <?php 
                                                echo LinkPager::widget([
                                                'pagination' => $pages,
                                                   ]);
                                                 ?>  </center>                                      
						<?php else:?>
						<a href = "#"></a>
						<table class="table table-hover table-striped"> 
						<tr align="center">
                                               <td align="center"> <h4>К сожалению по Вашему запросу ничего не найдено ((</h4></td>
						</tr>						
						</table>
                                                
						<?php endif; ?>
                                                
                       <div class="clearfix"></div>
                             </center>               
					</div><!--features_items-->
					
					<table class="table table-hover table-striped"> 
       <tr align="center">
		<td align="center"><input class="button" type="button" value="Вернуться назад" onclick="javascript:history.go(-1)" /></td>
	</tr>
   </table>
				</div>
			</div>
		</div>
	</section>






