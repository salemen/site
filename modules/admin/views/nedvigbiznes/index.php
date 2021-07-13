<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Мой Готовый бизнес';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nedvigbiznes-index">


 <center>
                                   <font face="comic sans ms" >Выберите нужный подраздел </font>
                               </center>
        <!--Html::a('Добавить легковые', ['<a href=" \Url::to(['avtoleg/create'])">'], ['class' => 'btn btn-primary'])--> 
        <center> 
            
          <a href="<?= Url::to(['nedvigkvartiri/index']) ?>" class="btn btn-primary">Квартиры</a>
         <a href="<?= Url::to(['nedvigdoma/index']) ?>" class="btn btn-primary">Дома / Коттеджи</a> 
         <a href="<?= Url::to(['nedvigkomnati/index']) ?>" class="btn btn-primary">Комнаты</a>
         <a href="<?= Url::to(['nedvigkommercheska/index']) ?>" class="btn btn-primary">Коммерческая недвижимость</a> 
         <a href="<?= Url::to(['nedvigzemli/index']) ?>" class="btn btn-primary">Земельные участки</a>
         <a href="<?= Url::to(['nedvigbiznes/index']) ?>" class="btn btn-danger">Готовый бизнес</a>		 
         <a href="<?= Url::to(['nedviggaragi/index']) ?>" class="btn btn-primary">Гаражи и машиноместа</a> 
           
         </center>
  
    <hr>

  
    <table>
    <center> <h4>Готовый бизнес: мои объявления</h4></center>

    <p><center>
	<style>
.btn-1primary {
    color: #fff;
    background-color: #105fa3;
    border-color: #ef0e42;
</style>
         <?= Html::a('<i class="fa fa-download"></i> ДОБАВИТЬ ОБЪЯВЛЕНИЕ <i class="fa fa-download"></i>', ['create'], ['class' => 'btn btn-1primary']) ?>
    </center></p>
</table>
   <div class="col-sm-12">
	<div class="features_items"><!--features_items-->
						
                                            <?php if (!empty($Nedvigbiznes)): ?>
                                            
                                           
                                            
                                            <?php foreach ($Nedvigbiznes as $Nedvigbizness):?>
                                            
                                              <?php
											  
                 $mainImg = $Nedvigbizness->getImage();
         
                                               ?>
                             
                                            
						<center><div class="col-sm-3">
							<?php if ($Nedvigbizness->moder == 1) { ?>
							<div class="product-image-admin">
						<?php } else { ?>
						<div class="product-image-admin1">
						<?php } ?>
								<div class="single-Products">
                                                                    
										<div class="productinfo text-center">
                                                                                    
                                       <?php if (!$Nedvigbizness->moder) { 
									echo '<style="color: red">На модерации</style>';
									}?>
                                                                                   
                                              <?php if ($mainImg['urlAlias']==='placeHolder') { ?>
																			 
										 <a href="<?= Url::to(['/admin/nedvigbiznes/view', 'id'=>$Nedvigbizness->id]) ?>"			 
                                                 <li><?=Html::img($mainImg->getUrl(''), ['alt' => '']) ?></li></a>
												                  
																			 <?php } else { ?> 
										 <a href="<?= Url::to(['/admin/nedvigbiznes/view', 'id'=>$Nedvigbizness->id]) ?>"									 
												 <li><?=Html::img($mainImg->getUrl('x200'), ['alt' => '']) ?></li></a>
												 
												                             <?php } ?> 
                                                <h5>ID <?= $Nedvigbizness->id ?>, <?= $Nedvigbizness ->operaciya?></h5>
                                                              <h5>Тип: <?= $Nedvigbizness -> type ?></h5>																			 
											<h5><?= $formatted_number = number_format($Nedvigbizness->price, 0, ',', ' '); ?> руб.</h5>
											
                                                                                       
                            <!-- <a href="<?= Url::to(['/admin/nedvigbiznes/view', 'id'=>$Nedvigbizness->id]) ?>" class="btn btn-default">подробнее</a>-->
                             <a href="<?= Url::to(['/admin/nedvigbiznes/update', 'id'=>$Nedvigbizness->id]) ?>" class="btn btn-default">изменить и продать быстрее</a></br>
                         
                             <?php echo Html::a('Удалить', ['/admin/nedvigbiznes/delete', 'id'=>$Nedvigbizness->id], [
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
                                                                    <?php if ($Nedvigbizness->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>
                                                                    
                                                                    <?php if ($Nedvigbizness->sale):?>
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
                                                <center><h4>Здесь пока ничего нет. Или объявление находится на модерации </h4></center>
                                                 <br><br><br><br>
						<?php endif; ?>

  </div></center>
    
    
    
</div>
</div>
