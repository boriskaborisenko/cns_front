<?php
namespace frontend\widgets;
use common\models\PostCategories;
use yii\bootstrap\Widget;

class WPostCategories extends Widget
{	
    public $ul_class=[];

    public function init(){
        parent::init();
    }

    public function run() {
        $categories = PostCategories::find()->joinWith('info')->byParentId(-1)->all();
        if ($categories) {
            
            return $this->render('post-categories/view', [
                'categories' => $categories,
                'ul_class' => $this->ul_class,
            ]);
        } else {
            return false;
        }	
    }
}