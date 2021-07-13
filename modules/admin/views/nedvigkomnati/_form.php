<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\assets\AppAsset;
use app\modules\admin\models\KolichestvoKomnat;
use app\modules\admin\models\Operaciya;
use app\modules\admin\models\Tipdoma;
use app\modules\admin\models\Etag;
use app\modules\admin\models\Etagei;
use app\modules\admin\models\Oblast;
use app\modules\admin\models\Goroda;
use app\modules\admin\models\Raion;
use app\modules\admin\models\NedvigKomnati;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use GeoIp2\Database\Reader;



/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\NedvigKomnati */
/* @var $form yii\widgets\ActiveForm */
?>

<script src="https://api-maps.yandex.ru/2.1.75/?lang=ru_RU&apikey=03c1e2cb-88bb-4cbe-9038-d76af518009d" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<?php
 include Yii::$app->basePath.'/payconf.php';
?>

<!-----ОПРЕДЕЛЕНИЕ IP1 АДРЕСА И РЕГИОНА-->
	<?php									
 require_once Yii::$app->basePath . "/vendor/geoip2/geoip2/geoip2.phar";
require_once Yii::$app->basePath . "/vendor/autoload.php";
// This creates the Reader object, which should be reused across
// lookups.
$reader = new Reader (Yii::$app->basePath ."/vendor/geoip2/geoip2/GeoLite2-City.mmdb");

// Replace "city" with the appropriate method for your database, e.g.,
// "country".
$ip = Yii::$app->request->userIP;
$record = $reader->city($ip);
$key = "$ip";
$obl = $record->mostSpecificSubdivision->name;
$gor = $record->city->name;

$obl1 = 'Saratovskaya Oblast';

$obl2 = strpos($obl, $obl1);

  if ($obl2 === false){
	
} else {
	$oblast_reg = 64;
}

$obl1 = 'Rostov';
$obl2 = strpos($obl, $obl1);

  if ($obl2 === false){
	
} else {
	$oblast_reg = 61;
}

$obl1 = 'Azov';
$obl2 = strpos($gor, $obl1);

  if ($obl2 === false){
	
} else {
	$oblast_reg = 611;
} 

$obl1 = 'Bataysk';
$obl2 = strpos($gor, $obl1);

  if ($obl2 === false){
	
} else {
	$oblast_reg = 612;
} 

$obl1 = 'schachti';
$obl2 = strpos($gor, $obl1);

  if ($obl2 === false){
	
} else {
	$oblast_reg = 613;
}

$obl1 = 'Taganrog';
$obl2 = strpos($gor, $obl1);

  if ($obl2 === false){
	
} else {
	$oblast_reg = 614;
} 

$obl1 = 'Stavropol';
$obl2 = strpos($obl, $obl1);     

  if ($obl2 === false){
	
} else {
	$oblast_reg = 26;
} 

$obl1 = 'Kislovodsk';
$obl2 = strpos($gor, $obl1);

  if ($obl2 === false){
	
} else {
	$oblast_reg = 261;
}

$obl1 = 'essentuki';
$obl2 = strpos($gor, $obl1);

  if ($obl2 === false){
	
} else {
	$oblast_reg = 262;
} 

$obl1 = 'Mineralnye';
$obl2 = strpos($gor, $obl1);

  if ($obl2 === false){
	
} else {
	$oblast_reg = 263;
} 

$obl1 = 'Pyatigorsk';
$obl2 = strpos($gor, $obl1);

  if ($obl2 === false){
	
} else {
	$oblast_reg = 264;
} 

$obl1 = 'Krasnodarskiy Kray';
$obl2 = strpos($obl, $obl1);

if ($obl2 === false){
	
} else {
	$oblast_reg = 23; 	
}

$obl1 = 'Sochi';
$obl2 = strpos($gor, $obl1);

  if ($obl2 === false){
	
} else {
	$oblast_reg = 233;
} 

