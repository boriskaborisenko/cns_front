<?php

namespace frontend\modules\api\controllers;

use Yii;
use yii\web\Controller;
use common\models\Companies;
use common\models\Cities;
use yii\helpers\ArrayHelper;
use common\models\ViewLid;
use common\modules\cookie\components\Cookie;
use common\models\Products;

/**
 * Default controller for the `api` module
 */
class TourismController extends Controller
{
    public function behaviors()
    {
        return [
            'ajaxVerbs' => [
                'class' => \common\components\behaviors\AjaxVerbFilter::className(),
                'actions' => [
                    '*' => ['get'],
                ],
            ],
        ];
    }
    /**
     * Get Greencard offers
     * @return string
     */
    public function actionGetOffers()
    {   
        $get = Yii::$app->request->get();
        
        $calculated_data = Yii::$app->tourism->calculate($get);
//        $product_id = Products::getStaticProductId('tourism');
//        $lid = ViewLid::getInstance()->saveLid([
//            'product' => $product_id,
//            'params'  => Yii::$app->request->getQueryString()
//        ]);
        $companies = ArrayHelper::index(Companies::find()->active()->all(),'api_alias');
//        Cookie::addResentViewTourism([
//            'lid'       => $lid,
//            'companies' => $companies
//        ]);
        $html = $this->renderPartial('index',[
            'offers'    => $calculated_data,
            'companies' => $companies,
            'get'       => $get,
        ]);
        
        return [
            'answer' => true,
            'html' => $html
        ];
    }
}
