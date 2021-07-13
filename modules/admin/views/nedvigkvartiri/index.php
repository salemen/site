<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use app\modules\admin\models\Raion;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Мои Квартиры';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="nedvig-kvartiri-index">
       
	  
                               <center>
                                   <font face="comic sans ms" >Выберите нужный подраздел </font>
                               </center>
     
        <!--Html::a('Добавить легковые', ['<a href=" \Url::to(['avtoleg/create'])">'], ['class' => 'btn btn-primary'])--> 
        <center> 
            
         <a href="<?= Url::to(['nedvigkvartiri/index']) ?>" class="btn btn-danger">Квартиры</a>
         <a href="<?= Url::to(['nedvigdoma/index']) ?>" class="btn btn-primary">Дома / Коттеджи</a> 
         <a href="<?= Url::to(['nedvigkomnati/index']) ?>" class="btn btn-primary">Комнаты</a>
         <a href="<?= Url::to(['nedvigkommercheska/index']) ?>" class="btn btn-primary">Коммерческая недвижимость</a> 
         <a href="<?= Url::to(['nedvigzemli/index']) ?>" class="btn btn-primary">Земельные участки</a>
		 <a href="<?= Url::to(['nedvigbiznes/index']) ?>" class="btn btn-primary">Готовый бизнес</a> 
         <a href="<?= Url::to(['nedviggaragi/index']) ?>" class="btn btn-primary">Гаражи и машиноместа</a> 
         
            
         </center>
    
    <hr>
       
  

    <table>
    <center>  <h4>Квартиры: мои объявления</h4></center>

   
	<style>
