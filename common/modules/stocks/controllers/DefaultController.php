<?php

namespace common\modules\stocks\controllers;

use common\modules\stocks\models\Stocks;
use yii\web\Controller;

/**
 * Default controller for the `stocks` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', ['stocks' => Stocks::find()->where(['hide' => 0])->orderBy('sort DESC')->with('stocksInfos')->all()]);
    }

    public function actionGetStocksMain()
    {
        return Stocks::find()->where(['hide' => 0])->with('stocksInfos')->orderBy('sort DESC')->limit(4)->all();
    }

    public function actionView($alias)
    {
        return $this->render('view', [
            'stock' => Stocks::find()->joinWith('company')->where(['stocks.alias' => $alias])->one(),
        ]);
    }
}
