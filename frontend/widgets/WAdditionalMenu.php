<?php

namespace frontend\widgets;

use yii\bootstrap\Widget;
use Yii;
use common\models\Services;


/**
 * Description of WAdditionalMenu
 *
 * @author kossworth
 */
class WAdditionalMenu extends Widget {
        
    public function init(){
        parent::init();
    }

    public function run() {
        $services = Services::find()->joinWith([
                'info',
                'products' => function(\yii\db\ActiveQuery $query) {
                    $query->joinWith('info')->active();
                }
            ])->byParentId('-1')->all();
        if ($services) {
            return $this->render('additional_menu/view', [
                'services' => $services,
            ]);
        } else {
            return false;
        }	
    }
}