.btn-1primary {
    color: #fff;
    background-color: #105fa3;
    border-color: #ef0e42;
</style>
        <center><p><?= Html::a('<i class="fa fa-download"></i> ДОБАВИТЬ ОБЪЯВЛЕНИЕ <i class="fa fa-download"></i>', ['create'], ['class' => 'btn btn-1primary']) ?>
        
<?php if (!empty($Nedvigkvartiri)){ ?>		
	<a onclick="return showAdminkvart()" ><i class="btn btn-1primary" >
	<i class="fa fa-search"></i> </i></a>
<?php } ?>
	</p>
       		  
	
	</center>
</table>

 <div class="col-sm-12">
	<div class="features_items"><!--features_items-->
						
                                            <?php if (!empty($Nedvigkvartiri)): ?>
                                            
                                            <?php foreach ($Nedvigkvartiri as $Nedvigkvartiris):?>
                                           
	
	
		
                                              <?php
                 $mainImg = $Nedvigkvartiris->getImage();
				 
				  if ($Nedvigkvartiris->raion ==0){         
      
	   }
	   else {$raion1 = Raion::find()->select('raion')
       ->where(['id' => $Nedvigkvartiris->raion])
       ->one();
       foreach($raion1 as $item) {
       $Nedvigkvartiris->raion = $item;}};
         
                                               ?>
                             
                                            
						<center><div class="col-sm-3">
						<?php if ($Nedvigkvartiris->moder == 1) { ?>
							<div class="product-image-admin">
						<?php } else { ?>
						<div class="product-image-admin1">
						<?php } ?>
								<div class="single-Products">
                                                                    
										<div class="productinfo text-center">
                                                                                    
                                      <?php if (!$Nedvigkvartiris->moder) { 
									echo '<style="color: red">На модерации</style>';
									}?>
                                                                                   
                                               <?php if ($mainImg['urlAlias']==='placeHolder') { ?>
																			 
										 <a href="<?= Url::to(['/admin/nedvigkvartiri/view', 'id'=>$Nedvigkvartiris->id]) ?>"			 
                                                 <li><?=Html::img($mainImg->getUrl(''), ['alt' => '']) ?></li></a>
												                  
																			 <?php } else { ?> 
										 <a href="<?= Url::to(['/admin/nedvigkvartiri/view', 'id'=>$Nedvigkvartiris->id]) ?>"									 
												 <li><?=Html::img($mainImg->getUrl('x200'), ['alt' => '']) ?></li></a>
												 
												                             <?php } ?> 
                                            <h5>ID <?= $Nedvigkvartiris->id ?>, р-он <?= $Nedvigkvartiris->raion ?></h5>																			 
											<h5>Стоимость: <?= $formatted_number = number_format($Nedvigkvartiris->price, 0, ',', ' '); ?> руб.</h5>
											
                                      <h5><?= $Nedvigkvartiris -> operaciya ?>. Комнат: <?= $Nedvigkvartiris -> kolichestvo_komnat ?></h5>
                                                                                       
                             <!--<a href="<?= Url::to(['/admin/nedvigkvartiri/view', 'id'=>$Nedvigkvartiris->id]) ?>" class="btn btn-default">подробнее</a>-->
                             <a href="<?= Url::to(['/admin/nedvigkvartiri/update', 'id'=>$Nedvigkvartiris->id]) ?>" class="btn btn-default">изменить и продать быстрее</a></br>
                         
                             <?php echo Html::a('Удалить', ['/admin/nedvigkvartiri/delete', 'id'=>$Nedvigkvartiris->id], [
                                                           'data' => [
                                                           'method' => 'post',
                                                           'confirm' => 'Вы действительно хотите безвозвратно удалить объявление ?',]
                                                            ]);?>
 
                            
    <!-- <a href="<?= Url::to(['cart/add', 'id'=>$hit->id]) ?>" data-id="<?=$hit->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>-->
										</div>
                                                                    
<!--										<div class="Nedvigkvartiri-overlay">
											<div class="overlay-content">
												<h2>$<?= $hit->price ?></h2>
												<p><?= $hit->name ?></p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>-->
                                                                    <?php if ($Nedvigkvartiris->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>
                                                                    
                                                                    <?php if ($Nedvigkvartiris->sale):?>
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
												</table> <br><br><br><br>
                                                
						<?php endif; ?>

  </div></center>
    
    
    
</div>
    
</div>


  <!-------------Поиск квартир------------->
					
					<?
         
         \yii\bootstrap\Modal::begin ([
             'header'=> '<h4>поиск по моим квартирам</h4>',
             'id'=> 'adminkvart',
			 //'clientOptions' => ['show' => true],
             'footer' => '<button type="button" data-dismiss="modal">закрыть</button>'
			 
               
         ]);?>

        
		
			
        <form method="get" action="<?= Url::to(['nedvigkvartiri/search' ]) ?>">
              
             <?php $form = ActiveForm::begin(); ?>
			 <center><table class="table table-hover table-striped">
		 
				
				<tr>
				<td>
                   <label>Операция</label>
               
<select id="product-category_id" class="form-control" name="Operaciya[id]">
   
     <?= \app\components\MenuWidgetoperaciya::widget (['tpl'=> 'select_operaciya', 'model' => $model])?>

</select>
</td>
</tr>
 
 
			   <tr>
			   <td>
                <label>Вид недвижимости</label>
               
<select id="product-category_id" class="form-control" name="Vidnedvig[id]">
   
     <?= \app\components\MenuWidgetvidnedvig::widget (['tpl'=> 'select_vidnedvig', 'model' => $model])?>

</select>
           </td>
		   </tr>
		   <tr>
            <td>    
                <label>Количество комнат</label>
               
<select id="product-category_id" class="form-control" name="Komnat[id]">
   
     <?= \app\components\MenuWidgetkomnat::widget (['tpl'=> 'select_komnat', 'model' => $model])?>

</select>
</td>
</tr>
<td><input type="tel" style = "height: 30px; width: 200px;" placeholder="id объявления" name="p1"/></td></tr>
          
</table></center>
              
				
				<center><table class="table table-hover table-striped">
                <tr><td>
                <center><input type="submit" class="btn btn-warning" name="search" value="ПОИСК"/></center></td></tr>
				</table></center><?php ActiveForm::end();?> 
                        
        
        </form>
	
   
	<?
		  \yii\bootstrap\Modal::end();
         
         ?>	 
