<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\admin\models\Oblast;
use app\modules\admin\models\Goroda;
use app\modules\admin\models\Raion;
use app\modules\admin\models\Nedvigkvartiri;



/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\NedvigKvartiri */
$kv = 'Квартира № ';
$this->title = $kv.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nedvig Kvartiris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
  
?>


<?php
    $oblast1 = Oblast::find()->select('oblast_region')
    ->where(['id' => $model->oblast_region])
    ->one();
       foreach($oblast1 as $item) {
                $model->oblast_region = $item;} 
          
      $gorod1 = Goroda::find()->select('name')
    ->where(['id' => $model->gorod])
    ->one();
       foreach($gorod1 as $item) {
                $model->gorod = $item;}      
       
       if ($model->raion ==0){         
      
	   }
	   else {$raion1 = Raion::find()->select('raion')
    ->where(['id' => $model->raion])
    ->one();
       foreach($raion1 as $item) {
       $model->raion = $item;}};
          
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

       if (!$model->verh){
		   $model->verh="нет";
	   }else{
		 $model->verh="да"; }  		 
		  
    ?>

<?php
                  $mainImg = $model->getImage();
                  $gallery = $model->getImages();
         
 ?>
 
 <style>
 th{
  max-width: 120px;
  border: 1px solid #c0b8b8!important;
}
td{
  max-width: 240px;
  border: 1px solid #c0b8b8!important;
} 
 table{
	 width: 80%;
 }
 

 .nedvig-kvartiri-view {
	max-width:900px;
	margin: 0 auto;
}

</style>

       <?php
                 $username = Yii::$app->user->identity['username'];
				 $idn = $_GET['id'];
				 if ($idn){
				 $username1= nedvigkvartiri::find()->where(['id' => $idn])->andWhere(['username' => $username])->all();}
				 if ($username1||!$idn||$username=='sarmetradmin'){	
              ?>

<div class="nedvig-kvartiri-view">

   
        <center>
    <a href="<?= yii\helpers\Url::to(['nedvigkvartiri/index']) ?>" class="btn btn-primary">Все квартиры</a>
	  <a href="<?= yii\helpers\Url::to(['nedvigkvartiri/create']) ?>" class="btn btn-primary">➕</a>
        </center>
   

    <h4>Объявление № <?= $model->id ?></h4>

   <p>
       
         <?php if (!empty($model->moder)){?>
		<?= Html::a('Как выглядит', ['/nedvigkvartiri/view', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
		 <?php } ?>
        <?= Html::a('Радактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
<center>
<table>
    <?= DetailView::widget([
        
        'model' => $model,
        'attributes' => [
            
            'id',
			'username',
			'telephone',
			'data',
            'opisanie:html',
            'type',
            'operaciya',
            'vtorichka_novostroi',
           ['attribute'=>'oblast_region',
             'value'=> $model->oblast_region,
            ],
            ['attribute'=>'gorod',
             'value'=>$model->gorod ,
             
            ],
            ['attribute'=>'raion',
             'value'=>$model->raion ,
             
            ],
            'street',
            'number_doma',
            'number_kvartir',
            'kolichestvo_komnat',
            'tip_doma',
            'etag',
            'etagey_v_dome',
            'plochad_obchy',
            'plochad_gilaya',
            'plochad_kuxni',
            'kadastrovi_nomer',
            'price',
			'verh',
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
        ],
    ]) 
	
	?></table></center>
	
	
    
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