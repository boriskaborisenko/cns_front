<?php

/**
 * Description of ShortcodeBehavior
 *
 * @author kossworth
 */

namespace common\components\behaviors;

use yii\base\Behavior;
use Yii;

class ShortcodeBehavior extends Behavior{
    
    public function getScText(){
        return Yii::$app->shortcodes->parse($this->owner->text); 
    }
    
    public function getScTextUnder(){
        if (isset($this->owner->text_under)) {
            return Yii::$app->shortcodes->parse($this->owner->text_under);
        }
        return null;
    }
    
    public function getScTextAbove(){
        if (isset($this->owner->text_above)) {
            return Yii::$app->shortcodes->parse($this->owner->text_above); 
        }
        return null;
    }
}
