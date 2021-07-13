<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\data\Pagination;


/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    
     public function actionIndex(){
		 $this->layout = 'adminindex.php';
             $id = Yii::$app->request->get('id');
        $user = user::findOne($id);
//          if (empty($product)){
//           throw new \yii\web\HttpException(404, 'Ничего нет'); 
//        }
    {
      $username = Yii::$app->user->identity['username'];
        if ($username=='sarmetradmin'){
         $query = user::find()->select($id)->orderBy(['id' => SORT_DESC]);
         $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 16, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
         $user = $query->offset($pages->offset)->limit($pages->limit)->all();
         
        }else{
              $query = user::find()->select($id)->orderBy(['id' => SORT_DESC])->where(['username'=>$username]);
              $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 16, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
              $user = $query->offset($pages->offset)->limit($pages->limit)->all();
              
        }
              
      return $this ->render('index',compact ('user','pages'),[
            
        ]);
    }
    }
    
	
   /*  public function actionIndex()
    {
        $model = User::find()->select('id,email,telephone,gorod,adress,opisanie,image');
        $username = Yii::$app->user->identity['username'];
        if ($username=='sarmetradmin'){
        $dataProvider = new ActiveDataProvider([
            'query' => User::find()->select('username,id,email,telephone,gorod,adress,opisanie,image')
        ]);}else{
             $dataProvider = new ActiveDataProvider([
            'query' => User::find()->select('username,id,email,telephone,gorod,adress,opisanie,image')->where(['username'=>$username])
        ]);
        }

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    } */


    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
       

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->image = UploadedFile::getInstance($model, 'image');
            
            if($model->image){
                $model->upload();
            }
            
            unset($model->image);
            
            
             $model->gallery = UploadedFile::getInstances($model, 'gallery');
             $model-> uploadGallery();
            
            
             Yii::$app->session->setFlash('success', "<center>Ваш профиль обновлен</center>");
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
