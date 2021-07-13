<style>
.category-products ul {
    padding-left: 20px;
}
</style>

<li>
    
     
    <?php
	 $idn = $nedvigcategory[id];
	
	if ($idn == 2){
		$tip = 'doma-cottage';
	}elseif($idn == 8){
		$tip = 'vse-kvartiri';
	}elseif($idn == 3){
		$tip = 'komnati';
	}elseif($idn == 11){
		$tip = '1-komnatnaya-novostroika';
	}elseif($idn == 12){
		$tip = '2-komnatnaya-novostroika';
	}elseif($idn == 13){
		$tip = '3-komnatnaya-novostroika';
	}elseif($idn == 28){
		$tip = '1-komnatnaya-vtorichka';
	}elseif($idn == 29){
		$tip = '2-komnatnaya-vtorichka';
	}elseif($idn == 30){
		$tip = '3-komnatnaya-vtorichka';
	}elseif($idn == 19){
		$tip = 'vsy-kommercheskaya';
	}elseif($idn == 20){
		$tip = 'ofis';
	}elseif($idn == 21){
		$tip = 'torgovoe-pomechenie';
	}elseif($idn == 23){
		$tip = 'gostinica';
	}elseif($idn == 24){
		$tip = 'sklad';
	}elseif($idn == 25){
		$tip = 'proisvodstvo';
	}elseif($idn == 26){
		$tip = 'garagi-tip';
	}elseif($idn == 14){
		$tip = 'vse-uchastki';
	}elseif($idn == 15){
		$tip = 'uchastki-igs';
	}elseif($idn == 16){
		$tip = 'uchastki-prom';
	}elseif($idn == 17){
		$tip = 'uchastki-selhoz';
	}elseif($idn == 18){
		$tip = 'uchastki-dacha-snt';
	}elseif($idn == 6){
		$tip = 'garagi';
	}elseif($idn == 7){
		$tip = 'gotovi-biznes';
	}
   
	if ($idn == 1) {?> 
	    <a style = "cursor: pointer"><strong>Квартиры</strong><span class="badge pull-right"><i class="fa fa-bars"></i></span></a>
		
	<?php } elseif ($idn == 4) { ?>
	 <a style = "cursor: pointer"><strong>Коммерческая</strong><span class="badge pull-right"><i class="fa fa-bars"></i></span></a>
	
		<?php } elseif ($idn == 5) { ?>
	 <a style = "cursor: pointer"><strong>Земельные участки</strong><span class="badge pull-right"><i class="fa fa-bars"></i></span></a>
		
		<?php } elseif ($idn == 9) { ?>
	 <a style = "cursor: pointer"><strong>Новостройки</strong><span class="badge pull-right"><i class="fa fa-bars"></i></span></a>
		
		<?php } elseif ($idn == 10) { ?>
	 <a style = "cursor: pointer"><strong>Вторичка</strong><span class="badge pull-right"><i class="fa fa-bars"></i></span></a>

	<? } else { ?> 
    <a href = "<?= yii\helpers\Url::to(['nedvigcategory/'.$nedvigcategory['id'], 'ads' =>$tip ,])?>">
        <b><?= $nedvigcategory['name'] ?></b>
		
        <?php if (isset($nedvigcategory['childs'])):{ echo '•';} ?>
        <span class="badge pull-right"><i class="fa fa-bars"></i></span>
    </a>  
    <?php endif; ?>
     <?php } ?>
    <?php if (isset($nedvigcategory['childs'])): ?>
    <ul>
    
        <br><?= $this->getMenunedHtml($nedvigcategory['childs']);  ?><br>
    </ul>
    <?php endif; ?>
    
    
</li>
