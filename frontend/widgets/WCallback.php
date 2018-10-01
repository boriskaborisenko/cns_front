<?php
namespace frontend\widgets;
use yii\bootstrap\Widget;

class WCallback extends Widget
{	
    public function init(){
        parent::init();
    }

    public function run() {
        return $this->render('callback/view');	
    }
}