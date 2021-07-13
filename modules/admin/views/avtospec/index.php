<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Моя Спецтехника';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="avtospec-index">
     
                               <center>
                                   <font face="comic sans ms" >Выберите нужный подраздел </font>
                               </center>
     
        <!--Html::a('Добавить легковые', ['<a href=" \Url::to(['avtoleg/create'])">'], ['class' => 'btn btn-success'])--> 
        <center> 
            
         <a href="<?= Url::to(['avtoleg/index']) ?>" class="btn btn-success">Легковые</a>
         <a href="<?= Url::to(['avtogruz/index']) ?>" class="btn btn-success">Грузовые/Автобусы</a>
         <a href="<?= Url::to(['avtospec/index']) ?>" class="btn btn-danger">Спецтехника</a>
         <a href="<?= Url::to(['avtomoto/index']) ?>" class="btn btn-success">Мототехника</a>
         <a href="<?= Url::to(['avtokomplekt/index']) ?>" class="btn btn-success">Комплектующие и автозапчасти</a>
         <a href="<?= Url::to(['avtovodnik/index']) ?>" class="btn btn-success">Водный транспорт</a>
            
         </center>
    
   
    <hr>

    
<table>
    <center> <h4>Спецтехника: мои объявления</h4></center>

    <p><center>
	<style>
.btn-1success {
    color: #fff;
    background-color: #056705;
    border-color: #ef0e42;
</style>
        <?= Html::a('<i class="fa fa-download"></i> ДОБАВИТЬ ОБЪЯВЛЕНИЕ <i class="fa fa-download"></i>', ['create'], ['class' => 'btn btn-1success']) ?>
    </center></p>
</table>

    <div class="col-sm-12">
	<div class="features_items"><!--features_items-->
						
                                            <?php if (!empty($Avtospec)): ?>
                                            
                                           
                                            
                                            <?php foreach ($Avtospec as $Avtospecs):?>
                                            
                                              <?php
                 $mainImg = $Avtospecs->getImage();
         
                                               ?>
                             
                                            
						<center><div class="col-sm-3">
							<?php if ($Avtospecs->moder == 1) { ?>
							<div class="product-image-admin">
						<?php } else { ?>
						<div class="product-image-admin1">
						<?php } ?>
								<div class="single-Products">
                                                                    
										<div class="productinfo text-center">
                                                                                    
                                       <?php if (!$Avtospecs->moder) { 
									echo '<style="color: red">На модерации</style>';
									}?>
                                                                                   
                                              <?php if ($mainImg['urlAlias']==='placeHolder') { ?>
																			 
											<a href="<?= Url::to(['/admin/avtospec/view', 'id'=>$Avtospecs->id]) ?>"		 
                                                 <li><?=Html::img($mainImg->getUrl(''), ['alt' => '']) ?></li></a>
												                  
																			 <?php } else { ?> 
											<a href="<?= Url::to(['/admin/avtospec/view', 'id'=>$Avtospecs->id]) ?>"								 
												 <li><?=Html::img($mainImg->getUrl('x200'), ['alt' => '']) ?></li></a>
												 
												                             <?php } ?> 
                                                  <h5>ID <?= $Avtospecs->id ?>	</h5>																				 
											
                                                       <h5><?= $Avtospecs -> tip ?>. год: <?= $Avtospecs -> god ?></h5>
                                                          <h5><?= $Avtospecs->price ?> руб.</h5>                        
                             <!--<a href="<?= Url::to(['/admin/avtospec/view', 'id'=>$Avtospecs->id]) ?>" class="btn btn-default">подробнее</a>-->
                             <a href="<?= Url::to(['/admin/avtospec/update', 'id'=>$Avtospecs->id]) ?>" class="btn btn-default">изменить и продать быстрее</a></br>
                         
                             <?php echo Html::a('Удалить', ['/admin/avtospec/delete', 'id'=>$Avtospecs->id], [
                                                           'data' => [
                                                           'method' => 'post',
                                                           'confirm' => 'Вы действительно хотите безвозвратно удалить объявление ?',]
                                                            ]);?>
 
                            
                             
                           
                              
                             <!--                                                                                        <a href="<?= Url::to(['cart/add', 'id'=>$hit->id]) ?>" data-id="<?=$hit->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>-->
										</div>
                                                                    
<!--										<div class="Nedvigkvartiri-overlay">
											<div class="overlay-content">
												<h2>$<?= $hit->price ?></h2>
												<p><?= $hit->name ?></p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>-->
                                                                    <?php if ($Avtospecs->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>
                                                                    
                                                                    <?php if ($Avtospecs->sale):?>
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
						                     <table class="table table-hover table-striped"> 
                                             <tr align="center">
                                                <center><h4>Здесь пока ничего нет. Или объявление находится на модерации </h4></center>
												</tr>
												</table>
                                                 <br><br><br><br>
						<?php endif; ?>

  </div></center>
    
    
    
</div>
</div>
