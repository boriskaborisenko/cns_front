<?php

namespace common\modules\cookie\components;

use yii\helpers\ArrayHelper;
/**
 * Class for working with Cookies 
 *
 * @author Pavlo
 */
class Cookie extends \yii\web\Cookie 
{
    public static function addResentView($params) {
        $cookies = \Yii::$app->request->cookies;
        if (($cookie = $cookies->get('recent_view')) !== null) {
            $data = unserialize($cookie->value);
            $products = ArrayHelper::getColumn($data, 'product_id');
            $lid_id = array_search(\common\models\Products::getStaticProductId('osago'), $products);
            if ($lid_id) {
                unset($data[$lid_id]);
            }
        } else {
            $data = [];
        }
        $data[$params['lid']->id] = [
            'product_id' => \common\models\Products::getStaticProductId('osago'),
            'min_price' => \Yii::$app->osago->getMinCalculatedPrice($params['companies'])
        ];
        \Yii::$app->response->cookies->add(new \yii\web\Cookie([
            'name' => 'recent_view',
            'value' => serialize($data),
            'expire' => time()+365*3600*24
        ]));
    }
    
    public static function addResentViewGreencard($params) {
        $cookies = \Yii::$app->request->cookies;
        if (($cookie = $cookies->get('recent_view')) !== null) {
            $data = unserialize($cookie->value);
            $products = ArrayHelper::getColumn($data, 'product_id');
            $lid_id = array_search(\common\models\Products::getStaticProductId('greencard'), $products);
            if ($lid_id) {
                unset($data[$lid_id]);
            }
        } else {
            $data = [];
        }
        $data[$params['lid']->id] = [
            'product_id' => \common\models\Products::getStaticProductId('greencard'),
            'min_price' => \Yii::$app->greencard->getMinCalculatedPrice($params['companies'])
        ];
        \Yii::$app->response->cookies->add(new \yii\web\Cookie([
            'name' => 'recent_view',
            'value' => serialize($data),
            'expire' => time()+365*3600*24
        ]));
    }
    
    public static function addResentViewMotoKasko($params) {
        $cookies = \Yii::$app->request->cookies;
        if (($cookie = $cookies->get('recent_view')) !== null) {
            $data = unserialize($cookie->value);
            $products = ArrayHelper::getColumn($data, 'product_id');
            $lid_id = array_search(\common\models\Products::getStaticProductId('motokasko'), $products);
            if ($lid_id) {
                unset($data[$lid_id]);
            }
        } else {
            $data = [];
        }
        $data[$params['lid']->id] = [
            'product_id' => \common\models\Products::getStaticProductId('motokasko'),
            'min_price' => \Yii::$app->motokasko->getMinCalculatedPrice($params['companies'])
        ];
        \Yii::$app->response->cookies->add(new \yii\web\Cookie([
            'name' => 'recent_view',
            'value' => serialize($data),
            'expire' => time()+365*3600*24
        ]));
    }
    
    public static function addResentViewTourism($params) {
        $cookies = \Yii::$app->request->cookies;
        if (($cookie = $cookies->get('recent_view')) !== null) {
            $data = unserialize($cookie->value);
            $products = ArrayHelper::getColumn($data, 'product_id');
            $lid_id = array_search(\common\models\Products::getStaticProductId('tourism'), $products);
            if ($lid_id) {
                unset($data[$lid_id]);
            }
        } else {
            $data = [];
        }
        $data[$params['lid']->id] = [
            'product_id' => \common\models\Products::getStaticProductId('tourism'),
            'min_price' => \Yii::$app->tourism->getMinCalculatedPrice($params['companies'])
        ];
        \Yii::$app->response->cookies->add(new \yii\web\Cookie([
            'name' => 'recent_view',
            'value' => serialize($data),
            'expire' => time()+365*3600*24
        ]));
    }
    
    public static function removeOldId() {
        $cookies = \Yii::$app->request->cookies;
        if (($cookie = $cookies->get('recent_view')) !== null) {
            $data = unserialize($cookie->value);
            $products = ArrayHelper::getColumn($data, 'product_id');
            
            //temp id (08.08.2016)
            $lid_temp_id = array_search(1, $products);
                        
            //temp id (08.08.2016) remove later
            if($lid_temp_id){
                unset($data[$lid_temp_id]);
            }
            
            //temp id (08.08.2016)
            $lid_temp_id_old_gc = array_search(3, $products);
                        
            //temp id (08.08.2016) remove later
            if($lid_temp_id_old_gc){
                unset($data[$lid_temp_id_old_gc]);
            }
        } else {
            $data = [];
        } 

        \Yii::$app->response->cookies->add(new \yii\web\Cookie([
            'name' => 'recent_view',
            'value' => serialize($data),
            'expire' => time()+365*3600*24
        ]));
    }
}
