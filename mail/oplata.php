<table class="table table-hover table-striped">

<?php 
$id = $_GET[id];

echo 'Оплата от ' . $username . ', id объявления ' . $id_id . '. Сумма оплаты ' . $out_summ . ' рублей, в разделе ' . $shp_item .   
      '. Оплаченные опции:  Главная страница ' . $price_hit . ', SALE ' . $price_sale . ', NEW ' . $price_new . ', Рекомендуем ' . $price_rekom . ', Выделить ' . $price_videl. ', Верх магазин ' . $price_verh;
 ?>
 
</table>