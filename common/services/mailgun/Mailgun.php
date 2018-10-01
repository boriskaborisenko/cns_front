<?php

namespace common\services\mailgun;


use yii\base\Component;


/**
 * Description of Mailgun
 *
 * @author Pavlo Novikov
 */

class Mailgun extends Component 
{    
    private $client;
    private $mailgun;
    private $domain;
    
    public function mailgunInit()
    {
        $client = new \GuzzleHttp\Client([
            'verify' => false,
        ]);
        $this->client = new \Http\Adapter\Guzzle6\Client($client);
        $this->mailgun = new \Mailgun\Mailgun('key-b40974765a2b05372de27efcb943889f', $this->client);
        $this->domain = "notifications.narodna.com.ua";
        
        return $this->mailgun;
    }

    public function getMailgun()
    {
        if (empty($this->mailgun)) {
            return $this->mailgunInit();
        }
        
        return $this->mailgun;
    }


    public function sendOrder($to,$subject,$data = null) 
    {
        $text = '';
        if ($data) {
            $orderDateTime = date('d.m.Y H:i',($data->creation_date));
            $orderDetails = json_decode(stripslashes($data->params));
            if (isset($orderDetails->company_bonuses)) {
                unset($orderDetails->company_bonuses);
            }
            $orderDetails = print_r($orderDetails,true);
            $text = <<<EOT
            <p>Имя: $data->name </p>
            <p>Фамилия: $data->surname </p>
            <p>E-mail: $data->email </p>    
            <p>Телефон: $data->tel </p>
            <p>Дата заказа: $orderDateTime </p>        
            <p>Детали заказа:</p>
            <pre>
            $orderDetails 
            </pre>        
EOT;
        }
        
        $result = $this->getMailgun()->sendMessage($this->domain, array('from'    => 'site@strahovoi.com', 
                                'to'      => $to, 
                                'subject' => $subject, 
                                'html'    => $text));
        
        return $result;
    }
    
    public function sendFeedback($to,$subject,$data = null) 
    {
        $text = '';
        $page_url = \yii\helpers\Url::to($data->page_name,true);
        if ($data) {
            $callbackDateTime = date('d.m.Y H:i',($data->creation_date));
            $text = <<<EOT
            <h1>Контакт: $data->tel</h1>
            <p>Связаться: $data->when</p>
            <p>Дата: $callbackDateTime</p>
            <p>Дополнительная информация: $data->comment</p>
            <p>Отправлено со страницы: <a href="$page_url">$page_url</a></p>        
            <br/>
            <p>Это письмо сгенеровано автоматически сайтом.</p>     
EOT;
        }
        
        $result = $this->getMailgun()->sendMessage($this->domain, array('from'    => 'site@strahovoi.com', 
                                'to'      => $to, 
                                'subject' => $subject, 
                                'html'    => $text));
        
        return $result;
    }
    public function sendPovagaCard($to,$subject,$data = null) 
    {
        $text = '';
        if ($data) {
            $cardDateTime = date('d.m.Y H:i',($data->creation_date));
            
            $text = <<<EOT
            <h1>Контакт: $data->tel</h1>
            <p>Адрес: $data->address</p>
            <p>Имя: $data->name</p>
            <p>Email: $data->email</p>
            <p>Нужен ли полис ОСАГО: $data->osago_want</p>
            <p>Дата окончания ОСАГО: $data->osago_expires</p>
            <p>Сумма (грн): $data->price</p>
            <p>Оплачен: $data->paid</p>
            <p>Дата создания: $cardDateTime</p>
            <br/>
            <p>Это письмо сгенеровано автоматически сайтом.</p>     
EOT;
        }
        
        $result = $this->getMailgun()->sendMessage($this->domain, array('from'    => 'site@strahovoi.com', 
                                'to'      => $to, 
                                'subject' => $subject, 
                                'html'    => $text));
        
        return $result;
    }
}
