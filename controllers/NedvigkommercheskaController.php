<?php

namespace app\controllers;
use app\modules\admin\models\Oblast;
use app\models\Nedvigcategory;
use app\models\NedvigKommercheska;
use yii\data\Pagination;
use Yii;
use GeoIp2\Database\Reader;

class NedvigkommercheskaController extends AppController {
    
    public function actionView ($id) {
		$this->layout = '@app/views/layouts/nedvigview.php';
        $id = Yii::$app ->request ->get('id');
        $nedvigkommercheska = nedvigkommercheska::findOne($id);
        if (empty($nedvigkommercheska)){
           throw new \yii\web\HttpException( 404, 'Такого товара нет или он еще не размещен.' ); 
        }
				
         //$hits = Nedvigkommercheska::find()->where(['hit'=>'1'])->limit(8)->all();
         $this ->setMeta('коммерческая недвижимость, '. $nedvigkommercheska-> type_nedvigimosty );
        return $this ->render('view', compact ('nedvigkommercheska'));   
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
		 
		  $query = Nedvigkommercheska::find()->where(['like', 'username', $username])->andWhere(['telephone' => $tel])->orderBy(['id' => SORT_DESC]);
		   	$this ->setMeta('Объявления: вся коммерческая недвижимость от '. $username);
		  $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 24, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $nedvigkomm = $query->offset($pages->offset)->limit($pages->limit)->all();
		 
        return $this -> render('searchprof', compact('nedvigkomm', 'pages', 'tel', 'username')); 
	 }
	
