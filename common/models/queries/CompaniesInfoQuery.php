<?php

namespace common\models\queries;

/**
 * This is the ActiveQuery class for [[\common\models\CompaniesInfo]].
 *
 * @see \common\models\CompaniesInfo
 */
class CompaniesInfoQuery extends \common\components\BaseActiveQueryModel
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\CompaniesInfo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\CompaniesInfo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
