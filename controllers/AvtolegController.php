<?php

namespace app\controllers;
use app\widgets\Alert;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Dropdown;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\models\Avtocategory;
use app\models\Avtoleg;
use yii\data\Pagination;
use yii\db\conditions\BetweenCondition;
use app\modules\admin\models\Oblast;
use app\modules\admin\models\Marka;
use app\modules\admin\models\Model;
use Yii;



class AvtolegController extends AppController {
    
    public function actionView ($id) {
		$this->layout = '@app/views/layouts/avtoview.php';
        $id = Yii::$app ->request ->get('id');
        $avtoleg = avtoleg::findOne($id);
        if (empty($avtoleg)){
           throw new \yii\web\HttpException( 404, 'Такого товара нет или он еще не размещен.' ); 
        }
         $hits = Avtoleg::find()->where(['rekom'=>'1'])->andWhere(['moder' => 1])->orderBy('RAND()')->limit(32)->all();
		 
         $this ->setMeta('продается '. $avtoleg->tip .', стоимость '. $avtoleg->price.' руб. id'.$avtoleg->id );
        return $this ->render('view', compact ('avtoleg', 'hits'));   
    }   



  public function getImage()
    {
        if ($this->getModule()->className === null) {
            $imageQuery = Image::find();
        } else {
            $class = $this->getModule()->className;
            $imageQuery = $class::find();
        }
        $finder = $this->getImagesFinder(['isMain' => 1]);
        $imageQuery->where($finder);
        $imageQuery->orderBy(['isMain' => SORT_DESC, 'id' => SORT_ASC]);

        $img = $imageQuery->one();
        if(!$img){
            return $this->getModule()->getPlaceHolder();
        }

        return $img;
    }
	
	 public function actionSearchprof(){
		  $this->layout = '@app/views/layouts/mainavto.php';  
		  $tel = trim(Yii::$app->request->get('tel'));
		  $username = trim(Yii::$app->request->get('username'));
		 
		  $query = Avtoleg::find()->where(['like', 'username', $username])->andWhere(['telephone' => $tel])->orderBy(['id' => SORT_DESC]);
		   	$this ->setMeta('Объявления: все легковые авто от '. $username);
		  $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 24, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
       $avtoleg1 = $query->offset($pages->offset)->limit($pages->limit)->all();
		 
        return $this -> render('searchprof', compact('avtoleg1', 'pages', 'tel', 'username')); 
	 }
	
	public function actionSearch(){
                                                        
        $this->layout = '@app/views/layouts/mainavto.php';  
        $oblast1 = $_GET['Oblast']['oblast_region'];
       // $oblast1 = oblast::find()->(['like', 'oblast_region', $oblast1])->indexBy('id');		
        $model1 = $_GET['Marka']['mark'];
		$mark1 = $_GET['Model']['name'];
        $godot = $_GET['godot']['id'];
		$goddo = $_GET['goddo']['id'];
		$tipdvig = $_GET['tipdvig']['id'];
		$tipkpp = $_GET['tipkpp']['id'];
		$tipkuzov = $_GET['tipkuzov']['id'];
		$sost = $_GET['sost']['id'];
        $p1 = trim(Yii::$app->request->get('p1'));
        if (!$p1&&!$model&&$mark==0&&!$oblast){
	        $query = avtoleg::find()->andWhere(['between','god', $godot, $goddo])->andWhere(['like', 'korobka', $tipkpp])->
			andWhere(['like', 'dvigatel', $tipdvig])->andWhere(['like', 'tip', $tipkuzov])->andWhere(['like', 'sostoyanie', $sost])->orderBy(['data' => SORT_DESC]); 
                }elseif(!$p1&&$mark==0&&!$oblast){
	            $query = avtoleg::find()->where(['model'=> $model])->andWhere(['between','god', $godot, $goddo])->
			    andWhere(['like', 'korobka', $tipkpp])->andWhere(['like', 'dvigatel', $tipdvig])->
		        andWhere(['like', 'tip', $tipkuzov])->andWhere(['like', 'sostoyanie', $sost])->orderBy(['data' => SORT_DESC]); 
                }elseif(!$p1&&$mark==0&&!$model){
	            $query = avtoleg::find()->andWhere(['oblast'=> $oblast])->andWhere(['between','god', $godot, $goddo])->
			    andWhere(['like', 'korobka', $tipkpp])->andWhere(['like', 'dvigatel', $tipdvig])->
		        andWhere(['like', 'tip', $tipkuzov])->andWhere(['like', 'sostoyanie', $sost])->orderBy(['data' => SORT_DESC]); 
                }elseif(!$p1&&$mark==0){
	            $query = avtoleg::find()->where(['model'=> $model])->andWhere(['oblast'=> $oblast])->andWhere(['between','god', $godot, $goddo])->andWhere(['like', 'korobka', $tipkpp])->andWhere(['like', 'dvigatel', $tipdvig])->
				andWhere(['like', 'tip', $tipkuzov])->andWhere(['like', 'sostoyanie', $sost])->orderBy(['data' => SORT_DESC]);
				}elseif(!$p1&&!$model){
	            $query = avtoleg::find()->where(['marka'=> $mark])->andWhere(['oblast'=> $oblast])->andWhere(['between','god', $godot, $goddo])->andWhere(['like', 'korobka', $tipkpp])->andWhere(['like', 'dvigatel', $tipdvig])->
				andWhere(['like', 'tip', $tipkuzov])->andWhere(['like', 'sostoyanie', $sost])->orderBy(['data' => SORT_DESC]);
				}elseif(!$p1&&!$oblast){
	            $query = avtoleg::find()->where(['model'=> $model])->andWhere(['marka' => $mark])->andWhere(['between','god', $godot, $goddo])->andWhere(['like', 'korobka', $tipkpp])->andWhere(['like', 'dvigatel', $tipdvig])->
				andWhere(['like', 'tip', $tipkuzov])->andWhere(['like', 'sostoyanie', $sost])->orderBy(['data' => SORT_DESC]);
				}elseif(!$p1&&!empty($model)&&!empty($oblast)&&!empty($mark)&&!empty($tipkpp)&&!empty($tipdvig)&&!empty($tipkuzov)&&!empty($sost)&&!empty($godot)&&!empty($goddo)){
	            $query = avtoleg::find()->where(['model'=> $model])->andWhere(['oblast'=> $oblast])->andWhere(['marka' => $mark])->andWhere(['between','god', $godot, $goddo])->andWhere(['like', 'korobka', $tipkpp])->andWhere(['like', 'dvigatel', $tipdvig])->
				andWhere(['like', 'tip', $tipkuzov])->andWhere(['like', 'sostoyanie', $sost])->orderBy(['data' => SORT_DESC]);
				}else{
	            $query = avtoleg::find()->where(['model'=> $model])->andWhere(['oblast'=> $oblast])->andWhere(['marka' => $mark])->andWhere(['like', 'korobka', $tipkpp])->andWhere(['like', 'dvigatel', $tipdvig])->
				andWhere(['like', 'tip', $tipkuzov])->andWhere(['like', 'sostoyanie', $sost])->andWhere(['between','god', $godot, $goddo])->andWhere([ '<=','price',$p1])->orderBy(['data' => SORT_DESC]); 
				}          
         $this ->setMeta('Поиск легкового автомобиля ' );
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 32, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $avtoleg1 = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('avtoleg1', 'query', 'pages', 'model', 'oblast', 'mark', 'p1', 'godot', 'goddo', 'tipdvig', 'tipkpp', 'tipkuzov', 'sost')); 
        
    }
	
    }



