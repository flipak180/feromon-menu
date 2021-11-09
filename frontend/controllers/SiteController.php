<?php

namespace frontend\controllers;

use yii\web\Controller;

class SiteController extends Controller
{

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex($spot)
    {
        return $this->render('index', ['spot' => $spot]);
    }

}
