<?php

namespace common\models\queries;

/**
 * This is the ActiveQuery class for [[\common\models\PostInfo]].
 *
 * @see \common\models\PostInfo
 */
class PostInfoQuery extends \common\components\BaseActiveQueryModel
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\PostInfo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\PostInfo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
