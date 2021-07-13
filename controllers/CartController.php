<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;
use app\models\Category;
use app\models\Cart;
use app\models\Cartavto;
use app\models\Cartgruz;
use app\models\Cartspec;
use app\models\Cartmoto;
use app\models\Cartkompl;
use app\models\Cartvoda;
use app\models\Cartkvart;
use app\models\Cartdoma;
use app\models\Cartkomnati;
use app\models\Cartkommer;
use app\models\Cartzemli;
use app\models\Cartgaragi;
use app\models\Cartbiznes;
use app\models\Order;
use app\models\OrderItems;
use app\models\Product;
use app\models\Avtocategory;
use app\models\Avtoleg;
use app\models\Avtogruz;
use app\models\Avtospec;
use app\models\Avtomoto;
use app\models\Avtokomplekt;
use app\models\Avtovodnik;
use app\models\NedvigKvartiri;
use app\models\NedvigDoma;
use app\models\NedvigKomnati;
use app\models\NedvigKommercheska;
use app\models\NedvigZemli;
use app\models\NedvigGaragi;
use app\models\NedvigBiznes;
use app\models\Izbrannoe;
use app\models\Message;
use kartik\select2\Select2; // or kartik\select2\Select2
use yii\web\JsExpression;

use Yii;

class CartController extends AppController {
   
  
  public function actionShowSearchkvart(){
    if (!Yii::$app->request->isAjax){
        return $this->redirect(Yii::$app->request->referrer);
    }
    $this-> layout = false;
    return $this->render('cart-modal');
          
    }
  
    public function actionCityList($q = null, $id = null) {
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
	$out = ['results' => ['id' => '', 'text' => '']];
	if (!is_null($q)) {
        $query = new Query;
        $query = Category::find()->select('id, name AS text')
            ->where(['Like', 'keywords', $q])->andWhere(['not in', 'id', [1,2,3,4,5,6,7,8,11,63,19,20,21,22,23,24,28,31,55,56,60,86,87,24,29,30,36,65,178,179,210]])
            ->limit(20);
			//$query->text = $query->name;
        $command = $query->createCommand();
        $data = $command->queryAll();
        $out['results'] = array_values($data);
    }
    elseif ($id > 0) {
        $out['results'] = ['id' => $id, 'text' => Category::find($id)->select('name')->all()];
    }
    return $out;
}


   public function actionAvtoList($q = null, $id = null) {
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		$out = ['results' => ['id' => '', 'text' => '']];
		if (!is_null($q)) {
			$query = new Query;
			$query = avtocategory::find()->select('id, name AS text')
				->where(['Like', 'keywords', $q])->andWhere(['not in', 'id', [1,2,3,4,5,6]])
				->limit(20);
				//$query->text = $query->name;
			$command = $query->createCommand();
			$data = $command->queryAll();
			$out['results'] = array_values($data);
    }
    elseif ($id > 0) {
        $out['results'] = ['id' => $id, 'text' => avtocategory::find($id)->select('name')->all()];
    }
    return $out;
}
	

     public function actionGruzmessage(){
        
		$username = Yii::$app->user->identity['username'];
		$id = $_GET['id'];
		$komment1 = $_GET['komment'];
		$komment = \yii\helpers\HtmlPurifier::process($komment1);
		$telephone = $_GET['telephone'];
		$name = $_GET['tipp'];
		$loginin = $_GET['loginin'];
		$avtogruz = Avtogruz::findOne($id);
		
		if (!Yii::$app->user->isGuest&&$komment) {
			
			 $model = new message();
			
			 $model->loginmoy = "$username";
			 $model->loginin = "$loginin";	
             $model->telephone = "$telephone";			 
			 $model->img = "$img";
			 $model->name = "$name";
             $model->textmoy = "$komment";
             $model->link = "/avtogruz/view?id=$id";		 
              $model->save();  	  			 
		 }
		if(!empty($komment)){
		Yii::$app->session->setFlash('success22', "<center> Сообщение отправлено </center>");}
		else {Yii::$app->session->setFlash('success22', "<center> Сообщение не отправлено.<br>Заполните поле ТЕКСТ СООБЩЕНИЯ. </center>");}
		if (!Yii::$app->request->isAjax){
			return $this->redirect(Yii::$app->request->referrer);
		}
	}
	
	
	 public function actionAvtovodamessage(){
        
		$username = Yii::$app->user->identity['username'];
		$id = $_GET['id'];
		$komment1 = $_GET['komment'];
		$komment = \yii\helpers\HtmlPurifier::process($komment1);
		$telephone = $_GET['telephone'];
		$name = $_GET['tipp'];
		$loginin = $_GET['loginin'];
		
		if (!Yii::$app->user->isGuest&&$komment) {
			
			 $model = new message();
			
			 $model->loginmoy = "$username";
			 $model->loginin = "$loginin";	
             $model->telephone = "$telephone";			 
			 $model->img = "$img";
			 $model->name = "$name";
             $model->textmoy = "$komment";
             $model->link = "/avtovodnik/view?id=$id";		 
              $model->save();  	  			 
		 }
		if(!empty($komment)){
		Yii::$app->session->setFlash('success22', "<center> Сообщение отправлено </center>");}
		else {Yii::$app->session->setFlash('success22', "<center> Сообщение не отправлено.<br>Заполните поле ТЕКСТ СООБЩЕНИЯ. </center>");}
		if (!Yii::$app->request->isAjax){
			return $this->redirect(Yii::$app->request->referrer);
		}
	}
	
	
	public function actionAvtospecmessage(){
        
		$username = Yii::$app->user->identity['username'];
		$id = $_GET['id'];
		$komment1 = $_GET['komment'];
		$komment = \yii\helpers\HtmlPurifier::process($komment1);
		$telephone = $_GET['telephone'];
		$name = $_GET['tipp'];
		$loginin = $_GET['loginin'];
		
		if (!Yii::$app->user->isGuest&&$komment) {
			
			 $model = new message();
			
			 $model->loginmoy = "$username";
			 $model->loginin = "$loginin";	
             $model->telephone = "$telephone";			 
			 $model->img = "$img";
			 $model->name = "$name";
             $model->textmoy = "$komment";
             $model->link = "/avtospec/view?id=$id";		 
              $model->save();  	  			 
		 }
		if(!empty($komment)){
		Yii::$app->session->setFlash('success22', "<center> Сообщение отправлено </center>");}
		else {Yii::$app->session->setFlash('success22', "<center> Сообщение не отправлено.<br>Заполните поле ТЕКСТ СООБЩЕНИЯ. </center>");}
		if (!Yii::$app->request->isAjax){
			return $this->redirect(Yii::$app->request->referrer);
		}
	}
	
	
	public function actionAvtomotomessage(){
        
		$username = Yii::$app->user->identity['username'];
		$id = $_GET['id'];
		$komment1 = $_GET['komment'];
		$komment = \yii\helpers\HtmlPurifier::process($komment1);
		$telephone = $_GET['telephone'];
		$name = $_GET['tipp'];
		$loginin = $_GET['loginin'];
		
		if (!Yii::$app->user->isGuest&&$komment) {
			
			 $model = new message();
			
			 $model->loginmoy = "$username";
			 $model->loginin = "$loginin";	
             $model->telephone = "$telephone";			 
			 $model->img = "$img";
			 $model->name = "$name";
             $model->textmoy = "$komment";
             $model->link = "/avtomoto/view?id=$id";		 
              $model->save();  	  			 
		 }
		if(!empty($komment)){
		Yii::$app->session->setFlash('success22', "<center> Сообщение отправлено </center>");}
		else {Yii::$app->session->setFlash('success22', "<center> Сообщение не отправлено.<br>Заполните поле ТЕКСТ СООБЩЕНИЯ. </center>");}
		if (!Yii::$app->request->isAjax){
			return $this->redirect(Yii::$app->request->referrer);
		}
	}
	
