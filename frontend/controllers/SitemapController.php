<?php

namespace frontend\controllers;

use common\models\PostCategories;

class SitemapController extends \frontend\components\BaseController
{
    public function actionIndex()
    {
        $categories = PostCategories::find()->joinWith(['posts','info'])->all();
        $osagolinks = \common\models\Seo::find()
                ->where([
                    'alias' => [
                        '/polis-osago/',
                        '/osago-price/',
                        '/buy-osago-online/',
                        '/osago-price-calculation/',
                        '/avtocivilka/',
                        '/avtograzhdanka/',
                        '/how-much-osago/',
                        '/osago/kyiv/calculator/',
                        '/osago/dnepr/calculator/',
                        '/osago/kharkov/calculator/',
                        '/osago/odessa/calculator/',
                        '/osago/lvov/calculator/',
                        '/osago/zaporozhye/calculator/',
                    ]
                ])
                ->joinWith('info')
                ->all();
        return $this->render('index',[
            'categories' => $categories, 
            'osagolinks' => $osagolinks
        ]);
    }

}
