<?php

namespace app\modules\nedvig\controllers;

class NedvigController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
