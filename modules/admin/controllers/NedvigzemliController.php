<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use app\modules\admin\models\NedvigZemli;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\data\Pagination;

/**
 * NedvigzemliController implements the CRUD actions for NedvigZemli model.
 */
class NedvigzemliController extends Controller
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
     * Lists all NedvigZemli models.
     * @return mixed
     */
   public function actionIndex(){
	    $this->layout = 'adminindex.php';
             $id = Yii::$app->request->get('id');
      
    {
		$username = Yii::$app->user->identity['username'];
        if ($username=='sarmetradmin'){
         $query1 = Nedvigzemli::find()->select($id)->where(['moder' => 0])
		 ->andWhere(['not in', 'id', [2,4,5,8,9,10,11,12,13,14,15,16,17,18]])->one();		 
		 if (!empty($query1)){
			 $query = Nedvigzemli::find()->select($id)->orderBy(['moder' => 0])->where(['not in', 'id', [2,4,5,8,9,10,11,12,13,14,15,16,17,18]]); 
         }elseif(empty($query1)){
			 $query = Nedvigzemli::find()->select($id)->orderBy(['id' => SORT_DESC]); 
		 } 
		 $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 24, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
         $Nedvigzemli = $query->offset($pages->offset)->limit($pages->limit)->all();
        }else{
              $query = Nedvigzemli::find()->select($id)->orderBy(['id' => SORT_DESC])->where(['username'=>$username]);
              $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 24, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
              $Nedvigzemli = $query->offset($pages->offset)->limit($pages->limit)->all();
              
        }
              
      return $this ->render('index',compact ('Nedvigzemli','pages'),[
            
        ]);
    }
    }

    /**
     * Displays a single NedvigZemli model.
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
		     // ???????????????? ?????????? ????????????????
              
			   if ($username=='sarmetradmin'){
			  }else {
             Yii::$app->mailer->compose('ads', ['username' => $username] )->setFrom (['rim-79@bk.ru'=>'?????????? ???????????????????? ???? ??????????'])
			  -> setTo('info@salemen.ru')-> setSubject('?????????? ????????????????????, ?????????????????? ??????????????')->send ();}
			 
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new NedvigZemli model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		 include Yii::$app->basePath.'/payconf.php';
		  $username = Yii::$app->user->identity['username'];
        $model = new NedvigZemli();
		
		 $post = Yii::$app->request->post();
        if ($_POST['declat'] && $_POST['declong']) {
		$model->declat = $_POST['declat'];
        $model->declong = $_POST['declong'];
        $model->save();
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			
			// ???????? ?????????????? ???????????????????? ???? ?????????????? ???? , ?????????????? ?????????????????? ?? ??????????????????
			
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
			// ?????????????? ?????????? ?????????? ????????????  
			 $oplata = $price_new + $price_sale + $price_hit + $price_rekom + $price_videl + $price_verh;
				 
				 
           // ?????????????????????????????? ???????????????????? (??????????, ???????????? #1)
           $mrh_login = "SaleMen";
           $mrh_pass1 = "wZ413srIGd0tPntbg8PD";

           // ?????????? ????????????
           $inv_id = 0;

          // ?????????? ????????????????????????		  
		  $username = $username;

          //id ????????????????????		  
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
		  
          // ???????????????? ????????????
          $inv_desc = "???? ???????????????? ??????????";

          // ?????????? ????????????
          $out_summ = "$oplata";

          // ?????? ????????????
          $shp_item = 6;

          // ???????????????????????? ???????????? ??????????????
          $in_curr = "";

          // ????????
          $culture = "ru";

       // ???????????????????????? ??????????????
	    $crc  = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:Shp_id=$id_id:Shp_item=$shp_item:Shp_pricehit=$price_hit:Shp_pricenew=$price_new:Shp_pricerekom=$price_rekom:Shp_pricesale=$price_sale:Shp_priceverh=$price_verh:Shp_pricevidel=$price_videl:Shp_username=$username"); 			
						
			
            $model->image = UploadedFile::getInstance($model, 'image');
            
            if($model->image){
                $model->upload();
            }
            
            unset($model->image);
            
            
             $model->gallery = UploadedFile::getInstances($model, 'gallery');
             $model-> uploadGallery();
            
            
             if ($oplata > 0){
		    Yii::$app->session->setFlash('success', "<center>?????????????? ???????????????? ???? ????????. ?????? ???????????????????? ?????????? ?? ????????????????????, ???????? ????????????.</center>");
		return $this->render('/money/oplata', 
	   compact('mrh_login','mrh_pass1','inv_id','out_summ','shp_item','username','id_id',
	           'price_sale','price_hit','price_new','price_rekom','price_videl','price_verh','crc'));
		                   		
			 }elseif ($oplata == 0){
	   Yii::$app->session->setFlash('success', "<center>?????????????? ???????????????? ???? ????????. ?????????? ?????????????????? ???????????????? ?? ???????? ????????????</center>");
	   return $this->redirect(['view', 'id' => $model->id]);		
            
		}}

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing NedvigZemli model.
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
		
		 $post = Yii::$app->request->post();
        if ($_POST['declat'] && $_POST['declong']) {
		$model->declat = $_POST['declat'];
        $model->declong = $_POST['declong'];
        $model->save();
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			
			// ???????? ?????????????? ???????????????????? ???? ?????????????? ???? , ?????????????? ?????????????????? ?? ??????????????????
			 
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
			// ?????????????? ?????????? ?????????? ????????????  
			 $oplata = $price_new + $price_sale + $price_hit + $price_rekom + $price_videl + $price_verh;
				 
				 
           // ?????????????????????????????? ???????????????????? (??????????, ???????????? #1)
           $mrh_login = "SaleMen";
           $mrh_pass1 = "wZ413srIGd0tPntbg8PD";

           // ?????????? ????????????
           $inv_id = 0;

          // ?????????? ????????????????????????		  
		  $username = $username;

          //id ????????????????????		  
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
		  
          // ???????????????? ????????????
          $inv_desc = "???? ???????????????? ??????????";

          // ?????????? ????????????
          $out_summ = "$oplata";

          // ?????? ????????????
          $shp_item = 6;

          // ???????????????????????? ???????????? ??????????????
          $in_curr = "";

          // ????????
          $culture = "ru";

       // ???????????????????????? ??????????????
	    $crc  = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:Shp_id=$id_id:Shp_item=$shp_item:Shp_pricehit=$price_hit:Shp_pricenew=$price_new:Shp_pricerekom=$price_rekom:Shp_pricesale=$price_sale:Shp_priceverh=$price_verh:Shp_pricevidel=$price_videl:Shp_username=$username"); 
       	
            
             $model->image = UploadedFile::getInstance($model, 'image');
            
            if($model->image){
                $model->upload();
            }
            
            unset($model->image);
            
            
             $model->gallery = UploadedFile::getInstances($model, 'gallery');
             $model-> uploadGallery();
            
            
             if ($oplata > 0){
		    Yii::$app->session->setFlash('success', "<center>???????????????????? ??????????????????. ?????? ???????????????????? ?????????? ?? ????????????????????, ???????? ????????????.</center>");
		return $this->render('/money/oplata', 
	    compact('mrh_login','mrh_pass1','inv_id','out_summ','shp_item','username','id_id',
	           'price_sale','price_hit','price_new','price_rekom','price_videl','price_verh','crc'));
		                   		
			 }elseif ($oplata == 0){
	   Yii::$app->session->setFlash('success', "<center>???????????????????? ??????????????????. ?????????? ?????????????????? ?????????? ?????????? ?????????????????????????? ??????????.</center>");
	   return $this->redirect(['view', 'id' => $model->id]);		
            
		}}

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing NedvigZemli model.
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
     * Finds the NedvigZemli model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NedvigZemli the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NedvigZemli::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
	
	public function actionSearch(){
		
        $username = Yii::$app->user->identity['username'];                                                        
        $tip = $_GET['Tipzemli']['id'];
        $mi1 = trim(Yii::$app->request->get('mi1'));
        $ma2 = trim(Yii::$app->request->get('ma2'));
		$p3 = trim(Yii::$app->request->get('p3'));
		if ($username=='sarmetradmin'){
           if (!$mi1&&!$ma2&&!$p3&&!empty($tip)){
	        $query = nedvigzemli::find()->andWhere([ 'like', 'typ_uchastka', $tip])->orderBy(['data' => SORT_DESC]);
                }elseif(!$mi1&&!$ma2&&!empty($p3)&&!empty($tip)){
	            $query = nedvigzemli::find()->where([ 'like', 'typ_uchastka', $tip])->andWhere([ 'id' => $p3])->orderBy(['data' => SORT_DESC]);
				}elseif(!$mi1&&!empty($ma2)&&!empty($tip)&&!empty($p3)){
	            $query = nedvigzemli::find()->where([ 'like', 'typ_uchastka', $tip])->andWhere([ 'id' => $p3])->andWhere([ '<=','price',$ma2])->orderBy(['data' => SORT_DESC]);
				}elseif(!$ma2&&!empty($mi1)&&!empty($tip)&&!empty($p3)){
	            $query = nedvigzemli::find()->where([ 'like', 'typ_uchastka', $tip])->andWhere([ 'id' => $p3])->andWhere(['>=','plochad_uchastka',$mi1])->orderBy(['data' => SORT_DESC]);
				}elseif(!$p3&&!empty($mi1)&&!empty($tip)&&!empty($ma2)){
	            $query = nedvigzemli::find()->where([ 'like', 'typ_uchastka', $tip])->andWhere(['>=','plochad_uchastka',$mi1])->andWhere([ '<=','price',$ma2])->orderBy(['data' => SORT_DESC]);
				}elseif(!$ma2&&!$p3&&!empty($mi1)&&!empty($tip)){
	            $query = nedvigzemli::find()->where([ 'like', 'typ_uchastka', $tip])->andWhere(['>=','plochad_uchastka',$mi1])->orderBy(['data' => SORT_DESC]);
				}elseif(!$mi1&&!$p3&&!empty($ma2)&&!empty($tip)){
                $query = nedvigzemli::find()->where([ 'like', 'typ_uchastka', $tip])->andWhere([ '<=','price',$ma2])->orderBy(['data' => SORT_DESC]);
		        }else { $query = nedvigzemli::find()->andWhere([ 'like', 'typ_uchastka', $tip])->andWhere(['>=','plochad_uchastka',$mi1])->andWhere([ '<=','price',$ma2])->andWhere([ 'id' => $p3])->orderBy(['data' => SORT_DESC]);  
                }  
		}else{
			if (!$mi1&&!$ma2&&!$p3&&!empty($tip)){
	        $query = nedvigzemli::find()->andWhere([ 'like', 'typ_uchastka', $tip])->andWhere(['like', 'username', $username])->orderBy(['data' => SORT_DESC]);
                }elseif(!$mi1&&!$ma2&&!empty($p3)&&!empty($tip)){
	            $query = nedvigzemli::find()->where([ 'like', 'typ_uchastka', $tip])->andWhere([ 'id' => $p3])->andWhere(['like', 'username', $username])->orderBy(['data' => SORT_DESC]);
				}elseif(!$mi1&&!empty($ma2)&&!empty($tip)&&!empty($p3)){
	            $query = nedvigzemli::find()->where([ 'like', 'typ_uchastka', $tip])->andWhere([ 'id' => $p3])->andWhere([ '<=','price',$ma2])->andWhere(['like', 'username', $username])->orderBy(['data' => SORT_DESC]);
				}elseif(!$ma2&&!empty($mi1)&&!empty($tip)&&!empty($p3)){
	            $query = nedvigzemli::find()->where([ 'like', 'typ_uchastka', $tip])->andWhere([ 'id' => $p3])->andWhere(['>=','plochad_uchastka',$mi1])->andWhere(['like', 'username', $username])->orderBy(['data' => SORT_DESC]);
				}elseif(!$p3&&!empty($mi1)&&!empty($tip)&&!empty($ma2)){
	            $query = nedvigzemli::find()->where([ 'like', 'typ_uchastka', $tip])->andWhere(['>=','plochad_uchastka',$mi1])->andWhere([ '<=','price',$ma2])->andWhere(['like', 'username', $username])->orderBy(['data' => SORT_DESC]);
				}elseif(!$ma2&&!$p3&&!empty($mi1)&&!empty($tip)){
	            $query = nedvigzemli::find()->where([ 'like', 'typ_uchastka', $tip])->andWhere(['>=','plochad_uchastka',$mi1])->andWhere(['like', 'username', $username])->orderBy(['data' => SORT_DESC]);
				}elseif(!$mi1&&!$p3&&!empty($ma2)&&!empty($tip)){
                $query = nedvigzemli::find()->where([ 'like', 'typ_uchastka', $tip])->andWhere([ '<=','price',$ma2])->andWhere(['like', 'username', $username])->orderBy(['data' => SORT_DESC]);
		        }else { $query = nedvigzemli::find()->andWhere([ 'like', 'typ_uchastka', $tip])->andWhere(['>=','plochad_uchastka',$mi1])->andWhere([ '<=','price',$ma2])->andWhere([ 'id' => $p3])->andWhere(['like', 'username', $username])->orderBy(['data' => SORT_DESC]);  
                } 
		}

			 
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 24, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $Nedvigzemli = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('Nedvigzemli', 'pages', 'tip', 'mi1', 'ma2', 'p3')); 
        
    }
}
