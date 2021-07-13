<?

namespace app\controllers;
use yii\data\ActiveDataProvider;
use app\models\Category;
use app\models\Product;
use app\modules\admin\models\Marka;
use app\modules\admin\models\Oblast;
use app\controllers\OblastController;
use Yii;
use yii\data\Pagination;
use GeoIp2\Database\Reader;



class PhotoController extends AppController{
	
	
	
	
    public function actionIndex (){
		
	     //$this->layout = '@app/views/layouts/photo.php';
	     $product1 = Product::find()->where(['moder'=> '1'])->orderBy(['id' => SORT_DESC])->limit(84);
		
        $pages = new Pagination (['totalCount'=> $product1->count(), 'pageSize' => 84, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $product = $product1->offset($pages->offset)->limit($pages->limit)->all();
        $this -> setMeta (' Фото объявления ');
       return $this ->render ('index', compact('product', 'pages')); 
		
    }
	
   
	}