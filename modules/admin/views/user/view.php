<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\admin\models\User;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<?php
                  $mainImg = $model->getImage();
                  $gallery = $model->getImages();
         
 ?>
 
 <style>

 .table{
	 max-width: 700px;
 }
 
</style>

 <?php
                 $username = Yii::$app->user->identity['username'];
				 $idn = $_GET['id'];
				 if ($idn){
				 $username1= user::find()->where(['id' => $idn])->andWhere(['username' => $username])->all();}
				 if ($username1||!$idn||$username=='sarmetradmin'){	
              ?>

<div class="user-view">
<center>
    <h4>Ваш профиль</h4>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить свой аккаунт ?',
                'method' => 'post',
            ],
        ]) ?>
		
		<td align="center"><input class="btn btn-default" type="button" value="Назад" onclick="javascript:history.go(-1)" /></td>
    </p>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'username',
			'date',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
			'name',
            'email:email',
            'telephone',
            'gorod',
            'adress',
            //'status',
            //'created_at',
            //'updated_at',
            //'role',
            'opisanie',
            [
                'attribute' => 'image',
                'value' => "<img src='{$mainImg->getUrl('170X150')}'>",
                'format' => 'html',
            ],
        ],
    ]) ?>
</center>
</div>
<?php } else { ?> 
		
		<center><?php echo 'Такого логина нет'; }?></center>