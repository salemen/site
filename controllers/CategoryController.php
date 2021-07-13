<?

namespace app\controllers;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use app\models\Category;
use app\models\Product;
use app\models\NedvigKvartiri;
use app\models\NedvigDoma;
use app\models\NedvigZemli;
use app\modules\admin\models\Marka;
use app\modules\admin\models\Oblast;
use app\controllers\OblastController;
use Yii;
use yii\data\Pagination;
use GeoIp2\Database\Reader;



class CategoryController extends AppController{
	
	public $enableCsrfValidation = false;
	
	 public function filters()
    {
        return array(
            array(
                'COutputCache',
                'duration'=> 120,
            ),
	);}	
	
	
    public function actionIndex (){
		
		
		//<!-----ОПРЕДЕЛЕНИЕ IP АДРЕСА И РЕГИОНА-->
											
										
 /*require_once Yii::$app->basePath . "/vendor/geoip2/geoip2/geoip2.phar";
require_once Yii::$app->basePath . "/vendor/autoload.php";
// This creates the Reader object, which should be reused across
// lookups.
$reader = new Reader (Yii::$app->basePath ."/vendor/geoip2/geoip2/GeoLite2-City.mmdb");

// Replace "city" with the appropriate method for your database, e.g.,
// "country".
$ip = Yii::$app->request->userIP;
$record = $reader->city($ip);
$key = "$ip";
$cache = Yii::$app->cache;
$oblast_reg = $cache->get($key);
if ($oblast_reg === false){
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
}}
$cache->set($key, $oblast_reg);
 
		   if (!$oblast_reg||$oblast_reg===0||$oblast_reg==0){
	         $hits1 = Product::find()->orderBy('RAND()');
             } else { */
			// $kvart = Nedvigkvartiri::find()->where(['moder' => 1])->orderBy(['data' => SORT_DESC])->limit(4)->all();
			// $doma = Nedvigdoma::find()->where(['moder' => 1])->orderBy(['data' => SORT_DESC])->limit(4)->all();
			// $zemli = Nedvigzemli::find()->where(['moder' => 1])->orderBy(['data' => SORT_DESC])->limit(4)->all();
	    $hits1 = Product::find()->where(['moder' => 1])->orderBy(['id' => SORT_DESC])->limit(72); 
        $pages = new Pagination (['totalCount'=> $hits1->count(), 'pageSize' => 72, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $hits = $hits1->offset($pages->offset)->limit($pages->limit)->all(); 
        $this -> setMeta ('Купить, продать, арендовать недвижимость, найти услугу, работу. Объявления в Краснодаре и Краснодарском крае');
       return $this ->render ('index', compact('hits','pages','kvart','doma','zemli')); 
		
    }
	
    
    public function actionView($id){
		$this->layout = '@app/views/layouts/categoryview.php';
	$cache = Yii::$app->cache;
    $ip = Yii::$app->request->userIP;
    $key = "$ip";
    $oblast_reg= $cache->get($key);
		
        $id = Yii::$app->request->get('id');
        $category = Category::findOne($id);
        if (empty($category)){
           throw new \yii\web\HttpException(404, 'Такой Категории нет или она удалена'); 
        }
        
//        $products = Product::find()->where(['category_id' => $id])->all();
        $query = Product::find()->orderBy(['id' => SORT_DESC])->where(['category_id' => $id])->andWhere(['moder' => 1]);
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 32, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
         $pag = Yii::$app->request->get('page'); 
        $this ->setMeta('Категория объявлений'.', '. $category->name.' '.$pag );
        return $this->render('view', compact('products','pages', 'category'));
    }
    
    /* public function actionSearch(){
        $q = trim(Yii::$app->request->get('q'));
        if (!$q){
             return $this -> render('search');  
        }
          $this ->setMeta('E-SHOPPER Поиск:'. $q );
        
         $query = Product::find()->orderBy(['id' => SORT_DESC])->where(['Like', 'name',  $q]);
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 12, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('products', 'pages', 'q')); 
        
    } */
	
	 public function actionSearchprof(){
		  $tel = trim(Yii::$app->request->get('tel'));
		  $username = trim(Yii::$app->request->get('username'));
		 
		  $query = Product::find()->where(['like', 'username', $username])->andWhere(['telephone' => $tel])->andWhere(['moder' => 1])->orderBy(['id' => SORT_DESC]);
		  $this ->setMeta('Все объявления от '. $username .', в разделе');
		  $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 32, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
		 
        return $this -> render('searchprof', compact('products', 'pages', 'tel', 'username')); 
	 }
                                 	
	 public function actionSearch(){
                                 
//<!-----ОПРЕДЕЛЕНИЕ IP АДРЕСА И РЕГИОНА-->
   				
	$this->layout = '@app/views/layouts/categorysearch.php';									
	require_once Yii::$app->basePath . "/vendor/geoip2/geoip2/geoip2.phar";
	require_once Yii::$app->basePath . "/vendor/autoload.php";
	// This creates the Reader object, which should be reused across
	// lookups.
	$reader = new Reader (Yii::$app->basePath ."/vendor/geoip2/geoip2/GeoLite2-City.mmdb");

	// Replace "city" with the appropriate method for your database, e.g.,
	// "country".
	
	$ip = Yii::$app->request->userIP;
	$record = $reader->city($ip);

	$obl = $record->mostSpecificSubdivision->name;
	$obl1 = 'Saratovskaya Oblast';

	$obl2 = strpos($obl, $obl1);

	 if ($obl2 === false){
		
	} else {
		$oblast = 64;
	}

	$obl1 = 'Krasnodarskiy Kray';
	$obl2 = strpos($obl, $obl1);

	if ($obl2 === false){
		
	} else {
		$oblast = 23;
	}    	
		$reg = $_GET['Oblast']['oblast_region'];
		$gor = $_GET['Goroda']['name'];						 
        //$r = $_GET['Product']['category_id'];   
        $r = $_GET['Category']['name'];   	
        $p2 = trim(Yii::$app->request->get('p2'));
		$p2 = Html::encode($p2);
		 $p3 = trim(Yii::$app->request->get('p3'));
		 $p3 = Html::encode($p3);
		  if ($r[0] == 186){
			return Yii::$app->response->redirect(['/nedvigcategory/8','ads'=>'vse-kvartiri']);
			 }elseif($r[0] == 187){
			return Yii::$app->response->redirect(['/nedvigcategory/2','ads'=>'doma-cottage']);
			 }elseif($r[0] == 188){
			return Yii::$app->response->redirect(['/nedvigcategory/3','ads'=>'komnati']);
			 }elseif($r[0] ==189){
			return Yii::$app->response->redirect(['/nedvigcategory/19','ads'=>'vsy-kommercheskaya']);
			 }elseif($r[0] ==190){
			return Yii::$app->response->redirect(['/nedvigcategory/14','ads'=>'vse-uchastki']);
			 }elseif($r[0] ==191){
			return Yii::$app->response->redirect(['/nedvigcategory/6','ads'=>'garagi']);
			 }elseif($r[0] ==192){
			return Yii::$app->response->redirect(['/nedvigcategory/7','ads'=>'gotovi-biznes']);
			 }elseif($r[0] ==180){
			return Yii::$app->response->redirect(['/avtocategory/1','ads'=>'legkovie-avto']);
			 }elseif($r[0] ==181){
			return Yii::$app->response->redirect(['/avtocategory/2','ads'=>'gruzovie-avto']);
			 }elseif($r[0] ==182){
			return Yii::$app->response->redirect(['/avtocategory/3','ads'=>'spec-tehnika']);
			 }elseif($r[0] ==183){
			return Yii::$app->response->redirect(['/avtocategory/view', 'id' => 4]);
			 }elseif($r[0] ==184){
			return Yii::$app->response->redirect(['/avtocategory/view', 'id' => 5]);
			 }elseif($r[0] ==185){
			return Yii::$app->response->redirect(['/avtocategory/view', 'id' => 6]);
			 }if (!$p2&&!$gor&&!$reg&&!$p3&&!empty($r)){
					 $query = Product::find()->orderBy(['id' => SORT_DESC])->where(['category_id'=> $r]);
				}elseif (!$p2&&!$gor&&!$reg&&!$r&&!empty($p3)){
					 $query = Product::find()->orderBy(['id' => SORT_DESC])->where([ 'like', 'content', $p3]);
				}elseif (!$gor&&!$reg&&!$r&&!empty($p3)&&!empty($p2)){
					 $query = Product::find()->orderBy(['id' => SORT_DESC])->where([ 'like', 'content', $p3])->andWhere(['<=', 'price', $p2]);
				}elseif (!$p2&&!$gor&&!$reg){
					 $query = Product::find()->orderBy(['id' => SORT_DESC])->where(['category_id'=> $r])->andWhere([ 'like', 'content', $p3]);
				}elseif (!$p2&&!$gor&&!$r){
					 $query = Product::find()->orderBy(['id' => SORT_DESC])->where([ 'like', 'oblast_region', $reg])->andWhere([ 'like', 'content', $p3]);
				}elseif (!$p2&&!$gor){
					 $query = Product::find()->orderBy(['id' => SORT_DESC])->where(['category_id'=> $r])->andWhere([ 'like', 'content', $p3])->andWhere([ 'like', 'oblast_region', $reg]);
				}elseif (!$p2&&!$gor&&!$p3){
					 $query = Product::find()->orderBy(['id' => SORT_DESC])->where(['category_id'=> $r])->andWhere([ 'like', 'oblast_region', $reg]);
				}elseif (!$reg&&!$gor){
					 $query = Product::find()->orderBy(['id' => SORT_DESC])->where(['category_id'=> $r])->andWhere([ 'like', 'content', $p3])->andWhere(['<=', 'price', $p2]);
				}elseif (!$reg&&!$gor&&!$p3){
					 $query = Product::find()->orderBy(['id' => SORT_DESC])->where(['category_id'=> $r])->andWhere(['<=', 'price', $p2]);
				}elseif (!$p2&&!empty($r)&&!empty($p3)&&!empty($reg)&&!empty($gor)){
					 $query = Product::find()->orderBy(['id' => SORT_DESC])->where(['category_id'=> $r])->andWhere([ 'like', 'content', $p3])->andWhere([ 'like', 'oblast_region', $reg])->andWhere(['gorod' => $gor]);
				}elseif (!$p2&&!$r&&!empty($p3)&&!empty($reg)&&!empty($gor)){
					 $query = Product::find()->orderBy(['id' => SORT_DESC])->andWhere([ 'like', 'content', $p3])->andWhere([ 'like', 'oblast_region', $reg])->andWhere(['gorod' => $gor]);
				}elseif (!$p2&&!$p3){
					 $query = Product::find()->orderBy(['id' => SORT_DESC])->where(['category_id'=> $r])->andWhere([ 'like', 'oblast_region', $reg])->andWhere(['gorod' => $gor]);
				}elseif (!$p2&&!$p3&&!r&&!empty($gor)&&!empty($reg)){
					 $query = Product::find()->orderBy(['id' => SORT_DESC])->where([ 'like', 'oblast_region', $reg])->andWhere(['gorod' => $gor]);
				}elseif (!$gor){
					 $query = Product::find()->orderBy(['id' => SORT_DESC])->where(['category_id'=> $r])->andWhere([ 'like', 'content', $p3])->andWhere([ 'like', 'oblast_region', $reg])->andWhere(['<=', 'price', $p2]);
				}elseif (!$gor&&!$p3){
					 $query = Product::find()->orderBy(['id' => SORT_DESC])->where(['category_id'=> $r])->andWhere([ 'like', 'oblast_region', $reg])->andWhere(['<=', 'price', $p2]);
				}else {
						$query = Product::find()->orderBy(['id' => SORT_DESC])->where(['category_id'=> $r])->andWhere([ 'like', 'content', $p3])->andWhere(['<=', 'price', $p2])->andWhere([ 'like', 'oblast_region', $reg])->andWhere(['gorod' => $gor]);
				   } 
                    
					 
                     if ($r) {
						foreach ($r as $name)
						   $r1 = $name;
						   $r2 = Category::find()->where(['id' => $r1])->select('name')->all();
						foreach ($r2 as $name)   
						   $r3 = $name;
						}				   
				     if($reg){
						$oblast1 = Oblast::find()->select('oblast_region')
									->where(['id' => $reg])
									->one();
						foreach($oblast1 as $item) {
						$reg = $item;} }
				 
        
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
		$pag = Yii::$app->request->get('page'); 
		$this ->setMeta('Поиск: ' . $r3->name .'. '. $reg.' страница '.$pag);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
		  Yii::$app->session->setFlash('success1', "<center>поиск завершен</center>");
		 
        return $this -> render('search', compact('products', 'pages', 'r', 'p2', 'p3', 'oblast')); 
        
    }
	
	 
}
