<?

namespace app\controllers;

use app\models\Avtocategory;
use app\models\Avtoleg;
use app\models\Avtogruz;
use app\models\Avtokomplekt;
use app\models\Avtomoto;
use app\models\Avtospec;
use app\models\Avtovodnik;;
use Yii;
use yii\data\Pagination;
use GeoIp2\Database\Reader;

class AvtocategoryController extends AppController{
	
	 public function filters()
    {
        return array(
            array(
                'COutputCache',
                'duration'=> 120,
            ),
	);}
	
    public function actionIndex (){
        $hits = Avtoleg::find()->where(['hit'=>'1'])->limit(32)->all();
        $this -> setMeta ('SaleMen');
       return $this ->render ('index', compact('hits') ); 
       
    }
    
    public function actionView($id){
		$this->layout = '@app/views/layouts/mainavto.php';
        $id = Yii::$app->request->get('id');
        $avtocategory = Avtocategory::findOne($id);
        if (empty($avtocategory)){
           throw new \yii\web\HttpException(404, 'Такой Категории нет или она удалена'); 
        }
		//<!-----ОПРЕДЕЛЕНИЕ IP АДРЕСА И РЕГИОНА-->
																					
require_once Yii::$app->basePath . "/vendor/geoip2/geoip2/geoip2.phar";
require_once Yii::$app->basePath . "/vendor/autoload.php";
// This creates the Reader object, which should be reused across
// lookups.
$reader = new Reader (Yii::$app->basePath ."/vendor/geoip2/geoip2/GeoLite2-City.mmdb");

// Replace "city" with the appropriate method for your database, e.g.,
// "country".
$ip = Yii::$app->request->userIP;
$record = $reader->city('46.29.15.255');

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
}     //<!--------------------->
       
        if ($id == 1){
			/* if (!$oblast){ */
			$query = avtoleg::find()->orderBy(['id' => SORT_DESC])->where(['parent_id' => $id]);
			/* else{$query = avtoleg::find()->orderBy(['id' => SORT_DESC])->where(['parent_id' => $id])
			->andWhere(['Like', 'oblast',  $oblast]);} */
             $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 32, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $avtoleg = $query->offset($pages->offset)->limit($pages->limit)->all();
     
        $this ->setMeta('Купить или продать Легковые автомобили '. $avtoleg->name, $nedvigcategory->keywords, $nedvigcategory->description );
        return $this->render('view', compact('avtoleg','pages', 'avtocategory', 'oblast'));
       }    
       
       elseif($id == 2){
		  /*  if (!$oblast){ */
		   $query = avtogruz::find()->orderBy(['id' => SORT_DESC]);/* }
		   else{$query = avtogruz::find()->orderBy(['id' => SORT_DESC])
		   ->andWhere(['Like', 'oblast',  $oblast]);} */
            $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 32, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $avtogruz = $query->offset($pages->offset)->limit($pages->limit)->all();
     
        $this ->setMeta('Купить или продать '. $avtocategory->name, $avtogruz->keywords );
        return $this->render('view', compact('avtogruz','pages', 'avtocategory', 'oblast'));
        }  
        
        elseif($id == 3){
			/* if (!$oblast){ */
            $query = avtospec::find()->orderBy(['id' => SORT_DESC]); /* }
			else{$query = avtospec::find()->orderBy(['id' => SORT_DESC])
			->andWhere(['Like', 'oblast',  $oblast]);} */
            $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 32, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $avtospec = $query->offset($pages->offset)->limit($pages->limit)->all();
     
        $this ->setMeta('Купить или продать Спецтехнику', $avtocategory->name, $avtokategory->keywords );
        return $this->render('view', compact('avtospec','pages', 'avtocategory', 'oblast'));
        }
        
         elseif($id == 4){
			/*  if (!$oblast){ */
			 $query = avtomoto::find()->orderBy(['id' => SORT_DESC]); /* }
			 else{$query = avtomoto::find()->orderBy(['id' => SORT_DESC])
			 ->andWhere(['Like', 'oblast',  $oblast]);} */
            $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 32, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $avtomoto = $query->offset($pages->offset)->limit($pages->limit)->all();
     
        $this ->setMeta('Купить или продать Мототехнику '. $avtomoto->name, $avtomoto->keywords );
        return $this->render('view', compact('avtomoto','pages', 'avtocategory', 'oblast'));
        }
        
