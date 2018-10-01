<?php

namespace common\components\behaviors;

use yii\base\Behavior;
use yii\helpers\Html;

class ThumbBehavior extends Behavior
{
    /**
    * Get image path
    */    
    public function getImgPath()
    {
        $table_name=$this->owner->tableName();
        $path="/images/$table_name/{$this->owner->id}.1.b.jpg";
        if(file_exists(".".$path)) {
            return $path;
        } else {
            return false;
        }
    }
    
    public function getThumb($options = [], $size = "b")
    {
            $img_size = ($size=="b") ? $size : "s";
            $table_name=$this->owner->tableName();
            $path="/images/$table_name/{$this->owner->id}.1.$img_size.jpg";
            if (file_exists('.'.$path)) {
                    return Html::img($path,$options);
            } else {
                    return "";
            }
    }
    
    public function isThumb()
    {
        $table_name=$this->owner->tableName();
        $path="/images/$table_name/{$this->owner->id}.1.b.jpg";
        if (file_exists('.'.$path)) {
                return true;
        } else {
                return false;
        }
    }
}

