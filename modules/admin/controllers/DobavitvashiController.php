<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\NedvigKvartiri;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\data\Pagination;

/**
 * NedvigkvartiriController implements the CRUD actions for NedvigKvartiri model.
 */
class DobavitvashiController extends Controller
{


 public function actionIndex(){
	  $this->layout = 'adminindex.php';
             $id = Yii::$app->request->get('id');
       
    { 
	// $this ->setMeta(' Ваши объявления ');  
	return $this ->render('index');}
    }
}