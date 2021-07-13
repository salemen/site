
<?php
 
 use yii\helpers\Html;
 use yii\helpers\Url;
 use yii\widgets\ActiveForm;
 use app\models\Izbrannoe;
 use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;
 
 ?>


<div class="table-responsive">

    <table class="table table-hover table-striped">
	
				
        <thead>
            <tr>
                <th>Фото</th>
                 <th>Наименование</th>
                  <th>Цена</th>
                   <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
            </tr>
        </thead>

	
	   <?php $username = Yii::$app->user->identity['username'];?>
	
		<?php if (!Yii::$app->user->isGuest ) {
			
			$izbrannoe = Izbrannoe::find()->where(['login'=>$username])->all();
			
			if (empty($izbrannoe)){
				echo "<center>в избранном ничего нет </center>";
			}
			
			  foreach ($izbrannoe as $id => $item):
			         $link = $item['link'];
					  $id = $item['id'];
			  ?>
			  
			   <tr>		
			  
         <td><?= \yii\helpers\Html::img($item['img'], ['alt' =>$item['name'], 'height'=> 50])?></td>
         <td><a href="<?= Url::to (["$link"],true)?>"><?= $item['name']?></a></td>
        <td><?= $item['price']?></td>
        <td> <span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-itemgruzz"aria-hidden="true" ></span></td>
        </tr>
             <?php  endforeach; 		  
			}else { ?>
		
		
		
	
        <?php if (!empty($session['cart'])): ?>
        <tbody>
            <?php foreach ($session['cart'] as $id => $item):?> 
                   
         <tr>
         <td><?= \yii\helpers\Html::img($item['img'], ['alt' =>$item['name'], 'height'=> 50])?></td>
        <td><a href="<?= Url::to (['product/view','id'=>$id ])?>"><?= $item['name']?></a></td>
        <td><?= $item['price']?></td>
        <td> <span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-item"aria-hidden="true" ></span></td>
        </tr>
              <?php endforeach; ?>
        
<!--        <tr>
        <hr>
        <td><strong> ИТОГО:</strong></td>
            <td colspan="4"><?= $session['cart.qty'] ?> шт.</td>
        </tr>
        <tr>
            <td><strong> НА СУММУ:</strong></td> 
            <td colspan="4"><?= $session['cart.sum'] ?> руб.</td>
        </tr>-->
       
    


<?php endif; ?>

                 <!--\\\\\\\\\\\\ЛЕГКОВЫЕ\\\\\\\\\\\\\-->

<?php if (!empty($session['cartavto'])): ?>
     
 
            <?php foreach ($session['cartavto'] as $id => $itemavto):?> 
                   
         <tr>
         <td><?= \yii\helpers\Html::img($itemavto['img'], ['alt' =>$itemavto['name'], 'height'=> 50])?></td>
         <td><a href="<?= Url::to (['avtoleg/view','id'=>$id ])?>"><?= $itemavto['name']?></a></td>
        <td><?= $itemavto['price']?></td>
        <td> <span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-itemavto"aria-hidden="true" ></span></td>
        </tr>
              <?php endforeach; ?>
        
<!--        <tr>
        <hr>
        <td><strong> ИТОГО:</strong></td>
            <td colspan="4"><?= $session['cart.qty'] ?> шт.</td>
        </tr>
        <tr>
            <td><strong> НА СУММУ:</strong></td> 
            <td colspan="4"><?= $session['cart.sum'] ?> руб.</td>
        </tr>-->
      
    
   <?php endif; ?>
     
	
	      <!------------////////ГРУЗОВЫЕ АВТО/////////------------------>
	
		 
    <?php if (!empty($session['cartgruz'])): ?>
     
 
            <?php foreach ($session['cartgruz'] as $id => $itemgruz):?> 
                   
         <tr>
		
         <td><?= \yii\helpers\Html::img($itemgruz['img'], ['alt' =>$itemgruz['name'], 'height'=> 50])?></td>
         <td><a href="<?= Url::to (['avtogruz/view','id'=>$id ])?>"><?= $itemgruz['name']?></a></td>
        <td><?= $itemgruz['price']?></td>
        <td> <span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-itemgruz"aria-hidden="true" ></span></td>
        </tr>
              <?php endforeach; ?>
           
              <?php endif; ?>


<?php if (!empty($session['cartspec'])): ?>
     
 
            <?php foreach ($session['cartspec'] as $id => $itemspec):?> 
                   
         <tr>
         <td><?= \yii\helpers\Html::img($itemspec['img'], ['alt' =>$itemspec['name'], 'height'=> 50])?></td>
         <td><a href="<?= Url::to (['avtospec/view','id'=>$id ])?>"><?= $itemspec['name']?></a></td>
        <td><?= $itemspec['price']?></td>
        <td> <span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-itemspec"aria-hidden="true" ></span></td>
        </tr>
              <?php endforeach; ?>
        
<!--        <tr>
        <hr>
        <td><strong> ИТОГО:</strong></td>
            <td colspan="4"><?= $session['cart.qty'] ?> шт.</td>
        </tr>
        <tr>
            <td><strong> НА СУММУ:</strong></td> 
            <td colspan="4"><?= $session['cart.sum'] ?> руб.</td>
        </tr>-->
      
     
   <?php endif; ?>

<?php if (!empty($session['cartmoto'])): ?>
     
 
            <?php foreach ($session['cartmoto'] as $id => $itemmoto):?> 
                   
         <tr>
         <td><?= \yii\helpers\Html::img($itemmoto['img'], ['alt' =>$itemmoto['name'], 'height'=> 50])?></td>
         <td><a href="<?= Url::to (['avtomoto/view','id'=>$id ])?>"><?= $itemmoto['name']?></a></td>
        <td><?= $itemmoto['price']?></td>
        <td> <span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-itemmoto"aria-hidden="true" ></span></td>
        </tr>
              <?php endforeach; ?>
        
<!--        <tr>
        <hr>
        <td><strong> ИТОГО:</strong></td>
            <td colspan="4"><?= $session['cart.qty'] ?> шт.</td>
        </tr>
        <tr>
            <td><strong> НА СУММУ:</strong></td> 
            <td colspan="4"><?= $session['cart.sum'] ?> руб.</td>
        </tr>-->
      
     
   <?php endif; ?>
 
 <?php if (!empty($session['cartkompl'])): ?>
     
 
            <?php foreach ($session['cartkompl'] as $id => $itemkompl):?> 
                   
         <tr>
         <td><?= \yii\helpers\Html::img($itemkompl['img'], ['alt' =>$itemkompl['name'], 'height'=> 50])?></td>
         <td><a href="<?= Url::to (['avtokomplekt/view','id'=>$id ])?>"><?= $itemkompl['name']?></a></td>
        <td><?= $itemkompl['price']?></td>
        <td> <span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-itemkompl"aria-hidden="true" ></span></td>
        </tr>
              <?php endforeach; ?>
        
<!--        <tr>
        <hr>
        <td><strong> ИТОГО:</strong></td>
            <td colspan="4"><?= $session['cart.qty'] ?> шт.</td>
        </tr>
        <tr>
            <td><strong> НА СУММУ:</strong></td> 
            <td colspan="4"><?= $session['cart.sum'] ?> руб.</td>
        </tr>-->
      
     
    

   <?php endif; ?>
 
<?php if (!empty($session['cartvoda'])): ?>
     
 
            <?php foreach ($session['cartvoda'] as $id => $itemvoda):?> 
                   
         <tr>
         <td><?= \yii\helpers\Html::img($itemvoda['img'], ['alt' =>$itemvoda['name'], 'height'=> 50])?></td>
         <td><a href="<?= Url::to (['avtovodnik/view','id'=>$id ])?>"><?= $itemvoda['name']?></a></td>
        <td><?= $itemvoda['price']?></td>
        <td> <span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-itemvoda"aria-hidden="true" ></span></td>
        </tr>
              <?php endforeach; ?>
        
<!--        <tr>
        <hr>
        <td><strong> ИТОГО:</strong></td>
            <td colspan="4"><?= $session['cart.qty'] ?> шт.</td>
        </tr>
        <tr>
            <td><strong> НА СУММУ:</strong></td> 
            <td colspan="4"><?= $session['cart.sum'] ?> руб.</td>
        </tr>-->
      
    
   <?php endif; ?>
 
<?php if (!empty($session['cartkvart'])): ?>
     
 
            <?php foreach ($session['cartkvart'] as $id => $itemkvart):?> 
                   
         <tr>
         <td><?= \yii\helpers\Html::img($itemkvart['img'], ['alt' =>$itemkvart['name'], 'height'=> 50])?></td>
         <td><a href="<?= Url::to (['nedvigkvartiri/view','id'=>$id ])?>"><?= $itemkvart['name']?></a></td>
        <td><?= $itemkvart['price']?></td>
        <td> <span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-itemkvart"aria-hidden="true" ></span></td>
        </tr>
              <?php endforeach; ?>
        
<!--        <tr>
        <hr>
        <td><strong> ИТОГО:</strong></td>
            <td colspan="4"><?= $session['cart.qty'] ?> шт.</td>
        </tr>
        <tr>
            <td><strong> НА СУММУ:</strong></td> 
            <td colspan="4"><?= $session['cart.sum'] ?> руб.</td>
        </tr>-->
      
     
   <?php endif; ?>
 <?php if (!empty($session['cartdoma'])): ?>
     
 
            <?php foreach ($session['cartdoma'] as $id => $itemdoma):?> 
                   
         <tr>
         <td><?= \yii\helpers\Html::img($itemdoma['img'], ['alt' =>$itemdoma['name'], 'height'=> 50])?></td>
         <td><a href="<?= Url::to (['nedvigdoma/view','id'=>$id ])?>"><?= $itemdoma['name']?></a></td>
        <td><?= $itemdoma['price']?></td>
        <td> <span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-itemdoma"aria-hidden="true" ></span></td>
        </tr>
              <?php endforeach; ?>
        
<!--        <tr>
        <hr>
        <td><strong> ИТОГО:</strong></td>
            <td colspan="4"><?= $session['cart.qty'] ?> шт.</td>
        </tr>
        <tr>
            <td><strong> НА СУММУ:</strong></td> 
            <td colspan="4"><?= $session['cart.sum'] ?> руб.</td>
        </tr>-->
      
     
   <?php endif; ?>

<?php if (!empty($session['cartkomnati'])): ?>
     
 
            <?php foreach ($session['cartkomnati'] as $id => $itemkomnati):?> 
                   
         <tr>
         <td><?= \yii\helpers\Html::img($itemkomnati['img'], ['alt' =>$itemkomnati['name'], 'height'=> 50])?></td>
         <td><a href="<?= Url::to (['nedvigkomnati/view','id'=>$id ])?>"><?= $itemkomnati['name']?></a></td>
        <td><?= $itemkomnati['price']?></td>
        <td> <span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-itemkomnati"aria-hidden="true" ></span></td>
        </tr>
              <?php endforeach; ?>
        
<!--        <tr>
        <hr>
        <td><strong> ИТОГО:</strong></td>
            <td colspan="4"><?= $session['cart.qty'] ?> шт.</td>
        </tr>
        <tr>
            <td><strong> НА СУММУ:</strong></td> 
            <td colspan="4"><?= $session['cart.sum'] ?> руб.</td>
        </tr>-->
      
     
   <?php endif; ?>
 
 <?php if (!empty($session['cartkommer'])): ?>
     
 
            <?php foreach ($session['cartkommer'] as $id => $itemkommer):?> 
                   
         <tr>
         <td><?= \yii\helpers\Html::img($itemkommer['img'], ['alt' =>$itemkommer['name'], 'height'=> 50])?></td>
         <td><a href="<?= Url::to (['nedvigkommercheska/view','id'=>$id ])?>"><?= $itemkommer['name']?></a></td>
        <td><?= $itemkommer['price']?></td>
        <td> <span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-itemkommer"aria-hidden="true" ></span></td>
        </tr>
              <?php endforeach; ?>
        
<!--        <tr>
        <hr>
        <td><strong> ИТОГО:</strong></td>
            <td colspan="4"><?= $session['cart.qty'] ?> шт.</td>
        </tr>
        <tr>
            <td><strong> НА СУММУ:</strong></td> 
            <td colspan="4"><?= $session['cart.sum'] ?> руб.</td>
        </tr>-->
      
     
   <?php endif; ?>
 
 <?php if (!empty($session['cartzemli'])): ?>
     
 
            <?php foreach ($session['cartzemli'] as $id => $itemzemli):?> 
                   
         <tr>
         <td><?= \yii\helpers\Html::img($itemzemli['img'], ['alt' =>$itemzemli['name'], 'height'=> 50])?></td>
         <td><a href="<?= Url::to (['nedvigzemli/view','id'=>$id ])?>"><?= $itemzemli['name']?></a></td>
        <td><?= $itemzemli['price']?></td>
        <td> <span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-itemzemli"aria-hidden="true" ></span></td>
        </tr>
              <?php endforeach; ?>
        
<!--        <tr>
        <hr>
        <td><strong> ИТОГО:</strong></td>
            <td colspan="4"><?= $session['cart.qty'] ?> шт.</td>
        </tr>
        <tr>
            <td><strong> НА СУММУ:</strong></td> 
            <td colspan="4"><?= $session['cart.sum'] ?> руб.</td>
        </tr>-->
      
     
   <?php endif; ?>
   
   
   <?php if (!empty($session['cartbiznes'])): ?>
     
 
            <?php foreach ($session['cartbiznes'] as $id => $itembiznes):?> 
                   
         <tr>
         <td><?= \yii\helpers\Html::img($itembiznes['img'], ['alt' =>$itembiznes['name'], 'height'=> 50])?></td>
         <td><a href="<?= Url::to (['nedvigbiznes/view','id'=>$id ])?>"><?= $itembiznes['name']?></a></td>
        <td><?= $itembiznes['price']?></td>
        <td> <span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-itembiznes"aria-hidden="true" ></span></td>
        </tr>
              <?php endforeach; ?>
        
<!--        <tr>
        <hr>
        <td><strong> ИТОГО:</strong></td>
            <td colspan="4"><?= $session['cart.qty'] ?> шт.</td>
        </tr>
        <tr>
            <td><strong> НА СУММУ:</strong></td> 
            <td colspan="4"><?= $session['cart.sum'] ?> руб.</td>
        </tr>-->
      
     
   <?php endif; ?>
 
 <?php if (!empty($session['cartgaragi'])): ?>
     
 
            <?php foreach ($session['cartgaragi'] as $id => $itemgarag):?> 
                   
         <tr>
         <td><?= \yii\helpers\Html::img($itemgarag['img'], ['alt' =>$itemgarag['name'], 'height'=> 50])?></td>
         <td><a href="<?= Url::to (['nedviggaragi/view','id'=>$id ])?>"><?= $itemgarag['name']?></a></td>
        <td><?= $itemgarag['price']?></td>
        <td> <span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-itemgaragi"aria-hidden="true" ></span></td>
        </tr>
              <?php endforeach; ?>
        
<!--        <tr>
        <hr>
        <td><strong> ИТОГО:</strong></td>
            <td colspan="4"><?= $session['cart.qty'] ?> шт.</td>
        </tr>
        <tr>
            <td><strong> НА СУММУ:</strong></td> 
            <td colspan="4"><?= $session['cart.sum'] ?> руб.</td>
        </tr>-->
       </tbody>
      </table>


</div>
		<?php endif; } ?>
 
 