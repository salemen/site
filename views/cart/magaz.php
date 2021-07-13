<?php

use app\widgets\Alert;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;
use yii\bootstrap\Dropdown;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\Modal;
use kartik\depdrop\DepDrop;
use app\modules\admin\models\Oblast;
use app\modules\admin\models\Goroda;
use app\modules\admin\models\Raion;
use kartik\select2\Select2; // or kartik\select2\Select2
use yii\web\JsExpression;
use app\models\Category;

AppAsset::register($this);
$this->title = ' 🔍 Расширенный поиск по разделу магазин';
 ?>
 
 <?php
 include Yii::$app->basePath.'/payconf.php';
?>
 
<div class="container">
       <!--<link rel="stylesheet" href="/web/css/main.css">-->
			<hr>
			<center>  <h1 style = "font-size: 16px; 
						             margin-top: 1px; 
									 color: #397F8C; 
									 text-transform: uppercase; 
									 font-weight: 700;
									 font-family: 'Roboto', sans-serif;" class="title text-center"> Расширенный поиск по разделу Магазин</h1> </center>	
				
        <form method="get" action="<?= yii\helpers\Url::to(['category/search']) ?>">
		  <!-----------------Поиск по разделу магазин------------------->
	 
	 <style>
	.table {
    max-width: 600px; 
    }
   
    td {
		max-width: 130px;
	}
	
	option:disabled {
    color: #f79109;
    }
	
	form-group div {
    margin-bottom: 2px!important;
	}
	
		
	small.ttip {
		display:inline-block;
		margin-left:10px;
		border-bottom:2px dashed #AA1428;
		color:#AA1428;
		position:relative;
		}
	small.ttip:hover {
		cursor:pointer;
	}
	small.ttip span {
		display:none;
		}
	small.ttip:hover span {
		display:block;
		z-index:2;
		border:1px solid #AA1428;
		border-radius: 8px;
		color:#000;
		position:absolute;
		max-width:360px;
		min-width:300px;
		top:-2px;
		left:-190px;
		background-color:#FCFBDC;
		padding:10px;
		}	
	</style>
	
	         <?php $form = ActiveForm::begin(); ?>
	
               <?php
                $model_obl = oblast::findAll([23,43,60,69]);
                foreach ($model_obl as $key => $item) {
					$model1 = $item;
				}				
                  $oblast1 = oblast::findAll([23,43,60,69]);
                foreach($oblast1 as $key => $item) {
                $id=$key;
				$oblast_region=$item; }
                $oblast = ArrayHelper::map($oblast1, 'id','oblast_region');
                $id_gorod1 = Goroda::find()->all();
                $id_gorod = ArrayHelper::map($id_gorod1, 'id','name');
               ?>
             					
		
                                                     
	 <center><table class="table table-hover table-striped">
   
  
 
 <tr>
 <td>
   <?php 
     echo $form->field($model1, 'oblast_region', ['template' => "{label}\n{input}"])
	 ->dropDownList($oblast,['id'=>'id_oblast','prompt' => '-Выберите регион-'])->label('Регион поиска');
   ?></td></tr>
   <?php
   
  /*  $id_gorod1 = Goroda::find()->select(['id','name'])->indexBy('name')->all();
         foreach ($id_gorod1 as $name=>$value){
          $id_gorod=$value;
         $gorod=$name;
       } */
	      $model_gor = Goroda::find()->all();
                foreach ($model_gor as $key => $item) {
					$id = $key;
					$model2 = $item;
				}	 
         
   ?>
   
   <tr> <td>
   <?php 
// Child # 1
echo $form->field($model2, 'name', ['template' => "{label}\n{input}"])->widget(DepDrop::classname(), [
   
    'options'=>['id'=>'id_gorod'],
    'pluginOptions'=>[
       
        'depends'=>['id_oblast'],
        'placeholder'=>'-Можете выбрать город-',
        'url'=>Url::to(['/site/gorod'])
    ]
])->label('Город (поиск будет только в этом городе)');
?>
</td></tr>


          <!-------Живой поиск--------->
<tr>
<td>
 	<?php
	
	         $model_cat = Category::find()->all();
                foreach ($model_cat as $key => $item) {
					$id = $key;
					$model3 = $item;
				}	
				
   $url = Url::toRoute(['city-list']);
   
	$cityDesc = empty($model3->name) ? '' : Category::findOne($model3->name)->Description;
	
 
echo $form->field($model3, 'name', ['template' => "{label}\n{input}"])->widget(Select2::classname(), [
    'options' => ['multiple'=>true,'placeholder' => 'Можете выбрать несколько категорий'],
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
])->label('Поиск категории(й) магазина.');?>
 </td>
 </tr>
 
 <!---------------Конец живого поиска-------------------->               
 
		<!-- <tr><td>	 
		<label>Категория</label>
               
<select id="product-category_id" class="form-control" name="Product[category_id]">
   
     <?= \app\components\MenuWidget::widget (['tpl'=> 'select_product', 'model' => $model])?>

</select></td></tr> -->
                
                <!--<input type="text" placeholder="мин цена" name="p1"/><br><hr>-->
				<tr><td>	 <input type="text" style = "height: 30px; width: 200px;" placeholder=" текст поиска" name="p3"/>
				<small class="ttip">что это ?<span><?=$textmag;?></span></small></td></tr>
               <tr><td>	 <input type="tel" style = "height: 30px; width: 200px;" placeholder=" макс. цена цифрами" name="p2"/></td></tr>
              
                <tr><td>	<center> <input type="submit" class="btn btn-warning" name="search" value="ЗАПУСТИТЬ ПОИСК"></center></td></tr>
              <?php ActiveForm::end();?><br>
			  </table></center></form>
    </div>    
	<center><table class="table table-hover table-striped"> 
       <tr align="center">
		<td align="center"><input class="button" type="button" value="Вернуться назад" onclick="javascript:history.go(-1)" /></td>
	</tr>
   </table>		</center>