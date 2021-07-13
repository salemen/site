<li>

<?php

$idn = $avtocategory['id'];
if ($idn == 1){
	$tip = 'legkovie-avto';
	}elseif($idn == 2){
		$tip = 'gruzovie-avto';
	}elseif($idn == 3){
		$tip = 'spec-tehnika';
	}elseif($idn == 4){
		$tip = 'moto-technika';
	}elseif($idn == 7){
		$tip = 'aksessuari-avto';
	}elseif($idn == 8){
		$tip = 'hodovaya-chast';
	}elseif($idn == 9){
		$tip = 'dvigatel-transmissiya';
	}elseif($idn == 10){
		$tip = 'kuzov-avto';
	}elseif($idn == 11){
		$tip = 'elektrika-avto';
	}elseif($idn == 12){
		$tip = 'salon-avto';
	}elseif($idn == 13){
		$tip = 'gidkosti-masla-avto';
	}elseif($idn == 14){
		$tip = 'rulevoe-avto';
	}elseif($idn == 6){
		$tip = 'vodnii-tranport';
	}
      
	 ?> 
	  
    <a href = "<?= yii\helpers\Url::to(['avtocategory/view', 'id' => $avtocategory['id'], 'ads' =>$tip])?>">
        <b><?= $avtocategory['name'] ?></b>
        <?php if (isset($avtocategory['childs'])):{ echo '•';} ?>
        <span class="badge pull-right"><i class="fa fa-bars"></i></span>
    </a>  
    <?php endif; ?>
    
    <?php if (isset($avtocategory['childs'])): ?>
    <ul>
    
         <br> <?= $this->getMenuavtoHtml($avtocategory['childs'], $tab .'• ');  ?>
    </ul>
    <?php endif; ?>
    <br>
    
</li>
