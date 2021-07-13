<?php
 

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use app\models\Avtoleg;
use app\models\Avtogruz;
use app\models\Avtokomplekt;
use app\models\Avtokomplekttip;
use app\models\Avtomoto;
use app\models\Avtospec;
use app\models\Avtovodnik;
use app\models\Avtocategory;
use app\models\Category;
use app\modules\admin\models\Oblast;
use app\modules\admin\models\Marka;
use app\modules\admin\models\Model;
use GeoIp2\Database\Reader;
use kartik\select2\Select2; // or kartik\select2\Select2
use yii\web\JsExpression;

AppAsset::register($this);

?>
 
  <?php $id = Yii::$app->request->get('id'); ?>

	<section>
		<div class="container" style="padding-top: 10px">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar" style="padding-left: 5px;">
						<h2>Категории автотехники</h2>
						
                                                
						<ul class="catalog1 category-products">
<?= \app\components\MenuWidgetavto::widget(['tpl' => 'menuavto' ]) ?>
</ul>
                                              
				<a href = "#"></a>	

            <div id="brands_products1">
				 
				
				<!--ПОИСК ЛЕГКОВЫХ-->
				
				 <?php if($id == 1){?>
				 
				  <center> <h2> Поиск легковых авто </h2> </center>	

 <form method="get" action="<?= yii\helpers\Url::to(['avtoleg/search' ]) ?>">	
 
 
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
                 <label>Год от</label>
								 
               
<select id="product-category_id" class="form-control" name="godot[id]">

        
    <?= \app\components\MenuWidgetgod::widget (['tpl'=> 'select_god', 'model' => $model])?>

</select>
</td>
<td>

                  <label>Год до</label>
               
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
					 
				 
				 
				 <?php } elseif ($id==2) {?>
				
				<!--ПОИСК ГРУЗОВЫЕ-->
				
				<center> <h2> Поиск грузовых авто </h2> </center>	

 <form method="get" action="<?= yii\helpers\Url::to(['avtogruz/search' ]) ?>">	
 
 
	
	          <?php   $model_obl = oblast::findAll([23,43,60,69]);
                foreach ($model_obl as $key => $item) {
					$model = $item;
				}				
                $oblast1 = oblast::findAll([23,43,60,69]);
                foreach($oblast1 as $key => $item) {
                $id=$key;
				$oblast_region=$item; }
                $oblast = ArrayHelper::map($oblast1, 'id','oblast_region');
               ?>
			   
                 <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?> 
			 <center><table class="table table-hover table-striped"> 
       
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
                 <label>Год от</label>
								 
               
<select id="product-category_id" class="form-control" name="godot[id]">

        
    <?= \app\components\MenuWidgetgod::widget (['tpl'=> 'select_god', 'model' => $model])?>

</select>
</td>
<td>

                  <label>Год до</label>
               
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
  
</tr>


<tr>
<td>
                <label>Тип</label>
               
<select id="product-category_id" class="form-control" name="tipkuzov[id]">
   
     <?= \app\components\MenuWidgettipavtogruz::widget (['tpl'=> 'select_tipavtogruz', 'model' => $model])?>

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
               <center> <input id="drugie" class="drugie" type="submit" class="btn btn-warning" name="search" value="ПОИСК"></center>
                 </td></tr> </table></center>      
                <br><br>
				<?php $form = ActiveForm::end(); ?>
  
        </form>

				
				 <?php } elseif ($id == 3) {?>
				 
				 <!--ПОИСК СПЕЦТЕХНИКА-->
				 
				 <center> <h2> поиск спецтехники </h2> </center>	

 <form method="get" action="<?= yii\helpers\Url::to(['avtospec/search' ]) ?>">	
 
 
  
	          <?php   $model_obl = oblast::findAll([23,43,60,69]);
                foreach ($model_obl as $key => $item) {
					$model = $item;
				}				
                  $oblast1 = oblast::findAll([23,43,60,69]);
                foreach($oblast1 as $key => $item) {
                $id=$key;
				$oblast_region=$item; }
                $oblast = ArrayHelper::map($oblast1, 'id','oblast_region');
               ?>
			   
	
			   
                 <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?> 
			 <center><table class="table table-hover table-striped"> 
       
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
                 <label>Год от</label>
								 
               
<select id="product-category_id" class="form-control" name="godot[id]">

        
    <?= \app\components\MenuWidgetgod::widget (['tpl'=> 'select_god', 'model' => $model])?>

</select>
</td>
<td>

                  <label>Год до</label>
               
<select id="product-category_id" class="form-control" name="goddo[id]">
   
     <?= \app\components\MenuWidgetgod::widget (['tpl'=> 'select_god', 'model' => $model])?>

</select>
</td>
</tr>


<tr>
<td>
                <label>Тип</label>
               
<select id="product-category_id" class="form-control" name="tipkuzov[id]">
   
     <?= \app\components\MenuWidgettipavtospec::widget (['tpl'=> 'select_avtospectip', 'model' => $model])?>

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
                <center><input id="drugie" class="drugie" type="submit" class="btn btn-warning" name="search" value="ЗАПУСТИТЬ ПОИСК"></center>
                 </td></tr> </table></center>      
                <br><br>
				<?php $form = ActiveForm::end(); ?>
  
        </form>
				 
				 <?php } elseif ($id == 4) {?>
				 
				    <!--ПОИСК МОТОТЕХНИКИ-->
					
			<center> <h2> поиск мототехники </h2> </center>	

 <form method="get" action="<?= yii\helpers\Url::to(['avtomoto/search' ]) ?>">	
 
	
	                <?php   $model_obl = oblast::findAll([23,43,60,69]);
                foreach ($model_obl as $key => $item) {
					$model = $item;
				}				
                 $oblast1 = oblast::findAll([23,43,60,69]);
                foreach($oblast1 as $key => $item) {
                $id=$key;
				$oblast_region=$item; }
                $oblast = ArrayHelper::map($oblast1, 'id','oblast_region');
               ?>
			   
                 <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?> 
			 <center><table class="table table-hover table-striped"> 
       
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
                 <label>Год от</label>
								 
               
<select id="product-category_id" class="form-control" name="godot[id]">

        
    <?= \app\components\MenuWidgetgod::widget (['tpl'=> 'select_god', 'model' => $model])?>

</select>
</td>
<td>

                  <label>Год до</label>
               
<select id="product-category_id" class="form-control" name="goddo[id]">
   
     <?= \app\components\MenuWidgetgod::widget (['tpl'=> 'select_god', 'model' => $model])?>

</select>
</td>
</tr>


<tr>
<td>
                <label>Тип</label>
               
<select id="product-category_id" class="form-control" name="tipkuzov[id]">
   
     <?= \app\components\MenuWidgetavtomototip::widget (['tpl'=> 'select_avtomototip', 'model' => $model])?>

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
				 
				 
				 <?php } elseif ($id == 5||$id == 7||$id == 8||$id == 9||$id == 10||$id == 11||$id == 12||$id == 13||$id == 14) { ?>
			
			              <!--ПОИСК АВТОКОМПЛЕКТУЮЩИХ-->
					
			<center> <h2> поиск комплектующих </h2> </center>	
			
			<form method="get" action="<?= yii\helpers\Url::to(['avtokomplekt/search' ]) ?>">	
 
 
  <style>
	.table {
  max-width: 550px;
  
}
    td {
		max-width: 130px;
	}
	</style>
	
	              <?php   $model_obl = oblast::findAll([23,43,60,69]);
                foreach ($model_obl as $key => $item) {
					$model = $item;
				}				
                 $oblast1 = oblast::findAll([23,43,60,69]);
                foreach($oblast1 as $key => $item) {
                $id=$key;
				$oblast_region=$item; }
                $oblast = ArrayHelper::map($oblast1, 'id','oblast_region');
               ?>
	
                 <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?> 
			 <center><table class="table table-hover table-striped"> 
       
			 
	           <?php
	         ///////////////////Автотехника///////////////////////
				
				 $marka1 = marka::find()->all();
                foreach($marka1 as $key => $item) {
				$modelavto = $item;}
                $marka = ArrayHelper::map($marka1, 'id','mark');
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
                <label>тип (начните ввод)</label>
               

   
     <!-------Живой поиск--------->
						 
						 <style>
						 .form-group {
						 margin-bottom: 2px;
						 margin-left: 5px;
						 margin-right: 5px;						
                         border-radius: 8px;
						 }
						 
						
						 .someClass{
						    margin-bottom: 3px; 
					    	text-align: center !important;
							color: #160378;
							font-weight: normal;
							font-size: 15px;
						 }
						 
					  .select2-container {                           						
						 border: 1px solid #ccc;
                         border-radius: 8px;
  -webkit-box-shadow: inset 0 1px 1px rgba(202, 43, 8, .076)!important;
          box-shadow: inset 0 1px 1px rgba(202, 43, 8, 0.4)!important;
  -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s!important;
       -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s!important;
          transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s!important;
						 }
						 
						 
						 
						 </style>
	
 <?php
	
	     $model_cat = avtocategory::find()->where(['not in', 'id', [1,2,3,4,5,6]])
			 ->all();
                foreach ($model_cat as $key => $item) {
					$id = $key;
					$model3 = $item;
				}	
				
   $url = Url::toRoute(['/cart/avto-list']);
   	

echo $form->field($model3, 'name', ['template' => "{label}\n{input}"])->widget(Select2::classname(), [
    'name' => 'kv-state-230',
    'options' => ['multiple'=>true, 'placeholder' => 'поиск, начните ввод....'],
    'pluginOptions' => [
        'allowClear' => true,
        'minimumInputLength' => 2,
        'ajax' => [
            'url' => $url,
			'type' =>"GET",
			//'contentType' => 'application/json; charset=utf-8',
            'dataType' => 'json',
            'data' => new JsExpression('function(params) { return {q:params.term}; }'),
        ],
		
        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
        'templateResult' => new JsExpression('function(name) { return name.text; }'),
        'templateSelection' => new JsExpression('function (name) { return name.text; }'),
    ],
])->label(false); ?> 
 
    <!-----------------------------></td>
</tr>

				
<tr>
<td>
<?php
echo $form->field($modelavto, 'mark')->dropDownList($marka,['id'=>'mark_id','prompt' => 'Выберите марку']);
?>
</td>
</tr>
<tr>
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

                <label>состояние</label>
             
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
                <center><input type="submit" class="btn btn-warning" name="search" value=""></center>
                 </td></tr> </table></center>      
                <br><br>
				<?php $form = ActiveForm::end(); ?>
  
        </form>		
				 <?php } elseif($id == 6) {?>
				
              <!--ПОИСК ВОДНОГО ТРАСПОРТА-->
			  
			  	<center> <h2>поиск водного транспорта</h2> </center>	

 <form method="get" action="<?= yii\helpers\Url::to(['avtovodnik/search' ]) ?>">	
 
 
	
	           <?php   $model_obl = oblast::findAll([23,43,60,69]);
                foreach ($model_obl as $key => $item) {
					$model = $item;
				}				
                  $oblast1 = oblast::findAll([23,43,60,69]);
                foreach($oblast1 as $key => $item) {
                $id=$key;
				$oblast_region=$item; }
                $oblast = ArrayHelper::map($oblast1, 'id','oblast_region');
               ?>
	
                 <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?> 
			 <center><table class="table table-hover table-striped"> 
       
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
                <label>тип</label>
               
<select id="product-category_id" class="form-control" name="tip[id]">
   
     <?= \app\components\MenuWidgetavtovodniktip::widget (['tpl'=> 'select_avtovodniktip', 'model' => $model])?>

</select>
</td>             
  

 <td>              

                <label>состояние</label>
               
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

			  
				 <?php } ?>
				
				<!--КОНЕЦ ПОИСКОВ--->
				
			</div>
								
				
					</div>
				</div>
				
				<style>
        .product-image-wrapper3{
	border:3px solid #e2e2de;
	overflow: auto;
	margin-bottom:10px;
    max-height: 300px;
	max-width: 320px;
    border-radius: 8px;		
		
}

