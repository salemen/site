<?php

namespace app\controllers;
use yii\data\Pagination;
use app\models\Avtocategory;
use app\models\Avtospec;
use Yii;

class AvtospecController extends AppController {
    
    public function actionView ($id) {
		$this->layout = '@app/views/layouts/avtoview.php';
        $id = Yii::$app ->request ->get('id');
        $avtospec = avtospec::findOne($id);
        if (empty($avtospec)){
           throw new \yii\web\HttpException( 404, 'Такого товара нет или он еще не размещен.' ); 
        }
         $hits = Avtospec::find()->where(['rekom'=>'1'])->andWhere(['moder' => 1])->orderBy('RAND()')->limit(32)->all();
         $this ->setMeta( 'Купить '.$avtospec->tip.', '. $avtospec ->sostoyanie.', цена '.$avtospec ->price.'. id'.$avtospec ->id );
        return $this ->render('view', compact ('avtospec', 'hits'));   
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
		 
		  $query = Avtospec::find()->where(['like', 'username', $username])->andWhere(['telephone' => $tel])->orderBy(['id' => SORT_DESC]);
		   	$this ->setMeta('Объявления: вся спецтехника от '. $username);
		  $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 24, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
       $avtospec = $query->offset($pages->offset)->limit($pages->limit)->all();
		 
        return $this -> render('searchprof', compact('avtospec', 'pages', 'tel', 'username')); 
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
        if (!$p1&&!empty($sost)&&!empty($tipkuzov)&&!empty($tipdvig)&&!empty($goddo)&&!empty($godot)&&!empty($oblast)){
	        $query = avtospec::find()->where(['between','god', $godot, $goddo])->andWhere(['oblast'=> $oblast])->
			andWhere(['like', 'dvigatel', $tipdvig])->andWhere(['like', 'tip', $tipkuzov])->andWhere(['like', 'sostoyanie', $sost])->orderBy(['data' => SORT_DESC]); 
                }elseif(!$p1&&!$oblast&&!empty($sost)&&!empty($tipkuzov)&&!empty($tipdvig)&&!empty($goddo)&&!empty($godot)){
	            $query = avtospec::find()->where(['like', 'dvigatel', $tipdvig])->
				andWhere(['like', 'tip', $tipkuzov])->andWhere(['like', 'sostoyanie', $sost])->andWhere(['between','god', $godot, $goddo])->orderBy(['data' => SORT_DESC]); 
				}elseif(!$oblast&&!empty($sost)&&!empty($tipkuzov)&&!empty($tipdvig)&&!empty($goddo)&&!empty($godot)&&!empty($p1)){
	            $query = avtospec::find()->where(['like', 'dvigatel', $tipdvig])->
				andWhere(['like', 'tip', $tipkuzov])->andWhere(['like', 'sostoyanie', $sost])->andWhere(['between','god', $godot, $goddo])->andWhere([ '<=','price',$p1])->orderBy(['data' => SORT_DESC]); 
				}else{
	            $query = avtospec::find()->where(['like', 'dvigatel', $tipdvig])->andWhere(['oblast'=> $oblast])->
				andWhere(['like', 'tip', $tipkuzov])->andWhere(['like', 'sostoyanie', $sost])->andWhere(['between','god', $godot, $goddo])->andWhere([ '<=','price',$p1])->orderBy(['data' => SORT_DESC]); 
				}          
         $this ->setMeta('Поиск, '. $tipkuzov );
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 32, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $avtospec = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('avtospec', 'query', 'pages', 'p1', 'oblast', 'godot', 'goddo', 'tipdvig', 'tipkuzov', 'sost')); 
        
    }
	
    }