        elseif($id == 5){
			/* if (!$oblast){ */
            $query = avtokomplekt::find()->orderBy(['id' => SORT_DESC]);/* }
            else{$query = avtokomplekt::find()->orderBy(['id' => SORT_DESC])
			->andWhere(['Like', 'oblast',  $oblast]);}			 */
            $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 32, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $avtokomplekt = $query->offset($pages->offset)->limit($pages->limit)->all();
     
        $this ->setMeta('Любые Комплектующие для автотехники '. $avtokomplekt->name, $nedvigzemli->keywords );
        return $this->render('view', compact('avtokomplekt','pages', 'avtocategory', 'oblast'));
        }
		
		elseif($id == 7){
			/* if (!$oblast){ */
            $query = avtokomplekt::find()->where(['id' => 7])->orderBy(['id' => SORT_DESC]);/* }
            else{$query = avtokomplekt::find()->orderBy(['id' => SORT_DESC])
			->andWhere(['Like', 'oblast',  $oblast]);}			 */
            $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 32, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $avtokomplekt = $query->offset($pages->offset)->limit($pages->limit)->all();
     
        $this ->setMeta('Любые аксессуары для автотехники '. $avtokomplekt->name, $nedvigzemli->keywords );
        return $this->render('view', compact('avtokomplekt','pages', 'avtocategory', 'oblast'));
        }
		
		elseif($id == 8){
			/* if (!$oblast){ */
            $query = avtokomplekt::find()->where(['tip' => 8])->orderBy(['id' => SORT_DESC]);/* }
            else{$query = avtokomplekt::find()->orderBy(['id' => SORT_DESC])
			->andWhere(['Like', 'oblast',  $oblast]);}			 */
            $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 32, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $avtokomplekt = $query->offset($pages->offset)->limit($pages->limit)->all();
     
        $this ->setMeta(' Автозапчасти по ходовой части для автотехники '. $avtokomplekt->name, $nedvigzemli->keywords );
        return $this->render('view', compact('avtokomplekt','pages', 'avtocategory', 'oblast'));
        }
		
		elseif($id == 9){
			/* if (!$oblast){ */
            $query = avtokomplekt::find()->where(['tip' => 9])->orderBy(['id' => SORT_DESC]);/* }
            else{$query = avtokomplekt::find()->orderBy(['id' => SORT_DESC])
			->andWhere(['Like', 'oblast',  $oblast]);}			 */
            $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 32, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $avtokomplekt = $query->offset($pages->offset)->limit($pages->limit)->all();
     
        $this ->setMeta('Автозапчасти для двигателя и трансмиссии для автотехники '. $avtokomplekt->name, $nedvigzemli->keywords );
        return $this->render('view', compact('avtokomplekt','pages', 'avtocategory', 'oblast'));
        }
		
		elseif($id == 10){
			/* if (!$oblast){ */
            $query = avtokomplekt::find()->where(['tip' => 10])->orderBy(['id' => SORT_DESC]);/* }
            else{$query = avtokomplekt::find()->orderBy(['id' => SORT_DESC])
			->andWhere(['Like', 'oblast',  $oblast]);}			 */
            $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 32, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $avtokomplekt = $query->offset($pages->offset)->limit($pages->limit)->all();
     
        $this ->setMeta('Кузов и кузовщина для автотехники '. $avtokomplekt->name, $nedvigzemli->keywords );
        return $this->render('view', compact('avtokomplekt','pages', 'avtocategory', 'oblast'));
        }
		
		elseif($id == 11){
			/* if (!$oblast){ */
            $query = avtokomplekt::find()->where(['tip' => 11])->orderBy(['id' => SORT_DESC]);/* }
            else{$query = avtokomplekt::find()->orderBy(['id' => SORT_DESC])
			->andWhere(['Like', 'oblast',  $oblast]);}			 */
            $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 32, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $avtokomplekt = $query->offset($pages->offset)->limit($pages->limit)->all();
     
        $this ->setMeta('Автоэлектрика и комплектующие по автоэлектрике для автотехники '. $avtokomplekt->name, $nedvigzemli->keywords );
        return $this->render('view', compact('avtokomplekt','pages', 'avtocategory', 'oblast'));
        }
		
