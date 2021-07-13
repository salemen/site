<?php
 

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use app\models\Nedvigkvartiri;
use app\models\Nedvigdoma;
use app\models\Nedvigkomnati;
use app\models\Nedvigkommercheska;
use app\models\Nedvigzemli;
use app\models\Nedviggaragi;
use app\models\Nedvigbiznes;
use app\models\Category;
use kartik\depdrop\DepDrop;
use app\modules\admin\models\Oblast;
use app\modules\admin\models\Goroda;
use app\modules\admin\models\Raion;
use GeoIp2\Database\Reader;
use kartik\select2\Select2; // or kartik\select2\Select2
use yii\web\JsExpression;


AppAsset::register($this);

?>

 <?php
 include Yii::$app->basePath.'/payconf.php';
?>      

  <?php
 if ($oblast_reg ==0){         
      
	   }										
       else {$oblast1 = Oblast::find()->select('oblast_region')
    ->where(['id' => $oblast_reg])
    ->one();
       foreach($oblast1 as $item) {
	   $oblast_reg = $item;}};  
 ?>

	<section>
	
	    <link rel="stylesheet" href="/owl-carousel/css/owl.carousel.css">
	    <link rel="stylesheet" href="/owl-carousel/css/owl.theme.default.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		 <script src="/owl-carousel/js/owl.carousel.js"></script>			
         <style>
		 .product-image-wrapper3{
	border:3px solid #e2e2de;
	overflow: auto;
	margin-bottom:10px;
    height: max-content;
	max-width: 320px;
    border-radius: 8px;		
		
}
		 
        .product-image-wrapper1{
	border:3px solid #e2e2de;
	overflow: auto;
	margin-bottom:10px;
    height: 320px;
	max-width: 320px;
    border-radius: 8px;		
		
}
        .single-products1{
	max-height: 430px;
    max-width: 400px;
    margin-bottom: 5px;	
		}
		
		.product-image-wrapper4{
	border:3px solid #e2e2db;
	overflow: auto;
	margin-bottom:10px;
    max-height: max-content;
	max-width: 320px;
    border-radius: 8px;		
		
}

    .product-image-wrapper5{
	border:4px solid red;
	//background-color: #fedcad;
	overflow: auto;
	margin-bottom:8px;
    max-height: max-content;
	max-width: 340px;
    border-radius: 8px;		
		
}

        .single-products2{
	max-height: 430px;
    max-width: 400px;
    margin-bottom: 5px;	
		}
		
		 input[type="submit"] {
    width: 37px; /* Ширина кнопки */
    height: 37px; /* Высота кнопки */
	margin-left: 2px;
	border-radius: 8px;
    background: url(/images/search.png) no-repeat 50% 50%; /* Параметры фона */
   }
   
  
   
  
   
        </style>
	
	  <?php $id = Yii::$app->request->get('id'); ?>
	
		<div class="container" style="padding-top: 10px">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar" style="padding-left: 5px;">
						<h2>Категории недвижимости</h2>
                           
                        
						<ul class="catalog1 category-products">
<?= \app\components\MenuWidgetned::widget(['tpl' => 'menuned' ]) ?>
                 </ul>
                                               
					<a href = "#"></a>	
					
					 
					 <div class="brands-name left-sidebar" id="brands_products1">
					<div id="fixed">
					<!--ПОИСК КВАРТИР-->
					
         <?php if($id == 1||$id == 8||$id == 9||$id == 10||$id == 11||$id == 12||$id == 13||$id == 28||$id == 29||$id == 30) { ?>					
					  <center> <h2> поиск квартир </h2> </center>	
				
        <form method="get" action="<?= Url::to(['nedvigkvartiri/search' ]) ?>">
   
             <?php $form = ActiveForm::begin(); ?>
			 <center><table class="table table-hover">
		  
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
])->label('Город');
?>
</td>
</tr>
</table></center>

<center><table class="table table-hover">
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
                <label>Вид</label>
               
<select id="product-category_id" class="form-control" name="Vidnedvig[id]">
   
     <?= \app\components\MenuWidgetvidnedvig::widget (['tpl'=> 'select_vidnedvig', 'model' => $model])?>

</select>
           </td>
            <td>    
                <label>Комнат</label>
               
<select id="product-category_id" class="form-control" name="Komnat[id]">
   
     <?= \app\components\MenuWidgetkomnat::widget (['tpl'=> 'select_komnat', 'model' => $model])?>

</select>
</td>
</tr></table></center>
               <center><table class="table table-hover">
			     <tr>
                <td><input type="text" style = "height: 30px; width: 200px;" placeholder="улица" name="p4"/>
				<small class="ttip">что это ?<span><?=$ulica;?></span></small></td></tr>
			   <tr>
                <td><input type="text" style = "height: 30px; width: 200px;" placeholder="текст в описании" name="p3"/>
				<small class="ttip">что это ?<span><?=$text;?></span></small></td></tr>
               <tr>
                <td><input type="tel" style = "height: 30px; width: 200px;" placeholder="мин. площадь цифрами" name="p1"/></td></tr>
               <tr><td> <input type="tel" style = "height: 30px; width: 200px;" placeholder="макс. цена цифрами" name="p2"/></td></tr>
                 </table></center>
				
				<center><table class="table table-hover">
                <tr><td>
                <center><input id="drugie" class="drugie" type="submit" class="btn btn-warning" name="search" value="ПОИСК"/></center></td></tr>
				</table></center><?php ActiveForm::end();?> 
                        
        
        </form>					 
			 <?php }?>
			 
			  <!--ПОИСК ДОМОВ-->
			  
			   <?php if($id == 2): ?>
			    <center> <h2> поиск домов,коттеджей </h2> </center>	
			
			 <form method="get" action="<?= Url::to(['nedvigdoma/search' ]) ?>">
		
             		
			     <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?> 
			    <center><table class="table table-hover">
			
		 
		
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
])->label('Город');
?>
</td>
</tr>
</table></center>

<center><table class="table table-hover ">
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
               <center><table class="table table-hover ">

               <tr><td><input type="text" style = "height: 30px; width: 200px;" placeholder="адрес, местоположение" name="p3"/>
			   <small class="ttip">что это ?<span><?=$textdom;?></span></small></td></tr>
               <tr><td><input type="tel" style = "height: 30px; width: 200px;" placeholder="мин. площадь цифрами" name="p1"/></td></tr>
               <tr><td> <input type="tel" style = "height: 30px; width: 200px;" placeholder="макс. цена цифрами" name="p2"/></td></tr>
                
				</table></center>
				<center><table class="table table-hover ">
                <tr><td>
                <center><input id="drugie" class="drugie" type="submit" class="btn btn-warning" name="search" value="ПОИСК"/></center></td></tr>
				</table></center><?php ActiveForm::end();?> 
        
        </form>
			   <?php endif; ?>
			 
			 <!--ПОИСК КОМНАТЫ-->
			 
			  <?php if($id == 3): ?>
			    <center> <h2> поиск комнат </h2> </center>	
			
			 <form method="get" action="<?= Url::to(['nedvigkomnati/search']) ?>">
	
			   
			   <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?> 
			 <center><table class="table table-hover ">
		  
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
])->label('Город');
?>
</td>
</tr>
</table></center>

<center><table class="table table-hover ">

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

</select></td></tr>

              <tr>
                <td><input type="tel" style = "height: 30px; width: 200px;" placeholder="мин. площадь цифрами" name="p1"/></td></tr>
               <tr><td> <input type="tel" style = "height: 30px; width: 200px;" placeholder="макс. цена цифрами" name="p2"/></td></tr>
			   <tr><td><input type="tel" style = "height: 30px; width: 200px;" placeholder="макс.количество комнат цифрами" name="p3"/></td></tr>
               
				</table></center>
				<center><table class="table table-hover ">
                <tr><td>
                <center><input id="drugie" class="drugie" type="submit" class="btn btn-warning" name="search" value="ПОИСК"/></center></td></tr>
				</table></center><?php ActiveForm::end();?> 

        </form>
			  <?php endif; ?>
			 
			 <!--ПОИСК КОММЕРЧЕСКАЯ-->
			 
			  <?php if($id == 4||$id == 19||$id == 20||$id == 21||$id == 23||$id == 24||$id == 25||$id == 26): ?>
			  
			  <center> <h2> поиск коммерческой </h2> </center>	
			
			 <form method="get" action="<?= Url::to(['nedvigkommercheska/search' ]) ?>">
		

			   <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?> 
			 <center><table class="table table-hover ">
		  
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
])->label('Город');
?>
</td>
</tr>
</table></center>

<center><table class="table table-hover ">
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

</select></td></tr>
           
               <tr><td>
                <label>Тип</label>
               
<select id="product-category_id" class="form-control" name="Kommtip[id]">
   
     <?= \app\components\MenuWidgetkommtip::widget (['tpl'=> 'select_kommtip', 'model' => $model])?>

</select></td></tr>

               <tr>
                <td><input type="tel" style = "height: 30px; width: 200px;" placeholder="мин. площадь цифрами" name="p1"/></td></tr>
               <tr><td> <input type="tel" style = "height: 30px; width: 200px;" placeholder="макс. цена цифрами" name="p2"/></td></tr>
               
				</table></center>
				<center><table class="table table-hover ">
                <tr><td>
                <center><input id="drugie" class="drugie" type="submit" class="btn btn-warning" name="search" value="ПОИСК"/></center></td></tr>
				</table></center><?php ActiveForm::end();?>
                        
        </form>
			  
			  <?php endif; ?>
			 
			 <!--ПОИСК ЗЕМЕЛЬНЫХ УЧАСТКОВ-->
			 
			   <?php if($id == 5||$id == 14||$id == 15||$id == 16||$id == 17||$id == 18): ?>
			   
			    <center> <h2> поиск участков </h2> </center>	
			   
				 <form method="get" action="<?= Url::to(['nedvigzemli/search' ]) ?>">
		
             			
			   <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?> 
			 <center><table class="table table-hover ">
		  
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
])->label('Город');
?>
</td>
</tr>
</table></center>

<center><table class="table table-hover ">
		  
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
])->label('Район');?></td></tr>
<tr>
<td>
<label>Назначение</label>
               
<select id="product-category_id" class="form-control" name="Tipzemli[id]">
   
     <?= \app\components\MenuWidgettipzemli::widget (['tpl'=> 'select_tipzemli', 'model' => $model])?>

</select></td></tr> 

                <tr>
                <td><input type="tel" style = "height: 30px; width: 200px;" placeholder="мин. площадь цифрами" name="p1"/></td></tr>
               <tr><td> <input type="tel" style = "height: 30px; width: 200px;" placeholder="макс. цена цифрами" name="p2"/></td></tr>
                
				</table></center>
				<center><table class="table table-hover ">
                <tr><td>
                <center><input  id="drugie" class="drugie" type="submit" class="btn btn-warning" name="search" value="ПОИСК"/></center></td></tr>
				</table></center><?php ActiveForm::end();?>
                               
        </form>			
			   
			   <?php endif; ?>
			   
			 
			 <!--ПОИСК ГАРАЖЕЙ-->
			 
			   <?php if($id == 6): ?>
			   
			    <center> <h2> поиск гаражей </h2> </center>	
			
			 <form method="get" action="<?= Url::to(['nedviggaragi/search' ]) ?>">
		
			   
			   <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?> 
			 <center><table class="table table-hover ">
		  
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
])->label('Город');
?>
</td>
</tr>
</table></center>

<center><table class="table table-hover ">

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
<label>Материал</label>
               
<select id="product-category_id" class="form-control" name="Material[id]">
   
     <?= \app\components\MenuWidgetgaragmaterial::widget (['tpl'=> 'select_garagmaterial', 'model' => $model])?>

</select></td></tr>
           
             <tr><td>  
                <label>Охрана</label>
               
<select id="product-category_id" class="form-control" name="Ochrana[id]">
   
     <?= \app\components\MenuWidgetochrana::widget (['tpl'=> 'select_ochrana', 'model' => $model])?>

</select></td></tr>
             
                <tr>
                <td><input type="tel" style = "height: 30px; width: 200px;" placeholder="мин. площадь цифрами" name="p1"/></td></tr>
                <tr><td><input type="tel" style = "height: 30px; width: 200px;" placeholder="макс. цена цифрами" name="p2"/></td></tr>
                </table></center>
      		        <center><table class="table table-hover "><tr><td>
                <center><input id="drugie" class="drugie" type="submit" class="btn btn-warning" name="search" value="ПОИСК"></center>
				</td></tr></table></center><?php ActiveForm::end();?> 
                        
        
        </form>
			   
			   <?php endif; ?>
			 
			 <!--ПОИСК БИЗНЕСА-->
			 
			  <?php if($id == 7): ?>
			  
			  <center> <h2> поиск бизнеса </h2> </center>	
			
			 <form method="get" action="<?= Url::to(['nedvigbiznes/search' ])?>">
		
             			
			   <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?> 
			 <center><table class="table table-hover ">
		  
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
])->label('Город');
?>
</td>
</tr>
</table></center>

<center><table class="table table-hover ">

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
      		        <center><table class="table table-hover "><tr><td>
                <center><input id="drugie" class="drugie" type="submit" class="btn btn-warning" name="search" value="ПОИСК"></center>
				</td></tr></table></center><?php ActiveForm::end();?>
				