	public function actionAvtolegmessage(){
        
		$username = Yii::$app->user->identity['username'];
		$id = $_GET['id'];
		$komment1 = $_GET['komment'];
		$komment = \yii\helpers\HtmlPurifier::process($komment1);
		$telephone = $_GET['telephone'];
		$name = $_GET['tipp'];
		$loginin = $_GET['loginin'];
		
		if (!Yii::$app->user->isGuest&&$komment) {
			
			 $model = new message();
			
			 $model->loginmoy = "$username";
			 $model->loginin = "$loginin";	
             $model->telephone = "$telephone";			 
			 $model->img = "$img";
			 $model->name = "$name";
             $model->textmoy = "$komment";
             $model->link = "/avtoleg/view?id=$id";		 
              $model->save();  	  			 
		 }
		if(!empty($komment)){
		Yii::$app->session->setFlash('success22', "<center> Сообщение отправлено </center>");}
		else {Yii::$app->session->setFlash('success22', "<center> Сообщение не отправлено.<br>Заполните поле ТЕКСТ СООБЩЕНИЯ. </center>");}
		if (!Yii::$app->request->isAjax){
			return $this->redirect(Yii::$app->request->referrer);
		}
	}
	
	public function actionAvtokomplmessage(){
        
		$username = Yii::$app->user->identity['username'];
		$id = $_GET['id'];
		$komment1 = $_GET['komment'];
		$komment = \yii\helpers\HtmlPurifier::process($komment1);
		$telephone = $_GET['telephone'];
		$name = $_GET['tipp'];
		$loginin = $_GET['loginin'];
		
		if (!Yii::$app->user->isGuest&&$komment) {
			
			 $model = new message();
			
			 $model->loginmoy = "$username";
			 $model->loginin = "$loginin";	
             $model->telephone = "$telephone";			 
			 $model->img = "$img";
			 $model->name = "$name";
             $model->textmoy = "$komment";
             $model->link = "/avtokomplekt/view?id=$id";		 
              $model->save();  	  			 
		 }
		if(!empty($komment)){
		Yii::$app->session->setFlash('success22', "<center> Сообщение отправлено </center>");}
		else {Yii::$app->session->setFlash('success22', "<center> Сообщение не отправлено.<br>Заполните поле ТЕКСТ СООБЩЕНИЯ. </center>");}
		if (!Yii::$app->request->isAjax){
			return $this->redirect(Yii::$app->request->referrer);
		}
	}
	
