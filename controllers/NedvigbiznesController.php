<?php

namespace app\controllers;
use app\modules\admin\models\Oblast;
use app\models\Nedvigcategory;
use app\models\NedvigBiznes;
use yii\data\Pagination;
use Yii;
use GeoIp2\Database\Reader;

class NedvigbiznesController extends AppController {
    
    public function actionView ($id) {
		$this->layout = '@app/views/layouts/nedvigview.php';
        $id = Yii::$app ->request ->get('id');
        $Nedvigbiznes = Nedvigbiznes::findOne($id);
        if (empty($Nedvigbiznes)){
           throw new \yii\web\HttpException( 404, 'Такого товара нет или он еще не размещен.' ); 
        }
		
         $this ->setMeta( $Nedvigbiznes->operaciya.' , '.$Nedvigbiznes->type );
        return $this ->render('view', compact ('Nedvigbiznes'));   
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
		 
		  $query = Nedvigbiznes::find()->where(['like', 'username', $username])->andWhere(['telephone' => $tel])->orderBy(['id' => SORT_DESC]);
		   	$this ->setMeta('Объявления: весь бизнес от '. $username);
		  $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 24, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
       $Nedvigbiznes = $query->offset($pages->offset)->limit($pages->limit)->all();
		 
        return $this -> render('searchprof', compact('Nedvigbiznes', 'pages', 'tel', 'username')); 
	 }
	
	 public function actionSearch(){
                                                        
        $this->layout = '@app/views/layouts/mainned/index.php';                                               
        $op = $_GET['Operaciya']['id'];
		$reg = $_GET['Oblast']['oblast_region'];
		$gor = $_GET['Goroda']['name'];
        $r = $_GET['Raion']['raion'];
        $type = $_GET['Typebiznes']['id'];
        $p1 = trim(Yii::$app->request->get('p1'));
        $p2 = trim(Yii::$app->request->get('p2'));
        if (!$p1&&!$p2&&!$r&&!$gor&&!$reg){
	            $query = Nedvigbiznes::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'type', $type])->orderBy(['data' => SORT_DESC]);
                }elseif(!$p1&&!$p2&&!$r&&!$gor){
	            $query = Nedvigbiznes::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'type', $type])->andWhere([ 'like', 'oblast', $reg])->orderBy(['data' => SORT_DESC]);
				}elseif(!$p1&&!$p2&&!$r){
	            $query = Nedvigbiznes::find()->where(['like', 'Operaciya', $op])->andWhere([ 'like', 'type', $type])->andWhere(['gorod' => $gor])->andWhere([ 'like', 'oblast', $reg])->orderBy(['data' => SORT_DESC]);
				}elseif(!p1&&!$p2){
                $query = Nedvigbiznes::find()->where(['like', 'Operaciya', $op])->andWhere(['gorod' => $gor])->andWhere(['raion' => $r])->andWhere([ 'like', 'oblast', $reg])->orderBy(['data' => SORT_DESC]);
		        }elseif(!$p2){
                $query = Nedvigbiznes::find()->where(['like', 'Operaciya', $op])->andWhere(['gorod' => $gor])->andWhere(['raion' => $r])->andWhere(['>=','plochad_obchy',$p1])->orderBy(['data' => SORT_DESC]);
		        }elseif (!$p1){
			   $query = Nedvigbiznes::find()->where(['like', 'Operaciya', $op])->andWhere(['gorod' => $gor])->andWhere(['raion' => $r])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);
                } else { $query = Nedvigbiznes::find()->where(['like', 'Operaciya', $op])->andWhere(['gorod' => $gor])->andWhere(['raion' => $r])->andWhere([ 'like', 'oblast', $reg])
				->andWhere(['>=','plochad_obchy',$p1])->andWhere([ '<=','price',$p2])->orderBy(['data' => SORT_DESC]);  
                } 

           if($reg){
		    $oblast1 = Oblast::find()->select('oblast_region')
						->where(['id' => $reg])
						->one();
            foreach($oblast1 as $item) {
		    $reg = $item;} } 
				
        $this ->setMeta('Поиск бизнеса, '. $type. '. '. $reg);
        $pages = new Pagination (['totalCount'=> $query->count(), 'pageSize' => 40, 'forcePageParam'=> false, 'pageSizeParam'=> false ]);
        $Nedvigbiznes = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this -> render('search', compact('Nedvigbiznes', 'pages', 'r', 'p1', 'p2', 'type', 'reg', 'op', 'gor')); 
        
    }
	
    }