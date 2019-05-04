<?php

namespace app\modules\diary\controllers;

use yii\web\Controller;

/**
 * Default controller for the `diary` module
 */
class DefaultController extends Controller
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