</form>
			  
			  <?php endif; ?>
			 
			 </div>
              
             
			 <!--\\\\\\\\\\\\\\\\КОНЕЦ ПОИСКОВ\\\\\\\\\\\\\\\\\\\\\\-->
						
					</div>	
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
                                            
						
                             <?php $id = Yii::$app->request->get('id'); ?>
                                                
                                                
                                        <!--/////////////////////////КВАРТИРЫ////////////////////////-->
                                                
                                           
					<?php if($id == 1||$id == 8||$id == 9||$id == 10||$id == 11||$id == 12||$id == 13||$id == 28||$id == 29||$id == 30): ?>
										
										<?php 
                                        
										$nam = $nedvigcategory->name;
										
										?>
								        <h1 style = "font-size: 15px; 
						             margin-top: 1px; 
									 color: #397F8C; 
									 text-transform: uppercase; 
									 font-weight: 700;
									 font-family: 'Roboto', sans-serif;" class="title text-center">
									 <?php if ($id == 8||$id == 1) { ?>
									 <div id="brands_products1">Купить, Арендовать квартиру в Краснодаре и Краснодарском крае</div>
									  <div id="brands_products2">Купить, Арендовать квартиру
						<a href ="<?= Url::to (['cart/kvart']) ?>" class= "showSearchkvartt">
										  <span class="letter"><img src="/images/nastroika.png" alt="поиск"></span></a></div>
									 <?php } elseif ($id == 11||$id == 12||$id == 13) {?>
										  <div id="brands_products1">Купить, Арендовать, <?= $nam ?> квартиру в новостройке в Краснодаре и Краснодарском крае</div>
									  <div id="brands_products2"> Купить <?= $nam ?> квартиру в новостройке
						<a href ="<?= Url::to (['cart/kvart']) ?>" class= "showSearchkvartt">
										  <span class="letter"><img src="/images/nastroika.png" alt="поиск"></span></a></div>
									 <?php } elseif ($id == 28||$id == 29||$id == 30) {?>
										  <div id="brands_products1">Купить, Арендовать, <?= $nam ?> квартиру, вторичка в Краснодаре и Краснодарском крае</div>
									  <div id="brands_products2"> Купить <?= $nam ?> квартиру, вторичка
						<a href ="<?= Url::to (['cart/kvart']) ?>" class= "showSearchkvartt">
										  <span class="letter"><img src="/images/nastroika.png" alt="поиск"></span></a></div>
									 <?php } ?>
										  </h1>
												
												<!--------НАВЕРХУ-------->
												
												<?php $date = date("Y-m-d H:i:s");		
											
							$verhs = Nedvigkvartiri::find()->where(['verh' => 1])->andWhere(['>=','verhdate',$date])->orderBy('RAND()')->all();
												if (!empty($verhs)):
												
											 foreach ($verhs as $verh):?>
												
								<?php if ($verh->moder == 1&&$verh -> verh == 1) { ?>
												<?php
												
		if ($verh->gorod ==0){         
      
	   }										
       else {$gorod1 = Goroda::find()->select('name')
    ->where(['id' => $verh->gorod])
    ->one();
       foreach($gorod1 as $item) {
	   $verh->gorod = $item;}};      
        
       if ($verh->raion ==0){         
      
	   }
	   else {$raion1 = Raion::find()->select('raion')
    ->where(['id' => $verh->raion])
    ->one();
       foreach($raion1 as $item) {
       $verh->raion = $item;}};
                      
    ?>
												
						<div class="col-sm-3">
						<center>
							<?php if(!empty($verh->videl)){ ?> 
						<div class="product-image-wrapper5">
						<?php } else { ?> 
							<div class="product-image-wrapper4">
						<?php } ?>
								<div class="single-products2">
									<center><div class="productinfo text-center">
                                                                           
                                                                 <?php $model = Nedvigkvartiri::findOne($verh->id);?>
                                                                            
                                                                 <?php $imageTitle = $model->getImage();?>
																			 
																		 
										                        <?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
																			 
													 
                                              <a href="<?= Url::to(['nedvigkvartiri/'.$verh->id,'ads' =>'kvartira_plochad_'.$verh->plochad_obchy.'_komn_'.$verh->kolichestvo_komnat.'_price_'.$verh->price]) ?>">
											  <li><?=Html::img($imageTitle->getUrl(''), ['alt' => $verh->opisanie]) ?></li></a>
												                  
											 							 <?php } else { ?> 
																			 
									    	 <a href="<?= Url::to(['nedvigkvartiri/'.$verh->id,'ads' =>'kvartira_plochad_'.$verh->plochad_obchy.'_komn_'.$verh->kolichestvo_komnat.'_price_'.$verh->price]) ?>">
											 <li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => $verh->opisanie]) ?></li></a>
												 
												                             <?php } ?>
												 
                                                                     </div></center>
                                                                    
                                                                    
								<div class="productinfo2 text-center">		
						            <p>квартира в <?= $verh->gorod ?></p> 
                                                  <p><?= $verh -> operaciya ?> - <a href ="<?= Url::to(['nedvigkvartiri/'.$verh->id,'ads' =>'kvartira_plochad_'.$verh->plochad_obchy.'_komn_'.$verh->kolichestvo_komnat.'_price_'.$verh->price])  ?>">
												  <b><?=$verh->kolichestvo_komnat?> </b>комнатная </a></p>
												<p><b>Район:</b> <?= $verh->raion ?></p>
												<p> <b>ул. </b><?= $verh -> street ?> </p>               

                                    <p><b>Цена:</b> <?= $formatted_number = number_format($verh->price, 0, ',', ' '); ?> <b>руб.</b></p>
                                                                                
				
<!--								<a href="#" data-id = "<?= $product->id ?>" class="btn btn-default add-to-cart"><img class="animate1" src="/images/iz.png" alt=""></span>Add to cart</a>-->
									</div>

                                                    <?php if ($verh->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>

                                                    
                                                                    
                                                    <?php if ($verh->sale):?>
                                                                    <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'sale' ]) ?>
                                                                    <?php endif ?>
																	
													 <p><a href ="<?= Url::to (['cart/addkvart', 'id'=> $verh->id]) ?>" data-id = "<?= $nedvigkvartiri->id?>"
                          class="btn-iz add-to-cartkvart"><img class="animate1" src="/images/iz.png" alt=""></span></a></p>				

                              <div class="btn-podrob">
									 <ul class="nav navbar-nav collapse navbar-collapse">        
							   <li class="dropdown"><img class="animate1" src="/images/podrobno3.png" alt="">		    			 
							     <ul role="menu" class="sub-menu1">
							
                        <li> КРАТКОЕ ОПИСАНИЕ:<hr> <?= mb_substr($verh->opisanie, 0, 100);  ?><br>
									  <a href="<?= Url::to(['nedvigkvartiri/'.$verh->id,'ads' =>'kvartira_plochad_'.$verh->plochad_obchy.'_komn_'.$verh->kolichestvo_komnat.'_price_'.$verh->price]) ?>" class="btn btn-default1">подробнее о квартире</a>
						</li>
							
							     </ul>
							   </li>				
								</ul>
								      </div>
									  
						 <div id="brands_products2">
									  <div class="btn-podrob">
									<small class="podrob"><img class="animate1" src="/images/podrobno5.png" alt="">
									<span>КРАТКОЕ ОПИСАНИЕ:<hr><?= mb_substr($verh->opisanie, 0, 150);  ?><br>
									 <a href="<?= Url::to(['nedvigkvartiri/'.$verh->id,'ads' =>'kvartira_plochad_'.$verh->plochad_obchy.'_komn_'.$verh->kolichestvo_komnat.'_price_'.$verh->price]) ?>" class="btn btn-default1">подробнее о квартире</a>
									 <a href="tel:<?= $verh -> telephone ?>" target="_blank" class="btn btn-default1"> позвонить</a>
									  
									</span></small>
									 </div>
									</div> 			  
								

								</div>
								
							</div>
						</center>
                                                </div>
												
                                               <?php $i++ ?>
                                                <?php if ($i % 4 == 0):?>
                                                     <div class="clearfix"></div>
                                                
                                                <?php endif; ?>
											    <?php } ?>
												
                                                <?php endforeach; ?>
											 <?php endif; ?>
												<!----КОНЕЦ НАВЕРХУ---->
												
												  <?php if (!empty($nedvigkvartiri)): ?>
												
                                                <?php foreach ($nedvigkvartiri as $nedvigkvartiri):?>
                                                 
												
												<?php if ($nedvigkvartiri->moder == 1) { ?>
												<?php
																				
										if ($nedvigkvartiri->gorod ==0){         
									  
									   }										
									   else {$gorod1 = Goroda::find()->select('name')
									->where(['id' => $nedvigkvartiri->gorod])
									->one();
									   foreach($gorod1 as $item) {
									   $nedvigkvartiri->gorod = $item;}};      
										
									   if ($nedvigkvartiri->raion ==0){         
									  
									   }
									   else {$raion1 = Raion::find()->select('raion')
									->where(['id' => $nedvigkvartiri->raion])
									->one();
									   foreach($raion1 as $item) {
									   $nedvigkvartiri->raion = $item;}};
									   
															 $mainImg = $nedvigkvartiri->getImage();
															 $gallery = $nedvigkvartiri->getImages();
													  
										 $pl = $nedvigkvartiri -> plochad_obchy;
										 $oper = $nedvigkvartiri -> operaciya;
										$tip = $nedvigkvartiri -> type;
										$kom = $nedvigkvartiri -> kolichestvo_komnat;
										$gor = $nedvigkvartiri -> gorod;
										$price = $nedvigkvartiri -> price;			  
									?>
												
						<div class="col-sm-3">
						<center>
							<?php if(!empty($nedvigkvartiri->videl)){ ?> 
						<div class="product-image-wrapper5">
						<?php } else { ?> 
							<div class="product-image-wrapper4">
						<?php } ?>
						<div itemscope itemtype="http://schema.org/Product">
								<div class="single-products2">
									<center> 

                                 <div class="productinfo text-center">		
                                                                           
									 <?php $model = Nedvigkvartiri::findOne($nedvigkvartiri->id);?>
												
									 <?php $imageTitle = $model->getImage();?>
											 
									<?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
															 
									 
<a href="<?= Url::to(['nedvigkvartiri/'.$nedvigkvartiri->id,'ads' =>'kvartira_plochad_'.$nedvigkvartiri->plochad_obchy.'_komn_'.$nedvigkvartiri->kolichestvo_komnat.'_price_'.$nedvigkvartiri->price]) ?>">
							  <li><?=Html::img($imageTitle->getUrl(''), ['alt' => "$kom" .' комнатная  🏙  ' ."$tip" .', '. "$oper".', '."$pl".' м.кв. '."$price".' руб. '."$gor"]) ?>
							  </li></a>
												  
														 <?php } else { ?> 
															 
							 <a href="<?= Url::to(['nedvigkvartiri/'.$nedvigkvartiri->id,'ads' =>'kvartira_plochad_'.$nedvigkvartiri->plochad_obchy.'_komn_'.$nedvigkvartiri->kolichestvo_komnat.'_price_'.$nedvigkvartiri->price]) ?>">
							 <li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => "$kom" .' комнатная  🏙  ' ."$tip" .', '. "$oper".', '."$pl".' м.кв. '."$price".' руб. '."$gor"]) ?></li></a>
								 
															 <?php } ?>
								 
													 </div>

									</center>
                                                                    
                                                                    
								<div class="productinfo2 text-center">	
  
                            <h2 itemprop="name" style="font-size: 15px; margin-top: 10px;"> <a style="color:#034176" href ="<?= Url::to(['nedvigkvartiri/'.$nedvigkvartiri->id,'ads' =>'kvartira_plochad_'.$nedvigkvartiri->plochad_obchy.'_komn_'.$nedvigkvartiri->kolichestvo_komnat.'_price_'.$nedvigkvartiri->price])  ?>">
												  <strong><?=$nedvigkvartiri -> operaciya.'-'.$nedvigkvartiri->kolichestvo_komnat?> комнатная  квартира,</strong>
						                                          г. <?= $nedvigkvartiri->gorod ?></a></h2> 
                                                 
												<p><b>Район:</b> <?= $nedvigkvartiri->raion ?></p>
												<p> <b>ул. </b><?= $nedvigkvartiri -> street ?> </p>               
                               <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">	
                                    <p itemprop="price"><b>Цена:</b> <?= $formatted_number = number_format($nedvigkvartiri->price, 0, ',', ' '); ?> <b>руб.</b></p>
                                <meta itemprop="priceCurrency" content="RUB">   
							   </div>                                                
				
