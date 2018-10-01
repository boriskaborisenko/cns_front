<?php

namespace common\models\queries;

/**
 * This is the ActiveQuery class for [[\common\models\DocsCategoriesInfo]].
 *
 * @see \common\models\DocsCategoriesInfo
 */
class DocsCategoriesInfoQuery extends \common\components\BaseActiveQueryModel
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\DocsCategoriesInfo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\DocsCategoriesInfo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
