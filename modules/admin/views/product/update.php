<?php

use yii\helpers\Html;
use app\modules\admin\models\Product;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */

$this->title = 'Редактировать объявление №' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-update">

   <center> <h4><?= Html::encode($this->title) ?></h4> </center>
   
  <?php $username = Yii::$app->user->identity['username'];
		     // отправка почты клиентам
              $query = Product::find()->where(['username' => $username])->andWhere(['id' => $id])->all();
			  
			  if ($query||$username=='sarmetradmin'){ 
			  }else{
             Yii::$app->mailer->compose('update', ['username' => $username] )->setFrom (['rim-79@bk.ru'=>'ИЗМЕНЕНИЕ объявление на сайте'])
			 -> setTo('info@salemen.ru')-> setSubject('ИЗМЕНЕНИЕ объявления в МАГАЗИН')->send ();
			  }?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