	 public function actionProdmessage(){
        
		$username = Yii::$app->user->identity['username'];
		$id = $_GET['id'];
		$komment1 = $_GET['komment'];
		$komment = \yii\helpers\HtmlPurifier::process($komment1);
		$telephone = $_GET['telephone'];
		$name = $_GET['tipp'];
		$loginin = $_GET['loginin'];
		
		if (!Yii::$app->user->isGuest&&$komment) {
			
			 $model = new message();
			
			 $model->loginmoy = "$username";
			 $model->loginin = "$loginin";	
             $model->telephone = "$telephone";			 
			 $model->img = "$img";
			 $model->name = "$name";
             $model->textmoy = "$komment";
             $model->link = "/product/$id";		 
              $model->save();  	  			 
		 }
		if(!empty($komment)){
		Yii::$app->session->setFlash('success22', "<center> Сообщение отправлено </center>");}
		else {Yii::$app->session->setFlash('success22', "<center> Сообщение не отправлено.<br>Заполните поле ТЕКСТ СООБЩЕНИЯ. </center>");}
		if (!Yii::$app->request->isAjax){
			return $this->redirect(Yii::$app->request->referrer);
		}
	}
	
	
	 public function actionZemlimessage(){
        
		$username = Yii::$app->user->identity['username'];
		$id = $_GET['id'];
		$komment1 = $_GET['komment'];
		$komment = \yii\helpers\HtmlPurifier::process($komment1);
		$telephone = $_GET['telephone'];
		$name = $_GET['tipp'];
		$loginin = $_GET['loginin'];
		
		if (!Yii::$app->user->isGuest&&$komment) {
			
			 $model = new message();
			
			 $model->loginmoy = "$username";
			 $model->loginin = "$loginin";	
             $model->telephone = "$telephone";			 
			 $model->img = "$img";
			 $model->name = "$name";
             $model->textmoy = "$komment";
             $model->link = "/nedvigzemli/view?id=$id";		 
              $model->save();  	  			 
		 }
		if(!empty($komment)){
		Yii::$app->session->setFlash('success22', "<center> Сообщение отправлено </center>");}
		else {Yii::$app->session->setFlash('success22', "<center> Сообщение не отправлено.<br>Заполните поле ТЕКСТ СООБЩЕНИЯ. </center>");}
		if (!Yii::$app->request->isAjax){
			return $this->redirect(Yii::$app->request->referrer);
		}
	}
	
	
	 public function actionKvartmessage(){
        
		$username = Yii::$app->user->identity['username'];
		$id = $_GET['id'];
		$komment1 = $_GET['komment'];
		$komment = \yii\helpers\HtmlPurifier::process($komment1);
		$telephone = $_GET['telephone'];
		$name = $_GET['tipp'];
		$loginin = $_GET['loginin'];
		
		if (!Yii::$app->user->isGuest&&$komment) {
			
			 $model = new message();
			
			 $model->loginmoy = "$username";
			 $model->loginin = "$loginin";	
             $model->telephone = "$telephone";			 
			 $model->img = "$img";
			 $model->name = "$name";
             $model->textmoy = "$komment";
             $model->link = "/nedvigkvartiri/view?id=$id";		 
              $model->save();  	  			 
		 }
		if(!empty($komment)){
		Yii::$app->session->setFlash('success22', "<center> Сообщение отправлено </center>");}
		else {Yii::$app->session->setFlash('success22', "<center> Сообщение не отправлено.<br>Заполните поле ТЕКСТ СООБЩЕНИЯ. </center>");}
		if (!Yii::$app->request->isAjax){
			return $this->redirect(Yii::$app->request->referrer);
		}
	}
	
	public function actionKomnmessage(){
        
		$username = Yii::$app->user->identity['username'];
		$id = $_GET['id'];
		$komment1 = $_GET['komment'];
		$komment = \yii\helpers\HtmlPurifier::process($komment1);
		$telephone = $_GET['telephone'];
		$name = $_GET['tipp'];
		$loginin = $_GET['loginin'];
		
		if (!Yii::$app->user->isGuest&&$komment) {
			
			 $model = new message();
			
			 $model->loginmoy = "$username";
			 $model->loginin = "$loginin";	
             $model->telephone = "$telephone";			 
			 $model->img = "$img";
			 $model->name = "$name";
             $model->textmoy = "$komment";
             $model->link = "/nedvigkomnati/view?id=$id";		 
              $model->save();  	  			 
		 }
		if(!empty($komment)){
		Yii::$app->session->setFlash('success22', "<center> Сообщение отправлено </center>");}
		else {Yii::$app->session->setFlash('success22', "<center> Сообщение не отправлено.<br>Заполните поле ТЕКСТ СООБЩЕНИЯ. </center>");}
		if (!Yii::$app->request->isAjax){
			return $this->redirect(Yii::$app->request->referrer);
		}
	}
	
	
	public function actionKommerchmessage(){
        
		$username = Yii::$app->user->identity['username'];
		$id = $_GET['id'];
		$komment1 = $_GET['komment'];
		$komment = \yii\helpers\HtmlPurifier::process($komment1);
		$telephone = $_GET['telephone'];
		$name = $_GET['tipp'];
		$loginin = $_GET['loginin'];
		
		if (!Yii::$app->user->isGuest&&$komment) {
			
			 $model = new message();
			
			 $model->loginmoy = "$username";
			 $model->loginin = "$loginin";	
             $model->telephone = "$telephone";			 
			 $model->img = "$img";
			 $model->name = "$name";
             $model->textmoy = "$komment";
             $model->link = "/nedvigkommercheska/view?id=$id";		 
              $model->save();  	  			 
		 }
		if(!empty($komment)){
		Yii::$app->session->setFlash('success22', "<center> Сообщение отправлено </center>");}
		else {Yii::$app->session->setFlash('success22', "<center> Сообщение не отправлено.<br>Заполните поле ТЕКСТ СООБЩЕНИЯ. </center>");}
		if (!Yii::$app->request->isAjax){
			return $this->redirect(Yii::$app->request->referrer);
		}
	}


