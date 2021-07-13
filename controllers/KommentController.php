<?php

  /*
   * To change this license header, choose License Headers in Project Properties.
   * To change this template file, choose Tools | Templates
   * and open the template in the editor.
   */

 namespace app\controllers;
  //use app\controllers\AppController;
  use yii\web\Controller;
  use app\modules\admin\models\komment;
  use Yii;
  
  
  class KommentController extends Controller {
     
     
     public function actionKomment(){
	 $post = Yii::$app->request->post();
	 $komment = $_POST['komment'];
	 $login = $_POST['login'];
     if ($komment) {
		$model = new komment;
		$model->komment = $_POST['komment'];
		$model->login = $_POST['login'];
        $model->save();
		Yii::$app->session->setFlash('success', "<center>SaleMen<br>Ваши пожелания и отзыв о сайте отправлены, спасибо. </center>");
		 Yii::$app->mailer->compose('komment', ['username' => $login, 'komment' => $komment] )->setFrom (['rim-79@bk.ru'=>'ОТЗЫВ о сайте'])-> setTo('info@salemen.ru')
			 -> setSubject('Новый ОТЗЫВ')->send ();
        }
    
  }
  }