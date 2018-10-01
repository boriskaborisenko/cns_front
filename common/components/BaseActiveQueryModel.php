<?php

namespace common\components;

use yii\data\Pagination;

class BaseActiveQueryModel extends \yii\db\ActiveQuery
{
    public function byId($id)
    {
        $this->andWhere("[[id]]='$id'");
        return $this;
    }
    
    public function byAlias($alias)
    {
        $class = $this->modelClass;
        $table_name = $class::tableName();
        $this->andWhere("[[$table_name.alias]]='$alias'");
        return $this;
    }
    
    public function byParentId($parent_id)
    {   
        $tableClass = $this->modelClass;
        $tableName = $tableClass::tableName();
        $this->andWhere("[[$tableName.parent_id]]='$parent_id'");
        return $this;
    }
    
    public function pagination($count_field = 'id',$per_page = 4){
        $countQuery = clone $this;
        $totalCount = $countQuery->count($count_field);
        unset($countQuery);
        $pages = new Pagination(['totalCount' => $totalCount]);
        $pages->setPageSize($per_page);
        return	$pages;	
    } 

    public function active()
    {
        $this->andWhere("[[hide]]='0'");
        return $this;
    }
}
