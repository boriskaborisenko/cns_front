<?php

/**
 * Description of WCallback
 * shortcode for callback form
 * @author kossworth
 */
namespace frontend\widgets\shortcodes;

use Yii;
use yii\bootstrap\Widget;

class WCallback extends Widget {
       
    public $page = '';
    
    public function getViewPath()
    {
        return Yii::getAlias('@frontend/widgets/shortcodes/views/callback');
    }
    
    public function init(){
        
    }

    public function run(){
        return $this->render('view', ['page' => $this->page]);
    }
    
}