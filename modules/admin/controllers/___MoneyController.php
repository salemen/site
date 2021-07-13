<?php

  /*
   * To change this license header, choose License Headers in Project Properties.
   * To change this template file, choose Tools | Templates
   * and open the template in the editor.
   */

  namespace app\controllers;
  use app\controllers\AppController;
  use app\models\Money;
  use Yii;
  use app\modules\admin\models\Product;
  
  
  class MoneyController extends AppController {
     
     
     public function actionOplata(){
     $oplata = (int)Yii::$app->request->get('oplata');
     $model = new Money;
     $model->summa = $oplata;
     $model->result = 0;
     
      if($model->save()){ 
         // регистрационная информация (логин, пароль #1)
// registration info (login, password #1)
$mrh_login = "SaleMen";
$mrh_pass1 = "JST0S8I3mXT3j9tqspxD";

// номер заказа
// number of order
$inv_id = $model->id;

// описание заказа
// order description
$inv_desc = "На развитие сайта";

// сумма заказа
// sum of order
$out_summ = $oplata;

// тип товара
// code of goods
$shp_item = "На развитие сайта";

// предлагаемая валюта платежа
// default payment e-currency
$in_curr = "";

// язык
// language
$culture = "ru";

// формирование подписи
// generate signature
$crc  = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:Shp_item=$shp_item");

return $this->render('oplata', compact('mrh_login','mrh_pass1','inv_id','inv_desc','out_summ','shp_item','in_curr','culture','crc'));
      }      
     }
     
     
     
    public function actionResult(){
       
       // регистрационная информация (пароль #2)
// registration info (password #2)
$mrh_pass2 = "mg5zX2Umn73JUpXlvR1G";

//установка текущего времени
//current date
$tm=getdate(time()+9*3600);
$date="$tm[year]-$tm[mon]-$tm[mday] $tm[hours]:$tm[minutes]:$tm[seconds]";

// чтение параметров
// read parameters
$out_summ = Yii::$app->request->get('OutSum');
$inv_id = Yii::$app->request->get('InvId');
$shp_item = Yii::$app->request->get('Shp_item');
$crc = Yii::$app->request->get('SignatureValue');

$crc = strtoupper($crc);

$my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass2:Shp_item=$shp_item"));

// проверка корректности подписи
// check signature
if ($my_crc !=$crc)
{
 Yii::$app->session->setFlash('error',"Увы оплата не прошла");
 return $this->goHome();
}

// признак успешно проведенной операции
// success
$model = Product::findOne($id);
$model->new = 1;
$model->save();
return $this->goHome();

    }
    
    public function actionSuccess(){
       
       // регистрационная информация (пароль #1)
// registration info (password #1)
$mrh_pass1 = "JST0S8I3mXT3j9tqspxD";

// чтение параметров
// read parameters
$out_summ = Yii::$app->request->get('OutSum');
$inv_id = Yii::$app->request->get('InvId');
$shp_item = Yii::$app->request->get('Shp_item');
$crc = Yii::$app->request->get('SignatureValue');
$tabl = Yii::$app->request->get('tabl');

$crc = strtoupper($crc);

$my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass1:Shp_item=$shp_item"));

// проверка корректности подписи
// check signature
if ($my_crc != $crc)
{
 Yii::$app->session->setFlash('error',"Увы оплата не прошла");
 return $this->goHome();
}

// проверка наличия номера счета в истории операций
// check of number of the order info in history of operations
if ($tabl == 1){
	$model = Product::findOne($inv_id);
	$model->sale = 1;
	$model->save();
	return $this->goHome();
}
$model = Money::findOne($inv_id);
$model->result = 1;
$model->save();
return $this->goHome();
       
    }
    
    
    public function actionFail(){
       
      $inv_id = Yii::$app->request->get('InvId');
$model = Money::findOne($inv_id);
$model->result = 2;
$model->save();
Yii::$app->session->setFlash('ihfo',"Вы отказались от оплаты :(");
return $this->goHome();
       
    }
 
 
     }
  