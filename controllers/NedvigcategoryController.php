<?

namespace app\controllers;

use app\models\Nedvigcategory;
use app\models\NedvigKvartiri;
use app\models\NedvigDoma;
use app\models\NedvigKomnati;
use app\models\NedvigKommercheska;
use app\models\NedvigZemli;
use app\models\NedvigGaragi;
use app\models\NedvigBiznes;
use Yii;
use yii\data\Pagination;
use GeoIp2\Database\Reader;

class NedvigcategoryController extends AppController{
	
	 public function filters()
    {
        return array(
            array(
                'COutputCache',
                'duration'=> 120,
            ),
	);}
	
    public function actionIndex (){
        $hits = nedvigkvartiri::find()->where(['hit'=>'1'])->andWhere(['moder'=>'1'])->limit(12)->all();
        $this -> setMeta ('SaleMen');
       return $this ->render ('index', compact('hits') ); 
       
    }
	
	/*  public function actionNedvigcategory()         
    {
        $this->layout = '@app/views/layouts/mainned/index.php';
       
        return $this->render('mainned');
    } */
    
    public function actionView($id){
		$this->layout = '@app/views/layouts/mainned/index.php';
        $id = Yii::$app->request->get('id');
        $nedvigcategory = Nedvigcategory::findOne($id);
        if (empty($nedvigcategory)){
           throw new \yii\web\HttpException(604, 'Такой Категории нет или она удалена'); 
        }
		
		//<!-----ОПРЕДЕЛЕНИЕ IP АДРЕСА И РЕГИОНА-->
											
										
 require_once Yii::$app->basePath . "/vendor/geoip2/geoip2/geoip2.phar";
require_once Yii::$app->basePath . "/vendor/autoload.php";
// This creates the Reader object, which should be reused across
// lookups.
$reader = new Reader (Yii::$app->basePath ."/vendor/geoip2/geoip2/GeoLite2-City.mmdb");

// Replace "city" with the appropriate method for your database, e.g.,
// "country".
/* $ip = Yii::$app->request->userIP;
$record = $reader->city('46.29.15.255');
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
	$oblast_reg = 23; 	 */

/* $cache = Yii::$app->cache;
$cache->set($key, $oblast_reg); */
       
        if ($id == 1||$id == 8){
			 if (!$oblast_reg){
             $query = nedvigkvartiri::find()->orderBy(['data' => SORT_DESC])->where(['parent_id' => 1])->andWhere(['moder' => 1]);}
			 else { $query = nedvigkvartiri::find()->orderBy(['data' => SORT_DESC])->where(['parent_id' => 1])->andWhere(['moder' => 1])
			 ->andWhere(['Like', 'oblast_region',  $oblast_reg]);}
             $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 60, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $nedvigkvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
        $pag = Yii::$app->request->get('page'); 
		 if ($pag){
		  $this ->setMeta('🏢 Купить, Продать, Арендовать квартиру в Краснодарском крае, Краснодаре и на юге России.'.' страница '.$pag);
		 }else{
			$this ->setMeta('🏢 Купить, Продать, Арендовать квартиру в Краснодарском крае, Краснодаре и на юге России');
		 }        
        return $this->render('view', compact('nedvigkvartiri','pages', 'nedvigcategory', 'oblast_reg'));
       }  

       if ($id == 9){
			 if (!$oblast_reg){
             $query = nedvigkvartiri::find()->orderBy(['data' => SORT_DESC])->where(['parent_id' => 1])->andWhere(['moder' => 1])->andWhere(['like', 'vtorichka_novostroi', 'новостройка']);}
			 else { $query = nedvigkvartiri::find()->orderBy(['data' => SORT_DESC])->where(['parent_id' => 1])->andWhere(['moder' => 1])->andWhere(['like', 'vtorichka_novostroi', 'новостройка'])
			 ->andWhere(['Like', 'oblast_region',  $oblast_reg]);}
             $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 60, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $nedvigkvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
         $pag = Yii::$app->request->get('page'); 
		  if ($pag){
		 $this ->setMeta('🏢 Купить квартиру в '. $nedvigcategory->name.'. страница '.$pag);
		 }else{
			$this ->setMeta('🏢 Купить квартиру в '. $nedvigcategory->name);
		 }        
        return $this->render('view', compact('nedvigkvartiri','pages', 'nedvigcategory', 'oblast_reg'));
       }

       if ($id == 10){
			 if (!$oblast_reg){
             $query = nedvigkvartiri::find()->orderBy(['data' => SORT_DESC])->where(['parent_id' => 1])->andWhere(['moder' => 1])->andWhere(['like', 'vtorichka_novostroi', 'вторичка']);}
			 else { $query = nedvigkvartiri::find()->orderBy(['data' => SORT_DESC])->where(['parent_id' => 1])->andWhere(['moder' => 1])->andWhere(['like', 'vtorichka_novostroi', 'вторичка'])
			 ->andWhere(['Like', 'oblast_region',  $oblast_reg]);}
             $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 60, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $nedvigkvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
		 $pag = Yii::$app->request->get('page'); 
         if ($pag){
		 $this ->setMeta('🏢 Купить квартиру в '. $nedvigcategory->name.'. страница '.$pag);
		 }else{
			$this ->setMeta('🏢 Купить квартиру в '. $nedvigcategory->name);
		 }
        return $this->render('view', compact('nedvigkvartiri','pages', 'nedvigcategory', 'oblast_reg'));
       }

      if ($id == 11){
			 if (!$oblast_reg){
             $query = nedvigkvartiri::find()->orderBy(['data' => SORT_DESC])->where(['parent_id' => 1])->andWhere(['moder' => 1])->andWhere(['kolichestvo_komnat' => 1])->andWhere(['like', 'vtorichka_novostroi', 'новостройка']);}
			 else { $query = nedvigkvartiri::find()->orderBy(['data' => SORT_DESC])->where(['parent_id' => 1])->andWhere(['moder' => 1])->andWhere(['kolichestvo_komnat' => 1])->andWhere(['like', 'vtorichka_novostroi', 'новостройка'])
			 ->andWhere(['Like', 'oblast_region',  $oblast_reg]);}
             $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 60, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $nedvigkvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
         $pag = Yii::$app->request->get('page'); 
		  if ($pag){
		 $this ->setMeta('🏢 Купить, '. $nedvigcategory->name. ' квартиру в новостройке'.' '.$oblast_reg.'. страница '.$pag );
		 }else{
			 $this ->setMeta('🏢 Купить, '. $nedvigcategory->name. ' квартиру в новостройке'.' '.$oblast_reg );
		 }     
        return $this->render('view', compact('nedvigkvartiri','pages', 'nedvigcategory', 'oblast_reg'));
       }

       if ($id == 12){
			 if (!$oblast_reg){
             $query = nedvigkvartiri::find()->orderBy(['data' => SORT_DESC])->where(['parent_id' => 1])->andWhere(['moder' => 1])->andWhere(['kolichestvo_komnat' => 2])->andWhere(['like', 'vtorichka_novostroi', 'новостройка']);}
			 else { $query = nedvigkvartiri::find()->orderBy(['data' => SORT_DESC])->where(['parent_id' => 1])->andWhere(['moder' => 1])->andWhere(['kolichestvo_komnat' => 2])->andWhere(['like', 'vtorichka_novostroi', 'новостройка'])
			 ->andWhere(['Like', 'oblast_region',  $oblast_reg]);}
             $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 60, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $nedvigkvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
         $pag = Yii::$app->request->get('page'); 
       if ($pag){
		 $this ->setMeta('🏢 Купить, '. $nedvigcategory->name. ' квартиру в новостройке'.' '.$oblast_reg.'. страница '.$pag );
		 }else{
			 $this ->setMeta('🏢 Купить, '. $nedvigcategory->name. ' квартиру в новостройке'.' '.$oblast_reg );
		 }
        return $this->render('view', compact('nedvigkvartiri','pages', 'nedvigcategory', 'oblast_reg'));
       }
	   
	   if ($id == 13){
			 if (!$oblast_reg){
             $query = nedvigkvartiri::find()->orderBy(['data' => SORT_DESC])->where(['parent_id' => 1])->andWhere(['moder' => 1])->andWhere(['kolichestvo_komnat' => 3])->andWhere(['like', 'vtorichka_novostroi', 'новостройка']);}
			 else { $query = nedvigkvartiri::find()->orderBy(['data' => SORT_DESC])->where(['parent_id' => 1])->andWhere(['moder' => 1])->andWhere(['kolichestvo_komnat' => 3])->andWhere(['like', 'vtorichka_novostroi', 'новостройка'])
			 ->andWhere(['Like', 'oblast_region',  $oblast_reg]);}
             $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 60, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $nedvigkvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
         $pag = Yii::$app->request->get('page'); 
        if ($pag){
		 $this ->setMeta('🏢 Купить, '. $nedvigcategory->name. ' квартиру в новостройке'.' '.$oblast_reg.'. страница '.$pag );
		 }else{
			 $this ->setMeta('🏢 Купить, '. $nedvigcategory->name. ' квартиру в новостройке'.' '.$oblast_reg );
		 }
        return $this->render('view', compact('nedvigkvartiri','pages', 'nedvigcategory', 'oblast_reg'));
       }

         if ($id == 28){
			 if (!$oblast_reg){
             $query = nedvigkvartiri::find()->orderBy(['data' => SORT_DESC])->where(['parent_id' => 1])->andWhere(['moder' => 1])->andWhere(['kolichestvo_komnat' => 1])->andWhere(['like', 'vtorichka_novostroi', 'вторичка']);}
			 else { $query = nedvigkvartiri::find()->orderBy(['data' => SORT_DESC])->where(['parent_id' => 1])->andWhere(['moder' => 1])->andWhere(['kolichestvo_komnat' => 1])->andWhere(['like', 'vtorichka_novostroi', 'вторичка'])
			 ->andWhere(['Like', 'oblast_region',  $oblast_reg]);}
             $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 60, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $nedvigkvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
         $pag = Yii::$app->request->get('page'); 
		  if ($pag){
		 $this ->setMeta('🏢 Купить, '. $nedvigcategory->name. ' квартиру на вторичке'.' '.$oblast_reg.'. страница '.$pag );
		 }else{
			 $this ->setMeta('🏢 Купить, '. $nedvigcategory->name. ' квартиру на вторичке'.' '.$oblast_reg );
		 }
        return $this->render('view', compact('nedvigkvartiri','pages', 'nedvigcategory', 'oblast_reg'));
       }
	   
	    if ($id == 29){
			 if (!$oblast_reg){
             $query = nedvigkvartiri::find()->orderBy(['data' => SORT_DESC])->where(['parent_id' => 1])->andWhere(['moder' => 1])->andWhere(['kolichestvo_komnat' => 2])->andWhere(['like', 'vtorichka_novostroi', 'вторичка']);}
			 else { $query = nedvigkvartiri::find()->orderBy(['data' => SORT_DESC])->where(['parent_id' => 1])->andWhere(['moder' => 1])->andWhere(['kolichestvo_komnat' => 2])->andWhere(['like', 'vtorichka_novostroi', 'вторичка'])
			 ->andWhere(['Like', 'oblast_region',  $oblast_reg]);}
             $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 60, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $nedvigkvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
         $pag = Yii::$app->request->get('page'); 
        if ($pag){
		 $this ->setMeta('🏢 Купить, '. $nedvigcategory->name. ' квартиру на вторичке'.' '.$oblast_reg.'. страница '.$pag );
		 }else{
			 $this ->setMeta('🏢 Купить, '. $nedvigcategory->name. ' квартиру на вторичке'.' '.$oblast_reg );
		 }
        return $this->render('view', compact('nedvigkvartiri','pages', 'nedvigcategory', 'oblast_reg'));
       }
	   
	    if ($id == 30){
			 if (!$oblast_reg){
             $query = nedvigkvartiri::find()->orderBy(['data' => SORT_DESC])->where(['parent_id' => 1])->andWhere(['moder' => 1])->andWhere(['kolichestvo_komnat' => 3])->andWhere(['like', 'vtorichka_novostroi', 'вторичка']);}
			 else { $query = nedvigkvartiri::find()->orderBy(['data' => SORT_DESC])->where(['parent_id' => 1])->andWhere(['moder' => 1])->andWhere(['kolichestvo_komnat' => 3])->andWhere(['like', 'vtorichka_novostroi', 'вторичка'])
			 ->andWhere(['Like', 'oblast_region',  $oblast_reg]);}
             $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 60, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $nedvigkvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
         $pag = Yii::$app->request->get('page'); 
       if ($pag){
		 $this ->setMeta('🏢 Купить, '. $nedvigcategory->name. ' квартиру на вторичке'.' '.$oblast_reg.'. страница '.$pag );
		 }else{
			 $this ->setMeta('🏢 Купить, '. $nedvigcategory->name. ' квартиру на вторичке'.' '.$oblast_reg );
		 }
        return $this->render('view', compact('nedvigkvartiri','pages', 'nedvigcategory', 'oblast_reg'));
       }
     	   
       
       elseif($id == 2){
		    if (!$oblast_reg){
            $query = nedvigdoma::find()->orderBy(['data' => SORT_DESC])->andWhere(['moder' => 1]); }
			else{$query = nedvigdoma::find()->orderBy(['data' => SORT_DESC])->andWhere(['moder' => 1])
			->andWhere(['Like', 'oblast',  $oblast_reg]);}
		$pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 60, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $nedvigdoma = $query->offset($pages->offset)->limit($pages->limit)->all();
         $pag = Yii::$app->request->get('page'); 
		  if ($pag){
		  $this ->setMeta( '🏡 Купить или продать Дом, Коттедж или Дачу в Краснодаре, Краснодарском крае и юге России.'.' страница '.$pag );
		 }else{
			  $this ->setMeta( '🏡 Купить или продать Дом, Коттедж или Дачу в Краснодаре, Краснодарском крае и юге России' );
		 }
      
        return $this->render('view', compact('nedvigdoma','pages', 'nedvigcategory', 'oblast_reg'));
        }  
        
        elseif($id == 3){
			 if (!$oblast_reg){
			 $query = nedvigkomnati::find()->orderBy(['data' => SORT_DESC])->andWhere(['moder' => 1]);}
             else{ $query = nedvigkomnati::find()->orderBy(['data' => SORT_DESC])->andWhere(['moder' => 1])
			 ->andWhere(['Like', 'oblast',  $oblast_reg]);}			 
            $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 60, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $nedvigkomnati = $query->offset($pages->offset)->limit($pages->limit)->all();
         $pag = Yii::$app->request->get('page'); 
		  if ($pag){
		  $this ->setMeta( $nedvigcategory->name. ' в коммуналках и общежитиях.'.' страница '.$pag );
		 }else{
			  $this ->setMeta( $nedvigcategory->name. ' в коммуналках и общежитиях' );
		 }
       
        return $this->render('view', compact('nedvigkomnati','pages', 'nedvigcategory', 'oblast_reg'));
        }
		
		/////////////////КОММЕРЧЕСКАЯ НЕДВИЖИМОСТЬ///////////////
        
         elseif($id == 4||$id == 19){
			  if (!$oblast_reg){
			  $query = nedvigkommercheska::find()->orderBy(['data' => SORT_DESC])->andWhere(['moder' => 1]);}
              else{ $query = nedvigkommercheska::find()->orderBy(['data' => SORT_DESC])->andWhere(['moder' => 1])
			  ->andWhere(['Like', 'oblast',  $oblast_reg]);}			  
            $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 60, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $nedvigkommercheska = $query->offset($pages->offset)->limit($pages->limit)->all();
         $pag = Yii::$app->request->get('page'); 
		 if ($pag){
		  $this ->setMeta( '🏭 Купить офис, магазин, склад и другую коммерческую недвижимость. '.' страница '.$pag );
		 }else{
			  $this ->setMeta( '🏭 Купить офис, магазин, склад и другую коммерческую недвижимость ');
		 }
       
        return $this->render('view', compact('nedvigkommercheska','pages', 'nedvigcategory', 'oblast_reg'));
        }
		
		 elseif($id == 20){
			  if (!$oblast_reg){
			  $query = nedvigkommercheska::find()->orderBy(['data' => SORT_DESC])->andWhere(['Like', 'type_nedvigimosty', 'Офисное'])->andWhere(['moder' => 1]);}
              else{ $query = nedvigkommercheska::find()->orderBy(['data' => SORT_DESC])->andWhere(['moder' => 1])
			  ->andWhere(['Like', 'oblast',  $oblast_reg])->andWhere(['Like', 'type_nedvigimosty', 'Офисное']);}			  
            $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 60, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $nedvigkommercheska = $query->offset($pages->offset)->limit($pages->limit)->all();
         $pag = Yii::$app->request->get('page');
         if ($pag){
		  $this ->setMeta( '🏬 Купить или арендовать Офисные помещения. '.' страница '.$pag );
		 }else{
			   $this ->setMeta( '🏬 Купить или арендовать Офисные помещения ' );
		 }		 
       
        return $this->render('view', compact('nedvigkommercheska','pages', 'nedvigcategory', 'oblast_reg'));
        }
		
		 elseif($id == 21){
			  if (!$oblast_reg){
			  $query = nedvigkommercheska::find()->orderBy(['data' => SORT_DESC])->where(['Like', 'type_nedvigimosty', 'Торговое'])->andWhere(['moder' => 1]);}
              else{ $query = nedvigkommercheska::find()->orderBy(['data' => SORT_DESC])->andWhere(['moder' => 1])
			  ->andWhere(['Like', 'oblast',  $oblast_reg])->andWhere(['Like', 'type_nedvigimosty', 'Торговое']);}			  
            $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 60, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $nedvigkommercheska = $query->offset($pages->offset)->limit($pages->limit)->all();
         $pag = Yii::$app->request->get('page'); 
		 if ($pag){
		  $this ->setMeta( '🏪 Купить или арендовать Торговые помещения. '.' страница '.$pag );
		 }else{
			    $this ->setMeta( '🏪 Купить или арендовать Торговые помещения ' );
		 }
       
        return $this->render('view', compact('nedvigkommercheska','pages', 'nedvigcategory', 'oblast_reg'));
        }
		
		/*  elseif($id == 22){
			 $tip = 'Свободного типа';
			  if (!$oblast_reg){
			  $query = nedvigkommercheska::find()->orderBy(['data' => SORT_DESC])->andWhere([ 'like', 'type_nedvigimosty', $tip]);}
              else{ $query = nedvigkommercheska::find()->orderBy(['data' => SORT_DESC])
			  ->andWhere(['Like', 'oblast',  $oblast_reg])->andWhere(['Like', 'type_nedvigimosty', 'Свободного типа']);}			  
            $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 24, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $nedvigkommercheska = $query->offset($pages->offset)->limit($pages->limit)->all();
     
        $this ->setMeta('SaleMen | '. $nedvigkommercheska->name, $nedvigkommercheska->keywords );
        return $this->render('view', compact('nedvigkommercheska','pages', 'nedvigcategory', 'oblast_reg', 'tip'));
        } */
		
		 elseif($id == 23){
			  if (!$oblast_reg){
			  $query = nedvigkommercheska::find()->orderBy(['data' => SORT_DESC])->where(['Like', 'type_nedvigimosty', 'Гостиничное'])->andWhere(['moder' => 1]);}
              else{ $query = nedvigkommercheska::find()->orderBy(['data' => SORT_DESC])->andWhere(['moder' => 1])
			  ->andWhere(['Like', 'oblast',  $oblast_reg])->andWhere(['Like', 'type_nedvigimosty', 'Гостиничное']);}			  
            $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 60, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $nedvigkommercheska = $query->offset($pages->offset)->limit($pages->limit)->all();
         $pag = Yii::$app->request->get('page'); 
		 if ($pag){
		  $this ->setMeta( '🏣 Купить или арендовать Гостиничные помещения и гостиницы. '.' страница '.$pag );
		 }else{
			 $this ->setMeta( '🏣 Купить или арендовать Гостиничные помещения и гостиницы ' );
		 }
       
        return $this->render('view', compact('nedvigkommercheska','pages', 'nedvigcategory', 'oblast_reg'));
        }
		
		 elseif($id == 24){
			  if (!$oblast_reg){
			  $query = nedvigkommercheska::find()->orderBy(['data' => SORT_DESC])->andWhere(['Like', 'type_nedvigimosty', 'Складское'])->andWhere(['moder' => 1]);}
              else{ $query = nedvigkommercheska::find()->orderBy(['data' => SORT_DESC])->andWhere(['moder' => 1])
			  ->andWhere(['Like', 'oblast',  $oblast_reg])->andWhere(['Like', 'type_nedvigimosty', 'Складское']);}			  
            $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 60, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $nedvigkommercheska = $query->offset($pages->offset)->limit($pages->limit)->all();
         $pag = Yii::$app->request->get('page'); 
		  if ($pag){
		  $this ->setMeta( '🏭 Купить или арендовать Складские помещения. '.' страница '.$pag );
		 }else{
			 $this ->setMeta( '🏭 Купить или арендовать Складские помещения ' );
		 }
       
        return $this->render('view', compact('nedvigkommercheska','pages', 'nedvigcategory', 'oblast_reg'));
        }
		
		 elseif($id == 25){
			  if (!$oblast_reg){
			  $query = nedvigkommercheska::find()->orderBy(['data' => SORT_DESC])->andWhere(['Like', 'type_nedvigimosty', 'Производственное'])->andWhere(['moder' => 1]);}
              else{ $query = nedvigkommercheska::find()->orderBy(['data' => SORT_DESC])->andWhere(['moder' => 1])
			  ->andWhere(['Like', 'oblast',  $oblast_reg])->andWhere(['Like', 'type_nedvigimosty', 'Производственное']);}			  
            $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 60, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $nedvigkommercheska = $query->offset($pages->offset)->limit($pages->limit)->all();
         $pag = Yii::$app->request->get('page'); 
		  if ($pag){
		  $this ->setMeta( ' 🏭 Купить или арендовать Производственные помещения. '.' страница '.$pag );
		 }else{
			 $this ->setMeta( ' 🏭 Купить или арендовать Производственные помещения ' );
		 }
       
        return $this->render('view', compact('nedvigkommercheska','pages', 'nedvigcategory', 'oblast_reg'));
        }
		
		 elseif($id == 26){
			  if (!$oblast_reg){
			  $query = nedvigkommercheska::find()->orderBy(['data' => SORT_DESC])->andWhere(['Like', 'type_nedvigimosty', 'Гаражного типа'])->andWhere(['moder' => 1]);}
              else{ $query = nedvigkommercheska::find()->orderBy(['data' => SORT_DESC])->andWhere(['moder' => 1])
			  ->andWhere(['Like', 'oblast',  $oblast_reg])->andWhere(['Like', 'type_nedvigimosty', 'Гаражного типа']);}			  
            $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 60, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $nedvigkommercheska = $query->offset($pages->offset)->limit($pages->limit)->all();
         $pag = Yii::$app->request->get('page'); 
		 if ($pag){
		  $this ->setMeta( 'Купить или арендовать Помещения гаражного типа. '.' страница '.$pag );
		 }else{
			 $this ->setMeta( 'Купить или арендовать Помещения гаражного типа ' );
		 }
       
        return $this->render('view', compact('nedvigkommercheska','pages', 'nedvigcategory', 'oblast_reg'));
        }
        
		   ////////////////ЗЕМЕЛЬНЫЕ УЧАСТКИ//////////////////
		
        elseif($id == 5||$id == 14){
			if (!$oblast_reg){
            $query = nedvigzemli::find()->orderBy(['data' => SORT_DESC])->andWhere(['moder' => 1]);}
			else{ $query = nedvigzemli::find()->orderBy(['data' => SORT_DESC])->andWhere(['moder' => 1])
			->andWhere(['Like', 'oblast',  $oblast_reg]);}
            $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 60, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $nedvigzemli = $query->offset($pages->offset)->limit($pages->limit)->all();
         $pag = Yii::$app->request->get('page'); 
		 if ($pag){
		   $this ->setMeta('🌏 Купить/Продать земельные участки ИЖС, Промназначения, Сельхоз или Дачный/СНТ можно здесь.'.' страница '.$pag);
		 }else{
			 $this ->setMeta('🌏 Купить/Продать земельные участки ИЖС, Промназначения, Сельхоз или Дачный/СНТ можно здесь');
		 }
       
        return $this->render('view', compact('nedvigzemli','pages', 'nedvigcategory', 'oblast_reg'));
        }
		
		 if ($id == 15){
			if (!$oblast_reg){
            $query = nedvigzemli::find()->orderBy(['data' => SORT_DESC])->andWhere(['Like', 'typ_uchastka', 'ИЖС'])->andWhere(['moder' => 1]);}
			else{ $query = nedvigzemli::find()->orderBy(['data' => SORT_DESC])->andWhere(['moder' => 1])
			->andWhere(['Like', 'oblast',  $oblast_reg])->andWhere(['Like', 'typ_uchastka', 'ИЖС']);}
            $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 60, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $nedvigzemli = $query->offset($pages->offset)->limit($pages->limit)->all();
         $pag = Yii::$app->request->get('page'); 
		 if ($pag){
		   $this ->setMeta( '🏞 Купить/Продать земельные участки ИЖС. '.' страница '.$pag );
		 }else{
			 $this ->setMeta( '🏞 Купить/Продать земельные участки ИЖС ' );
		 }
       
        return $this->render('view', compact('nedvigzemli','pages', 'nedvigcategory', 'oblast_reg'));
       }

       if ($id == 16){
			if (!$oblast_reg){
            $query = nedvigzemli::find()->orderBy(['data' => SORT_DESC])->andWhere(['Like', 'typ_uchastka', 'Промназначения'])->andWhere(['moder' => 1]);}
			else{ $query = nedvigzemli::find()->orderBy(['data' => SORT_DESC])->andWhere(['moder' => 1])
			->andWhere(['Like', 'oblast',  $oblast_reg])->andWhere(['Like', 'typ_uchastka', 'Промназначения']);}
            $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 60, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $nedvigzemli = $query->offset($pages->offset)->limit($pages->limit)->all();
         $pag = Yii::$app->request->get('page'); 
		 if ($pag){
		  $this ->setMeta( 'Купить/Продать Земельные участки Промназначения. '.' страница '.$pag );
		 }else{
			$this ->setMeta( 'Купить/Продать Земельные участки Промназначения ' );
		 }
        
        return $this->render('view', compact('nedvigzemli','pages', 'nedvigcategory', 'oblast_reg'));
       }

      if ($id == 17){
			if (!$oblast_reg){
            $query = nedvigzemli::find()->orderBy(['data' => SORT_DESC])->andWhere(['Like', 'typ_uchastka', 'Сельхозназначения'])->andWhere(['moder' => 1]);}
			else{ $query = nedvigzemli::find()->orderBy(['data' => SORT_DESC])->andWhere(['moder' => 1])
			->andWhere(['Like', 'oblast',  $oblast_reg])->andWhere(['Like', 'typ_uchastka', 'Сельхозназначения']);}
            $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 60, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $nedvigzemli = $query->offset($pages->offset)->limit($pages->limit)->all();
         $pag = Yii::$app->request->get('page'); 
		  if ($pag){
		  $this ->setMeta( 'Купить/Продать Земельные участки сельхозназначения. '.' страница '.$pag );
		 }else{
			 $this ->setMeta( 'Купить/Продать Земельные участки сельхозназначения ' );
		 }
       
        return $this->render('view', compact('nedvigzemli','pages', 'nedvigcategory', 'oblast_reg'));
       }

       if ($id == 18){
			if (!$oblast_reg){
            $query = nedvigzemli::find()->orderBy(['data' => SORT_DESC])->andWhere(['Like', 'typ_uchastka', 'Дачный/СНТ'])->andWhere(['moder' => 1]);}
			else{ $query = nedvigzemli::find()->orderBy(['data' => SORT_DESC])->andWhere(['moder' => 1])
			->andWhere(['Like', 'oblast',  $oblast_reg])->andWhere(['Like', 'typ_uchastka', 'Дачный/СНТ']);}
            $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 60, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $nedvigzemli = $query->offset($pages->offset)->limit($pages->limit)->all();
         $pag = Yii::$app->request->get('page'); 
		  if ($pag){
		  $this ->setMeta( 'Купить/Продать Земельные участки Дачные/СНТ. '.' страница '.$pag);
		 }else{
			 $this ->setMeta( 'Купить/Продать Земельные участки Дачные/СНТ ');
		 }
       
        return $this->render('view', compact('nedvigzemli','pages', 'nedvigcategory', 'oblast_reg'));
       }
	   
	     ///////////////////////////////////////////////////
        
        elseif($id == 6){
			if (!$oblast_reg){
            $query = nedviggaragi::find()->orderBy(['data' => SORT_DESC])->andWhere(['moder' => 1]);}
            else{$query = nedviggaragi::find()->orderBy(['data' => SORT_DESC])->andWhere(['moder' => 1])
			->andWhere(['Like', 'oblast',  $oblast_reg]);}			
            $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 60, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $nedviggaragi = $query->offset($pages->offset)->limit($pages->limit)->all();
         $pag = Yii::$app->request->get('page'); 
		  if ($pag){
		 $this ->setMeta('Купить, Арендовать Гаражи и машиноместа. '.' страница '.$pag );
		 }else{
			$this ->setMeta('Купить, Арендовать Гаражи и машиноместа ' );
		 }
        
        return $this->render('view', compact('nedviggaragi','pages', 'nedvigcategory', 'oblast_reg'));
        }
		
		elseif($id == 7){
			if (!$oblast_reg){
            $query = nedvigbiznes::find()->orderBy(['data' => SORT_DESC])->andWhere(['moder' => 1]);}
			else{$query = nedvigbiznes::find()->orderBy(['data' => SORT_DESC])->andWhere(['moder' => 1])
			->andWhere(['Like', 'oblast',  $oblast_reg]);}
            $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 60, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $nedvigbiznes = $query->offset($pages->offset)->limit($pages->limit)->all();
         $pag = Yii::$app->request->get('page'); 
		  if ($pag){
		 $this ->setMeta('Продажа, Аренда Готового бизнеса. '.' страница '.$pag );
		 }else{
			 $this ->setMeta('Продажа, Аренда Готового бизнеса ' );
		 }
       
        return $this->render('view', compact('nedvigbiznes','pages', 'nedvigcategory', 'oblast_reg'));
        }
    }
    
    
    public function actionSearch(){
		$this->layout = '@app/views/layouts/mainned/index.php';
        $q = trim(Yii::$app->request->get('q'));
        if (!$q){
             return $this -> render('search');  
        }
          $this ->setMeta('SaleMen Поиск:'. $q );
        
         $query = Nedvigkvartiri::find()->where(['Like', 'opisanie', $q]);
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 60, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $nedvigkvartiris = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('nedvigkvartiris', 'pages', 'q')); 
        
    }
	
	
}


