<?php

  $this->title = 'SaleMen оплата';
  $this->params['breadcrumbs'][] = $this->title;
 
  

  


  print "<hr><center><b style='color:red;'> Сумма Вашей помощи на развите сайта $out_summ руб.</br></br><script language=JavaScript ".
      "src='https://auth.robokassa.ru/Merchant/PaymentForm/FormV.js?".
      "MrchLogin=$mrh_login&OutSum=$out_summ&InvId=$inv_id".
      "&SignatureValue=$crc&Shp_item=$shp_item&Shp_id=$id_id".
      "&Shp_pricehit=$price_hit&Shp_pricesale=$price_sale&Shp_pricenew=$price_new&Shp_username=$username'></script></center><hr>";
  

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
          


