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
$this->title = ' 🔍 Расширенный поиск водного транспорта';
?>

<div class="container">
      <hr>
     	<center> <h1 style = "font-size: 16px; 
						             margin-top: 1px; 
									 color: #397F8C; 
									 text-transform: uppercase; 
									 font-weight: 700;
									 font-family: 'Roboto', sans-serif;" class="title text-center"> Расширенный поиск водного транспорта </h4> </center>	

 <form method="get" action="<?= yii\helpers\Url::to(['avtovodnik/search' ]) ?>">	
 
 
  <style>
	.table {
  max-width: 600px;
  
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