    public function actionGaragimessage(){
        
		$username = Yii::$app->user->identity['username'];
		$id = $_GET['id'];
		$komment1 = $_GET['komment'];
		$komment = \yii\helpers\HtmlPurifier::process($komment1);
		$telephone = $_GET['telephone'];
		$name = $_GET['tipp'];
		$loginin = $_GET['loginin'];
		
		if (!Yii::$app->user->isGuest&&$komment) {
			
			 $model = new message();
			
			 $model->loginmoy = "$username";
			 $model->loginin = "$loginin";	
             $model->telephone = "$telephone";			 
			 $model->img = "$img";
			 $model->name = "$name";
             $model->textmoy = "$komment";
             $model->link = "/nedviggaragi/view?id=$id";		 
              $model->save();  	  			 
		 }
		if(!empty($komment)){
		Yii::$app->session->setFlash('success22', "<center> Сообщение отправлено </center>");}
		else {Yii::$app->session->setFlash('success22', "<center> Сообщение не отправлено.<br>Заполните поле ТЕКСТ СООБЩЕНИЯ. </center>");}
		if (!Yii::$app->request->isAjax){
			return $this->redirect(Yii::$app->request->referrer);
		}
	}
	
	public function actionDommessage(){
        
		$username = Yii::$app->user->identity['username'];
		$id = $_GET['id'];
		$komment1 = $_GET['komment'];
		$komment = \yii\helpers\HtmlPurifier::process($komment1);
		$telephone = $_GET['telephone'];
		$name = $_GET['tipp'];
		$loginin = $_GET['loginin'];
		
		if (!Yii::$app->user->isGuest&&$komment) {
			
			 $model = new message();
			
			 $model->loginmoy = "$username";
			 $model->loginin = "$loginin";	
             $model->telephone = "$telephone";			 
			 $model->img = "$img";
			 $model->name = "$name";
             $model->textmoy = "$komment";
             $model->link = "/nedvigdoma/view?id=$id";		 
              $model->save();  	  			 
		 }
		if(!empty($komment)){
		Yii::$app->session->setFlash('success22', "<center> Сообщение отправлено </center>");}
		else {Yii::$app->session->setFlash('success22', "<center> Сообщение не отправлено.<br>Заполните поле ТЕКСТ СООБЩЕНИЯ. </center>");}
		if (!Yii::$app->request->isAjax){
			return $this->redirect(Yii::$app->request->referrer);
		}
	}
	
	
	public function actionBizmessage(){
        
		$username = Yii::$app->user->identity['username'];
		$id = $_GET['id'];
		$komment1 = $_GET['komment'];
		$komment = \yii\helpers\HtmlPurifier::process($komment1);
		$telephone = $_GET['telephone'];
		$name = $_GET['tipp'];
		$loginin = $_GET['loginin'];
		
		if (!Yii::$app->user->isGuest&&$komment) {
			
			 $model = new message();
			
			 $model->loginmoy = "$username";
			 $model->loginin = "$loginin";	
             $model->telephone = "$telephone";			 
			 $model->img = "$img";
			 $model->name = "$name";
             $model->textmoy = "$komment";
             $model->link = "/nedvigbiznes/view?id=$id";	 
              $model->save();  	  			 
		 }
		if(!empty($komment)){
		Yii::$app->session->setFlash('success22', "<center> Сообщение отправлено </center>");}
		else {Yii::$app->session->setFlash('success22', "<center> Сообщение не отправлено.<br>Заполните поле ТЕКСТ СООБЩЕНИЯ. </center>");}
		if (!Yii::$app->request->isAjax){
			return $this->redirect(Yii::$app->request->referrer);
		}
	}


    
    public function actionAdd(){
		$id = Yii::$app->request->get('id');
		$username = Yii::$app->user->identity['username'];
		$qty = (int)Yii::$app->request->get('qty');
		$qty = !$qty ? 1 : $qty;
		$product = Product::findOne($id);
		if (empty($product)) return false;
		$session = Yii::$app->session;
		ini_set('session.save_path', Yii::$app->basePath . '/session');
		$session->open();
		$cart=new Cart();
		$cart->addToCart($product, $qty);
		
		if (!Yii::$app->user->isGuest) {
					foreach ($session['cart'] as $id => $itemavto):
					$img = $itemavto['img'];
					$name = $itemavto['name'];
					$price = $itemavto['price'];
					$session->close();
					endforeach;
					 $model = new izbrannoe();
					 $model->login = "$username";
					 $model->category = "product";
					 $model->img = "$img";
					 $model->name = "$name";
					 $model->price = "$price";
					 $model->link ="product/view?id=$id";	
					  $model->save();				 
				 }
					
			
		if (!Yii::$app->request->isAjax){
			return $this->redirect(Yii::$app->request->referrer);
		}
		$this-> layout = false;
		return $this->render('cart-modal', compact('session'));
			  
		}
    
     public function actionAddavto(){
        
		$id = Yii::$app->request->get('id');
		$username = Yii::$app->user->identity['username'];
		$avtoleg = Avtoleg::findOne($id);
		if (empty($avtoleg)) return false;
		$session = Yii::$app->session;
		$session->open();
		$cart=new Cartavto();
		$cart->addToCartavto($avtoleg);
		
		if (!Yii::$app->user->isGuest) {
				foreach ($session['cartavto'] as $id => $itemavto):
				$img = $itemavto['img'];
				$name = $itemavto['name'];
				$price = $itemavto['price'];
				$session->close();
				endforeach;
				 $model = new izbrannoe();
				 $model->login = "$username";
				 $model->category = "avtoleg";
				 $model->img = "$img";
				 $model->name = "$name";
				 $model->price = "$price";
				 $model->link ="avtoleg/view?id=$id";	
                 $model->save();				 
			 }
				
		
		if (!Yii::$app->request->isAjax){
			return $this->redirect(Yii::$app->request->referrer);
		}
		$this-> layout = false;
		return $this->render('cart-modal', compact('session'));
			  
		}
    
	
     public function actionAddgruz(){
        
		$id = Yii::$app->request->get('id');
		$username = Yii::$app->user->identity['username'];
		$avtogruz = Avtogruz::findOne($id);
		if (empty($avtogruz)) return false;
		$session = Yii::$app->session;
		$session->open();
		$cart=new Cartgruz();
		$cart->addToCartgruz($avtogruz);
		
		if (!Yii::$app->user->isGuest) {
			$iz = 1;
			foreach ($session['cartgruz'] as $id => $itemgruz):
			$img = $itemgruz['img'];
			$name = $itemgruz['name'];
			$price = $itemgruz['price'];
			$session->close();
			endforeach;	
			 $model = new izbrannoe();
			 $model->login = "$username";
			 $model->category = "avtogruz";
			 $model->img = "$img";
			 $model->name = "$name";
			 $model->price = "$price";
			 $model->link ="avtogruz/view?id=$id";           
			 $model->save();
			
		 }
		  
		if (!Yii::$app->request->isAjax){
			return $this->redirect(Yii::$app->request->referrer);
		}
		 
		$this-> layout = false;
		return $this->render('cart-modal', compact('session','iz','id'));
			  
	}
    
