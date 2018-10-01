<?php

namespace frontend\widgets;
use yii\bootstrap\Widget;
use Yii;
use common\models\Products;
use common\models\ViewLid;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

/**
 * Description of WBuyProduct
 *
 * @author kossworth
 */
class WBuyProduct extends Widget {
    
    public $company = null;
    
    public function init(){
        parent::init();
    }
    
    public function run(){
        
        $product_id  = Yii::$app->request->get('product');
        
        if(!$product_id) {
            $product_id = Products::OSAGO_ID;
        } 
        
        $product = Products::find()
                        ->joinWith('info')
                        ->andWhere(['products.id' => $product_id])
                        ->one();

        $url = Yii::$app->links->lidByProductId($product_id, $this->company->alias);

        return $this->render('buy_product/buy_product', [
                        'url'          => $url,
                        'product'      => $product,
        ]);
        
    }
    
}
