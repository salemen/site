<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use \kartik\depdrop\DepDrop;
use yii\bootstrap\Dropdown;
use app\assets\AppAsset;
use app\modules\admin\models\Avtokuzov;
use app\modules\admin\models\Avtokorobka;
use app\modules\admin\models\Avtodvigatel;
use app\modules\admin\models\Avtoprivod;
use app\modules\admin\models\Avtosostoyanie;
use app\modules\admin\models\Avtogod;
use app\modules\admin\models\Avtoleg;
use app\modules\admin\models\Marka;
use app\modules\admin\models\Model;
use app\modules\admin\models\Oblast;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Avtoleg */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
 include Yii::$app->basePath.'/payconf.php';
?>

<?php AppAsset::register($this); ?>

<style>
 td{
  max-width: 130px;
} 
 table{
	 width: 100%;
 }
 .avtoleg-form div{
	 max-width: 800px;
 }
</style>

<div class="avtoleg-form">

    <?php $form = ActiveForm::begin(); ?>

     <!--Ваш логин -->
	 <?php 
		        $username = Yii::$app->user->identity['username'];
				 $idn = $_GET['id'];
				 if ($idn){
				 $username1= avtoleg::find()->where(['id' => $idn])->andWhere(['username' => $username])->all();}?>
				 
				 <?php if ($username1||!$idn||$username=='sarmetradmin'){?> 
	 
		<?php if ($username=='sarmetradmin'){ 
			    }else{?>
       <center><div><table>
         <tr>
            <td>
                <?= $form->field($model, 'username')->textinput(['value'=>$username, 'readonly'=>1]) ?></td>
             <?php $telephone = Yii::$app->user->identity['telephone']?>
                
                <td><?= $form->field($model, 'telephone')->textinput(['value'=>$telephone, 'readonly'=>1]) ?></td>
        </tr>
				</table></div></center> <?php } ?>
	   
    
	
	           <?php
	         ///////////////////Автотехника///////////////////////
				
				 $marka1 = marka::find()->where('id')->all();
                foreach($marka1 as $key => $item) {
                $id[] = $item['id'];}
                $marka = ArrayHelper::map($marka1, 'id','mark');
               
			   
                  $oblast1 = oblast::findAll([23,43,60,69]);
                foreach($oblast1 as $key => $item) {
                $id=$key;
				$oblast_region=$item; }
                $oblast = ArrayHelper::map($oblast1, 'id','oblast_region');
               
               
                ?>
<center><div><table class="table table-hover table-striped"> 
        
        <tr>
         <?= $form->field($model, 'opisanie')->textarea(['rows' => 6, 'placeholder' => 'обязательное поле, максимум 1000 символов']) ?>
        </tr>
        
<tr>
<td>
<?php
echo $form->field($model, 'oblast')->dropDownList( $oblast,['id'=>'id_oblast','prompt' => '-Выберите регион/область-']);
?>
</td>
</tr>
 </table></div></center>
<center><div><table class="table table-hover table-striped"> 
<tr>
<td>
<?php
echo $form->field($model, 'marka')->dropDownList($marka,['id'=>'mark_id','prompt' => 'Выберите марку']);
?>
</td>
<td>
<?php
   $id_model1 = model::find()->select(['id','name'])->all();
         foreach ($id_model1 as $name=>$value){
          $id_model=$value;
         //$modelavto=$name;
       } 
   

     
// Child # 1
 echo $form->field($model, 'model')->widget(DepDrop::classname(), [
   
    'options'=>['id'=>'id_model'],
    'pluginOptions'=>[ 
        'depends'=>['mark_id'],
        'placeholder'=>'Выберите модель',
        'url'=>Url::to(['/site/model'])
    ]
]); 


?>
 </td> 
</tr>
    
    <td><?= $form->field($model, 'tip')->dropDownList( avtokuzov::find()->select(['tip','id'])->indexBy('tip')->column(),['promt'=>'Select tip']) ?></td>
 
    <td><?= $form->field($model, 'god')->dropDownList( avtogod::find()->select(['tip','id'])->indexBy('tip')->column(),['promt'=>'Select tip']) ?></td>
</tr>
<tr>
    <td><?= $form->field($model, 'probeg')->textInput(['type' => 'number', 'placeholder' => 'обязательное поле']) ?></td>

    <td><?= $form->field($model, 'korobka')->dropDownList( avtokorobka::find()->select(['tip','id'])->indexBy('tip')->column(),['promt'=>'Select tip']) ?></td>
</tr>
<tr>
    <td><?= $form->field($model, 'dvigatel')->dropDownList( avtodvigatel::find()->select(['tip','id'])->indexBy('tip')->column(),['promt'=>'Select tip']) ?></td>

    <td><?= $form->field($model, 'privod')->dropDownList( avtoprivod::find()->select(['tip','id'])->indexBy('tip')->column(),['promt'=>'Select tip']) ?></td>
</tr>
<tr>
    <td><?= $form->field($model, 'sostoyanie')->dropDownList( avtosostoyanie::find()->select(['tip','id'])->indexBy('tip')->column(),['promt'=>'Select tip']) ?></td>

    <td><?= $form->field($model, 'price')->textInput(['type' => 'number', 'placeholder' => 'обязательное поле']) ?></td>
</tr>

    <center> <div><table class="table table-hover table-striped">  
    
 <tr>
   <td><?= $form->field($model, 'image')->fileInput() ?> </td>
   </tr>
   <tr>
   <td><?= $form->field($model, 'gallery[]')->fileInput(['multiple'=> true, 'accept'=>'image/*']) ?>&nbsp;&nbsp; можете выбрать сразу несколько файлов </td>
 </tr>
 </table></div></center>
 
 
<center> <div id="fff"><table class="table table-hover table-striped"> 
 
 <p style="color:#000;line-height:23px;text-align:center;letter-spacing:2px;font-size:100%;font-weight:bold"><strong><?=$maintit;?></p><br/>

<?php if($model->hit){?>
 <tr><td><label>
<?= $form->field($model, 'hit')->checkbox(['label' => 'Уже <span style="color: blue;">в ИЗБРАННОМ</span>', 'checked ' => true]) ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( <?=$prhit;?> руб. )<small class="ttip">ЧТО ЭТО ?<span><?=$am1dd;?></span></small>
</label></td></tr> 
 <?php } elseif(!$model->hit) { ?>
<tr><td><label>
<?= $form->field($model, 'hit')->checkbox(['label' => 'Добавить в <span style="color: blue;">ИЗБРАННЫЕ</span> Легковые']) ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( <?=$prhit;?> руб. )<small class="ttip">ЧТО ЭТО ?<span><?=$am1dd;?></span></small>
</label></td></tr>
 <?php }?>

<?php if($model->new==1){?>
<tr><td><label>
<?= $form->field($model, 'new')->checkbox(['label' => 'Уже добавлен ярлык <span style="color: green;">NEW</span>', 'checked ' => true]) ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( <?=$prnew;?> руб. )<small class="ttip">ЧТО ЭТО ?<span><?=$a2dd;?></span></small>
</label></td></tr>
<?php } elseif(!$model->new==1) { ?>
<tr><td><label>
<?= $form->field($model, 'new')->checkbox(['label' => 'Добавить ярлык <span style="color: green;">NEW</span>']) ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( <?=$prnew;?> руб. )<small class="ttip">ЧТО ЭТО ?<span><?=$a2dd;?></span></small>
</label></td></tr>
<?php }?>

<?php if($model->sale==1){?>
<tr><td><label>
<?= $form->field($model, 'sale')->checkbox(['label' => 'Уже добавлен ярлык <span style="color: red;">SALE</span>', 'checked ' => true]) ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( <?=$prsale;?> руб. )<small class="ttip">ЧТО ЭТО ?<span><?=$a3dd;?></span></small>
</label></td></tr>
<?php } elseif (!$model->sale==1) { ?>
<tr><td><label>
<?= $form->field($model, 'sale')->checkbox(['label' => 'Добавить ярлык <span style="color: red;">SALE</span>']) ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( <?=$prsale;?> руб. )<small class="ttip">ЧТО ЭТО ?<span><?=$a3dd;?></span></small>
</label></td></tr>
<?php }?>

<?php if($model->rekom==1){?>
<tr><td><label>
<?= $form->field($model, 'rekom')->checkbox(['label' => 'Уже добавлено в <span style="color: blue;">РЕКОМЕНДУЕМ</span>','checked ' => true]) ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( <?=$prrekom;?> руб. )<small class="ttip">ЧТО ЭТО ?<span><?=$am4dd;?></span></small>
</label></td></tr>
<?php } elseif (!$model->rekom==1) { ?>
<tr><td><label>
<?= $form->field($model, 'rekom')->checkbox(['label' => 'Добавить в <span style="color: blue;">РЕКОМЕНДУЕМ</span>']) ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( <?=$prrekom;?> руб. )<small class="ttip">ЧТО ЭТО ?<span><?=$am4dd;?></span></small>
</label></td></tr>
<?php }?>

<?php if($model->videl==1){?>
<tr><td><label>
<?= $form->field($model, 'videl')->checkbox(['label' => 'Уже выделено <span style="color: red;">КРАСНЫМ</span> цветом','checked ' => true]) ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( <?=$prvidel;?> руб. )<small class="ttip">ЧТО ЭТО ?<span><?=$a5dd;?></span></small>
</label></td></tr>
<?php } elseif(!$model->videl==1){ ?>
<tr><td><label>
<?= $form->field($model, 'videl')->checkbox(['label' => 'Выделить <span style="color: red;">КРАСНЫМ ЦВЕТОМ</span>']) ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( <?=$prvidel;?> руб. )<small class="ttip">ЧТО ЭТО ?<span><?=$a5dd;?></span></small>
</label></td></tr>
<?php }?>
 <tr>
 <td>
  <?php if ($username=='sarmetradmin'){ ?>
 <?= $form->field($model, 'moder')->checkbox([ '0', '1' ]) ?><?php } ?>
  </td>
  </tr> 
    </table></div></center></br>


    <center><div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Разместить объявление' : 'Сохранить изменения', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div></center>
    <?php } else { ?> 
		
		<center><?php echo 'Такого объявления нет'; }?></center>
    <?php ActiveForm::end(); ?>

</div>
