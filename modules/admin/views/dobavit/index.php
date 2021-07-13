<?php


use app\assets\AppAsset;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
AppAsset::register($this);
$this->title = 'Добавить объявление';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>

    small.ttip {
	       display:inline-block;
	       margin-left:5px;
	       border-bottom:2px dashed #0000FF;
	       color:#f54a0c;
	       position:relative;
	      }
		
	small.ttip:hover {
			cursor:pointer;
			}
			
	small.ttip span {
			display:none;
			}
			
	small.ttip:hover span {
			display:block;
			z-index:2;
			border:1px solid #AA1428;
			border-radius: 8px;
			color:#000;
			position:absolute;
			width:330px;
			top:-50px;
			left:-40px;
			background-color:#FCFBDC;
			padding:5px;
			}

</style>
<?php
$text11 ='Для добавления объявления на сайт выберите для начала нужную Вам категорию, их всего три НЕДВИЖИМОСТЬ, АВТОТЕХНИКА и ДРУГИЕ ОБЪЯВЛЕНИЯ.<br>
 Потом выберите подраздел, дальше заполните форму объявления. Все максимально просто.<br>
		</br>Также мы <b>настоятельно рекомендуем заполнить</b> <a href="/admin/user/index" style ="color: red"<font face="comic sans ms" color="red">ВАШ ПРОФИЛЬ</font></a>
		полностью (кнопка на верху). Данные о Вас или Вашей компании из Вашего профиля смогут увидеть посетители сайта на страничке Вашего объявления.
		Ваш профиль будет виден ТОЛЬКО на странице Вашего объявления.</br> Размещение ссылок на сторонние ресурсы или сайты а также фото с QR кодом запрещены.<br>Так же запрещены ЛЮБЫЕ материалы 18+.
		<strong><font color="blue">АБСАЛЮТНО ВСЕ объявления проходят модерацию, объявления и(или) профили не соответсвующие или нарушающие законодательство РФ и(или) содержащие материалы 18+,</font> <br><font color="red">удаляются БЕЗ ПРЕДУПРЕЖДЕНИЯ.</font></strong>'
?>
<div>
    <br>
    
                               <center>
                                   <font face="comic sans ms" >Выберите нужную категорию для объявления</font>
                               </center>
     
       
          <center>
                 <a href="<?= Url::to(['dobavit/viborauto']) ?>" class="btn btn-success"><font face="comic sans ms" ><i class="fa fa-truck"></i> АвтоТехника и Автозапчасти</font></a>                       
                 <a href="<?= Url::to(['dobavit/viborned']) ?>" class="btn btn-primary"><font face="comic sans ms" ><i class="fa fa-hospital-o"></i> Недвижимость</font></a> 
               
                 <a href="<?= Url::to(['product/create']) ?>" class="btn btn-warning"><font face="comic sans ms" ><i class="fa fa-pencil"></i> Другие Объявления</font></a> 
              </center>
    
   
	<br>
	<center><div class="col-sm-12">
                                    
		<h4><small class="ttip"><i class="fa fa-exclamation-triangle"></i> Правила размещения объявлений <i class="fa fa-exclamation-triangle"></i><span><?=$text11;?></span></small></h4>
		<h4><font face="cursive"><span style="color:#FF7F50">Сайт <span style="color:blue">Бесплатных</span> Объявлений</span><br></h4>
		                 <h2><span style="color:blue">Sale</span><span style="color:#FF7F50">Men</span></font></h2>	
		
								</div>
							</center>
	
<br>

</div>

