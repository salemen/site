<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\models\Nedvigzemli;
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
    /* height: 275px; */
	max-width: 400px;	
		
}
        .single-products1{
	max-height: 400px;
    max-width: 400px;
    margin-bottom: 5px;		
		}
        </style>
                                            
                                            <h2 class="title text-center"> Другие земельные участки продавца</h2>
                                                 
                                            
                                        
                                             
                                                <?php if (!empty($nedvigzemli)): ?>
												
												
                                                <?php foreach ($nedvigzemli as $nedvigzemlis): ?>
												<?php if ($nedvigzemlis->moder == 1) { ?>
												
												<?php $zem2 = $nedvigzemlis -> typ_uchastka;
											   
											   if ($zem2 === "ИЖС"){
												   $zem2 = "igs";
											   }elseif($zem2 === "Промназначения"){
												   $zem2 = "promn";
											   }elseif($zem2 === "Сельхозназначения"){
												   $zem2 = "selhoz";
											   }elseif($zem2 === "Гостиничное"){
												   $zem2 = "gostinichnie";
											   }elseif($zem2 === "Дачный/СНТ"){
												   $zem2 = "dachni_snt";
											   } ?>
						<?php
						if (!$nedvigzemlis->raion){         
                         
	                        }
	             else {$raion1 = raion::find()->select('raion')
                       ->where(['id' => $nedvigzemlis->raion])->one();
                         foreach($raion1 as $item) {
                       $nedvigzemlis->raion = $item;}}
					   
                      
                                            ?>
												
                                                <?php $mainImg = $nedvigzemlis->getImage();  ?>
						<div class="col-sm-3">
							<div class="product-image-wrapper1">
								<div class="single-products1">
									<div class="productinfo text-center">
										 <?php if ($mainImg['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                  <a href="<?= yii\helpers\Url::to(['nedvigzemli/'.$nedvigzemlis->id,'ads' =>'uchastok_'.$zem2.'_plochad_'.$nedvigzemlis->plochad_uchastka.'sot._price_'.$nedvigzemlis->price]) ?>"
												  <li><?=Html::img($mainImg->getUrl(''), ['alt' => 'Участок '.$nedvigzemlis->typ_uchastka]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												  <a href="<?= yii\helpers\Url::to(['nedvigzemli/'.$nedvigzemlis->id,'ads' =>'uchastok_'.$zem2.'_plochad_'.$nedvigzemlis->plochad_uchastka.'sot._price_'.$nedvigzemlis->price]) ?>"
												  <li><?=Html::img($mainImg->getUrl('335X200'), ['alt' => 'Участок '.$nedvigzemlis->typ_uchastka]) ?></li></a>
												 
												                             <?php } ?>
				<p><h5>Участок: <?= $nedvigzemlis->typ_uchastka ?></h5></p>
      				<p><h5><?= $nedvigzemlis ->plochad_uchastka ?> сот.</h5></p>
										<h5>Стоимость: <?= $formatted_number = number_format($nedvigzemlis->price, 0, ',', ' '); ?> руб.</h5>
										
										
                                                <p><h5>Район: <?= $nedvigzemlis->raion ?></h5></p> 
        
									</div>
									
                                                    

								</div>
								<?php if ($nedvigzemlis->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>
                                                                    
                                                    <?php if ($nedvigzemlis->sale):?>
                                                                    <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'sale' ]) ?>
                                                                    <?php endif ?>
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






