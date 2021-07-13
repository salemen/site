<?php

namespace app\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SignupForm;
use app\models\User;
use app\modules\admin\models\Oblast;
use app\modules\admin\models\Goroda;
use app\modules\admin\models\Raion;
use app\modules\admin\models\Model;
use app\controllers\Nedvigkvartiri;
use yii\web\UploadedFile;
use kartik\depdrop\DepDrop;
use GeoIp2\Database\Reader;
use app\modules\admin\Module;


class SiteController extends Controller
{
	
	
   
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
	 
	
	 
	 public function filters()
    {
        return array(
            array(
                'COutputCache',
                'duration'=> 120,
            ),
	);}
	
	public function actionOblastvibor(){
		  $cache = Yii::$app->cache;
		   function deleteFragmentCacheByKey($oblast)
            {
           return Yii::$app->cache->delete(['yii\widgets\FragmentCache', $oblast]);
            }
			 $oblast = $_GET['Oblast']['oblast_region'];
			 $oblast1 = Oblast::find()->select('oblast_region')
             ->where(['id' => $oblast])->one();
           foreach($oblast1 as $item) {
                $oblast = $item;} 
			 $key = 'oblast';
			 $cache->set($key, $oblast);
			 
			
	}
    
    public function getRaion($id_oblast, $id_gorod) {

       $out1 = raion::find()->select(['id','raion'])->where(['id_raion'=>$id_gorod])->distinct(true)->all();
       $out = ArrayHelper::map($out1, 'id','raion');
       foreach ($out as $key=>$item){
          $id=$key;
          $name=$item;  
          $outarr[]=['id'=>$id, 'name'=>$name];
       }
       $finalarr = ['out'=>$outarr, 'selected'=>''];
       return $finalarr;
       
       }
    
      


       public function actionGorod() {
   Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $out = [];
    if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $id_oblast = $parents[0];
           //$out = self::getSubCatList($id_oblast); 
            $out = goroda::find()->select(['id','name'])->indexBy('name')->where(['id_oblast' => $id_oblast])->asArray()->all();
            // the getSubCatList function will query the database based on the
            // cat_id and return an array like below:
            // [
            //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
            //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
            // ]
            return ['output'=>$out, 'selected'=>''];
        }
       
    }
    return ['output'=>'', 'selected'=>''];
}

    
    public function actionRaion() {
    Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $out = [];
    if (isset($_POST['depdrop_parents'])) {
       
        $ids = $_POST['depdrop_parents'];
      
        $id_oblast = empty($ids[0]) ? null : $ids[0];
        $id_gorod = empty($ids[1]) ? null : $ids[1];
        if ($id_oblast != null) {
           $data = self::getRaion($id_oblast, $id_gorod);
            
           
            /*
             * the getProdList function will query the database based on the
             * cat_id and sub_cat_id and return an array like below:
             *  [
             *      'out'=>[
             *          ['id'=>'<prod-id-1>', 'name'=>'<prod-name1>'],
             *          ['id'=>'<prod_id_2>', 'name'=>'<prod-name2>']
             *       ],
             *       'selected'=>'<prod-id-1>'
             *  ]
             */
           
           return ['output'=>$data['out'], 'selected'=>$data['selected']];
        }
    }
    
    return ['output'=>'', 'selected'=>''];

}


  public function actionModel() {
   Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $out = [];
    if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $mark_id = $parents[0];
           //$out = self::getSubCatList($id_oblast); 
            $out = model::find()->select(['id','name'])->indexBy('name')->where(['mark_id' => $mark_id])->asArray()->all();
            // the getSubCatList function will query the database based on the
            // cat_id and return an array like below:
            // [
            //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
            //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
            // ]
            return ['output'=>$out, 'selected'=>''];
        }
       
    }
    return ['output'=>'', 'selected'=>''];
}

