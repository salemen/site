<?
use yii\helpers\Html;
use app\assets\AppAsset;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\models\Category;
use app\models\Avtocategory;
use app\models\Avtoleg;
use kartik\depdrop\DepDrop;
use yii\data\Pagination;
use yii\widgets\LinkPager;
use app\modules\admin\models\Avtokuzov;
use app\modules\admin\models\Avtokorobka;
use app\modules\admin\models\Avtodvigatel;
use app\modules\admin\models\Avtoprivod;
use app\modules\admin\models\Avtosostoyanie;
use app\modules\admin\models\Avtogod;
use app\modules\admin\models\Marka;
use app\modules\admin\models\Model;
use app\modules\admin\models\Oblast;
use kartik\select2\Select2; // or kartik\select2\Select2
use yii\web\JsExpression;

AppAsset::register($this);
?>


 
<section id="advertisement">
		
	</section>
	
	<section>
		<div class="container" style = "padding-top: 10px">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Категории Автотехника</h2>
						
                                                
						<ul class="catalog1 category-products">
<?= \app\components\MenuWidgetavto::widget(['tpl' => 'menuavto' ]) ?>
</ul>
<a href = "#"></a>	
                                              
					 <div id="brands_products1"> 
					 
					 <center> <h2> Поиск легковых авто </h2> </center>	

 <form method="get" action="<?= yii\helpers\Url::to(['avtoleg/search' ]) ?>">	
 
 
 <style>
	.table {
  max-width: 600px;
  
}
    td {
		max-width: 130px;
	}
	</style>
                 <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?> 
			 <center><table class="table table-hover table-striped"> 
       
			  
	
	           <?php
	         ///////////////////Автотехника///////////////////////
				
				 $marka1 = marka::find()->all();
                foreach($marka1 as $key => $item) {
				$modelavto = $item;}
                $marka = ArrayHelper::map($marka1, 'id','mark');
				
				 $model_obl = oblast::findAll([23,43,60,69]);
                foreach ($model_obl as $key => $item) {
					$model = $item;
				}				
                $oblast1 = oblast::findAll([23,43,60,69]);
                foreach($oblast1 as $key => $item) {
                $id=$key;
				$oblast_region=$item; }
                $oblast = ArrayHelper::map($oblast1, 'id','oblast_region');
               ?>
      <tr>
<td>
<?php
echo $form->field($model, 'oblast_region', ['template' => "{label}\n{input}"])
->dropDownList( $oblast,['id'=>'id_oblast','prompt' => '-Выберите регион/область-'])->label('Регион поиска');
?>
</td>
</tr>   
                </table></center>
                <center><table class="table table-hover table-striped">      
<tr>
<td>
<?php
echo $form->field($modelavto, 'mark')->dropDownList($marka,['id'=>'mark_id','prompt' => 'Выберите марку']);
?>
</td>

<?php
   $id_model1 = model::find()->select(['id','name'])->all();
         foreach ($id_model1 as $key=>$item){
          $modelmark=$item;
		  
       }?> 
   
<td>
 <?php    
// Child # 1
 echo $form->field($modelmark, 'name')->widget(DepDrop::classname(), [
   
    'options'=>['id'=>'id_model'],
    'pluginOptions'=>[ 
        'depends'=>['mark_id'],
        'placeholder'=>'Выберите модель',
        'url'=>Url::to(['/site/model'])
    ]
]); 
?>
 </td> 
</tr>


<tr>
<td>
                 <label>Год выпуска от:</label>
								 
               
<select id="product-category_id" class="form-control" name="godot[id]">

        
    <?= \app\components\MenuWidgetgod::widget (['tpl'=> 'select_god', 'model' => $model])?>

</select>
</td>
<td>

                  <label>Год выпуска до:</label>
               
<select id="product-category_id" class="form-control" name="goddo[id]">
   
     <?= \app\components\MenuWidgetgod::widget (['tpl'=> 'select_god', 'model' => $model])?>

</select>
</td>
</tr>


