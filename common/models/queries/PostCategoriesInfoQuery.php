<?php

namespace common\models\queries;

/**
 * This is the ActiveQuery class for [[\common\models\PostCategoriesInfo]].
 *
 * @see \common\models\PostCategoriesInfo
 */
class PostCategoriesInfoQuery extends \common\components\BaseActiveQueryModel
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\PostCategoriesInfo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\PostCategoriesInfo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
