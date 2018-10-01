<?php

namespace common\modules\cookie\controllers;

use yii\web\Controller;
use Yii;
/**
 * Default controller for the `cookie` module
 */
class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
            'ajaxVerbs' => [
                'class' => \common\components\behaviors\AjaxVerbFilter::className(),
                'actions' => [
                    '*' => ['delete'],
                ],
                '_csrf' => [
                    'delete-recent-view' => false
                ]
            ],
        ];
    }
    
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionDeleteRecentView()
    {
        $cookies = \Yii::$app->request->cookies;
        if (($cookie = $cookies->get('recent_view')) !== null) {
            $data = unserialize($cookie->value);
            if (count($data) < 2) {
                $cookies = \Yii::$app->response->cookies;
                $cookies->remove('recent_view');
                return [
                    'answer' => true,
                ];
            } else {
                unset($data[\Yii::$app->request->get('lid_id')]);
            }
        } else {
            $data=[];
        } 
        \Yii::$app->response->cookies->add(new \yii\web\Cookie([
            'name' => 'recent_view',
            'value' => serialize($data),
            'expire' => time()+365*3600*24
        ]));
        return [
            'answer' => true,
        ];
    }
}
