<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\models\NedvigDoma;
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
    height: max-content;;
	max-width: 400px;	
		
}
        .single-products1{
	max-height: 400px;
    max-width: 400px;
    margin-bottom: 5px;		
		}
        </style>
                                            
                                            <h2 class="title text-center"> Другие дома/коттеджи продавца </h2>
                                                 
                                                <?php if (!empty($doma)): ?>
												
												
                                                <?php foreach ($doma as $domas): ?>
												<?php if ($domas->moder == 1) { ?>
					                     <?php
						if ($domas->raion ==0){         
      
	                        }
	             else {$raion1 = raion::find()->select('raion')
                       ->where(['id' => $domas->raion])->one();
                         foreach($raion1 as $item) {
                       $domas->raion = $item;}}
					   
                      
                                            ?>
                                                <?php $mainImg = $domas->getImage();  ?>
						<div class="col-sm-3">
							<div class="product-image-wrapper1">
								<div class="single-products1">
									<div class="productinfo text-center">
										 <?php if ($mainImg['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                  <a href="<?= yii\helpers\Url::to(['nedvigdoma/'.$domas->id,'ads' =>'dom_plochad_'.$domas->plochad_doma.'_uchastok_'.$domas->plochad_uchastka.'_sot_price_'.$domas->price]) ?>"
												  <li><?=Html::img($mainImg->getUrl(''), ['alt' => $gdomas -> vid_obiekta]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												 <a href="<?= yii\helpers\Url::to(['nedvigdoma/'.$domas->id,'ads' =>'dom_plochad_'.$domas->plochad_doma.'_uchastok_'.$domas->plochad_uchastka.'_sot_price_'.$domas->price]) ?>"
												 <li><?=Html::img($mainImg->getUrl('335X210'), ['alt' => $domas -> vid_obiekta]) ?></li></a>
												 
												                             <?php } ?>
				<h5>Продается <?= $domas->vid_obiekta ?></h5>
				район: <?= $domas->raion ?>
										<h5><b>Стоимость: </b><?= $formatted_number = number_format($domas->price, 0, ',', ' '); ?> руб.</h5>
										
										
                                                <h5><b>Площадь: </b><?= $domas->plochad_doma ?> м.кв</h5>
          
									</div>
                                                   
								</div>
								 <?php if ($domas->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>
                                                                    
                                                    <?php if ($domas->sale):?>
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
                                                 ?></center>                                        
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






