<?php



namespace app\controllers;
use app\models\Product;
use Yii;
use GeoIp2\Database\Reader;

 

class ProductController extends AppController {
	
	 public function filters()
    {
        return array(
            array(
                'COutputCache',
                'duration'=> 120,
            ),
	);}
    
    public function actionView ($id) {
		$this->layout = '@app/views/layouts/productview.php';
        $id = Yii::$app ->request ->get('id');
        $product = Product::findOne($id);
        if (empty($product)){
           throw new \yii\web\HttpException( 404, 'Такого товара нет или он еще не размещен.' ); 
        }
		
         //$hits = Product::find()->where(['hit'=>'1'])->orderBy('RAND()')->limit(16)->all();
         $this ->setMeta('SaleMen '. $product->name, $product->oblast_region, $product->description );
        return $this ->render('view', compact ('product'));
        
    } 
}


