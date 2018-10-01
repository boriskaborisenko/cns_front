<?php

namespace frontend\widgets;

use yii\bootstrap\Widget;
use Yii;
use common\models\PostCategories;


/**
 * Description of WPublications
 *
 * @author kossworth
 */
class WPublications extends Widget {
    
    public $alias = '';
    
    public function init(){
        parent::init();
    }

    public function run() {
        $category = PostCategories::find()->byAlias($this->alias)->joinWith([
                    'posts' => function (\yii\db\ActiveQuery $query) {
                        $query->limit(4);
                    },
                ])->joinWith('info')->one();
        if ($category) {
            return $this->render('publications/view', [
                'category' => $category,
            ]);
        } else {
            return false;
        }	
    }
}
