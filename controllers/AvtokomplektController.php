<?php

namespace app\controllers;
use yii\data\Pagination;
use app\models\Avtocategory;
use app\models\Avtokomplekt;
use Yii;
use kartik\select2\Select2; // or kartik\select2\Select2
use yii\web\JsExpression;


class AvtokomplektController extends AppController {
    
    public function actionView ($id) {
		$this->layout = '@app/views/layouts/avtoview.php';
        $id = Yii::$app ->request ->get('id');
        $avtokomplekt = avtokomplekt::findOne($id);
        if (empty($avtokomplekt)){
           throw new \yii\web\HttpException( 404, 'Такого товара нет или он еще не размещен.' ); 
        }
         $hits = Avtokomplekt::find()->where(['rekom'=>'1'])->andWhere(['moder' => 1])->orderBy('RAND()')->limit(32)->all();
         $this ->setMeta('Купить '.$avtokomplekt->tip.' '.$avtokomplekt->name.', состояние '.$avtokomplekt ->sostoyanie.' цена '.$avtokomplekt->price.'. id'.$avtokomplekt->id );
        return $this ->render('view', compact ('avtokomplekt', 'hits'));   
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
		 
		  $query = Avtokomplekt::find()->where(['like', 'username', $username])->andWhere(['telephone' => $tel])->orderBy(['id' => SORT_DESC]);
		   	$this ->setMeta('Объявления: все комплектующие от '. $username);
		  $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 24, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
       $avtokomplekt = $query->offset($pages->offset)->limit($pages->limit)->all();
		 
        return $this -> render('searchprof', compact('avtokomplekt', 'pages', 'tel', 'username')); 
	 }
	
	public function actionSearch(){
                                                        
        $this->layout = '@app/views/layouts/mainavto.php'; 
        $oblast = $_GET['Oblast']['oblast_region'];		
        $model = $_GET['Marka']['mark'];
		$mark = $_GET['Model']['name'];
		$tip = $_GET['Avtocategory']['name'];
		$sost = $_GET['sost']['id'];
        $p1 = trim(Yii::$app->request->get('p1'));
        if (!$p1&&!$model&&!$mark&&!$oblast){
	        $query = avtokomplekt::find()->andWhere(['like', 'tip', $tip])->andWhere(['like', 'sostoyanie', $sost])->orderBy(['data' => SORT_DESC]); 
                }elseif(!$p1&&!$model&&!$oblast){
	            $query = avtokomplekt::find()->where(['marka' => $mark])->andWhere(['like', 'tip', $tip])->andWhere(['like', 'sostoyanie', $sost])->orderBy(['data' => SORT_DESC]); 
				}elseif(!$p1&&!$model&&!$mark){
	        $query = avtokomplekt::find()->andWhere(['like', 'tip', $tip])->andWhere(['oblast'=> $oblast])->andWhere(['like', 'sostoyanie', $sost])->orderBy(['data' => SORT_DESC]); 
				}elseif(!$p1&&!$oblast){
	            $query = avtokomplekt::find()->where(['model'=> $model])->andWhere(['marka' => $mark])->andWhere(['like', 'tip', $tip])->andWhere(['like', 'sostoyanie', $sost])->orderBy(['data' => SORT_DESC]); 
				}elseif(!$oblast){
	            $query = avtokomplekt::find()->where(['model'=> $model])->andWhere(['marka' => $mark])->andWhere([ '<=','price',$p1])->andWhere(['like', 'tip', $tip])->andWhere(['like', 'sostoyanie', $sost])->orderBy(['data' => SORT_DESC]); 
				}elseif(!$model&&!$mark&&!$oblast){
	            $query = avtokomplekt::find()->where(['like', 'tip', $tip])->andWhere(['like', 'sostoyanie', $sost])->andWhere([ '<=','price',$p1])->orderBy(['data' => SORT_DESC]); 
				}else{
	            $query = avtokomplekt::find()->where(['model'=> $model])->andWhere(['marka' => $mark])->andWhere(['oblast'=> $oblast])->andWhere(['like', 'tip', $tip])->andWhere(['like', 'sostoyanie', $sost])->andWhere([ '<=','price',$p1])->orderBy(['data' => SORT_DESC]); 
				}   

             $model2 = Avtocategory::find()->select('name')
								->where(['id' => $tip])
								->one();      
								   $tip = $model2[name];    
				
         $this ->setMeta('Поиск, '. $tip );
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 32, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $avtokomplekt = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('avtokomplekt', 'pages', 'p1', 'model', 'oblast', 'mark', 'tip', 'sost')); 
        
    }
	
	
    }






