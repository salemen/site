<?php
 
 use yii\helpers\Html;
 use yii\helpers\Url;
 use yii\widgets\ActiveForm;
 
 ?>

<div class="container">
    <?php if(Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('success'); ?>
    </div>
    <?php endif; ?>
        
        
     <?php if(Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
         <?php echo Yii::$app->session->getFlash('error'); ?>
    </div>
    <?php endif; ?>
            
        
    

  <?php if (!empty($session['cart'])): ?>
<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Фото</th>
                 <th>Наименование</th>
                  <th>Количество</th>
                   <th>Цена за ед.</th>
                   <th>Сумма</th>
                   <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($session['cart'] as $id => $item):?> 
            <tr>
                <td><?= \yii\helpers\Html::img("@web/images/products/{$item['img']}", ['alt' =>$item['name'], 'height'=> 50])?></td>
                <td><a href="<?= Url::to (['product/view','id'=>$id ])?>"><?= $item['name']?></a></td>
        <td><?= $item['qty']?></td>
        <td><?= $item['price']?></td>
        <td><?= $item['qty'] * $item['price']?></td>
        <td> <span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-item"aria-hidden="true" ></span></td>
        </tr>
              <?php endforeach; ?>
        
        <tr>
        <hr>
        <td><strong> ИТОГО:</strong></td>
            <td colspan="5"><?= $session['cart.qty'] ?> шт.</td>
        </tr>
        <tr>
            <td><strong> НА СУММУ:</strong></td> 
            <td colspan="5"><?= $session['cart.sum'] ?> руб.</td>
        </tr>
        </tbody>
    </table>
</div>
    
    <hr>
    <?php $form = ActiveForm::begin ()?>
    <center><?php echo 'Заполните все поля ниже, для заказа товара'; ?></center>
   
    <table class="table table-hover table-striped">
         <?=$form->field ($order, 'name')?>
    <tr>
        <td> <?=$form->field ($order, 'email')?></td>
        <td> <?=$form->field ($order, 'phone')?></td>
    </tr>
    <tr>
        <td><?=$form->field ($order, 'index')?></td>
        <td><?=$form->field ($order, 'region')?></td>
        <td><?=$form->field ($order, 'area')?></td>
        <td><?=$form->field ($order, 'city')?></td>
    </tr>
    <tr>
        <td><?=$form->field ($order, 'street')?></td>
        <td><?=$form->field ($order, 'house_number')?></td>
        <td><?=$form->field ($order, 'apartment_number')?></td>
    </tr>
    
    </table>
    <center><?= Html::submitButton ('Продолжить оформление заказа(ов) ', ['class'=> 'btn btn-success']) ?></center>.
    
    
    <?php ActiveForm::end () ?>
<?php else: ?>
     <h3>В избранном пусто ((.. </h3>

    
    <?php endif; ?>  
    
    
</div>