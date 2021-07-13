<?
use yii\helpers\Html;
use app\models\Avtocategory;
use app\models\Avtokomplekt;
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
                                            
                                            <h2 class="title text-center">Все комплектующие продавца</h2>
                                                 
												
                                                <?php if (!empty($avtokomplekt)): ?>
												
												
                                                <?php foreach ($avtokomplekt as $avtokomplekts):?>
												
					                             <?php if ($avtokomplekts->moder == 1) { ?>
                                                <?php $mainImg = $avtokomplekts->getImage();  ?>
						<div class="col-sm-3">
							<div class="product-image-wrapper1">
								<div class="single-products1">
									<div class="productinfo text-center">
									
										  <?php if ($mainImg['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                  <a href="<?= yii\helpers\Url::to(['avtokomplekt/'.$avtokomplekts->id]) ?>"
												  <li><?=Html::img($mainImg->getUrl(''), ['alt'=> $avtokomplekts->tip]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												  <a href="<?= yii\helpers\Url::to(['avtokomplekt/'.$avtokomplekts->id]) ?>"
												  <li><?=Html::img($mainImg->getUrl('335X210'), ['alt'=> $avtokomplekts->tip]) ?></li></a>
												 
												                             <?php } ?>
				<p><h5><?= $avtokomplekts -> tip ?></h5></p
					 <h5>состояние: <?= $avtokomplekts -> sostoyanie ?></h5>
										<h5>cтоимость: <?= $avtokomplekts -> price ?> руб.</h5>
		
									</div>
									
                                                    <?php if ($avtokomplekts->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>
                                                                    
                                                    <?php if ($avtokomplekts->sale):?>
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






