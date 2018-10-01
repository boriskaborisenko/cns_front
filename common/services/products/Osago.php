<?php
namespace common\services\products;

use yii\base\Component;

/**
 * Class Osago
 * @package common\services\products
 * @property \common\services\cni\Api $api
 */
class Osago extends Component
{

    private $api;
    private $product;
    private $active = null;
    private $factors;
    private $required_factors;
    private $calculated_data = null;

    public function __construct()
    {
        $this->api = \Yii::$app->cni_api;
    }

    public function get()
    {
        if (!$this->product) {
            $this->product = $this->api->getProduct('osago');
            if ($this->product) {
                $this->active = $this->product->active;
                foreach ($this->product->factors as $factor) {
                    $this->factors[$factor->alias] = $factor;
                }
            }
        }

        return $this->product;
    }

    public function isActive()
    {
        $this->checkData($this->active);

        return $this->active;
    }

    public function getFactors()
    {
        $this->checkData($this->factors);

        return $this->factors;
    }

    public function getFactor($name)
    {
        $this->checkData($this->factors);

        return ($name && array_key_exists($name, $this->factors)) ? $this->factors[$name] : [];
    }


    public function calculate($params)
    {
        $this->api->setBaseUrl(\Yii::$app->params['cni.calculator.v2']);
        $this->calculated_data = $this->api->calculateProduct('osago', $params);
        if (isset($params['company']) && !empty($params['company'])) {
            return $this->filterByCompany($params['company']);
        }
        return $this->calculated_data;
    }

    public function getRequiredFactors()
    {
        if (!$this->required_factors) {
            foreach ($this->getFactors() as $factor) {
                if ($factor->is_required) {
                    $this->required_factors[$factor->alias] = $factor;
                }
            }
        }

        return $this->required_factors;
    }

    public function getTestArrayForCalculate()
    {
        return [
            'tip_ts' => 'legkovye_ts_do_1600_sm3',
            'mesto_registratsii' => 'zona_1_kiev',
            'sfera_ispolzovaniya' => 'fiz_litso',
            'stazh_vozhdeniya' => 'bolee_3_kh_let',
            'srok_deystviya' => '1_god',
            'god_vypuska_bm' => '2012_i_ranee',
            'kolichestvo_ts' => '1_4_ts',
            'lgoty' => 'net_lgot',
        ];
    }

    public function autoFill($data = [])
    {
        $filteredData = $this->prepareRequestArray($data);
        foreach ($this->requiredFactors as $key => $factor) {
            if (!isset($data[$key])) {
                $filteredData[$key] = ($key == 'god_vypuska_bm') ?
                    $factor->values[4]->alias :
                    reset($factor->values)->alias;
                
//                $filteredData[$key] = ($key == 'stazh_vozhdeniya') ?
//                    $factor->values[0]->alias : // value = do_3_kh_let
//                    reset($factor->values)->alias;
            }
        }
        
        return $filteredData;
    }

    public function prepareRequestArray($data)
    {
        if (isset($data['_csrf'])) {
            unset($data['_csrf']);
        }

        return $data;
    }

    private function checkData($param)
    {
        if (empty($param)) {
            $this->get();
        }
    }

    public function getCalculatedData()
    {
        return $this->calculated_data;
    }

    public function getMinCalculatedPrice($companies)
    {
        $min_price = 10000000; // first init with big number

        foreach ($this->calculated_data as $element) {
            foreach ($element->price_special as $price) {
                if ($price != 0 &&
                    isset($companies[$element->companyInfo->alias]) &&
                    $element->companyInfo->active == 1
                ) {
                    $cur_price = ceil($price);
                    if ($cur_price < $min_price) {
                        $min_price = $cur_price;
                    }
                }
            }
        }

        return $min_price;
    }
    
    public function filterByCompany($alias) 
    {
        if (isset($this->calculated_data->$alias)) {
            return (object)[
                $alias => $this->calculated_data->$alias
            ];
        } else {
//            return $this->calculated_data;
            return (object)[];
        } 
    }
}
