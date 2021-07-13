<?
use yii\helpers\Html;
use app\models\Avtocategory;
use app\models\Avtospec;
use yii\data\Pagination;
use yii\widgets\LinkPager;


?>


 
<section id="advertisement">
		
	</section>
	
	<section>
		<div class="container" style = "padding-top: 10px">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Категории Автотехники</h2>
                                                
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
	border:3px solid #efefeb;
	overflow: auto;
	margin-bottom:10px;
    height: 280px;
	max-width: 400px;	
		
    }
        .single-products1{
	max-height: 400px;
    max-width: 400px;
    margin-bottom: 5px;		
		}
        </style>
                                            
                                            <h2 class="title text-center">Вся спецтехника продавца</h2>
                                                 
												
                                                <?php if (!empty($avtospec)): ?>
												
												
                                                <?php foreach ($avtospec as $avtospecs):?>
												
					                            <?php if ($avtospecs->moder == 1) { ?>
                                                <?php $mainImg = $avtospecs->getImage();  ?>
						<div class="col-sm-3">
						
						<?php 
					  $s = $avtospecs->tip;
											
					  //$s = (string) $s; // преобразуем в строковое значение
					  //$s = strip_tags($s); // убираем HTML-теги
					  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
					  $s = trim($s); // убираем пробелы в начале и конце строки
					  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
					  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
					  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
					  $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус

					  $s1 = $avtospecs->marka;
											
					  //$s = (string) $s; // преобразуем в строковое значение
					  //$s = strip_tags($s); // убираем HTML-теги
					  $s1 = preg_replace("/\s+/", ' ', $s1); // удаляем повторяющие пробелы
					  $s1 = trim($s1); // убираем пробелы в начале и конце строки
					  $s1 = function_exists('mb_strtolower') ? mb_strtolower($s1) : strtolower($s1); // переводим строку в нижний регистр (иногда надо задать локаль)
					  $s1 = strtr($s1, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
					  $s1 = preg_replace("/[^0-9a-z-_ ]/i", "", $s1); // очищаем строку от недопустимых символов
					  $s1 = str_replace(" ", "-", $s1); // заменяем пробелы знаком минус
					  ?>
						
							<div class="product-image-wrapper1">
								<div class="single-products1">
									<div class="productinfo text-center">
									
										 <?php if ($mainImg['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                 <a href="<?= yii\helpers\Url::to(['avtospec/'.$avtospecs->id, 'ads'=>$s.'_'.$s1.'_price_'.$avtospecs->price]) ?>"
												  <li><?=Html::img($mainImg->getUrl(''), ['alt'=> $avtospecs->tip]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												 <a href="<?= yii\helpers\Url::to(['avtospec/'.$avtospecs->id, 'ads'=>$s.'_'.$s1.'_price_'.$avtospecs->price]) ?>"
												  <li><?=Html::img($mainImg->getUrl('335X210'), ['alt'=> $avtospecs->tip]) ?></li></a>
												 
												                             <?php } ?>
										 
				<p><h5><?= $avtospecs -> tip ?></h5></p>
				     <h5>год: <?= $avtospecs -> god ?></h5>
					 <h5>состояние: <?= $avtospecs -> sostoyanie ?></h5>
										<h5>cтоимость: <?= $avtospecs -> price ?> руб.</h5>
										
										
        
									</div>
									
                                                    <?php if ($avtospecs->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>
                                                                    
                                                    <?php if ($avtospecs->sale):?>
                                                                    <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'sale' ]) ?>
                                                                    <?php endif ?>

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
                                                <center><?php 
                                                echo LinkPager::widget([
                                                'pagination' => $pages,
                                                   ]);
                                                 ?> </center>                                       
						<?php else:?>
						<a href = "#"></a>
						<table class="table table-hover table-striped"> 
						<tr align="center">
                                               <td align="center"> <h4>Больше ничего нет</h4></td>
						</tr>						
						</table>
                                                
						<?php endif; ?>
                                                
                       <div class="clearfix"></div>
                                            
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






