<?php
namespace common\helpers;

class ArrayHelperApi extends \yii\helpers\ArrayHelper
{
    public static function selectOptions($array)
    {
        $options = [];
        foreach ($array as $value) {
            $options[$value->alias] = \Yii::t('factors', $value->alias);
        }

        return $options;
    }

    public static function autoOptgroups($array)
    {
        $options = [];
        foreach ($array as $value) {
            switch ($value->alias) {
                case 'legkovye_ts_do_1600_sm3':
                case 'legkovye_ts_1601_2000_sm3':
                case 'legkovye_ts_2001_3000_sm3':
                case 'legkovye_ts_3001_sm3_i_bolshe':
                    $optgroupLabel = 'Легковые';
                    break;
                case 'gruzovye_ts_do_2t':
                case 'gruzovye_ts_2t_i_bolshe':
                    $optgroupLabel = 'Грузовые';
                    break;
                case 'mototsikly_do_300_sm3':
                case 'mototsikly_300_sm3_i_bolshe':
                    $optgroupLabel = 'Мотоциклы';
                    break;
                case 'pritsepy_k_legkovym_ts':
                case 'pritsepy_k_gruzovym_ts':
                    $optgroupLabel = 'Прицепы';
                    break;
                case 'avtobusy_do_20_mest':
                case 'avtobusy_20_i_bolee_mest':
                    $optgroupLabel = 'Автобусы';
                    break;
            }
            $options[$optgroupLabel][$value->alias] = $value->name;
        }

        return $options;
    }
    
    public static function autoCompliteFormFields($array, $required_factors)
    {
        if (isset($array['_csrf'])) {
            unset($array['_csrf']);
        }
        $offer_info = [];
        foreach ($array as $key => $post_value) {
            if (isset($required_factors[$key])) {
                foreach ($required_factors[$key]->values as $factor_value) {
                    if ($factor_value->alias == $post_value) {
                        $offer_info[$key]['value'] = $factor_value;
                        $offer_info[$key]['label'] = $required_factors[$key]->name;
                    }
                }
            } else {
                $offer_info[$key] = $post_value;
            }
        }

        return $offer_info;
    }
}
