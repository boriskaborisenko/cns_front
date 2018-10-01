<?php

/**
 * Description of WCallback
 * shortcode for callback form
 * @author kossworth
 */
namespace frontend\widgets\shortcodes;

use Yii;
use yii\bootstrap\Widget;

class WOsagoCalculator extends Widget 
{
    
    public function getViewPath()
    {
        return Yii::getAlias('@frontend/widgets/shortcodes/views/osago-calculator');
    }
    
    public function init(){
        
    }

    public function run(){
        return $this->render('view',[
            'factors' => Yii::$app->osago->getRequiredFactors(),
            //'cities' => Yii::$app->cities->findOsagoPrettyCities()
        ]);
    }
    
}