<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Nedvigbiznes */

$this->title = 'Добавить Бизнес';
$this->params['breadcrumbs'][] = ['label' => 'Nedvigbiznes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nedvigbiznes-create">
 <table> 
       
		<td align="center"><input class="button" type="button" value="Вернуться назад" onclick="javascript:history.go(-1)" /></td>
	
   </table>
    <center><h4><?= Html::encode($this->title) ?></h4></center>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
