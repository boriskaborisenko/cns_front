<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
//    'on beforeRequest' => function () {
//        if ($info = \common\models\Seo::findOne([
//            'alias' => '/' . trim(Yii::$app->urlManager->parseRequest(Yii::$app->request)[0], '/') . '/',
//        ])
//        ) {
//            Yii::$app->catchAll = [
//                'static/index',
//                'seo' => $info,
//            ];
//        }
//    },
    'modules' => [
        'api' => [
            'class' => 'frontend\modules\api\Api',
        ],
        'stocks' => [
            'class' => 'common\modules\stocks\Stocks',
        ],
        'search' => [
            'class' => 'common\modules\search\Search',
        ],
        'callback' => [
            'class' => 'frontend\modules\callback\Callback',
        ],
        'cookie' => [
            'class' => 'common\modules\cookie\Cookie',
        ],
    ],
    
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'request' => [
            'class' => 'frontend\components\LangRequest',
            'baseUrl' => '/'
        ],
        'links' => [
            'class' => 'frontend\components\LinksComponent',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
        ],
        'urlManager' => [
            'class' => 'frontend\components\LangUrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            //'suffix' => '/',
            'rules' => [
                'feedback' => 'callback/default/feedback',
                'insurance_companies' => 'company/list',
                'company/<id:\d+>' => 'company/view',
                'osago/<cityAlias:[-\w]+>/calculator' => 'osago/calculator-city',
//                'stocks/<id:\d+>' => 'stocks/default/view',
                'stocks/<alias>' => 'stocks/default/view',
                'services/<alias:[-\w]+>' => 'services/category',
                '<product_alias:osago|green-card|tourism>' => 'faq/index',
                //'faq/<product_alias:[-\w]+>' => 'faq/index',
                'post/<category_alias:[-\w]+>' => 'post/category',
                'post/<category_alias:[-\w]+>/<post_alias:[-\w]+>' => 'post/view',
                'green-card/<_a:[-\w]+>' => 'greencard/<_a>',
                'green-card/<_a:[-\w]+>/<id:\d+>' => 'greencard/<_a>',
                'clients/<id:\d+>' => 'clients/client',
                '<_c:[-\w]+>/<_a:-\w+>' => '<_c>/<_a>',
                '<_c:[-\w]+>/<_a:[-\w]+>/<id:\d+>' => '<_c>/<_a>',
                '<_m:\w+>/<_c:\w+>/<_a:-\w+>' => '<_m>/<_c>/<_a>',
            ],
        ],
        'language' => 'ru-RU',
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@frontend/messages',
                ],
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                    'js' => [
                        'js/vendor/jquery-1.12.0.min.js',
                    ],
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'sourcePath' => null,
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                    'js' => [],
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'sourcePath' => null,
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                    'css' => [],
                ],
                'yii\web\YiiAsset' => [
                    'sourcePath' => null,
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                    'js' => [],
                ],
            ],
        ],
        'shortcodes' => [
            'class' => 'tpoxa\shortcodes\Shortcode',
            'callbacks' => [
                'callback'   => ['frontend\widgets\shortcodes\WCallback', 'widget'],
                'osagolinks'   => ['frontend\widgets\shortcodes\WOsagoLinks', 'widget'],
                'button'     => ['frontend\widgets\shortcodes\WButton', 'widget'],
                'osagocalculator'   => ['frontend\widgets\shortcodes\WOsagoCalculator', 'widget'],
            ]
        ],
        'page' => [
            'class' => 'frontend\components\Page',
        ],
    ],
    'params' => $params,
];
