<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
 <section id="advertisement">
		
	</section> 
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Категории</h2>
                                                
						<ul class="catalog1 category-products">
<?= \app\components\MenuWidgetned::widget(['tpl' => 'menuned' ]) ?>
</ul>
                                              
				<a href = "#"></a>		
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
                                            
                                            <h2 class="title text-center">Поиск по запросу: <?= Html::encode($q) ?></h2>
                                                
                                                <?php if (!empty($nedvigkvartiris)): ?>
                                                <?php foreach ($nedvigkvartiris as $nedvigkvartiri): ?>
                                          
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										
                                                                          
                                                                        
                                                                    
										<h4><?= $nedvigkvartiri -> price ?> руб.</h4>
										<p><a href ="<?= yii\helpers\Url::to(['nedvigkvartiri/'.$nedvigkvartiri->id])  ?>"><?= $nedvigkvartiri->operaciya ?></a></p>
                                             <a href="<?= yii\helpers\Url::to(['nedvigkvartiri/'.$nedvigkvartiri->id]) ?>" class="btn btn-default">подробнее</a>
<!--										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>-->
									</div>
<!--									<div class="product-overlay">
										<div class="overlay-content">
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>-->
                                                    <?php if ($nedvigkvartiri->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>
                                                                    
                                                    <?php if ($nedvigkvartiri->sale):?>
                                                                    <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>

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
                                                <h4>Ничего не найдено.</h4>
                                                
						<?php endif; ?>
                                                
                                                <div class="clearfix"></div>
                                                
						
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>





