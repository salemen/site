<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ваш профиль на SaleMen.';
$this->params['breadcrumbs'][] = $this->title;
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<div class="user-index">

<center>

    <h4><?= Html::encode($this->title) ?></h4>
    
<?php $id = Yii::$app->user->identity['id']?>
    
   
	 <style>
        .product-image-admin{
	border:3px solid #cccbcc;
	overflow: auto;
	margin-bottom:15px;
    max-height: 420px!important;
	max-width: 400px;
    border-radius: 10px;	
	background-color: #fff;
		
}
        .single-products{
	max-height: 420px;
    max-width: 400px;	
		}
        </style>
    
   
    <div class="col-sm-12">
	
	<div class="features_items"><!--features_items-->
						
				<?php if (!empty($user)): ?>
																									  
				<?php foreach ($user as $users):?>
				
				<?php  $mainImg = $users->getImage(); ?>
                             
                          <?php 
						  $username = Yii::$app->user->identity['username'];
						  if ($username==sarmetradmin) { ?>                
						<div class="col-sm-3">
						
						  <?php } else { ?>
						  
						  <div class="col-sm-12">
						  <?php } ?>
						
							<div class="product-image-admin">
								<div class="single-products">
                                                                    
										<div class="productinfo text-center">
                                                                                    
                                  <?php if ($mainImg['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                 <li><?=Html::img($mainImg->getUrl(''), ['alt' => '']) ?></li>
												                  
																			 <?php } else { ?> 
																			 
												 <li><?=Html::img($mainImg->getUrl('x200'), ['alt' => '']) ?></li>
												 
												                             <?php } ?> 
								   
									<h5>Логин: <span id='userlogin'><?= $users->username ?></span></h5>
                                                                                     
										     <p>Эл.почта: <?php if ($users -> email){
											 echo $users -> email;}
											 else {echo "нет";} ?></p>
											 
											 <p>Телефон: <?php if ($users -> telephone){
											 echo $users -> telephone;}
											 else {echo "нет";} ?></p>
											 
											 <p>Город: <?php if ($users -> gorod){
											 echo $users -> gorod;}
											 else {echo "нет";} ?></p>
											 
											 <p>Адрес: <?php if ($users -> adress){
											 echo $users -> adress;}
											 else {echo "нет";} ?></p>
											 																						
                                                                                       
                             <a href="<?= yii\helpers\Url::to(['/admin/user/view', 'id'=>$users->id]) ?>" class="btn btn-warning">подробнее</a>
                             <a href="<?= yii\helpers\Url::to(['/admin/user/update', 'id'=>$users->id]) ?>" class="btn btn-warning">редактировать</a><br>
                         <hr>
                             <?php echo Html::a('Удалить профиль', ['/admin/user/delete', 'id'=>$users->id], [
                                                           'data' => [
                                                           'method' => 'post',
                                                           'confirm' => 'Удаляется только профиль, объявления остаются. Вы действительно хотите безвозвратно удалить профиль ?',]
                                                            ]);?>
                             
							            </div>                                                                    
								</div>
                                                            
								<div class="choose">
									<ul class="nav nav-pills nav-justified">

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
                                         <h4> Ошибка </h4>
                                                
						<?php endif; ?>

			  </div>    
			</div>

			</center>
		                
                     <style>

					::-webkit-input-placeholder{
					  text-align:center;
					}
					</style>
					
         <?php $username = Yii::$app->user->identity['username']; ?>
					  
				<form id="komment">
<!-- <form method="get" action="<?= yii\helpers\Url::to(['/komment/komment' ]) ?>"> -->
    <div class="komment">   
    <center><p><h5><span id='userlogin'><?= $username ?></span>, Ваши пожелания и отзыв о сайте</h5></p>
  <?php //$login = $users->username ?>
    <p><textarea placeholder = "напишите отзыв о сайте или Ваше пожелание" style="max-width:380px;height:60px;resize:vertical" maxlength="150" name="komment" id ="kom"></textarea></p>
 <p> <input type = "submit" class="btn btn-default" value="Оставить отзыв" id="message"> </p></center>
    </div>
              </form>               
<script type="text/javascript">
$(document ).ready(function() {
    $("#message").click(function(){
        $.ajax({
            type: 'POST',
            url: '/komment/komment',
            dataType: 'text',
            data: {
                komment:$('#kom').val(),
				login:$('#userlogin').text(),
                _csrf: '<?=Yii::$app->request->getCsrfToken()?>'
            },
            success: function(rate) {
                alert("Спасибо за отзыв.");
            },
            error: function (exception) {
                console.log(exception);
            }
        });
      
    });
});                      
</script>
					
	
</div>
