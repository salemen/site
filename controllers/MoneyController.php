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
  use app\modules\admin\models\NedvigKvartiri;
  use app\modules\admin\models\NedvigDoma;
  use app\modules\admin\models\NedvigKomnati;
  use app\modules\admin\models\NedvigKommercheska;
  use app\modules\admin\models\NedvigZemli;
  use app\modules\admin\models\NedvigGaragi;
  use app\modules\admin\models\Nedvigbiznes;
  use app\modules\admin\models\Avtoleg;
  use app\modules\admin\models\Avtogruz;
  use app\modules\admin\models\Avtospec;
  use app\modules\admin\models\Avtomoto;
  use app\modules\admin\models\Avtokomplekt;
  use app\modules\admin\models\Avtovodnik;
  
  
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
$mrh_pass1 = "wZ413srIGd0tPntbg8PD";

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
          $mrh_pass2 = "SEM7Hf2aR1muYEcHD00O";

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
		$id_id = Yii::$app->request->get('Shp_id');
		$username = Yii::$app->request->get('Shp_username');
		$price_hit = Yii::$app->request->get('Shp_pricehit');
		$price_sale = Yii::$app->request->get('Shp_pricesale');
		$price_new = Yii::$app->request->get('Shp_pricenew');
		$price_rekom = Yii::$app->request->get('Shp_pricerekom');
		$price_videl = Yii::$app->request->get('Shp_pricevidel');
		$price_verh = Yii::$app->request->get('Shp_priceverh');

        
		$crc = strtoupper($crc);

		$my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass2:Shp_id=$id_id:Shp_item=$shp_item:Shp_pricehit=$price_hit:Shp_pricenew=$price_new:Shp_pricerekom=$price_rekom:Shp_pricesale=$price_sale:Shp_priceverh=$price_verh:Shp_pricevidel=$price_videl:Shp_username=$username"));

		// проверка корректности подписи
		// check signature
		if ($my_crc !=$crc)
		{
		 Yii::$app->session->setFlash('error',"Увы оплата не прошла");
			return $this->redirect('/admin');
		}

        // признак успешно проведенной операции

		if ($shp_item == 1){
			$model = Product::find()->where(['id'=>$id_id])->one();
		}
		if ($shp_item == 2){
			$model = Nedvigkvartiri::find()->where(['id'=>$id_id])->one();
		}
		if ($shp_item == 3){
			$model = Nedvigdoma::find()->where(['id'=>$id_id])->one();
		}
		if ($shp_item == 4){
			$model = Nedvigkomnati::find()->where(['id'=>$id_id])->one();
		}
		if ($shp_item == 5){
			$model = Nedvigkommercheska::find()->where(['id'=>$id_id])->one();
		}
		if ($shp_item == 6){
			$model = Nedvigzemli::find()->where(['id'=>$id_id])->one();
		}
		if ($shp_item == 7){
			$model = Nedviggaragi::find()->where(['id'=>$id_id])->one();
		}
		if ($shp_item == 8){
			$model = Nedvigbiznes::find()->where(['id'=>$id_id])->one();
		}
		if ($shp_item == 9){
			$model = Avtoleg::find()->where(['id'=>$id_id])->one();
		}
		if ($shp_item == 10){
			$model = Avtogruz::find()->where(['id'=>$id_id])->one();
		}
		if ($shp_item == 11){
			$model = Avtospec::find()->where(['id'=>$id_id])->one();
		}
		if ($shp_item == 12){
			$model = Avtomoto::find()->where(['id'=>$id_id])->one();
		}
		if ($shp_item == 13){
			$model = Avtokomplekt::find()->where(['id'=>$id_id])->one();
		}
		if ($shp_item == 14){
			$model = Avtovodnik::find()->where(['id'=>$id_id])->one();
		}
		
		
		
		$enddate = date("Y-m-d H:i:s", strtotime("+7 day"));
		
        if(!empty($price_verh)){
		   $model->verh = '1';
           $model->verhok = '1';		   
		   $model->verhdate = $enddate;
		   
		}
		
		if(!empty($price_hit)){
		   $model->hit = '1';
           $model->hitok = '1';		   
		   $model->hitdate = $enddate;
		   
		}
		if(!empty($price_sale)){
		   $model->sale = '1';	
		   $model->saleok = '1';
		   $model->saledate = $enddate;
		   
		}
		if(!empty($price_new)){
		   $model->new = '1';
		   $model->newok = '1';
		   $model->newdate = $enddate;	
           	   
		}
		
		if(!empty($price_rekom)){
		   $model->rekom = '1';
           $model->rekomok = '1';		   
		   $model->rekomdate = $enddate;
		   
		}
		
		if(!empty($price_videl)){
		   $model->videl = '1';
           $model->videlok = '1';		   
		   $model->videldate = $enddate;
		   
		}
		
		$model->save();
		
		Yii::$app->session->setFlash('success',"<center>Оплата прошла успешно, доп.опции применены</center>");
		return $this->redirect('/admin');
		
	

    }
    
  public function actionSuccess(){
       
       
		// регистрационная информация (пароль #1)
		$mrh_pass1 = "wZ413srIGd0tPntbg8PD";
	 

		// чтение параметров
		// read parameters
		$out_summ = Yii::$app->request->get('OutSum');
		$inv_id = Yii::$app->request->get('InvId');
		$shp_item = Yii::$app->request->get('Shp_item');
		$crc = Yii::$app->request->get('SignatureValue');
		$id_id = Yii::$app->request->get('Shp_id');
		$username = Yii::$app->request->get('Shp_username');
		$price_hit = Yii::$app->request->get('Shp_pricehit');
		$price_sale = Yii::$app->request->get('Shp_pricesale');
		$price_new = Yii::$app->request->get('Shp_pricenew'); 
        $price_rekom = Yii::$app->request->get('Shp_pricerekom');
		$price_videl = Yii::$app->request->get('Shp_pricevidel');
		$price_verh = Yii::$app->request->get('Shp_priceverh');


		$crc = strtoupper($crc);

		$my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass1:Shp_id=$id_id:Shp_item=$shp_item:Shp_pricehit=$price_hit:Shp_pricenew=$price_new:Shp_pricerekom=$price_rekom:Shp_pricesale=$price_sale:Shp_priceverh=$price_verh:Shp_pricevidel=$price_videl:Shp_username=$username"));

		// проверка корректности подписи

		if ($my_crc != $crc)
		{
		 Yii::$app->session->setFlash('error',"Увы оплата не прошла");
		 return $this->redirect('/admin');
		 //return $this->goHome();
		}

		// Если оплата пришла в МАГАЗИНЕ то....

        // признак успешно проведенной операции

		if ($shp_item == 1){
			$model = Product::find()->where(['id'=>$id_id])->one();
		}
		if ($shp_item == 2){
			$model = Nedvigkvartiri::find()->where(['id'=>$id_id])->one();
		}
		if ($shp_item == 3){
			$model = Nedvigdoma::find()->where(['id'=>$id_id])->one();
		}
		if ($shp_item == 4){
			$model = Nedvigkomnati::find()->where(['id'=>$id_id])->one();
		}
		if ($shp_item == 5){
			$model = Nedvigkommercheska::find()->where(['id'=>$id_id])->one();
		}
		if ($shp_item == 6){
			$model = Nedvigzemli::find()->where(['id'=>$id_id])->one();
		}
		if ($shp_item == 7){
			$model = Nedviggaragi::find()->where(['id'=>$id_id])->one();
		}
		if ($shp_item == 8){
			$model = Nedvigbiznes::find()->where(['id'=>$id_id])->one();
		}
		if ($shp_item == 9){
			$model = Avtoleg::find()->where(['id'=>$id_id])->one();
		}
		if ($shp_item == 10){
			$model = Avtogruz::find()->where(['id'=>$id_id])->one();
		}
		if ($shp_item == 11){
			$model = Avtospec::find()->where(['id'=>$id_id])->one();
		}
		if ($shp_item == 12){
			$model = Avtomoto::find()->where(['id'=>$id_id])->one();
		}
		if ($shp_item == 13){
			$model = Avtokomplekt::find()->where(['id'=>$id_id])->one();
		}
		if ($shp_item == 14){
			$model = Avtovodnik::find()->where(['id'=>$id_id])->one();
		}
		
		$enddate = date("Y-m-d H:i:s", strtotime("+7 day"));		
		 
		 if(!empty($price_verh)){
		   $model->verh = '1';
           $model->verhok = '1';		   
		   $model->verhdate = $enddate;
		   
		}
				
		if(!empty($price_hit)){
		   $model->hit = '1';
           $model->hitok = '1';		   
		   $model->hitdate = $enddate;
		   
		}
		if(!empty($price_sale)){
		   $model->sale = '1';	
		   $model->saleok = '1';
		   $model->saledate = $enddate;
		   
		}
		if(!empty($price_new)){
		   $model->new = '1';
		   $model->newok = '1';
		   $model->newdate = $enddate;	
           	   
		}
		
		if(!empty($price_rekom)){
		   $model->rekom = '1';
           $model->rekomok = '1';		   
		   $model->rekomdate = $enddate;
		   
		}
		if(!empty($price_videl)){
		   $model->videl = '1';
           $model->videlok = '1';		   
		   $model->videldate = $enddate;
		   
		}
		
		$model->save();
		Yii::$app->mailer->compose('oplata', ['username' => $username ,'out_summ' => $out_summ , 'shp_item' => $shp_item, 'id_id' => $id_id, 'price_hit' => $price_hit, 'price_sale' => $price_sale, 'price_new' => $price_new, 'price_rekom' => $price_rekom, 'price_videl' => $price_videl, 'price_verh' => $price_verh] )
		->setFrom (['rim-79@bk.ru'=>'Оплата на сайте'])-> setTo('info@salemen.ru')-> setSubject('Пришла ОПЛАТА с SaleMen' )->send ();
		Yii::$app->session->setFlash('success',"<center>Оплата прошла успешно, дополнительные опции применены</center>");
		return $this->redirect('/admin');
		
	
			
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
  