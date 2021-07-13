<?php

namespace app\controllers;
use app\modules\admin\models\Oblast;
use app\modules\admin\models\Goroda;
use app\models\Nedvigcategory;
use app\models\Nedvigdoma;
use yii\data\Pagination;
use Yii;


class NedvigdomaController extends AppController {
    
    public function actionView ($id) {
		$this->layout = '@app/views/layouts/nedvigview.php';
        $id = Yii::$app ->request ->get('id');
        $nedvigdoma = Nedvigdoma::findOne($id);
        if (empty($nedvigdoma)){
           throw new \yii\web\HttpException( 404, 'Такого товара нет или он еще не размещен.' ); 
        }
		
         $this ->setMeta( $nedvigdoma->vid_obiekta .' площадью '.$nedvigdoma -> plochad_doma . ' м.кв.' );
        return $this ->render('view', compact ('nedvigdoma'));   
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
		 
		  $query = Nedvigdoma::find()->where(['like', 'username', $username])->andWhere(['telephone' => $tel])->orderBy(['id' => SORT_DESC]);
		   	$this ->setMeta('Объявления: все дома/коттеджи/дачи от '. $username);
		  $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 24, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		  
       $doma = $query->offset($pages->offset)->limit($pages->limit)->all();
		 
        return $this -> render('searchprof', compact('doma', 'pages', 'tel', 'username')); 
	 }
	