     public function actionAddspec(){
        
		$id = Yii::$app->request->get('id');
		$username = Yii::$app->user->identity['username'];
		$avtospec = Avtospec::findOne($id);
		if (empty($avtospec)) return false;
		$session = Yii::$app->session;
		$session->open();
		$cart=new Cartspec();
		$cart->addToCartspec($avtospec);
		
		if (!Yii::$app->user->isGuest) {
			foreach ($session['cartspec'] as $id => $itemavto):
			$img = $itemavto['img'];
			$name = $itemavto['name'];
			$price = $itemavto['price'];
			$session->close();
			endforeach;
			 $model = new izbrannoe();
			 $model->login = "$username";
			 $model->category = "avtospec";
			 $model->img = "$img";
			 $model->name = "$name";
			 $model->price = "$price";
			 $model->link ="avtospec/view?id=$id";	
             $model->save();
						 
		 }
		     
		if (!Yii::$app->request->isAjax){
			return $this->redirect(Yii::$app->request->referrer);
		}
		$this-> layout = false;
		return $this->render('cart-modal', compact('session'));
          
    }
    
     public function actionAddmoto(){
        
		$id = Yii::$app->request->get('id');
		$username = Yii::$app->user->identity['username'];
		$avtomoto = Avtomoto::findOne($id);
		if (empty($avtomoto)) return false;
		$session = Yii::$app->session;
		$session->open();
		$cart=new Cartmoto();
		$cart->addToCartmoto($avtomoto);
		
		if (!Yii::$app->user->isGuest) {
				foreach ($session['cartmoto'] as $id => $itemavto):
				$img = $itemavto['img'];
				$name = $itemavto['name'];
				$price = $itemavto['price'];
				$session->close();
				endforeach;
				 $model = new izbrannoe();
				 $model->login = "$username";
				 $model->category = "avtomoto";
				 $model->img = "$img";
				 $model->name = "$name";
				 $model->price = "$price";
				 $model->link ="avtomoto/view?id=$id";
                $model->save();
							 
			 }
				 
		if (!Yii::$app->request->isAjax){
			return $this->redirect(Yii::$app->request->referrer);
		}
		$this-> layout = false;
		return $this->render('cart-modal', compact('session'));
			  
		}
    
    public function actionAddkompl(){
        
		$id = Yii::$app->request->get('id');
		$username = Yii::$app->user->identity['username'];
		$avtokompl = Avtokomplekt::findOne($id);
		if (empty($avtokompl)) return false;
		$session = Yii::$app->session;
		$session->open();
		$cart=new Cartkompl();
		$cart->addToCartkompl($avtokompl);
		
		if (!Yii::$app->user->isGuest) {
				foreach ($session['cartkompl'] as $id => $itemavto):
				$img = $itemavto['img'];
				$name = $itemavto['name'];
				$price = $itemavto['price'];
				$session->close();
				endforeach;
				 $model = new izbrannoe();
				 $model->login = "$username";
				 $model->category = "avtokompl";
				 $model->img = "$img";
				 $model->name = "$name";
				 $model->price = "$price";
				 $model->link ="avtokomplekt/view?id=$id";
                 $model->save();
							 
			 }
				 
		if (!Yii::$app->request->isAjax){
			return $this->redirect(Yii::$app->request->referrer);
		}
		$this-> layout = false;
		return $this->render('cart-modal', compact('session'));
			  
		}
    
    public function actionAddvoda(){
        
		$id = Yii::$app->request->get('id');
		$username = Yii::$app->user->identity['username'];
		$avtovoda = Avtovodnik::findOne($id);
		if (empty($avtovoda)) return false;
		$session = Yii::$app->session;
		$session->open();
		$cart=new Cartvoda();
		$cart->addToCartvoda($avtovoda);
		
		if (!Yii::$app->user->isGuest) {
				foreach ($session['cartvoda'] as $id => $itemavto):
				$img = $itemavto['img'];
				$name = $itemavto['name'];
				$price = $itemavto['price'];
				$session->close();
				endforeach;
				 $model = new izbrannoe();
				 $model->login = "$username";
				 $model->category = "avtovodnik";
				 $model->img = "$img";
				 $model->name = "$name";
				 $model->price = "$price";
				 $model->link ="avtovodnik/view?id=$id";	
                 $model->save();
							 
			 }
				 
		if (!Yii::$app->request->isAjax){
			return $this->redirect(Yii::$app->request->referrer);
		}
		$this-> layout = false;
		return $this->render('cart-modal', compact('session'));
			  
		}
    