<!--								<a href="#" data-id = "<?= $product->id ?>" class="btn btn-default add-to-cart"><img class="animate1" src="/images/iz.png" alt=""></span>Add to cart</a>-->
									</div>

                                                    <?php if ($nedvigkvartiri->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>

                                                    
                                                                    
                                                    <?php if ($nedvigkvartiri->sale):?>
                                                                    <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'sale' ]) ?>
                                                                    <?php endif ?>
																	
												 <p><a href ="<?= Url::to (['cart/addkvart', 'id'=> $nedvigkvartiri->id]) ?>" data-id = "<?= $nedvigkvartiri->id?>"
                          class="btn-iz add-to-cartkvart"><img class="animate1" src="/images/iz.png" alt=""></span></a></p>	

                                    <div class="btn-podrob">
									 <ul class="nav navbar-nav collapse navbar-collapse">        
						 <li class="dropdown"><img class="animate1" src="/images/podrobno5.png" alt="">		    			 
							     <ul role="menu" class="sub-menu1">
							
                        <li itemprop="description"> КРАТКОЕ ОПИСАНИЕ:<hr> <?= mb_substr($nedvigkvartiri->opisanie, 0, 100);  ?><br>
									  <a href="<?= Url::to(['nedvigkvartiri/'.$nedvigkvartiri->id,'ads' =>'kvartira_plochad_'.$nedvigkvartiri->plochad_obchy.'_komn_'.$nedvigkvartiri->kolichestvo_komnat.'_price_'.$nedvigkvartiri->price]) ?>" class="btn btn-default1">подробнее о квартире</a>
						</li>
							
							     </ul>
							     </li>				
								</ul>
								      </div>

                                 <div id="brands_products2">
									  <div class="btn-podrob">
									<small class="podrob"><img class="animate1" src="/images/podrobno5.png" alt="">
									<span>КРАТКОЕ ОПИСАНИЕ:<hr><?= mb_substr($nedvigkvartiri->opisanie, 0, 150);  ?><br>
									 <a href="<?= Url::to(['nedvigkvartiri/'.$nedvigkvartiri->id,'ads' =>'kvartira_plochad_'.$nedvigkvartiri->plochad_obchy.'_komn_'.$nedvigkvartiri->kolichestvo_komnat.'_price_'.$nedvigkvartiri->price]) ?>" class="btn btn-default1">подробнее о квартире</a>
									 <a href="tel:<?= $nedvigkvartiri -> telephone ?>" target="_blank" class="btn btn-default1"> позвонить</a>
									 
									</span></small>
									 </div>
									</div> 									  

								</div>
								</div>
							</div>
						</center>
                                                </div>
                                                <?php $i++ ?>
                                                <?php if ($i % 4 == 0):?>
                                                     <div class="clearfix"></div>
                                                
                                                <?php endif; ?>
											    <?php } ?>
												
                                                <?php endforeach; ?>
                                                <div class="clearfix"></div>
                                               <center> <?php 
                                                echo LinkPager::widget([
                                                'pagination' => $pages,
                                                   ]);
                                                 ?>  </center>   
                   
				   <?php $page=$_GET[page];?>
                  <center><h2><span style="font-size: 16px">
                   Купить, продать, арендовать <?php if ($nam == 'Все квартиры'){}else{echo "$nam"; }?> Квартиру в Краснодаре, Краснодарском крае и юге России.<?php if($page){echo страница .' '."$page";}?>
                      <div id="some_text" style="display: none;">	
                 В этом разделе доски объявлений собраны все объявления по продажу, покупке, аренды квартир Краснодара, Краснодарского края и юга России.
Если Вы хотите купить квартиру например в Краснодаре, мы рекомендуем Вам воспользоваться Расширенным поиском квартир и найдется все.
Изначально объявления в разделе размещены по дате убывания. Квартиры всех городов и районов Краснодарского края и города Краснодар.
Знак увеличительное стекло в углу каждого объявления позволяет предварительно посмотреть краткое описание квартиры, если понравиться нажмите подробнее и откроется карточка объявления.
Также Вы можете добавить любое объявление квартиры в избранное, знак звездочка.
                     </div></h2><br>
                <a id="link">Показать полностью</a></center>	
												 
						<?php else:?>
                                                
                                               <table>
               <center><h4>Здесь пока ничего нет. У Вас есть шанс быть первым <br><a href= "<?= Url::to (['/admin']) ?>" <i class="fa fa-plus-square"></i> Подать объявление в разделе</a>.</h4></center>
                             </table> 
                                                
						<?php endif; ?>
                                                <?php endif; ?>
                                                <div class="clearfix"></div>
                                            
               
</div>			   
                                               <!--////////////////////ДОМА///////////////////////-->
                                                
                                                 <?php if($id == 2): ?>
												 
									<h1 style = "font-size: 16px; 
						             margin-top: 1px; 
									 color: #397F8C; 
									 text-transform: uppercase; 
									 font-weight: 700;
									 font-family: 'Roboto', sans-serif;" class="title text-center">
									  <div id="brands_products1">Купить коттедж/дом в Краснодаре и Краснодарском крае</div>
									  <div id="brands_products2">Купить коттедж/дом
						<a href ="<?= Url::to (['cart/dom']) ?>" class= "showSearchdom">
										  <span class="letter"><img src="/images/nastroika.png" alt="поиск"></span></a></div></h1>				 
												 
												 <!--------НАВЕРХУ-------->
												
												<?php $date = date("Y-m-d H:i:s");		
											
							$verhs = Nedvigdoma::find()->where(['verh' => 1])->andWhere(['>=','verhdate',$date])->orderBy('RAND()')->all();
												if (!empty($verhs)):
												
											 foreach ($verhs as $verh):?>
												
								<?php if ($verh->moder == 1&&$verh -> verh == 1) { ?>
												<?php
												
										if ($verh->gorod ==0){         
									  
									   }										
									   else {$gorod1 = Goroda::find()->select('name')
									->where(['id' => $verh->gorod])
									->one();
									   foreach($gorod1 as $item) {
									   $verh->gorod = $item;}};      
										
									   if ($verh->raion ==0){         
									  
									   }
									   else {$raion1 = Raion::find()->select('raion')
									->where(['id' => $verh->raion])
									->one();
									   foreach($raion1 as $item) {
									   $verh->raion = $item;}};
													  
									?>
												
						<div class="col-sm-3">
						<center>
							<?php if(!empty($verh->videl)){ ?> 
						<div class="product-image-wrapper5">
						<?php } else { ?> 
							<div class="product-image-wrapper4">
						<?php } ?>
								<div class="single-products2">
									<center><div class="productinfo text-center">
                                                                           
                                                                 <?php $model = Nedvigdoma::findOne($verh->id);?>
                                                                            
                                                                 <?php $imageTitle = $model->getImage();?>
																			 
																		 
										                        <?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
																			 
													 
                                              <a href="<?= Url::to(['nedvigdoma/'.$verh->id,'ads' =>'dom_plochad_'.$verh->plochad_doma.'_uchastok_'.$verh->plochad_uchastka.'sot_price_'.$verh->price]) ?>">
											  <li><?=Html::img($imageTitle->getUrl(''), ['alt' => $verh->vid_obiekta]) ?></li></a>
												                  
											 							 <?php } else { ?> 
																			 
									    	 <a href="<?= Url::to(['nedvigdoma/'.$verh->id,'ads' =>'dom_plochad_'.$verh->plochad_doma.'_uchastok_'.$verh->plochad_uchastka.'sot_price_'.$verh->price]) ?>">
											 <li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => $verh->vid_obiekta]) ?></li></a>
												 
												                             <?php } ?>
												 
                                                                    
						
                                                <h5> <a href="<?= Url::to(['nedvigdoma/'.$verh->id,'ads' =>'dom_plochad_'.$verh->plochad_doma.'_uchastok_'.$verh->plochad_uchastka.'sot_price_'.$verh->price]) ?>">
												<?= $verh->vid_obiekta ?></a></h5>
                                                                     
										<p><b>До города: </b> <?= $verh->rasstoyanie_do_goroda ?></p>
                                                                               
                     <h5> <p><b>Этажей:</b> <?=$verh->etagei_v_dome?> | Пл.: <?=$verh->plochad_doma?> м.кв.</p></h5>
                                             <h5><b>Цена: </b><?= $formatted_number = number_format($verh->price, 0, ',', ' '); ?> <b>руб.</b></h5>
                                                                                                                      
				
<!--								<a href="#" data-id = "<?= $product->id ?>" class="btn btn-default add-to-cart"><img class="animate1" src="/images/iz.png" alt=""></span>Add to cart</a>-->
									</div></center>

                                                    <?php if ($verh->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>

                                                    
                                                                    
                                                    <?php if ($verh->sale):?>
                                                                    <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'sale' ]) ?>
                                                                    <?php endif ?>
																	
													 <p><a href ="<?= Url::to (['cart/adddoma', 'id'=> $verh->id]) ?>" data-id = "<?= $verh->id?>"
                          class="btn-iz add-to-cartdoma"><img class="animate1" src="/images/iz.png" alt=""></span></a></p>	

                              <div class="btn-podrob">
									 <ul class="nav navbar-nav collapse navbar-collapse">        
						 <li class="dropdown"><img class="animate1" src="/images/podrobno5.png" alt="">		    			 
							     <ul role="menu" class="sub-menu1">
							
                        <li> КРАТКОЕ ОПИСАНИЕ:<hr> <?= mb_substr($verh->opisanie, 0, 100);  ?><br>
									  <a href="<?= Url::to(['nedvigdoma/'.$verh->id,'ads' =>'dom_plochad_'.$verh->plochad_doma.'_uchastok_'.$verh->plochad_uchastka.'sot_price_'.$verh->price]) ?>" class="btn btn-default1">подробнее о доме</a>
						
						</li>
							
							     </ul>
							     </li>				
								</ul>
								      </div>

                           <div id="brands_products2">
									  <div class="btn-podrob">
									<small class="podrob"><img class="animate1" src="/images/podrobno5.png" alt="">
									<span>КРАТКОЕ ОПИСАНИЕ:<hr><?= mb_substr($verh->opisanie, 0, 150);  ?><br>
									 <a href="<?= Url::to(['nedvigdoma/'.$verh->id,'ads' =>'dom_plochad_'.$verh->plochad_doma.'_uchastok_'.$verh->plochad_uchastka.'sot_price_'.$verh->price]) ?>" class="btn btn-default1">подробнее о доме/коттедже</a>
									 <a href="tel:<?= $verh -> telephone ?>" target="_blank" class="btn btn-default1"> позвонить</a>
									  
									</span></small>
									 </div>
									</div> 									  

								</div>
								
							</div>
						</center>
                                                </div>
												
                                               <?php $i++ ?>
                                                <?php if ($i % 4 == 0):?>
                                                     <div class="clearfix"></div>
                                                
                                                <?php endif; ?>
											    <?php } ?>
												
                                                <?php endforeach; ?>
											 <?php endif; ?>
												<!----КОНЕЦ НАВЕРХУ---->
												 
                                                <?php if (!empty($nedvigdoma)): ?>
                                                <?php foreach ($nedvigdoma as $nedvigdoma): ?>
												
												<?php if ($nedvigdoma->moder == 1) { ?>
												
												<?php
												
												     if ($nedvigdoma->oblast ==0){         
													  
													   }										
													   else {$oblast1 = oblast::find()->select('oblast_region')
													->where(['id' => $nedvigdoma->oblast])
													->one();
													   foreach($oblast1 as $item) {
													   $nedvigdoma->oblast = $item;}};  
												
														if ($nedvigdoma->gorod ==0){         
													  
													   }										
													   else {$gorod1 = Goroda::find()->select('name')
													->where(['id' => $nedvigdoma->gorod])
													->one();
													   foreach($gorod1 as $item) {
													   $nedvigdoma->gorod = $item;}};     													  
																	  
											   ?>
												
												
						<div class="col-sm-3">
						<center>
							<?php if(!empty($nedvigdoma->videl)){ ?> 
						<div class="product-image-wrapper5">
						<?php } else { ?> 
							<div class="product-image-wrapper4">
						<?php } ?>
						<div itemscope itemtype="http://schema.org/Product">
								<div class="single-products2">
									<div class="productinfo text-center">
                                                                            
                                                                           <?php $model = Nedvigdoma::findOne($nedvigdoma->id);?>
                                                                            
                                                                             <?php $imageTitle = $model->getImage();?>
                                                                          
                                                                        
                                                                      <?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
																			 
													 
 <a href="<?= Url::to(['nedvigdoma/'.$nedvigdoma->id,'ads' =>'dom_plochad_'.$nedvigdoma->plochad_doma.'_uchastok_'.$nedvigdoma->plochad_uchastka.'_sot_price_'.$nedvigdoma->price]) ?>">
												  <li><?=Html::img($imageTitle->getUrl(''), ['alt' => '🏡 Купить '.$nedvigdoma->vid_obiekta .' '.$nedvigdoma -> plochad_doma . ' м.кв., участок '.$nedvigdoma ->plochad_uchastka .' сот., '.$nedvigdoma ->price.' руб. '. $nedvigdoma->oblast]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
	<a href="<?= Url::to(['nedvigdoma/'.$nedvigdoma->id,'ads' =>'dom_plochad_'.$nedvigdoma->plochad_doma.'_uchastok_'.$nedvigdoma->plochad_uchastka.'_sot_price_'.$nedvigdoma->price]) ?>">
												  <li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => '🏡 Купить '.$nedvigdoma->vid_obiekta .' '.$nedvigdoma -> plochad_doma . ' м.кв., участок '.$nedvigdoma ->plochad_uchastka .' сот., '.$nedvigdoma ->price.' руб. '. $nedvigdoma->oblast]) ?></li></a>
												 
												                             <?php } ?>
                                                                            
                                                   <h2 itemprop="name" style="font-size: 15px; margin-top: 10px;">  <a style="color:#034176" href="<?= Url::to(['nedvigdoma/'.$nedvigdoma->id,'ads' =>'dom_plochad_'.$nedvigdoma->plochad_doma.'_uchastok_'.$nedvigdoma->plochad_uchastka.'_sot_price_'.$nedvigdoma->price]) ?>">
												  продается <?= $nedvigdoma->vid_obiekta ?><br> <?php if (!empty($nedvigdoma->gorod)){
													                                                echo г.'. '."$nedvigdoma->gorod";
												                                                   }else {
																									 echo "$nedvigdoma->oblast" ; 
																								   }?> </a></h2>
													                                     
                                                                     
										<p><b>До города: </b> <?= $nedvigdoma->rasstoyanie_do_goroda ?></p>
                                                                               
                     <h5> <p><b>Этажей:</b> <?=$nedvigdoma->etagei_v_dome?> | Пл.: <?=$nedvigdoma->plochad_doma?> м.кв.</p></h5>
					 
					                  <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                             <h5 itemprop="price"><b>Цена: </b><?= $formatted_number = number_format($nedvigdoma->price, 0, ',', ' '); ?> <b>руб.</b></h5>
                                         <meta itemprop="priceCurrency" content="RUB">   
                                        </div>
                   
