<?php

namespace app\controllers;
use app\modules\admin\models\Oblast;
use app\models\Nedvigcategory;
use app\models\NedvigGaragi;
use yii\data\Pagination;
use Yii;
use GeoIp2\Database\Reader;

class NedviggaragiController extends AppController {
    
    public function actionView ($id) {
	$this->layout = '@app/views/layouts/nedvigview.php';
        $id = Yii::$app ->request ->get('id');
        $nedviggaragi = nedviggaragi::findOne($id);
        if (empty($nedviggaragi)){
           throw new \yii\web\HttpException( 404, 'Такого товара нет или он еще не размещен.' ); 
        }
		
         $this ->setMeta('Гараж '.  $nedviggaragi->plochad . ' кв.м.'.', id'. $nedviggaragi->id );
        return $this ->render('view', compact ('nedviggaragi'));   
    }   



  public function getImage()
    {
        if ($this->getModule()->className === null) {
            $imageQuery = Image::find();
        } else {
            $class = $this->getModule()->className;
            $imageQuery = $class::find();
        }
        $finder = $this->getImagesFinder(['isMain' => 1]);
        $imageQuery->where($finder);
        $imageQuery->orderBy(['isMain' => SORT_DESC, 'id' => SORT_ASC]);

        $img = $imageQuery->one();
        if(!$img){
            return $this->getModule()->getPlaceHolder();
        }

        return $img;
    }
	
	public function actionSearchprof(){
		 $this->layout = '@app/views/layouts/mainned/index.php';
		  $tel = trim(Yii::$app->request->get('tel'));
		  $username = trim(Yii::$app->request->get('username'));
		 
		  $query = Nedviggaragi::find()->where(['like', 'username', $username])->andWhere(['telephone' => $tel])->orderBy(['id' => SORT_DESC]);
		   	$this ->setMeta('Объявления: все гаражи от '. $username);
		  $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 24, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
         $nedviggaragi= $query->offset($pages->offset)->limit($pages->limit)->all();
		 
        return $this -> render('searchprof', compact('nedviggaragi', 'pages', 'tel', 'username')); 
	 }
	
	public function actionSearch(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php'; 
        $reg = $_GET['Oblast']['oblast_region'];
        $gor = $_GET['Goroda']['name'];		
        $r = $_GET['Raion']['raion'];
        $mat = $_GET['Material']['id'];
		$oh = $_GET['Ochrana']['id'];
        $p1 = trim(Yii::$app->request->get('p1'));
        $p2 = trim(Yii::$app->request->get('p2'));
        if (!$p1&&!$p2&&!$r&&!$gor&&!$reg){
	    $query = nedviggaragi::find()->andWhere([ 'like', 'type_materiala', $mat])->andWhere(['like', 'ochrana', $oh])->orderBy(['data' => SORT_DESC]);
                }elseif(!$p1&&!$p2&&!$r&&!$gor){
	            $query = nedviggaragi::find()->where([ 'like', 'oblast', $reg])->andWhere([ 'like', 'type_materiala', $mat])->andWhere(['like', 'ochrana', $oh])->orderBy(['data' => SORT_DESC]);
				}elseif(!$p1&&!$p2&&!$r){
                $query = nedviggaragi::find()->where(['gorod' => $gor])->andWhere([ 'like', 'oblast', $reg])->andWhere(['like', 'type_materiala', $mat])->andWhere(['like', 'ochrana', $oh])->andWhere(['>=','plochad',$p1])->orderBy(['data' => SORT_DESC]);
		        }elseif (!$p1){
			   $query = nedviggaragi::find()->andWhere(['raion' => $r])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'oblast', $reg])->andWhere(['like', 'type_materiala', $mat])->andWhere(['like', 'ochrana', $oh])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);
                }elseif (!$p1&&!p2){
			   $query = nedviggaragi::find()->andWhere(['raion' => $r])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'oblast', $reg])->andWhere(['like', 'type_materiala', $mat])->andWhere(['like', 'ochrana', $oh])->orderBy(['data' => SORT_DESC]);
                }elseif (!$p2){
			   $query = nedviggaragi::find()->andWhere(['raion' => $r])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'oblast', $reg])->andWhere(['like', 'type_materiala', $mat])->andWhere(['like', 'ochrana', $oh])->andWhere(['>=','plochad',$p1])->orderBy(['data' => SORT_DESC]);
                }
				else { $query = nedviggaragi::find()->andWhere(['raion' => $r])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'oblast', $reg])->andWhere(['like', 'type_materiala', $mat])->andWhere(['like', 'ochrana', $oh])->andWhere(['>=','plochad',$p1])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
                }  

                if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		    $reg = $item;} } 
				
        $this ->setMeta('Поиск гаража '. $reg);
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $nedviggaragi = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('nedviggaragi', 'pages', 'mat', 'r', 'oh', 'p1', 'gor', 'reg', 'p2')); 
        
    }
	
    }








