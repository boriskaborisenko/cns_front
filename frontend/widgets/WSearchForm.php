<?php
namespace frontend\widgets;
use yii\bootstrap\Widget;

class WSearchForm extends Widget
{	
    public function init(){
        parent::init();
    }

    public function run() {
        return $this->render('search-form/view');	
    }
}