<?php

namespace common\models\queries;

/**
 * This is the ActiveQuery class for [[\common\models\DocsInfo]].
 *
 * @see \common\models\DocsInfo
 */
class DocsInfoQuery extends \common\components\BaseActiveQueryModel
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\DocsInfo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\DocsInfo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
