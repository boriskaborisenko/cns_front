<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\components;

use Yii;
use yii\helpers\Url;

/**
 * Description of OrderFormAccess
 *
 * @author Pavlo
 */
class OrderFormAccess extends \yii\base\Behavior {

    public $actions = [];

    public function events()
    {
        return [\yii\web\Controller::EVENT_BEFORE_ACTION => 'beforeAction'];
    }

    /**
     * @param ActionEvent $event
     * @return boolean
     */
    public function beforeAction($event)
    {
        $action = $event->action->id;
        if (isset($this->actions[$action])) {
            foreach ($this->actions[$action]['session_keys'] as $key) {
                if (Yii::$app->request->isPost && !empty(Yii::$app->request->post())) {
                    Yii::$app->session->set($key, Yii::$app->request->post());
                    $event->isValid = true;
                } elseif (Yii::$app->session->has($key)) {
                    $event->isValid = true;
                } else {
                    $event->isValid = false;
                } 
            }
        } else {
            return $event->isValid;
        }

        if (!$event->isValid) {
            Yii::$app->getResponse()->redirect(Url::to(["/{$this->actions[$action]['redirect']}"]), 302);            
        }

        return $event->isValid;
    }    
}