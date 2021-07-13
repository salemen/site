<?php

namespace app\controllers;
use app\models\Nedvigcategory;
use app\models\NedvigZemli;
use yii\data\Pagination;
use app\modules\admin\models\Oblast;
use app\modules\admin\models\Goroda;
use Yii;
use GeoIp2\Database\Reader;

class NedvigzemliController extends AppController {
    
    public function actionView ($id) {
		$this->layout = '@app/views/layouts/nedvigview.php';
        $id = Yii::$app ->request ->get('id');
        $nedvigzemli = nedvigzemli::findOne($id);
        if (empty($nedvigzemli)){
           throw new \yii\web\HttpException( 404, 'Такого товара нет или он еще не размещен.' ); 
        } 
		
         $this ->setMeta('Участок '. $nedvigzemli->typ_uchastka. ', ' .$nedvigzemli ->plochad_uchastka. ' сот.' );
        return $this ->render('view', compact ('nedvigzemli'));   
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
		  $this->layout = '@app/views/layouts/mainned/index.php';
		  $tel = trim(Yii::$app->request->get('tel'));
		  $username = trim(Yii::$app->request->get('username'));
		 
		  $query = Nedvigzemli::find()->where(['like', 'username', $username])->andWhere(['telephone' => $tel])->orderBy(['id' => SORT_DESC]);
		   	$this ->setMeta('Объявления: все земельные участки от '. $username);
		  $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 24, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $nedvigzemli = $query->offset($pages->offset)->limit($pages->limit)->all();
		 
        return $this -> render('searchprof', compact('nedvigzemli', 'pages', 'tel', 'username')); 
	 }
	
	
	public function actionSearch(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';
        $reg = $_GET['Oblast']['oblast_region'];		
        $gor = $_GET['Goroda']['name'];		
        $r = $_GET['Raion']['raion'];
        $tip = $_GET['Tipzemli']['id'];
        $p1 = trim(Yii::$app->request->get('p1'));
        $p2 = trim(Yii::$app->request->get('p2'));
        if (!$p1&&!$p2&&!$r&&!$gor&&!$reg){
	    $query = nedvigzemli::find()->andWhere([ 'like', 'typ_uchastka', $tip])->orderBy(['data' => SORT_DESC]);
                }elseif(!$p1&&!$p2&&!$r&&!$gor&&!empty($tip)&&!empty($reg)){
	            $query = nedvigzemli::find()->where([ 'like', 'typ_uchastka', $tip])->andWhere([ 'like', 'oblast', $reg])->orderBy(['data' => SORT_DESC]);
				}elseif(!$p1&&!$reg&&!$r&&!$gor&&!empty($tip)&&!empty($p2)){
	            $query = nedvigzemli::find()->where([ 'like', 'typ_uchastka', $tip])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);
				}elseif(!$p2&&!$reg&&!$r&&!$gor&&!empty($tip)&&!empty($p1)){
	            $query = nedvigzemli::find()->where([ 'like', 'typ_uchastka', $tip])->andWhere(['>=','plochad_uchastka',$p1])->orderBy(['data' => SORT_DESC]);
				}elseif(!$p2&&!$r&&!$gor&&!empty($tip)&&!empty($reg)&&!empty($p1)){
	            $query = nedvigzemli::find()->where([ 'like', 'typ_uchastka', $tip])->andWhere(['>=','plochad_uchastka',$p1])->andWhere([ 'like', 'oblast', $reg])->orderBy(['data' => SORT_DESC]);
				}elseif(!$p1&&!$r&&!$gor&&!empty($tip)&&!empty($reg)&&!empty($p2)){
	            $query = nedvigzemli::find()->where([ 'like', 'typ_uchastka', $tip])->andWhere([ 'like', 'oblast', $reg])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);
				}elseif(!$p1&&!$r&&!empty($gor)&&!empty($tip)&&!empty($reg)&&!empty($p2)){
	            $query = nedvigzemli::find()->where([ 'like', 'typ_uchastka', $tip])->andWhere([ 'like', 'oblast', $reg])->andWhere(['gorod' => $gor])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);
				}elseif(!$p1&&!$p2&&!$r&&!empty($tip)&&!empty($reg)&&!empty($gor)){
	            $query = nedvigzemli::find()->where([ 'like', 'typ_uchastka', $tip])->andWhere([ 'like', 'oblast', $reg])->andWhere(['gorod' => $gor])->orderBy(['data' => SORT_DESC]);
				}elseif(!$p1&&!$p2&&!empty($tip)&&!empty($reg)&&!empty($gor)&&!empty($r)){
	            $query = nedvigzemli::find()->andWhere(['gorod' => $gor])->andWhere(['raion' => $r])->andWhere([ 'like', 'oblast', $reg])->andWhere([ 'like', 'typ_uchastka', $tip])->orderBy(['data' => SORT_DESC]);
				}elseif(!$p2&&!empty($tip)&&!empty($reg)&&!empty($gor)&&!empty($r)&&!empty($p1)){
                $query = nedvigzemli::find()->where(['raion' => $r])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'oblast', $reg])->andWhere([ 'like', 'typ_uchastka', $tip])->andWhere(['>=','plochad_uchastka',$p1])->orderBy(['data' => SORT_DESC]);
		        }elseif(!$r&&!empty($tip)&&!empty($reg)&&!empty($gor)&&!empty($p2)&&!empty($p1)){
                $query = nedvigzemli::find()->where([ '<=','price',$p2])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'oblast', $reg])->andWhere([ 'like', 'typ_uchastka', $tip])->andWhere(['>=','plochad_uchastka',$p1])->orderBy(['data' => SORT_DESC]);
		        }elseif(!$r&&!$p2&&!empty($tip)&&!empty($reg)&&!empty($gor)&&!empty($p1)){
                $query = nedvigzemli::find()->where(['gorod' => $gor])->andWhere([ 'like', 'oblast', $reg])->andWhere([ 'like', 'typ_uchastka', $tip])->andWhere(['>=','plochad_uchastka',$p1])->orderBy(['data' => SORT_DESC]);
		        }elseif (!$p1&&!empty($tip)&&!empty($reg)&&!empty($gor)&&!empty($r)&&!empty($p2)){
			   $query = nedvigzemli::find()->andWhere(['raion' => $r])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'oblast', $reg])->andWhere([ 'like', 'typ_uchastka', $tip])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);
                } else { $query = nedvigzemli::find()->andWhere(['gorod' => $gor])->andWhere(['raion' => $r])->andWhere([ 'like', 'oblast', $reg])->andWhere([ 'like', 'typ_uchastka', $tip])->andWhere(['>=','plochad_uchastka',$p1])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
                }  
                          
          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		    $reg = $item;} }  

          if($gor){
		    $gorod1 = Goroda::find()->select('name')
						->where(['id' => $gor])
						->one();
            foreach($gorod1 as $item) {
		    $gor = $item;} } 			
		   
        $this ->setMeta('Поиск участка '. $tip .'. '. $reg);
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page');
		 if ($pag){
		 $this ->setMeta('Поиск участка '. $tip .'. '. $reg.' '.$gor.', страница '.$pag);
		 }else{
			$this ->setMeta('Поиск участка '. $tip .'. '. $reg.' '.$gor); 
		 }
        $nedvigzemli = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('nedvigzemli', 'pages', 'tip', 'r', 'reg', 'gor', 'p1', 'p2')); 
        
    }
	
	
	public function actionSearchigs(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';
        
        $tip = 'ИЖС';
      
         $query = nedvigzemli::find()->where([ 'like', 'typ_uchastka', $tip])->orderBy(['data' => SORT_DESC]);  
        
                          
          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		    $reg = $item;} }           
		
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page');
		 $this ->setMeta('Поиск участка ИЖС'.' '.$pag);
        $nedvigzemli = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('nedvigzemli', 'pages', 'tip', 'r', 'reg', 'gor', 'p1', 'p2')); 
        
    }
	
	public function actionSearchprom(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';
        
        $tip = 'Промназначения';
      
         $query = nedvigzemli::find()->where([ 'like', 'typ_uchastka', $tip])->orderBy(['data' => SORT_DESC]);  
        
                          
          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		    $reg = $item;} }           
		   
       
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page');
		 $this ->setMeta('Поиск участка Промназначения'.' '.$pag);
        $nedvigzemli = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('nedvigzemli', 'pages', 'tip', 'r', 'reg', 'gor', 'p1', 'p2')); 
        
    }
	
	public function actionSearchselh(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';
        
        $tip = 'Сельхозназначения';
      
         $query = nedvigzemli::find()->where([ 'like', 'typ_uchastka', $tip])->orderBy(['data' => SORT_DESC]);  
        
                          
          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		    $reg = $item;} }           
		
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page');
		 $this ->setMeta('Поиск участка Сельхозназначения'.' '.$pag);
        $nedvigzemli = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('nedvigzemli', 'pages', 'tip', 'r', 'reg', 'gor', 'p1', 'p2')); 
        
    }
	
	public function actionSearchsnt(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';
        
        $tip = 'Дачный/СНТ';
      
         $query = nedvigzemli::find()->where([ 'like', 'typ_uchastka', $tip])->orderBy(['data' => SORT_DESC]);  
        
                          
          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		    $reg = $item;} }           
		   
       
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page');
		 $this ->setMeta('Поиск участка Дачный/СНТ'.' '.$pag);
        $nedvigzemli = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('nedvigzemli', 'pages', 'tip', 'r', 'reg', 'gor', 'p1', 'p2')); 
        
    }
	
    }






