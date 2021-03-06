<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\NedvigKvartiri;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\data\Pagination;

/**
 * NedvigkvartiriController implements the CRUD actions for NedvigKvartiri model.
 */
class NedvigkvartiriController extends Controller
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
     * Lists all NedvigKvartiri models.
     * @return mixed
     */
    public function actionIndex(){
		 $this->layout = 'adminindex.php';
             $id = Yii::$app->request->get('id');
       
    {
		$username = Yii::$app->user->identity['username'];
        if ($username=='sarmetradmin'){
         $query1 = Nedvigkvartiri::find()->select($id)->where(['moder' => 0])->one();		 
		 if (!empty($query1)){
			 $query = Nedvigkvartiri::find()->select($id)->orderBy(['moder' => 0]); 
         }elseif(empty($query1)){
			 $query = Nedvigkvartiri::find()->select($id)->orderBy(['id' => SORT_DESC]); 
		 } 
		 $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 24, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
         $Nedvigkvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
        }else{
              $query = Nedvigkvartiri::find()->select($id)->orderBy(['id' => SORT_DESC])->where(['username'=>$username]);
              $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 24, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
              $Nedvigkvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
              
        }
              
      return $this ->render('index',compact ('Nedvigkvartiri','pages'),[
            
        ]);
    }
    }

    /**
     * Displays a single NedvigKvartiri model.
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
             Yii::$app->mailer->compose('ads', ['username' => $username] )->setFrom (['rim-79@bk.ru'=>'?????????? ???????????????????? ???? ??????????'])-> setTo('info@salemen.ru')
			  -> setSubject('?????????? ????????????????????, ????????????????')->send ();}
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new NedvigKvartiri model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionGetNedvigkvartiri()
{
    $categoryId = $_POST['oblast'];

    if($categoryId == 0)
        $Goroda = Goroda::model()->findAllBySql('SELECT DISTINCT parent_id FROM goroda WHERE id=1');
    else
        $Goroda = Goroda::model()->findAllBySql('SELECT DISTINCT parent_id FROM goroda WHERE parent_id='.$categoryId.';');
                
    echo '<option value="">???????????????? ??????????????????????????</option>';
    foreach ($Goroda as $val) 
    {
        echo '<option value="'.$val['name'].'">'.$val['name'].'</option>';
    }
}
 
    
    public function actionCreate()
    {
		 include Yii::$app->basePath.'/payconf.php';
		  $username = Yii::$app->user->identity['username'];
        $model = new NedvigKvartiri();
		
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
			 $oplata = $price_new + $price_sale + $price_hit + $price_rekom + $price_videl + $price_verh ;
				 
				 
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
          $shp_item = 2;

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
		    Yii::$app->session->setFlash('success', "<center>???????????????? ??????????????????. ?????? ???????????????????? ?????????? ?? ????????????????????, ???????? ????????????. </center>");
		return $this->render('/money/oplata', 
	   compact('mrh_login','mrh_pass1','inv_id','out_summ','shp_item','username','id_id',
	           'price_sale','price_hit','price_new','price_rekom','price_videl','price_verh','crc'));
		                   		
			 }elseif ($oplata == 0){
	   Yii::$app->session->setFlash('success', "<center>???????????????? ??????????????????. ?????????? ?????????????????? ???????????????? ?? ???????? ????????????</center>");
	   return $this->redirect(['view', 'id' => $model->id]);		
            
		}}
        return $this->render('create', [
            'model' => $model, $i
        ]);
    }

    /**
     * Updates an existing NedvigKvartiri model.
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
          $shp_item = 2;

          // ???????????????????????? ???????????? ??????????????
          $in_curr = "";

          // ????????
          $culture = "ru";

       // ???????????????????????? ??????????????
	    $crc  = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:Shp_id=$id_id:Shp_item=$shp_item:Shp_pricehit=$price_hit:Shp_pricenew=$price_new:Shp_pricerekom=$price_rekom:Shp_pricesale=$price_sale:Shp_priceverh=$price_verh:Shp_pricevidel=$price_videl:Shp_username=$username"); 
       	
			
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
            'model' => $model, 'moder' 
        ]);
    }

    /**
     * Deletes an existing NedvigKvartiri model.
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
     * Finds the NedvigKvartiri model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NedvigKvartiri the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NedvigKvartiri::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
   
 public function actionSearch(){
                                                        
        $username = Yii::$app->user->identity['username'];                                               
        $op = $_GET['Operaciya']['id'];
		$gor = $_GET['Goroda']['name'];
        $r = $_GET['Raion']['raion'];
        $vid = $_GET['Vidnedvig']['id'];
        $k = $_GET['Komnat']['id'];
        $p1 = trim(Yii::$app->request->get('p1'));
        $p2 = trim(Yii::$app->request->get('p2'));
		$p3 = trim(Yii::$app->request->get('p3'));
		if ($username=='sarmetradmin'){
           if (!$p1&&!$p2&&!$r&&!$gor&&!$reg&&!$p3){
	        $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'kolichestvo_komnat', $k])->orderBy(['data' => SORT_DESC]);
                } elseif(!$p1&&!$p2&&!$p3&&!$r&&!$gor){
               $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'kolichestvo_komnat', $k])->orderBy(['data' => SORT_DESC]);
		        } elseif(!$p1&&!$p2&&!$r&&!$gor&&!$reg){
               $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'kolichestvo_komnat', $k])->orderBy(['data' => SORT_DESC]);
		        }elseif(!$p1&&!$p2&&!$p3&&!$r){
               $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'kolichestvo_komnat', $k])->orderBy(['data' => SORT_DESC]);
		        }elseif(!$p2&&!$p3&&!$r&&!$gor){
                $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere(['id' => $p1])->orderBy(['data' => SORT_DESC]);
		        }elseif(!$p2&&!$p1&&!$r&&!$gor){
                $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'kolichestvo_komnat', $k])->orderBy(['data' => SORT_DESC]);
		        }elseif (!$p1&&!$r&&!$gor){
			   $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);
                }elseif (!$r&&!$gor&&!$p3){
			   $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->andWhere(['id' => $p1])->orderBy(['data' => SORT_DESC]);
         	    } elseif (!$p1&&!$p2&&!$p3){
			   $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere(['raion' => $r])->andWhere(['gorod' => $gor])->orderBy(['data' => SORT_DESC]);
         	    } elseif (!$r&&!$p1&&!$p3){
			    $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
                }elseif (!$r&&!$p2&&!$p3){
			    $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere(['id' => $p1])->orderBy(['data' => SORT_DESC]);  
                }elseif (!$r&&!$p2){
			    $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere(['id' => $p1])->orderBy(['data' => SORT_DESC]);  
                }elseif (!$r&&!$p1){
			    $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
                }elseif (!$p1&&!$p2){
			   $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere(['raion' => $r])->andWhere(['gorod' => $gor])->orderBy(['data' => SORT_DESC]);
         	    }elseif (!$r&&!$gor){
			   $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->andWhere(['id' => $p1])->orderBy(['data' => SORT_DESC]);
         	    }elseif(!$p2&&!$r&&!$gor){
                $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere(['id' => $p1])->orderBy(['data' => SORT_DESC]);
		        }elseif(!$p1&&!$p2&&!$r){
               $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ 'like', 'oblast_region', $reg])->orderBy(['data' => SORT_DESC]);
		        }  else { $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere(['raion' => $r])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere(['id' => $p1])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
                } 

        }else{
			if (!$p1&&!$p2&&!$r&&!$gor&&!$reg&&!$p3){
	        $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere(['like', 'username', $username])->orderBy(['data' => SORT_DESC]);
                } elseif(!$p1&&!$p2&&!$p3&&!$r&&!$gor){
               $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere(['like', 'username', $username])->orderBy(['data' => SORT_DESC]);
		        } elseif(!$p1&&!$p2&&!$r&&!$gor&&!$reg){
               $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere(['like', 'username', $username])->orderBy(['data' => SORT_DESC]);
		        }elseif(!$p1&&!$p2&&!$p3&&!$r){
               $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere(['like', 'username', $username])->orderBy(['data' => SORT_DESC]);
		        }elseif(!$p2&&!$p3&&!$r&&!$gor){
                $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere(['id' => $p1])->andWhere(['like', 'username', $username])->orderBy(['data' => SORT_DESC]);
		        }elseif(!$p2&&!$p1&&!$r&&!$gor){
                $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere(['like', 'username', $username])->orderBy(['data' => SORT_DESC]);
		        }elseif (!$p1&&!$r&&!$gor){
			   $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->andWhere(['like', 'username', $username])->orderBy(['data' => SORT_DESC]);
                }elseif (!$r&&!$gor&&!$p3){
			   $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->andWhere(['id' => $p1])->andWhere(['like', 'username', $username])->orderBy(['data' => SORT_DESC]);
         	    } elseif (!$p1&&!$p2&&!$p3){
			   $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere(['raion' => $r])->andWhere(['gorod' => $gor])->andWhere(['like', 'username', $username])->orderBy(['data' => SORT_DESC]);
         	    } elseif (!$r&&!$p1&&!$p3){
			    $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->andWhere(['like', 'username', $username])->orderBy(['data' => SORT_DESC]);  
                }elseif (!$r&&!$p2&&!$p3){
			    $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere(['id' => $p1])->andWhere(['like', 'username', $username])->orderBy(['data' => SORT_DESC]);  
                }elseif (!$r&&!$p2){
			    $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere(['id' => $p1])->andWhere(['like', 'username', $username])->orderBy(['data' => SORT_DESC]);  
                }elseif (!$r&&!$p1){
			    $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->andWhere(['like', 'username', $username])->orderBy(['data' => SORT_DESC]);  
                }elseif (!$p1&&!$p2){
			   $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere(['raion' => $r])->andWhere(['gorod' => $gor])->andWhere(['like', 'username', $username])->orderBy(['data' => SORT_DESC]);
         	    }elseif (!$r&&!$gor){
			   $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ '<=','price',$p2])->andWhere(['id' => $p1])->andWhere(['like', 'username', $username])->orderBy(['data' => SORT_DESC]);
         	    }elseif(!$p2&&!$r&&!$gor){
                $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere(['id' => $p1])->andWhere(['like', 'username', $username])->orderBy(['data' => SORT_DESC]);
		        }elseif(!$p1&&!$p2&&!$r){
               $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere([ 'like', 'oblast_region', $reg])->andWhere(['like', 'username', $username])->orderBy(['data' => SORT_DESC]);
		        }  else { $query = nedvigkvartiri::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'vtorichka_novostroi', $vid])->andWhere(['raion' => $r])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'kolichestvo_komnat', $k])->andWhere(['id' => $p1])->andWhere([ '<=','price',$p2])->andWhere(['like', 'username', $username])->orderBy(['data' => SORT_DESC]);  
                } 
		}				
          if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		  $reg = $item;} }
		 
		
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 24, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $Nedvigkvartiri = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('Nedvigkvartiri', 'pages', 'r', 'p1', 'p2', 'p3', 'vid', 'k', 'op', 'gor', 'reg')); 
        
    }   
   

}
