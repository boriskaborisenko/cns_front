<?php

namespace common\models\queries;

/**
 * This is the ActiveQuery class for [[\common\models\Docs]].
 *
 * @see \common\models\Docs
 */
class DocsQuery extends \common\components\BaseActiveQueryModel
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\Docs[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Docs|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    public function byCategoryId($category_id)
    {
        $this->andWhere("[[category_id]]='$category_id'");
        return $this;
    }
}
