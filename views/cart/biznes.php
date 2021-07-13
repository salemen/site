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

AppAsset::register($this);
$this->title = ' 🔍 Расширенный поиск Готового бизнеса';
 ?>
 
 <div class="container">
			<hr>
			<center> <h1 style = "font-size: 16px; 
						             margin-top: 1px; 
									 color: #397F8C; 
									 text-transform: uppercase; 
									 font-weight: 700;
									 font-family: 'Roboto', sans-serif;" class="title text-center"> Расширенный поиск бизнеса </h4> </center>	
			
			 <form method="get" action="<?= yii\helpers\Url::to(['nedvigbiznes/search' ])?>">
		
             			<!------------------------------------->
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

 <label>Операция</label>
               
<select id="product-category_id" class="form-control" name="Operaciya[id]">
   
     <?= \app\components\MenuWidgetoperaciya::widget (['tpl'=> 'select_operaciya', 'model' => $model])?>

</select>
</td></tr>
<tr>
<td>

 <label>Тип бизнеса</label>
               
<select id="product-category_id" class="form-control" name="Typebiznes[id]">
   
     <?= \app\components\MenuWidgettypebiznes::widget (['tpl'=> 'select_typebiznes', 'model' => $model])?>

</select>
		 </td>
		 </tr>
		 
		  

				<tr>
                <td><input type="tel" style = "height: 30px; width: 200px;" placeholder="мин. площадь цифрами" name="p1"/></td></tr>
                <tr><td><input type="tel" style = "height: 30px; width: 200px;" placeholder="макс. цена цифрами" name="p2"/></td></tr>
                </table></center>
      		        <center><table class="table table-hover table-striped"><tr><td>
                <center><input type="submit" class="btn btn-warning" name="search" value="ЗАПУСТИТЬ ПОИСК"></center>
				</td></tr></table></center><?php ActiveForm::end();?> <br><br>
				
</form>
</div>		
<center><table class="table table-hover table-striped"> 
       <tr align="center">
		<td align="center"><input class="button" type="button" value="Вернуться назад" onclick="javascript:history.go(-1)" /></td>
	</tr>
   </table>		</center>
		 