    public function actionAddkvart(){
        
		$id = Yii::$app->request->get('id');
		$username = Yii::$app->user->identity['username'];
		$nedvigkvart = Nedvigkvartiri::findOne($id);
		if (empty($nedvigkvart)) return false;
		$session = Yii::$app->session;
		$session->open();
		$cart=new Cartkvart();
		$cart->addToCartkvart($nedvigkvart);
		
		if (!Yii::$app->user->isGuest) {
					foreach ($session['cartkvart'] as $id => $itemavto):
					$img = $itemavto['img'];
					$name = $itemavto['name'];
					$price = $itemavto['price'];
					$session->close();
					endforeach;
					 $model = new izbrannoe();
					 $model->login = "$username";
					 $model->category = "kvartira";
					 $model->img = "$img";
					 $model->name = "$name";
					 $model->price = "$price";
					 $model->link ="nedvigkvartiri/view?id=$id";
					 $model->save();
								 
				 }
					 
		if (!Yii::$app->request->isAjax){
			return $this->redirect(Yii::$app->request->referrer);
		}
		$this-> layout = false;
		return $this->render('cart-modal', compact('session'));
			  
		}
    
     public function actionAdddoma(){
        
		$id = Yii::$app->request->get('id');
		$username = Yii::$app->user->identity['username'];
		$nedvigdoma = Nedvigdoma::findOne($id);
		if (empty($nedvigdoma)) return false;
		$session = Yii::$app->session;
		$session->open();
		$cart=new Cartdoma();
		$cart->addToCartdoma($nedvigdoma);
		
		if (!Yii::$app->user->isGuest) {
					foreach ($session['cartdoma'] as $id => $itemavto):
					$img = $itemavto['img'];
					$name = $itemavto['name'];
					$price = $itemavto['price'];
					$session->close();
					endforeach;
					 $model = new izbrannoe();
					 $model->login = "$username";
					 $model->category = "doma";
					 $model->img = "$img";
					 $model->name = "$name";
					 $model->price = "$price";
					 $model->link ="nedvigdoma/view?id=$id";	
					$model->save();
								 
				 }
					 
		if (!Yii::$app->request->isAjax){
			return $this->redirect(Yii::$app->request->referrer);
		}
		$this-> layout = false;
		return $this->render('cart-modal', compact('session'));
			  
		}
    
     public function actionAddkomnati(){
        
		$id = Yii::$app->request->get('id');
		$username = Yii::$app->user->identity['username'];
		$nedvigkomnati = Nedvigkomnati::findOne($id);
		if (empty($nedvigkomnati)) return false;
		$session = Yii::$app->session;
		$session->open();
		$cart=new Cartkomnati();
		$cart->addToCartkomnati($nedvigkomnati);
		
		if (!Yii::$app->user->isGuest) {
					foreach ($session['cartkomnati'] as $id => $itemavto):
					$img = $itemavto['img'];
					$name = $itemavto['name'];
					$price = $itemavto['price'];
					$session->close();
					endforeach;
					 $model = new izbrannoe();
					 $model->login = "$username";
					 $model->category = "komnati";
					 $model->img = "$img";
					 $model->name = "$name";
					 $model->price = "$price";
					 $model->link ="nedvigkomnati/view?id=$id";	
					 $model->save();
								 
				 }
					 
		if (!Yii::$app->request->isAjax){
			return $this->redirect(Yii::$app->request->referrer);
		}
		$this-> layout = false;
		return $this->render('cart-modal', compact('session'));
			  
		}
    
     public function actionAddkommer(){
        
		$id = Yii::$app->request->get('id');
		$username = Yii::$app->user->identity['username'];
		$nedvigkommer = Nedvigkommercheska::findOne($id);
		if (empty($nedvigkommer)) return false;
		$session = Yii::$app->session;
		$session->open();
		$cart=new Cartkommer();
		$cart->addToCartkommer($nedvigkommer);
		
		if (!Yii::$app->user->isGuest) {
					foreach ($session['cartkommer'] as $id => $itemavto):
					$img = $itemavto['img'];
					$name = $itemavto['name'];
					$price = $itemavto['price'];
					$session->close();
					endforeach;
					 $model = new izbrannoe();
					 $model->login = "$username";
					 $model->category = "kommerch";
					 $model->img = "$img";
					 $model->name = "$name";
					 $model->price = "$price";
					 $model->link ="nedvigkommercheska/view?id=$id";
					 $model->save();
								 
				 }
					 
		if (!Yii::$app->request->isAjax){
			return $this->redirect(Yii::$app->request->referrer);
		}
		$this-> layout = false;
		return $this->render('cart-modal', compact('session'));
			  
		}
    
     public function actionAddzemli(){
        
		$id = Yii::$app->request->get('id');
		$username = Yii::$app->user->identity['username'];
		$nedvigzemli = Nedvigzemli::findOne($id);
		if (empty($nedvigzemli)) return false;
		$session = Yii::$app->session;
		$session->open();
		$cart=new Cartzemli();
		$cart->addToCartzemli($nedvigzemli);
		
		if (!Yii::$app->user->isGuest) {
					foreach ($session['cartzemli'] as $id => $itemavto):
					$img = $itemavto['img'];
					$name = $itemavto['name'];
					$price = $itemavto['price'];
					$session->close();
					endforeach;
					 $model = new izbrannoe();
					 $model->login = "$username";
					 $model->category = "zemli";
					 $model->img = "$img";
					 $model->name = "$name";
					 $model->price = "$price";
					 $model->link ="nedvigzemli/view?id=$id";
					 $model->save();
								 
				 }
					 
		if (!Yii::$app->request->isAjax){
			return $this->redirect(Yii::$app->request->referrer);
		}
		$this-> layout = false;
		return $this->render('cart-modal', compact('session'));
			  
		}
    
