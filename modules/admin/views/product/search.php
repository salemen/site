<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\grid\GridView;
use yii\helpers\Url;
use app\assets\AppAsset;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\bootstrap\Dropdown;
use app\models\Category;
use app\models\Product;


AppAsset::register($this);




/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Поиск объявлений';
$this->params['breadcrumbs'][] = $this->title;
?>


<style>
.btn-1warning {
    color: #fff;
    background-color: #105fa3;
    border-color: #ef0e42;
}
</style>
  
<div class="product-search">

    <table>
	<?php if (!empty($product)){ ?>	 
    <center>  <h4>Вот что мы нашли</h4></center>
   <?php } else { ?>  
   <br> <?php } ?>
	
   <center><p>     	
	<a onclick="return showAdminproduct()" ><i class="btn btn-warning" >
	<i class="fa fa-search"></i> Найти другое </i></a>
	</p></center>
  		  
	
</table>
  

    <div class="col-sm-12">
	<div class="features_items"><!--features_items-->
						
                                            <?php if (!empty($product)): ?>
                                                                                       
                                            <?php foreach ($product as $products):?>
                                                                                          
                                            <?php $mainImg = $products->getImage(); ?>       
                                               
                                            
						<center><div class="col-sm-3">
							<?php if ($products->moder == 1) { ?>
							<div class="product-image-admin">
						<?php } else { ?>
						<div class="product-image-admin1">
						<?php } ?>
								<div class="single-products">
                                                                    
										<div class="productinfo text-center">
                                                                                    
                                       <?php if (!$products->moder) { 
									echo '<style="color: red">На модерации</style>';
									}?>
                                                                                   
                                                 <?php if ($mainImg['urlAlias']==='placeHolder') { ?>
																			 
											 <a href="<?= yii\helpers\Url::to(['/admin/product/view', 'id'=>$products->id]) ?>"	 
                                                 <li><?=Html::img($mainImg->getUrl(''), ['alt' => '']) ?></li></a>
												                  
																			 <?php } else { ?> 
											 <a href="<?= yii\helpers\Url::to(['/admin/product/view', 'id'=>$products->id]) ?>"								 
												 <li><?=Html::img($mainImg->getUrl('x200'), ['alt' => '']) ?></li></a>
												 
												                             <?php } ?> 
                                                  <h5> ID <?= $products->id ?></h5>																			 
											<h5><?= $formatted_number = number_format($products->price, 0, ',', ' '); ?> руб.</h5>
											
                                                                                      <!-- <p><a href="<?=yii\helpers\Url::to(['category/view','id'=> $products ->category-> id])?>"></a></p>-->
																					   <p><?= $products -> category->name ?></p>
                                                                                       
				<!-- <a href="<?= yii\helpers\Url::to(['/admin/product/view', 'id'=>$products->id]) ?>" class="btn btn-warning">подробнее</a></br>-->
				 <a href="<?= yii\helpers\Url::to(['/admin/product/update', 'id'=>$products->id]) ?>" class="btn btn-warning">изменить и продать быстрее</a></br>
			  <!--<a onclick="return showMany()" class="btn btn-success"> <i class="fa fa-file-text-o"></i></a>-->
                            
							<?php echo Html::a('Удалить', ['/admin/product/delete', 'id'=>$products->id], [
                                                           'data' => [
                                                           'method' => 'post',
                                                           'confirm' => 'Вы действительно хотите безвозвратно удалить объявление ?',]
                                                            ]);?>
 
                            
                             
                           
                              
        <!--<a href="<?= yii\helpers\Url::to(['cart/add', 'id'=>$hit->id]) ?>" data-id="<?=$hit->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>-->
										</div>
                                                                    
<!--										<div class="product-overlay">
											<div class="overlay-content">
												<h2>$<?= $hit->price ?></h2>
												<p><?= $hit->name ?></p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>-->
                                                                    <?php if ($products->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>
                                                                    
                                                                    <?php if ($products->sale):?>
                                                                    <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'sale' ]) ?>
                                                                    <?php endif ?>
                                                                    
								</div>
                                                            
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
<!--										<li><a href="#"><i class="fa fa-plus-square"></i>Добавить в избранное</a></li>-->
<!--										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>-->
									</ul>
								</div>
							</div>
						</div>
						
						 <?php $i++ ?>
                                                <?php if ($i % 4 == 0):?>
                                                     <div class="clearfix"></div>
                                                
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                                <div class="clearfix"></div>
                                                <?php 
                                                echo LinkPager::widget([
                                                'pagination' => $pages,
                                                   ]);
                                                 ?>                                        
						<?php else:?>
                                                 <center><h4>Объявлений по заданному поиску не найдено</h4></center>
                                                 <br><br><br><br>
						<?php endif; ?>

  </div></center>
    
    
    
</div>
</div>

	</div>				   
					      <!-------------Поиск другого товара------------->
					
					<?
         
         \yii\bootstrap\Modal::begin ([
             'header'=> '<h4>поиск моих объявлений</h4>',
             'id'=> 'adminproduct',
			 //'clientOptions' => ['show' => true],
             'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
			 
               
         ]);?>

				
        <form method="get" action="<?= yii\helpers\Url::to(['product/search']) ?>">
	
	         <?php $form = ActiveForm::begin(); ?>
	
              
                                                     
	 <center><table class="table table-hover table-striped">
 

	 <tr><td>	 
		<label>Категория</label>
               
<select id="product-category_id" class="form-control" name="Product[category_id]">
   
     <?= \app\components\MenuWidget::widget (['tpl'=> 'select_product', 'model' => $model])?>

</select></td></tr> 
                
                <!--<input type="text" placeholder="мин стоимость" name="p1"/><br><hr>-->
             <tr><td><input type="tel" style = "height: 30px; width: 200px;" placeholder="id объявления" name="p2"/></td></tr>
              
                <tr><td> <input type="submit" class="btn btn-warning" name="search" value="ПОИСК"></td></tr>
              <?php ActiveForm::end();?>
			  </table></center></form>
			  
       
					   <?
		  \yii\bootstrap\Modal::end();
         
         ?>
