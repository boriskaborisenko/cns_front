<?php

/**
 * AjaxVerbFilter extends \yii\filters\VerbFilter by adding handling ajaxRequests.
 * If _csrf value do not set for some action, the csrf validation will be by default.
 * Example:
 * 
 *  public function behaviors()
 *  {
 *      return [
 *          'ajaxVerbs' => [
 *              'class' => \common\components\behaviors\AjaxVerbFilter::className(),
 *              'actions' => [
 *                  'action-name-one' => ['post'],
 *                  'action-name-two' => ['get','post'],
 *                  '*' => ['delete'],
 *              ],
 *              '_csrf' => [
 *                  'delete-recent-view' => false,
 *                  'action-name-two' => true
 *              ]
 *          ],
 *      ];
 *  }
 */

namespace common\components\behaviors;

use Yii;
use yii\web\HttpException;
/**
 * Description of OrderFormAccess
 *
 * @author Pavlo
 */
class AjaxVerbFilter extends \yii\filters\VerbFilter 
{
    public $_csrf = [];
    
    public function events()
    {
        return [\yii\web\Controller::EVENT_BEFORE_ACTION => 'beforeAction'];
    }

    public function beforeAction($event)
    {
        if (!parent::beforeAction($event)) {
            return false;
        }
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            
            $action = $event->action->id;
            if (isset($this->_csrf[$action])) {
                $csrfValidation = $this->_csrf[$action];
            } elseif (isset($this->_csrf['*'])) {
                $csrfValidation = $this->_csrf['*'];
            } else {
                return $event->isValid;
            }
            
            $event->action->controller->enableCsrfValidation = $csrfValidation;
           
            return true;
        } else {
            throw new HttpException(404);
        }
    }    
}