<!--								<a href="#" data-id = "<?= $product->id ?>" class="btn btn-default add-to-cart"><img class="animate1" src="/images/iz.png" alt=""></span>Add to cart</a>-->
									</div>

                                                    <?php if ($nedvigdoma->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>

                                                    
                                                                    
                                                    <?php if ($nedvigdoma->sale):?>
                                                                    <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'sale' ]) ?>
                                                                    <?php endif ?>
																	
													 <p><a href ="<?= Url::to (['cart/adddoma', 'id'=> $nedvigdoma->id]) ?>" data-id = "<?= $nedvigdoma->id?>"
                          class="btn-iz add-to-cartdoma"><img class="animate1" src="/images/iz.png" alt=""></span></a></p>

                              <div class="btn-podrob">
									 <ul class="nav navbar-nav collapse navbar-collapse">        
						 <li class="dropdown"><img class="animate1" src="/images/podrobno5.png" alt="">		    			 
							     <ul role="menu" class="sub-menu1">
							
                        <li itemprop="description"> КРАТКОЕ ОПИСАНИЕ:<hr> <?= mb_substr($nedvigdoma->opisanie, 0, 100);  ?><br>
									  <a href="<?= Url::to(['nedvigdoma/'.$nedvigdoma->id,'ads' =>'dom_plochad_'.$nedvigdoma->plochad_doma.'_uchastok_'.$nedvigdoma->plochad_uchastka.'_sot_price_'.$nedvigdoma->price]) ?>" class="btn btn-default1">подробнее о доме</a>
						</li>
							
							     </ul>
							     </li>				
								</ul>
								      </div>

                            <div id="brands_products2">
									  <div class="btn-podrob">
									<small class="podrob"><img class="animate1" src="/images/podrobno5.png" alt="">
									<span>КРАТКОЕ ОПИСАНИЕ:<hr><?= mb_substr($nedvigdoma->opisanie, 0, 150);  ?><br>
									<a href="<?= Url::to(['nedvigdoma/'.$nedvigdoma->id,'ads' =>'dom_plochad_'.$nedvigdoma->plochad_doma.'_uchastok_'.$nedvigdoma->plochad_uchastka.'_sot_price_'.$nedvigdoma->price]) ?>" class="btn btn-default1">подробнее о доме/коттедже</a>
									 <a href="tel:<?= $nedvigdoma -> telephone ?>" target="_blank" class="btn btn-default1"> позвонить</a>
									   
									</span></small>
									 </div>
									</div> 									  

								</div>
								</div>
							</div>
							</center>
						</div>
                                                <?php $i++ ?>
                                                <?php if ($i % 4 == 0):?>
                                                     <div class="clearfix"></div>
                                                
                                                <?php endif; ?>
												<?php } ?>
                                                <?php endforeach; ?>
                                                <div class="clearfix"></div>
                                               <center> <?php 
                                                echo LinkPager::widget([
                                                'pagination' => $pages,
                                                   ]);
                                                 ?>  </center>  

                             <?php $page=$_GET[page];?>
                            <center><h2><span style="font-size: 16px">
							Купить, продать, арендовать Дом, Коттедж или Дачу в Краснодаре, Краснодарском крае и юге России.
							<?php if($page){echo страница .' '."$page";}?>
							  <div id="some_text" style="display: none;">
							В этом разделе доски объявлений собраны все объявления по продажу, покупке, аренды дома, коттеджа или дачи в Краснодаре, Краснодарском крае и юге России.
Если Вы хотите купить дом например в Краснодаре, мы рекомендуем Вам воспользоваться Расширенным поиском на доске объявлений и найдется все.
Изначально объявления в разделе размещены по дате убывания. Дома, коттеджи и дачи всех городов и районов Краснодарского края и города Краснодар.
Знак увеличительное стекло в углу каждого объявления позволяет предварительно посмотреть краткое описание объявления, если понравиться нажмите подробнее и откроется карточка объявления.
Также Вы можете добавить любое объявление в избранное, знак звездочка.  
							    </div></h2>
                <a id="link">Показать полностью</a></center>
												 
						<?php else:?>
                                                
                                                <table >
                                                <center><h4>Здесь пока ничего нет. У Вас есть шанс быть первым <br><a href= "<?= Url::to (['/admin']) ?>" <i class="fa fa-plus-square"></i> Подать объявление в разделе</a>.</h4></center>
                             </table> 
                                                
						<?php endif; ?>
                                                <?php endif; ?>
                                                <div class="clearfix"></div>
                                                
                                                
                                                
                                                <!--//////////////////КОМНАТЫ//////////////////-->
                                                
                                                  <?php if($id == 3): ?>
												  
												  <h1 style = "font-size: 16px; 
						             margin-top: 1px; 
									 color: #397F8C; 
									 text-transform: uppercase; 
									 font-weight: 700;
									 font-family: 'Roboto', sans-serif;" class="title text-center">
									  <div id="brands_products1">Купить, Арендовать комнату в Краснодаре и Краснодарском крае</div>
									  <div id="brands_products2">Купить, Арендовать комнату
						<a href ="<?= Url::to (['cart/komn']) ?>" class= "showSearchkomnati">
										  <span class="letter"><img src="/images/nastroika.png" alt="поиск"></span></a></div></h1>	
												  
                                                <?php if (!empty($nedvigkomnati)): ?>
                                                <?php foreach ($nedvigkomnati as $nedvigkomnati): ?>
												<?php if ($nedvigkomnati->moder == 1) { ?>
												<?php
												
													if ($nedvigkomnati->gorod ==0){         
												  
												   }										
												   else {$gorod1 = Goroda::find()->select('name')
												->where(['id' => $nedvigkomnati->gorod])
												->one();
												   foreach($gorod1 as $item) {
												   $nedvigkomnati->gorod = $item;}};      
													
												  
												?>
																							
												
						<div class="col-sm-3">
						<center>
							<?php if(!empty($nedvigkomnati->videl)){ ?> 
						<div class="product-image-wrapper5">
						<?php } else { ?> 
							<div class="product-image-wrapper3">
						<?php } ?>
						<div itemscope itemtype="http://schema.org/Product">
								<div class="single-products1">
									<div class="productinfo text-center">
                                                                            
                                                                            <?php $model = Nedvigkomnati::findOne($nedvigkomnati->id);?>
                                                                            
                                                                             <?php $imageTitle = $model->getImage();?>
                                                                          
                                                                        
                                                                      <?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
																			 
													 
         <a href="<?= Url::to(['nedvigkomnati/'.$nedvigkomnati->id,'ads' =>'komnata_plochad_'.$nedvigkomnati->plochad.'m.kv._price_'.$nedvigkomnati->price]) ?>">
												  <li><?=Html::img($imageTitle->getUrl(''), ['alt' => 'Купить комнату '. $nedvigkomnati -> plochad .' м.кв. цена '.$nedvigkomnati -> price.' руб. г.'.$nedvigkomnati->gorod]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												  <a href="<?= Url::to(['nedvigkomnati/'.$nedvigkomnati->id,'ads' =>'komnata_plochad_'.$nedvigkomnati->plochad.'m.kv._price_'.$nedvigkomnati->price]) ?>">
												  <li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => 'Купить комнату '. $nedvigkomnati -> plochad .' м.кв. цена '.$nedvigkomnati -> price.' руб. г.'.$nedvigkomnati->gorod]) ?></li></a>
												 
												                             <?php } ?>
                                                                     
							
										
										<p itemprop="name"><a style="color:#034176" href ="<?= Url::to(['nedvigkomnati/'.$nedvigkomnati->id,'ads' =>'komnata_plochad_'.$nedvigkomnati->plochad.'m.kv._price_'.$nedvigkomnati->price])  ?>">
										<?= $nedvigkomnati -> operaciya.' комнаты. </br>'. $nedvigkomnati->gorod ?> </a></p>
                                                                                
                                                      <p><b>Комнат:</b> <?=$nedvigkomnati->komnat_v_kvartire?> | Пл.: <?=$nedvigkomnati->plochad?> м.кв.</p>
                                                        
													<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">	
														<h5 itemprop="price"><b>Цена: </b><?= $formatted_number = number_format($nedvigkomnati->price, 0, ',', ' '); ?> <b>руб.</b></h5>
                                                     <meta itemprop="priceCurrency" content="RUB">   
													</div>
               
