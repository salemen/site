<?
use yii\helpers\Html;
use app\models\Avtocategory;
use app\models\Avtoleg;
use yii\data\Pagination;
use yii\widgets\LinkPager;
use app\modules\admin\models\Marka;
use app\modules\admin\models\Model;

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
                                            
                                            <h2 class="title text-center"> Все авто продавца</h2>
                                                 
												
                                                <?php if (!empty($avtoleg1)){ ?>
												
												
                                                <?php foreach ($avtoleg1 as $avtolegs):
                                                  if ($avtolegs->moder == 1) { 
												  
                                                 $marka = marka::find()->select('mark')
                                                  ->where(['id' => $avtolegs -> marka])->one();
                                                  foreach($marka as $item) {
                                                   $avtolegs -> marka = $item;}      
       
                                                   if ($avtolegs -> model ==0){         
      
	                                                    }
	                                                else {$model = model::find()->select('name')
                                                    ->where(['id' => $avtolegs -> model])->one();
                                                    foreach($model as $item) {
                                                    $avtolegs -> model = $item;}};
													
												?>
												
					
                                                <?php $mainImg = $avtolegs->getImage();  ?>
						<div class="col-sm-3">
							<div class="product-image-wrapper1">
								<div class="single-products1">
									<div class="productinfo text-center">
									
										 <?php if ($mainImg['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                   <a href="<?= yii\helpers\Url::to(['avtoleg/'.$avtolegs->id]) ?>"
												  <li><?=Html::img($mainImg->getUrl(''), ['alt'=> $avtolegs->marka]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												  <a href="<?= yii\helpers\Url::to(['avtoleg/'.$avtolegs->id]) ?>"
												  <li><?=Html::img($mainImg->getUrl('335X210'), ['alt'=> $avtolegs->marka]) ?></li></a>
												 
												                             <?php } ?>
				<p><h5><?= $avtolegs -> marka ?> <?= $avtolegs -> model ?></h5></p>
				     <h5>год: <?= $avtolegs -> god ?></h5>
					 <h5>состояние: <?= $avtolegs -> sostoyanie ?></h5>
										<h5>cтоимость: <?= $avtolegs -> price ?> руб.</h5>
			
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
                                                 ?></center>                                        
						<?php } else {?>
						<a href = "#"></a>
						<table class="table table-hover table-striped"> 
						<tr align="center">
                                               <td align="center"> <h4>Больше ничего нет</h4></td>
						</tr>						
						</table>
                                                
						<?php } ?>
                                                
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






