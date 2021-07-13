<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\NedvigGaragi */

$this->title = 'Добавить гараж/машиноместо';
$this->params['breadcrumbs'][] = ['label' => 'Nedvig Garagis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nedvig-garagi-create">
 <table> 
       
		<td align="center"><input class="button" type="button" value="Вернуться назад" onclick="javascript:history.go(-1)" /></td>
	
   </table>
    <center><h4><?= Html::encode($this->title) ?></h4></center>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
