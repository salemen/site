<?php

namespace app\controllers;
use app\models\Avtocategory;
use app\models\Avtovodnik;
use yii\data\Pagination;
use Yii;

class AvtovodnikController extends AppController {
    
    public function actionView ($id) {
		$this->layout = '@app/views/layouts/avtoview.php';
        $id = Yii::$app ->request ->get('id');
        $avtovodnik = avtovodnik::findOne($id);
        if (empty($avtovodnik)){
           throw new \yii\web\HttpException( 404, 'Такого товара нет или он еще не размещен.' ); 
        }
         $hits = Avtovodnik::find()->where(['rekom'=>'1'])->andWhere(['moder' => 1])->orderBy('RAND()')->limit(32)->all();
         $this ->setMeta($avtovodnik->tip.', '.$avtovodnik ->sostoyanie.', цена '.$avtovodnik->price.'. id'.$avtovodnik->id);
        return $this ->render('view', compact ('avtovodnik', 'hits'));   
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
		 
		  $query = Avtovodnik::find()->where(['like', 'username', $username])->andWhere(['telephone' => $tel])->orderBy(['id' => SORT_DESC]);
		   	$this ->setMeta('Объявления: вся водная техника от '. $username);
		  $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 24, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
       $avtovodnik = $query->offset($pages->offset)->limit($pages->limit)->all();
		 
        return $this -> render('searchprof', compact('avtovodnik', 'pages', 'tel', 'username')); 
	 }
	
	public function actionSearch(){
                                                        
        $this->layout = '@app/views/layouts/mainavto.php';  
        $oblast = $_GET['Oblast']['oblast_region'];				
		$tip = $_GET['tip']['id'];
		$sost = $_GET['sost']['id'];
        $p1 = trim(Yii::$app->request->get('p1'));
        if (!$p1&&!$oblast){
	        $query = avtovodnik::find()->andWhere(['like', 'tip', $tip])->andWhere(['like', 'sostoyanie', $sost])->orderBy(['data' => SORT_DESC]); 
                }elseif(!$p1){
	            $query = avtovodnik::find()->andWhere(['like', 'tip', $tip])->andWhere(['oblast'=> $oblast])->andWhere(['like', 'sostoyanie', $sost])->andWhere([ '<=','price',$p1])->orderBy(['data' => SORT_DESC]); 
				}elseif(!$oblast){
	            $query = avtovodnik::find()->andWhere(['like', 'tip', $tip])->andWhere([ '<=','price',$p1])->andWhere(['oblast'=> $oblast])->andWhere(['like', 'sostoyanie', $sost])->andWhere([ '<=','price',$p1])->orderBy(['data' => SORT_DESC]); 
				}else{
	            $query = avtovodnik::find()->andWhere(['like', 'tip', $tip])->andWhere(['like', 'sostoyanie', $sost])->andWhere([ '<=','price',$p1])->andWhere(['oblast'=> $oblast])->orderBy(['data' => SORT_DESC]); 
				}      
         $this ->setMeta('Поиск, '. $tip );
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 32, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $avtovodnik = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('avtovodnik', 'pages', 'p1', 'oblast', 'tip', 'sost')); 
        
    }
	
    }





