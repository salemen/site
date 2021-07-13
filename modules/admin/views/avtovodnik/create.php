<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Avtovodnik */

$this->title = 'Добавить водный транспорт';
$this->params['breadcrumbs'][] = ['label' => 'Avtovodniks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="avtovodnik-create">
 <table> 
       
		<td align="center"><input class="button" type="button" value="Вернуться назад" onclick="javascript:history.go(-1)" /></td>
	
   </table>
    <center><h4><?= Html::encode($this->title) ?></h4></center>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
