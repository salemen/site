<?php

namespace app\controllers;
use app\modules\admin\models\Oblast;
use app\models\Nedvigcategory;
use app\models\NedvigKomnati;
use yii\data\Pagination;
use Yii;
use GeoIp2\Database\Reader;

class NedvigkomnatiController extends AppController {
    
    public function actionView ($id) {
		$this->layout = '@app/views/layouts/nedvigview.php'; 
        $id = Yii::$app ->request ->get('id');
        $nedvigkomnati = nedvigkomnati::findOne($id);
        if (empty($nedvigkomnati)){
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

        if (!$oblast_reg||$oblast_reg===0||$oblast_reg==0){
              $hits = Nedvigkomnati::find()->where(['hit'=>'1'])->orderBy('RAND()')->limit(16)->all();
			  }else {$hits = Nedvigkomnati::find()->where(['hit'=>'1'])->andWhere(['Like', 'oblast',  $oblast_reg])
			  ->orderBy('RAND()')->limit(16)->all();} */
         //$hits = Nedvigkomnati::find()->where(['hit'=>'1'])->limit(8)->all();
         $this ->setMeta('Комната '. $nedvigkomnati -> plochad .' м.кв.' );
        return $this ->render('view', compact ('nedvigkomnati'));   
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
		 
		  $query = Nedvigkomnati::find()->where(['like', 'username', $username])->andWhere(['telephone' => $tel])->orderBy(['id' => SORT_DESC]);
		   	$this ->setMeta('Объявления: все комнаты от '. $username);
		  $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 24, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $komnati = $query->offset($pages->offset)->limit($pages->limit)->all();
		 
        return $this -> render('searchprof', compact('komnati', 'pages', 'tel', 'username')); 
	 }
	
	public function actionSearch(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php'; 
        $reg = $_GET['Oblast']['oblast_region'];
		$gor = $_GET['Goroda']['name'];		
        $r = $_GET['Raion']['raion'];
        $op = $_GET['Operaciya']['id'];
        $p1 = trim(Yii::$app->request->get('p1'));
        $p2 = trim(Yii::$app->request->get('p2'));
		$p3 = trim(Yii::$app->request->get('p3'));
        if (!$p1&&!$p2&&!$p3&&!$r&&!$gor&&!$reg){
	    $query = nedvigkomnati::find()->where(['like', 'operaciya', $op])->orderBy(['data' => SORT_DESC]);
                }elseif(!$p1&&!$p2&&!$p3&&!$r&&!$gor){
	            $query = nedvigkomnati::find()->where(['like', 'operaciya', $op])->andWhere([ 'like', 'oblast', $reg])->orderBy(['data' => SORT_DESC]);
                } elseif(!$p2&&!$p1&&!$p3&&!$r){
                $query = nedvigkomnati::find()->where(['like', 'operaciya', $op])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'oblast', $reg])->orderBy(['data' => SORT_DESC]);
		        }elseif(!$p2&&!$p1&&!$p3){
                $query = nedvigkomnati::find()->where(['like', 'operaciya', $op])->andWhere(['gorod' => $gor])->andWhere(['raion' => $r])->andWhere([ 'like', 'oblast', $reg])->orderBy(['data' => SORT_DESC]);
		        }elseif(!$p2&&!$p1){
                $query = nedvigkomnati::find()->where(['like', 'operaciya', $op])->andWhere(['raion' => $r])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'oblast', $reg])->andWhere(['<=','komnat_v_kvartire',$p3])->orderBy(['data' => SORT_DESC]);
		        }elseif (!$p1&&!$p3){
			    $query = nedvigkomnati::find()->where(['like', 'operaciya', $op])->andWhere(['raion' => $r])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'oblast', $reg])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);
                }elseif (!$p3&&!$p2){
			    $query = nedvigkomnati::find()->where(['like', 'operaciya', $op])->andWhere(['raion' => $r])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'oblast', $reg])->andWhere(['>=','plochad',$p1])->orderBy(['data' => SORT_DESC]);
				}elseif (!$p1){
			    $query = nedvigkomnati::find()->where(['like', 'operaciya', $op])->andWhere(['raion' => $r])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'oblast', $reg])->andWhere([ '<=','price',$p2])->andWhere(['<=','komnat_v_kvartire',$p3])->orderBy(['data' => SORT_DESC]);
                }elseif (!$p3){
			    $query = nedvigkomnati::find()->where(['like', 'operaciya', $op])->andWhere(['raion' => $r])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'oblast', $reg])->andWhere([ '<=','price',$p2])->andWhere(['>=','plochad',$p1])->orderBy(['data' => SORT_DESC]);
				}
				else { $query = nedvigkomnati::find()->where(['like', 'operaciya', $op])->andWhere(['raion' => $r])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'oblast', $reg])->andWhere(['>=','plochad',$p1])->andWhere([ '<=','price',$p2])->andWhere(['<=','komnat_v_kvartire',$p3])->orderBy(['data' => SORT_DESC]);  
                }   

              if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		    $reg = $item;} } 
				
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page');
		 $this ->setMeta('Поиск комнат, '. $op. '. '. $reg.' '.$pag );
        $komnati = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('komnati', 'pages', 'r', 'gor', 'op', 'reg', 'p1', 'p2', 'p3')); 
        
    }
    }



