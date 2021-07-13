<?php

namespace app\controllers;

use app\models\Message;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;
use yii\webController;

class ChatController extends AppController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
            ]
        ];
    }

    public function actionIndex()
    {   
	    $username = Yii::$app->user->identity['username'];
        $currentUserId = Yii::$app->user->identity['username'];;
        $messagesQuery = Message::findMessages($currentUserId, $id);
        $message = new Message([
            'from' => $currentUserId,
            'to' => $id,
        ]);
        if ($message->load(Yii::$app->request->post()) && $message->validate()) {
            $message->save();
            $message = new Message([
                'from' => $currentUserId
            ]);
            if (Yii::$app->request->isPjax) {
                return $this->renderAjax('_chat', compact('messagesQuery', 'message'));
            }
        }
        if (Yii::$app->request->isPjax) {
            return $this->renderAjax('_list', compact('messagesQuery', 'message'));
        }

        return $this->render('chat', compact('messagesQuery', 'message'));
    }
}
?>