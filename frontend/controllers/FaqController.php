<?php

namespace frontend\controllers;

use common\models\Faq;
use common\models\Products;

class FaqController extends \frontend\components\BaseController
{
    public function actionIndex($product_alias)
    {
        $product = Products::find()
//                        ->joinWith([
//                            'faqs' => function (\yii\db\ActiveQuery $query) {
//                                $query->joinWith('info')->orderBy('sort ASC');
//                            }])
                        ->byAlias($product_alias)->one();
        if ($product) {
            return $this->render('index',[
                'product' => $product
            ]);
        }
        
    }

    public function actionView()
    {
        return $this->render('view');
    }

}
