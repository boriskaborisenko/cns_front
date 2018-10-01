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
class OsagoController extends Controller
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
     * Get Osago offers
     * @return string
     */
    public function actionGetOffers()
    {   
        $get = Yii::$app->request->get();
        $arrayForCalc = Yii::$app->osago->autoFill($get);
        $calculated_data = Yii::$app->osago->calculate($arrayForCalc);  
        if (!empty($calculated_data)) {
            $product_id = Products::getStaticProductId('osago');
            $lid = ViewLid::getInstance()->saveLid([
                'product' => $product_id,
                'params'  => Yii::$app->request->getQueryString()
            ]);
            $companies = ArrayHelper::index(Companies::find()->active()->all(),'api_alias');
            Cookie::addResentView([
                'lid'       => $lid,
                'companies' => $companies
            ]);
            $html = $this->renderPartial('index',[
                'product_id' => $product_id,
                'offers'     => $calculated_data,
                'companies'  => $companies,
            ]);
            return [
                'answer' => true,
                'html'   => $html
            ];
        }
        return [
            'answer' => false,
            'html'   => ''
        ];
    }

    /**
     * Get cities
     * @return string
     */
    public function actionGetCities()
    {   
        $q = Yii::$app->request->get('q');
        $cities = Cities::find()->select(['name_ru as name','zone_alias','alias','koatuu'])->where(['like','name_ua',$q])->orWhere(['like','name_ru',$q])->limit(10)->orderBy('zone_code ASC')->asArray()->all();
        if ($cities) {
            return [
                'answer' => true,
                'cities' => $cities
            ];            
        } else {
            return [
                'answer' => false
            ];
        }      
    }
}
