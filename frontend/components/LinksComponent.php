<?php

namespace frontend\components;
use Yii;
use yii\base\Component;
use yii\helpers\Url;
use common\models\Products;

/**
 * Description of LinksComponent
 *
 * @author kossworth
 */

class LinksComponent extends Component {
    
    public function mainMenuLink($product_id) {
        return Products::getStaticProductUrl($product_id);
    }
    
    public function lidByProductId($product_id, $company_alias = ''){
        // берем текущий лид
        $current_lid = Products::getStaticProductUrl($product_id);

        $data_array = explode("&", $current_lid);
        $data_array_count = count($data_array);

        if($data_array_count > 1) {
            $new_lid = $data_array[0];
            unset($data_array[0]);
            // разбиваем текущий лид по параметрам, сохраняем его начало, т.к. оно не относится к параметрам
            // (например /osago/calculator), и удаляем из начального массива

            $params = [];
            // парсим параметры
            foreach ($data_array as $data_string) {
                $data = explode('=',$data_string);
                $params[$data[0]] = $data[1];
            }

            if(!empty($company_alias)){
                $params['company'] = $company_alias;
            } else {
                return $current_lid;
            }

            foreach ($params as $param_key => $param_val)
            {
                $new_lid.= '&'.$param_key.'='.$param_val;
            }
            return Url::to([$new_lid]);
        } else {
            if(!empty($company_alias)){
                return Url::to([$current_lid.'?company='.$company_alias]);
            } else {
                return $current_lid;
            }
        }

    }
    
}
