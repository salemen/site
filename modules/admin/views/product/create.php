<?php

use yii\helpers\Html;
use app\modules\admin\models\Product;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */

$this->title = 'Добавить новый товар';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">
 <table> 
       
		<td align="center"><input class="button" type="button" value="Вернуться назад" onclick="javascript:history.go(-1)" /></td>
	
   </table>
    <center><h4>Добавить товар для продажи</h4></center>
 <?php $username = Yii::$app->user->identity['username'];
		     // отправка почты клиентам
              $query = Product::find()->where(['username' => $username])->andWhere(['id' => $id])->all();
			  
			  if ($query||$username=='sarmetradmin'){ 
			  }else{
             Yii::$app->mailer->compose('ads', ['username' => $username] )->setFrom (['rim-79@bk.ru'=>'ДОБАВЛЕНИЕ объявление на сайте'])
			 -> setTo('info@salemen.ru')-> setSubject('ДОБАВЛЕНИЕ объявление, МАГАЗИН')->send ();
			  }?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