	public function actionSearch(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';
        $reg = $_GET['Oblast']['oblast_region'];
		$gor = $_GET['Goroda']['name'];
        $r = $_GET['Raion']['raion'];		
        $op = $_GET['Operaciya']['id'];
        $tip = $_GET['Kommtip']['id'];
        $p1 = trim(Yii::$app->request->get('p1'));
        $p2 = trim(Yii::$app->request->get('p2'));
        if (!$p1&&!$p2&&!$gor&&!$r&&!$reg&&!empty($tip)&&!empty($op)){
	    $query = nedvigkommercheska::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'type_nedvigimosty', $tip])->orderBy(['data' => SORT_DESC]);
                }elseif(!$p1&&!$p2&&!$r&&!$gor&&!empty($reg)&&!empty($tip)&&!empty($op)){
                $query = nedvigkommercheska::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'type_nedvigimosty', $tip])->andWhere([ 'like', 'oblast', $reg])->orderBy(['data' => SORT_DESC]);
		        }elseif(!$reg&&!$p2&&!$r&&!$gor&&!empty($tip)&&!empty($op)&&!empty($p1)){
                $query = nedvigkommercheska::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'type_nedvigimosty', $tip])->andWhere([ 'like', 'oblast', $reg])->orderBy(['data' => SORT_DESC]);
		        }elseif(!$reg&&!$p1&&!$r&&!$gor&&!empty($tip)&&!empty($op)&&!empty($p2)){
                $query = nedvigkommercheska::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'type_nedvigimosty', $tip])->andWhere([ 'like', 'oblast', $reg])->orderBy(['data' => SORT_DESC]);
		        }elseif(!$p1&&!$p2&&!$r&&!empty($reg)&&!empty($gor)&&!empty($tip)&&!empty($op)){
                $query = nedvigkommercheska::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'type_nedvigimosty', $tip])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'oblast', $reg])->orderBy(['data' => SORT_DESC]);
		        } elseif(!p1&&!$p2&&!empty($reg)&&!empty($gor)&&!empty($r)&&!empty($tip)&&!empty($op)){
                $query = nedvigkommercheska::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'type_nedvigimosty', $tip])->andWhere(['gorod' => $gor])->andWhere(['raion' => $r])->andWhere([ 'like', 'oblast', $reg])->orderBy(['data' => SORT_DESC]);
		        }elseif(!$p2&&!empty($reg)&&!empty($gor)&&!empty($r)&&!empty($tip)&&!empty($op)&&!empty($p1)){
                $query = nedvigkommercheska::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'type_nedvigimosty', $tip])->andWhere(['gorod' => $gor])->andWhere(['raion' => $r])->andWhere([ 'like', 'oblast', $reg])->andWhere(['>=','plochad',$p1])->orderBy(['data' => SORT_DESC]);
		        }elseif (!$p1&&!empty($reg)&&!empty($gor)&&!empty($r)&&!empty($tip)&&!empty($op)&&!empty($p2)){
			    $query = nedvigkommercheska::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'type_nedvigimosty', $tip])->andWhere(['gorod' => $gor])->andWhere(['raion' => $r])->andWhere([ 'like', 'oblast', $reg])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);
                } else { $query = nedvigkommercheska::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'type_nedvigimosty', $tip])->andWhere(['gorod' => $gor])->andWhere(['raion' => $r])->andWhere([ 'like', 'oblast', $reg])->andWhere(['>=','plochad',$p1])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
                }  

           if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		    $reg = $item;} } 
				
       
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page');
		 $this ->setMeta('Поиск коммерческой недвижимости: '. $tip. '. '. $reg.' '.$pag );
        $nedvigkomm = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('nedvigkomm', 'pages', 'tip', 'op', 'p1', 'reg', 'p2', 'gor', 'r')); 
        
    }
	
	
	public function actionSearchofis(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';
        
        $tip = 'Офисное';
        $query = nedvigkommercheska::find()->where([ 'like', 'type_nedvigimosty', $tip])->orderBy(['data' => SORT_DESC]);  
             
           if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		    $reg = $item;} } 
				
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page');
		$this ->setMeta('Поиск офисного помещения'.' '.$pag );
        $nedvigkomm = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('nedvigkomm', 'pages', 'tip', 'op', 'p1', 'reg', 'p2', 'gor', 'r')); 
        
    }
	
	public function actionSearchtorg(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';
        
        $tip = 'Торговое';
        $query = nedvigkommercheska::find()->where([ 'like', 'type_nedvigimosty', $tip])->orderBy(['data' => SORT_DESC]);  
             
           if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		    $reg = $item;} } 
		
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page');
		$this ->setMeta('Поиск торгового помещения'.' '.$pag );
        $nedvigkomm = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('nedvigkomm', 'pages', 'tip', 'op', 'p1', 'reg', 'p2', 'gor', 'r')); 
        
    }
	
	public function actionSearchsvobod(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';
        
        $tip = 'Свободного типа';
        $query = nedvigkommercheska::find()->where([ 'like', 'type_nedvigimosty', $tip])->orderBy(['data' => SORT_DESC]);  
             
           if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		    $reg = $item;} } 
				
        $this ->setMeta('Поиск помещения свободного типа' );
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page');
		$this ->setMeta('Поиск помещения свободного типа'.' '.$pag );
        $nedvigkomm = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('nedvigkomm', 'pages', 'tip', 'op', 'p1', 'reg', 'p2', 'gor', 'r')); 
        
    }
	
	public function actionSearchgostin(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';
        
        $tip = 'Гостиничное';
        $query = nedvigkommercheska::find()->where([ 'like', 'type_nedvigimosty', $tip])->orderBy(['data' => SORT_DESC]);  
             
           if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		    $reg = $item;} } 
				
       
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page');
		$this ->setMeta('Поиск помещения гостиничного типа'.' '.$pag );
        $nedvigkomm = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('nedvigkomm', 'pages', 'tip', 'op', 'p1', 'reg', 'p2', 'gor', 'r')); 
        
    }
	
	public function actionSearchsklad(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';
        
        $tip = 'Складское';
        $query = nedvigkommercheska::find()->where([ 'like', 'type_nedvigimosty', $tip])->orderBy(['data' => SORT_DESC]);  
             
           if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		    $reg = $item;} } 
				
       
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page');
		$this ->setMeta('Поиск склада'.' '.$pag );
        $nedvigkomm = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('nedvigkomm', 'pages', 'tip', 'op', 'p1', 'reg', 'p2', 'gor', 'r')); 
        
    }
	
	public function actionSearchproizvod(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';
        
        $tip = 'Производственное';
        $query = nedvigkommercheska::find()->where([ 'like', 'type_nedvigimosty', $tip])->orderBy(['data' => SORT_DESC]);  
             
           if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		    $reg = $item;} } 
		
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page');
		$this ->setMeta('Поиск производственного помещения'.' '.$pag );
        $nedvigkomm = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('nedvigkomm', 'pages', 'tip', 'op', 'p1', 'reg', 'p2', 'gor', 'r')); 
        
    }
	
	public function actionSearchgaragi(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';
        
        $tip = 'Гаражного типа';
        $query = nedvigkommercheska::find()->where([ 'like', 'type_nedvigimosty', $tip])->orderBy(['data' => SORT_DESC]);  
             
           if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		    $reg = $item;} } 
		
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page');
		$this ->setMeta('Поиск помещения гаражного типа'.' '.$pag );
        $nedvigkomm = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('nedvigkomm', 'pages', 'tip', 'op', 'p1', 'reg', 'p2', 'gor', 'r')); 
        
    }
	
    }




