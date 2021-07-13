<?
namespace app\components;
use yii\base\Widget;
use app\modules\admin\models\Oblast;
use app\modules\admin\models\Goroda;
use app\modules\admin\models\Raion;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;
use Yii;

class MenuWidgetdrepdop extends Widget{
	
	 public function run(){?>
	 
	 
	 
		<table class="table table-hover table-striped">
		  
		 <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?> 
		
		        <?php
                $model_obl = oblast::findAll([64]);
                foreach ($model_obl as $key => $item) {
					$model = $item;
				}				
                $oblast1 = oblast::findAll([64]);;
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
     echo $form->field($model, 'oblast_region', ['template' => "{label}\n{input}"])->dropDownList($oblast,['id'=>'id_oblast','prompt' => 'Выберите регион'])->label('Регион');
   ?></td>
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
   <td> 
   <?php 
// Child # 1
echo $form->field($model2, 'name', ['template' => "{label}\n{input}"])->widget(DepDrop::classname(), [
   
    'options'=>['id'=>'id_gorod'],
    'pluginOptions'=>[
       
        'depends'=>['id_oblast'],
        'placeholder'=>'Выберите город',
        'url'=>Url::to(['/site/gorod'])
    ]
])->label('Город');
?>
</td>
</tr><?php
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
        'placeholder'=>'Выберите район',
        'url'=>Url::to(['/site/raion'])
    ]    
])->label('Район');?></td></tr><?php ActiveForm::end();?>

  </table><?php 
	 }
}
?>
