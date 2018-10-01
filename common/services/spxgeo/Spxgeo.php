<?php

namespace common\services\spxgeo;
use jisoft\sypexgeo\Sypexgeo;
use yii\base\Component;

class Spxgeo extends Component {
    
    public function get( $ip = '') {
        $sypex = new Sypexgeo();
        $target = $sypex->get($ip);
        return $target;
    }
    
    public function city($ip = '') {
        $sypex = new Sypexgeo();
        $sypex->get($ip);
        return $sypex->city;
    }
}