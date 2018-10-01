<?php
namespace frontend\widgets;
use common\models\Products;
use yii\bootstrap\Widget;

class WFaq extends Widget
{	
    public $product_alias;

    public function init(){
        parent::init();
    }

    public function run() {
        $product = Products::find()->joinWith([
            'faqs' => function (\yii\db\ActiveQuery $query) {
                $query->joinWith('info')->orderBy('sort ASC')->limit(3);
            }
        ])->byAlias($this->product_alias)->one();
        if ($product) {
            
            return $this->render('faq/view', [
                'product' => $product,
            ]);
        } else {
            return false;
        }	
    }
}