<?php

namespace common\components\behaviors;

use yii\base\Behavior;

class PostBehavior extends Behavior
{	
    /**
     * Get formated pub date
     */    
    public function getPubDate($format)
    {
        $date=\DateTime::createFromFormat('Y-m-d',$this->owner->pub_date);
        return $date->format($format);
    }
}