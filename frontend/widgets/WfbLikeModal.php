<?php
namespace frontend\widgets;
use yii\bootstrap\Widget;
use Yii;

class WfbLikeModal extends Widget
{	
    public $postId;
    
    public function init(){
        parent::init();
    }

    public function run() {
        if ($this->postId === NULL) {
            return NULL;
        }
        $cookies = Yii::$app->request->cookies;
        if (($cookie = $cookies->get('fb_liked_posts')) !== null) {
            $data = explode(',',$cookie->value);
            if (!in_array($this->postId, $data)) {
                return $this->render('fb-like-modal/view',[
                    'postId' => $this->postId
                ]);
            } else {
                return NULL;
            }
        }
        return $this->render('fb-like-modal/view',[
            'postId' => $this->postId
        ]);
    }
}