<tr>
<td>
 
                <label>Тип двигателя</label>
               
<select id="product-category_id" class="form-control" name="tipdvig[id]">
   
     <?= \app\components\MenuWidgettipdvig::widget (['tpl'=> 'select_tipdvig', 'model' => $model])?>

</select>
 </td>               
  <td>              
                <label>Тип КПП</label>
               
<select id="product-category_id" class="form-control" name="tipkpp[id]">
   
     <?= \app\components\MenuWidgettipkpp::widget (['tpl'=> 'select_tipkpp', 'model' => $model])?>

</select>
</td>
</tr>


<tr>
<td>
                <label>Тип кузова</label>
               
<select id="product-category_id" class="form-control" name="tipkuzov[id]">
   
     <?= \app\components\MenuWidgettipkuzov::widget (['tpl'=> 'select_tipkuzov', 'model' => $model])?>

</select>
</td>

 <td>              

                <label>Состояние</label>
               
<select id="product-category_id" class="form-control" name="sost[id]">
   
     <?= \app\components\MenuWidgetsost::widget (['tpl'=> 'select_sost', 'model' => $model])?>

</select>
</td>
</tr></table></center>

           <center><table class="table table-hover table-striped">
               <tr><td>
                <input type="tel" style = "height: 30px; width: 200px;" placeholder="макс. цена цифрами" name="p1"/>
                </td></tr> </table></center>
                 <center><table class="table table-hover table-striped">
                <tr><td>
                <center><input id="drugie" class="drugie" type="submit" class="btn btn-warning" name="search" value="ПОИСК"></center>
                 </td></tr> </table></center>      
                <br><br>
				<?php $form = ActiveForm::end(); ?>
  
        </form>
					 
					 </div>
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
                                            
                                           <style>
         .product-image-wrapper1{
	border:3px solid #e2e2de!important;
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
                                            
                                            <h2 class="title text-center"> Расширенный поиск автомобилей
											  <a href ="<?= yii\helpers\Url::to (['cart/avtoleg']) ?>" class= "showSearchleg">
											   <span class="letter"><img src="/images/nastroika.png" alt="поиск"></span></a>	
											</h2>
                                                 
												
                                                <?php if (!empty($avtoleg1)){ ?>
												
												
                                                <?php foreach ($avtoleg1 as $avtolegs):
                                                  if ($avtolegs->moder == 1) { 
												  
                                                 $marka = marka::find()->select('mark')
                                                  ->where(['id' => $avtolegs -> marka])->one();
                                                  foreach($marka as $item) {
                                                   $avtolegs -> marka = $item;}      
       
                                                   if ($avtolegs -> model ==0){         
      
	                                                    }
	                                                else {$model = model::find()->select('name')
                                                    ->where(['id' => $avtolegs -> model])->one();
                                                    foreach($model as $item) {
                                                    $avtolegs -> model = $item;}};
													
												?>
												
					
                                                <?php $mainImg = $avtolegs->getImage();  ?>
						<div class="col-sm-3 animated pulse faster">
						
						<?php 
		  $s = $avtolegs->marka;
								
		  //$s = (string) $s; // преобразуем в строковое значение
		  //$s = strip_tags($s); // убираем HTML-теги
		  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
		  $s = trim($s); // убираем пробелы в начале и конце строки
		  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
		  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
		  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
		  $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
	   
		  $s1 = $avtolegs->model;
								
		  //$s = (string) $s; // преобразуем в строковое значение
		  //$s = strip_tags($s); // убираем HTML-теги
		  $s1 = preg_replace("/\s+/", ' ', $s1); // удаляем повторяющие пробелы
		  $s1 = trim($s1); // убираем пробелы в начале и конце строки
		  $s1 = function_exists('mb_strtolower') ? mb_strtolower($s1) : strtolower($s1); // переводим строку в нижний регистр (иногда надо задать локаль)
		  $s1 = strtr($s1, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
		  $s1 = preg_replace("/[^0-9a-z-_ ]/i", "", $s1); // очищаем строку от недопустимых символов
		  $s1 = str_replace(" ", "-", $s1); // заменяем пробелы знаком минус
		  ?>
						
							<center><?php if(!empty($avtolegs->videl)){ ?> 
						<div class="product-image-wrapper11">
						<?php } else { ?> 
							<div class="product-image-wrapper1">
						<?php } ?>
								<div class="single-products1">
									<div class="productinfo text-center">
									
										
										  <?php if ($mainImg['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                   <a href="<?= yii\helpers\Url::to(['avtoleg/'.$avtolegs->id, 'ads'=>$s.'_'.$s1.'_price_'.$avtolegs->price]) ?>">
												  <li><?=Html::img($mainImg->getUrl(''), ['alt'=> $avtolegs->marka]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												  <a href="<?= yii\helpers\Url::to(['avtoleg/'.$avtolegs->id, 'ads'=>$s.'_'.$s1.'_price_'.$avtolegs->price]) ?>">
												  <li><?=Html::img($mainImg->getUrl('335X210'), ['alt'=> $avtolegs->marka]) ?></li></a>
												 
												                             <?php } ?>
										 
										 
				<p><h5><?= $avtolegs -> marka ?> <?= $avtolegs -> model ?></h5></p>
				     <h5><b>год:</b> <?= $avtolegs -> god ?></h5>
					 <h5><b>состояние:</b> <?= $avtolegs -> sostoyanie ?></h5>
										<h5><b>cтоимость:</b> <?= $avtolegs -> price ?> <b>руб.</b></h5>
										
		
									</div>
									
                                                    <?php if ($product->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>
                                                                    
                                                    <?php if ($product->sale):?>
                                                                    <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'sale' ]) ?>
                                                                    <?php endif ?>
																	
								 <div class="btn-podrob">
									 <ul class="nav navbar-nav collapse navbar-collapse">        
							   <li class="dropdown"><img class="animate1" src="/images/podrobno5.png" alt="">		    			 
							     <ul role="menu" class="sub-menu1">
							
                        <li>КРАТКОЕ ОПИСАНИЕ:<hr> <?= mb_substr($avtolegs->opisanie, 0, 150);  ?><br>
									  <a href="<?= yii\helpers\Url::to(['avtoleg/'.$avtolegs->id, 'ads'=>$s.'_'.$s1.'_price_'.$avtolegs->price]) ?>" class="btn btn-default1">подробнее</a>
						</li>
							
							     </ul>
							   </li>				
								</ul>
								      </div>
									  
						 <div id="brands_products2">
									  <div class="btn-podrob">
									<small class="podrob"><img class="animate1" src="/images/podrobno5.png" alt="">
									<span>КРАТКОЕ ОПИСАНИЕ:<hr><?= mb_substr($avtolegs->opisanie, 0, 230);  ?><br>
									 <a href="tel:<?= $avtolegs -> telephone ?>" target="_blank" class="btn btn-default1"> позвонить</a>
									 <a href="<?= yii\helpers\Url::to(['avtoleg/'.$avtolegs->id, 'ads'=>$s.'_'.$s1.'_price_'.$avtolegs->price]) ?>" class="btn btn-default1">подробнее</a>
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
                                               <center> <?php 
                                                echo LinkPager::widget([
                                                'pagination' => $pages,
                                                   ]);
                                                 ?> </center>                                       
						<?php } else {?>
						<a href = "#"></a>
						<center><table class="table table-hover table-striped"> 
						<tr align="center">
                                               <td align="center"> <h4>К сожалению по Вашему запросу ничего не найдено ((</h4></td>
						</tr>						
						</table></center>
                                                
						<?php } ?>
                                                
                       <div class="clearfix"></div>
                            </center>                
					</div><!--features_items-->
					
					<center><table class="table table-hover table-striped"> 
       <tr align="center">
		<td align="center"><input class="button" type="button" value="Вернуться назад" onclick="javascript:history.go(-1)" /></td>
	</tr>
   </table></center>
				</div>
			</div>
		</div>
	</section>






