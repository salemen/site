<?php
use yii\helpers\Html;
use app\assets\AppAsset;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\models\Category;
use yii\widgets\LinkPager;
use app\models\Nedvigkvartiri;
use kartik\depdrop\DepDrop;
use app\modules\admin\models\Oblast;
use app\modules\admin\models\Goroda;
use app\modules\admin\models\Raion;
use kartik\select2\Select2; // or kartik\select2\Select2
use yii\web\JsExpression;

AppAsset::register($this);
?>


<?php
 include Yii::$app->basePath.'/payconf.php';
?>

<section id="advertisement">
		
	</section>
	
	<section>
		<div class="container" style = "padding-top: 10px">
			<div class="row">
				<div class="col-sm-3">
				 
					<div class="left-sidebar">
						<h2>Категории недвижимости</h2>
                                                
						<ul class="catalog1 category-products">
<?= \app\components\MenuWidgetned::widget(['tpl' => 'menuned' ]) ?>
</ul>

<a href = "#"></a>	
                 
       <div class="brands-name left-sidebar" id="brands_products1">
	   <div id="fixed">   
       <center> <h2> поиск квартир </h2> </center>	
				
        <form method="get" action="<?= Url::to(['nedvigkvartiri/search' ]) ?>">
                
				<!------------------------------------->
   
             <?php $form = ActiveForm::begin(); ?>
			 <center><table class="table table-hover table-striped">
		  
		        <?php
                $model_obl = oblast::findAll([23,43,60,69]);
                foreach ($model_obl as $key => $item) {
					$model = $item;
				}				
                  $oblast1 = oblast::findAll([23,43,60,69]);
                foreach($oblast1 as $key => $item) {
                $id=$key;
				$oblast_region=$item; }
                $oblast = ArrayHelper::map($oblast1, 'id','oblast_region');
                $id_gorod1 = Goroda::find()->all();
                $id_gorod = ArrayHelper::map($id_gorod1, 'id','name');
               ?>
             
 <tr>
 <td>
   <?php 
     echo $form->field($model, 'oblast_region', ['template' => "{label}\n{input}"])
	 ->dropDownList($oblast,['id'=>'id_oblast','prompt' => '-Выберите регион-'])->label('Регион поиска');
   ?></td></tr>
   <?php
   
   $id_gorod1 = Goroda::find()->select(['id','name'])->indexBy('name')->all();
         foreach ($id_gorod1 as $name=>$value){
          $id_gorod=$value;
         $gorod=$name;
       }
	    $model_gor = Goroda::find()->all();
                foreach ($model_gor as $key => $item) {
					$id = $key;
					$model2 = $item;
				}	
         ?>
   <tr>
   <td>
   <?php 
// Child # 1
echo $form->field($model2, 'name', ['template' => "{label}\n{input}"])->widget(DepDrop::classname(), [
   
    'options'=>['id'=>'id_gorod'],
    'pluginOptions'=>[
       
        'depends'=>['id_oblast'],
        'placeholder'=>'-Можете выбрать город-',
        'url'=>Url::to(['/site/gorod'])
    ]
])->label('Город');
?>
</td>
</tr>
</table></center>

<center><table class="table table-hover table-striped">
<?php
      $model_rai = raion::find()->all();
                foreach ($model_rai as $key => $item) {
					$id = $key;
					$model3 = $item;
				}	
 ?>
 <tr>
<td><?php
  echo $form->field($model3, 'raion', ['template' => "{label}\n{input}"])->widget(DepDrop::classname(), [
    'pluginOptions'=>[
        'depends'=>['id_oblast','id_gorod'],
        'placeholder'=>'-Выберите район-',
        'url'=>Url::to(['/site/raion'])
    ]    
])->label('Район');?></td>

  
		
           <!------------------------------------->
				 
				
				<td>
                   <label>Операция</label>
               
<select id="product-category_id" class="form-control" name="Operaciya[id]">
   
     <?= \app\components\MenuWidgetoperaciya::widget (['tpl'=> 'select_operaciya', 'model' => $model])?>

</select>
</td></tr>
          
 
			   <tr>
			   <td>
                <label>Вид</label>
               
<select id="product-category_id" class="form-control" name="Vidnedvig[id]">
   
     <?= \app\components\MenuWidgetvidnedvig::widget (['tpl'=> 'select_vidnedvig', 'model' => $model])?>

</select>
           </td>
            <td>    
                <label>Комнат</label>
               
<select id="product-category_id" class="form-control" name="Komnat[id]">
   
     <?= \app\components\MenuWidgetkomnat::widget (['tpl'=> 'select_komnat', 'model' => $model])?>

