<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\NedvigZemli */

$this->title = 'Добавить земельный участок';
$this->params['breadcrumbs'][] = ['label' => 'Nedvig Zemlis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nedvig-zemli-create">
    <table> 
       
		<td align="center"><input class="button" type="button" value="Вернуться назад" onclick="javascript:history.go(-1)" /></td>
	
   </table>
   <center> <h4>Добавить земельный участок</h4> </center>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
