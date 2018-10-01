<?php

namespace frontend\controllers;

use common\models\Seo;

class StaticController extends \yii\web\Controller
{
    /**
     * @param Seo $seo
     * @return string
     */
    public function actionIndex($seo)
    {
        $info = $seo->getSeoInfosByLang();
        return $this->render('index', ['info' => $info]);
    }
    
    public function actionDoc($info)
    {
        return $this->render('doc', ['info' => $info]);
    }
}
