<?php

namespace frontend\controllers;

use Yii;
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
    
    public function actionPolitika()
    {
        return $this->render('politika');
    }

    public function actionFeedback()
    {
        $text = \Yii::$app->request->post('text');
        if ($text) {
            Yii::$app->mailer->compose()
                ->setFrom('aduard24@bk.ru')
                ->setTo('dima.withsmile@gmail.com')
                ->setSubject('Сообщение с сайта feromon-menu')
                ->setTextBody($text)
                ->send();
        }
        return $this->redirect(\Yii::$app->request->referrer);
    }

}
