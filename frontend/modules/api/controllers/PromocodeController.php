<?php

namespace frontend\modules\api\controllers;

use Yii;
use yii\web\Controller;
use common\models\Companies;
use common\models\Promocode;
use common\models\Cities;
use yii\helpers\ArrayHelper;
use common\models\ViewLid;
use common\modules\cookie\components\Cookie;
use common\models\Products;

/**
 * Default controller for the `api` module
 */
class PromocodeController extends Controller
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
     * Get cities
     * @return string
     */
    public function actionCheck()
    {   
        $q = Yii::$app->request->get('q');
        $productId = Yii::$app->request->get('product');
        $code = Promocode::find()->select(['alias','value','math_operation','price_limit'])
                    ->where(['alias' => $q])
                    ->andWhere(['>','expiration',date("Y-m-d")])
                    ->andWhere(['status' => 1])
                    ->andWhere(['product_id' => $productId])
                    ->asArray()->one();
        if ($code) {
            return [
                'answer' => true,
                'data' => $code
            ];            
        } else {
            return [
                'answer' => false
            ];
        }      
    }
}
