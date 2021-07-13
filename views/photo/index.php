<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;
use yii\widgets\LinkPager;



AppAsset::register($this);
?>

<?php

 $pag = Yii::$app->request->get('page'); 
 $this->title = ' 📸 ФотоАльбом объявлений'.' '.$pag;	   
          $this->params['breadcrumbs'][] = $this->title; 

?>

<?php
 include Yii::$app->basePath.'/payconf.php';
?>

<section><!--slider-->

		<div class="container">
		
			<div class="row">
				
		 
                     <style>


   @media (max-width: 1199px) {
     .productinfo img {
     	  max-height: 155px;
     	}
     .btn-iz {
    position: absolute;
    bottom: 9px;
    left: 4px;
    }	
     }

	@media (max-width: 1199px) {			 
		 .product-image-wrapper4{
		border:3px solid #e2e2db;
		overflow: auto;
		margin-bottom:8px;
		height: 293px;
		max-width: 330px;
		border-radius: 8px;	
		 }

        .product-image-wrapper5{
		border:4px solid red;
		overflow: auto;
		margin-bottom:8px;
		height: 293px;
		max-width: 330px;
		border-radius: 8px;	
		 }	

       .col-sm-2{
		 padding-right: 2px;
       padding-left: 2px;	 
      }
   }		

	
    @media (min-width: 1200px) {	
        .product-image-wrapper4{
	border:3px solid #e2e2db;
	overflow: auto;
	margin-bottom:10px;
    height: 285px;
	max-width: 330px;
    border-radius: 8px;	
		
   }

    .product-image-wrapper5 {
    border: 4px solid red;
    overflow: auto;
    margin-bottom: 10px;
    height: 284px;
    max-width: 350px;
    border-radius: 8px;
	}
	}

