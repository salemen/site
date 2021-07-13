<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\models\Nedvigbiznes;
use app\modules\admin\models\Raion;
use app\modules\admin\models\Typebiznes;
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
                                            
                                            <h2 class="title text-center"> другой бизнес продавца </h2>
                                                 
                                             
                                                <?php if (!empty($Nedvigbiznes)): ?>
												
												
                                                <?php foreach ($Nedvigbiznes as $Nedvigbiznes): ?>
												<?php if ($Nedvigbiznes->moder == 1) { ?>
						<?php
						if ($Nedvigbiznes->raion ==0){         
      
	                        }
	             else {$raion1 = raion::find()->select('raion')
                       ->where(['id' => $Nedvigbiznes->raion])->one();
                         foreach($raion1 as $item) {
                       $Nedvigbiznes->raion = $item;}}
					   
                      
                                            ?>
												
                                                <?php $mainImg = $Nedvigbiznes->getImage();  ?>
						<div class="col-sm-3">
							<div class="product-image-wrapper1">
								<div class="single-products1">
									<div class="productinfo text-center">
										 <?php if ($mainImg['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                  <a href="<?= yii\helpers\Url::to(['nedvigbiznes/'.$Nedvigbiznes->id,'ads' =>'biznes_price_'.$Nedvigbiznes->price]) ?>"
												  <li><?=Html::img($mainImg->getUrl(''), ['alt'=> $Nedvigbiznes->gorod]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												 <a href="<?= yii\helpers\Url::to(['nedvigbiznes/'.$Nedvigbiznes->id,'ads' =>'biznes_price_'.$Nedvigbiznes->price]) ?>"
												 <li><?=Html::img($mainImg->getUrl('335X210'), ['alt'=> $Nedvigbiznes->gorod]) ?></li></a>
												 
												                             <?php } ?>
				<p><h5><?= $Nedvigbiznes->operaciya ?>: <?= $Nedvigbiznes->type ?></h5></p>
										<h5>Стоимость: <?= $Nedvigbiznes -> price ?> руб.</h5>

                                                <p><h5>Район: <?= $Nedvigbiznes->raion ?></h5></p> 
         
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






