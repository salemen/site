<?

namespace app\controllers;
use app\models\Nedvigcategory;
use app\models\Nedvig_kvartiri;
use Yii;
use yii\data\Pagination;

class MainnedController extends AppController{
	
	 public function filters()
    {
        return array(
            array(
                'COutputCache',
                'duration'=> 180,
            ),
	);}
	
    public function actionIndex (){
        //$hits = Nedvig_kvartiri::find()->where(['hit'=>'1'])->limit(9)->all();
        
        $this -> setMeta ('SaleMen');
       return $this ->render ('index', compact('hits') );
       
    }
    
    public function actionView($id){
        $id = Yii::$app->request->get('id');
        $nedvigcategory = Nedvigcategory::findOne($id);
        if (empty($nedvigcategory)){
           throw new \yii\web\HttpException(404, 'Такой Категории нет или она удалена'); 
        }
        
//        $products = Product::find()->where(['category_id' => $id])->all();
        $query = Nedvig_kvartiri::find()->where(['parent_id' => $id]);
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 9, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $nedvig_kvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
     
        $this ->setMeta('SaleMen |'. $nedvigcategory->type );
        return $this->render('view', compact('nedvig_kvartiri','pages', 'nedvigcategory'));
    }
    
    public function actionSearch(){
        $q = trim(Yii::$app->request->get('q'));
        if (!$q){
             return $this -> render('search');  
        }
          $this ->setMeta('SaleMen Поиск!!!!:'. $q );
        
         $query = Product::find()->where(['Like', 'name', $q]);
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 9, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('products', 'pages', 'q')); 
        
    }
}