    public function actionAddgaragi(){
        
		$id = Yii::$app->request->get('id');
		$username = Yii::$app->user->identity['username'];
		$nedviggaragi = Nedviggaragi::findOne($id);
		if (empty($nedviggaragi)) return false;
		$session = Yii::$app->session;
		$session->open();
		$cart=new Cartgaragi();
		$cart->addToCartgaragi($nedviggaragi);
		
		if (!Yii::$app->user->isGuest) {
					foreach ($session['cartgaragi'] as $id => $itemavto):
					$img = $itemavto['img'];
					$name = $itemavto['name'];
					$price = $itemavto['price'];
					$session->close();
					endforeach;
					 $model = new izbrannoe();
					 $model->login = "$username";
					 $model->category = "garagi";
					 $model->img = "$img";
					 $model->name = "$name";
					 $model->price = "$price";
					 $model->link = "nedviggaragi/view?id=$id";	
					 $model->save();
								 
				 }
					 
		if (!Yii::$app->request->isAjax){
			return $this->redirect(Yii::$app->request->referrer);
		}
		$this-> layout = false;
		return $this->render('cart-modal', compact('session'));
			  
		}
	
	 public function actionAddbiznes(){
        
		$id = Yii::$app->request->get('id');
		$username = Yii::$app->user->identity['username'];
		$nedvigbiznes = NedvigBiznes::findOne($id);
		if (empty($nedvigbiznes)) return false;
		$session = Yii::$app->session;
		$session->open();
		$cart=new Cartbiznes();
		$cart->addToCartbiznes($nedvigbiznes);
		
		if (!Yii::$app->user->isGuest) {
					foreach ($session['cartbiznes'] as $id => $itemavto):
					$img = $itemavto['img'];
					$name = $itemavto['name'];
					$price = $itemavto['price'];
					$session->close();
					endforeach;
					 $model = new izbrannoe();
					 $model->login = "$username";
					 $model->category = "biznes";
					 $model->img = "$img";
					 $model->name = "$name";
					 $model->price = "$price";
					 $model->link ="nedvigbiznes/view?id=$id";	
					 $model->save();
								 
				 }
					 
		if (!Yii::$app->request->isAjax){
			return $this->redirect(Yii::$app->request->referrer);
		}
		$this-> layout = false;
		return $this->render('cart-modal', compact('session'));
			  
		}
    
    public function actionClear () {
         $session = Yii::$app->session;
         $session->open();
         $session ->destroy('cart','cartavto');
         $session ->remove('cart.qty');
         $session ->remove('cart.sum');
         $this-> layout = false;
    return $this->render('cart-modal', compact('session'));
                 
    }
    
    public function actionKvart (){
      $this->layout = '@app/views/layouts/cart.php';
        return $this->render('kvart');
        
    }
	
	public function actionDom (){
       $this->layout = '@app/views/layouts/cart.php';
        return $this->render('dom');
        
    }
	
	public function actionKomn (){
        $this->layout = '@app/views/layouts/cart.php';
        return $this->render('komn');
        
    }
	
	public function actionKommerch (){
        $this->layout = '@app/views/layouts/cart.php';
        return $this->render('kommerch');
        
    }
	
	public function actionZemli (){
       $this->layout = '@app/views/layouts/cart.php';
        return $this->render('zemli');
        
    }
	
	public function actionBiznes (){
        $this->layout = '@app/views/layouts/cart.php';
        return $this->render('biznes');
        
    }
	
	public function actionGaragi (){
        $this->layout = '@app/views/layouts/cart.php';
        return $this->render('garagi');
        
    }

	public function actionAvtoleg (){
        $this->layout = '@app/views/layouts/cart.php';
        return $this->render('avtoleg');
        
    }
	
	public function actionAvtogruz (){
         $this->layout = '@app/views/layouts/cart.php';
        return $this->render('avtogruz');
        
    }
	
	public function actionAvtospec (){
        $this->layout = '@app/views/layouts/cart.php';
        return $this->render('avtospec');
        
    }
	
	public function actionAvtomoto (){
        $this->layout = '@app/views/layouts/cart.php';
        return $this->render('avtomoto');
        
    }
	
	public function actionAvtokomplekt (){
       $this->layout = '@app/views/layouts/cart.php';
        return $this->render('avtokomplekt');
        
    }
	
	public function actionAvtovodnik (){
        $this->layout = '@app/views/layouts/cart.php';
        return $this->render('avtovodnik');
        
    }
	
	public function actionMagaz (){
        $this->layout = '@app/views/layouts/cart.php';
        return $this->render('magaz');
        
    }
    
    public function actionDelItem (){
        $id = Yii::$app->request->get('id');
        $session=Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart -> recalc($id);
        $this ->layout=false;
        return $this->render('cart-modal', compact('session'));
        
    }
    
     public function actionDelItemavto (){
        $id = Yii::$app->request->get('id');
        $session=Yii::$app->session;
        $session->open();
        $cartavto = new Cartavto();
        $cartavto -> recalc($id);
        $this ->layout=false;
        return $this->render('cart-modal', compact('session'));
        
    }
    
    public function actionDelItemgruz (){
        $id = Yii::$app->request->get('id');
		$post = Izbrannoe::findOne($id);
		$post->delete();
        $session=Yii::$app->session;
        $session->open();
        $cartgruz = new Cartgruz();
        $cartgruz -> recalc($id);
        $this ->layout=false;
        return $this->render('cart-modal', compact('session'));
        
    }
	
	 public function actionDelItemmessage (){
        $id = Yii::$app->request->get('id');
		$post = Message::findOne($id);
		$post->delete();
        $this ->layout=false;	
         Yii::$app->session->setFlash('success12','Сообщение удалено');		
        return $this->redirect(Yii::$app->request->referrer);
        
    }
	
