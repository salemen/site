<?php

namespace app\controllers;
use app\modules\admin\models\Oblast;
use app\modules\admin\models\Goroda;
use app\models\Nedvigcategory;
use app\models\NedvigKvartiri;
use yii\data\Pagination;
use Yii;
use GeoIp2\Database\Reader;

class NedvigkvartiriController extends AppController {
    
    public function actionView ($id) {
		$this->layout = '@app/views/layouts/nedvigview.php';
        $id = Yii::$app ->request ->get('id');
        $nedvigkvartiri = nedvigkvartiri::findOne($id);
		 $nedvigcategory = nedvigcategory::find()->select('description')->one();
        if (empty($nedvigkvartiri)){
           throw new \yii\web\HttpException( 404, 'Такого товара нет или он еще не размещен.' ); 
        }
		//<!-----ОПРЕДЕЛЕНИЕ IP АДРЕСА И РЕГИОНА-->
											
										
 /* require_once Yii::$app->basePath . "/vendor/geoip2/geoip2/geoip2.phar";
require_once Yii::$app->basePath . "/vendor/autoload.php";
// This creates the Reader object, which should be reused across
// lookups.
$reader = new Reader (Yii::$app->basePath ."/vendor/geoip2/geoip2/GeoLite2-City.mmdb");

// Replace "city" with the appropriate method for your database, e.g.,
// "country".
$ip = Yii::$app->request->userIP;
$record = $reader->city($ip);
$key = "$ip";
$obl = $record->mostSpecificSubdivision->name;
$obl1 = 'Saratovskaya Oblast';

$obl2 = strpos($obl, $obl1);

  if ($obl2 === false){
	
} else {
	$oblast_reg = 64;
} 

$obl1 = 'Krasnodarskiy Kray';
$obl2 = strpos($obl, $obl1);

if ($obl2 === false){
	
} else {
	$oblast_reg = 23; 	
}
$cache = Yii::$app->cache;
$cache->set($key, $oblast_reg);
 //<!---------------->
        if (!$oblast_reg||$oblast_reg===0||$oblast_reg==0){
              $hits = Nedvigkvartiri::find()->where(['hit'=>'1'])->orderBy('RAND()')->limit(16)->all();
			  }else {$hits = Nedvigkvartiri::find()->where(['hit'=>'1'])->andWhere(['Like', 'oblast_region',  $oblast_reg])
			  ->orderBy('RAND()')->limit(16)->all();}
         //$hits = Nedvigkvartiri::find()->where(['hit'=>'1'])->limit(8)->all(); */
         $this ->setMeta('SaleMen '. $nedvigkvartiri->type, $nedvigkvartiri->operaciya );
        return $this ->render('view', compact ('nedvigkvartiri','nedvigcategory'));   
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
		 
		  $query = Nedvigkvartiri::find()->where(['like', 'username', $username])->andWhere(['telephone' => $tel])->orderBy(['id' => SORT_DESC]);
		  
		  $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 24, 'forcePageParam'=> false, 'pageSizeParam'=> false ]); 
		  $pag = Yii::$app->request->get('page'); 
		  $this ->setMeta('Объявления: все квартиры от '. $username.' '.$pag);
        $kvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
		 
        return $this -> render('searchprof', compact('kvartiri', 'pages', 'tel', 'username')); 
	 }
	
	 public function actionSearch(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';                                               
        $op = $_GET['Operaciya']['id'];
		$reg = $_GET['Oblast']['oblast_region'];
		$gor = $_GET['Goroda']['name'];
        $r = $_GET['Raion']['raion'];
        $vid = $_GET['Vidnedvig']['id'];
        $k = $_GET['Komnat']['id'];
        $p1 = trim(Yii::$app->request->get('p1'));
        $p2 = trim(Yii::$app->request->get('p2'));
		$p3 = trim(Yii::$app->request->get('p3'));
		$p4 = trim(Yii::$app->request->get('p4'));
        if (!$p1&&!$p2&&!$r&&!$gor&&!$reg&&!$p3&&!$p4){
	   $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'kolichestvo_komnat', $k])->orderBy(['data' => SORT_DESC]);
                }elseif (!$p1&&!$p2&&!$r&&!$gor&&!$reg&&!$p3){
	   $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'street', $p4])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'kolichestvo_komnat', $k])->orderBy(['data' => SORT_DESC]);
                } elseif(!$p1&&!$p2&&!$p3&&!$r&&!$gor&&!$p4){
               $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ 'like', 'oblast_region', $reg])->orderBy(['data' => SORT_DESC]);
		        }elseif(!$p1&&!$p2&&!$p3&&!$r&&!$gor){
               $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'street', $p4])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ 'like', 'oblast_region', $reg])->orderBy(['data' => SORT_DESC]);
		        } elseif(!$p1&&!$p2&&!$r&&!$gor&&!$reg&&!$p4){
               $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'opisanie', $p3])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ 'like', 'oblast_region', $reg])->orderBy(['data' => SORT_DESC]);
		        }elseif(!$p1&&!$p2&&!$r&&!$gor&&!$reg){
               $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'street', $p4])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'opisanie', $p3])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ 'like', 'oblast_region', $reg])->orderBy(['data' => SORT_DESC]);
		        }elseif(!$p1&&!$p2&&!$p3&&!$r&&!$p4){
               $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ 'like', 'oblast_region', $reg])->orderBy(['data' => SORT_DESC]);
		        }elseif(!$p1&&!$p2&&!$p3&&!$r){
               $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'street', $p4])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ 'like', 'oblast_region', $reg])->orderBy(['data' => SORT_DESC]);
		        }elseif(!$p2&&!$p3&&!$r&&!$gor&&!$p4){
                $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'oblast_region', $reg])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere(['>=','plochad_obchy',$p1])->orderBy(['data' => SORT_DESC]);
		        }elseif(!$p2&&!$p3&&!$r&&!$gor){
                $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'street', $p4])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'oblast_region', $reg])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere(['>=','plochad_obchy',$p1])->orderBy(['data' => SORT_DESC]);
		        }elseif(!$p2&&!$p1&&!$r&&!$gor&&!$p4){
                $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'oblast_region', $reg])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ 'like', 'opisanie', $p3])->orderBy(['data' => SORT_DESC]);
		        }elseif(!$p2&&!$p1&&!$r&&!$gor){
                $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'street', $p4])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'oblast_region', $reg])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ 'like', 'opisanie', $p3])->orderBy(['data' => SORT_DESC]);
		        }elseif (!$p1&&!$r&&!$gor&&!$p4){
			   $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'oblast_region', $reg])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);
                }elseif (!$p1&&!$r&&!$gor){
			   $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'street', $p4])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'oblast_region', $reg])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);
                }elseif (!$r&&!$gor&&!$p3&&!$p4){
			   $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'oblast_region', $reg])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->andWhere(['>=','plochad_obchy',$p1])->orderBy(['data' => SORT_DESC]);
         	    }elseif (!$r&&!$gor&&!$p3){
			   $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'street', $p4])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'oblast_region', $reg])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->andWhere(['>=','plochad_obchy',$p1])->orderBy(['data' => SORT_DESC]);
         	    } elseif (!$p1&&!$p2&&!$p3&&!$p4){
			   $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'oblast_region', $reg])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere(['raion' => $r])->andWhere(['gorod' => $gor])->orderBy(['data' => SORT_DESC]);
         	    }elseif (!$p1&&!$p2&&!$p3){
			   $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'street', $p4])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'oblast_region', $reg])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere(['raion' => $r])->andWhere(['gorod' => $gor])->orderBy(['data' => SORT_DESC]);
         	    } elseif (!$r&&!$p1&&!$p3&&!$p4){
			    $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'oblast_region', $reg])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
                }elseif (!$r&&!$p1&&!$p3){
			    $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'street', $p4])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'oblast_region', $reg])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
                }elseif (!$r&&!$p2&&!$p3&&!$p4){
			    $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'oblast_region', $reg])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere(['>=','plochad_obchy',$p1])->orderBy(['data' => SORT_DESC]);  
                }elseif (!$r&&!$p2&&!$p3){
			    $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'street', $p4])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'oblast_region', $reg])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere(['>=','plochad_obchy',$p1])->orderBy(['data' => SORT_DESC]);  
                }elseif (!$r&&!$p2&&!$p4){
			    $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'oblast_region', $reg])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ 'like', 'opisanie', $p3])->andWhere(['>=','plochad_obchy',$p1])->orderBy(['data' => SORT_DESC]);  
                }elseif (!$r&&!$p2){
			    $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'street', $p4])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'oblast_region', $reg])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ 'like', 'opisanie', $p3])->andWhere(['>=','plochad_obchy',$p1])->orderBy(['data' => SORT_DESC]);  
                }elseif (!$r&&!$p1&&!$p4){
			    $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'oblast_region', $reg])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ 'like', 'opisanie', $p3])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
                }elseif (!$r&&!$p1){
			    $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'street', $p4])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'oblast_region', $reg])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ 'like', 'opisanie', $p3])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
                }elseif (!$p1&&!$p2&&!$p4){
			   $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'oblast_region', $reg])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ 'like', 'opisanie', $p3])->andWhere(['raion' => $r])->andWhere(['gorod' => $gor])->orderBy(['data' => SORT_DESC]);
         	    }elseif (!$p1&&!$p2){
			   $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'street', $p4])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'oblast_region', $reg])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ 'like', 'opisanie', $p3])->andWhere(['raion' => $r])->andWhere(['gorod' => $gor])->orderBy(['data' => SORT_DESC]);
         	    }elseif (!$r&&!$gor&&!$p4){
			   $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'oblast_region', $reg])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ 'like', 'opisanie', $p3])->andWhere([ '<=','price',$p2])->andWhere(['>=','plochad_obchy',$p1])->orderBy(['data' => SORT_DESC]);
         	    }elseif (!$r&&!$gor){
			   $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'street', $p4])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'oblast_region', $reg])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ 'like', 'opisanie', $p3])->andWhere([ '<=','price',$p2])->andWhere(['>=','plochad_obchy',$p1])->orderBy(['data' => SORT_DESC]);
         	    }elseif(!$p2&&!$r&&!$gor&&!$p4){
                $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'oblast_region', $reg])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ 'like', 'opisanie', $p3])->andWhere(['>=','plochad_obchy',$p1])->orderBy(['data' => SORT_DESC]);
		        }elseif(!$p2&&!$r&&!$gor){
                $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'street', $p4])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'oblast_region', $reg])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ 'like', 'opisanie', $p3])->andWhere(['>=','plochad_obchy',$p1])->orderBy(['data' => SORT_DESC]);
		        }elseif(!$p1&&!$p2&&!$r&&!$p4){
               $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ 'like', 'opisanie', $p3])->andWhere([ 'like', 'oblast_region', $reg])->orderBy(['data' => SORT_DESC]);
		        }elseif(!$p1&&!$p2&&!$r){
               $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'street', $p4])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ 'like', 'opisanie', $p3])->andWhere([ 'like', 'oblast_region', $reg])->orderBy(['data' => SORT_DESC]);
		        }  else { $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'street', $p4])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere(['raion' => $r])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'oblast_region', $reg])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere(['>=','plochad_obchy',$p1])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
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
		 $this ->setMeta('Поиск '. $k .' комнатных квартир. '. $reg.', '.$gor.' страница '.$pag);
		 }else {
			 $this ->setMeta('Поиск '. $k .' комнатных квартир. '. $reg.', '.$gor); 
		 }
        $kvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('kvartiri', 'pages', 'r', 'p1', 'p2', 'p3', 'p4', 'vid', 'k', 'op', 'gor', 'reg')); 
        
    }
	
	public function actionSearch1(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';  
        $op = 'продажа';
        $k = '1';	
        $p2 = '1500000';		
        $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
                    
          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		  $reg = $item;} }
		 
		
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page'); 
		$this ->setMeta('Поиск 1 комнатных квартир с ценой до 1,5млн.р. на продажу'.' '.$pag);
        $kvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('kvartiri', 'pages', 'r', 'p1', 'p2', 'p3', 'p4', 'vid', 'k', 'op', 'gor', 'reg')); 
        
    }
	
	public function actionSearch2(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';  
        $op = 'продажа';
        $k = '1';
        $p2 = '2000000';		
        $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
                    
          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		  $reg = $item;} }
		 
		
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page'); 
		$this ->setMeta('Поиск 1 комнатных квартир с ценой до 2млн.р. на продажу'.' '.$pag);
        $kvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('kvartiri', 'pages', 'r', 'p1', 'p2', 'p3', 'p4', 'vid', 'k', 'op', 'gor', 'reg')); 
        
    }
	
	public function actionSearch3(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';  
        $op = 'продажа';
        $k = '1';	
        $p2 = '2500000';		
        $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
                    
          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		  $reg = $item;} }
		 
		
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page'); 
		$this ->setMeta('Поиск 1 комнатных квартир с ценой до 2,5млн.р. на продажу'.' '.$pag);
        $kvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('kvartiri', 'pages', 'r', 'p1', 'p2', 'p3', 'p4', 'vid', 'k', 'op', 'gor', 'reg')); 
        
    }
	
	public function actionSearch4(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';  
        $op = 'продажа';
        $k = '1';	
        $p2 = '3000000';		
        $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
                    
          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		  $reg = $item;} }
		 
		
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page'); 
		$this ->setMeta('Поиск 1 комнатных квартир с ценой до 3млн.р. на продажу'.' '.$pag);
        $kvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('kvartiri', 'pages', 'r', 'p1', 'p2', 'p3', 'p4', 'vid', 'k', 'op', 'gor', 'reg')); 
        
    }
	
	public function actionSearch5(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';  
        $op = 'продажа';
        $k = '1';	
        $p2 = '4000000';		
        $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
                    
          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		  $reg = $item;} }
		 
		
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page'); 
		$this ->setMeta('Поиск 1 комнатных квартир с ценой до 4млн.р. на продажу'.' '.$pag);
        $kvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('kvartiri', 'pages', 'r', 'p1', 'p2', 'p3', 'p4', 'vid', 'k', 'op', 'gor', 'reg')); 
        
    }
	
	
	public function actionSearch21(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';  
        $op = 'продажа';
        $k = '2';	
        $p2 = '1500000';		
        $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
                    
          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		  $reg = $item;} }
		 
		
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page'); 
		$this ->setMeta('Поиск 2 комнатных квартир с ценой до 1,5млн.р. на продажу'.' '.$pag);
        $kvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('kvartiri', 'pages', 'r', 'p1', 'p2', 'p3', 'p4', 'vid', 'k', 'op', 'gor', 'reg')); 
        
    }
	
	public function actionSearch22(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';  
        $op = 'продажа';
        $k = '2';
        $p2 = '2000000';		
        $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
                    
          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		  $reg = $item;} }
		 
		
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page'); 
		$this ->setMeta('Поиск 2 комнатных квартир с ценой до 2млн.р. на продажу'.' '.$pag);
        $kvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('kvartiri', 'pages', 'r', 'p1', 'p2', 'p3', 'p4', 'vid', 'k', 'op', 'gor', 'reg')); 
        
    }
	
	public function actionSearch23(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';  
        $op = 'продажа';
        $k = '2';	
        $p2 = '2500000';		
        $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
                    
          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		  $reg = $item;} }
		 
		
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page'); 
		$this ->setMeta('Поиск 2 комнатных квартир с ценой до 2,5млн.р. на продажу'.' '.$pag);
        $kvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('kvartiri', 'pages', 'r', 'p1', 'p2', 'p3', 'p4', 'vid', 'k', 'op', 'gor', 'reg')); 
        
    }
	
	public function actionSearch24(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';  
        $op = 'продажа';
        $k = '2';	
        $p2 = '3000000';		
        $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
                    
          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		  $reg = $item;} }
		 
		
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page'); 
		$this ->setMeta('Поиск 2 комнатных квартир с ценой до 3млн.р. на продажу'.' '.$pag);
        $kvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('kvartiri', 'pages', 'r', 'p1', 'p2', 'p3', 'p4', 'vid', 'k', 'op', 'gor', 'reg')); 
        
    }
	
	public function actionSearch25(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';  
        $op = 'продажа';
        $k = '2';	
        $p2 = '4000000';		
        $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
                    
          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		  $reg = $item;} }
		 
		
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page'); 
		$this ->setMeta('Поиск 2 комнатных квартир с ценой до 4млн.р. на продажу'.' '.$pag);
        $kvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('kvartiri', 'pages', 'r', 'p1', 'p2', 'p3', 'p4', 'vid', 'k', 'op', 'gor', 'reg')); 
        
    }
	
	public function actionSearch31(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';  
        $op = 'продажа';
        $k = '3';	
        $p2 = '1500000';		
        $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
                    
          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		  $reg = $item;} }
		 
		
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page'); 
		$this ->setMeta('Поиск 3 комнатных квартир с ценой до 1,5млн.р. на продажу'.' '.$pag);
        $kvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('kvartiri', 'pages', 'r', 'p1', 'p2', 'p3', 'p4', 'vid', 'k', 'op', 'gor', 'reg')); 
        
    }
	
	public function actionSearch40(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';  
        $op = 'продажа';
        $k = '3';
        $p2 = '2000000';		
        $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
                    
          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		  $reg = $item;} }
		 
		
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page'); 
		$this ->setMeta('Поиск 3 комнатных квартир с ценой до 2млн.р. на продажу'.' '.$pag);
        $kvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('kvartiri', 'pages', 'r', 'p1', 'p2', 'p3', 'p4', 'vid', 'k', 'op', 'gor', 'reg')); 
        
    }
	
	public function actionSearch33(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';  
        $op = 'продажа';
        $k = '3';	
        $p2 = '2500000';		
        $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
                    
          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		  $reg = $item;} }
		 
		
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page'); 
		$this ->setMeta('Поиск 3 комнатных квартир с ценой до 2,5млн.р. на продажу'.' '.$pag);
        $kvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('kvartiri', 'pages', 'r', 'p1', 'p2', 'p3', 'p4', 'vid', 'k', 'op', 'gor', 'reg')); 
        
    }
	
	public function actionSearch34(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';  
        $op = 'продажа';
        $k = '3';	
        $p2 = '3000000';		
        $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
                    
          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		  $reg = $item;} }
		 
		
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page'); 
		$this ->setMeta('Поиск 3 комнатных квартир с ценой до 3млн.р. на продажу'.' '.$pag);
        $kvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('kvartiri', 'pages', 'r', 'p1', 'p2', 'p3', 'p4', 'vid', 'k', 'op', 'gor', 'reg')); 
        
    }
	
	public function actionSearch35(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';  
        $op = 'продажа';
        $k = '3';	
        $p2 = '4000000';		
        $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
                    
          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		  $reg = $item;} }
		 
		
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page'); 
		$this ->setMeta('Поиск 3 комнатных квартир с ценой до 4млн.р. на продажу'.' '.$pag);
        $kvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
		$ads = 'poisk_3_komnatnih_kvartir_do4_mlnrub';
        return $this -> render('search', compact('kvartiri', 'pages', 'r', 'p1', 'p2', 'p3', 'p4', 'vid', 'k', 'op', 'gor', 'reg','ads')); 
        
    }
	
	
	public function actionSearch41(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';  
        $op = 'продажа';
        $k = '4';	
        $p2 = '1500000';		
        $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
                    
          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		  $reg = $item;} }
		 
		
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page'); 
		$this ->setMeta('Поиск 4 комнатных квартир с ценой до 1,5млн.р. на продажу'.' '.$pag);
        $kvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('kvartiri', 'pages', 'r', 'p1', 'p2', 'p3', 'p4', 'vid', 'k', 'op', 'gor', 'reg')); 
        
    }
	
	public function actionSearch42(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';  
        $op = 'продажа';
        $k = '4';
        $p2 = '2000000';		
        $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
                    
          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		  $reg = $item;} }
		 
		
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page'); 
		$this ->setMeta('Поиск 4 комнатных квартир с ценой до 2млн.р. на продажу'.' '.$pag);
        $kvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('kvartiri', 'pages', 'r', 'p1', 'p2', 'p3', 'p4', 'vid', 'k', 'op', 'gor', 'reg')); 
        
    }
	
	public function actionSearch43(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';  
        $op = 'продажа';
        $k = '4';	
        $p2 = '2500000';		
        $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
                    
          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		  $reg = $item;} }
		 
		
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page'); 
		$this ->setMeta('Поиск 4 комнатных квартир с ценой до 2,5млн.р. на продажу'.' '.$pag);
        $kvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('kvartiri', 'pages', 'r', 'p1', 'p2', 'p3', 'p4', 'vid', 'k', 'op', 'gor', 'reg')); 
        
    }
	
	public function actionSearch44(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';  
        $op = 'продажа';
        $k = '4';	
        $p2 = '3000000';		
        $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
                    
          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		  $reg = $item;} }
		 
		
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page'); 
		$this ->setMeta('Поиск 4 комнатных квартир с ценой до 3 млн.р., на продажу'.' '.$pag);
        $kvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('kvartiri', 'pages', 'r', 'p1', 'p2', 'p3', 'p4', 'vid', 'k', 'op', 'gor', 'reg')); 
        
    }
	
	public function actionSearch45(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';  
        $op = 'продажа';
        $k = '4';	
        $p2 = '4000000';		
        $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
                    
          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		  $reg = $item;} }
		 
		
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page'); 
		$this ->setMeta('Поиск 4 комнатных квартир с ценой до 4 млн.р., на продажу'.' '.$pag);
        $kvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('kvartiri', 'pages', 'r', 'p1', 'p2', 'p3', 'p4', 'vid', 'k', 'op', 'gor', 'reg')); 
        
    }
	
	public function actionSearch1aren(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';  
        $op = 'аренда';
        $k = '1';		
        $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'kolichestvo_komnat', $k])->orderBy(['data' => SORT_DESC]);  
                    
          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		  $reg = $item;} }
		 
		
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page'); 
		$this ->setMeta('Поиск 1 комнатных квартир в аренду'.' '.$pag);
        $kvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('kvartiri', 'pages', 'r', 'p1', 'p2', 'p3', 'p4', 'vid', 'k', 'op', 'gor', 'reg')); 
        
    }
	
	public function actionSearch2aren(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';  
        $op = 'аренда';
        $k = '2';		
        $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'kolichestvo_komnat', $k])->orderBy(['data' => SORT_DESC]);  
                    
          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		  $reg = $item;} }
		 
		
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page'); 
		$this ->setMeta('Поиск 2 комнатных. квартир в аренду'.' '.$pag);
        $kvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('kvartiri', 'pages', 'r', 'p1', 'p2', 'p3', 'p4', 'vid', 'k', 'op', 'gor', 'reg')); 
        
    }
	
	public function actionSearch3aren(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';  
        $op = 'аренда';
        $k = '3';		
        $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'kolichestvo_komnat', $k])->orderBy(['data' => SORT_DESC]);  
                    
          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		  $reg = $item;} }
		 
		
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page'); 
		$this ->setMeta('Поиск 3 комнатных. квартир в аренду'.' '.$pag);
        $kvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('kvartiri', 'pages', 'r', 'p1', 'p2', 'p3', 'p4', 'vid', 'k', 'op', 'gor', 'reg')); 
        
    }
	
	public function actionSearch4aren(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';  
        $op = 'аренда';
        $k = '4';		
        $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'kolichestvo_komnat', $k])->orderBy(['data' => SORT_DESC]);  
                    
          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		  $reg = $item;} }
		 
		
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page'); 
		$this ->setMeta('Поиск 4 комнатных. квартир в аренду'.' '.$pag);
        $kvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('kvartiri', 'pages', 'r', 'p1', 'p2', 'p3', 'p4', 'vid', 'k', 'op', 'gor', 'reg')); 
        
    }
	
    }