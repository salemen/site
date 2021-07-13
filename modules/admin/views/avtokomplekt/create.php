<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Avtokomplekt */

$this->title = 'Добавить Комлектующие';
$this->params['breadcrumbs'][] = ['label' => 'Avtokomplekts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="avtokomplekt-create">
 <table> 
       
		<td align="center"><input class="button" type="button" value="Вернуться назад" onclick="javascript:history.go(-1)" /></td>
	
   </table>
    <center><h4><?= Html::encode($this->title) ?></h4></center>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
