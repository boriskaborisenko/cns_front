<?php

namespace frontend\controllers;

use Yii;
use yii\web\HttpException;
use common\models\PovagaCard;

class PovagaController extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        
        if (in_array($action->id, ['liqpay-server','liqpay-result'])) {
            $this->enableCsrfValidation = false; // because POST request from Liqpay server have not _csrf token
        }

        return parent::beforeAction($action);
    }
    
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionCreateCard()
    {
        $res = PovagaCard::createNewCard();
        if (!$res['error']) {
            return $this->render('buy',[
                'order' => $res['detail']
            ]);
        } else {
            return $this->render('error');
        }
        
    }
    
    public function actionLiqpayResult()
    {
        $id = Yii::$app->liqpay->getIdFromData(Yii::$app->request->post('data'));
        $order = PovagaCard::find()->byId($id)->one();
        if ($order){
            $order->checkStatus();
            if ($order->paid == '1') {
                return $this->render('success',[
                    'order' => $order
                ]);
            }
        }
        return $this->render('error');
    }

    public function actionLiqpayServer()
    {
        if (PovagaCard::updateLiqpayStatus()) {
            echo 'Success';
        } else {
            echo 'Failed';
        }
    }
}
