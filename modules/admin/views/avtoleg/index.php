<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use app\modules\admin\models\Marka;
use app\modules\admin\models\Model;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Мои Легковые автомобили';
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="avtoleg-index">
    
                        <center>
                                   <font face="comic sans ms" >Выберите нужный подраздел </font>
                        </center>
     
        <!--Html::a('Добавить легковые', ['<a href=" \Url::to(['avtoleg/create'])">'], ['class' => 'btn btn-success'])--> 
        <center> 
            
         <a href="<?= Url::to(['avtoleg/index']) ?>" class="btn btn-danger">Легковые</a>
         <a href="<?= Url::to(['avtogruz/index']) ?>" class="btn btn-success">Грузовые/Автобусы</a>
         <a href="<?= Url::to(['avtospec/index']) ?>" class="btn btn-success">Спецтехника</a>
         <a href="<?= Url::to(['avtomoto/index']) ?>" class="btn btn-success">Мототехника</a>
         <a href="<?= Url::to(['avtokomplekt/index']) ?>" class="btn btn-success">Комплектующие и автозапчасти</a>
         <a href="<?= Url::to(['avtovodnik/index']) ?>" class="btn btn-success">Водный транспорт</a>
            
         </center>
     
<hr>


<table>
    <center> <h4> Легковые автомобили: мои объявления </h4> </center>

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
						
                                            <?php if (!empty($Avtoleg)): ?>
                                            
                                           
                                            
                                            <?php foreach ($Avtoleg as $Avtolegs):
                                            
                                              
                             $mainImg = $Avtolegs->getImage();
         
                                              
											   
											   
                              $marka1 = marka::find()->select('mark')
                                ->where(['id' => $Avtolegs->marka])
                                ->one();
                                  foreach($marka1 as $item) {
                                  $Avtolegs->marka = $item;} 
          
		                          if (!$model->model){
		  
	                           }else{
								   $model1 = model::find()->select('name')
                                 ->where(['id' => $Avtolegs->model])
                                 ->one();
                                   foreach($model1 as $item) {
                                $Avtolegs->model = $item;}  
							   }
                                     
        
                                       ?>
                             
                                            
						<center><div class="col-sm-3">
							<?php if ($Avtolegs->moder == 1) { ?>
							<div class="product-image-admin">
						<?php } else { ?>
						<div class="product-image-admin1">
						<?php } ?>
								<div class="single-Products">
                                                                    
										<div class="productinfo text-center">
                                                                                    
                                      <?php if (!$Avtolegs->moder) { 
									echo '<style="color: red">На модерации</style>';
									}?>
                                                                                   
                                               <?php if ($mainImg['urlAlias']==='placeHolder') { ?>
																			 
											<a href="<?= Url::to(['/admin/avtoleg/view', 'id'=>$Avtolegs->id]) ?>"		 
                                                 <li><?=Html::img($mainImg->getUrl(''), ['alt' => '']) ?></li></a>
												                  
																			 <?php } else { ?> 
											<a href="<?= Url::to(['/admin/avtoleg/view', 'id'=>$Avtolegs->id]) ?>"								 
												 <li><?=Html::img($mainImg->getUrl('x200'), ['alt' => '']) ?></li></a>
												 
												                             <?php } ?> 
													<h5> ID <?= $Avtolegs->id ?>	</h5>				 
											<h5><?= $Avtolegs->price ?> руб.</h5>
                                    <h5><?= $Avtolegs -> marka ?> <?= $Avtolegs -> model ?> 
									год: <?= $Avtolegs -> god ?></h5>
                                                                                       
                             <!--<a href="<?= Url::to(['/admin/avtoleg/view', 'id'=>$Avtolegs->id]) ?>" class="btn btn-default">подробнее</a>-->
                             <a href="<?= Url::to(['/admin/avtoleg/update', 'id'=>$Avtolegs->id]) ?>" class="btn btn-default">изменить и продать быстрее</a></br>
                         
                             <?php echo Html::a('Удалить', ['/admin/avtoleg/delete', 'id'=>$Avtolegs->id], [
                                                           'data' => [
                                                           'method' => 'post',
                                                           'confirm' => 'Вы действительно хотите безвозвратно удалить объявление ?',]
                                                            ]);?>
 
                           
     <!--  <a href="<?= Url::to(['cart/add', 'id'=>$hit->id]) ?>" data-id="<?=$hit->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>-->
										</div>
                                                                
                                                                    
								</div>
                                                            
								<div class="choose">
									<ul class="nav nav-pills nav-justified">

									</ul>
								</div>
								 <?php if ($Avtolegs->new):?>
                                               <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                       <?php endif ?>
                                                                    
                                 <?php if ($Avtolegs->sale):?>
                                               <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'sale' ]) ?>
                                        <?php endif ?>
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
