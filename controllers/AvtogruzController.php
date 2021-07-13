<?php

namespace app\controllers;
use yii\data\Pagination;
use app\models\Avtocategory;
use app\models\Avtogruz;
use Yii;

class AvtogruzController extends AppController {
    
    public function actionView ($id) {
		$this->layout = '@app/views/layouts/avtoview.php';
        $id = Yii::$app ->request ->get('id');
        $avtogruz = avtogruz::findOne($id);
        if (empty($avtogruz)){
           throw new \yii\web\HttpException( 404, 'Такого товара нет или он еще не размещен.' ); 
        }
         $hits = Avtogruz::find()->where(['rekom'=>'1'])->andWhere(['moder' => 1])->orderBy('RAND()')->limit(32)->all();
		 
         $this ->setMeta('купить, грузовой транспорт: (тип) '. $avtogruz->tip.', цена '. $avtogruz->price.' руб. id'.$avtogruz->id);
        return $this ->render('view', compact ('avtogruz', 'hits'));   
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
		 
		  $query = Avtogruz::find()->where(['like', 'username', $username])->andWhere(['telephone' => $tel])->orderBy(['id' => SORT_DESC]);
		   	$this ->setMeta('Объявления: все грузовые автомобили от '. $username);
		  $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 24, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
       $avtogruz = $query->offset($pages->offset)->limit($pages->limit)->all();
		 
        return $this -> render('searchprof', compact('avtogruz', 'pages', 'tel', 'username')); 
	 }
	
	public function actionSearch(){
                                                        
        $this->layout = '@app/views/layouts/mainavto.php';                                               
        $oblast = $_GET['Oblast']['oblast_region'];
        $godot = $_GET['godot']['id'];
		$goddo = $_GET['goddo']['id'];
		$tipdvig = $_GET['tipdvig']['id'];
		$tipkuzov = $_GET['tipkuzov']['id'];
		$sost = $_GET['sost']['id'];
        $p1 = trim(Yii::$app->request->get('p1'));
        if (!$p1){
	        $query = avtogruz::find()->where(['between','god', $godot, $goddo])->andWhere(['oblast'=> $oblast])->
			andWhere(['like', 'dvigatel', $tipdvig])->andWhere(['like', 'tip', $tipkuzov])->andWhere(['like', 'sostoyanie', $sost])->orderBy(['data' => SORT_DESC]); 
                }elseif(!$p1&&!$oblast){
	            $query = avtogruz::find()->where(['like', 'dvigatel', $tipdvig])->
				andWhere(['like', 'tip', $tipkuzov])->andWhere(['like', 'sostoyanie', $sost])->andWhere(['between','god', $godot, $goddo])->orderBy(['data' => SORT_DESC]); 
				}elseif(!$oblast){
	            $query = avtogruz::find()->where(['like', 'dvigatel', $tipdvig])->
				andWhere(['like', 'tip', $tipkuzov])->andWhere(['like', 'sostoyanie', $sost])->andWhere(['between','god', $godot, $goddo])->andWhere([ '<=','price',$p1])->orderBy(['data' => SORT_DESC]); 
				}else{
	            $query = avtogruz::find()->where(['like', 'dvigatel', $tipdvig])->
				andWhere(['like', 'tip', $tipkuzov])->andWhere(['like', 'sostoyanie', $sost])->andWhere(['between','god', $godot, $goddo])->andWhere([ '<=','price',$p1])->andWhere(['oblast'=> $oblast])->orderBy(['data' => SORT_DESC]); 
				}          
        $this ->setMeta('Поиск, '. $tipkuzov );
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 32, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $avtogruz = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('avtogruz', 'query', 'pages', 'p1', 'godot', 'oblast', 'goddo', 'tipdvig', 'tipkuzov', 'sost')); 
        
    }
	
	
    }





