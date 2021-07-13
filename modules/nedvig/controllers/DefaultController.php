<?php

namespace app\modules\nedvig\controllers;

use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends AppNedvigController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
