<?php

namespace frontend\assets\tourism;

use yii\web\AssetBundle;

/**
 * @author kossworth
 * 
 */
class TourismFormJsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    ];
    public $js = [
        'js/tourism/tourism-form.js?v=1.0.1'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'frontend\assets\AppAsset',
        'frontend\assets\AppJsAsset',
    ];
}
