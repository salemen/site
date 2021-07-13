<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\models\Nedvigkvartiri;
use app\modules\admin\models\Raion;
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
                                             
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
                                            
        <style>
        .product-image-wrapper1{
	border:3px solid #efefeb;
	overflow: auto;
	margin-bottom:5px;
    height: max-content;;
	max-width: 400px;	
		
}
        .single-products1{
	max-height: 400px;
    max-width: 400px;
    margin-bottom: 5px;		
		}
        </style>
                                            
                                            <h2 class="title text-center">Другие квартиры продавца</h2>
                                                 
                                           
                                        <?php// debug ($_GET['Raion']['raion']) ?>
                                             
                                                <?php if (!empty($kvartiri)): ?>
												
												
                                                <?php foreach ($kvartiri as $kvartiris): ?>
												<?php if ($kvartiris->moder == 1) { ?>
						<?php
						if ($kvartiris->raion ==0){         
      
	                        }
	             else {$raion1 = raion::find()->select('raion')
                       ->where(['id' => $kvartiris->raion])->one();
                         foreach($raion1 as $item) {
                       $kvartiris->raion = $item;}}
					   
                      
                                            ?>
												
                                                <?php $mainImg = $kvartiris->getImage();  ?>
						<div class="col-sm-3">
							<div class="product-image-wrapper1">
								<div class="single-products1">
									<div class="productinfo text-center">
										   <?php if ($mainImg['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                  <a href="<?= yii\helpers\Url::to(['nedvigkvartiri/'.$kvartiris->id,'ads' =>'kvartira_plochad_'.$kvartiris->plochad_obchy.'_komn_'.$kvartiris->kolichestvo_komnat.'_price_'.$kvartiris->price]) ?>"
												  <li><?=Html::img($mainImg->getUrl(''), ['alt' => $kvartiris->kolichestvo_komnat.' комнатная квартира']) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												  <a href="<?= yii\helpers\Url::to(['nedvigkvartiri/'.$kvartiris->id,'ads' =>'kvartira_plochad_'.$kvartiris->plochad_obchy.'_komn_'.$kvartiris->kolichestvo_komnat.'_price_'.$kvartiris->price]) ?>"
												  <li><?=Html::img($mainImg->getUrl('335X210'), ['alt' => $kvartiris->kolichestvo_komnat.' комнатная квартира']) ?></li></a>
												 
												                             <?php } ?>
				<p><h5><?= $kvartiris->operaciya ?> <?= $kvartiris->kolichestvo_komnat ?> ком. квартиры</h5></p>
										<h5>Стоимость <?= $formatted_number = number_format($kvartiris->price, 0, ',', ' '); ?> руб.</h5>
										
									
                                                <p><h5>Район: <?= $kvartiris->raion ?></h5></p> 
												<p>ул. <?= $kvartiris->street ?></p>
       
									</div>
									
                                                   
								</div>
								 <?php if ($kvartiris->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>
                                                                    
                                                    <?php if ($kvartiris->sale):?>
                                                                    <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'sale' ]) ?>
                                                                    <?php endif ?>

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
                                                 ?> </center>                                       
						<?php else:?>
						<a href = "#"></a>
						<table class="table table-hover table-striped"> 
						<tr align="center">
                                               <td align="center"> <h4>Других объявлений нет</h4></td>
						</tr>						
						</table>
                                                
						<?php endif; ?>
                                                
                       <div class="clearfix"></div>
                                            
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