	 public function actionDelItemgruzz (){
        $id = Yii::$app->request->get('id');
		$post = Izbrannoe::findOne($id);
		$post->delete();
        $this ->layout=false;
        return $this->render('cart-modal', compact('session'));
        
    }
    
    public function actionDelItemmoto (){
        $id = Yii::$app->request->get('id');
        $session=Yii::$app->session;
        $session->open();
        $cartmoto = new Cartmoto();
        $cartmoto -> recalc($id);
        $this ->layout=false;
        return $this->render('cart-modal', compact('session'));
        
    }
    
    public function actionDelItemspec (){
        $id = Yii::$app->request->get('id');
        $session=Yii::$app->session;
        $session->open();
        $cartspec = new Cartspec();
        $cartspec -> recalc($id);
        $this ->layout=false;
        return $this->render('cart-modal', compact('session'));
        
    }
    
     public function actionDelItemkompl (){
        $id = Yii::$app->request->get('id');
        $session=Yii::$app->session;
        $session->open();
        $cartkompl = new Cartkompl();
        $cartkompl -> recalc($id);
        $this ->layout=false;
        return $this->render('cart-modal', compact('session'));
        
    }
    
     public function actionDelItemvoda (){
        $id = Yii::$app->request->get('id');
        $session=Yii::$app->session;
        $session->open();
        $cartvoda = new Cartvoda();
        $cartvoda -> recalc($id);
        $this ->layout=false;
        return $this->render('cart-modal', compact('session'));
        
    }
    
    public function actionDelItemkvart (){
        $id = Yii::$app->request->get('id');
        $session=Yii::$app->session;
        $session->open();
        $cartkvart = new Cartkvart();
        $cartkvart -> recalc($id);
        $this ->layout=false;
        return $this->render('cart-modal', compact('session'));
        
    }
    
     public function actionDelItemdoma (){
        $id = Yii::$app->request->get('id');
        $session=Yii::$app->session;
        $session->open();
        $nedvigdoma = new Cartdoma();
        $nedvigdoma -> recalc($id);
        $this ->layout=false;
        return $this->render('cart-modal', compact('session'));
        
    }
    
     public function actionDelItemkomnati (){
        $id = Yii::$app->request->get('id');
        $session=Yii::$app->session;
        $session->open();
        $nedvigkomnati = new Cartkomnati();
        $nedvigkomnati -> recalc($id);
        $this ->layout=false;
        return $this->render('cart-modal', compact('session'));
        
    }
    
    public function actionDelItemkommer (){
        $id = Yii::$app->request->get('id');
        $session=Yii::$app->session;
        $session->open();
        $nedvigkommer = new Cartkommer();
        $nedvigkommer -> recalc($id);
        $this ->layout=false;
        return $this->render('cart-modal', compact('session'));
        
    }
    
     public function actionDelItemzemli (){
        $id = Yii::$app->request->get('id');
        $session=Yii::$app->session;
        $session->open();
        $nedvigzemli = new Cartzemli();
        $nedvigzemli -> recalc($id);
        $this ->layout=false;
        return $this->render('cart-modal', compact('session'));
        
    }
    
    public function actionDelItemgaragi (){
        $id = Yii::$app->request->get('id');
        $session=Yii::$app->session;
        $session->open();
        $nedviggaragi = new Cartgaragi();
        $nedviggaragi -> recalc($id);
        $this ->layout=false;
        return $this->render('cart-modal', compact('session'));
        
    }
	
	public function actionSearchprod (){
        $session=Yii::$app->session;
        $session->open();
        $this ->layout=false;
        return $this->render('searchprod-modal');
        
    }
	
	public function actionSearchkvart (){
        $session=Yii::$app->session;
        $session->open();
        $this ->layout=false;
        return $this->render('searchkvart-modal');
        
    }
    
    public function actionShow (){
		$id = Yii::$app->request->get('id');
        $session=Yii::$app->session;
        $session->open();
        $this ->layout=false;
        return $this->render('cart-modal', compact('session', 'iz'));
        
    }
    
    public function actionView (){
         $session=Yii::$app->session;
        $session->open();
        $this->setMeta('Избранное');
        $order = new Order();
        if ($order->load(Yii::$app->request->post())){
            $order->qty = $session['cart.qty'];
            $order->sum = $session['cart.sum'];
              if ($order->save ()){
                  $this->saveOrderItems($session['cart'], $order->id);
                  Yii::$app->session->setFlash('success','Ваш заказ принят');
                  
// отправка почты клиентам
                  
              Yii::$app->mailer->compose('order', ['session'=> $session])->setFrom (['rim-79@bk.ru'=>'Интернет Заказ'])-> setTo($order->email)-> setSubject('Заказ товара с сайта')->send ();
                          
                  $session->remove('cart');
                  $session->remove('cart.qty');
                  $session->remove('cart.sum');
                  return $this->refresh();
              }else {
                   Yii::$app->session->setFlash('error','Ой, ошибка заказа');
              }
         
        }
        return $this->render('view', compact ('session', 'order'));
        
    }
    
   
    protected function saveOrderItems ($items, $order_id) {
             foreach ($items as $id => $item){
                 $order_items = new OrderItems(); 
                 $order_items ->order_id = $order_id;
                 $order_items ->product_id = $id;
                 $order_items ->price = $item['price'];
                 $order_items ->name = $item['name'];
                 $order_items ->qty_item = $item['qty'];
                 $order_items ->sum_item = $item['qty'] * $item['price'];
                 $order_items -> save();
             }
    }
            
}