<!--								<a href="#" data-id = "<?= $product->id ?>" class="btn btn-default add-to-cart"><img class="animate1" src="/images/iz.png" alt=""></span>Add to cart</a>-->
									</div>

                                                    <?php if ($nedvigkomnati->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>

                                                    
                                                                    
                                                    <?php if ($nedvigkomnati->sale):?>
                                                                    <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'sale' ]) ?>
                                                                    <?php endif ?>
													
													 <p><a href ="<?= Url::to (['cart/addkomnati', 'id'=> $nedvigkomnati->id]) ?>" data-id = "<?= $nedvigkomnati->id?>"
                          class="btn-iz add-to-cartkomnati"><img class="animate1" src="/images/iz.png" alt=""></span></a></p>
						  
						   <div class="btn-podrob">
									 <ul class="nav navbar-nav collapse navbar-collapse">        
						 <li class="dropdown"><img class="animate1" src="/images/podrobno5.png" alt="">		    			 
							     <ul role="menu" class="sub-menu1">
							
                        <li itemprop="description"> КРАТКОЕ ОПИСАНИЕ:<hr> <?= mb_substr($nedvigkomnati->opisanie, 0, 100);  ?><br>
									  <a href="<?= Url::to(['nedvigkomnati/'.$nedvigkomnati->id,'ads' =>'komnata_plochad_'.$nedvigkomnati->plochad.'m.kv._price_'.$nedvigkomnati->price]) ?>" class="btn btn-default1">подробнее о комнате</a>
						</li>
							
							     </ul>
							     </li>				
								</ul>
								      </div>
									  
						 <div id="brands_products2">
									  <div class="btn-podrob">
									<small class="podrob"><img class="animate1" src="/images/podrobno5.png" alt="">
									<span>КРАТКОЕ ОПИСАНИЕ:<hr><?= mb_substr($nedvigkomnati->opisanie, 0, 150);  ?><br>
									<a href="<?= Url::to(['nedvigkomnati/'.$nedvigkomnati->id,'ads' =>'komnata_plochad_'.$nedvigkomnati->plochad.'m.kv._price_'.$nedvigkomnati->price]) ?>" class="btn btn-default1">подробнее о комнате</a>
									 <a href="tel:<?= $nedvigkomnati -> telephone ?>" target="_blank" class="btn btn-default1"> позвонить</a>
									   
									</span></small>
									 </div>
									</div> 			  

								</div>
								</div>
							</div>
							</center>
						</div>
                                                <?php $i++ ?>
                                                <?php if ($i % 4 == 0):?>
                                                     <div class="clearfix"></div>
                                                
                                                <?php endif; ?>
												<?php } ?>
                                                <?php endforeach; ?>
                                                <div class="clearfix"></div>
                                               <center> <?php 
                                                echo LinkPager::widget([
                                                'pagination' => $pages,
                                                   ]);
                                                 ?>   </center>                                     
						<?php else:?>
                                                
                                               <table >
                                                <center><h4>Здесь пока ничего нет. У Вас есть шанс быть первым <br><a href= "<?= Url::to (['/admin']) ?>" <i class="fa fa-plus-square"></i> Подать объявление в разделе</a>.</h4></center>
                             </table> 
                                                
						<?php endif; ?>
                                                <?php endif; ?>
                                                <div class="clearfix"></div>
                                                
                                                
                                                
                                                <!--////////////////КОММЕРЧЕСКАЯ НЕДВИЖИМОСТЬ//////////////-->
                                                
                                                
                                                
                                <?php if($id == 4||$id == 19||$id == 20||$id == 21||$id == 23||$id == 24||$id == 25||$id == 26): ?>
								
								<h1 style = "font-size: 16px; 
						             margin-top: 1px; 
									 color: #397F8C; 
									 text-transform: uppercase; 
									 font-weight: 700;
									 font-family: 'Roboto', sans-serif;" class="title text-center">
									 <?php if ($id == 4||$id == 19) { ?>
									  <div id="brands_products1">Коммерческая недвижимость в Краснодаре и Краснодарском крае</div>
									  <div id="brands_products2">Продажа, Аренда коммерческой
						<a href ="<?= Url::to (['cart/kommerch']) ?>" class= "showSearchkomm">
										  <span class="letter"><img src="/images/nastroika.png" alt="поиск"></span></a></div></h2>
									 <?php } else { ?>
									  <div id="brands_products1">Купить, Арендовать <?= $nedvigcategory->name ?> помещения в Краснодаре и Краснодарском крае</div>
									  <div id="brands_products2">Купить, Арендовать <?= $nedvigcategory->name ?> помещения
						<a href ="<?= Url::to (['cart/kommerch']) ?>" class= "showSearchkomm">
										  <span class="letter"><img src="/images/nastroika.png" alt="поиск"></span></a></div></h1>	
									 <?php } ?>		 
												  <!--------НАВЕРХУ-------->
												
												<?php $date = date("Y-m-d H:i:s");
                    if($id == 4||$id == 19){
						$verhs = Nedvigkommercheska::find()->where(['verh' => 1])->andWhere(['>=','verhdate',$date])->orderBy('RAND()')->all();
					}												
					elseif($id == 20){
						$verhs = Nedvigkommercheska::find()->where(['verh' => 1])->andWhere(['>=','verhdate',$date])->andWhere(['Like', 'type_nedvigimosty', 'Офисное'])->orderBy('RAND()')->all();
					}
					elseif($id == 21){
						$verhs = Nedvigkommercheska::find()->where(['verh' => 1])->andWhere(['>=','verhdate',$date])->andWhere(['Like', 'type_nedvigimosty', 'Торговое'])->orderBy('RAND()')->all();
					}
					/* elseif($id == 22){
						$verhs = Nedvigkommercheska::find()->where(['verh' => 1])->andWhere(['>=','verhdate',$date])->andWhere(['Like', 'type_nedvigimosty', 'Свободного типа'])->orderBy('RAND()')->all();
					} */
					elseif($id == 23){
						$verhs = Nedvigkommercheska::find()->where(['verh' => 1])->andWhere(['>=','verhdate',$date])->andWhere(['Like', 'type_nedvigimosty', 'Гостиничное'])->orderBy('RAND()')->all();
					}
					elseif($id == 24){
						$verhs = Nedvigkommercheska::find()->where(['verh' => 1])->andWhere(['>=','verhdate',$date])->andWhere(['Like', 'type_nedvigimosty', 'Складское'])->orderBy('RAND()')->all();
					}
					elseif($id == 25){
						$verhs = Nedvigkommercheska::find()->where(['verh' => 1])->andWhere(['>=','verhdate',$date])->andWhere(['Like', 'type_nedvigimosty', 'Производственное'])->orderBy('RAND()')->all();
					}
					elseif($id == 26){
						$verhs = Nedvigkommercheska::find()->where(['verh' => 1])->andWhere(['>=','verhdate',$date])->andWhere(['Like', 'type_nedvigimosty', 'Гаражного типа'])->orderBy('RAND()')->all();
					}
												if (!empty($verhs)):
												
											 foreach ($verhs as $verh):?>
												
								<?php if ($verh->moder == 1&&$verh -> verh == 1) { ?>
												<?php
												
												if ($verh->gorod ==0){         
											  
											   }										
											   else {$gorod1 = Goroda::find()->select('name')
											->where(['id' => $verh->gorod])
											->one();
											   foreach($gorod1 as $item) {
											   $verh->gorod = $item;}};      
												
											   if ($verh->raion ==0){         
											  
											   }
											   else {$raion1 = Raion::find()->select('raion')
											->where(['id' => $verh->raion])
											->one();
											   foreach($raion1 as $item) {
											   $verh->raion = $item;}};
											   
											    $zem1 = $verh->type_nedvigimosty;
											   
											   if ($zem1 === "Офисное"){
												   $zem1 = "ofisnoe";
											   }elseif($zem1 === "Производственное"){
												   $zem1 = "proizvodsvennoe";
											   }elseif($zem1 === "Торговое"){
												   $zem1 = "torgovoe";
											   }elseif($zem1 === "Гостиничное"){
												   $zem1 = "gostinichnie";
											   }elseif($zem1 === "Складское"){
												   $zem1 = "sklad";
											   }elseif($zem1 == "Гаражного типа"){
												   $zem1 = "garagnogo_tipa";
											   }
															  
											?>
												
						<div class="col-sm-3">
						
						<center>
							<?php if(!empty($verh->videl)){ ?> 
						<div class="product-image-wrapper5">
						<?php } else { ?> 
							<div class="product-image-wrapper4">
						<?php } ?>
								<div class="single-products2">
									<center><div class="productinfo text-center">
									
									
                                                                           
                                                                 <?php $model = nedvigkommercheska::findOne($verh->id);?>
                                                                            
                                                                             <?php $imageTitle = $model->getImage();?>
                                                                          
                                                                        
                                                                      <?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
																			 
													 
                  <a href="<?= Url::to(['nedvigkommercheska/'.$verh->id,'ads' =>$zem1.'_kommerch_nedvigimost_'.$verh->plochad.'m.kv._price_'.$verh->price]) ?>">
												 <li><?=Html::img($imageTitle->getUrl(''), ['alt' => $verh->type_nedvigimosty]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
               <a href="<?= Url::to(['nedvigkommercheska/'.$verh->id,'ads' =>$zem1.'_kommerch_nedvigimost_'.$verh->plochad.'m.kv._price_'.$verh->price]) ?>">
												 <li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => $verh->type_nedvigimosty]) ?></li></a>
												 
												                             <?php } ?>
                                                       
										
		                                                         <p> Город: <?= $verh->gorod ?></p>
                                                            
                                                              
                                                                                 <h5><?= $verh -> operaciya ?></h5>
        <h2 style="font-size: 16px; margin-top: 10px;"><b>Тип:</b> <a href ="<?= Url::to(['nedvigkommercheska/'.$verh->id,'ads' =>$zem1.'_kommerch_nedvigimost_'.$verh->plochad.'m.kv._price_'.$verh->price])  ?>">
																	  <?=$verh->type_nedvigimosty?> </a></h2>
                                                           <h5><b>Цена:</b> <?= $formatted_number = number_format($verh->price, 0, ',', ' '); ?><b> руб.</b></h5>
                                                                                
               
<!--								<a href="#" data-id = "<?= $product->id ?>" class="btn btn-default add-to-cart"><img class="animate1" src="/images/iz.png" alt=""></span>Add to cart</a>-->
									</div>

                                                    <?php if ($verh->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>

                                                    
                                                                    
                                                    <?php if ($verh->sale):?>
                                                                    <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'sale' ]) ?>
                                                                    <?php endif ?>
																	
													 <p><a href ="<?= Url::to (['cart/addkommer', 'id'=> $verh->id]) ?>" data-id = "<?= $verh->id?>"
                          class="btn-iz add-to-cartkommer"><img class="animate1" src="/images/iz.png" alt=""></span></a></p>

                              <div class="btn-podrob">
									 <ul class="nav navbar-nav collapse navbar-collapse">        
						 <li class="dropdown"><img class="animate1" src="/images/podrobno5.png" alt="">		    			 
							     <ul role="menu" class="sub-menu1">
							
                        <li> КРАТКОЕ ОПИСАНИЕ:<hr> <?= mb_substr($verh->opisanie, 0, 100);  ?><br>
									  <a href="<?= Url::to(['nedvigkommercheska/'.$verh->id,'ads' =>$zem1.'_kommerch_nedvigimost_'.$verh->plochad.'m.kv._price_'.$verh->price]) ?>" class="btn btn-default1">подробнее</a>
						</li>
							
							     </ul>
							     </li>				
								</ul>
								      </div>

                             <div id="brands_products2">
									  <div class="btn-podrob">
									<small class="podrob"><img class="animate1" src="/images/podrobno5.png" alt="">
									<span>КРАТКОЕ ОПИСАНИЕ:<hr><?= mb_substr($verh->opisanie, 0, 150);  ?><br>
									 <a href="<?= Url::to(['nedvigkommercheska/'.$verh->id,'ads' =>$zem1.'_kommerch_nedvigimost_'.$verh->plochad.'m.kv._price_'.$verh->price]) ?>" class="btn btn-default1">подробнее</a>
									 <a href="tel:<?= $verh -> telephone ?>" target="_blank" class="btn btn-default1"> позвонить</a>
									  
									</span></small>
									 </div>
									</div> 									  

								</div>
								
							</div>
						</center>
                                                </div>
												
                                               <?php $i++ ?>
                                                <?php if ($i % 4 == 0):?>
                                                     <div class="clearfix"></div>
                                                
                                                <?php endif; ?>
											    <?php } ?>
												
                                                <?php endforeach; ?>
											 <?php endif; ?>
												<!----КОНЕЦ НАВЕРХУ---->
												
                                                <?php if (!empty($nedvigkommercheska)): ?>
                                                <?php foreach ($nedvigkommercheska as $nedvigkommercheska): ?>
												
												 <?php $zem = $nedvigkommercheska->type_nedvigimosty;
											   
											   if ($zem === "Офисное"){
												   $zem = "ofisnaya";
											   }elseif($zem === "Производственное"){
												   $zem = "proizvodsvennoe";
											   }elseif($zem === "Торговое"){
												   $zem = "torgovoe";
											   }elseif($zem === "Гостиничное"){
												   $zem = "gostinichnie";
											   }elseif($zem === "Складское"){
												   $zem = "sklad";
											   }elseif($zem == "Гаражного типа"){
												   $zem = "garagnogo_tipa";
											   }?>
												
												<?php if ($nedvigkommercheska->moder == 1) { ?>
										<?php
								$oblast1 = Oblast::find()->select('oblast_region')
								->where(['id' => $nedvigkommercheska->oblast])
								->one();
								   foreach($oblast1 as $item) {
											$nedvigkommercheska->oblast = $item;} 		
										
										
								if ($nedvigkommercheska->gorod ==0){ 
								   }										
								   else {$gorod1 = Goroda::find()->select('name')
								->where(['id' => $nedvigkommercheska->gorod])
								->one();
								   foreach($gorod1 as $item) {
								   $nedvigkommercheska->gorod = $item;}};      
									
										?>									
						<div class="col-sm-3">
						<center>
							<?php if(!empty($nedvigkommercheska->videl)){ ?> 
						<div class="product-image-wrapper5">
						<?php } else { ?> 
							<div class="product-image-wrapper3">
						<?php } ?>
						<div itemscope itemtype="http://schema.org/Product">
								<div class="single-products1">
									<div class="productinfo text-center">
                                                                            
                                                                            <?php $model = nedvigkommercheska::findOne($nedvigkommercheska->id);?>
                                                                            
                                                                             <?php $imageTitle = $model->getImage();?>
                                                                          
                                                                        
                                                                      <?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
																			 
													 
         <a href="<?= Url::to(['nedvigkommercheska/'.$nedvigkommercheska->id,'ads' =>$zem.'_kommerch_nedvigimost_'.$nedvigkommercheska->plochad.'m.kv._price_'.$nedvigkommercheska->price]) ?>">
												 <li><?=Html::img($imageTitle->getUrl(''), ['alt' => 'Купить коммерческую недвижимость: 🏭 '. $nedvigkommercheska-> type_nedvigimosty. ', цена '. $price.' руб., ' .$nedvigkommercheska->oblast.' '.$nedvigkommercheska->gorod]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
	     <a href="<?= Url::to(['nedvigkommercheska/'.$nedvigkommercheska->id,'ads' =>$zem.'_kommerch_nedvigimost_'.$nedvigkommercheska->plochad.'m.kv._price_'.$nedvigkommercheska->price]) ?>">
												 <li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => 'Купить коммерческую недвижимость: 🏭 '. $nedvigkommercheska-> type_nedvigimosty. ', цена '. $price.' руб., ' .$nedvigkommercheska->oblast.' '.$nedvigkommercheska->gorod]) ?></li></a>
												 
												                             <?php } ?>
                                                              
										
						              <p> Город: <?= $nedvigkommercheska->gorod ?></p>
                                                            
                                                              
                                                                                 <h5><?= $nedvigkommercheska -> operaciya ?></h5>
        <h2 itemprop="name" style="font-size: 15px; margin-top: 10px;"><b>Тип:</b> <a href ="<?= Url::to(['nedvigkommercheska/'.$nedvigkommercheska->id,'ads' =>$zem.'_kommerch_nedvigimost_'.$nedvigkommercheska->plochad.'m.kv._price_'.$nedvigkommercheska->price])  ?>">
																	  <?=$nedvigkommercheska->type_nedvigimosty?> </a></h2>
																	  
														<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">			  
                                                           <h5 itemprop="price"><b>Цена:</b> <?= $formatted_number = number_format($nedvigkommercheska->price, 0, ',', ' '); ?><b> руб.</b></h5>
                                                         <meta itemprop="priceCurrency" content="RUB">    
														</div> 
               
