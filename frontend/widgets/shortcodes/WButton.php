<?php

/**
 * Description of WButton
 *
 * @author kossworth
 */

namespace frontend\widgets\shortcodes;

use Yii;
use yii\bootstrap\Widget;

class WButton extends Widget{
        
    public $testvar = 'test_test';
    
    public function getViewPath()
    {
        return Yii::getAlias('@frontend/widgets/shortcodes/views/shortcodes');
    }
    
    public function init(){
        
    }

    public function run(){
        return $this->render('button', ['data' => $this->testvar]);
    }
}
