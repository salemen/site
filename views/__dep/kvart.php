
 

         <style>
		 .table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 5px;
}
        .td {
    max-width: 130px;
} 
     .form-group {
    margin-bottom: 5px;
}
		 </style>
		 
        <form method="get" action="<?= yii\helpers\Url::to(['nedvigkvartiri/search' ]) ?>">
                
				 <table class="table table-hover table-striped">
				 
				<tr>
				<td>
                   <label>Операция11</label>
               
<select id="product-category_id" class="form-control" name="Operaciya[id]">
   
     <?= \app\components\MenuWidgetoperaciya::widget (['tpl'=> 'select_operaciya', 'model' => $model])?>

</select>
</td></tr></table>
          <!------------------------------------->
     
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

  </table>
	
	
           <!------------------------------------->
 <table class="table table-hover table-striped">
			   <tr>
			   <td>
                <label>Вид недвижимости</label>
               
<select id="product-category_id" class="form-control" name="Vidnedvig[id]">
   
     <?= \app\components\MenuWidgetvidnedvig::widget (['tpl'=> 'select_vidnedvig', 'model' => $model])?>

</select>
           </td>
            <td>    
                <label>Количество комнат</label>
               
<select id="product-category_id" class="form-control" name="Komnat[id]">
   
     <?= \app\components\MenuWidgetkomnat::widget (['tpl'=> 'select_komnat', 'model' => $model])?>

</select>
</td>
</tr>

         </table>      
                
                
                <input type="tel" style = "height: 30px" placeholder="мин. площадь цифрами" name="p1"/><hr>
                <input type="tel" style = "height: 30px" placeholder="макс. стоимость цифрами" name="p2"/>
                <hr>
      
                <input type="submit" class="btn btn-warning" name="search" value="ПОИСК"/>
                        
        
        </form>
   
    
		 