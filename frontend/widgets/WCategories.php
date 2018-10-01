<?php
namespace frontend\widgets;
use common\models\Docs;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Widget;

class WCategories extends Widget
{	
    public $ul_class=[];

    public function init(){
        parent::init();
    }

    public function run() {
        $categories = Docs::find()->joinWith('info')->byCategoryId(-1)->all();
        if ($categories) {
            
            return $this->render('categories/view', [
                'categories' => $categories,
                'ul_class' => $this->ul_class,
            ]);
        } else {
            return false;
        }	
    }
}