<?php

  /*
   * To change this license header, choose License Headers in Project Properties.
   * To change this template file, choose Tools | Templates
   * and open the template in the editor.
   */

 namespace app\modules\admin\controllers;
  //use app\controllers\AppController;
  use yii\web\Controller;
  use app\modules\admin\models\komment;
  use Yii;
  
  
  class KommentController extends Controller {
     
     
     public function actionKomment(){
	 $post = Yii::$app->request->post();
	 
	 $post = Yii::$app->request->post();
echo '<pre>';
print_r($post);
echo '</pre>';
$komment = filter_input(INPUT_POST, 'komment', FILTER_VALIDATE_FLOAT);
echo '['.$komment.']; '.$komment.'<br/>';
	 
     if ($_POST['komment']) {
		$model = new Komment;
		$model->komment = $_POST['komment'];
        $model->save();
        }
    
  }
  }