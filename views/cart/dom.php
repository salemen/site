<?php

use app\widgets\Alert;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
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
use app\models\NedvigDoma;
use kartik\select2\Select2; // or kartik\select2\Select2
use yii\web\JsExpression;

AppAsset::register($this);
$this->title = ' 🔍 Расширенный поиск Домов/Коттеджей/Дач';
 ?>

<?php
 include Yii::$app->basePath.'/payconf.php';
?>

<div class="container">
			<hr>
			<center> <h1 style = "font-size: 16px; 
						             margin-top: 1px; 
									 color: #397F8C; 
									 text-transform: uppercase; 
									 font-weight: 700;
									 font-family: 'Roboto', sans-serif;" class="title text-center"> Расширенный поиск дома,коттеджа... </h4> </center>	
			
			 <form method="get" action="<?= yii\helpers\Url::to(['nedvigdoma/search' ]) ?>">
		
             			<!------------------------------------->
    <style>
	.table {
  max-width: 600px;
  
   }
    td {
		max-width: 130px;
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
			     <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?> 
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
])->label('Город (поиск будет только в этом городе)');
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

 
			    
		
          <td>
                <label>Тип дома</label>
               
<select id="product-category_id" class="form-control" name="Tipdoma[id]">
   
     <?= \app\components\MenuWidgetviddoma::widget (['tpl'=> 'select_viddoma', 'model' => $model])?>

</select></td></tr>
 </table></center>
               <center><table class="table table-hover table-striped">

               <tr><td><input type="text" style = "height: 30px; width: 200px;" placeholder="адрес, местоположение" name="p3"/>
			   <small class="ttip">что это ?<span><?=$textdom;?></span></small></td></tr>
               <tr><td><input type="tel" style = "height: 30px; width: 200px;" placeholder="мин. площадь цифрами" name="p1"/></td></tr>
               <tr><td> <input type="tel" style = "height: 30px; width: 200px;" placeholder="макс. цена цифрами" name="p2"/></td></tr>
                
				</table></center>
				<center><table class="table table-hover table-striped">
                <tr><td>
                <center><input type="submit" class="btn btn-warning" name="search" value="ЗАПУСТИТЬ ПОИСК"/></center></td></tr>
				</table></center><?php ActiveForm::end();?> <br><br>
        
        </form>
			
			
			</div>
			<center><table class="table table-hover table-striped"> 
       <tr align="center">
		<td align="center"><input class="button" type="button" value="Вернуться назад" onclick="javascript:history.go(-1)" /></td>
	</tr>
   </table>		</center>
		 
			
 