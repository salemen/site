<?php

use app\widgets\Alert;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Dropdown;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use kartik\depdrop\DepDrop;
use yii\data\Pagination;
use app\models\Avtocategory;
use app\modules\admin\models\Avtokuzov;
use app\modules\admin\models\Avtokorobka;
use app\modules\admin\models\Avtodvigatel;
use app\modules\admin\models\Avtoprivod;
use app\modules\admin\models\Avtosostoyanie;
use app\modules\admin\models\Avtogod;
use app\modules\admin\models\Marka;
use app\modules\admin\models\Model;
use app\modules\admin\models\Oblast;
use app\assets\AppAsset;
use kartik\select2\Select2; // or kartik\select2\Select2
use yii\web\JsExpression;

AppAsset::register($this);
$this->title = ' 🔍 Расширенный поиск комплектующих';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<div class="container">
        <hr>
     	<center> <h1 style = "font-size: 16px; 
						             margin-top: 1px; 
									 color: #397F8C; 
									 text-transform: uppercase; 
									 font-weight: 700;
									 font-family: 'Roboto', sans-serif;" class="title text-center"> Расширенный поиск комплектующих </h4> </center>	

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
				
   $url = Url::toRoute(['avto-list']);
   	

echo $form->field($model3, 'name', ['template' => "{label}\n{input}"])->widget(Select2::classname(), [
    'name' => 'kv-state-230',
    'options' => ['placeholder' => 'поиск категории, начните ввод....'],
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
                <center><input type="submit" class="btn btn-warning" name="search" value="ЗАПУСТИТЬ ПОИСК"></center>
                 </td></tr> </table></center>      
                <br><br>
				<?php $form = ActiveForm::end(); ?>
  
        </form>

</div>

         <center><table class="table table-hover table-striped"> 
       <tr align="center">
		<td align="center"><input class="button" type="button" value="Вернуться назад" onclick="javascript:history.go(-1)" /></td>
	</tr>
   </table></center>