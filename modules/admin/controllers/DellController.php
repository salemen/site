<?
namespace app\controllers;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;
use app\models\Message;

class DellController extends AppController {

 public function actionDelItemmessage (){
        $id = Yii::$app->request->get('id');
		$post = Message::findOne($id);
		$post->delete();
        $this ->layout=false;
       return $this->redirect(Yii::$app->request->referrer);
        
    }
}