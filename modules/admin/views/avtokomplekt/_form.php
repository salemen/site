<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Avtocategory;
use app\modules\admin\models\Avtokomplekttip;
use app\modules\admin\models\Avtokomplektsost;
use app\modules\admin\models\Avtokomplekt;
use app\modules\admin\models\Marka;
use app\modules\admin\models\Model;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Dropdown;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use kartik\depdrop\DepDrop;
use app\assets\AppAsset;
use app\modules\admin\models\Oblast;
use kartik\select2\Select2; // or kartik\select2\Select2
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Avtokomplekt */
/* @var $form yii\widgets\ActiveForm */
?>
<?php AppAsset::register($this); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<?php
 include Yii::$app->basePath.'/payconf.php';
?>
<style>
 td{
  max-width: 130px;
} 
 table{
	 width: 100%;
 }
 .avtokomplekt-form div{
	 max-width: 800px;
 }
</style>

<div class="avtokomplekt-form">



    <?php $form = ActiveForm::begin(); ?>
    
    <!--Ваш логин -->
	<?php 
		        $username = Yii::$app->user->identity['username'];
				 $idn = $_GET['id'];
				 if ($idn){
				 $username1= avtokomplekt::find()->where(['id' => $idn])->andWhere(['username' => $username])->all();}?>
				 
				 <?php if ($username1||!$idn||$username=='sarmetradmin'){?> 
	
		<?php if ($username=='sarmetradmin'){ 
			    }else{?>
       <center><div><table>
         <tr>
            <td>
                <?= $form->field($model, 'username')->textinput(['value'=>$username, 'readonly'=>1]) ?></td>
             <?php $telephone = Yii::$app->user->identity['telephone']?>
                
                <td><?= $form->field($model, 'telephone')->textinput(['value'=>$telephone, 'readonly'=>1]) ?></td>
        </tr>
				</table></div></center> <?php } ?>
 
   
     
 <?php
	         ///////////////////Автотехника///////////////////////
				
				 $marka1 = marka::find()->where('id')->all();
                foreach($marka1 as $key => $item) {
                $id[] = $item['id'];}
                $marka = ArrayHelper::map($marka1, 'id','mark');
               
			     $oblast1 = oblast::findAll([23,43,60,69]);
                foreach($oblast1 as $key => $item) {
                $id=$key;
				$oblast_region=$item; }
                $oblast = ArrayHelper::map($oblast1, 'id','oblast_region');
	?>
     <center><div><table class="table table-hover table-striped">  
	 


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
						 
						 .select2-container--krajee .select2-selection {
							 margin-top: 3px;
							 
						 }
						 
						 </style>
	
<tr>
 <td> <?php
	
			
	
	if ($model->tip){ 
	
   $model_cat = avtocategory::find()->where(['not in', 'id', [1,2,3,4,5,6]])
	                 ->all();
                
		$data = ArrayHelper::map($model_cat, 'id','name');	
			
		
echo $form->field($model, 'tip', ['template' => "{label}\n{input}"])->widget(Select2::classname(),[
    'name' => 'kv-state-210',
	//'options' => ['placeholder' => ' начните ввод....' ],
    'language' => 'ru',
    'data' => $data,
	'size' => Select2::MEDIUM,
    'pluginOptions' => [
        'allowClear' => true
    ],
])->label(false);  ?>

	<?php } else {

	     $model_cat = avtocategory::find()->where(['not in', 'id', [1,2,3,4,5,6]])
			 ->all();
                foreach ($model_cat as $key => $item) {
					$id = $key;
					$model3 = $item;
				}	
				
   $url = Url::toRoute(['avto-list']);
   	

echo $form->field($model, 'tip', ['template' => "{label}\n{input}"])->widget(Select2::classname(), [
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
])->label(false); }?> 
 
    <!-----------------------------></td></tr>
	
	 <td>
  <?= $form->field($model, 'opisanie')->textarea(['rows' => 6, 'placeholder' => 'обязательное поле, максимум 1000 символов']) ?>
</td> 

 <tr>
<td>
<?php
echo $form->field($model, 'oblast')->dropDownList( $oblast,['id'=>'id_oblast','prompt' => '-Выберите регион/область-']);
?>
</td>
</tr> 
 </table></div></center>  
 <center><div><table class="table table-hover table-striped">   
<tr>
<td>
<?php
echo $form->field($model, 'marka')->dropDownList($marka,['id'=>'mark_id','prompt' => 'Выберите марку']);
?>
</td>
<td>
<?php
   $id_model1 = model::find()->select(['id','name'])->all();
         foreach ($id_model1 as $name=>$value){
          $id_model=$value;
         //$modelavto=$name;
       } 
   

     
// Child # 1
 echo $form->field($model, 'model')->widget(DepDrop::classname(), [
   
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
    <td><?= $form->field($model, 'name')->textInput(['placeholder' => 'обязательное, макс.25 символов']) ?></td>
 
     <td><?= $form->field($model, 'sostoyanie')->dropDownList(Avtokomplektsost::find()->select(['tip','id'])->indexBy('tip')->column(),['promt'=>'Select tip']) ?></td>
 </tr>

<tr>
    <td><?= $form->field($model, 'price')->textInput(['type' => 'number','placeholder' => 'обязательное поле']) ?></td>
</tr>
<tr>
    <!--<td><?= $form->field($model, 'hit')->checkbox() ?></td>-->
</tr>
 </table></div></center>
    <center> <div><table class="table table-hover table-striped">  
    
 <tr>
   <td><?= $form->field($model, 'image')->fileInput() ?> </td>
   </tr>
   <tr>
   <td><?= $form->field($model, 'gallery[]')->fileInput(['multiple'=> true, 'accept'=>'image/*']) ?>&nbsp;&nbsp; можете выбрать сразу несколько файлов </td>
 </tr>
 </table></div></center>
 
<center> <div id="fff"><table class="table table-hover table-striped"> 
 
 <p style="color:#000;line-height:23px;text-align:center;letter-spacing:2px;font-size:100%;font-weight:bold"><strong><?=$maintit;?></p><br/>

<?php if($model->hit){?>
 <tr><td><label>
<?= $form->field($model, 'hit')->checkbox(['label' => 'Уже <span style="color: blue;">в ИЗБРАННОМ</span>', 'checked ' => true]) ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( <?=$prhit;?> руб. )<small class="ttip">ЧТО ЭТО ?<span><?=$ar1dd;?></span></small>
</label></td></tr> 
 <?php } elseif(!$model->hit) { ?>
<tr><td><label>
<?= $form->field($model, 'hit')->checkbox(['label' => 'Добавить в <span style="color: blue;">ИЗБРАННЫЕ</span> Комплектующие']) ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( <?=$prhit;?> руб. )<small class="ttip">ЧТО ЭТО ?<span><?=$ar1dd;?></span></small>
</label></td></tr>
 <?php }?>

<?php if($model->new==1){?>
<tr><td><label>
<?= $form->field($model, 'new')->checkbox(['label' => 'Уже добавлен ярлык <span style="color: green;">NEW</span>', 'checked ' => true]) ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( <?=$prnew;?> руб. )<small class="ttip">ЧТО ЭТО ?<span><?=$a2dd;?></span></small>
</label></td></tr>
<?php } elseif(!$model->new==1) { ?>
<tr><td><label>
<?= $form->field($model, 'new')->checkbox(['label' => 'Добавить ярлык <span style="color: green;">NEW</span>']) ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( <?=$prnew;?> руб. )<small class="ttip">ЧТО ЭТО ?<span><?=$a2dd;?></span></small>
</label></td></tr>
<?php }?>

<?php if($model->sale==1){?>
<tr><td><label>
<?= $form->field($model, 'sale')->checkbox(['label' => 'Уже добавлен ярлык <span style="color: red;">SALE</span>', 'checked ' => true]) ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( <?=$prsale;?> руб. )<small class="ttip">ЧТО ЭТО ?<span><?=$a3dd;?></span></small>
</label></td></tr>
<?php } elseif (!$model->sale==1) { ?>
<tr><td><label>
<?= $form->field($model, 'sale')->checkbox(['label' => 'Добавить ярлык <span style="color: red;">SALE</span>']) ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( <?=$prsale;?> руб. )<small class="ttip">ЧТО ЭТО ?<span><?=$a3dd;?></span></small>
</label></td></tr>
<?php }?>

<?php if($model->rekom==1){?>
<tr><td><label>
<?= $form->field($model, 'rekom')->checkbox(['label' => 'Уже добавлено в <span style="color: blue;">РЕКОМЕНДУЕМ</span>','checked ' => true]) ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( <?=$prrekom;?> руб. )<small class="ttip">ЧТО ЭТО ?<span><?=$ar4dd;?></span></small>
</label></td></tr>
<?php } elseif (!$model->rekom==1) { ?>
<tr><td><label>
<?= $form->field($model, 'rekom')->checkbox(['label' => 'Добавить в <span style="color: blue;">РЕКОМЕНДУЕМ</span>']) ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( <?=$prrekom;?> руб. )<small class="ttip">ЧТО ЭТО ?<span><?=$ar4dd;?></span></small>
</label></td></tr>
<?php }?>

<?php if($model->videl==1){?>
<tr><td><label>
<?= $form->field($model, 'videl')->checkbox(['label' => 'Уже выделено <span style="color: red;">КРАСНЫМ</span> цветом','checked ' => true]) ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( <?=$prvidel;?> руб. )<small class="ttip">ЧТО ЭТО ?<span><?=$a5dd;?></span></small>
</label></td></tr>
<?php } elseif(!$model->videl==1){ ?>
<tr><td><label>
<?= $form->field($model, 'videl')->checkbox(['label' => 'Выделить <span style="color: red;">КРАСНЫМ ЦВЕТОМ</span>']) ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( <?=$prvidel;?> руб. )<small class="ttip">ЧТО ЭТО ?<span><?=$a5dd;?></span></small>
</label></td></tr>
<?php }?>
 <tr>
 <td>
  <?php if ($username=='sarmetradmin'){ ?>
 <?= $form->field($model, 'moder')->checkbox([ '0', '1' ]) ?><?php } ?>
  </td>
  </tr> 
    </table></div></center> </br>
    

   <center> <div class="form-group">
         <?= Html::submitButton($model->isNewRecord ? 'Разместить объявление' : 'Сохранить изменения', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div></center>
   <?php } else { ?> 
		
		<center><?php echo 'Такого объявления нет'; }?></center>
    <?php ActiveForm::end(); ?>

</div>
