<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Product;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\data\Pagination;
use app\models\Category;
use app\models\Cart;
use yii\db\Query;


/**
 * ProductController implements the CRUD actions for Product model.
 */
 
 
class ProductController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
	 
	  public function actionIndex(){
		   $this->layout = 'adminindex.php';
        $id = Yii::$app->request->get('id');
       

    {
      $username = Yii::$app->user->identity['username'];
        if ($username=='sarmetradmin'){
         $query1 = Product::find()->select($id)->where(['moder' => 0])->one();		 
		 if (!empty($query1)){
			 $query = Product::find()->select($id)->orderBy(['moder' => 0]); 
         }elseif(empty($query1)){
			 $query = Product::find()->select($id)->orderBy(['id' => SORT_DESC]); 
		 } 
		 $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 32, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
         $product = $query->offset($pages->offset)->limit($pages->limit)->all();
        }else{
              $query = Product::find()->select($id)->orderBy(['id' => SORT_DESC])->where(['username'=>$username]);
              $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 32, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
              $product = $query->offset($pages->offset)->limit($pages->limit)->all();
              
        }
              
      return $this ->render('index',compact ('product','pages','query1'),[
            
        ]);
    }
    }
	
	 public function actionCityList($q = null, $id = null) {
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $out = ['results' => ['id' => '', 'text' => '']];
    if (!is_null($q)) {
		$query = new Query;
		$query = Category::find()->select('id, name AS text')
			->where(['Like', 'keywords', $q])->andWhere(['not in', 'id', [1,2,3,4,5,6,7,8,11,63,19,20,21,22,23,24,28,55,56,86,87,24,29,30,36,65,178,179,179,180,181,182,183,184,185,186,187,188,189,190,191,192,210]])
			->limit(20);
			//$query->text = $query->name;
		$command = $query->createCommand();
		$data = $command->queryAll();
		$out['results'] = array_values($data);
    }
    elseif ($id > 0) {
        $out['results'] = ['id' => $id, 'text' => Category::find($id)->select('name')->all()];
    }
    return $out;
}
	 
    /* public function actionIndex()
    {
      $username = Yii::$app->user->identity['username'];
        if ($username=='sarmetr'){
        $dataProvider = new ActiveDataProvider([
            'query' => Product::find()->orderBy(['id' => SORT_DESC])
        ]);}else{
             $dataProvider = new ActiveDataProvider([
            'query' => Product::find()->orderBy(['id' => SORT_DESC])->where(['username'=>$username])
        ]);
        }

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    } */

    /**
     * Displays a single Product model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
	 
	  public function actionDeleteimg($id) {
        $model = $this->findModel($id);
        $image = $model->getImages();
        if($image) {
            $model->removeImages();
        }
        return $this->redirect(['view', 'id' => $model->id]);
    }
	 
    public function actionView($id)
    {
		    
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		 require_once Yii::$app->basePath.'/payconf.php';
		  $username = Yii::$app->user->identity['username'];
        $model = new Product();
		
		$post = Yii::$app->request->post();
        if ($_POST['declat'] && $_POST['declong']) {
		$model->declat = $_POST['declat'];
        $model->declong = $_POST['declong'];
        $model->save();
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			
         	$date = date("Y-m-d H:i:s");
			 
			  // сначала проверяем по Дате действия, потом если галочка поставлена то убираем их , считаем стоимость и сохраняем
			  
			  if ($model->verhdate < $date) {
				  $model->verh = '0';
				  $model->verhok = '0';
			  } 
			  if ($model->verh && $model->verhok){
				  $price_verh = '0';
			  } 	
			  if($model->verh && !$model->verhok){
				 $model->verh = '0';				
				 $price_verh = $prverh;
			 }
		 
			  if ($model->hit && $model->hitok){
				  $price_hit = '0';
			  } 	
			  if($model->hit && !$model->hitok){
				 $model->hit = '0';				
				 $price_hit = $prhit;
			 }
			 
			 if ($model->sale &&$model->saleok){
				  $price_sale = '0';
			 }
			 if($model->sale &&!$model->saleok){				
				 $model->sale = '0';
				 $price_sale = $prsale;
			 }
			 
			 if ($model->new &&$model->newok){
				 $price_new = '0';
			 }
			 if($model->new &&!$model->newok){				 
				 $model->new = '0';
				 $price_new = $prnew;
			 }
			 
			  if ($model->rekom &&$model->rekomok){
				  $price_rekom = '0';
			 }if($model->rekom &&!$model->rekomok){
				 $model->rekom = '0';
				 $price_rekom = $prrekom;
			 }
			 
			 if ($model->videl &&$model->videlok){
				  $price_videl = '0';
			 }if($model->videl &&!$model->videlok){
				 $model->videl = '0';
				 $price_videl = $prvidel;
			 }
			  
			   $model->save();
			// Считаем общую сумму оплаты  
			 $oplata = $price_new + $price_sale + $price_hit + $price_rekom + $price_videl +  $price_verh;
				 
				 
           // регистрационная информация (логин, пароль #1)
           $mrh_login = "SaleMen";
           $mrh_pass1 = "wZ413srIGd0tPntbg8PD";

           // номер заказа
           $inv_id = 0;

          // Логин пользователя		  
		  $username = $username;

          //id объявления		  
		  $id_id = $model->id;
		  
		  //verh
		  $price_verh = $price_verh;
		  
		  //hit
		  $price_hit = $price_hit;
		  
		  //sale
		  $price_sale = $price_sale;
		  
		  //new
		  $price_new = $price_new;
		  
		  //rekom		  
		  $price_rekom = $price_rekom;
		  
		  //videl
		  $price_videl = $price_videl;
		  
          // описание заказа
          $inv_desc = "На развитие сайта";

          // сумма заказа
          $out_summ = "$oplata";

          // тип товара
          $shp_item = 1;

          // предлагаемая валюта платежа
          $in_curr = "";

          // язык
          $culture = "ru";

       // формирование подписи
	    $crc  = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:Shp_id=$id_id:Shp_item=$shp_item:Shp_pricehit=$price_hit:Shp_pricenew=$price_new:Shp_pricerekom=$price_rekom:Shp_pricesale=$price_sale:Shp_priceverh=$price_verh:Shp_pricevidel=$price_videl:Shp_username=$username"); 
       
	    $model->image = UploadedFile::getInstance($model, 'image');
            
            if($model->image){
                $model->upload();
            }
            
            unset($model->image);
                        
             $model->gallery = UploadedFile::getInstances($model, 'gallery');
             $model-> uploadGallery();
	   
	   if ($oplata > 0){
		    Yii::$app->session->setFlash('success', "<center>Товар: {$model->name}, добавлен на сайт. Для применения опций к объявлению, ждем оплаты.</center>");
		return $this->render('/money/oplata', 
	   compact('mrh_login','mrh_pass1','inv_id','out_summ','shp_item','username','id_id',
	           'price_sale','price_hit','price_new','price_rekom','price_videl','price_verh','crc'));
		                   		
			 }elseif ($oplata == 0){
	   Yii::$app->session->setFlash('success', "<center>Товар: {$model->name}, добавлен на сайт. После модерации появится в Базе Данных</center>");
	   return $this->redirect(['view', 'id' => $model->id]);		
            
		}}
       
         return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found     */
	 
	public function actionUpdate($id)
    {        
	    require_once Yii::$app->basePath.'/payconf.php';
		$username = Yii::$app->user->identity['username'];
	    
        $model = $this->findModel($id);
		
		$post = Yii::$app->request->post();
        if ($_POST['declat'] && $_POST['declong']) {
		$model->declat = $_POST['declat'];
        $model->declong = $_POST['declong'];
        $model->save();
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		 
			  // сначала проверяем по Дате действия, потом если галочка поставлена то убираем их , считаем стоимость и сохраняем
			  
			 
			  if ($model->verh && $model->verhok){
				  $price_verh = '0';
			  } 	
			  if($model->verh && !$model->verhok){
				 $model->verh = '0';				
				 $price_verh = $prverh;
			 }
			 
		     if ($model->hit && $model->hitok){
				  $price_hit = '0';
				 	
			 }if($model->hit && !$model->hitok){
				 $model->hit = '0';				
				 $price_hit = $prhit;
			 }
			 
			 if ($model->sale &&$model->saleok){
				  $price_sale = '0';
			 }if($model->sale &&!$model->saleok){				
				 $model->sale = '0';
				 $price_sale = $prsale;
			 }
			 
			 if ($model->new &&$model->newok){
				 $price_new = '0';
			 }if($model->new &&!$model->newok){				 
				 $model->new = '0';
				 $price_new = $prnew;
			 }
			 
			  if ($model->rekom &&$model->rekomok){
				  $price_rekom = '0';
			 }if($model->rekom &&!$model->rekomok){
				 $model->rekom = '0';
				 $price_rekom = $prrekom;
			 }
			 
			 if ($model->videl &&$model->videlok){
				  $price_videl = '0';
			 }if($model->videl &&!$model->videlok){
				 $model->videl = '0';
				 $price_videl = $prvidel;
			 }
			  
			  if ($username == 'sarmetradmin'){
				  
			  }else{$model->moder = '0';}
			  
			  
			   $model->save();
			// Считаем общую сумму оплаты  
			 $oplata = $price_new + $price_sale + $price_hit + $price_rekom + $price_videl + $price_verh;
				 
				 
           // регистрационная информация (логин, пароль #1)
           $mrh_login = "SaleMen";
           $mrh_pass1 = "wZ413srIGd0tPntbg8PD";

           // номер заказа
           $inv_id = 0;

          // Логин пользователя		  
		  $username = $username;

          //id объявления		  
		  $id_id = $model->id;
		  
		  //verh
		  $price_verh = $price_verh;
  		  
		  //hit
		  $price_hit = $price_hit;
		  
		  //sale
		  $price_sale = $price_sale;
		  
		  //new
		  $price_new = $price_new;
		  
		  //rekom		  
		  $price_rekom = $price_rekom;
		  
		  //videl
		  $price_videl = $price_videl;
		  
          // описание заказа
          $inv_desc = "На развитие сайта";

          // сумма заказа
          $out_summ = "$oplata";

          // тип товара
          $shp_item = 1;

          // предлагаемая валюта платежа
          $in_curr = "";

          // язык
          $culture = "ru";

       // формирование подписи
	    $crc  = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:Shp_id=$id_id:Shp_item=$shp_item:Shp_pricehit=$price_hit:Shp_pricenew=$price_new:Shp_pricerekom=$price_rekom:Shp_pricesale=$price_sale:Shp_priceverh=$price_verh:Shp_pricevidel=$price_videl:Shp_username=$username"); 
       
	    $model->image = UploadedFile::getInstance($model, 'image');
            
            if($model->image){
                $model->upload();
            }
            
            unset($model->image);
            
             $model->gallery = UploadedFile::getInstances($model, 'gallery');
             $model-> uploadGallery();
	   
	   if ($oplata > 0){
		    Yii::$app->session->setFlash('success', "<center>Товар: {$model->name}, обновлен. Для применения опций к объявлению, ждем оплаты. </center>");
		return $this->render('/money/oplata', 
	   compact('mrh_login','mrh_pass1','inv_id','out_summ','shp_item','username','id_id',
	           'price_sale','price_hit','price_new','price_rekom','price_videl','price_verh','crc'));
		                   		
			 }elseif ($oplata == 0){
	   Yii::$app->session->setFlash('success', "<center>Товар: {$model->name}, обновлен. После модерации будет виден пользователям сайта</center>");
	   return $this->redirect(['view', 'id' => $model->id]);		
            
		}}
        return $this->render('update', [
            'model' => $model,
        ]);
    }
	 

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
	
	 public function actionSearch(){
   
		$username = Yii::$app->user->identity['username'];  
        $r = $_GET['Product']['category_id'];   		
        $p2 = trim(Yii::$app->request->get('p2'));
		if ($username=='sarmetradmin'){
		   if (!$p2&&!empty($r)){
				     $query = Product::find()->where(['category_id'=> $r])->orderBy(['id' => SORT_DESC]);
				}elseif ($r==1&&!empty($p2)){
					 $query = Product::find()->orderBy(['id' => SORT_DESC])->where(['id' => $p2]);
				}else {
					$query = Product::find()->orderBy(['id' => SORT_DESC])->where(['category_id'=> $r])->andWhere(['id' => $p2]);
				   } 
		}else {
			if (!$p2&&!empty($r)){
				     $query = Product::find()->where(['category_id'=> $r])->andWhere(['like', 'username', $username])->orderBy(['id' => SORT_DESC]);
				}elseif ($r==1&&!empty($p2)){
					 $query = Product::find()->orderBy(['id' => SORT_DESC])->where(['id' => $p2])->andWhere(['like', 'username', $username]);
				}else {
					$query = Product::find()->orderBy(['id' => SORT_DESC])->where(['category_id'=> $r])->andWhere(['like', 'username', $username])->andWhere(['id' => $p2]);
				   } 
		}

        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 24, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $product = $query->offset($pages->offset)->limit($pages->limit)->all();
		 Yii::$app->session->setFlash('success1', "<center>поиск завершен</center>");
        return $this -> render('search', compact('product', 'pages', 'r', 'p2' )); 
        
    }
}
