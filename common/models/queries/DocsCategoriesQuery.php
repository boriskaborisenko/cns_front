<?php

namespace common\models\queries;

/**
 * This is the ActiveQuery class for [[\common\models\DocsCategories]].
 *
 * @see \common\models\DocsCategories
 */
class DocsCategoriesQuery extends \common\components\BaseActiveQueryModel
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\DocsCategories[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\DocsCategories|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