public function actionAvtomarka()
{
    $data=model::model()->findAll('mark_id=:mark_id', 
		          array(':mark_id'=>(int) $_POST['id']));
    
    $data=ArrayHelper::map($data,'id','name');
    foreach($data as $value=>$name)
    {
        echo Html::tag('option',
				   array('value'=>$value),Html::encode($name),true);
    }
}
    
    public function actions()
    {
		$this->layout = '@app/views/layouts/error.php';
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
   
    
    public function actionIndex()
    {
		
        return $this->render('index');
    }
    
     public function actionMainavto()         
    {
        $this->layout = '@app/views/layouts/mainavto.php';
		
		require_once Yii::$app->basePath . "/vendor/geoip2/geoip2/geoip2.phar";
    require_once Yii::$app->basePath . "/vendor/autoload.php";

$reader = new Reader (Yii::$app->basePath ."/vendor/geoip2/geoip2/GeoLite2-City.mmdb");

if ($_GET['Oblast']['oblast_region']){
	$oblast_reg=$_GET['Oblast']['oblast_region'];

}else{$cache = Yii::$app->cache;
 $ip = Yii::$app->request->userIP;
 $key = "$ip";
 $oblast_reg= $cache->get($key);
 
}	
	 if (!$oblast_reg||$oblast_reg===false) {
     $record = $reader->city($ip);

 $oblast_reg = $record->mostSpecificSubdivision->name;
 $cache->set($key, $oblast_reg, 6400);

 $oblast_reg= $cache->get($key);
	 }
 $oblast1 = 'Выберите Ваш Регион';
         return $this->render('mainavto', compact('oblast_reg', 'oblast1'));
    }
    
	
     public function actionMain()         
    {
        $this->layout = '@app/views/layouts/main.php';
		
        return $this->render('main');
       }
    
	
	
    public function actionMainned()
	    
    {    $this->layout = '@app/views/layouts/mainned/index.php';
	
        
        return $this->render('mainned', compact('hits'));
    }
	
	

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    { 
	    $this->layout = '@app/views/layouts/login.php';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        Yii::$app->session->setFlash('success',"<center>Вы вошли в Личный кабинет сайта SaleMen.<br> Размещайте объявления абсалютно БЕСПЛАТНО в любой категории сайта.<br> Пользуйтесь любыми опциями сайта и рекомендуйте нас друзьям.</center>");
        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
    
    // Все что ниже компонент Авторизации, регистрации

    public function login()
    {
        return [
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'onAuthSuccess'],
            ],
        ];
    }
    
   public function actionSignup(){
	   
$this->layout = '@app/views/layouts/login.php';
 if (!Yii::$app->user->isGuest) {
 return $this->goHome();
 }
 $model = new SignupForm();
 if($model->load(\Yii::$app->request->post()) && $model->validate()){
 $user = new User();
 $user->username = $model->username;
 $user->password = \Yii::$app->security->generatePasswordHash($model->password);
 $user->telephone = $model->telephone;
 $user->email = $model->email;
 $username = \yii\helpers\HtmlPurifier::process($model->username);
 

 if($user->save()){
	 
	  Yii::$app->session->setFlash('success2',"<center>Войдите в Ваш Личный Кабинет <br> используя Логин и Пароль придуманные при регистрации.</center>");
             Yii::$app->mailer->compose('user', ['username' => $username] )->setFrom (['rim-79@bk.ru'=>'НОВЫЙ пользователь'])
			 -> setTo('info@salemen.ru')-> setSubject('РЕГИСТРАЦИЯ на SaleMen')->send ();
if (Yii::$app->getUser()->login($user)) {	
 return $this ->redirect('/admin');
 }}
 }

 return $this->render('signup', compact('model'));
}

    

     public function onAuthSuccess($client)
    {
        $attributes = $client->getUserAttributes();

        /* @var $auth Auth */
        $auth = Auth::find()->where([
            'source' => $client->getId(),
            'source_id' => $attributes['id'],
        ])->one();
        
        if (Yii::$app->user->isGuest) {
            if ($auth) { // авторизация
                $user = $auth->user;
                Yii::$app->user->login($user);
            } else { // регистрация
                if (isset($attributes['email']) && User::find()->where(['email' => $attributes['email']])->exists()) {
                    Yii::$app->getSession()->setFlash('error', [
                        Yii::t('app', "Пользователь с такой электронной почтой как в {client} уже существует, но с ним не связан. Для начала войдите на сайт использую электронную почту, для того, что бы связать её.", ['client' => $client->getTitle()]),
                    ]);
                } else {
                    $password = Yii::$app->security->generateRandomString(6);
                    $user = new User([
                        'username' => $attributes['login'],
                        'email' => $attributes['email'],
                        'password' => $password,
                    ]);
                    $user->generateAuthKey();
                    $user->generatePasswordResetToken();
                    $transaction = $user->getDb()->beginTransaction();
                    if ($user->save()) {
                        $auth = new Auth([
                            'user_id' => $user->id,
                            'source' => $client->getId(),
                            'source_id' => (string)$attributes['id'],
                        ]);
                        if ($auth->save()) {
                            $transaction->commit();
                            Yii::$app->user->login($user);
                        } else {
                            print_r($auth->getErrors());
                        }
                    } else {
                        print_r($user->getErrors());
                    }
                }
            }
        } else { // Пользователь уже зарегистрирован
            if (!$auth) { // добавляем внешний сервис аутентификации
                $auth = new Auth([
                    'user_id' => Yii::$app->user->id,
                    'source' => $client->getId(),
                    'source_id' => $attributes['id'],
                ]);
                $auth->save();
            }
        }
    }
    
 
}

