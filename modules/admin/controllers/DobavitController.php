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
class DobavitController extends Controller
{


 public function actionIndex(){
	  $this->layout = 'adminindex.php';
             $id = Yii::$app->request->get('id');
       
    { return $this ->render('index');}
    }
	
	public function actionViborned(){
		 $this->layout = 'adminindex.php';
             $id = Yii::$app->request->get('id');
       
    { return $this ->render('viborned');}
    }
	
	public function actionViborkvart(){
		 $this->layout = 'adminindex.php';
             $id = Yii::$app->request->get('id');
       
    { return $this ->render('viborkvart');}
    }
	
	public function actionViborauto(){
		 $this->layout = 'adminindex.php';
             $id = Yii::$app->request->get('id');
       
    { return $this ->render('viborauto');}
    }
}