<!--								<a href="#" data-id = "<?= $product->id ?>" class="btn btn-default add-to-cart"><img class="animate1" src="/images/iz.png" alt=""></span>Add to cart</a>-->
									</div>

                                                    <?php if ($nedvigkommercheska->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>

                                                    
                                                                    
                                                    <?php if ($nedvigkommercheska->sale):?>
                                                                    <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'sale' ]) ?>
                                                                    <?php endif ?>
																	
													 <p><a href ="<?= Url::to (['cart/addkommer', 'id'=> $nedvigkommercheska->id]) ?>" data-id = "<?= $nedvigkommercheska->id?>"
                          class="btn-iz add-to-cartkommer"><img class="animate1" src="/images/iz.png" alt=""></span></a></p>

                            <div class="btn-podrob">
									 <ul class="nav navbar-nav collapse navbar-collapse">        
						 <li class="dropdown"><img class="animate1" src="/images/podrobno5.png" alt="">		    			 
							     <ul role="menu" class="sub-menu1">
							
                        <li itemprop="description">КРАТКОЕ ОПИСАНИЕ:<hr> <?= mb_substr($nedvigkommercheska->opisanie, 0, 100);  ?><br>
									  <a href="<?= Url::to(['nedvigkommercheska/'.$nedvigkommercheska->id,'ads' =>$zem.'_kommerch_nedvigimost_'.$nedvigkommercheska->plochad.'m.kv._price_'.$nedvigkommercheska->price]) ?>" class="btn btn-default1">подробнее</a>
						</li>
							
							     </ul>
							     </li>				
								</ul>
								      </div>

                           <div id="brands_products2">
									  <div class="btn-podrob">
									<small class="podrob"><img class="animate1" src="/images/podrobno5.png" alt="">
									<span>КРАТКОЕ ОПИСАНИЕ:<hr><?= mb_substr($nedvigkommercheska->opisanie, 0, 150);  ?><br>
									 <a href="<?= Url::to(['nedvigkommercheska/'.$nedvigkommercheska->id,'ads' =>$zem.'_kommerch_nedvigimost_'.$nedvigkommercheska->plochad.'m.kv._price_'.$nedvigkommercheska->price]) ?>" class="btn btn-default1">подробнее</a>
									 <a href="tel:<?= $nedvigkommercheska -> telephone ?>" target="_blank" class="btn btn-default1"> позвонить</a>
									  
									</span></small>
									 </div>
									</div> 									  

								</div>
								</div>
							</div>
							</center>
						</div>
                                                <?php $i++ ?>
                                                <?php if ($i % 4 == 0):?>
                                                     <div class="clearfix"></div>
                                                
                                                <?php endif; ?>
												<?php } ?>
                                                <?php endforeach; ?>
                                                <div class="clearfix"></div>
                                                <center><?php 
                                                echo LinkPager::widget([
                                                'pagination' => $pages,
                                                   ]);
                                                 ?>  </center>
												 
                             <?php $page=$_GET[page];?>
                        	<center><h2><span style="font-size: 16px">
					Купить, продать, арендовать офис, торговое помещение, склад, магазин в Краснодаре, Краснодарском крае и юге России.
					<?php if($page){echo страница .' '."$page";}?>
							<div id="some_text" style="display: none;">
					В этом разделе доски объявлений собраны все объявления по продажу, покупке, аренды коммерческой недвижимости в Краснодаре, Краснодарском крае и юге России.
Если Вы хотите купить коммерческую недвижимость например в Краснодаре, мы рекомендуем Вам воспользоваться Расширенным поиском на доске объявлений и найдется все.
Изначально объявления в разделе размещены по дате убывания. Коммерческая недвижимость, офисы, склады, заводы, магазины, производственные помещения всех городов и районов Краснодарского края и города Краснодар.
Знак увеличительное стекло в углу каждого объявления позволяет предварительно посмотреть краткое описание объявления, если понравиться нажмите подробнее и откроется карточка объявления.
Также Вы можете добавить любое объявление в избранное, знак звездочка.		
							  </div></h2>
                <a id="link">Показать полностью</a></center>
												 
						<?php else:?>
                                                
                                               <table >
											  
                                                <center><h4>Здесь пока ничего нет. У Вас есть шанс быть первым <br><a href= "<?= Url::to (['/admin']) ?>" <i class="fa fa-plus-square"></i> Подать объявление в разделе</a>.</h4></center>
                             </table> 
                                                
						<?php endif; ?>
                                                <?php endif; ?>
                                                <div class="clearfix"></div>
                                                
                                                
                                                <!--/////////////////////////Земельные Участки///////////////////////////////-->
                                                
                                                <?php if($id == 5||$id == 14||$id == 15||$id == 16||$id == 17||$id == 18): ?>
												
												<h1 style = "font-size: 16px; 
						             margin-top: 1px; 
									 color: #397F8C; 
									 text-transform: uppercase; 
									 font-weight: 700;
									 font-family: 'Roboto', sans-serif;" class="title text-center">
									  <?php if($id == 5||$id == 14 ) { ?>
									   <div id="brands_products1">Земельные участки в Краснодаре и Краснодарском крае</div>
									  <div id="brands_products2">Купить участок
						<a href ="<?= Url::to (['cart/zemli']) ?>" class= "showSearchzemli">
										  <span class="letter"><img src="/images/nastroika.png" alt="поиск"></span></a></div></h2>
									  <?php } else { ?>
									  <div id="brands_products1">Купить участок <?= $nedvigcategory->name ?> в Краснодаре и Краснодарском крае</div>
									  <div id="brands_products2">Купить участок <?= $nedvigcategory->name ?>
						<a href ="<?= Url::to (['cart/zemli']) ?>" class= "showSearchzemli">
										  <span class="letter"><img src="/images/nastroika.png" alt="поиск"></span></a></div></h1>
									  <?php } ?>		
												  <!--------НАВЕРХУ-------->
												
												<?php $date = date("Y-m-d H:i:s");		
											
							$verhs = Nedvigzemli::find()->where(['verh' => 1])->andWhere(['>=','verhdate',$date])->orderBy('RAND()')->all();
												if (!empty($verhs)):
												
											 foreach ($verhs as $verh):?>
												
								<?php if ($verh->moder == 1&&$verh -> verh == 1) { ?>
												<?php
												
												if ($verh->gorod ==0){         
											  
											   }										
											   else {$gorod1 = Goroda::find()->select('name')
											->where(['id' => $verh->gorod])
											->one();
											   foreach($gorod1 as $item) {
											   $verh->gorod = $item;}};      
												
											   if ($verh->raion ==0){         
											  
											   }
											   else {$raion1 = Raion::find()->select('raion')
											->where(['id' => $verh->raion])
											->one();
											   foreach($raion1 as $item) {
											   $verh->raion = $item;}};
												
                                            $zem2 = $verh -> typ_uchastka;
											   
											   if ($zem2 === "ИЖС"){
												   $zem2 = "igs";
											   }elseif($zem2 === "Промназначения"){
												   $zem2 = "promn";
											   }elseif($zem2 === "Сельхозназначения"){
												   $zem2 = "selhoz";
											   }elseif($zem2 === "Гостиничное"){
												   $zem2 = "gostinichnie";
											   }elseif($zem2 === "Дачный/СНТ"){
												   $zem2 = "dachni_snt";
											   }
												
											?>
												
						<div class="col-sm-3">
						<center>
							<?php if(!empty($verh->videl)){ ?> 
						<div class="product-image-wrapper5">
						<?php } else { ?> 
							<div class="product-image-wrapper4">
						<?php } ?>
								<div class="single-products2">
									<center><div class="productinfo text-center">
                                                                           
                                                                <?php $model = Nedvigzemli::findOne($verh->id);?>
                                                                            
                                                                             <?php $imageTitle = $model->getImage();?>
                                                                          
                                                                        
                                                                     <?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
																			 
													 
   <a href="<?= Url::to(['nedvigzemli/'.$verh->id,'ads' =>'uchastok_'.$zem2.'_plochad_'.$verh->plochad_uchastka.'sot._price_'.$verh->price]) ?>">
												  <li><?=Html::img($imageTitle->getUrl(''), ['alt' => $verh -> typ_uchastka]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
	<a href="<?= Url::to(['nedvigzemli/'.$verh->id,'ads' =>'uchastok_'.$zem2.'_plochad_'.$verh->plochad_uchastka.'sot._price_'.$verh->price]) ?>">
												  <li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => $verh -> typ_uchastka]) ?></li></a>
												 
												                             <?php } ?>
                                                                     
							
					                                    <p>р-он: <?= $verh-> raion?></p>
                                                                             
                                                                                <p> <b>Площадь:</b> <?=$verh->plochad_uchastka?><b> сот.</b></p>
                                                          <h5><b>Тип:</b> <a href ="<?= Url::to(['nedvigzemli/'.$verh->id,'ads' =>'uchastok_'.$zem2.'_plochad_'.$verh->plochad_uchastka.'sot._price_'.$verh->price])  ?>">
														  <?= $verh -> typ_uchastka ?></a></h5>
                                                         <h5><b>Цена: </b><?= $formatted_number = number_format($verh->price, 0, ',', ' '); ?><b> руб.</b></h5>
                                                                                
                     
<!--								<a href="#" data-id = "<?= $product->id ?>" class="btn btn-default add-to-cart"><img class="animate1" src="/images/iz.png" alt=""></span>Add to cart</a>-->
									</div>

                                                    <?php if ($verh->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>

                                                    
                                                                    
                                                    <?php if ($verh->sale):?>
                                                                    <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'sale' ]) ?>
                                                                    <?php endif ?>
																	
													<p><a href ="<?= Url::to (['cart/addzemli', 'id'=> $verh->id]) ?>" data-id = "<?= $verh->id?>"
                          class="btn-iz add-to-cartzemli"><img class="animate1" src="/images/iz.png" alt=""></span></a></p>	

                             <div class="btn-podrob">
									 <ul class="nav navbar-nav collapse navbar-collapse">        
						 <li class="dropdown"><img class="animate1" src="/images/podrobno5.png" alt="">		    			 
							     <ul role="menu" class="sub-menu1">
							
                        <li>КРАТКОЕ ОПИСАНИЕ:<hr> <?= mb_substr($verh->opisanie, 0, 100);  ?><br>
									  <a href="<?= Url::to(['nedvigzemli/'.$verh->id,'ads' =>'uchastok_'.$zem2.'_plochad_'.$verh->plochad_uchastka.'sot._price_'.$verh->price]) ?>" class="btn btn-default1">подробнее о участке</a>
						</li>
							
							     </ul>
							     </li>				
								</ul>
								      </div>

                          <div id="brands_products2">
									  <div class="btn-podrob">
									<small class="podrob"><img class="animate1" src="/images/podrobno5.png" alt="">
									<span>КРАТКОЕ ОПИСАНИЕ:<hr><?= mb_substr($verh->opisanie, 0, 150);  ?><br>
									 <a href="<?= Url::to(['nedvigzemli/'.$verh->id,'ads' =>'uchastok_'.$zem2.'_plochad_'.$verh->plochad_uchastka.'sot._price_'.$verh->price]) ?>" class="btn btn-default1">подробнее о участке</a>
									 <a href="tel:<?= $verh -> telephone ?>" target="_blank" class="btn btn-default1"> позвонить</a>
									  
									</span></small>
									 </div>
									</div> 									  

								</div>
								
							</div>
						</center>
                                                </div>
												
                                               <?php $i++ ?>
                                                <?php if ($i % 4 == 0):?>
                                                     <div class="clearfix"></div>
                                                
                                                <?php endif; ?>
											    <?php } ?>
												
                                                <?php endforeach; ?>
											 <?php endif; ?>
												<!----КОНЕЦ НАВЕРХУ---->
												
                                                <?php if (!empty($nedvigzemli)): ?>
                                                <?php foreach ($nedvigzemli as $nedvigzemli): ?>
												<?php if ($nedvigzemli->moder == 1) { ?>
												<?php
												
												 $oblast1 = Oblast::find()->select('oblast_region')
												->where(['id' => $nedvigzemli->oblast])
												->one();
												   foreach($oblast1 as $item) {
															$nedvigzemli->oblast = $item;} 
												
												if ($nedvigzemli->gorod ==0){         
											  
											   }										
											   else {$gorod1 = Goroda::find()->select('name')
											->where(['id' => $nedvigzemli->gorod])
											->one();
											   foreach($gorod1 as $item) {
											   $nedvigzemli->gorod = $item;}}; 

												if ($nedvigzemli->raion ==0){         
											  
											   }
											   else {$raion1 = Raion::find()->select('raion')
											->where(['id' => $nedvigzemli->raion])
											->one();
											   foreach($raion1 as $item) {
											   $nedvigzemli->raion = $item;}};	   


                                              $zem3 = $nedvigzemli -> typ_uchastka;
											   
											   if ($zem3 === "ИЖС"){
												   $zem3 = "igs";
											   }elseif($zem3 === "Промназначения"){
												   $zem3 = "promn";
											   }elseif($zem3 === "Сельхозназначения"){
												   $zem3 = "selhoz";
											   }elseif($zem3 === "Гостиничное"){
												   $zem3 = "gostinichnie";
											   }elseif($zem3 === "Дачный/СНТ"){
												   $zem3 = "dachni_snt";
											   }
											?>
												
						<div class="col-sm-3">
						<center>
							<?php if(!empty($nedvigzemli->videl)){ ?> 
						<div class="product-image-wrapper5">
						<?php } else { ?> 
							<div class="product-image-wrapper3">
						<?php } ?>
						<div itemscope itemtype="http://schema.org/Product">
								<div class="single-products1">
									<div class="productinfo text-center">
                                                                            
                                                                            <?php $model = Nedvigzemli::findOne($nedvigzemli->id);?>
                                                                            
                                                                             <?php $imageTitle = $model->getImage();?>
                                                                          
                                                                        
                                                                     <?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
																			 
													 
   <a href="<?= Url::to(['nedvigzemli/'.$nedvigzemli->id,'ads' =>'uchastok_'.$zem3.'_plochad_'.$nedvigzemli->plochad_uchastka.'sot._price_'.$nedvigzemli->price]) ?>">
												  <li><?=Html::img($imageTitle->getUrl(''), ['alt' => 'Купить участок 🏝 '. $nedvigzemli->typ_uchastka. ', ' .$nedvigzemli ->plochad_uchastka. ' сот. '.$nedvigzemli->price.' руб, '.$nedvigzemli->oblast.' '.$nedvigzemli->gorod]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
    <a href="<?= Url::to(['nedvigzemli/'.$nedvigzemli->id,'ads' =>'uchastok_'.$zem3.'_plochad_'.$nedvigzemli->plochad_uchastka.'sot._price_'.$nedvigzemli->price]) ?>">
												  <li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => 'Купить участок 🏝 '. $nedvigzemli->typ_uchastka. ', ' .$nedvigzemli ->plochad_uchastka. ' сот. '.$nedvigzemli->price.' руб, '.$nedvigzemli->oblast.' '.$nedvigzemli->gorod]) ?></li></a>
												 
												                             <?php } ?>
                                          <h2 itemprop="name" style="font-size: 15px; margin-top: 10px;"> <a style="color:#034176" href ="<?= Url::to(['nedvigzemli/'.$nedvigzemli->id,'ads' =>'uchastok_'.$zem3.'_plochad_'.$nedvigzemli->plochad_uchastka.'sot._price_'.$nedvigzemli->price])  ?>">
														  <b>участок </b> <?= $nedvigzemli -> typ_uchastka ?><br> город: <?= $nedvigzemli-> gorod ?> </a>  </h2>                             
							
										<p>р-он: <?= $nedvigzemli-> raion?></p>
                                                                             
                                                                <p> <b>Площадь:</b> <?=$nedvigzemli->plochad_uchastka?><b> сот.</b></p>
                                                                             
																				
													<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">							
                                                         <h5 itemprop="price"><b>Цена: </b><?= $formatted_number = number_format($nedvigzemli->price, 0, ',', ' '); ?><b> руб.</b></h5>
                                                     <meta itemprop="priceCurrency" content="RUB">    
													 </div>
													 
                     
