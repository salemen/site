 
<?php

/* @var $this \yii\web\АView */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;
use app\models\Message;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
     <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1.5, user-scalable=no">
    <?= Html::csrfMetaTags() ?>
    <title>Личный Кабинет SaleMen ● <?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
      <link rel="shortcut icon" href="/images/faviconka_ss.ico">
   
</head><!--/head-->



<body>
<?php $this->beginBody() ?>
   <!----------прелоадер------------->   
	  
	  <div class="preloader">
  <svg class="preloader__image" role="img" width="58" height="58" viewBox="0 0 58 58" xmlns="http://www.w3.org/2000/svg">
    <g fill="none" fill-rule="evenodd">
        <g transform="translate(2 1)" stroke="#FFF" stroke-width="1.5">
            <circle cx="42.601" cy="11.462" r="5" fill-opacity="1" fill="#f7d9ae">
                <animate attributeName="fill-opacity"
                     begin="0s" dur="1s"
                     values="1;0;0;0;0;0;0;0" calcMode="linear"
                     repeatCount="indefinite" />
            </circle>
            <circle cx="49.063" cy="27.063" r="5" fill-opacity="1" fill="#f7d9ae">
                <animate attributeName="fill-opacity"
                     begin="0s" dur="1.1s"
                     values="0;1;0;0;0;0;0;0" calcMode="linear"
                     repeatCount="indefinite" />
            </circle>
            <circle cx="42.601" cy="42.663" r="5" fill-opacity="1" fill="#f7d9ae">
                <animate attributeName="fill-opacity"
                     begin="0s" dur="1.2s"
                     values="0;0;1;0;0;0;0;0" calcMode="linear"
                     repeatCount="indefinite" />
            </circle>
            <circle cx="27" cy="49.125" r="5" fill-opacity="1" fill="#f7d9ae">
                <animate attributeName="fill-opacity"
                     begin="0s" dur="1.3s"
                     values="0;0;0;1;0;0;0;0" calcMode="linear"
                     repeatCount="indefinite" />
            </circle>
            <circle cx="11.399" cy="42.663" r="5" fill-opacity="1" fill="#f7d9ae">
                <animate attributeName="fill-opacity"
                     begin="0s" dur="1.3s"
                     values="0;0;0;0;1;0;0;0" calcMode="linear"
                     repeatCount="indefinite" />
            </circle>
            <circle cx="4.938" cy="27.063" r="5" fill-opacity="1" fill="#f7d9ae">
                <animate attributeName="fill-opacity"
                     begin="0s" dur="1.3s"
                     values="0;0;0;0;0;1;0;0" calcMode="linear"
                     repeatCount="indefinite" />
            </circle>
            <circle cx="11.399" cy="11.462" r="5" fill-opacity="1" fill="#f7d9ae">
                <animate attributeName="fill-opacity"
                     begin="0s" dur="1.3s"
                     values="0;0;0;0;0;0;1;0" calcMode="linear"
                     repeatCount="indefinite" />
            </circle>
            <circle cx="27" cy="5" r="5" fill-opacity="1" fill="#f7d9ae">
                <animate attributeName="fill-opacity"
                     begin="0s" dur="1.3s"
                     values="0;0;0;0;0;0;0;1" calcMode="linear"
                     repeatCount="indefinite" />
            </circle>
			 <circle cx="27" cy="5" r="5" fill-opacity="1" fill="#f7d9ae">
                <animate attributeName="fill-opacity"
                     begin="0s" dur="1.3s"
                     values="0;0;0;0;0;0;0;1" calcMode="linear"
                     repeatCount="indefinite" />
            </circle>
        </g>
    </g>
</svg>
</div>
	   
	   <!-------------------------------->
     
   <style>
   
    .preloader {
  position: fixed;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  overflow: hidden;
  /* фоновый цвет */
  background: #e0e0e0;
  z-index: 10;
}

.preloader__image {
  position: relative;
  top: 50%;
  left: 50%;
  width: 70px;
  height: 70px;
  margin-top: -35px;
  margin-left: -35px;
  text-align: center;
  animation: preloader-rotate 1.5s infinite linear;
}

@keyframes preloader-rotate {
  100% {
    transform: rotate(360deg);
  }
}

.loaded_hiding .preloader {
  transition: 0.1s opacity;
  opacity: 0;
}

