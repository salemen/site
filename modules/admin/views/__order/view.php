<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\order */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h2>Просмотр заказа № <?= $model->id ?>, от <?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'updated_at',
            'qty',
            'sum',
            [
              'attribute' => 'status',
                'value' => function ($model){
                   return !$model->status ? '<span class="text-danger"> Активен </span>' : '<span class="text-success">Завершен</span>'; 
                },'format'=>'html',
                ],
            //'status',
            'name',
            'email:email',
            'phone',          
            'index',
            'region',
            'area',
            'city',
            'street',
            'house_number',
            'apartment_number'       
        ],
    ]) ?>
    
    <?php $items = $model->orderItems; ?>

    <div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
              
                 <th>Наименование</th>
                  <th>Количество</th>
                   <th>Цена за ед.</th>
                   <th>Сумма</th>
                   
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item):?> 
            <tr>
                
                <td><a href="<?= yii\helpers\Url::to (['/product/view','id'=>$item->product_id ])?>"><?= $item['name']?></a></td>
        <td><?= $item['qty_item']?></td>
        <td><?= $item['price']?></td>
        <td><?= $item['sum_item']?></td>
        
        </tr>
              <?php endforeach; ?>
        
        <tr>
        <hr>
<!--        <td><strong> ИТОГО:</strong></td>
            <td colspan="5"><?= $session['cart.qty'] ?> шт.</td>
        </tr>
        <tr>
            <td><strong> НА СУММУ:</strong></td> 
            <td colspan="5"><?= $session['cart.sum'] ?> руб.</td>
        </tr>-->
        </tbody>
    </table>
</div>
    
</div>
