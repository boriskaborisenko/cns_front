<?php

namespace frontend\assets\motokasko;

use yii\web\AssetBundle;
/**
 * Description of GreencardFormJsAsset
 *
 * @author kossworth
 */
class MotokaskoFormJsAsset extends AssetBundle {
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    ];
    public $js = [
        'js/moto-kasko/moto-kasko-form.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'frontend\assets\AppAsset',
        'frontend\assets\AppJsAsset',
    ];
}
