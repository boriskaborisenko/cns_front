<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property string $fathername
 * @property string $indef_code
 * @property string $date_birth
 * @property string $email
 * @property string $tel
 * @property string $delivery_type
 * @property string $delivery_address
 * @property integer $base_product_id
 * @property integer $status
 * @property string $params
 * @property string $creation_date
 */
class Orders extends \common\components\BaseActiveRecordModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'name',
                    'surname',
                    'indef_code',
                    'date_birth',
                    'email',
                    'tel',
                    'delivery_type',
                    'delivery_address',
                    'base_product_id',
                    'status',
                    'user_ip',
                    'params',
                    'creation_date',
                ],
                'required',
            ],
            [['date_birth'], 'safe'],
            [['base_product_id', 'status', 'creation_date'], 'integer'],
            [['params'], 'string'],
            [
                [
                    'name',
                    'surname',
                    'fathername',
                    'indef_code',
                    'email',
                    'user_ip',
                    'tel',
                    'delivery_type',
                    'delivery_address',
                ],
                'string',
                'max' => 250,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Имя'),
            'surname' => Yii::t('app', 'Фамилия'),
            'fathername' => Yii::t('app', 'Отчество'),
            'indef_code' => Yii::t('app', 'ИИН'),
            'date_birth' => Yii::t('app', 'Дата рождения'),
            'email' => Yii::t('app', 'E-mail'),
            'tel' => Yii::t('app', 'Телефон'),
            'user_ip' => Yii::t('app', 'IP'),
            'delivery_type' => Yii::t('app', 'Доставка'),
            'delivery_address' => Yii::t('app', 'Адрес доставки'),
            'base_product_id' => Yii::t('app', 'Базовый продукт'),
            'status' => Yii::t('app', 'Статус'),
            'paid' => Yii::t('app', 'Оплачен'),
            'params' => Yii::t('app', 'Параметры заказа'),
            'creation_date' => Yii::t('app', 'Date of creation'),
        ];
    }

    
    public function getBaseProduct()
    {
        return $this->hasOne(
                Products::className(), 
                ['id' => 'base_product_id']
        );
    } 
    
    /**
     * @inheritdoc
     * @return \common\models\queries\OrdersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\OrdersQuery(get_called_class());
    }

    public function saveLidOrder($data)
    {
        $values = [
            'name' => '-',
            'surname' => '-',
            'fathername' => '-',
            'indef_code' => '-',
            'date_birth' => '1980-01-01',
            'email' => '-',
            'tel' => '-',
            'delivery_type' => '-',
            'delivery_address' => '-',
            'base_product_id' => 2,
            'status' => 1,
            'params' => json_encode(['offer_info' => $data]),
            'creation_date' => time(),
        ];

        $this->attributes = $values;
        if ($this->save(false)) {
            return true;
        } else {
            return false;
        }
    }

    public function saveOrder($data)
    {
        $this->params = addslashes(json_encode($data));
        $this->name = $data['name'];
        $this->surname = $data['surname'];
        $this->fathername = $data['father_name'];
        $this->indef_code = (isset($data['inn'])) ? $data['inn'] : 'None';
        $this->date_birth = sprintf(
            "%s-%s-%s",
            (isset($data['birth_year'])) ? $data['birth_year'] : '1971',
            (isset($data['birth_month'])) ? $data['birth_month'] : '01',
            (isset($data['birth_day'])) ? $data['birth_day'] : '01'
        );
        $this->email = $data['email'];
        $this->tel = $data['phone'];
        $this->user_ip = Yii::$app->request->userIP;
        $this->delivery_type = $data['delivery_type'];
        $this->delivery_address = sprintf(
            "%s, %s, д. %s, кв. %s",
            (isset($data['delivery_city'])) ? $data['delivery_city'] : 'Киев',
            $data['delivery_street'],
            $data['delivery_house'],
            $data['delivery_apartments']
        );
        $this->base_product_id = $data['product_id'];
        $this->status = 1;
        $this->company_id=$data['company_id'];
        $this->creation_date = (string)time();
        if ($this->save()) {
            if (isset($data['promocode'])) {
                Promocode::deacivatePromocode($data['promocode'], $this->id);
            }
            $email = UserSettings::find()
                    ->where(['alias' => 'sales_email'])
                    ->active()
                    ->one();
            if ($email && $this->tel != '+38 (011) 111-11-11') {
                Yii::$app->mailgun->sendOrder($email->value,
                    'Заказ '.$data['product_name'],
                    $this);
            }
            return true;
        } else {
            return false;
        }
    }
    
    public function saveOrderOnClick($data)
    {
        $this->params = addslashes(json_encode($data));
        $this->name = 'Заказ в один клик';
        $this->surname = 'None';
        $this->fathername = 'None';
        $this->indef_code = 'None';
        $this->date_birth = "1971-01-01";
        $this->email = 'None';
        $this->tel = $data['phone'];
        $this->user_ip = Yii::$app->request->userIP;
        $this->delivery_type = 'None';
        $this->delivery_address = 'None';
        $this->base_product_id = $data['product_id'];
        $this->status = 1;
        $this->company_id=$data['company_id'];
        $this->creation_date = (string)time();
        if ($this->save()) {
            $email = UserSettings::find()
                    ->where(['alias' => 'sales_email'])
                    ->active()
                    ->one();
            if ($email && $this->tel != '+38 (011) 111-11-11') {
                Yii::$app->mailgun->sendOrder($email->value,
                    'Заказ '.$data['product_name'],
                    $this);
            }
            return true;
        } else {
            return false;
        }
    }

    public function saveTestOrder($array)
    {
        $this->params = json_encode($array);
        $this->name = '-';
        $this->surname = '-';
        $this->fathername = '-';
        $this->indef_code = '-';
        $this->date_birth = "1992-12-01";
        $this->email = '-';
        $this->tel = '-';
        $this->delivery_type = 1;
        $this->delivery_address = "-";
        $this->base_product_id = 2;
        $this->status = 1;
        $this->user_ip = Yii::$app->request->userIP;
        $this->creation_date = (string)time();
        $this->save(false);
    }

    public function liqpayStatusUpdated($array)
    {
        $data = json_decode(base64_decode($array['data']));
        $params = json_decode(stripslashes($this->params));
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
}