.loaded .preloader {
  display: none;
}
   
   
   li {
    list-style-type: none; 
   }
   
  
   .header-middle1{
	height:30px;
	 width: 100%;
     padding-left: 6px; 
     padding-right: 10px;
}
   
   
@font-face{
	font-family: comic sans ms !important;
}

.btn-primary {
margin-top: 3px;
}

.btn-success {
margin-top: 3px;
}




   </style>   
    
	<header id="header"><!--header-->
	<center><div class="fixed">
		<div class="header_top" style = "height: 28px"><!--header_top-->
			<div class="container">  
				<div class="row">
					<div class="col-sm-12">
						<div class="social-icons pull-right">
						
							<ul class="nav navbar-nav">
								
								<li><a href="https://www.facebook.com/salemensar/" target="_blank"><i class="fa fa-facebook"></i></a></li> 
								<li><a href="https://twitter.com/mobail79?s=09" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://vk.com/smsar" target="_blank"><i class="fa fa-vk"></i></a></li>
								<li><a href="https://www.instagram.com/salemen.ru/" target="_blank"><i class="fa fa-instagram"></i></a></li>
								<li><a href="https://www.youtube.com/channel/UCfAjV-2sveAiRVJ6neBxXYw/videos?view_as=subscriber" target="_blank"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</div></div></center><!--/header_top-->
		<center><div class="header-middle1">
		  
            </div>	</center>
		<div class="header-middle" style="padding-top: 1px"><!--header-middle-->
			<div class="container">
				<div class="row">
				   <div id="brands_products1">
					<div class="col-sm-4" >
						<div class="logo pull-left" >
                        <a href="<?=Url::home()?>"><?=Html::img('@web/images/home/logo.png', ['alt' => 'SaleMen'])?></a>
						
