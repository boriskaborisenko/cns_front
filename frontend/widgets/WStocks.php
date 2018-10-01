<?php

namespace frontend\widgets;

use yii\bootstrap\Widget;
use Yii;

class WStocks extends Widget
{
    public $sectionClass = "b-page__section b-page__section--alt b-prop";

    public function init(){
        parent::init();
    }

    public function run() {
        $stocks = Yii::$app->getModule('stocks')->module->runAction('stocks/default/get-stocks-main');
        if ($stocks) {
            return $this->render('stocks/view', [
                'stocks' => $stocks,
                'sectionClass' => $this->sectionClass
            ]);
        } else {
            return false;
        }	
    }
}