		elseif($id == 12){
			/* if (!$oblast){ */
            $query = avtokomplekt::find()->where(['tip' => 12])->orderBy(['id' => SORT_DESC]);/* }
            else{$query = avtokomplekt::find()->orderBy(['id' => SORT_DESC])
			->andWhere(['Like', 'oblast',  $oblast]);}			 */
            $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 32, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $avtokomplekt = $query->offset($pages->offset)->limit($pages->limit)->all();
     
        $this ->setMeta('Салон и комплектющие по салону авто для автотехники '. $avtokomplekt->name, $nedvigzemli->keywords );
        return $this->render('view', compact('avtokomplekt','pages', 'avtocategory', 'oblast'));
        }
		
		elseif($id == 13){
			/* if (!$oblast){ */
            $query = avtokomplekt::find()->where(['tip' => 13])->orderBy(['id' => SORT_DESC]);/* }
            else{$query = avtokomplekt::find()->orderBy(['id' => SORT_DESC])
			->andWhere(['Like', 'oblast',  $oblast]);}			 */
            $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 32, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $avtokomplekt = $query->offset($pages->offset)->limit($pages->limit)->all();
     
        $this ->setMeta('Технические жидкости для автотехники '. $avtokomplekt->name, $nedvigzemli->keywords );
        return $this->render('view', compact('avtokomplekt','pages', 'avtocategory', 'oblast'));
        }
		
		elseif($id == 14){
			/* if (!$oblast){ */
            $query = avtokomplekt::find()->where(['tip' => 14])->orderBy(['id' => SORT_DESC]);/* }
            else{$query = avtokomplekt::find()->orderBy(['id' => SORT_DESC])
			->andWhere(['Like', 'oblast',  $oblast]);}			 */
            $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 32, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $avtokomplekt = $query->offset($pages->offset)->limit($pages->limit)->all();
     
        $this ->setMeta('Рулевое управление и запчасти по нему для автотехники '. $avtokomplekt->name, $nedvigzemli->keywords );
        return $this->render('view', compact('avtokomplekt','pages', 'avtocategory', 'oblast'));
        }
		
		elseif($id == 15){
			/* if (!$oblast){ */
            $query = avtokomplekt::find()->where(['tip' => 15])->orderBy(['id' => SORT_DESC]);/* }
            else{$query = avtokomplekt::find()->orderBy(['id' => SORT_DESC])
			->andWhere(['Like', 'oblast',  $oblast]);}			 */
            $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 32, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $avtokomplekt = $query->offset($pages->offset)->limit($pages->limit)->all();
     
        $this ->setMeta('Автокондиционер и запчасти для автотехники '. $avtokomplekt->name, $nedvigzemli->keywords );
        return $this->render('view', compact('avtokomplekt','pages', 'avtocategory', 'oblast'));
        }
        
        elseif($id == 6){
			/* if (!$oblast){ */
            $query = avtovodnik::find()->orderBy(['id' => SORT_DESC]);/* }
            else{$query = avtovodnik::find()->orderBy(['id' => SORT_DESC])
			->andWhere(['Like', 'oblast',  $oblast]);}			 */
            $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 32, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $avtovodnik = $query->offset($pages->offset)->limit($pages->limit)->all();
     
        $this ->setMeta('Купить или продать Водный транспорт '. $avtovodnik->name, $avtovodnik->keywords );
        return $this->render('view', compact('avtovodnik','pages', 'avtocategory', 'oblast'));
        }
		
		
    }
    
    
    public function actionSearch(){
        $q = trim(Yii::$app->request->get('q'));
        if (!$q){
             return $this -> render('search');  
        }
          $this ->setMeta('SaleMen Поиск:'. $q );
        
         $query = Product::find()->where(['Like', 'name', $q]);
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 32, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('products', 'pages', 'q')); 
        
    }
}




