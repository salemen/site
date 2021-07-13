<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Avtospec;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\data\Pagination;

/**
 * AvtospecController implements the CRUD actions for Avtospec model.
 */
class AvtospecController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Avtospec models.
     * @return mixed
     */
    public function actionIndex(){
		 $this->layout = 'adminindex.php';
             $id = Yii::$app->request->get('id');
       
    {
      $username = Yii::$app->user->identity['username'];
        if ($username=='sarmetradmin'){
         $query1 = Avtospec::find()->select($id)->where(['moder' => 0])->one();		 
		 if (!empty($query1)){
			 $query = Avtospec::find()->select($id)->orderBy(['moder' => 0]); 
         }elseif(empty($query1)){
			 $query = Avtospec::find()->select($id)->orderBy(['id' => SORT_DESC]); 
		 } 
		 $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 24, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
          $Avtospec = $query->offset($pages->offset)->limit($pages->limit)->all();
        }else{
              $query = Avtospec::find()->select($id)->orderBy(['id' => SORT_DESC])->where(['username'=>$username]);
              $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 24, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
              $Avtospec = $query->offset($pages->offset)->limit($pages->limit)->all();
              
        }
              
      return $this ->render('index',compact ('Avtospec','pages'),[
            
        ]);
    }
    }

    /**
     * Displays a single Avtospec model.
     * @param integer $id
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
		$username = Yii::$app->user->identity['username'];
		     // отправка почты клиентам
              if ($username=='sarmetradmin'){
			  }else { 
             Yii::$app->mailer->compose('ads', ['username' => $username] )->setFrom (['rim-79@bk.ru'=>'Новое объявление на сайте'])
			  -> setTo('info@salemen.ru')-> setSubject('Новое объявление, СПЕЦТЕХНИКА')->send ();}
			 
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Avtospec model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		include Yii::$app->basePath.'/payconf.php';
		 $username = Yii::$app->user->identity['username'];
        $model = new Avtospec();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			
			// если галочка поставлена то убираем их , считаем стоимость и сохраняем
		 
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
			 $oplata = $price_new + $price_sale + $price_hit + $price_rekom + $price_videl;
				 
				 
           // регистрационная информация (логин, пароль #1)
           $mrh_login = "SaleMen";
           $mrh_pass1 = "wZ413srIGd0tPntbg8PD";

           // номер заказа
           $inv_id = 0;

          // Логин пользователя		  
		  $username = $username;

          //id объявления		  
		  $id_id = $model->id;
		  
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
          $shp_item = 11;

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
		    Yii::$app->session->setFlash('success', "<center>Объявление добавлено на сайт. Для применения опций к объявлению, ждем оплаты.</center>");
		return $this->render('/money/oplata', 
	   compact('mrh_login','mrh_pass1','inv_id','out_summ','shp_item','username','id_id',
	           'price_sale','price_hit','price_new','price_rekom','price_videl','crc'));
		                   		
			 }elseif ($oplata == 0){
	   Yii::$app->session->setFlash('success', "<center>Объявление добавлено на сайт. После модерации появится в Базе Данных.</center>");
	   return $this->redirect(['view', 'id' => $model->id]);		
            
		}}

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Avtospec model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
		include Yii::$app->basePath.'/payconf.php';
		 $username = Yii::$app->user->identity['username'];
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			
			// если галочка поставлена то убираем их , считаем стоимость и сохраняем
		 
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
			  
			   if ($username == 'sarmetradmin'){
				  
			  }else{$model->moder = '0';}
			  
			   $model->save();
			// Считаем общую сумму оплаты  
			 $oplata = $price_new + $price_sale + $price_hit + $price_rekom + $price_videl;
				 
				 
           // регистрационная информация (логин, пароль #1)
           $mrh_login = "SaleMen";
           $mrh_pass1 = "wZ413srIGd0tPntbg8PD";

           // номер заказа
           $inv_id = 0;

          // Логин пользователя		  
		  $username = $username;

          //id объявления		  
		  $id_id = $model->id;
		  
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
          $shp_item = 11;

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
		    Yii::$app->session->setFlash('success', "<center>Объявление обновлено. Для применения опций к объявлению, ждем оплаты.</center>");
		return $this->render('/money/oplata', 
	   compact('mrh_login','mrh_pass1','inv_id','out_summ','shp_item','username','id_id',
	           'price_sale','price_hit','price_new','price_rekom','price_videl','crc'));
		                   		
			 }elseif ($oplata == 0){
	   Yii::$app->session->setFlash('success', "<center>Объявление обновлено. После модерации будет видно пользователям сайта.</center>");
	   return $this->redirect(['view', 'id' => $model->id]);		
            
		}}

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    /**
     * Deletes an existing Avtospec model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Avtospec model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Avtospec the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Avtospec::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
