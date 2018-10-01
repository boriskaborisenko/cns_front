<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets\tourism;

use yii\web\AssetBundle;

/**
 * @author Novikov Pavlo
 * 
 */
class TourismOffersJsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/pikaday.min.css'
    ];
    public $js = [
        'js/vendor/moment.min.js',
        'js/vendor/pikaday.min.js',
        'js/tourism/tourism-offers.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'frontend\assets\AppAsset',
        'frontend\assets\AppJsAsset',
    ];
}
