<?php

namespace common\modules\search\controllers;

use yii\web\Controller;
use common\modules\search\models\Search;

/**
 * Default controller for the `search` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $rows = Search::findRecords();
        return $this->render('index',[
            'rows' => $rows
        ]);
    }
}
