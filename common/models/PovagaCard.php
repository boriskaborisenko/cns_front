<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "povaga_card".
 *
 * @property integer $id
 * @property string $tel
 * @property string $address
 * @property string $name
 * @property string $email
 * @property integer $osago_want
 * @property string $price
 * @property string $paid
 * @property integer $done
 * @property integer $params
 * @property string $creation_date
 */
class PovagaCard extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'povaga_card';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tel'], 'required'],
            [['osago_want', 'done'], 'integer'],
            [['tel', 'address', 'name', 'email', 'price', 'creation_date'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tel' => Yii::t('app', 'Tel'),
            'address' => Yii::t('app', 'Address'),
            'name' => Yii::t('app', 'Name'),
            'email' => Yii::t('app', 'Email'),
            'osago_want' => Yii::t('app', 'Osago Want'),
            'osago_expires' => Yii::t('app', 'Osago Expires'),
            'price' => Yii::t('app', 'Price'),
            'done' => Yii::t('app', 'Done'),
            'creation_date' => Yii::t('app', 'Creation Date'),
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\PovagaCardQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\PovagaCardQuery(get_called_class());
    }
    
    public static function getInstance() 
    {
        return new self;
    }
    
    public static function createNewCard() 
    {
        $card = self::getInstance();
        $post = Yii::$app->request->post();
        if (empty($post['tel'])) {
            return [
                'error' => true,
                'detail' => 'empty required fields'
            ];
        }
       
        $card->tel = $post['tel'];
        $card->address = $post['address'].', дом '.$post['house'].', кв. '.$post['flat'];
        $card->name = (isset($post['name'])) ? $post['name'] : NULL;
        $card->email = (isset($post['email'])) ? $post['email'] : NULL;
        $card->osago_want = (isset($post['osago_want'])) ? (int)$post['osago_want'] : 0;
        $card->osago_expires = (isset($post['osago_expires'])) ? $post['osago_expires'] : '';
        $card->price = $post['price'];
        $card->done = 0;
        $card->paid = 0;
        $card->params = addslashes(json_encode(['liqpay_answer' => '']));
        $card->creation_date = (string)date('U');
        
        if ($card->save()) {
            if ($card->tel != '+38 (011) 111-11-11') {
                Yii::$app->mailgun->sendPovagaCard('zakaz@strahovoi.com',
                    'Карточка (Лид) Культура паркования strahovoi.com',
                    $card);
            }
            return [
                'error' => false,
                'detail' => $card
            ];
        } else {
            return [
                'error' => true,
                'detail' => 'db insert error'
            ];
        } 
    }
    
    public static function updateLiqpayStatus()
    {
        $order_id = Yii::$app->liqpay->getIdFromData(Yii::$app->request->post('data'));
        $order = self::find()->byId($order_id)->one();
        if ($order){
            return $order->liqpayStatusUpdated([
                'data' => json_decode(base64_decode(Yii::$app->request->post('data'))),
                'signature' => Yii::$app->request->post('signature'),
            ]);
        } else {
            return false;
        }
    }

    public function liqpayStatusUpdated($array)
    {
        $data = $array['data'];
        $params = json_decode(stripslashes($this->params));
        if (empty($params)) {
            $params = new \stdClass();
        }
        $params->liqpay_answer = $data;
        $this->params = addslashes(json_encode($params));
        if ($data->status == 'success' || $data->status == 'wait_accept') {
            $this->paid = 1;
        }
        if ($this->save()) {
            return true;
        }

        return false;
    }
    
    public function checkStatus(){
        if (!$this->paid) {
            $data = Yii::$app->liqpay->getPovagaOrderStatus($this->id); // request to LiqPay about status
            $this->liqpayStatusUpdated(['data' => $data]);
        }
        if ($this->tel != '+38 (011) 111-11-11') {
            Yii::$app->mailgun->sendPovagaCard('zakaz@strahovoi.com',
                'Карточка Культура паркования strahovoi.com',
                $this);
        }
    } 
}
