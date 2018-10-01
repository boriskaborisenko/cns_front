<?php

namespace frontend\assets\osago;

use yii\web\AssetBundle;

/**
 * @author Novikov Pavlo
 * 
 */
class OsagoFormJsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    ];
    public $js = [
        'js/osago/osago-form.js?v=1.0.5'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'frontend\assets\AppAsset',
        'frontend\assets\AppJsAsset',
    ];
}
