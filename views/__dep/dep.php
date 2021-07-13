<?php

use app\widgets\Alert;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use app\controllers\SiteController;
use kartik\depdrop\DepDrop;
use app\controllers\OblastController;
use app\modules\admin\models\Oblast;
use app\modules\admin\models\Goroda;
use app\modules\admin\models\Raion;
  ?>
 
  <?php 
                $model_obl = oblast:findAll([23]);
                foreach ($model_obl as $key => $item) {
					$model1 = $item;
				}				
                $oblast1 = oblast::findAll([23]);;
                foreach($oblast1 as $key => $item) {
                $id=$key;
				$oblast_region=$item; }
                $oblast = ArrayHelper::map($oblast1, 'id','oblast_region');
                $id_gorod1 = Goroda::find()->all();
                $id_gorod = ArrayHelper::map($id_gorod1, 'id','name');
               
                ?>


   <td>    
   <?php
// Parent 
echo $form->field($model1, 'oblast_region')->dropDownList($oblast,['id'=>'id_oblast','prompt' => 'Выберите регион/область'])->label('Регион');
   ?>
</td>

        
<tr>
 <td>
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
         
     
// Child # 1
echo $form->field($model2, 'name')->widget(DepDrop::classname(), [
   
    'options'=>['id'=>'id_gorod'],
    'pluginOptions'=>[
       
        'depends'=>['id_oblast'],
        'placeholder'=>'Выберите город',
        'url'=>Url::to(['/site/gorod'])
    ]
])->label('Город');
?>
 </td>


 <td>
 <?php
      $model_rai = raion::find()->all();
                foreach ($model_rai as $key => $item) {
					$id = $key;
					$model3 = $item;
				}	
 

  echo $form->field($model3, 'raion')->widget(DepDrop::classname(), [
    'pluginOptions'=>[
        'depends'=>['id_oblast','id_gorod'],
        'placeholder'=>'Выберите район',
        'url'=>Url::to(['/site/raion'])
    ]    
])->label('Район');
//debug($id_oblast)
  ?>
 </td>
   </tr>
    
