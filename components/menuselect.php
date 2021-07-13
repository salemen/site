
     
    <li>  <?php
    $idn = $category[id];
	if ($idn == 186) {?> 
	    <a href = "<?= yii\helpers\Url::to(['nedvigcategory/view', 'id' => 1])?>">
		<b> квартира </b>
	<?php } elseif ($idn == 187) { ?>
	 <a href = "<?= yii\helpers\Url::to(['nedvigcategory/view', 'id' => 2])?>">
		<b> Дома/Коттеджи/Дачи  </b>
		<?php } elseif ($idn == 188) { ?>
	 <a href = "<?= yii\helpers\Url::to(['nedvigcategory/view', 'id' => 3])?>">
		<b> Комнаты  </b>
		<?php } elseif ($idn == 189) { ?>
	 <a href = "<?= yii\helpers\Url::to(['nedvigcategory/view', 'id' => 4])?>">
		<b> Коммерческая  </b>
		<?php } elseif ($idn == 190) { ?>
	 <a href = "<?= yii\helpers\Url::to(['nedvigcategory/view', 'id' => 5])?>">
		<b> Земельные участки   </b>
		<?php } elseif ($idn == 191) { ?>
	 <a href = "<?= yii\helpers\Url::to(['nedvigcategory/view', 'id' => 6])?>">
		<b> Гаражи   </b>
		<?php } elseif ($idn == 192) { ?>
	 <a href = "<?= yii\helpers\Url::to(['nedvigcategory/view', 'id' => 7])?>">
		<b> Готовый бизнес   </b>
		<?php } elseif ($idn == 180) { ?>
	 <a href = "<?= yii\helpers\Url::to(['avtocategory/view', 'id' => 1])?>">
		<b> Легковые авто  </b>
		<?php } elseif ($idn == 181) { ?>
	 <a href = "<?= yii\helpers\Url::to(['avtocategory/view', 'id' => 2])?>">
		<b> Грузовые//Автобусы </b>
		<?php } elseif ($idn == 182) { ?>
	 <a href = "<?= yii\helpers\Url::to(['avtocategory/view', 'id' => 3])?>">
		<b> Спецтехника  </b>
		<?php } elseif ($idn == 183) { ?>
	 <a href = "<?= yii\helpers\Url::to(['avtocategory/view', 'id' => 4])?>">
		<b> Мототехника </b>
		<?php } elseif ($idn == 184) { ?>
	 <a href = "<?= yii\helpers\Url::to(['avtocategory/view', 'id' => 5])?>">
		<b> Комплектующие для авто</b>
		<?php } elseif ($idn == 185) { ?>
	 <a href = "<?= yii\helpers\Url::to(['avtocategory/view', 'id' => 6])?>">
		<b> Водный транспорт </b>
		<?php } else { ?>
    <a href = "<?= yii\helpers\Url::to(['category/view', 'id' => $category['id']])?>">
        <option value="0">Выбор категории</option>
      <option  value= "<?php echo $category['name']?>">Детская</option>
        
        <?php if (isset($category['childs'])):{ echo '•';} ?>
        
        <span class="badge pull-right"><i class="fa fa-bars"></i></span>
    </a>    
		<?php  endif; ?>
	 <?php } ?>
    <?php if (isset($category['childs'])): { ?>

   <ul>
        <option  value= "<?= $this->getMenuHtml($category['childs'], $tab .'• '); ?>">подкат</option> 
    </ul>
    <?php } endif; ?>
      <br>  
    </li>
	