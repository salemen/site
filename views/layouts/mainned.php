<?php

/* @var $this \yii\web\АView */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\Modal;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
     <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    
   
   
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="/images/favicon.jpeg">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<?php $this->beginBody() ?>
    
    <style>                                                               
#blink2 {
  -webkit-animation: blink2 2s linear infinite;
  animation: blink2 1s linear infinite;
}
@-webkit-keyframes blink2 {
  100% { color: rgba(34, 34, 34, 0); }
}
@keyframes blink2 {
  100% { color: rgba(253,163,0,255); }
}
  </style>  
    
	<header id="header">
		<div class="header_top">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="header-middle">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
                                                    <a href="<?=\yii\helpers\Url::home()?>"><?=Html::img('@web/images/home/logo.png', ['alt' => 'E-SHOPPER'])?></a>
						
                                                
                                                </div>
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
                                           <?php if (!Yii:: $app->user->isGuest): ?>
                                
    <li><a href="<?= \yii\helpers\Url::to (['/site/logout'])?>"><i class="fa fa-user"></i> <?=Yii::$app->user->identity['username']?> (Выход)</a></li>
                                            
                                               <?php endif;?>
								
<!--			<li><a href="<?= yii\helpers\Url::to (['/site/signup']) ?>"><i class="fa fa-crosshairs"></i> Регистрация </a></li>-->
                        
                         <li><a href="/cart/view" onclick="return getCart()" ><i class="fa fa-shopping-cart"></i> Избранное</a></li>
                        
                        <li><a href= "<?= yii\helpers\Url::to (['/admin']) ?>" ><i class="fa fa-lock"></i> <strong id="blink2">Разместить объявление</strong></a></li>
                                                                
                                            
                                              <li><a href= "<?= yii\helpers\Url::to (['/admin']) ?>" ><i class="fa fa-lock"></i> Личный кабинет</a></li>
                                              
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	
		<div class="header-bottom">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
                                           
                                            <br>
						<div class="mainmenu pull-left">
                                                    
						<ul class="nav navbar-nav collapse navbar-collapse">
                                                    
                                                  
                                                    
                                                    <table>
                                                    
 <li><a href="<?=\yii\helpers\Url::home()?>"><font face="Arial" >Главная </font></a></li>

            <li><a href="<?=\yii\helpers\Url::to (['/site/mainned'])?>"><font face="Arial" >НЕДВИЖИМОСТЬ </font></a></li>

                               <li><a href="<?=Yii::$app->urlManager->createAbsoluteUrl('/site/mainavto');?>"><font face="Arial" >АВТОМОБИЛИ </font></a></li>
                                                                
                                 <li><a href="<?=\yii\helpers\Url::home()?>"><font face="Arial" >МАГАЗИН </font></a></li>
                                                                
                                                    </table>
								
<!--								<li><a href="404.html">404</a></li>
								<li><a href="contact-us.html">Contact</a></li>-->
							</ul>
						</div>
					</div>
                                     
					<div class="col-sm-3">
						<div class="search_box pull-right">
                                                    <form method="get" action="<?= yii\helpers\Url::to(['category/search' ]) ?>">
							<input type="text" placeholder="Поиск. Введите запрос и нажмите Enter" name="q"/>
                                                    </form>  
						</div>
					</div>
				</div>
			</div>
		</div>
                
                  
                
	</header>
        
        
        
	<?= $content; ?>

	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>e</span>-shopper</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
						</div>
					</div>
<!--					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="/images/home/iframe1.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="/images/home/iframe2.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="/images/home/iframe3.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="/images/home/iframe4.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					</div>-->

					<div class="col-sm-3">
						<div class="address">
							<img src="/images/home/map.png" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Online Help</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Order Status</a></li>
								<li><a href="#">Change Location</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">T-Shirt</a></li>
								<li><a href="#">Mens</a></li>
								<li><a href="#">Womens</a></li>
								<li><a href="#">Gift Cards</a></li>
								<li><a href="#">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
								<li><a href="#">Refund Policy</a></li>
								<li><a href="#">Billing System</a></li>
								<li><a href="#">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
        
        <?
         
         \yii\bootstrap\Modal::begin ([
             'header'=> '<h2>Корзина</h2> <button type="button" class="btn btn-default" onclick ="clearCart()">Очистить</button>',
             'id'=> 'cart',
             'size'=> 'modal-lg', 
             'footer' => '<button type="button" class="btn btn-danger" data-dismiss="modal">Продолжить покупки</button>
             <a href= "'.\yii\helpers\Url::to(['cart/view']).'" class="btn btn-success"> Оформить заказ на все товары в корзине </a>'
             
                
         ]);
         
          \yii\bootstrap\Modal::end();
         
         ?>
	

  
    
	<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>






