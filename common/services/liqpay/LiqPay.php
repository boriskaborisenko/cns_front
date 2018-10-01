<?php
namespace common\services\liqpay;

use yii\base\Component;

class LiqPay extends Component
{
    private $api;

    public function __construct()
    {
        $this->api = new LiqPayApi(\Yii::$app->params['liqpay.public_key'], \Yii::$app->params['liqpay.private_key']);
    }

    public function getForm($amount, $description, $order_id)
    {
        $order = \common\models\Orders::find()
                ->joinWith('baseProduct')
                ->where(['orders.id' => $order_id])
                ->one();
        if ($order) {
            return $this->api->cnbForm([
                'action' => 'pay',
                'amount' => (string)$amount,
                'currency' => 'UAH',
                'description' => $description,
                'order_id' => 'cni_site_' . $order_id,
                'version' => '3',
                'result_url' => \Yii::$app->params["liqpay.{$order->baseProduct->alias}.result_url"],
                'server_url' => \Yii::$app->params["liqpay.{$order->baseProduct->alias}.server_url"],
                //'sandbox' => '1',
            ]);
        }
        return false;
    }
    
    public function getPovagaCardForm($amount, $description, $order_id)
    {
        $order = \common\models\PovagaCard::find()
                ->where(['id' => $order_id])
                ->one();
        if ($order) {
            return $this->api->cnbForm([
                'action' => 'pay',
                'amount' => (string)$amount,
                'currency' => 'UAH',
                'description' => $description,
                'order_id' => 'cns_povaga_card_' . $order_id,
                'version' => '3',
                'result_url' => \Yii::$app->params["liqpay.povaga.result_url"],
                'server_url' => \Yii::$app->params["liqpay.povaga.server_url"],
                //'sandbox' => '1',
            ]);
        }
        return false;
    }
    
    public function getOrderStatus($orderId){
        return $this->api->api("request", array(
            'action'        => 'status',
            'version'       => '3',
            'order_id'      => $orderId
        ));
    }
    
    public function getPovagaOrderStatus($orderId){
        return $this->api->api("request", array(
            'action'        => 'status',
            'version'       => '3',
            'order_id'      => 'cns_povaga_card_' . $orderId
        ));
    }
    
    public function getIdFromData($data){
        $obj = json_decode(base64_decode($data));
        if (!empty($obj->order_id)) {
            $match_array = [];
            preg_match("/.*_(\d+)$/", $obj->order_id, $match_array);
            $id = $match_array[1];
            return $id;
        } else {
            return false;
        }
    }
}