<!--								<a href="#" data-id = "<?= $product->id ?>" class="btn btn-default add-to-cart"><img class="animate1" src="/images/iz.png" alt=""></span>Add to cart</a>-->
									</div>

                                                    <?php if ($nedvigzemli->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>

                                                    
                                                                    
                                                    <?php if ($nedvigzemli->sale):?>
                                                                    <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'sale' ]) ?>
                                                                    <?php endif ?>
																	
													<p><a href ="<?= Url::to (['cart/addzemli', 'id'=> $nedvigzemli->id]) ?>" data-id = "<?= $nedvigzemli->id?>"
                          class="btn-iz add-to-cartzemli"><img class="animate1" src="/images/iz.png" alt=""></span></a></p>	

                               <div class="btn-podrob">
									 <ul class="nav navbar-nav collapse navbar-collapse">        
						 <li class="dropdown"><img class="animate1" src="/images/podrobno5.png" alt="">		    			 
							     <ul role="menu" class="sub-menu1">
							
                        <li itemprop="description"> КРАТКОЕ ОПИСАНИЕ:<hr><?= mb_substr($nedvigzemli->opisanie, 0, 100);  ?><br>
									  <a href="<?= Url::to(['nedvigzemli/'.$nedvigzemli->id,'ads' =>'uchastok_'.$zem3.'_plochad_'.$nedvigzemli->plochad_uchastka.'sot._price_'.$nedvigzemli->price]) ?>" class="btn btn-default1">подробнее о участке</a>
						</li>
							
							     </ul>
							     </li>				
								</ul>
								      </div>

                          <div id="brands_products2">
									  <div class="btn-podrob">
									<small class="podrob"><img class="animate1" src="/images/podrobno5.png" alt="">
									<span>КРАТКОЕ ОПИСАНИЕ:<hr><?= mb_substr($nedvigzemli->opisanie, 0, 150);  ?><br>
									 <a href="<?= Url::to(['nedvigzemli/'.$nedvigzemli->id,'ads' =>'uchastok_'.$zem3.'_plochad_'.$nedvigzemli->plochad_uchastka.'sot._price_'.$nedvigzemli->price]) ?>" class="btn btn-default1">подробнее о участке</a>
									 <a href="tel:<?= $nedvigzemli -> telephone ?>" target="_blank" class="btn btn-default1"> позвонить</a>
									  
									</span></small>
									 </div>
									</div> 									  

								</div>
								</div>
							</div>
							</center>
						</div>
                                                <?php $i++ ?>
                                                <?php if ($i % 4 == 0):?>
                                                     <div class="clearfix"></div>
                                                
                                                <?php endif; ?>
												<?php } ?>
                                                <?php endforeach; ?>
                                                <div class="clearfix"></div>
                                               <center> <?php 
                                                echo LinkPager::widget([
                                                'pagination' => $pages,
                                                   ]);
                                                 ?> </center>   
 
                          <?php $page=$_GET[page];
						        $nam=$nedvigcategory->name; 
						  ?>
                       <center><h2><span style="font-size: 16px">
					   Вы хотите купить или продать земельный участок <?php if ($nam == 'Все участки'){}else{echo "$nam"; }?> в Краснодаре, Краснодарском крае и юге России ?
                 		<?php if($page){echo страница .' '."$page";}?>
					    <div id="some_text" style="display: none;">
						В этом разделе доски объявлений собраны все объявления по продажу и покупке земельных участков любого назначения (ИЖС, сельхоз, промназначения или СТН/Дачные ) в Краснодаре, Краснодарском крае и юге России.
Если Вы хотите купить земельные участки например в Краснодаре, мы рекомендуем Вам воспользоваться Расширенным поиском на доске объявлений и найдется все. Выберите в поиске назначение участка в выпадающем списке: участок ИЖС, участок селхозназначения, участок промназначения или участок СТН/Дачный.
Изначально объявления в разделе размещены по дате убывания. Земельные участки всех городов и районов Краснодарского края и города Краснодар.
Знак увеличительное стекло в углу каждого объявления позволяет предварительно посмотреть краткое описание объявления, если понравиться нажмите подробнее и откроется карточка объявления.
Также Вы можете добавить любое объявление в избранное, знак звездочка.

						  </div></h2>
                <a id="link">Показать полностью</a></center>
												 
						<?php else:?>
                                                
                                               <table >
                                                <center><h4>Здесь пока ничего нет. У Вас есть шанс быть первым <br><a href= "<?= Url::to (['/admin']) ?>" <i class="fa fa-plus-square"></i> Подать объявление в разделе</a>.</h4></center>
                             </table> 
                                                
						<?php endif; ?>
                                                <?php endif; ?>
                                                <div class="clearfix"></div>
                                                
                                                <!--//////////////////////////ГАРАЖИ///////////////////////////-->
                                                
                                                <?php if($id == 6): ?>
												
												<h1 style = "font-size: 16px; 
						             margin-top: 1px; 
									 color: #397F8C; 
									 text-transform: uppercase; 
									 font-weight: 700;
									 font-family: 'Roboto', sans-serif;" class="title text-center">
									  <div id="brands_products1">Купить, Арендовать гараж в Краснодаре и Краснодарском крае</div>
									  <div id="brands_products2">Купить, Арендовать гараж
						<a href ="<?= Url::to (['cart/garagi']) ?>" class= "showSearchgaragi">
										  <span class="letter"><img src="/images/nastroika.png" alt="поиск"></span></a></h1>
												
                                                <?php if (!empty($nedviggaragi)): ?>
                                                <?php foreach ($nedviggaragi as $nedviggaragi): ?>
												<?php if ($nedviggaragi->moder == 1) { ?>
					<?php
												
						if ($nedviggaragi->gorod ==0){         
					  
					   }										
					   else {$gorod1 = Goroda::find()->select('name')
					->where(['id' => $nedviggaragi->gorod])
					->one();
					   foreach($gorod1 as $item) {
					   $nedviggaragi->gorod = $item;}}; 
									
					?>
												
						<div class="col-sm-3">
						<center>
							<?php if(!empty($nedviggaragi->videl)){ ?> 
						<div class="product-image-wrapper5">
						<?php } else { ?> 
							<div class="product-image-wrapper3">
						<?php } ?>
						<div itemscope itemtype="http://schema.org/Product">
								<div class="single-products1">
									<div class="productinfo text-center">
                                                                            
                                                                            <?php $model = Nedviggaragi::findOne($nedviggaragi->id);?>
                                                                            
                                                                             <?php $imageTitle = $model->getImage();?>
                                                                          
                                                                        
                                                                     <?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
																			 
													 
                      <a href="<?= Url::to(['nedviggaragi/'.$nedviggaragi->id,'ads' =>'garag_plochad_'.$nedviggaragi->plochad.'m.kv._price_'.$nedviggaragi->price]) ?>">
												  <li><?=Html::img($imageTitle->getUrl(''), ['alt' => 'гараж_площадь'.$nedviggaragi->plochad.'m.kv._price_'.$nedviggaragi->price.' '.$nedviggaragi->gorod]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												  <a href="<?= Url::to(['nedviggaragi/'.$nedviggaragi->id,'ads' =>'garag_plochad_'.$nedviggaragi->plochad.'m.kv._price_'.$nedviggaragi->price]) ?>">
												  <li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => 'гараж_площадь'.$nedviggaragi->plochad.'m.kv._price_'.$nedviggaragi->price.' '.$nedviggaragi->gorod]) ?></li></a>
												 
												                             <?php } ?>
                                                                     
							
										
										<p><a href ="<?= Url::to(['nedviggaragi/'.$nedviggaragi->id,'ads' =>'garag_plochad_'.$nedviggaragi->plochad.'m.kv._price_'.$nedviggaragi->price])  ?>"><?= $nedviggaragi->gorod ?> </a></p>
                                                                                 <h5 itemprop="name"><b>Площадь:</b> <?= $nedviggaragi -> plochad ?> <b>м.кв.</b></h5>
                                                                                <p><b>Материал:</b> <?=$nedviggaragi->type_materiala?></p>
																				
													<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">							
                                                        <h5 itemprop="price"><b>Цена:</b> <?= $formatted_number = number_format($nedviggaragi->price, 0, ',', ' '); ?><b> руб.</b></h5>
                                                     <meta itemprop="priceCurrency" content="RUB">   
													</div>                            
                            