$obl1 = 'Anapa';
$obl2 = strpos($gor, $obl1);

  if ($obl2 === false){
	
} else {
	$oblast_reg = 234;
} 

$obl1 = 'Belorechensk';
$obl2 = strpos($gor, $obl1);   

  if ($obl2 === false){
	
} else {
	$oblast_reg = 235;
}

$obl1 = 'Novorossiysk';
$obl2 = strpos($gor, $obl1); 

  if ($obl2 === false){
	
} else {
	$oblast_reg = 235;
}

$obl1 = 'Gelendschik';
$obl2 = strpos($gor, $obl1); 

  if ($obl2 === false){
	
} else {
	$oblast_reg = 236;
} 

$obl1 = 'Gelendzhik';
$obl2 = strpos($gor, $obl1); 

  if ($obl2 === false){
	
} else {
	$oblast_reg = 236;
} 

$obl1 = 'Armavir';
$obl2 = strpos($gor, $obl1); 

  if ($obl2 === false){
	
} else {
	$oblast_reg = 237;
}

$obl1 = 'Kropotkin';
$obl2 = strpos($gor, $obl1); 

  if ($obl2 === false){
	
} else {
	$oblast_reg = 238;
}

$obl1 = 'Slavyansk-na-Kubani';
$obl2 = strpos($gor, $obl1); 

  if ($obl2 === false){
	
} else {
	$oblast_reg = 239;
} 

$obl1 = 'Yeysk';
$obl2 = strpos($gor, $obl1); 

  if ($obl2 === false){
	
} else {
	$oblast_reg = 240;
} 

$obl1 = 'Tikhoretsk';
$obl2 = strpos($gor, $obl1); 

  if ($obl2 === false){
	
} else {
	$oblast_reg = 241;
}

$obl1 = 'Novomikhaylovskiy';
$obl2 = strpos($gor, $obl1); 

  if ($obl2 === false){
	
} else {
	$oblast_reg = 242;
} 

$obl1 = 'Timashëvsk'; 
$obl2 = strpos($gor, $obl1); 

  if ($obl2 === false){
	
} else {
	$oblast_reg = 243;
} 

$obl1 = 'Maykop';
$obl2 = strpos($gor, $obl1); 

  if ($obl2 === false){
	
} else {
	$oblast_reg = 1;
} 

$cache = Yii::$app->cache;
$cache->set($key, $oblast_reg);
$oblast1 = "Выберите регион";

?>

<?php AppAsset::register($this); ?>

<style>
 td{
  max-width: 130px;
} 
 table{
	 width: 100%;
 }
 .nedvig-komnati-form div{
	 max-width: 800px;
 }
</style>

