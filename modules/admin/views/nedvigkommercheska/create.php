<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\NedvigKommercheska */

$this->title = 'Добавить коммерческую недвижимость';
$this->params['breadcrumbs'][] = ['label' => 'Nedvig Kommercheskas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nedvig-kommercheska-create">
 <table> 
       
		<td align="center"><input class="button" type="button" value="Вернуться назад" onclick="javascript:history.go(-1)" /></td>
	
   </table>
    <center><h4> Добавить коммерческую</h4></center>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
