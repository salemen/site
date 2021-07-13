<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\models\Nedvigkommercheska;
use app\modules\admin\models\Raion;
?>




<section id="advertisement">
		
	</section>
	
	<section>
		<div class="container" style = "padding-top: 10px">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Категории недвижимости</h2>
                                                
						<ul class="catalog1 category-products">
<?= \app\components\MenuWidgetned::widget(['tpl' => 'menuned' ]) ?>
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
	margin-bottom:5px;
    height: max-content;
	max-width: 400px;	
		
}
        .single-products1{
	max-height: 400px;
    max-width: 400px;
    margin-bottom: 5px;		
		}
        </style>
                                            
                                            <h2 class="title text-center"> еще коммерческая продавца </h2>
                                            
                                                <?php if (!empty($nedvigkomm)): ?>
												
												
                                                <?php foreach ($nedvigkomm as $nedvigkomms): ?>
												
						                        <?php if ($nedvigkomms->moder == 1) { ?>
												
                                                <?php $mainImg = $nedvigkomms->getImage();  ?>
												
												 <?php $zem = $nedvigkomms->type_nedvigimosty;
											   
											   if ($zem === "Офисное"){
												   $zem = "ofisnaya";
											   }elseif($zem === "Производственное"){
												   $zem = "proizvodsvennoe";
											   }elseif($zem == "Свободного типа"){
												   $zem = "svobodnogo_tipa";
											   }elseif($zem === "Торговое"){
												   $zem = "torgovoe";
											   }elseif($zem === "Гостиничное"){
												   $zem = "gostinichnie";
											   }elseif($zem === "Складское"){
												   $zem = "sklad";
											   }elseif($zem == "Гаражного типа"){
												   $zem = "garagnogo_tipa";
											   }?>
												
						<div class="col-sm-3">
							<div class="product-image-wrapper1">
								<div class="single-products1">
									<div class="productinfo text-center">
										 <?php if ($mainImg['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                <a href="<?= yii\helpers\Url::to(['nedvigkommercheska/'.$nedvigkomms->id,'ads' =>$zem.'_kommerch_nedvigimost_'.$nedvigkomms->plochad.'m.kv._price_'.$nedvigkomms->price]) ?>"
												<li><?=Html::img($mainImg->getUrl(''), ['alt' => $nedvigkomms-> type_nedvigimosty]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												 <a href="<?= yii\helpers\Url::to(['nedvigkommercheska/'.$nedvigkomms->id,'ads' =>$zem.'_kommerch_nedvigimost_'.$nedvigkomms->plochad.'m.kv._price_'.$nedvigkomms->price]) ?>"
												 <li><?=Html::img($mainImg->getUrl('335X210'), ['alt' => $nedvigkomms-> type_nedvigimosty]) ?></li></a>
												 
												                             <?php } ?>
				<p><h5><?= $nedvigkomms->operaciya ?></h5> 
				<h5>Тип: <?= $nedvigkomms->type_nedvigimosty ?></h5></p>
										<h5>Стоимость: <?= $formatted_number = number_format($nedvigkomms->price, 0, ',', ' '); ?> руб.</h5>
										
										
                                                <p><h5>Площадь: <?= $nedvigkomms->plochad ?> м.кв.</h5></p> 
                        
									</div>
									
                                                    <?php if ($product->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>
                                                                    
                                                    <?php if ($product->sale):?>
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






