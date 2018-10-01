<?php

/**
 * Description of WCallback
 * shortcode for callback form
 * @author kossworth
 */
namespace frontend\widgets\shortcodes;

use Yii;
use yii\bootstrap\Widget;

class WOsagoLinks extends Widget 
{
    
    public function getViewPath()
    {
        return Yii::getAlias('@frontend/widgets/shortcodes/views/osago-links');
    }
    
    public function init(){
        
    }

    public function run(){
        $col1 = \common\models\Seo::find()
                ->where([
                    'alias' => [
                        '/polis-osago/',
                        '/osago/calculator/',
                        '/osago-price/',
                        '/buy-osago-online/',
                        '/osago-price-calculation/',
                    ]
                ])
                ->joinWith('info')
                ->all();
        $col2 = \common\models\Seo::find()
                ->where([
                    'alias' => [
                        '/avtocivilka/',
                        '/avtograzhdanka/',
                        '/how-much-osago/',
                    ]
                ])
                ->joinWith('info')
                ->all();
        $col3 = \common\models\Seo::find()
                ->where([
                    'alias' => [
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
        return $this->render('view', [
            'col1' => $col1,
            'col2' => $col2,
            'col3' => $col3,
        ]);
    }
    
}