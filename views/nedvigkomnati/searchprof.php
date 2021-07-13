<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\models\Nedvigkomnati;
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
    height: 275px;
	max-width: 400px;	
		
}
        .single-products1{
	max-height: 400px;
    max-width: 400px;
    margin-bottom: 5px;		
		}
        </style>
                                            
                                            <h2 class="title text-center"> Другие комнаты продавца </h2>
                                                 
                                            
                                        
                                             
                                                <?php if (!empty($komnati)): ?>
												
												
                                                <?php foreach ($komnati as $komnatis): ?>
												<?php if ($komnatis->moder == 1) { ?>
						<?php
						if (!$komnatis->raion){         
      
	                        }
	             else {$raion1 = raion::find()->select('raion')
                       ->where(['id' => $komnatis->raion])->one();
                         foreach($raion1 as $item) {
                       $komnatis->raion = $item;}}
					   
                      
                                            ?>
												
                                                <?php $mainImg = $komnatis->getImage();  ?>
						<div class="col-sm-3">
							<div class="product-image-wrapper1">
								<div class="single-products1">
									<div class="productinfo text-center">
										  <?php if ($mainImg['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                  <a href="<?= yii\helpers\Url::to(['nedvigkomnati/'.$komnatis->id,'ads' =>'komnata_plochad_'.$komnatis->plochad.'m.kv._price_'.$komnatis->price]) ?>" 
												  <li><?=Html::img($mainImg->getUrl(''), ['alt' => $komnatis ->operaciya]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												  <a href="<?= yii\helpers\Url::to(['nedvigkomnati/'.$komnatis->id,'ads' =>'komnata_plochad_'.$komnatis->plochad.'m.kv._price_'.$komnatis->price]) ?>" 
												  <li><?=Html::img($mainImg->getUrl('335X210'), ['alt' => $komnatis ->operaciya]) ?></li></a>
												 
												                             <?php } ?>
				<p><h5><?= $komnatis->operaciya ?> комнаты</h5></p>
										<h5>Стоимость <?= $formatted_number = number_format($komnatis->price, 0, ',', ' '); ?> руб.</h5>
										
										
                                                <p><h5>Район: <?= $komnatis->raion ?></h5></p> 
                                         <p><h5>Площадь: <?= $komnatis->plochad ?> м.кв.</h5></p>
		
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
                                               <td align="center"> <h4>Других комнат нет</h4></td>
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






