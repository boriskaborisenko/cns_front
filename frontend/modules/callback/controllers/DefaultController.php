<?php

namespace frontend\modules\callback\controllers;

use yii\web\Controller;
use frontend\modules\callback\models\Callbacks;

/**
 * Default controller for the `callback` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $res = Callbacks::createNewCallback();
        if (!$res['error']) {
            return $this->render('success', ['callback_when' => $res['callback_when']]);
        } else {
            return $this->render('error');
        }
        
    }
    
    public function actionFeedback()
    {
        $res = Callbacks::createNewCallbackByFeedback();
        if (!$res['error']) {
            return $this->render('success');
        } else {
            return $this->render('error');
        }
        
    }    
}
