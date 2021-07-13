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

AppAsset::register($this);
$this->title = ' 🔍 Расширенный поиск легковых автомобилей';
?>

<div class="container">
      <hr>
     	<center> <h1 style = "font-size: 16px; 
						             margin-top: 1px; 
									 color: #397F8C; 
									 text-transform: uppercase; 
									 font-weight: 700;
									 font-family: 'Roboto', sans-serif;" class="title text-center"> Расширенный поиск легковых авто </h4> </center>	

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