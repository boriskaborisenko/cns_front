<?php

namespace frontend\modules\callback\models;

use Yii;

/**
 * This is the model class for table "callbacks".
 *
 * @property integer $id
 * @property string $tel
 * @property string $when
 * @property string $comment
 * @property integer $done
 * @property string $creation_date
 */
class Callbacks extends \common\components\BaseActiveRecordModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'callbacks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tel', 'when', 'done', 'creation_date'], 'required'],
            [['done'], 'integer'],
            [['tel', 'when', 'user_ip', 'page_name','creation_date'], 'string', 'max' => 250],
            [['comment'], 'string', 'max' => 1023],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tel' => Yii::t('app', 'Телефон'),
            'when' => Yii::t('app', 'Когда связаться'),
            'comment' => Yii::t('app', 'Comment'),
            'user_ip' => Yii::t('app', 'IP'),
            'page_name' => Yii::t('app', 'Request URI'),
            'done' => Yii::t('app', 'Обработан'),
            'creation_date' => Yii::t('app', 'Date of creation'),
        ];
    }

    /**
     * @inheritdoc
     * @return \common\modules\callback\models\queries\CallbacksQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\modules\callback\models\queries\CallbacksQuery(get_called_class());
    }
    
    public static function getInstance() 
    {
        return new self;
    }
    
    public static function createNewCallback() 
    {
        $callback = self::getInstance();
        $post = Yii::$app->request->post();
        if (empty($post['tel'])) {
            return [
                'error' => true,
                'detail' => 'empty tel'
            ];
        }
        $callback->tel = $post['tel'];
        if (isset($post['when'])) {
            $callback->when = $post['when'];
        } else {
            $callback->when = (isset($post['check_box_agree'])) ? $post['check_box_agree'] : 'very_fast';
        } 
        
//        if (!empty($post['page_name'])){
//            $callback->comment = "Сообщение отправлено со страницы: ".$post['page_name'];
//        } else {
//            $callback->comment = '';
//        }
        
        $callback->page_name = $post['page_name'];
        
        $callback->user_ip = Yii::$app->request->userIP;
        $callback->done = 0;
        $callback->creation_date = (string)date('U');
        if ($callback->save()) {
            if ($callback->tel != '+38 (011) 111-11-11') {
                Yii::$app->mailgun->sendFeedback('zakaz@strahovoi.com',
                    'Обратный звонок strahovoi.com',
                    $callback);
            }
            return [
                'error' => false,
                'detail' => 'success',
                'callback_when' => $callback->when
            ];
        } else {
            return [
                'error' => true,
                'detail' => 'db insert error'
            ];
        } 
    }

    public static function createNewCallbackByFeedback() 
    {
        $callback = self::getInstance();
        $post = Yii::$app->request->post();
        if (empty($post['msg']) || empty($post['email_or_phone'] || empty($post['person_name']))) {
            return [
                'error' => true,
                'detail' => 'empty some field'
            ];
        }
        if (!empty($post['page_name'])){
            $page = "</br>Сообщение отправлено со страницы: ".$post['page_name'];
        } else {
            $page = '';
        }
        $callback->tel = $post['email_or_phone'];
        $callback->when = 'Как можно быстрее';
        $callback->done = 0;
        $callback->user_ip = Yii::$app->request->userIP;
        $callback->page_name = $post['page_name'];
        $callback->comment = "Форма обратной связи.<br/>Имя: {$post['person_name']}. Контакт: {$post['email_or_phone']} . Сообщение: {$post['msg']}".$page;
        $callback->creation_date = (string)date('U');
        if ($callback->save()) {
            if ($callback->tel != '+38 (011) 111-11-11') {
                Yii::$app->mailgun->sendFeedback('zakaz@strahovoi.com',
                    'Обратный звонок strahovoi.com',
                    $callback);
            }
            return [
                'error' => false,
                'detail' => 'success'
            ];
        } else {
            return [
                'error' => true,
                'detail' => 'db insert error'
            ];
        } 
    }        
}
