<?php

namespace app\controllers;
use yii\data\Pagination;
use app\models\Avtocategory;
use app\models\Avtomoto;
use Yii;

class AvtomotoController extends AppController {
    
    public function actionView ($id) {
		$this->layout = '@app/views/layouts/avtoview.php';
        $id = Yii::$app ->request ->get('id');
        $avtomoto = avtomoto::findOne($id);
        if (empty($avtomoto)){
           throw new \yii\web\HttpException( 404, 'Такого товара нет или он еще не размещен.' ); 
        }
         $hits = Avtomoto::find()->where(['rekom'=>'1'])->andWhere(['moder' => 1])->orderBy('RAND()')->limit(32)->all();
         $this ->setMeta($avtomoto->tip.', '. $avtomoto ->sostoyanie.'. id'.$avtomoto->id );
        return $this ->render('view', compact ('avtomoto', 'hits'));   
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
		 
		  $query = Avtomoto::find()->where(['like', 'username', $username])->andWhere(['telephone' => $tel])->orderBy(['id' => SORT_DESC]);
		   	$this ->setMeta('Объявления: вся мототехника от '. $username);
		  $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 24, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
       $avtomoto = $query->offset($pages->offset)->limit($pages->limit)->all();
		 
        return $this -> render('searchprof', compact('avtomoto', 'pages', 'tel', 'username')); 
	 }
	
	public function actionSearch(){
                                                        
        $this->layout = '@app/views/layouts/mainavto.php';                                               
        $oblast = $_GET['Oblast']['oblast_region'];
        $godot = $_GET['godot']['id'];
		$goddo = $_GET['goddo']['id'];
		$tipkuzov = $_GET['tipkuzov']['id'];
		$sost = $_GET['sost']['id'];
        $p1 = trim(Yii::$app->request->get('p1'));
        if (!$p1){
	        $query = avtomoto::find()->where(['between','god', $godot, $goddo])->andWhere(['like', 'tip', $tipkuzov])->andWhere(['oblast'=> $oblast])->
			andWhere(['like', 'sostoyanie', $sost])->orderBy(['data' => SORT_DESC]); 
                }elseif(!$p1&&!$oblast){
	            $query = avtomoto::find()->where(['like', 'tip', $tipkuzov])->andWhere(['like', 'sostoyanie', $sost])->andWhere(['between','god', $godot, $goddo])->orderBy(['data' => SORT_DESC]); 
				}elseif(!$oblast){
	            $query = avtomoto::find()->where(['like', 'tip', $tipkuzov])->andWhere(['like', 'sostoyanie', $sost])->andWhere(['between','god', $godot, $goddo])->andWhere([ '<=','price',$p1])->orderBy(['data' => SORT_DESC]); 
				}else{
	            $query = avtomoto::find()->where(['like', 'tip', $tipkuzov])->andWhere(['like', 'sostoyanie', $sost])->andWhere(['between','god', $godot, $goddo])->andWhere([ '<=','price',$p1])->andWhere(['oblast'=> $oblast])->orderBy(['data' => SORT_DESC]); 
				}          
         $this ->setMeta('Поиск, '. $tipkuzov );
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 32, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $avtomoto = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('avtomoto', 'query', 'pages', 'p1', 'godot', 'oblast', 'goddo', 'tipkuzov', 'sost')); 
        
    }
	
	
    }







