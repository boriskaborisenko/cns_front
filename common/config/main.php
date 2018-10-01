<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'cni_api' => [
            'class' => 'common\services\cni\Api',
        ],
        'osago' => [
            'class' => 'common\services\products\Osago',
        ],
        'greencard' => [
            'class' => 'common\services\products\Greencard',
        ],
        'liqpay' => [
            'class' => 'common\services\liqpay\LiqPay',
        ],
        'spxgeo' => [
            'class' => 'common\services\spxgeo\Spxgeo',
        ],
        'tourism' => [
            'class' => 'common\services\products\Tourism',
        ],
        'mailgun' => [
            'class' => 'common\services\mailgun\Mailgun',
        ],
        'cities' => [
            'class' => 'common\components\CitiesComponent',
        ],
        'motokasko' => [
            'class' => 'common\services\products\Motokasko',
        ],
    ],
];
