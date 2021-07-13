<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use app\modules\admin\models\Raion;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Моя Коммерческая недвижимость';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nedvig-kommercheska-index">
    
                              <center>
                                   <font face="comic sans ms" >Выберите нужный подраздел </font>
                               </center>
     
        <!--Html::a('Добавить легковые', ['<a href=" \Url::to(['avtoleg/create'])">'], ['class' => 'btn btn-primary'])--> 
        <center> 
            
          <a href="<?= Url::to(['nedvigkvartiri/index']) ?>" class="btn btn-primary">Квартиры</a>
         <a href="<?= Url::to(['nedvigdoma/index']) ?>" class="btn btn-primary">Дома / Коттеджи</a> 
         <a href="<?= Url::to(['nedvigkomnati/index']) ?>" class="btn btn-primary">Комнаты</a>
         <a href="<?= Url::to(['nedvigkommercheska/index']) ?>" class="btn btn-danger">Коммерческая недвижимость</a> 
         <a href="<?= Url::to(['nedvigzemli/index']) ?>" class="btn btn-primary">Земельные участки</a>
         <a href="<?= Url::to(['nedvigbiznes/index']) ?>" class="btn btn-primary">Готовый бизнес</a> 		 
         <a href="<?= Url::to(['nedviggaragi/index']) ?>" class="btn btn-primary">Гаражи и машиноместа</a> 
         
            
         </center>
    
   
    <hr>
	
	
    

    <table>
    <center>  <h4>Коммерческая: мои объявления</h4></center>

    <center><p>
	<style>
.btn-1primary {
    color: #fff;
    background-color: #105fa3;
    border-color: #ef0e42;
</style>
        <?= Html::a('<i class="fa fa-download"></i> ДОБАВИТЬ ОБЪЯВЛЕНИЕ <i class="fa fa-download"></i>', ['create'], ['class' => 'btn btn-1primary']) ?>
    <?php if (!empty($Nedvigkommercheska)){ ?>		
	<a onclick="return showAdminkomm()" ><i class="btn btn-1primary" >
	<i class="fa fa-search"></i> </i></a>
<?php } ?>
	</p></center>
	
</table>
    <div class="col-sm-12">
	<div class="features_items"><!--features_items-->
						
                                            <?php if (!empty($Nedvigkommercheska)): ?>
                                            
                                           
                                            
                                            <?php foreach ($Nedvigkommercheska as $Nedvigkommercheskas):?>
                                            
                                              <?php
                 $mainImg = $Nedvigkommercheskas->getImage();
          if ($Nedvigkommercheskas->raion ==0){         
      
	   }
	   else {$raion1 = Raion::find()->select('raion')
       ->where(['id' => $Nedvigkommercheskas->raion])
       ->one();
       foreach($raion1 as $item) {
       $Nedvigkommercheskas->raion = $item;}};
                                               ?>
                             
                                            
						<center><div class="col-sm-3">
							<?php if ($Nedvigkommercheskas->moder == 1) { ?>
							<div class="product-image-admin">
						<?php } else { ?>
						<div class="product-image-admin1">
						<?php } ?>
								<div class="single-Products">
                                                                    
										<div class="productinfo text-center">
                                                                                    
                                      
                                                <?php if (!$Nedvigkommercheskas->moder) { 
									echo '<style="color: red">На модерации</style>';
									}?>                                   
                                                                                   
                                               <?php if ($mainImg['urlAlias']==='placeHolder') { ?>
																			 
											<a href="<?= Url::to(['/admin/nedvigkommercheska/view', 'id'=>$Nedvigkommercheskas->id]) ?>"		 
                                                 <li><?=Html::img($mainImg->getUrl(''), ['alt' => '']) ?></li></a>
												                  
																			 <?php } else { ?> 
											<a href="<?= Url::to(['/admin/nedvigkommercheska/view', 'id'=>$Nedvigkommercheskas->id]) ?>"								 
												 <li><?=Html::img($mainImg->getUrl('x200'), ['alt' => '']) ?></li></a>
												 
												                             <?php } ?>
                                            <h5>ID <?= $Nedvigkommercheskas->id ?>, р-он <?= $Nedvigkommercheskas->raion ?></h5>																				 
											<h5><?=$formatted_number = number_format($Nedvigkommercheskas->price, 0, ',', ' '); ?> руб.</h5>
                                                              <h5> <?= $Nedvigkommercheskas -> operaciya ?></h5>
                                                                                       
                             <!--<a href="<?= Url::to(['/admin/nedvigkommercheska/view', 'id'=>$Nedvigkommercheskas->id]) ?>" class="btn btn-default">подробнее</a>-->
                             <a href="<?= Url::to(['/admin/nedvigkommercheska/update', 'id'=>$Nedvigkommercheskas->id]) ?>" class="btn btn-default">изменить и продать быстрее</a></br>
                         
                             <?php echo Html::a('Удалить', ['/admin/nedvigkommercheska/delete', 'id'=>$Nedvigkommercheskas->id], [
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
                                                                    <?php if ($Nedvigkommercheskas->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>
                                                                    
                                                                    <?php if ($Nedvigkommercheskas->sale):?>
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

        <!-------------Поиск Коммерческой------------->
					
					<?
         
         \yii\bootstrap\Modal::begin ([
             'header'=> '<h4>поиск по моей коммерческой</h4>',
             'id'=> 'adminkomm',
			 //'clientOptions' => ['show' => true],
             'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
			 
               
         ]);?>


			
			 <form method="get" action="<?= Url::to(['nedvigkommercheska/search' ]) ?>">
		
   
			   <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?> 
			
		       

<center><table class="table table-hover table-striped">


<td>
<label>Операция</label>
               
<select id="product-category_id" class="form-control" name="Operaciya[id]">
   
     <?= \app\components\MenuWidgetoperaciya::widget (['tpl'=> 'select_operaciya', 'model' => $model])?>

</select></td></tr>
           
               <tr><td>
                <label>Тип недвижимости</label>
               
<select id="product-category_id" class="form-control" name="Kommtip[id]">
   
     <?= \app\components\MenuWidgetkommtip::widget (['tpl'=> 'select_kommtip', 'model' => $model])?>

</select></td></tr>

               <tr><td><input type="tel" style = "height: 30px; width: 200px;" placeholder="id объявления" name="p3"/></td></tr>
               <tr><td><input type="tel" style = "height: 30px; width: 200px;" placeholder="мин. площадь цифрами" name="p1"/></td></tr>
               <tr><td> <input type="tel" style = "height: 30px; width: 200px;" placeholder="макс. стоимость цифрами" name="p2"/></td></tr>
               
				</table></center>
				<center><table class="table table-hover table-striped">
                <tr><td>
                <center><input type="submit" class="btn btn-warning" name="search" value="ПОИСК"/></center></td></tr>
				</table></center><?php ActiveForm::end();?>
                        
        </form>
		
		 
       <?
		  \yii\bootstrap\Modal::end();
         
         ?>	

