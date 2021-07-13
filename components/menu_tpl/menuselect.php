<select id="product-category_id" class="form-control" name="Product[category_id]" >
     
	  <?php

		$tdom = 'doma-cottage';
		$tkva = 'vse-kvartiri';
		$tkom = 'komnati';
		$tkomm = 'vsy-kommercheskaya';
		$tucha = 'vse-uchastki';
		$tgarag = 'garagi';
		$tbiznes = 'gotovi-biznes';
		
		$aleg = 'legkovie-avto';
		$agruz = 'gruzovie-avto';
		$aspec = 'spec-tehnika';
		$amoto = 'moto-technika';
		$akompl = 'komplekt-avto';
		$avod = 'vodnii-tranport';
	
	      $s = $category['name'];						
		  $s = (string) $s; // преобразуем в строковое значение
		  $s = strip_tags($s); // убираем HTML-теги
		  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
		  $s = trim($s); // убираем пробелы в начале и конце строки
		  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
		  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
		  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
		  $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
	?>
	 
	 
    <li> <?php
    $idn = $category[id];
	if ($idn == 186) {?> 
	    <a href = "<?= yii\helpers\Url::to(['nedvigcategory/8', 'ads' =>$tkva])?>">
		<b> Квартиры </b>
	<?php } elseif ($idn == 187) { ?>
	 <a href = "<?= yii\helpers\Url::to(['nedvigcategory/2', 'ads' =>$tdom])?>">
		<b> Дома/Коттеджи/Дачи  </b>
		<?php } elseif ($idn == 188) { ?>
	 <a href = "<?= yii\helpers\Url::to(['nedvigcategory/3', 'ads' =>$tkom])?>">
		<b> Комнаты  </b>
		<?php } elseif ($idn == 189) { ?>
	 <a href = "<?= yii\helpers\Url::to(['nedvigcategory/19', 'ads' =>$tkomm])?>">
		<b> Коммерческая  </b>
		<?php } elseif ($idn == 190) { ?>
	 <a href = "<?= yii\helpers\Url::to(['nedvigcategory/14', 'ads' =>$tucha])?>">
		<b> Земельные участки   </b>
		<?php } elseif ($idn == 191) { ?>
	 <a href = "<?= yii\helpers\Url::to(['nedvigcategory/6', 'ads' =>$tgarag])?>">
		<b> Гаражи   </b>
		<?php } elseif ($idn == 192) { ?>
	 <a href = "<?= yii\helpers\Url::to(['nedvigcategory/7', 'ads' =>$tbiznes])?>">
		<b> Готовый бизнес   </b>
		<?php } elseif ($idn == 180) { ?>
	 <a href = "<?= yii\helpers\Url::to(['avtocategory/1', 'ads' =>$aleg])?>">
		<b> Легковые авто  </b>
		<?php } elseif ($idn == 181) { ?>
	 <a href = "<?= yii\helpers\Url::to(['avtocategory/2', 'ads' =>$agruz])?>">
		<b> Грузовые//Автобусы </b>
		<?php } elseif ($idn == 182) { ?>
	 <a href = "<?= yii\helpers\Url::to(['avtocategory/3', 'ads' =>$aspec])?>">
		<b> Спецтехника  </b>
		<?php } elseif ($idn == 183) { ?>
	 <a href = "<?= yii\helpers\Url::to(['avtocategory/4', 'ads' =>$amoto])?>">
		<b> Мототехника </b>
		<?php } elseif ($idn == 184) { ?>
	 <a href = "<?= yii\helpers\Url::to(['avtocategory/5', 'ads' =>$akompl])?>">
		<b> Комплектующие для авто</b>
		<?php } elseif ($idn == 185) { ?>
	 <a href = "<?= yii\helpers\Url::to(['avtocategory/6', 'ads' =>$avod])?>">
		<b> Водный транспорт </b>
		<?php } else { ?>
    <a href = "<?= yii\helpers\Url::to(['category/'.$category['id'], 'ads' =>$s])?>">
        
      <b><?= $category['name'] ?></b>
        
        <?php if (isset($category['childs'])):{ echo '•';} ?>
        
        <span class="badge pull-right"><i class="fa fa-bars"></i></span>
    </a>    
		<?php  endif; ?>
	 <?php } ?>
    <?php if (isset($category['childs'])): { ?>

   <ul>
       <br> <?= $this->getMenuHtml($category['childs'], $tab .'• '); ?> 
    </ul>
    <?php } endif; ?>
      <br>  
    </li>
	</select>