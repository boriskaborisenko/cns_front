<?php

namespace frontend\assets\greencard;

use yii\web\AssetBundle;
/**
 * Description of GreencardFormJsAsset
 *
 * @author kossworth
 */
class GreencardFormJsAsset extends AssetBundle {
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    ];
    public $js = [
        'js/greencard/greencard-form.js?v=1.0.1'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'frontend\assets\AppAsset',
        'frontend\assets\AppJsAsset',
    ];
}
