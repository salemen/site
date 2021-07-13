<?php

  $this->title = 'SaleMen оплата';
  $this->params['breadcrumbs'][] = $this->title;
 
       
 
  
  print "<hr><center><b style='color:red;'>Общая стоимость опций для Вашего объявления $out_summ руб.</br></br><script language=JavaScript ".
      "src='https://auth.robokassa.ru/Merchant/PaymentForm/FormV.js?".
      "MrchLogin=$mrh_login&OutSum=$out_summ&InvId=$inv_id&IncCurrLabel=$in_curr".
      "&Desc=$inv_desc&SignatureValue=$crc&Shp_item=$shp_item&Shp_id=$id_id&Shp_pricehit=$price_hit&Shp_pricenew=$price_new&Shp_pricerekom=$price_rekom&Shp_pricesale=$price_sale&Shp_priceverh=$price_verh&Shp_pricevidel=$price_videl&Shp_username=$username".
      "&Culture=$culture&Encoding=$encoding'></script></html>";
  
 
    
	// форма оплаты товара

 /*  print
   "<html>".
   "<form action='https://auth.robokassa.ru/Merchant/Index.aspx' method=GET>".
   "<input type=hidden name=MerchantLogin value=$mrh_login>".
   "<input type=hidden name=OutSum value=$out_summ>".
   "<input type=hidden name=InvId value=$inv_id>".
   "<input type=hidden name=Shp_id value=$id_id>".
   "<input type=hidden name=Shp_item value='$shp_item'>".
    "<input type=hidden name=Shp_pricehit value=$price_hit>".  
   "<input type=hidden name=Shp_pricenew value=$price_new>".
   "<input type=hidden name=Shp_pricesale value=$price_sale>".  
   "<input type=hidden name=Shp_username value=$username>".
   "<input type=hidden name=SignatureValue value=$crc>".
  
   "<input type=submit value='Оплатить'>".
   "</form></html>"; */
  

  /* print "<html>".
      "<form action='https://merchant.roboxchange.com/Index.aspx' method=POST>".
      "<input type=hidden name=MrchLogin value=$mrh_login>".
      "<input type=hidden name=OutSum value=$out_summ>".
      "<input type=hidden name=InvId value=$inv_id>".
      "<input type=hidden name=Desc value='$inv_desc'>".
      "<input type=hidden name=SignatureValue value=$crc>".
      "<input type=hidden name=Shp_item value='$shp_item'>".
      "<input type=hidden name=IncCurrLabel value=$in_curr>".
      "<input type=hidden name=Culture value=$culture>".
      "<input class='pay' type=submit value='Оплатить'>".
      "</form></html>"; */
?>
          


