<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\admin\models\Marka;
use app\modules\admin\models\Model;
use app\modules\admin\models\Avtokomplekt;
use app\models\Avtocategory;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Avtokomplekt */

$this->title = 'Объявление № '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Avtokomplekts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<?php
               if (!$model->hit){
		   $model->hit="нет";
	   }else{
		 $model->hit="да"; }
	   
	    if (!$model->new){
		   $model->new="нет";
	   }else{
		 $model->new="да"; }
		 
	    if (!$model->sale){
		   $model->sale="нет";
	   }else{
		 $model->sale="да"; }
		 
		if (!$model->rekom){
		   $model->rekom="нет";
	   }else{
		 $model->rekom="да"; } 
		 
		if (!$model->videl){
		   $model->videl="нет";
	   }else{
		 $model->videl="да"; }  

                  $mainImg = $model->getImage();
                  $gallery = $model->getImages();
         
 ?>
 
 <?php
  if ($model->marka ==0){         
      
	   }
	   else {
    $marka1 = marka::find()->select('mark')
    ->where(['id' => $model->marka])
    ->one();
       foreach($marka1 as $item) {
	   $model->marka = $item;} }
          
		  if ($model->model ==0){         
      
	   }else {
		$model1 = model::find()->select('name')
    ->where(['id' => $model->model])
    ->one();
       foreach($model1 as $item) {
	   $model->model = $item;} }     

       
	    $model2 = Avtocategory::find()->select('name')
    ->where(['id' => $model->tip])
    ->one();      
	   $model->tip = $model2[name];                 
    ?>
	
 <style>
 th{
  max-width: 120px;
}
td{
  max-width: 240px;
} 
 table{
	 width: 80%;
 }
 

 .avtokomplekt-view {
	max-width:900px;
	margin: 0 auto;
}

</style>
  <?php 
		        $username = Yii::$app->user->identity['username'];
				 $idn = $_GET['id'];
				 if ($idn){
				 $username1= avtokomplekt::find()->where(['id' => $idn])->andWhere(['username' => $username])->all();}?>
				 
				 <?php if ($username1||!$idn||$username=='sarmetradmin'){?> 
 
<div class="avtokomplekt-view">
    
    <table>
        <center>
    <a href="<?= yii\helpers\Url::to(['avtokomplekt/index']) ?>" class="btn btn-success">Все комплектующие</a>
	<a href="<?= yii\helpers\Url::to(['avtokomplekt/create']) ?>" class="btn btn-success">➕</a>
        </center>
    </table>

   <h4><?= Html::encode($this->title) ?></h4>

     <p>
	     <?php if (!empty($model->moder)){?>
		<?= Html::a('Как выглядит', ['/avtokomplekt/view', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
		 <?php } ?>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-trash-o" aria-hidden="true"></i>', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить это объявление ?',
                'method' => 'post',
            ],
        ]) ?>
		
    </p>
<style>
	th{
		min-width: 120px;
	}
	</style>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
			'username',
			'telephone',
           // 'parent_id',
            //'hit',
            'data',
            //'username',
			'marka',
			'model',
			'name',
            'tip',
            'sostoyanie',
            'opisanie:ntext',
            'price',
			'hit',
            'new',
            'sale',
			'rekom',
			'videl',
             [
                'attribute' => 'image',
                'value' => "<img src='{$mainImg->getUrl('170X150')}'>",
                'format' => 'html',
            ],
//            [
//                'attribute' => 'gallery',
//                'value' => "<img src='{$gallery->getUrl('170X150')}'>",
//                'format' => 'html',
//            ],
                        
                        
                        
        ],
    ]) ?>
    
    <?php 
//       $gallery = $model->getImages();
     ?>
   
    <table class="table table-hover table-striped">
        
         <table>
     <th> Галлерея изображений</th>
    </table>
       
       
        
        <div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
						 <div class="carousel-inner">
                                                     
                      <?php $count = count ($gallery); $i=0; foreach ($gallery as $img):?>
                                                     
                                            <?php if($i % 10===0):?>         
                                                     
                                <div class="item <?php if($i==0) echo 'active'?>">
                                    
                                                  <?php endif; ?>          
		<a href=""><?= Html::img($img->getUrl('84x85'),['alt'=>'']) ?></a>
                
						<?php $i++; if($i % 10===0 || $i==$count): ?>  
                         <?= Html::a('X', ['deleteimg', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить все изображения?',
                'method' => 'post',
            ],
                 ]) ?>							
										</div>
                                                     <?php endif; ?>
						<?php endforeach;?>
										</div>
										
									

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>
        
    
    
    <hr>
    <p>
        
         <?= Html::a('Радактировать объявление', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>
	<p>
	 <input class="btn btn-default" type="button" value="Назад" onclick="javascript:history.go(-1)" />
    </p>
    <hr>
</div>
<?php } else { ?> 
		
		<center><?php echo 'Такого объявления нет'; }?></center>