@media (max-width: 1199px) {
	.single-products1 img{
  width: 100%;
  max-width: 210px !important;
  max-height: 165px;
  margin-top: 1px !important;
  border-radius: 6px;
}
}
	
		.btn{
    margin-top: 2px;
	margin-bottom: 2px;
		}
		
		
		h1{
	font-size: 19px;
    margin-bottom: 10px;
    margin-top: 10px;	
		}
		
		.left-sidebar{
			padding-left: 3px; 
			padding-right: 3px;
		}
		
		h5{
		margin-top: 5px;
        margin-bottom: 5px;
		}
		
        </style>		

       <div id="brands_products2">
					     
								 <center>				
						 <div class="polaroid">
									<a href ="<?= Url::to (['nedvigcategory/2','ads'=>'doma-cottage']) ?>"> <span><img class="animate1" src="/images/dom.png" alt="дом"></span></a>
									 <a href="<?= Url::to (['nedvigcategory/14','ads'=>'vse-uchastki']) ?>"> <span><img class="animate1" src="/images/zemli.png" alt="участок"></span></a>
									<a href="<?= Url::to (['nedvigcategory/8','ads'=>'vse-kvartiri']) ?>">  <span><img class="animate1" src="/images/kvartira.png" alt="квартира"></span></a>
									<a href="<?= Url::to (['avtocategory/1','ads'=>'legkovie-avto']) ?>"> <span><img class="animate1" src="/images/avto.png" alt="легковой"></span></a>
									<!--<a href="https://salemen.ru/category/76"> <span><img class="animate1" src="/images/sud.png" alt="юристы"></span></a>&nbsp; -->
									<a href="<?= Url::to (['category/53','ads'=>'vakansii-rabota']) ?>"> <span><img class="animate1" src="/images/rabota.png" alt="работа"></span></a>
									<a href="https://salemen.ru/admin"> <span><img class="animate1" src="/images/lk.png" alt="ЛК"></span></a>
							</div>
					      </center>
						
				<center><div>
					<a href ="<?= Url::to (['/']) ?>"> <span><img class="animate1" src="/images/column.png" alt="Один"></span></a>
				</div></center>
					</div> 

       
	   <center>
		
				<div class="col-sm-12">
					<div class="features_items"><!--features_items-->
					
                                            <?php if (!empty($product)): ?>
                                           
                               <div id="brands_products1">             

                                   <h1 style = "font-size: 16px; 
									             margin-top: 4px; 
												 color: #397F8C; 
												 font-weight: 700;
												 font-family: 'Roboto', sans-serif;"<b>ФотоАльбом объявлений</b></font>
											 <small class="ttip1">что это ?<span><?=$photo;?></span></small>
													  
											</h1>
											</div>
                                            <?php foreach ($product as $hit):?>
																						   
											
                                                 <?php $mainImg = $hit->getImage();  ?>
												 
                                             <?php if ($mainImg['urlAlias']==='placeHolder' ) { 
                         
											 } else { ?>



                      							
						<div class="col-sm-2">
						<?php if(!empty($hit->videl)){ ?> 
						<div class="product-image-wrapper5">
						<?php } else { ?> 
							<div class="product-image-wrapper4">
						<?php } ?>
								
              <?php 
				  $s = $hit->name;
				  
				
				  //$s = (string) $s; // преобразуем в строковое значение
				  //$s = strip_tags($s); // убираем HTML-теги
				  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
				  $s = trim($s); // убираем пробелы в начале и конце строки
				  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
				  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
				  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
				  $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
				  
				  $s2 = $hit -> category->name;
						  						
				  //$s = (string) $s; // преобразуем в строковое значение
				  //$s = strip_tags($s); // убираем HTML-теги
				  $s2 = preg_replace("/\s+/", ' ', $s2); // удаляем повторяющие пробелы
				  $s2 = trim($s2); // убираем пробелы в начале и конце строки
				  $s2 = function_exists('mb_strtolower') ? mb_strtolower($s2) : strtolower($s2); // переводим строку в нижний регистр (иногда надо задать локаль)
				  $s2 = strtr($s2, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
				  $s2 = preg_replace("/[^0-9a-z-_ ]/i", "", $s2); // очищаем строку от недопустимых символов
				  $s2 = str_replace(" ", "-", $s2); // заменяем пробелы знаком минус
			 ?>	
			 
			 <div id="brands_products2">  
			 
			 <p > <font style="color: blue";> user: </font><?=  $hit->username ?></p>
			
			</div>
			 <div id="brands_products1">  
			 <p > <font style="color: blue";><i class="fa fa-file-text-o"></i> </font><?=  $hit->username ?></p>
			 </div>
								<div class="single-products1">								
	  	                          
										<div class="productinfo text-center">
										
							
																	
										 <?php if ($mainImg['urlAlias']==='placeHolder') { ?>
																			 
													 
                     <a href="<?= Url::to(['product/'.$hit->id,'ads' =>$s.'_price_'.$hit->price]) ?>"
	                                   <li><?=Html::img($mainImg->getUrl(''), ['alt' => 'Объявление: '.$hit->name.', цена '.$hit->price.' '.$hit->oblast_region]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
                       <a href="<?= Url::to(['product/'.$hit->id,'ads' =>$s.'_price_'.$hit->price]) ?>"
                                    <li><?=Html::img($mainImg->getUrl('x200'), ['alt' => 'Объявление: '.$hit->name.', цена '.$hit->price.', '.$hit->oblast_region]) ?></li></a>
												 
												                             <?php } ?>
																			 
						   <p><b>Из категории:</b><br> <a href="<?= Url::to(['category/'.$hit ->category-> id, 'ads'=>$s2])?>"><?= $hit -> category->name ?></a></p>	
						   <p><b>цена: </b><?= $hit->price ?> руб.</p>													 
                                  							 
                          </div>
						  
 						  <!--   <a onclick="return showMessage()"  class="btn-iz"><img class="animate1" src="/images/sms.png" alt=""></a> -->

						  <p><a href ="<?= Url::to (['cart/add', 'id'=> $hit->id]) ?>" data-id = "<?= $hit->id?>"
                          class="btn-iz add-to-cart"><img class="animate1" src="/images/iz.png" alt=""></span></a></p>

									  <div class="btn-podrob">
									 <ul class="nav navbar-nav collapse navbar-collapse">        
							   <li class="dropdown"><img class="animate1" src="/images/podrobno5.png" alt="">		    			 
							     <ul role="menu" class="sub-menu1">
							
                        <li> КРАТКОЕ ОПИСАНИЕ:<hr><?= mb_substr($hit->content, 0, 150);  ?><br>
									  <a href="<?= Url::to(['product/'.$hit->id,'ads' =>$s.'_price_'.$hit->price]) ?>" class="btn btn-default1">подробнее о объявлении</a>
							
							     </ul>
							   </li>				
								</ul>
								      </div>
									  
									
								</div>
                           	
							</div>
						</div>
						 	
											 <?php }; ?>
						<?php endforeach;?>
                                            <?php endif; ?>
			
			         </div> <!--features_items-->
					
					                            <?php 
                                                echo LinkPager::widget([
                                                'pagination' => $pages,
                                                   ]);
                                                 ?>   
					
					</div>
					</center>
					
				</div>
			
		</div>
	</section>
	
