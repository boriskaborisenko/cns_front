<?php

namespace common\models\queries;

/**
 * This is the ActiveQuery class for [[\common\models\Post]].
 *
 * @see \common\models\Post
 */
class PostQuery extends \common\components\BaseActiveQueryModel
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\Post[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Post|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