<div class="nedvig-komnati-form">
    
    
    <?php 
                  $oblast1 = oblast::findAll([23,43,60,69]);
                foreach($oblast1 as $key => $item) {
                $id[] = $item['id'];}
                $oblast = ArrayHelper::map($oblast1, 'id','oblast_region');
                $id_gorod1 = Goroda::find()->where('id')->all();
                $id_gorod = ArrayHelper::map($id_gorod1, 'id','name');
               
                ?>

    <?php $form = ActiveForm::begin(); ?>

     <!--$form->field($model, 'data')->textInput() 

     $form->field($model, 'hit')->textInput(['maxlength' => true]) -->

  <!--Ваш логин -->
  
        <?php 
		        $username = Yii::$app->user->identity['username'];
				 $idn = $_GET['id'];
				 if ($idn){
				 $username1= nedvigkomnati::find()->where(['id' => $idn])->andWhere(['username' => $username])->all();}?>
				 
				 <?php if ($username1||!$idn||$username=='sarmetradmin'){?> 
  
		<?php $username = Yii::$app->user->identity['username']?>
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


<center><div><table class="table table-hover table-striped">
    
     <?= $form->field($model, 'opisanie')->textarea(['rows' => 6,'placeholder' => 'обязательное поле, максимум 1500 символов']) ?>
	 
	 <!-------------------Карта------------------->
 
 
   <table class="table table-hover table-striped">  
	 <tr>									   
 <td align="center"><?php //echo $lists['owncoords']; ?> 
	<input type="hidden" name="owncoords" value="1">
	&nbsp;&nbsp;<a href="javascript:void(0)" onclick="showthisguys()"><i class="btn btn-default" 
	       style= "margin-left: 10px; margin-top: 8px;" ><i class="fa fa-flag"></i> ОТМЕТИТЬ НА КАРТЕ</i></a>
	
	</td>
  </tr> 
  <style>
	.noshowtrue {display:none;}
	.noshowfalse {display:table-row;}
  </style>
   <tr id="thisguys" class="noshowtrue">
	<td align="left" colspan="2">
		<center><p><strong>Укажите местоположение комнаты на карте</strong></p></center>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<center><div id="mapp" style="width: 95%; height: 350px"></div></center>
		<script type="text/javascript">
			$.noConflict();
			
			  function showthisguys () {
				document.getElementById("thisguys").className = "";
				document.getElementById("thisguys").className = "noshowfalse";
			}
			function hidethisguys () {
				document.getElementById("thisguys").className = "";
				document.getElementById("thisguys").className = "noshowtrue";
			}  
			
			
			<?php $declat = $model->declat; 
		          $declong = $model->declong;	
				 
			?>
			
			ymaps.ready(function () {

			 function crdss(ttt1,ttt2) {
				document.getElementById('declat').value = ttt1;
				document.getElementById('declong').value = ttt2;
				//jQuery('input#declat').value(ttt1);
				//$('input[name=owncoords]').hide();
			} 
		
				myMap = new ymaps.Map("mapp", {
					<?php if ($model->declat AND $model->declong) { ?>
					center: [<?php echo $model->declat;?>,<?php echo $model->declong;?>],
					<?php } elseif ($oblast_reg == 1) { ?>
					center: [44.6078,40.1058],
					<?php } elseif ($oblast_reg == 64) { ?>
					center: [51.54056,46.00861],
					<?php } elseif ($oblast_reg == 23){ ?>
					center: [45.04484,38.97603],
					<?php } elseif ($oblast_reg == 233){ ?>
					center: [43.59917,39.72569],
					<?php } elseif ($oblast_reg == 234){ ?>
					center: [44.8908,37.3239],
					<?php } elseif ($oblast_reg == 235){ ?>
					center: [44.7244,37.7675],
					<?php } elseif ($oblast_reg == 236){ ?>
					center: [44.5622,38.0848],
					<?php } elseif ($oblast_reg == 237){ ?>
					center: [44.9959,41.1257],
					<?php } elseif ($oblast_reg == 238){ ?>
					center: [45.4305,40.5806],
					<?php } elseif ($oblast_reg == 239){ ?>
					center: [45.2519,38.1181],
					<?php } elseif ($oblast_reg == 240){ ?>
					center: [46.7055,38.2739],
					<?php } elseif ($oblast_reg == 241){ ?>
					center: [45.85472,40.12528],
					<?php } elseif ($oblast_reg == 242){ ?>
					center: [45.03753,37.68911],
					<?php } elseif ($oblast_reg == 243){ ?>
					center: [45.61694,38.94528],
					<?php } elseif ($oblast_reg == 61){ ?>
					center: [47.23135,39.72328],
					<?php } elseif ($oblast_reg == 611){ ?>
					center: [47.1078,39.4165],
					<?php } elseif ($oblast_reg == 612){ ?>
					center: [47.1397,39.7518],
					<?php } elseif ($oblast_reg == 613){ ?>
					center: [47.7091,40.2144],
					<?php } elseif ($oblast_reg == 614){ ?>
					center: [47.2362,38.8969],
					<?php } elseif ($oblast_reg == 26){ ?>
					center: [45.0428,41.9734],
					<?php } elseif ($oblast_reg == 261){ ?>
					center: [43.9133,42.7208],
					<?php } elseif ($oblast_reg == 262){ ?>
					center: [44.0444,42.8606],
					<?php } elseif ($oblast_reg == 263){ ?>
					center: [44.2103,43.1353],
					<?php } elseif ($oblast_reg == 264){ ?>
					center: [44.0486,43.0594],
					<?php } else { ?>
					center: [45.04484,38.97603],
					<?php }?>
					zoom: 14,
				    controls: ['zoomControl', 'searchControl', 'typeSelector',  'fullscreenControl', 'geolocationControl']
				},{
					balloonMaxWidth: 200
					
				});
				myCollection = new ymaps.GeoObjectCollection();
				
				<?php if ($model->declat AND $model->declong) { ?>
				var myPlacemark = new ymaps.Placemark([<?php echo $model->declat;?>,<?php echo $model->declong;?>],{
					iconContent:'комната'
				},{
             // Задаем стиль метки (метка в виде круга).
              preset: 'islands#redStretchyIcon',
             // Задаем цвет метки (в формате RGB).
             // iconColor: 
                });
				myCollection.add(myPlacemark);
				myMap.geoObjects.add(myCollection);
				<?php } ?>

               
				myMap.events.add('click', function (e) {
					if (!myMap.balloon.isOpen()) {
						var coords = e.get('coords');
						crdss(coords[0].toPrecision(6), coords[1].toPrecision(6));
						myCollection.removeAll();
						var myPlacemark = new ymaps.Placemark([coords[0].toPrecision(6),coords[1].toPrecision(6)]);
						myCollection.add(myPlacemark);
						myMap.geoObjects.add(myCollection);
					}
					else {
						myMap.balloon.close();
					}
				});

				myMap.events.add('contextmenu', function (e) {
					myMap.hint.open(e.get('coords'), 'Нажмите левой кнопкой мыши');
				});
				/*
				myMap.events.add('balloonopen', function (e) {
					myMap.hint.close();
				});*/
			   			
			});
			
			$.ajax({
        type: 'POST',
        url: 'nedvigkomnati/update', // урл вставьте свой, этот для примера
        data: {
            declat:declat,
            declong:declong,
            _csrf: '<?=Yii::$app->request->getCsrfToken()?>'
        },
        success: function(rate) {
            alert("test");
        },
        error: function (exception) {
            console.log(exception);
        }
    });
		</script>
	
	&nbsp;<center><a href="javascript:void(0)" onclick="hidethisguys()"><i class="btn btn-default" 
	       style= "margin-left: 5px; margin-top: 8px;" ><i class="fa fa-flag"></i> скрыть карту</i></a></center>
	
	</td>
</tr>
					</table>	
					
        <!-------------------КОНЕЦ КАРТЫ---------------------->

   <table class="table table-hover table-striped">  
    <tr>
    <td valign="top"><input class="shadebox" type="text" name="declat" id="declat" size="15" readonly="1" value="<?php echo $model->declat;?>" /></td>
     
    <td valign="top"><input class="shadebox" type="text" name="declong" id="declong" size="15" readonly="1" value="<?php echo $model->declong;?>" /></td>
  </tr>
	 
    <tr>
          
   <td>    
   <?php
// Parent 
echo $form->field($model, 'oblast')->dropDownList($oblast,['id'=>'id_oblast','prompt' => '-Выберите регион/область-']);
   ?>
</td>

 <td>
<?php
   $id_gorod1 = Goroda::find()->select(['id','name'])->all();
         foreach ($id_gorod1 as $name=>$value){
          $id_gorod=$value;
         $gorod=$name;
       }
   

     
// Child # 1
echo $form->field($model, 'gorod')->widget(DepDrop::classname(), [
   
    'options'=>['id'=>'id_gorod'],
    'pluginOptions'=>[
       
        'depends'=>['id_oblast'],
        'placeholder'=>'-Выберите город-',
        'url'=>Url::to(['/site/gorod'])
    ]
]);
?>
 </td> 
 </tr>
 <tr>
 <td>
<?php
  echo $form->field($model, 'raion')->widget(DepDrop::classname(), [
    'pluginOptions'=>[
        'depends'=>['id_oblast','id_gorod'],
        'placeholder'=>'-Выберите район-',
        'url'=>Url::to(['/site/raion'])
    ]    
]);
//debug($id_oblast)
  ?>
 </td>

        <td><?= $form->field($model, 'adress')->textInput(['maxlength' => true, 'placeholder' => 'обязательное поле']) ?></td>
</tr>
<tr>
        <td> <?= $form->field($model, 'komnat_v_kvartire')->dropDownList( kolichestvokomnat::find()->select(['number','id'])->indexBy('number')->column(),['promt'=>'Select kolichestvokomnat']) ?></td>
 </tr>
    <tr>
	
    <td> <?= $form->field($model, 'etag')->dropDownList( etag::find()->select(['etag','id'])->indexBy('etag')->column(),['promt'=>'Select etag']) ?></td>
	
   <td><?= $form->field($model, 'etagei_v_dome')->dropDownList( etagei::find()->select(['etagei','id'])->indexBy('etagei')->column(),['promt'=>'Select etagei']) ?></td>
   
   </tr>
   <tr>
   
       <td><?= $form->field($model, 'type_doma')->dropDownList( tipdoma::find()->select(['tip','id'])->indexBy('tip')->column(),['promt'=>'Select tip']) ?></td>
           
       <td><?= $form->field($model, 'operaciya')->dropDownList( operaciya::find()->select(['tip','id'])->indexBy('tip')->column(),['promt'=>'Select operaciya']) ?></td>
    </tr>   
    <tr>
        <td><?= $form->field($model, 'plochad')->textInput(['type' => 'number','placeholder' => 'обязательное поле']) ?></td>

        <td><?= $form->field($model, 'price')->textInput(['type' => 'number','placeholder' => 'обязательное поле']) ?></td>
     </tr>
  <tr>
   <td> <?= $form->field($model, 'image')->fileInput() ?></td>
 </tr>  
 <tr>
    <td><?= $form->field($model, 'gallery[]')->fileInput(['multiple'=> true, 'accept'=>'image/*']) ?>&nbsp;&nbsp; можете выбрать сразу несколько файлов</td>
 </tr> 
 <tr>
 <td></table></div></center>
 
  <center> <div id="fff"><table class="table table-hover table-striped"> 
 
 <p style="color:#000;line-height:23px;text-align:center;letter-spacing:2px;font-size:100%;font-weight:bold"><strong><?=$maintit;?></p><br/>

<?php if($model->hit){?>
 <tr><td><label>
<?= $form->field($model, 'hit')->checkbox(['label' => 'Уже <span style="color: blue;">в ИЗБРАННОМ</span>', 'checked ' => true]) ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( <?=$prhit;?> руб. )<small class="ttip">ЧТО ЭТО ?<span><?=$ad1dd;?></span></small>
</label></td></tr> 
 <?php } elseif(!$model->hit) { ?>
<tr><td><label>
<?= $form->field($model, 'hit')->checkbox(['label' => 'Добавить в <span style="color: blue;">ИЗБРАННЫЕ</span> Комнаты']) ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( <?=$prhit;?> руб. )<small class="ttip">ЧТО ЭТО ?<span><?=$ad1dd;?></span></small>
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
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( <?=$prrekom;?> руб. )<small class="ttip">ЧТО ЭТО ?<span><?=$ad4dd;?></span></small>
</label></td></tr>
<?php } elseif (!$model->rekom==1) { ?>
<tr><td><label>
<?= $form->field($model, 'rekom')->checkbox(['label' => 'Добавить в <span style="color: blue;">РЕКОМЕНДУЕМ</span>']) ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( <?=$prrekom;?> руб. )<small class="ttip">ЧТО ЭТО ?<span><?=$ad4dd;?></span></small>
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
 
  <tr><td><?php if ($username=='sarmetradmin'){ ?>
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