<!--								<a href="#" data-id = "<?= $product->id ?>" class="btn btn-default add-to-cart"><img class="animate1" src="/images/iz.png" alt=""></span>Add to cart</a>-->
									</div>

                                                    <?php if ($nedviggaragi->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>

                                                    
                                                                    
                                                    <?php if ($nedviggaragi->sale):?>
                                                                    <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'sale' ]) ?>
                                                                    <?php endif ?>
																	
													<p><a href ="<?= Url::to (['cart/addgaragi', 'id'=> $nedviggaragi->id]) ?>" data-id = "<?= $nedviggaragi->id?>"
                          class="btn-iz add-to-cartgaragi"><img class="animate1" src="/images/iz.png" alt=""></span></a></p>

                              <div class="btn-podrob">
									 <ul class="nav navbar-nav collapse navbar-collapse">        
						 <li class="dropdown"><img class="animate1" src="/images/podrobno5.png" alt="">		    			 
							     <ul role="menu" class="sub-menu1">
							
                        <li itemprop="description"> КРАТКОЕ ОПИСАНИЕ:<hr><?= mb_substr($nedviggaragi->opisanie, 0, 100);  ?><br>
									  <a href="<?= Url::to(['nedviggaragi/'.$nedviggaragi->id,'ads' =>'garag_plochad_'.$nedviggaragi->plochad.'m.kv._price_'.$nedviggaragi->price]) ?>" class="btn btn-default1">подробнее о гараже</a>
						</li>
							
							     </ul>
							     </li>				
								</ul>
								      </div>

                          <div id="brands_products2">
									  <div class="btn-podrob">
									<small class="podrob"><img class="animate1" src="/images/podrobno5.png" alt="">
									<span>КРАТКОЕ ОПИСАНИЕ:<hr><?= mb_substr($nedviggaragi->opisanie, 0, 150);  ?><br>
									 <a href="<?= Url::to(['nedviggaragi/'.$nedviggaragi->id,'ads' =>'garag_plochad_'.$nedviggaragi->plochad.'m.kv._price_'.$nedviggaragi->price]) ?>" class="btn btn-default1">подробнее о гараже</a>
									 <a href="tel:<?= $nedviggaragi -> telephone ?>" target="_blank" class="btn btn-default1"> позвонить</a>
									  
									</span></small>
									 </div>
									</div> 
									  

								</div>
								</div>
							</div>
							</center>
						</div>
                                                <?php $i++ ?>
                                                <?php if ($i % 4 == 0):?>
                                                     <div class="clearfix"></div>
                                                
                                                <?php endif; ?>
												<?php } ?>
                                                <?php endforeach; ?>
                                                <div class="clearfix"></div>
                                               <center> <?php 
                                                echo LinkPager::widget([
                                                'pagination' => $pages,
                                                   ]);
                                                 ?> </center>                                       
						<?php else:?>
                                                
							   <table>
								<center><h4>Здесь пока ничего нет. У Вас есть шанс быть первым <br><a href= "<?= Url::to (['/admin']) ?>" <i class="fa fa-plus-square"></i> Подать объявление в разделе</a>.</h4></center>
			                   </table> 
                                                
						<?php endif; ?>
                                                <?php endif; ?>
                                                <div class="clearfix"></div>
                                                
                                                
                                                <!---------------ГОТОВЫЙ БИЗНЕС-------------------->
                                                
												 <?php if($id == 7): ?>
												 
						<h1 style = "font-size: 16px; 
						             margin-top: 1px; 
									 color: #397F8C; 
									 text-transform: uppercase; 
									 font-weight: 700;
									 font-family: 'Roboto', sans-serif;"  class="title text-center">
									  <div id="brands_products1">Продажа, Аренда бизнеса в Краснодаре и Краснодарском крае</div>
									  <div id="brands_products2">Продажа, Аренда бизнеса
						<a href ="<?= Url::to (['cart/biznes']) ?>" class= "showSearchbiznes">
										  <span class="letter"><img src="/images/nastroika.png" alt="поиск"></span></a></h1>
												 
												 <!--------НАВЕРХУ-------->
												
												<?php $date = date("Y-m-d H:i:s");		
											
							$verhs = Nedvigbiznes::find()->where(['verh' => 1])->andWhere(['>=','verhdate',$date])->orderBy('RAND()')->all();
												if (!empty($verhs)):
												
											 foreach ($verhs as $verh):?>
												
								<?php if ($verh->moder == 1&&$verh -> verh == 1) { ?>
												<?php
																						
												if ($verh->gorod ==0){         
											  
											   }										
											   else {$gorod1 = Goroda::find()->select('name')
											->where(['id' => $verh->gorod])
											->one();
											   foreach($gorod1 as $item) {
											   $verh->gorod = $item;}};      
												
											   if ($verh->raion ==0){         
											  
											   }
											   else {$raion1 = Raion::find()->select('raion')
											->where(['id' => $verh->raion])
											->one();
											   foreach($raion1 as $item) {
											   $verh->raion = $item;}};
															  
											?>
												
						<div class="col-sm-3">
						<center>
							<?php if(!empty($verh->videl)){ ?> 
						<div class="product-image-wrapper5">
						<?php } else { ?> 
							<div class="product-image-wrapper4">
						<?php } ?>
								<div class="single-products2">
									<center><div class="productinfo text-center">
                                                                           
                                                                  <?php $model = Nedvigbiznes::findOne($verh->id);?>
                                                                            
                                                                             <?php $imageTitle = $model->getImage();?>
                                                                          
                                                                        
                                                                     <?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
																			 
													 
              <a href="<?= Url::to(['nedvigbiznes/'.$verh->id,'ads' =>'biznes_price_'.$verh->price]) ?>">
												<li><?=Html::img($imageTitle->getUrl(''), ['alt' => $verh->gorod]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												 <a href="<?= Url::to(['nedvigbiznes/'.$verh->id,'ads' =>'biznes_price_'.$verh->price]) ?>">
												 <li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => $verh->gorod]) ?></li></a>
												 
												                             <?php } ?>
                                                                     
							
										
										<p><a href ="<?= Url::to(['nedvigbiznes/'.$verh->id,'ads' =>'biznes_price_'.$verh->price])  ?>"><?= $verh->gorod ?> </a></p>
                                                                                 <h5> <?= $verh -> operaciya ?></h5>
                                                                                <p><b>Тип:</b> <?=$verh->type?></p>
                                                        <h5><b>Цена: </b><?= $formatted_number = number_format($verh->price, 0, ',', ' '); ?><b> руб.</b></h5>
                                                                                
                      
<!--								<a href="#" data-id = "<?= $product->id ?>" class="btn btn-default add-to-cart"><img class="animate1" src="/images/iz.png" alt=""></span>Add to cart</a>-->
									</div>

                                                    <?php if ($verh->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>

                                                    
                                                                    
                                                    <?php if ($verh->sale):?>
                                                                    <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'sale' ]) ?>
                                                                    <?php endif ?>
																	
													<p><a href ="<?= Url::to (['cart/addbiznes', 'id'=> $verh->id]) ?>" data-id = "<?= $verh->id?>"
                          class="btn-iz add-to-cartbiznes"><img class="animate1" src="/images/iz.png" alt=""></span></a></p>

                            <div class="btn-podrob">
									 <ul class="nav navbar-nav collapse navbar-collapse">        
						 <li class="dropdown"><img class="animate1" src="/images/podrobno5.png" alt="">		    			 
							     <ul role="menu" class="sub-menu1">
							
                        <li> КРАТКОЕ ОПИСАНИЕ:<hr><?= mb_substr($verh->opisanie, 0, 100);  ?><br>
									  <a href="<?= Url::to(['nedvigbiznes/'.$verh->id,'ads' =>'biznes_price_'.$verh->price]) ?>" class="btn btn-default1">подробнее о бизнесе</a>
						
						</li>
							
							     </ul>
							     </li>				
								</ul>
								      </div>

                         <div id="brands_products2">
									  <div class="btn-podrob">
									<small class="podrob"><img class="animate1" src="/images/podrobno5.png" alt="">
									<span>КРАТКОЕ ОПИСАНИЕ:<hr><?= mb_substr($verh->opisanie, 0, 150);  ?><br>
									<a href="<?= Url::to(['nedvigbiznes/'.$verh->id,'ads' =>'biznes_price_'.$verh->price]) ?>" class="btn btn-default1">подробнее о бизнесе</a>
									 <a href="tel:<?= $verh -> telephone ?>" target="_blank" class="btn btn-default1"> позвонить</a>
									   
									</span></small>
									 </div>
									</div> 									  

								</div>
								
							</div>
						</center>
                                                </div>
												
                                               <?php $i++ ?>
                                                <?php if ($i % 4 == 0):?>
                                                     <div class="clearfix"></div>
                                                
                                                <?php endif; ?>
											    <?php } ?>
												
                                                <?php endforeach; ?>
											 <?php endif; ?>
												<!----КОНЕЦ НАВЕРХУ---->
												 
                                                <?php if (!empty($nedvigbiznes)): ?>
                                                <?php foreach ($nedvigbiznes as $nedvigbiznes): ?>
												<?php if ($nedvigbiznes->moder == 1) { ?>
												<?php
																								
														if ($nedvigbiznes->gorod ==0){         
													  
													   }										
													   else {$gorod1 = Goroda::find()->select('name')
													->where(['id' => $nedvigbiznes->gorod])
													->one();
													   foreach($gorod1 as $item) {
													   $nedvigbiznes->gorod = $item;}}; 
															   
													?>
												
						<div class="col-sm-3">
						<center>
							<?php if(!empty($nedvigbiznes->videl)){ ?> 
						<div class="product-image-wrapper5">
						<?php } else { ?> 
							<div class="product-image-wrapper3">
						<?php } ?>
						<div itemscope itemtype="http://schema.org/Product">
								<div class="single-products1">
									<div class="productinfo text-center">
                                                                            
                                                                            <?php $model = Nedvigbiznes::findOne($nedvigbiznes->id);?>
                                                                            
                                                                             <?php $imageTitle = $model->getImage();?>
                                                                          
                                                                        
                                                                     <?php if ($imageTitle['urlAlias']==='placeHolder') { ?>
																			 
													 
                                                <a href="<?= Url::to(['nedvigbiznes/'.$nedvigbiznes->id,'ads' =>'biznes_price_'.$nedvigbiznes->price]) ?>">
												<li><?=Html::img($imageTitle->getUrl(''), ['alt' => 'Продажа_бизнеса г.'.$nedvigbiznes->gorod.' id'.$nedvigbiznes->id,'цена_'.$nedvigbiznes->price]) ?></li></a>
												                  
																			 <?php } else { ?> 
																			 
												 <a href="<?= Url::to(['nedvigbiznes/'.$nedvigbiznes->id,'ads' =>'biznes_price_'.$nedvigbiznes->price]) ?>">
												 <li><?=Html::img($imageTitle->getUrl('x200'), ['alt' => 'Продажа_бизнеса г.'.$nedvigbiznes->gorod.' id'.$nedvigbiznes->id,'цена_'.$nedvigbiznes->price]) ?></li></a>
												 
												                             <?php } ?>
                                                                     
							
										
										<p><a href ="<?= Url::to(['nedvigbiznes/'.$nedvigbiznes->id,'ads' =>'biznes_price_'.$nedvigbiznes->price])  ?>"><?= $nedvigbiznes->gorod ?> </a></p>
                                                                                 <h5> <?= $nedvigbiznes -> operaciya ?></h5>
                                                         <p itemprop="name"><b>Тип:</b> <?=$nedvigbiznes->type?></p>
														 
														<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                                        <h5 itemprop="price"><b>Цена: </b><?= $formatted_number = number_format($nedvigbiznes->price, 0, ',', ' '); ?><b> руб.</b></h5>
                                                          <meta itemprop="priceCurrency" content="RUB">                          
                                                        </div>
<!--								<a href="#" data-id = "<?= $product->id ?>" class="btn btn-default add-to-cart"><img class="animate1" src="/images/iz.png" alt=""></span>Add to cart</a>-->
									</div>

                                                    <?php if ($nedvigbiznes->new):?>
                                                                    <?= Html::img("@web/images/home/new.png", ['alt'=> 'Новинка', 'class' => 'new' ]) ?>
                                                                    <?php endif ?>

                                                    
                                                                    
                                                    <?php if ($nedvigbiznes->sale):?>
                                                                    <?= Html::img("@web/images/home/sale.png", ['alt'=> 'Скидка', 'class' => 'sale' ]) ?>
                                                                    <?php endif ?>
																	
													<p><a href ="<?= Url::to (['cart/addbiznes', 'id'=> $nedvigbiznes->id]) ?>" data-id = "<?= $nedvigbiznes->id?>"
                          class="btn-iz add-to-cartbiznes"><img class="animate1" src="/images/iz.png" alt=""></span></a></p>

                             <div class="btn-podrob">
									 <ul class="nav navbar-nav collapse navbar-collapse">        
						 <li class="dropdown"><img class="animate1" src="/images/podrobno5.png" alt="">		    			 
							     <ul role="menu" class="sub-menu1">
							
                        <li itemprop="description"> КРАТКОЕ ОПИСАНИЕ:<hr><?= mb_substr($nedvigbiznes->opisanie, 0, 100);  ?><br>
									  <a href="<?= Url::to(['nedvigbiznes/'.$nedvigbiznes->id,'ads' =>'biznes_price_'.$nedvigbiznes->price]) ?>" class="btn btn-default1">подробнее о бизнесе</a>
						</li>
							
							     </ul>
							     </li>				
								</ul>
								      </div>

                           <div id="brands_products2">
									  <div class="btn-podrob">
									<small class="podrob"><img class="animate1" src="/images/podrobno5.png" alt="">
									<span>КРАТКОЕ ОПИСАНИЕ:<hr><?= mb_substr($nedvigbiznes->opisanie, 0, 150);  ?><br>
									 <a href="<?= Url::to(['nedvigbiznes/'.$nedvigbiznes->id,'ads' =>'biznes_price_'.$nedvigbiznes->price]) ?>" class="btn btn-default1">подробнее о бизнесе</a>
									 <a href="tel:<?= $nedvigbiznes -> telephone ?>" target="_blank" class="btn btn-default1"> позвонить</a>
									  
									</span></small>
									 </div>
									</div> 									  

								</div>
								</div>
							</div>
							</center>
						</div>
                                                <?php $i++ ?>
                                                <?php if ($i % 4 == 0):?>
                                                     <div class="clearfix"></div>
                                                
                                                <?php endif; ?>
												<?php } ?>
                                                <?php endforeach; ?>
                                                <div class="clearfix"></div>
                                               <center> <?php 
                                                echo LinkPager::widget([
                                                'pagination' => $pages,
                                                   ]);
                                                 ?></center>                                  
						<?php else:?>
                                                
                                               <table >
											   
                                                <center><h4>Здесь пока ничего нет. У Вас есть шанс быть первым </h4>
												<h4><a href= "<?= Url::to (['/admin']) ?>" <i class="fa fa-plus-square"></i> Подать объявление в разделе</a>.</h4></center>
                             </table> 
                                                
						<?php endif; ?>
                                                <?php endif; ?>
                                                <div class="clearfix"></div>
                                                

					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
	
	<script type="text/javascript">
		
	
	$('#link').click(function(){
		if($('#some_text').is(':visible')){
			$('#some_text').slideUp();
			$(this).text('Показать полностью');
		}
		else{
			$('#some_text').slideDown();
			$(this).text('Скрыть текст');
		}
		return false;
	});
</script>

<script>

	$(".slide-one").owlCarousel({
		nav:false,
		loop:true,
		touchDrag:true,
		items:1,
		center:true,
		nav: false,
		dots: false,
		navText : ['назад','вперед'],
		autoWidth: true,
		smartSpeed:300,
		autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
		responsiveClass:true,
		responsive:{ //Адаптация в зависимости от разрешения экрана
            0:{
                items:1,
				nav:false,
            },
            600:{
                items:2,
				nav:false,
            },
            1000:{
                items:1
            }
        }
		
	});
	
		function showSTR1(trueTel) {
document.getElementById('translationTel1').firstChild.replaceData (0 , trueTel.length, trueTel);
}
	</script>

