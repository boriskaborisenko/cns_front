<?php

namespace frontend\controllers;

use frontend\components\BaseController;
use Yii;
use yii\web\HttpException;
use yii\helpers\Url;
use common\models\Orders;
use frontend\models\FactorsModel;
use common\models\Products;
use common\models\Cities;

class OsagoController extends BaseController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access_form' => [
                'class' => \frontend\components\OrderFormAccess::className(),
                'actions' => [
                    'form' => [
                        'session_keys' => [
                            'offer_info',
                        ],
                        'redirect' => 'osago/calculator',
                    ],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        
        if (in_array($action->id, ['liqpay-server','liqpay-result'])) {
            $this->enableCsrfValidation = false; // because POST request from Liqpay server have not _csrf token
        }

        return parent::beforeAction($action);
    }

    public function actionCalculator()
    {
        return $this->render('osago-calculator');
    }
    
    public function actionCalculatorCity($cityAlias)
    {
        $city = Yii::$app->cities->findCityByAlias($cityAlias);
        if ($city) {
            Yii::$app->cities->isCityCalculator = true;
            return $this->render('osago-calculator');
        }
        throw new HttpException(404);
    }

    public function actionForm()
    {
        $translations = FactorsModel::getOsagoFactors();
        $offer_info = Yii::$app->session->get('offer_info');
        $product = Products::find()->byAlias('osago')->joinWith('info')->one();
        unset($offer_info['_csrf']);
        
        
        $income = $offer_info['init_price']*$offer_info['kv']/100 - ($offer_info['init_price'] - $offer_info['init_price']*$offer_info['ks']);
        return $this->render('osago-form', [
            'offer_info' => $offer_info,
            'translations' => $translations,
            'product' => $product,
            'income' => $income,
            'income_ras' => $income*0.8
        ]);
    }

    public function actionBuy()
    {
        $post = Yii::$app->request->post();
        unset($post['_csrf']);
        $order = new Orders();
        if ($order->saveOrder($post)) {
            Yii::$app->session->set('order', $post);
            switch ($post['payment_type']) {
                case 'cache':
                    return $this->redirect("/osago/done/{$order->id}", 302);
                case 'card':
                    return $this->redirect("/osago/online-pay/{$order->id}", 302);
                default:
                    throw new HttpException(404);
            }
        } else {
            throw new HttpException(400);
        }
    }
    
    public function actionBuyAfterCancelOnlinePay()
    {
        $data = Yii::$app->session->get('order');
        if (empty($data['order_id'])) {
            throw new HttpException(404);
        }
        $order = Orders::find()->byId($data['order_id'])->one();
        if ($order) {
            $params = json_decode(stripslashes($order->params));
            $params->payment_type = $data['payment_type'];
            $order->params = addslashes(json_encode($params));
            if ($order->save()) {
                return $this->redirect("/osago/done/{$order->id}", 302);
            }
            throw new HttpException(400);
        }
        throw new HttpException(400);
    }
    
    public function actionDone($id)
    {
        $data = Yii::$app->session->get('order');
        if ($data) {
            $data['order_id'] = $id;
            return $this->render('osago-done', [
                'order' => $data,
            ]);
        } else {
            throw new HttpException(404);
        }
    }    
    
    public function actionBuyOnClick()
    {
        $post = Yii::$app->request->post();
        unset($post['_csrf']);
        $order = new Orders();
        if ($order->saveOrderOnClick($post)) {
            Yii::$app->session->set('order', $post);
            return $this->redirect("/osago/on-click-done/{$order->id}", 302);
        } else {
            throw new HttpException(400);
        }

    }    

    public function actionOnClickDone($id)
    {
        $data = Yii::$app->session->get('order');
        if ($data) {
            $data['order_id'] = $id;
            return $this->render('osago-on-click-done', [
                'order' => $data,
            ]);
        } else {
            throw new HttpException(404);
        }
    }    

    public function actionCancel($id)
    {
        $data = Yii::$app->session->get('order');
        if (!$data) {
            throw new HttpException(404);
        }
        $data['order_id'] = $id;

        return $this->render('osago-cancel', [
            'order' => $data,
        ]);
    }

    public function actionOnlinePay($id)
    {
        $data = Yii::$app->session->get('order');
        $data['order_id'] = $id;
        Yii::$app->session->set('order', $data);
        if ($data['payment_type'] != 'card') {
            throw new HttpException(404);
        }

        return $this->render('osago-online-pay', [
            'order' => $data,
        ]);
    }

    public function actionLiqpayResult()
    {
        $data = Yii::$app->session->get('order');
        if (empty($data['order_id'])) {
            throw new HttpException(404);
        }
        $id = $data['order_id'];
        $order = Orders::find()->byId($id)->one();
        if ($order->paid == '1') {
            return $this->redirect("/osago/done/$id", 302);
        } else {
            return $this->redirect("/osago/cancel/$id", 302);
        }
    }

    public function actionLiqpayServer()
    {
        $data = json_decode(base64_decode(Yii::$app->request->post('data')));
        if (!empty($data->order_id)) {
            $match_array = [];
            preg_match("/.*_(\d+)$/", $data->order_id, $match_array);
            $id = $match_array[1];
            $order = Orders::find()->byId($id)->one();
            if ($order) {
                $result = $order->liqpayStatusUpdated([
                    'data' => Yii::$app->request->post('data'),
                    'signature' => Yii::$app->request->post('signature'),
                ]);
                if ($result) {
                    echo 'Success';
                } else {
                    echo 'Failed';
                }
            }
        }else {
            throw new HttpException(404);
        }
    }
}
