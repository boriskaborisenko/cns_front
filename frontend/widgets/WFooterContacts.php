<?php

namespace frontend\widgets;
use yii\bootstrap\Widget;
use Yii;


/**
 * Description of WFooterContacts
 *
 * @author Pavlo
 */
class WFooterContacts extends Widget {
    
    
    public function init(){
        parent::init();
    }
    
    public function run(){
        
        $footer_contacts = \common\models\UserSettings::find()
                ->where(['alias' => 'footer_contacts'])
                ->one();
        if ($footer_contacts) {
            return $footer_contacts->text;
        }
        return false;
    }
    
}