</select>
</td>
</tr></table></center>
               <center><table class="table table-hover table-striped">
			     <tr>
                <td><input type="text" style = "height: 30px; width: 200px;" placeholder="улица" name="p4"/>
				<small class="ttip">что это ?<span><?=$ulica;?></span></small></td></tr>
			   <tr>
                <td><input type="text" style = "height: 30px; width: 200px;" placeholder="текст в описании" name="p3"/>
				<small class="ttip">что это ?<span><?=$text;?></span></small></td></tr>
               <tr>
                <td><input type="tel" style = "height: 30px; width: 200px;" placeholder="мин. площадь цифрами" name="p1"/></td></tr>
               <tr><td> <input type="tel" style = "height: 30px; width: 200px;" placeholder="макс. цена цифрами" name="p2"/></td></tr>
                 </table></center>
				
				<center><table class="table table-hover table-striped">
                <tr><td>
                <center><input id="drugie" class="drugie" type="submit" class="btn btn-warning" name="search" value="ПОИСК"/></center></td></tr>
				</table></center><?php ActiveForm::end();?> <br><br>
                        
        
        </form>
        </div>	   
			</div>	
			</div>
					</div>
			
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
                                            
        <style>
        .product-image-wrapper1{
	border:3px solid #cccccb!important;
	overflow: auto;
	margin-bottom:10px;
    height: max-content;
	max-width: 320px;	
		
}
       .product-image-wrapper11{
	border:4px solid red;
	overflow: auto;
	margin-bottom:10px;
    height: max-content;
	max-width: 340px;
	border-radius: 8px;		
		
}

       
        </style>
		                            <?php if (!empty($kvartiri)){ ?>
												
												
                                                <?php foreach ($kvartiri as $kvartiris): ?>
		                                     <?php endforeach; ?>
									<?php } ?>
		                            <?php $page=$_GET[page]  ?>
                                            
                                             <h1 style = "font-size: 15px; 
						             margin-top: 1px; 
									 color: #397F8C; 
									 text-transform: uppercase; 
									 font-weight: 700;
									 font-family: 'Roboto', sans-serif;" class="title text-center"><?php if (!empty($kvartiris->kolichestvo_komnat)){ 
									 echo "$kvartiris->kolichestvo_komnat".' '. комнатные;
									 }elseif(!empty($k)){
									  echo "$k".' '. комнатные;
									 }?> квартиры <?php if($p2){ echo до.' '."$p2".' р. ';}?><?php if(!empty($page)){ echo страница.' '."$page"; }?>
											<a href ="<?= Url::to (['cart/kvart']) ?>" class= "showSearchkvartt">
										  <span class="letter"><img src="/images/nastroika.png" alt="поиск"></span></a>	
											</h1>
                                           
                                           
                                        <?php// debug ($_GET['Raion']['raion']) ?>
                                             
                                                <?php if (!empty($kvartiri)): ?>
												
												
                                                <?php foreach ($kvartiri as $kvartiris): ?>
												<?php if ($kvartiris->moder == 1) { ?>
						<?php
						
								     if ($kvartiris->gorod ==0){         
		  
									   }										
									   else {$gorod1 = Goroda::find()->select('name')
									->where(['id' => $kvartiris->gorod])
									->one();
									   foreach($gorod1 as $item) {
									   $kvartiris->gorod = $item;}}; 
							
											if ($kvartiris->raion ==0){         
						  
												}
									      else {$raion1 = raion::find()->select('raion')
										   ->where(['id' => $kvartiris->raion])->one();
											 foreach($raion1 as $item) {
										   $kvartiris->raion = $item;}}
						   
						  
						                   $pl = $kvartiris -> plochad_obchy;
											 $oper = $kvartiris -> operaciya;
											$tip = $kvartiris -> type;
											$kom = $kvartiris -> kolichestvo_komnat;
											$gor = $kvartiris -> gorod;
											$price = $kvartiris -> price;
					  
                                            ?>
												
                                                <?php $mainImg = $kvartiris->getImage();  ?>
						<div class="col-sm-3 animated pulse faster">
							<center><?php if(!empty($kvartiris->videl)){ ?> 
						<div class="product-image-wrapper11">
						<?php } else { ?> 
							<div class="product-image-wrapper1">
						<?php } ?>
							<div itemscope itemtype="http://schema.org/Product">
								<div class="single-products1">
									<div class="productinfo text-center">
										  <?php if ($mainImg['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                  <a href="<?= Url::to(['nedvigkvartiri/'.$kvartiris->id,'ads' =>'kvartira_plochad_'.$kvartiris->plochad_obchy.'_komn_'.$kvartiris->kolichestvo_komnat.'_price_'.$kvartiris->price]) ?>">
												  <li><?=Html::img($mainImg->getUrl(''), ['alt' => "$kom" .' комнатная  🏙  ' ."$tip" .', '. "$oper".', '."$pl".' м.кв. '."$price".' руб. '."$gor"]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												  <a href="<?= Url::to(['nedvigkvartiri/'.$kvartiris->id,'ads' =>'kvartira_plochad_'.$kvartiris->plochad_obchy.'_komn_'.$kvartiris->kolichestvo_komnat.'_price_'.$kvartiris->price]) ?>">
												  <li><?=Html::img($mainImg->getUrl('335X210'), ['alt' => "$kom" .' комнатная  🏙  ' ."$tip" .', '. "$oper".', '."$pl".' м.кв. '."$price".' руб. '."$gor"]) ?></li></a>
												 
												                             <?php } ?>
				<p itemprop="name">  <a style="color:#034176" href="<?= Url::to(['nedvigkvartiri/'.$kvartiris->id,'ads' =>'kvartira_plochad_'.$kvartiris->plochad_obchy.'_komn_'.$kvartiris->kolichestvo_komnat.'_price_'.$kvartiris->price]) ?>">
				<strong><?= $kvartiris->operaciya ?> <?= $kvartiris->kolichestvo_komnat ?> комнатной квартиры, г.<?= $kvartiris->gorod ?></a></p></strong>
				
				                 <p><h5><b>Район:</b> <?= $kvartiris->raion ?></h5></p> 
				
				                <p><b>ул.</b> <?= $kvartiris->street ?></p>
				
                                  <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">					
										<h5 itemprop="price"><b>цена:</b> <?= $formatted_number = number_format($kvartiris->price, 0, ',', ' '); ?> руб.</h5>
										<meta itemprop="priceCurrency" content="RUB">  
									</div>
                                        
									</div>
									
                                                   
								</div>
								 <?php if ($kvartiris->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>
                                                                    
                                                    <?php if ($kvartiris->sale):?>
                                                                    <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'sale' ]) ?>
                                                                    <?php endif ?>
																	
											<p><a href ="<?= Url::to (['cart/addkvart', 'id'=> $kvartiris->id]) ?>" data-id = "<?= $kvartiris->id?>"
                          class="btn-iz add-to-cartkvart"><img class="animate1" src="/images/iz.png" alt=""></span></a></p>	

                           <div class="btn-podrob">
									 <ul class="nav navbar-nav collapse navbar-collapse">        
						 <li class="dropdown"><img class="animate1" src="/images/podrobno5.png" alt="">		    			 
							     <ul role="menu" class="sub-menu1">
							
                        <li itemprop="description"> КРАТКОЕ ОПИСАНИЕ:<hr> <?= mb_substr($kvartiris->opisanie, 0, 150);  ?><br>
									  <a href="<?= Url::to(['nedvigkvartiri/'.$kvartiris->id,'ads' =>'kvartira_plochad_'.$kvartiris->plochad_obchy.'_komn_'.$kvartiris->kolichestvo_komnat.'_price_'.$kvartiris->price]) ?>" class="btn btn-default1">подробнее о квартире</a>
						</li>
							
							     </ul>
							     </li>				
								</ul>
								      </div>

                                 <div id="brands_products2">
									  <div class="btn-podrob">
									<small class="podrob"><img class="animate1" src="/images/podrobno5.png" alt="">
									<span>КРАТКОЕ ОПИСАНИЕ:<hr><?= mb_substr($kvartiris->opisanie, 0, 230);  ?><br>
									 <a href="<?= Url::to(['nedvigkvartiri/'.$kvartiris->id,'ads' =>'kvartira_plochad_'.$kvartiris->plochad_obchy.'_komn_'.$kvartiris->kolichestvo_komnat.'_price_'.$kvartiris->price]) ?>" class="btn btn-default1">подробнее о квартире</a>
									 <a href="tel:<?= $kvartiris -> telephone ?>" target="_blank" class="btn btn-default1"> позвонить</a>
									  
									</span></small>
									 </div>
									</div> 	    									  
                                 </div>
							</div>
						</div>
                                                <?php $i++ ?>
                                                <?php if ($i % 4 == 0):?>
                                                     <div class="clearfix"></div>
                                                
                                                <?php endif; ?>
												 <?php } ?>
                                                <?php endforeach; ?>
                                                <div class="clearfix"></div>
                                                <center><?php 
                                                echo LinkPager::widget([
                                                'pagination' => $pages,
                                                   ]);
                                                 ?></center>                                        
						<?php else:?>
						<a href = "#"></a>
						<table class="table table-hover table-striped"> 
						<tr align="center">
                                               <td align="center"> <h4>К сожалению по Вашему запросу ничего не найдено ((</h4></td>
						</tr>						
						</table>
                                                
						<?php endif; ?>
                                                
                       <div class="clearfix"></div>
                               </center>             
					</div><!--features_items-->
					
					<table class="table table-hover table-striped"> 
       <tr align="center">
		<td align="center"><input class="button" type="button" value="Вернуться назад" onclick="javascript:history.go(-1)" /></td>
	</tr>
   </table>
				</div>
			</div>
		</div>
	</section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>	
<script>
 $(function() {
		var offset = $("#fixed").offset();
		var topPadding = 70;
		$(window).scroll(function() {
			if ($(window).scrollTop() > offset.top) {
				$("#fixed").stop().animate({marginTop: $(window).scrollTop() - offset.top + topPadding});
			}
			else {$("#fixed").stop().animate({marginTop: 0});};});
	});
</script>