<!--                                                <img src="/images/home/logo.png" alt="" />-->
                                                </div>
					
					</div>
					</div>
					
					
					 <div id="brands_products1">

     
					<div class="col-sm-8" style="margin-top: 5px">
						<center><div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
                                                            
    <li><a href="<?=Url::home()?>"class="btn btn-info" style ="padding: 5px; margin-bottom: 5px; border-color: #397F8C" ><font face="comic sans ms"> <strong>Главная </strong></font></a></li>  
                                                        
														 <?php $id = Yii::$app->user->identity['id']?>
														
	<li><a href="<?= Url::to(['user/index']) ?>"class="btn btn-info" style ="padding-right: 2px; margin-bottom: 5px; border-color: #397F8C"><i class="fa fa-user" style ="padding-left: 2px"> <font face="comic sans ms" color="#e57610">Профиль</font> </i></a></li>	

			 <li><a onclick="return getCart()" class="btn btn-info" style ="padding-right: 8px; padding-left: 8px;  margin-bottom: 5px; border-color: #397F8C"><i class="fa fa-star-half-o" style ="padding-left: 2px"></i></a></li>

			<?php  
			$username = Yii::$app->user->identity['username'];
			$messag = message::find()->where(['loginin' => $username])->orderBy(['id' => SORT_DESC])->all(); 
			$messagg = message::find()->where(['loginmoy' => $username])->orderBy(['id' => SORT_DESC])->all(); 
			?>
			 
			 <?php if(!empty($messag)){ ?> 
						<li><a onclick="return showMessag()" class="btn btn-primary" style ="padding-right: 6px; padding-left: 6px;  margin-bottom: 5px; background-color: #f7050599;"><i class= "fa fa-share" style ="padding-left: 2px"></i><i class= "fa fa-comments-o" style ="padding-left: 2px"></i></a></li>              
						<?php } elseif(empty($messag)) { ?> 
							<li><a onclick="return showMessag()" class="btn btn-info" style ="padding-right: 6px; padding-left: 6px; margin-bottom: 5px; border-color: #397F8C"><i class= "fa fa-share" style ="padding-left: 2px"></i><i class="fa fa-comments-o" style ="padding-left: 2px"></i></a></li>
              
						<?php } ?>
						
			   <?php if(!empty($messagg)){ ?> 
						<li><a onclick="return showMessagg()" class="btn btn-primary" style ="padding-right: 6px; padding-left: 6px;  margin-bottom: 5px; background-color: #08c608;"><i class= "fa fa-comments-o" style ="padding-left: 2px"></i><i class= "fa fa-share" style ="padding-left: 2px"></i></a></li>              
						<?php } elseif(empty($messagg)) { ?> 
							<li><a onclick="return showMessagg()" class="btn btn-info" style ="padding-right: 6px; padding-left: 6px; margin-bottom: 5px; border-color: #397F8C"><i class="fa fa-comments-o" style ="padding-left: 2px"></i><i class= "fa fa-share" style ="padding-left: 2px"></i></a></li>
              
						<?php } ?>			
			 
                   	            
						
								 <?php if (!Yii::$app->user->isGuest): ?>
							
                             
    <li style = "margin-top: 4px"><?php echo Html::a('<strong> Выход из Л.К. </strong>',['/site/logout'], [
											   'data' => [
											   'method' => 'post',
											   'confirm' => 'Закрыть Личный Кабинет ?',]
												])?></li>
                                            
                                               <?php endif;?>
	              
							</ul>
						</div></center>
					</div>
				
					</div>
					
					 <div id="brands_products2">

      <?php  if(strpos($_SERVER['REQUEST_URI'], 'create') == false){ ?>		
					
					<div class="col-sm-8" style="margin-top: 5px">
						<center><div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
                                                            
    <li><a href="<?=Url::home()?>"class="btn btn-info" style ="padding: 5px; margin-bottom: 5px; border-color: #397F8C" ><font face="comic sans ms"> <strong>Главная </strong></font></a></li>  
                                                        
														 <?php $id = Yii::$app->user->identity['id']?>
														
	<li><a href="<?= Url::to(['user/index']) ?>"class="btn btn-info" style ="padding-right: 2px; margin-bottom: 5px; border-color: #397F8C"><i class="fa fa-user" style ="padding-left: 2px"> <font face="comic sans ms" color="#e57610">Профиль</font> </i></a></li>	

			 <li><a onclick="return getCart()" class="btn btn-info" style ="padding-right: 8px; padding-left: 8px;  margin-bottom: 5px; border-color: #397F8C"><i class="fa fa-star-half-o" style ="padding-left: 2px"></i></a></li>

			<?php  
			$username = Yii::$app->user->identity['username'];
			$messag = message::find()->where(['loginin' => $username])->orderBy(['id' => SORT_DESC])->all(); 
			$messagg = message::find()->where(['loginmoy' => $username])->orderBy(['id' => SORT_DESC])->all(); 
			?>
			 
			 <?php if(!empty($messag)){ ?> 
						<li><a onclick="return showMessag()" class="btn btn-primary" style ="padding-right: 6px; padding-left: 6px;  margin-bottom: 5px; background-color: #f7050599;"><i class= "fa fa-share" style ="padding-left: 2px"></i><i class= "fa fa-comments-o" style ="padding-left: 2px"></i></a></li>              
						<?php } elseif(empty($messag)) { ?> 
							<li><a onclick="return showMessag()" class="btn btn-info" style ="padding-right: 6px; padding-left: 6px; margin-bottom: 5px; border-color: #397F8C"><i class= "fa fa-share" style ="padding-left: 2px"></i><i class="fa fa-comments-o" style ="padding-left: 2px"></i></a></li>
              
						<?php } ?>
						
			   <?php if(!empty($messagg)){ ?> 
						<li><a onclick="return showMessagg()" class="btn btn-primary" style ="padding-right: 6px; padding-left: 6px;  margin-bottom: 5px; background-color: #08c608;"><i class= "fa fa-comments-o" style ="padding-left: 2px"></i><i class= "fa fa-share" style ="padding-left: 2px"></i></a></li>              
						<?php } elseif(empty($messagg)) { ?> 
							<li><a onclick="return showMessagg()" class="btn btn-info" style ="padding-right: 6px; padding-left: 6px; margin-bottom: 5px; border-color: #397F8C"><i class="fa fa-comments-o" style ="padding-left: 2px"></i><i class= "fa fa-share" style ="padding-left: 2px"></i></a></li>
              
						<?php } ?>			
			 
                   	            
						
								 <?php if (!Yii::$app->user->isGuest): ?>
							
                             
    <li style = "margin-top: 4px"><?php echo Html::a('<strong> Выход из Л.К. </strong>',['/site/logout'], [
											   'data' => [
											   'method' => 'post',
											   'confirm' => 'Закрыть Личный Кабинет ?',]
												])?></li>
                                            
                                               <?php endif;?>
	              
							</ul>
						</div></center>
					</div>
					 <?php } ?>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
		
	 <div id="brands_products1">
		<div class="header-bottom1"><!--header-bottom-->
                    	
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="navbar-header">
						</div>
                       <center>                     
                                            