.product-image-wrapper5{
	border:4px solid red;
	overflow: auto;
	margin-bottom:10px;
    max-height: 300px;
	max-width: 340px;
    border-radius: 8px;		
		
}
      
        </style>	
		
		
                             <?php $id = Yii::$app->request->get('id'); ?>
							 
				<center><div class="col-sm-9 padding-right ">
					<div class="features_items"><!--features_items-->
                                            
						<h1 style = "font-size: 16px; 
						             margin-top: 1px; 
									 color: #397F8C; 
									 text-transform: uppercase; 
									 font-weight: 700;
									 font-family: 'Roboto', sans-serif;" 
						    class="title text-center"><?= $avtocategory->name/* .' ('.$oblast.')' */ ?>
						<?php
						if ($id == 1){?>
							  <a href ="<?= yii\helpers\Url::to (['cart/avtoleg']) ?>" class= "showSearchleg">
							<span class="letter"><img src="/images/nastroika.png" alt="поиск"></span></a>	
						<?php }elseif($id == 2){?>
							 <a href ="<?= yii\helpers\Url::to (['cart/avtogruz']) ?>" class= "showSearchgruz">
							<span class="letter"><img src="/images/nastroika.png" alt="поиск"></span></a>	
						<?php }elseif($id == 3){ ?>
							<a href ="<?= yii\helpers\Url::to (['cart/avtospec']) ?>" class= "showSearchspec">
							<span class="letter"><img src="/images/nastroika.png" alt="поиск"></span></a>	
						<?php }elseif($id == 4){ ?>
							 <a href ="<?= yii\helpers\Url::to (['cart/avtomoto']) ?>" class= "showSearchmoto">
							<span class="letter"><img src="/images/nastroika.png" alt="поиск"></span></a>	
						<?php }elseif ($id == 5||$id == 7||$id == 8||$id == 9||$id == 10||$id == 11||$id == 12||$id == 13||$id == 14) { ?> 
							<a href ="<?= yii\helpers\Url::to (['cart/avtokomplekt']) ?>" class= "showSearchkomplekt">
							<span class="letter"><img src="/images/nastroika.png" alt="поиск"></span></a>	
						<?php }elseif($id == 6){ ?>
							<a href ="<?= yii\helpers\Url::to (['cart/avtovodnik']) ?>" class= "showSearchvodnik">
							<span class="letter"><img src="/images/nastroika.png" alt="поиск"></span></a>	
						<?php } ?>
						
						
						</h1>
                                                 
                                                <!--/////////////////////////ЛЕГКОВЫЕ////////////////////////-->
                                               
                                              <?php if($id == 1): ?>
                                                <?php if (!empty($avtoleg)): ?>
                                                <?php foreach ($avtoleg as $avtoleg): ?>
												<?php if ($avtoleg->moder == 1) { ?>
									<?php
							$marka1 = marka::find()->select('mark')
							->where(['id' => $avtoleg->marka])
							->one();
							   foreach($marka1 as $item) {
										$avtoleg->marka = $item;}
										
								  if (!$avtoleg->model){
								  
							  }else{ $model1 = model::find()->select('name')
							->where(['id' => $avtoleg->model])
							->one();
							   foreach($model1 as $item) {
							  $avtoleg->model = $item;} }     
                     
                                     ?>
						<div class="col-sm-3">
							<?php if(!empty($avtoleg->videl)){ ?> 
						<div class="product-image-wrapper5">
						<?php } else { ?> 
							<div class="product-image-wrapper3">
						<?php } ?>
								<div class="single-products1">
								
					<?php 
					  $s = $avtoleg->marka;
											
					  //$s = (string) $s; // преобразуем в строковое значение
					  //$s = strip_tags($s); // убираем HTML-теги
					  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
					  $s = trim($s); // убираем пробелы в начале и конце строки
					  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
					  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
					  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
					  $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
				   
					  $s1 = $avtoleg->model;
											
					  //$s = (string) $s; // преобразуем в строковое значение
					  //$s = strip_tags($s); // убираем HTML-теги
					  $s1 = preg_replace("/\s+/", ' ', $s1); // удаляем повторяющие пробелы
					  $s1 = trim($s1); // убираем пробелы в начале и конце строки
					  $s1 = function_exists('mb_strtolower') ? mb_strtolower($s1) : strtolower($s1); // переводим строку в нижний регистр (иногда надо задать локаль)
					  $s1 = strtr($s1, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
					  $s1 = preg_replace("/[^0-9a-z-_ ]/i", "", $s1); // очищаем строку от недопустимых символов
					  $s1 = str_replace(" ", "-", $s1); // заменяем пробелы знаком минус
				      ?>
								
									<div class="productinfo text-center">
                                                                            
														 <?php $model = Avtoleg::findOne($avtoleg->id);?>
																	
														 <?php $imageTitle = $model->getImage();?>
																  
																
														  <?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
																			 
													 
                                     <a href="<?= yii\helpers\Url::to(['avtoleg/'.$avtoleg->id, 'ads'=>$s.'_'.$s1.'_price_'.$avtoleg->price]) ?>">
												 <li><?=Html::img($imageTitle->getUrl(''), ['alt' => 'Продажа легково автомобиля, кузов '.$avtoleg->tip.' цена '.$avtoleg->price]) ?></li></a>
												                   
																			 <?php } else { ?> 
																			 
									 <a href="<?= yii\helpers\Url::to(['avtoleg/'.$avtoleg->id, 'ads'=>$s.'_'.$s1.'_price_'.$avtoleg->price]) ?>">
												  <li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => 'Продажа легково автомобиля, кузов '.$avtoleg->tip.' цена '.$avtoleg->price]) ?></li></a>
												 
												                             <?php } ?>
                                                                 
										
				  <p><a href ="<?= yii\helpers\Url::to(['avtoleg/'.$avtoleg->id, 'ads'=>$s.'_'.$s1.'_price_'.$avtoleg->price])  ?>"> 
				  Тип: <?= $avtoleg->tip ?></a></p>
                                                           <p><a> <?= $avtoleg->marka ?> <?= $avtoleg -> model ?></a></p>
                                                                               
                                                              <p>Пробег: <?=$avtoleg->probeg?> </p>
															  
                                          <h5>Цена: <?= $formatted_number = number_format($avtoleg->price, 0, ',', ' '); ?> руб.</h5>
									</div>

								</div>

								 <?php if ($avtoleg->new):?>
                                         <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                    <?php endif ?>
                         
                                 <?php if ($avtoleg->sale):?>
                                         <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'sale' ]) ?>
                                    <?php endif ?>
									
									<p><a href ="<?= yii\helpers\Url::to (['cart/addavto', 'id'=> $avtoleg->id]) ?>" data-id = "<?= $avtoleg->id?>"
                          class="btn-iz add-to-cartavto"><img class="animate1" src="/images/iz.png" alt=""></span></a></p>	
						  
						   <div class="btn-podrob">
									 <ul class="nav navbar-nav collapse navbar-collapse">        
							   <li class="dropdown"><img class="animate1" src="/images/podrobno5.png" alt="">		    			 
							     <ul role="menu" class="sub-menu1">
							
                        <li>КРАТКОЕ ОПИСАНИЕ:<hr> <?= mb_substr($avtoleg->opisanie, 0, 150);  ?><br>
									  <a href="<?= yii\helpers\Url::to(['avtoleg/'.$avtoleg->id, 'ads'=>$s.'_'.$s1.'_price_'.$avtoleg->price]) ?>" class="btn btn-default1">подробнее</a>
						</li>
							
							     </ul>
							   </li>				
								</ul>
								      </div>
									  
						 <div id="brands_products2">
									  <div class="btn-podrob">
									<small class="podrob"><img class="animate1" src="/images/podrobno5.png" alt="">
									<span>КРАТКОЕ ОПИСАНИЕ:<hr><?= mb_substr($avtoleg->opisanie, 0, 230);  ?><br>
									 <a href="tel:<?= $avtoleg -> telephone ?>" target="_blank" class="btn btn-default1"> позвонить</a>
									  <a href="<?= yii\helpers\Url::to(['avtoleg/'.$avtoleg->id, 'ads'=>$s.'_'.$s1.'_price_'.$avtoleg->price]) ?>" class="btn btn-default1">подробнее</a>
									</span></small>
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
                                                <?php 
                                                echo LinkPager::widget([
                                                'pagination' => $pages,
                                                   ]);
                                                 ?>                                        
						<?php else:?>
                                                
                                               <table >
                                                <center><h4>Здесь пока ничего нет. У Вас есть шанс быть первым <br><a href= "<?= yii\helpers\Url::to (['/admin']) ?>" <i class="fa fa-plus-square"></i> Подать объявление в разделе</a>.</h4></center>
                             </table> 
                                                
						<?php endif; ?>
                                                <?php endif; ?>
                                                <div class="clearfix"></div>
                                                                                               
                                              
                                                <!--////////////////////ГРУЗОВЫЕ///////////////////////-->
                                                
                                                 <?php if($id == 2): ?>
                                                <?php if (!empty($avtogruz)): ?>
                                                <?php foreach ($avtogruz as $avtogruz): ?>
												<?php if ($avtogruz->moder == 1) { ?>
						<div class="col-sm-3">
							<?php if(!empty($avtogruz->videl)){ ?> 
						<div class="product-image-wrapper5">
						<?php } else { ?> 
							<div class="product-image-wrapper3">
						<?php } ?>
								<div class="single-products1">
								
					  <?php 
					  $s1 = $avtogruz->marka;
											
					  //$s = (string) $s; // преобразуем в строковое значение
					  //$s = strip_tags($s); // убираем HTML-теги
					  $s1 = preg_replace("/\s+/", ' ', $s1); // удаляем повторяющие пробелы
					  $s1 = trim($s1); // убираем пробелы в начале и конце строки
					  $s1 = function_exists('mb_strtolower') ? mb_strtolower($s1) : strtolower($s1); // переводим строку в нижний регистр (иногда надо задать локаль)
					  $s1 = strtr($s1, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
					  $s1 = preg_replace("/[^0-9a-z-_ ]/i", "", $s1); // очищаем строку от недопустимых символов
					  $s1 = str_replace(" ", "-", $s1); // заменяем пробелы знаком минус
					  
					  
					  $s2 = $avtogruz->tip;
											
					  //$s = (string) $s; // преобразуем в строковое значение
					  //$s = strip_tags($s); // убираем HTML-теги
					  $s2 = preg_replace("/\s+/", ' ', $s2); // удаляем повторяющие пробелы
					  $s2 = trim($s2); // убираем пробелы в начале и конце строки
					  $s2 = function_exists('mb_strtolower') ? mb_strtolower($s2) : strtolower($s2); // переводим строку в нижний регистр (иногда надо задать локаль)
					  $s2 = strtr($s2, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
					  $s2 = preg_replace("/[^0-9a-z-_ ]/i", "", $s2); // очищаем строку от недопустимых символов
					  $s2 = str_replace(" ", "-", $s2); // заменяем пробелы знаком минус
				      ?>
								
									<div class="productinfo text-center">
                                                                            
															    <?php $model = Avtogruz::findOne($avtogruz->id);?>
																
																<?php $imageTitle = $model->getImage();?>
                                                                                                                                                 
                                                                <?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                 <a href="<?= yii\helpers\Url::to(['avtogruz/'.$avtogruz->id, 'ads'=>$s2.'_'.$s1.'_price_'.$avtogruz->price]) ?>">
												 <li><?=Html::img($imageTitle->getUrl(''), ['alt' => 'Продажа грузового автомобиля, тип '.$avtogruz->tip.' цена '.$avtogruz->price]) ?></li></a>
												                   
																			 <?php } else { ?> 
																			 
												 <a href="<?= yii\helpers\Url::to(['avtogruz/'.$avtogruz->id, 'ads'=>$s2.'_'.$s1.'_price_'.$avtogruz->price]) ?>">
												 <li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => 'Продажа грузового автомобиля, тип '.$avtogruz->tip.' цена '.$avtogruz->price]) ?></li></a>
												 
												                             <?php } ?>
                                                                            
                                                                             <h5><?= $avtogruz -> tip ?></h5>
                                                                     
										<p><a href ="<?= yii\helpers\Url::to(['avtogruz/'.$avtogruz->id, 'ads'=>$s2.'_'.$s1.'_price_'.$avtogruz->price])  ?>"><?= $avtogruz->marka ?></a></p>
                                                                               
                                                                                 <p>Год выпуска: <?=$avtogruz->god?> </p>
                                                                                      
                                                 <h5>Цена: <?= $formatted_number = number_format($avtogruz->price, 0, ',', ' '); ?> руб.</h5>
                                                                                

									     </div>
                                                    <?php if ($avtogruz->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>

                                                    
                                                                    
                                                    <?php if ($avtogruz->sale):?>
                                                                    <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'sale' ]) ?>
                                                                    <?php endif ?>
														
													<p><a href ="<?= yii\helpers\Url::to (['cart/addgruz', 'id'=> $avtogruz->id]) ?>" data-id = "<?= $avtogruz->id?>"
                          class="btn-iz add-to-cartgruz"><img class="animate1" src="/images/iz.png" alt=""></span></a></p>	

                            <div class="btn-podrob">
									 <ul class="nav navbar-nav collapse navbar-collapse">        
							   <li class="dropdown"><img class="animate1" src="/images/podrobno5.png" alt="">		    			 
							     <ul role="menu" class="sub-menu1">
							
                        <li>КРАТКОЕ ОПИСАНИЕ:<hr> <?= mb_substr($avtogruz->opisanie, 0, 150);  ?><br>
									  <a href="<?= yii\helpers\Url::to(['avtogruz/'.$avtogruz->id, 'ads'=>$s2.'_'.$s1.'_price_'.$avtogruz->price]) ?>" class="btn btn-default1">подробнее</a>
						</li>
							
							     </ul>
							   </li>				
								</ul>
								      </div>

                           <div id="brands_products2">
									  <div class="btn-podrob">
									<small class="podrob"><img class="animate1" src="/images/podrobno5.png" alt="">
									<span>КРАТКОЕ ОПИСАНИЕ:<hr><?= mb_substr($avtogruz->opisanie, 0, 230);  ?><br>
									 <a href="tel:<?= $avtogruz -> telephone ?>" target="_blank" class="btn btn-default1"> позвонить</a>
									  <a href="<?= yii\helpers\Url::to(['avtogruz/'.$avtogruz->id, 'ads'=>$s2.'_'.$s1.'_price_'.$avtogruz->price]) ?>" class="btn btn-default1">подробнее</a>
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
                                                <?php 
                                                echo LinkPager::widget([
                                                'pagination' => $pages,
                                                   ]);
                                                 ?>                                        
						<?php else:?>
                                                
                                               <center><table >
                                                <center><h4>Здесь пока ничего нет. У Вас есть шанс быть первым <br><a href= "<?= yii\helpers\Url::to (['/admin']) ?>" <i class="fa fa-plus-square"></i> Подать объявление в разделе</a>.</h4></center>
                             </table> </center>
                                                
						<?php endif; ?>
                                                <?php endif; ?>
                                                <div class="clearfix"></div>
                                                
                                                
                                                
                                                <!--//////////////////СПЕЦТЕХНИКА//////////////////-->
                                                
                                                  <?php if($id == 3): ?>
                                                <?php if (!empty($avtospec)): ?>
                                                <?php foreach ($avtospec as $avtospec): ?>
												<?php if ($avtospec->moder == 1) { ?>
						<div class="col-sm-3">
							<?php if(!empty($avtospec->videl)){ ?> 
						<div class="product-image-wrapper5">
						<?php } else { ?> 
							<div class="product-image-wrapper3">
						<?php } ?>
								<div class="single-products1">
								
											
					<?php 
					  $s = $avtospec->tip;
											
					  //$s = (string) $s; // преобразуем в строковое значение
					  //$s = strip_tags($s); // убираем HTML-теги
					  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
					  $s = trim($s); // убираем пробелы в начале и конце строки
					  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
					  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
					  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
					  $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
				   
					  $s1 = $avtospec->marka;
											
					  //$s = (string) $s; // преобразуем в строковое значение
					  //$s = strip_tags($s); // убираем HTML-теги
					  $s1 = preg_replace("/\s+/", ' ', $s1); // удаляем повторяющие пробелы
					  $s1 = trim($s1); // убираем пробелы в начале и конце строки
					  $s1 = function_exists('mb_strtolower') ? mb_strtolower($s1) : strtolower($s1); // переводим строку в нижний регистр (иногда надо задать локаль)
					  $s1 = strtr($s1, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
					  $s1 = preg_replace("/[^0-9a-z-_ ]/i", "", $s1); // очищаем строку от недопустимых символов
					  $s1 = str_replace(" ", "-", $s1); // заменяем пробелы знаком минус
				      ?>
								
									<div class="productinfo text-center">
                                                                            
                                                                            <?php $model = Avtospec::findOne($avtospec->id);?>
                                                                            
                                                                             <?php $imageTitle = $model->getImage();?>
                                                                          
                                                                        
                                                                    <?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                 <a href="<?= yii\helpers\Url::to(['avtospec/'.$avtospec->id, 'ads'=>$s.'_'.$s1.'_price_'.$avtospec->price]) ?>">
												 <li><?=Html::img($imageTitle->getUrl(''), ['alt' => 'Продажа спецтехники, тип '.$avtospec->tip.' цена '.$avtospec->price]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												  <a href="<?= yii\helpers\Url::to(['avtospec/'.$avtospec->id, 'ads'=>$s.'_'.$s1.'_price_'.$avtospec->price]) ?>">
												  <li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => 'Продажа спецтехники, тип '.$avtospec->tip.' цена '.$avtospec->price]) ?></li></a>
												 
												                             <?php } ?>
										
										<p><a href ="<?= yii\helpers\Url::to(['avtospec/'.$avtospec->id, 'ads'=>$s.'_'.$s1.'_price_'.$avtospec->price])  ?>"><?= $avtospec->tip ?> </a></p>
                                                                                 
                                                                                <p>Марка: <?=$avtospec->marka?> </p>
                                                                                    <p>Год выпуска: <?=$avtospec->god?></p>
                                                                                <h5>Цена: <?= $formatted_number = number_format($avtospec->price, 0, ',', ' '); ?> руб.</h5>
                                   
									</div>
                                                    <?php if ($avtospec->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>

                                                    
                                                                    
                                                    <?php if ($avtospec->sale):?>
                                                                    <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'sale' ]) ?>
                                                                    <?php endif ?>
																	
													<p><a href ="<?= yii\helpers\Url::to (['cart/addspec', 'id'=> $avtospec->id]) ?>" data-id = "<?= $avtospec->id?>"
                          class="btn-iz add-to-cartspec"><img class="animate1" src="/images/iz.png" alt=""></span></a></p>

                            <div class="btn-podrob">
									 <ul class="nav navbar-nav collapse navbar-collapse">        
							   <li class="dropdown"><img class="animate1" src="/images/podrobno5.png" alt="">		    			 
							     <ul role="menu" class="sub-menu1">
							
                        <li>КРАТКОЕ ОПИСАНИЕ:<hr> <?= mb_substr($avtospec->opisanie, 0, 150);  ?><br>
									  <a href="<?= yii\helpers\Url::to(['avtospec/'.$avtospec->id, 'ads'=>$s.'_'.$s1.'_price_'.$avtospec->price]) ?>" class="btn btn-default1">подробнее</a>
						</li>
							
							     </ul>
							   </li>				
								</ul>
								      </div>

                            <div id="brands_products2">
									  <div class="btn-podrob">
									<small class="podrob"><img class="animate1" src="/images/podrobno5.png" alt="">
									<span>КРАТКОЕ ОПИСАНИЕ:<hr><?= mb_substr($avtospec->opisanie, 0, 230);  ?><br>
									 <a href="tel:<?= $avtospec -> telephone ?>" target="_blank" class="btn btn-default1"> позвонить</a>
									  <a href="<?= yii\helpers\Url::to(['avtospec/'.$avtospec->id, 'ads'=>$s.'_'.$s1.'_price_'.$avtospec->price]) ?>" class="btn btn-default1">подробнее</a>
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
                                                <?php 
                                                echo LinkPager::widget([
                                                'pagination' => $pages,
                                                   ]);
                                                 ?>                                        
						<?php else:?>
                                                
                                               <table >
                                                <center><h4>Здесь пока ничего нет. У Вас есть шанс быть первым <br><a href= "<?= yii\helpers\Url::to (['/admin']) ?>" <i class="fa fa-plus-square"></i> Подать объявление в разделе</a>.</h4></center>
                             </table> 
                                                
						<?php endif; ?>
                                                <?php endif; ?>
                                                <div class="clearfix"></div>
                                                
                                                
                                                
                                                <!--////////////////МОТОТЕХНИКА//////////////-->
                                                
                                                
                                                
                                                 <?php if($id == 4): ?>
                                                <?php if (!empty($avtomoto)): ?>
                                                <?php foreach ($avtomoto as $avtomoto): ?>
												<?php if ($avtomoto->moder == 1) { ?>
						<div class="col-sm-3">
							<?php if(!empty($avtomoto->videl)){ ?> 
						<div class="product-image-wrapper5">
						<?php } else { ?> 
							<div class="product-image-wrapper3">
						<?php } ?>
								<div class="single-products1">
								
								<?php 
					  $s = $avtomoto->tip;
											
					  //$s = (string) $s; // преобразуем в строковое значение
					  //$s = strip_tags($s); // убираем HTML-теги
					  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
					  $s = trim($s); // убираем пробелы в начале и конце строки
					  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
					  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
					  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
					  $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
				   
					  $s1 = $avtomoto->marka;
											
					  //$s = (string) $s; // преобразуем в строковое значение
					  //$s = strip_tags($s); // убираем HTML-теги
					  $s1 = preg_replace("/\s+/", ' ', $s1); // удаляем повторяющие пробелы
					  $s1 = trim($s1); // убираем пробелы в начале и конце строки
					  $s1 = function_exists('mb_strtolower') ? mb_strtolower($s1) : strtolower($s1); // переводим строку в нижний регистр (иногда надо задать локаль)
					  $s1 = strtr($s1, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
					  $s1 = preg_replace("/[^0-9a-z-_ ]/i", "", $s1); // очищаем строку от недопустимых символов
					  $s1 = str_replace(" ", "-", $s1); // заменяем пробелы знаком минус
				      ?>
								
									<div class="productinfo text-center">
                                                                            
                                                                            <?php $model = avtomoto::findOne($avtomoto->id);?>
                                                                            
                                                                             <?php $imageTitle = $model->getImage();?>
                                                                          
                                                                        
                                                                    <?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                 <a href="<?= yii\helpers\Url::to(['avtomoto/'.$avtomoto->id, 'ads'=>$s.'_'.$s1.'_price_'.$avtomoto->price]) ?>" >
												 <li><?=Html::img($imageTitle->getUrl(''), ['alt' => 'Продажа мототехники, тип '.$avtomoto->tip.' цена '.$avtomoto->price]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												 <a href="<?= yii\helpers\Url::to(['avtomoto/'.$avtomoto->id, 'ads'=>$s.'_'.$s1.'_price_'.$avtomoto->price]) ?>" >
												 <li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => 'Продажа мототехники, тип '.$avtomoto->tip.' цена '.$avtomoto->price]) ?></li></a>
												 
												                             <?php } ?>
                                                                     
							
										
						              <p><a href ="<?= yii\helpers\Url::to(['avtomoto/'.$avtomoto->id, 'ads'=>$s.'_'.$s1.'_price_'.$avtomoto->price])  ?>"> Марка: <?= $avtomoto->marka ?> </a></p>
                                                            
                                                              
                                                                                 <h5><?= $avtomoto -> tip ?></h5>
                                                                      <p>Пробег: <?=$avtomoto->probeg?> </p>
                                                                                <h5>Цена: <?= $formatted_number = number_format($avtomoto->price, 0, ',', ' '); ?> руб.</h5>
                                                                                
                                

									</div>
                                                    <?php if ($avtomoto->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>

                                                    
                                                                    
                                                    <?php if ($avtomoto->sale):?>
                                                                    <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'sale' ]) ?>
                                                                    <?php endif ?>
																	
													<p><a href ="<?= yii\helpers\Url::to (['cart/addmoto', 'id'=> $avtomoto->id]) ?>" data-id = "<?= $avtomoto->id?>"
                          class="btn-iz add-to-cartmoto"><img class="animate1" src="/images/iz.png" alt=""></span></a></p>	

                            <div class="btn-podrob">
									 <ul class="nav navbar-nav collapse navbar-collapse">        
							   <li class="dropdown"><img class="animate1" src="/images/podrobno5.png" alt="">		    			 
							     <ul role="menu" class="sub-menu1">
							
                        <li>КРАТКОЕ ОПИСАНИЕ:<hr> <?= mb_substr($avtomoto->opisanie, 0, 150);  ?><br>
									  <a href="<?= yii\helpers\Url::to(['avtomoto/'.$avtomoto->id, 'ads'=>$s.'_'.$s1.'_price_'.$avtomoto->price]) ?>" class="btn btn-default1">подробнее</a>
						</li>
							
							     </ul>
							   </li>				
								</ul>
								      </div>

                            <div id="brands_products2">
									  <div class="btn-podrob">
									<small class="podrob"><img class="animate1" src="/images/podrobno5.png" alt="">
									<span>КРАТКОЕ ОПИСАНИЕ:<hr><?= mb_substr($avtomoto->opisanie, 0, 230);  ?><br>
									 <a href="tel:<?= $avtomoto -> telephone ?>" target="_blank" class="btn btn-default1"> позвонить</a>
									  <a href="<?= yii\helpers\Url::to(['avtomoto/'.$avtomoto->id, 'ads'=>$s.'_'.$s1.'_price_'.$avtomoto->price]) ?>" class="btn btn-default1">подробнее</a>
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
                                                <?php 
                                                echo LinkPager::widget([
                                                'pagination' => $pages,
                                                   ]);
                                                 ?>                                        
						<?php else:?>
                                                
                                               <table >
                                                <center><h4>Здесь пока ничего нет. У Вас есть шанс быть первым <br><a href= "<?= yii\helpers\Url::to (['/admin']) ?>" <i class="fa fa-plus-square"></i> Подать объявление в разделе</a>.</h4></center>
                             </table> 
                                                
						<?php endif; ?>
                                                <?php endif; ?>
                                                <div class="clearfix"></div>
                                                
                                                
                                                <!--/////////////////////////КОМПЛЕКТУЮЩИЕ///////////////////////////////-->
                                                
                                                <?php if($id == 5 || $id == 7 || $id == 8 || $id == 9 || $id == 10 || $id == 11 || $id == 12 || $id == 13 || $id == 14 || $id == 15): ?>                                               
												
												<?php if (!empty($avtokomplekt)): ?>
                                                <?php foreach ($avtokomplekt as $avtokomplekt): ?>
												
												<?php if ($avtokomplekt->moder == 1) { ?>
												
						<div class="col-sm-3">
							<?php if(!empty($avtokomplekt->videl)){ ?> 
						<div class="product-image-wrapper5">
						<?php } else { ?> 
							<div class="product-image-wrapper3">
						<?php } ?>
								<div class="single-products1">
								
								<?php 
					  $s = $avtokomplekt->name;
											
					  //$s = (string) $s; // преобразуем в строковое значение
					  //$s = strip_tags($s); // убираем HTML-теги
					  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
					  $s = trim($s); // убираем пробелы в начале и конце строки
					  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
					  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
					  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
					  $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
				     
					 
					 if ($avtokomplekt -> tip ==0){         
      
					   }
					   else{ 
                     $tipp = avtokomplekttip::find()->select('tip')
						->where(['id' => $avtokomplekt -> tip])
						->one();
						   foreach($tipp as $item) {
					   $avtokomplekt -> tip = $item;}; }  

					 ?>
								
									<div class="productinfo text-center">
                                                                            
                                                                            <?php $model = Avtokomplekt::findOne($avtokomplekt->id);?>
                                                                            
                                                                             <?php $imageTitle = $model->getImage();?>
                                                                          
                                                                        
                                                                   <?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                  <a href="<?= yii\helpers\Url::to(['avtokomplekt/'.$avtokomplekt->id, 'ads'=>$s.'_price_'.$avtokomplekt->price]) ?>">
												  <li><?=Html::img($imageTitle->getUrl(''), ['alt' => 'Продажа автокомплектующих и запчастей, тип '.$avtokomplekt->tip.' цена '.$avtokomplekt->price]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												   <a href="<?= yii\helpers\Url::to(['avtokomplekt/'.$avtokomplekt->id, 'ads'=>$s.'_price_'.$avtokomplekt->price]) ?>">
												   <li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => 'Продажа автокомплектующих и запчастей, тип '.$avtokomplekt->tip.' цена '.$avtokomplekt->price]) ?></li></a>
												 
												                             <?php } ?>
                                                                     
							
										                            <p><?= $avtokomplekt -> name ?></p>
										<p><a href ="<?= yii\helpers\Url::to(['avtokomplekt/'.$avtokomplekt->id, 'ads'=>$s.'_price_'.$avtokomplekt->price])  ?>"><?= $avtokomplekt-> tip?></a></p>
                                                                             
                                                                                 <p> Состояние: <?=$avtokomplekt->sostoyanie?></p>
                                                                                <h5>Цена: <?= $formatted_number = number_format($avtokomplekt->price, 0, ',', ' '); ?> руб.</h5>
                                                                                
                         

									</div>
                                                    <?php if ($avtokomplekt->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>

                                                    
                                                                    
                                                    <?php if ($avtokomplekt->sale):?>
                                                                    <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'sale' ]) ?>
                                                                    <?php endif ?>
																	
													<p><a href ="<?= yii\helpers\Url::to (['cart/addkompl', 'id'=> $avtokomplekt->id]) ?>" data-id = "<?= $avtokomplekt->id?>"
                          class="btn-iz add-to-cartkompl"><img class="animate1" src="/images/iz.png" alt=""></span></a></p>	

                           <div class="btn-podrob">
									 <ul class="nav navbar-nav collapse navbar-collapse">        
							   <li class="dropdown"><img class="animate1" src="/images/podrobno5.png" alt="">		    			 
							     <ul role="menu" class="sub-menu1">
							
                        <li>КРАТКОЕ ОПИСАНИЕ:<hr> <?= mb_substr($avtokomplekt->opisanie, 0, 150);  ?><br>
									  <a href="<?= yii\helpers\Url::to(['avtokomplekt/'.$avtokomplekt->id, 'ads'=>$s.'_price_'.$avtokomplekt->price]) ?>" class="btn btn-default1">подробнее</a>
						</li>
							
							     </ul>
							   </li>				
								</ul>
								      </div>

                             <div id="brands_products2">
									  <div class="btn-podrob">
									<small class="podrob"><img class="animate1" src="/images/podrobno5.png" alt="">
									<span>КРАТКОЕ ОПИСАНИЕ:<hr><?= mb_substr($avtokomplekt->opisanie, 0, 230);  ?><br>
									 <a href="tel:<?= $avtokomplekt -> telephone ?>" target="_blank" class="btn btn-default1"> позвонить</a>
									  <a href="<?= yii\helpers\Url::to(['avtokomplekt/'.$avtokomplekt->id, 'ads'=>$s.'_price_'.$avtokomplekt->price]) ?>" class="btn btn-default1">подробнее</a>
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
                                                <?php 
                                                echo LinkPager::widget([
                                                'pagination' => $pages,
                                                   ]);
                                                 ?>                                        
						<?php else:?>
                                                
                                               <table >
                                                <center><h4>В категории пока ничего нет. <br><a href= "<?= yii\helpers\Url::to (['/admin']) ?>" 
												<i class="fa fa-plus-square"></i> Подать объявление в категории</a>.</h4></center>
                             </table> 
                                                
						<?php endif; ?>
                                                <?php endif; ?>
                                                <div class="clearfix"></div>
                                                
                                                
                                                <!--//////////////////////////КАТЕРА///////////////////////////-->
                                                
                                                <?php if($id == 6): ?>
                                                <?php if (!empty($avtovodnik)): ?>
                                                <?php foreach ($avtovodnik as $avtovodnik): ?>
												<?php if ($avtovodnik->moder == 1) { ?>
						<div class="col-sm-3">
							<?php if(!empty($avtovodnik->videl)){ ?> 
						<div class="product-image-wrapper5">
						<?php } else { ?> 
							<div class="product-image-wrapper3">
						<?php } ?>
								<div class="single-products1">
								
						<?php 
					  $s = $avtovodnik->tip;
											
					  //$s = (string) $s; // преобразуем в строковое значение
					  //$s = strip_tags($s); // убираем HTML-теги
					  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
					  $s = trim($s); // убираем пробелы в начале и конце строки
					  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
					  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
					  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
					  $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
				      

                 
					  $s1 = $avtovodnik->sostoyanie;
											
					  //$s = (string) $s; // преобразуем в строковое значение
					  //$s = strip_tags($s); // убираем HTML-теги
					  $s1 = preg_replace("/\s+/", ' ', $s1); // удаляем повторяющие пробелы
					  $s1 = trim($s1); // убираем пробелы в начале и конце строки
					  $s1 = function_exists('mb_strtolower') ? mb_strtolower($s1) : strtolower($s1); // переводим строку в нижний регистр (иногда надо задать локаль)
					  $s1 = strtr($s1, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
					  $s1 = preg_replace("/[^0-9a-z-_ ]/i", "", $s1); // очищаем строку от недопустимых символов
					  $s1 = str_replace(" ", "-", $s1); // заменяем пробелы знаком минус
				      ?>					  
								
									<div class="productinfo text-center">
                                                                            
                                                                            <?php $model = Avtovodnik::findOne($avtovodnik->id);?>
                                                                            
                                                                             <?php $imageTitle = $model->getImage();?>
                                                                          
                                                                        
                                                                    <?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                   <a href="<?= yii\helpers\Url::to(['avtovodnik/'.$avtovodnik->id, 'ads'=>$s.'_'.$s1.'_price'.$avtovodnik->price]) ?>" >
												   <li><?=Html::img($imageTitle->getUrl(''), ['alt' => $avtovodnik->tip]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												   <a href="<?= yii\helpers\Url::to(['avtovodnik/'.$avtovodnik->id, 'ads'=>$s.'_'.$s1.'_price'.$avtovodnik->price]) ?>" >
												   <li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => $avtovodnik->tip]) ?></li></a>
												 
												                             <?php } ?>
                                                                     
							
										
										<p><a href ="<?= yii\helpers\Url::to(['avtovodnik/'.$avtovodnik->id, 'ads'=>$s.'_'.$s1.'_price'.$avtovodnik->price])  ?>"><?= $avtovodnik->tip ?> </a></p>
                                                                                 <h5>Тип двигателя: <?= $avtovodnik -> tip_dvigatel ?></h5>
                                                                                <p>Состояние: <?=$avtovodnik->sostoyanie?></p>
                                                                                <h5>Цена: <?= $formatted_number = number_format($avtovodnik->price, 0, ',', ' '); ?> руб.</h5>
                                                                                
                            

									</div>
                                                    <?php if ($avtovodnik->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>

                                                    
                                                                    
                                                    <?php if ($avtovodnik->sale):?>
                                                                    <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'sale' ]) ?>
                                                                    <?php endif ?>
																	
													<p><a href ="<?= yii\helpers\Url::to (['cart/addvoda', 'id'=> $avtovodnik->id]) ?>" data-id = "<?= $avtovodnik->id?>"
                          class="btn-iz add-to-cartvoda"><img class="animate1" src="/images/iz.png" alt=""></span></a></p>	

                             <div class="btn-podrob">
									 <ul class="nav navbar-nav collapse navbar-collapse">        
							   <li class="dropdown"><img class="animate1" src="/images/podrobno5.png" alt="">		    			 
							     <ul role="menu" class="sub-menu1">
							
                        <li> КРАТКОЕ ОПИСАНИЕ:<hr><?= mb_substr($avtovodnik->opisanie, 0, 150);  ?><br>
									  <a href="<?= yii\helpers\Url::to(['avtovodnik/'.$avtovodnik->id, 'ads'=>$s.'_'.$s1.'_price'.$avtovodnik->price]) ?>" class="btn btn-default1">подробнее</a>
						</li>
							
							     </ul>
							   </li>				
								</ul>
								      </div>

                             <div id="brands_products2">
									  <div class="btn-podrob">
									<small class="podrob"><img class="animate1" src="/images/podrobno5.png" alt="">
									<span>КРАТКОЕ ОПИСАНИЕ:<hr><?= mb_substr($avtovodnik->opisanie, 0, 230);  ?><br>
									 <a href="tel:<?= $avtovodnik -> telephone ?>" target="_blank" class="btn btn-default1"> позвонить</a>
									  <a href="<?= yii\helpers\Url::to(['avtovodnik/'.$avtovodnik->id, 'ads'=>$s.'_'.$s1.'_price'.$avtovodnik->price]) ?>" class="btn btn-default1">подробнее</a>
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
                                                <?php 
                                                echo LinkPager::widget([
                                                'pagination' => $pages,
                                                   ]);
                                                 ?>                                        
						<?php else:?>
                                                
                                               <table >
                                                <center><h4>Здесь пока ничего нет. У Вас есть шанс быть первым <br><a href= "<?= yii\helpers\Url::to (['/admin']) ?>" <i class="fa fa-plus-square"></i> Подать объявление в разделе</a>.</h4></center>
                             </table> 
                                                
						<?php endif; ?>
                                                <?php endif; ?>
                                                <div class="clearfix"></div>
                                                
       
					</div><!--features_items-->
				</div></center>
			</div>
		</div>
	</section>





