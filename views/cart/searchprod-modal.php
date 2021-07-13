
<?php
 
 use yii\helpers\Html;
 use yii\helpers\Url;
 use yii\widgets\ActiveForm;
 
 ?>


 <form method="get" action="<?= yii\helpers\Url::to(['category/search' ]) ?>">
                                                     
			 
		<label>Категория</label>
               
<select id="product-category_id" class="form-control" name="Product[category_id]">
   
     <?= \app\components\MenuWidget::widget (['tpl'=> 'select_product', 'model' => $model])?>

</select>
                <br>
                <!--<input type="text" placeholder="мин стоимость" name="p1"/><br><hr>-->
                <input type="text" placeholder="макс стоимость" name="p2"/>
                <hr>
      
                <input type="submit" class="search-go" name="search" value="Поиск">
                        </form>