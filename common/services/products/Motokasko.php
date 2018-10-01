<?php

namespace common\services\products;


use yii\base\Component;


/**
 * Description of Greencard
 *
 * @author kossworth
 */

class Motokasko extends Component 
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
            $this->product = $this->api->getProduct('motokasko');
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
        $this->calculated_data = $this->api->calculateProduct('motokasko', $params);
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
                if ($element->price_special != 0 &&
                    isset($companies[$element->companyInfo->alias]) &&
                    $element->companyInfo->active == 1
                ) {
                    $cur_price = ceil($element->price_special);
                    if ($cur_price < $min_price) {
                        $min_price = $cur_price;
                    }
                }
        }

        return $min_price;
    }
}