<li><strong><a style="color:#034176" href= "<?= Url::to (['/admin']) ?>">Ваш Личный Кабинет: <?=Yii::$app->user->identity['username']?></a></strong></li>
                                         
                                  
                               </center>
                                    
									<center>
									
		<a href="<?= Url::to(['dobavit/index']) ?>" class="btn btn-success"><font face="comic sans ms" >
		<i class="fa fa-plus-square"></i> Подать объявление</font></a> 
		<a href="<?= Url::to(['dobavitvashi/index']) ?>" class="btn btn-default"><font face="comic sans ms" ></i>
		<i class="fa fa-list"></i> Мои объявления </i></font></a> 
									</center>
									
                                                                   
						</div>
                                            
					</div>
                               
				</div>
			</div>
		</div>	
		
		
		 <div id="brands_products2">
		  <?php  if(strpos($_SERVER['REQUEST_URI'], 'create') == false){ ?>		
		<div class="header-bottom1"><!--header-bottom-->
                    	
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="navbar-header">
						</div>
                       <center>                     
                                            
<li><strong><a style="color:#034176" href= "<?= Url::to (['/admin']) ?>">Ваш Личный Кабинет: <?=Yii::$app->user->identity['username']?></a></strong></li>
                                         
                                  
                               </center>
                                    
									<center>
									
		<a href="<?= Url::to(['dobavit/index']) ?>" class="btn btn-success"><font face="comic sans ms" >
		<i class="fa fa-plus-square"></i> Подать объявление</font></a> 
		<a href="<?= Url::to(['dobavitvashi/index']) ?>" class="btn btn-default"><font face="comic sans ms" ></i>
		<i class="fa fa-list"></i> Мои объявления </i></font></a> 
									</center>
									
                                                                   
						</div>
                                            
					</div>
                               
				</div>
			</div>
		  <?php } ?>
		</div>	
		
		 <div id="brands_products2">
		  <?php  if(strpos($_SERVER['REQUEST_URI'], 'create') !== false){ ?>		
		<div class="header-bottom1"><!--header-bottom-->
                    	
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="navbar-header">
						</div>
                       <center>                     
                                            
<li><strong><a style="color:#034176" href= "<?= Url::to (['/admin']) ?>">Ваш Личный Кабинет: <?=Yii::$app->user->identity['username']?></a></strong></li>
                                         
                                  
                               </center>
                                    
									<center>
									
		<a href="<?= Url::to(['dobavit/index']) ?>" class="btn btn-success"><font face="comic sans ms" >
		<i class="fa fa-plus-square"></i> Подать другое</font></a> 
		<a href="<?= Url::to(['dobavitvashi/index']) ?>" class="btn btn-default"><font face="comic sans ms" ></i>
		<i class="fa fa-list"></i> Мои объявления </i></font></a> 
									</center>
									
                                                                   
						</div>
                                            
					</div>
                               
				</div>
			</div>
		  <?php } ?>
		</div>	
	                    
		<!--/header-bottom-->
                
     
                
	</header><!--/header-->
        
        <div class="container">
            
    <?php if(Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('success'); ?>
    </div>
    <?php endif; ?>
       
	   
	   <!--///////////ФЛЕШ СООБЩЕНИЕ УДАЛЕНО////////////-->
            
    <?php if(Yii::$app->session->hasFlash('success12')): ?>
    <div class="alert alert-success alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <?php echo '<center>Cообщение удалено</center>'; ?>
    </div>
    <?php endif; ?>
        </div> 	
		  
		
        <div class="container"> <?= $content; ?> </div>   
	

	<hr>
	<footer id="footer"><!--Footer-->
		
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 SaleMen.</p>
					<div class="container">		
							
	<center><p id = "translationTel1">+7 XXX XXX  <span id = "showTel" onclick = "showSTR1('+7(8452)93-59-69 | 1@salemen.ru')"> Телефон и эл.почта поддержки</span></p></center>
		
		</div>
					
				</div>
			</div>
		</div>
		<!--/Footer-->
		
		<!-----------ИЗБРАННОЕ----------->
	
	  <?
         
         \yii\bootstrap\Modal::begin ([
             'header'=> '<h4>Избранное</h4>',
             'id'=> 'cart',
             'size'=> 'modal-lg', 
             'footer' => '<button type="button" data-dismiss="modal">Закрыть</button>'
             
             
                
         ]);
         
          \yii\bootstrap\Modal::end();
         
         ?>
		 
		 
		 <!-----------СООБЩЕНИЯ ВХОДЯЩИЕ----------->
	
	  <?         
         \yii\bootstrap\Modal::begin ([
             'header'=> '<h4>Входящие cообщения</h4>',
             'id'=> 'messag',
             'footer' => '<button type="button" data-dismiss="modal">Закрыть</button>'
            ]);  ?>
         
	
		 <div>
		<center><table class ="table table-hover table-striped" >
		 <?php 
		 		 
		 if (empty($messag)){
			echo "<center>Входящих сообщений нет</center>";
		 }
		 ?>
		 
		<?php foreach ( $messag as $message): 
		   $link = $message[link];
		   $id = $message[id];
		 ?>
	
            <tr>
                <p><b><span style="color:blue" >От кого: </span></b><?= $message[loginmoy] ?>
			</tr>
				  <tr><b>Тел. отправителя: </b> <a href="tel:<?= $message[telephone] ?>" target="_blank"><?= $message[telephone]?></a></p>
			</tr>
             <tr>			
                <p><b>По объявлению: </b> <a target=_blank href="<?= Url::to (["$link"],true)?>"><?= $message['name']?></a></p>
			</tr>
            <tr>			
                <textarea readonly="readonly" style="max-width:430px;height:70px;resize:vertical"><?= \yii\helpers\HtmlPurifier::process($message[textmoy]) ?></textarea>
				<span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-itemmessage" aria-hidden="true" ></span>
                </tr> 
				<hr>
		 <?php endforeach;?>
		 
		
		 </table></center>
		 </div>
		 
		 <?
          \yii\bootstrap\Modal::end();
         
         ?>
		 
		 
		  <!-----------СООБЩЕНИЯ ИСХОДЯЩИЕ----------->
	
	  <?         
         \yii\bootstrap\Modal::begin ([
             'header'=> '<h4>Исходящие cообщения</h4>',
             'id'=> 'messagg',
             'footer' => '<button type="button" data-dismiss="modal">Закрыть</button>'
            ]);  ?>
         
	
		 <div>
		<center><table class ="table table-hover table-striped" >
		 <?php 
		 		 
		 if (empty($messagg)){
			echo "<center>Исходящих сообщений нет</center>";
		 }
		 ?>
		 
		<?php foreach ( $messagg as $messagge): 
		   $link = $messagge[link];
		   $id = $messagge[id];
		 ?>
	
            <tr>
                <p><b><span style="color:blue" >Кому: </span></b><?= $messagge[loginin] ?>
			</tr>
				  
             <tr>			
                <p><b>По объявлению: </b> <a target=_blank href="<?= Url::to (["$link"],true)?>"><?= $messagge['name']?></a></p>
			</tr>
            <tr>			
                <textarea readonly="readonly" style="max-width:430px;height:70px;resize:vertical"><?= \yii\helpers\HtmlPurifier::process($messagge[textmoy]) ?></textarea>
				<span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-itemmessage" aria-hidden="true" ></span>
                </tr> 
				<hr>
		 <?php endforeach;?>
		 
		
		 </table></center>
		 </div>
		 
		 <?
          \yii\bootstrap\Modal::end();
         
         ?>

  
    
	<?php $this->endBody() ?>
	<script>
function showSTR1(trueTel) {
document.getElementById('translationTel1').firstChild.replaceData (0 , trueTel.length, trueTel);
}

window.onload = function () {
    document.body.classList.add('loaded_hiding');
    window.setTimeout(function () {
      document.body.classList.add('loaded');
      document.body.classList.remove('loaded_hiding');
    }, 300);
  }
</script>
</body>
</html>
<?php $this->endPage() ?>