	public function actionSearch1(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';                                               
        
        $p2 = '1500000';
	
        $query = Nedvigdoma::find()->where([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  

          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		    $reg = $item;} } 
				
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page');
		$this ->setMeta('Поиск дома до 1,5 млн.р.'.' '.$pag );
        $doma = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('doma', 'pages', 'reg', 'tip', 'gor', 'ra', 'p1', 'p2', 'p3')); 
        
    }
	
	public function actionSearch2(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';                                               
        
        $p2 = '2000000';
	
        $query = Nedvigdoma::find()->where([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  

          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		    $reg = $item;} } 
				
       
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page');
		$this ->setMeta('Поиск дома до 2 млн.р.'.' '.$pag );
        $doma = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('doma', 'pages', 'reg', 'tip', 'gor', 'ra', 'p1', 'p2', 'p3')); 
        
    }
	
	public function actionSearch3(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';                                               
        
        $p2 = '2500000';
	
        $query = Nedvigdoma::find()->where([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  

          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		    $reg = $item;} } 
				
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page');
		$this ->setMeta('Поиск дома до 2,5 млн.р.'.' '.$pag );
        $doma = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('doma', 'pages', 'reg', 'tip', 'gor', 'ra', 'p1', 'p2', 'p3')); 
        
    }
	
	public function actionSearch4(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';                                               
        
        $p2 = '3000000';
	
        $query = Nedvigdoma::find()->where([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  

          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		    $reg = $item;} } 
				
       
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page');
		$this ->setMeta('Поиск дома до 3 млн.р.'.' '.$pag );
        $doma = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('doma', 'pages', 'reg', 'tip', 'gor', 'ra', 'p1', 'p2', 'p3')); 
        
    }
	
	public function actionSearch5(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';                                               
        
        $p2 = '4000000';
	
        $query = Nedvigdoma::find()->where([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  

          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		    $reg = $item;} } 
				
       
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page');
		$this ->setMeta('Поиск дома до 4 млн.р.'.' '.$pag );
        $doma = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('doma', 'pages', 'reg', 'tip', 'gor', 'ra', 'p1', 'p2', 'p3')); 
        
    }
	
	public function actionSearch(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';                                               
        $reg = $_GET['Oblast']['oblast_region'];
        $tip = $_GET['Tipdoma']['id'];
		$gor = $_GET['Goroda']['name'];	
		$ra = $_GET['Raion']['raion'];
        $p1 = trim(Yii::$app->request->get('p1'));
        $p2 = trim(Yii::$app->request->get('p2'));
		$p3 = trim(Yii::$app->request->get('p3'));
        if (empty($p1) and empty($p2) and empty($p3) and empty($ra) and empty($gor) and empty($reg)){
			$query = Nedvigdoma::find()->where(['like', 'vid_obiekta', $tip])->orderBy(['data' => SORT_DESC]);
		    }elseif (empty($p1) and empty($p2) and empty($ra) and empty($gor) and empty($reg)){
			$query = Nedvigdoma::find()->where(['like', 'vid_obiekta', $tip])->andWhere([ 'like', 'adress', $p3])->orderBy(['data' => SORT_DESC]);
		    }elseif (empty($p1) and empty($p2) and empty($ra) and empty($gor)){
			$query = Nedvigdoma::find()->where(['like', 'vid_obiekta', $tip])->andWhere([ 'like', 'oblast', $reg])->andWhere([ 'like', 'adress', $p3])->orderBy(['data' => SORT_DESC]);
		    }elseif (empty($p1) and empty($p2) and empty($p3) and empty($ra) and empty($gor)){
			$query = Nedvigdoma::find()->where(['like', 'vid_obiekta', $tip])->andWhere([ 'like', 'oblast', $reg])->orderBy(['data' => SORT_DESC]);
		    }elseif(!$p1&&!$ra&&!$gor&&!$reg&&!empty($p2)&&!empty($p3)&&!empty($tip)){
	            $query = Nedvigdoma::find()->where(['like', 'vid_obiekta', $tip])->andWhere([ '<=','price',$p2])->andWhere([ 'like', 'adress', $p3])->orderBy(['data' => SORT_DESC]); 
		        }elseif(!$p1&&!$ra&&!$gor&&!$reg&&!empty($p2)&&!empty($tip)){
	            $query = Nedvigdoma::find()->where(['like', 'vid_obiekta', $tip])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]); 
		        }elseif(!$p1&&!$ra&&!$gor&&!empty($p2)&&!empty($p3)&&!empty($tip)&&!empty($reg)){
	            $query = Nedvigdoma::find()->where(['like', 'vid_obiekta', $tip])->andWhere([ 'like', 'oblast', $reg])->andWhere([ 'like', 'adress', $p3])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]); 
		        }elseif(!$p1&&!$ra&&!$gor&&!empty($p2)&&!empty($tip)&&!empty($reg)){
	            $query = Nedvigdoma::find()->where(['like', 'vid_obiekta', $tip])->andWhere([ 'like', 'oblast', $reg])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]); 
		        }elseif(!$p1&&!$p2&&!$ra&&!empty($gor)&&!empty($p3)&&!empty($reg)&&!empty($tip)){
			   $query = Nedvigdoma::find()->where(['like', 'vid_obiekta', $tip])->andWhere([ 'like', 'oblast', $reg])->andWhere([ 'like', 'adress', $p3])->andWhere(['gorod' => $gor])->orderBy(['data' => SORT_DESC]);  
                }elseif(!$p1&&!$p2&&!$ra&&!empty($gor)&&!empty($reg)&&!empty($tip)){
			   $query = Nedvigdoma::find()->where(['like', 'vid_obiekta', $tip])->andWhere([ 'like', 'oblast', $reg])->andWhere(['gorod' => $gor])->orderBy(['data' => SORT_DESC]);  
                }elseif(!$p1&&!$ra&&!empty($p2)&&!empty($gor)&&!empty($reg)&&!empty($tip)){
	            $query = Nedvigdoma::find()->where(['like', 'vid_obiekta', $tip])->andWhere([ '<=','price',$p2])->andWhere([ 'like', 'oblast', $reg])->andWhere(['gorod' => $gor])->orderBy(['data' => SORT_DESC]); 
		        }elseif(!$p1&&!$p3&&!$ra&&!empty($p2)&&!empty($gor)&&!empty($reg)&&!empty($tip)){
	            $query = Nedvigdoma::find()->where(['like', 'vid_obiekta', $tip])->andWhere([ '<=','price',$p2])->andWhere([ 'like', 'oblast', $reg])->andWhere(['gorod' => $gor])->orderBy(['data' => SORT_DESC]); 
		        }elseif(!$p2&&!$ra&&!empty($p1)&&!empty($p3)&&!empty($gor)&&!empty($reg)&&!empty($tip)){
	            $query = Nedvigdoma::find()->where(['like', 'vid_obiekta', $tip])->andWhere([ '<=','price',$p2])->andWhere([ 'like', 'adress', $p3])->andWhere([ 'like', 'oblast', $reg])->andWhere(['gorod' => $gor])->orderBy(['data' => SORT_DESC]); 
		        }elseif(!$gor&&!$p3&&!$ra&&!empty($p2)&&!empty($p1)&&!empty($reg)&&!empty($tip)){
	            $query = Nedvigdoma::find()->where(['like', 'vid_obiekta', $tip])->andWhere([ '<=','price',$p2])->andWhere(['>=','plochad_doma',$p1])->andWhere([ 'like', 'oblast', $reg])->orderBy(['data' => SORT_DESC]); 
		        }elseif(!$gor&&!$ra&&!empty($p2)&&!empty($p1)&&!empty($p3)&&!empty($reg)&&!empty($tip)){
	            $query = Nedvigdoma::find()->where(['like', 'vid_obiekta', $tip])->andWhere([ '<=','price',$p2])->andWhere([ 'like', 'adress', $p3])->andWhere(['>=','plochad_doma',$p1])->andWhere([ 'like', 'oblast', $reg])->orderBy(['data' => SORT_DESC]); 
		        }elseif(!$ra&&!empty($p2)&&!empty($p1)&&!empty($p3)&&!empty($gor)&&!empty($reg)&&!empty($tip)){
	            $query = Nedvigdoma::find()->where(['like', 'vid_obiekta', $tip])->andWhere([ '<=','price',$p2])->andWhere([ 'like', 'adress', $p3])->andWhere(['>=','plochad_doma',$p1])->andWhere([ 'like', 'oblast', $reg])->andWhere(['gorod' => $gor])->orderBy(['data' => SORT_DESC]); 
		        }elseif(!$ra&&!$p3&&!empty($p2)&&!empty($p1)&&!empty($gor)&&!empty($reg)&&!empty($tip)){
	            $query = Nedvigdoma::find()->where(['like', 'vid_obiekta', $tip])->andWhere([ '<=','price',$p2])->andWhere(['>=','plochad_doma',$p1])->andWhere([ 'like', 'oblast', $reg])->andWhere(['gorod' => $gor])->orderBy(['data' => SORT_DESC]); 
		        }else if (!$p1&&!$p3&&!empty($p2)&&!empty($ra)&&!empty($gor)&&!empty($reg)&&!empty($tip)){
			    $query = Nedvigdoma::find()->where(['like', 'vid_obiekta', $tip])->andWhere(['gorod' => $gor])->andWhere(['raion' => $ra])->andWhere([ 'like', 'oblast', $reg])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);
                }else if (!$p1&&!empty($p2)&&!empty($p3)&&!empty($ra)&&!empty($gor)&&!empty($reg)&&!empty($tip)){
			    $query = Nedvigdoma::find()->where(['like', 'vid_obiekta', $tip])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'adress', $p3])->andWhere(['raion' => $ra])->andWhere([ 'like', 'oblast', $reg])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);
                }else if (!$p2&&!empty($p1)&&!empty($ra)&&!empty($p3)&&!empty($gor)&&!empty($reg)&&!empty($tip)){
			    $query = Nedvigdoma::find()->where(['like', 'vid_obiekta', $tip])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'adress', $p3])->andWhere(['raion' => $ra])->andWhere([ 'like', 'oblast', $reg])->andWhere(['>=','plochad_doma',$p1])->orderBy(['data' => SORT_DESC]);
	            }else if (!$p2&&!$p3&&!empty($p1)&&!empty($ra)&&!empty($gor)&&!empty($reg)&&!empty($tip)){
			    $query = Nedvigdoma::find()->where(['like', 'vid_obiekta', $tip])->andWhere(['gorod' => $gor])->andWhere(['raion' => $ra])->andWhere([ 'like', 'oblast', $reg])->andWhere(['>=','plochad_doma',$p1])->orderBy(['data' => SORT_DESC]);
	            }else if (!$p2&&!$p1&&!empty($ra)&&!empty($gor)&&!empty($p3)&&!empty($reg)&&!empty($tip)){
			    $query = Nedvigdoma::find()->where(['like', 'vid_obiekta', $tip])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'adress', $p3])->andWhere(['raion' => $ra])->andWhere([ 'like', 'oblast', $reg])->andWhere(['>=','plochad_doma',$p1])->orderBy(['data' => SORT_DESC]);
	            }else if (!$p2&&!$p1&&!$p3&&!empty($ra)&&!empty($gor)&&!empty($reg)&&!empty($tip)){
			    $query = Nedvigdoma::find()->where(['like', 'vid_obiekta', $tip])->andWhere(['gorod' => $gor])->andWhere(['raion' => $ra])->andWhere([ 'like', 'oblast', $reg])->andWhere(['>=','plochad_doma',$p1])->orderBy(['data' => SORT_DESC]);
	            }else if (!$p1&&!$gor&&!$ra&&!empty($reg)&&!empty($tip)&&!empty($p2)&&!empty($p3)){
			    $query = Nedvigdoma::find()->where(['like', 'vid_obiekta', $tip])->andWhere([ 'like', 'oblast', $reg])->andWhere([ 'like', 'adress', $p3])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);
	            }else if (!$p1&&!$gor&&!$ra&&!$p3&&!empty($reg)&&!empty($tip)&&!empty($p2)){
			    $query = Nedvigdoma::find()->where(['like', 'vid_obiekta', $tip])->andWhere([ 'like', 'oblast', $reg])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);
	            }else if (!$p2&&!$gor&&!$ra&&!$p3&&!empty($reg)&&!empty($tip)&&!empty($p1)){
			    $query = Nedvigdoma::find()->where(['like', 'vid_obiekta', $tip])->andWhere([ 'like', 'oblast', $reg])->andWhere(['>=','plochad_doma',$p1])->orderBy(['data' => SORT_DESC]);
	            }else if (!$p2&&!$ra&&!$p3&&!empty($reg)&&!empty($gor)&&!empty($tip)&&!empty($p1)){
			    $query = Nedvigdoma::find()->where(['like', 'vid_obiekta', $tip])->andWhere([ 'like', 'oblast', $reg])->andWhere(['gorod' => $gor])->andWhere(['>=','plochad_doma',$p1])->orderBy(['data' => SORT_DESC]);
	            }else { $query = Nedvigdoma::find()->where(['like', 'vid_obiekta', $tip])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'adress', $p3])->andWhere(['raion' => $ra])->andWhere([ 'like', 'oblast', $reg])->andWhere(['>=','plochad_doma',$p1])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
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
				
      
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page');
		 if ($pag){
		  $this ->setMeta('Поиск '. $tip. 'а. '. $reg.' '.$gor.'страница '.$pag  );
		 }else{
			 $this ->setMeta('Поиск '. $tip. 'а. '. $reg.' '.$gor ); 
		 }
        $doma = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('doma', 'pages', 'reg', 'tip', 'gor', 'ra', 'p1', 'p2', 'p3')); 
        
    }
	
	
	
    }
	
 

?>