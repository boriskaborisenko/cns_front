<?php

namespace common\modules\cookie\controllers;

use yii\web\Controller;
use Yii;
/**
 * Default controller for the `cookie` module
 */
class PostController extends Controller
{
    public function behaviors()
    {
        return [
            'ajaxVerbs' => [
                'class' => \common\components\behaviors\AjaxVerbFilter::className(),
                'actions' => [
                    '*' => ['delete','post'],
                ],
                '_csrf' => [
                    'set-viewed-post' => false
                ]
            ],
        ];
    }
    
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionSetViewedPost()
    {
        $cookies = Yii::$app->request->cookies;
        if (($cookie = $cookies->get('fb_liked_posts')) !== null) {
            $data = explode(',',$cookie->value);
            if (!in_array(Yii::$app->request->post('id'), $data)) {
                $data[] = Yii::$app->request->post('id');
            }
            $data = implode(',', $data);
        } else {
            $data = Yii::$app->request->post('id');
        } 
        Yii::$app->response->cookies->add(new \yii\web\Cookie([
            'name' => 'fb_liked_posts',
            'value' => $data,
            'expire' => time()+365*3600*24
        ]));
        return [
            'answer' => true,
            'data' => $data
        ];
    }
}
