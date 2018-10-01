<?php

namespace common\components;

use Yii;
use yii\base\Component;
use common\models\Cities;

/**
 * Description of CitiesComponent
 *
 * @author Pavlo
 */
class CitiesComponent extends Component 
{
    public $isCityCalculator = false;
    
    private $city;
    private $cities = [];
    
    public function getCity()
    {
        if (!empty($this->city)) {
            return $this->city;
        }
        return false;
    }
    
    public function findCityByAlias($alias)
    {
        if ($alias == null) {
            return false;
        }
        $city = Cities::findOne(['alias' => addslashes($alias)]);
        if ($city) {
            $this->city = $city;
            return $this->city;
        }
        return false;
    }
    
    public function findOsagoPrettyCities()
    {
        $query = Cities::find()->where(['not',['alias' => NULL]])
                ->orderBy('zone_code ASC');
        if ($this->getCity()) {
            $query->andWhere(['not',['alias' => $this->city->alias]]);
        }
        $this->cities = $query->all();
        
        return $this->cities;
    }
    
    public function getOsagoPrettyCities()
    {
        if (!empty($this->cities)) {
            return $this->cities;
        }
        return false;
    }
}
