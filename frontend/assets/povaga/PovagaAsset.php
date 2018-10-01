<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets\povaga;

use yii\web\AssetBundle;

/**
 * @author Novikov Pavlo
 * 
 */
class PovagaAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/pikaday.min.css'
    ];
    public $js = [
        'js/vendor/moment.min.js',
        'js/vendor/pikaday.min.js',
        'js/povaga/povaga.js?v=1.0.5',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'frontend\assets\AppAsset',
        'frontend\assets\AppJsAsset',
    ];
}
