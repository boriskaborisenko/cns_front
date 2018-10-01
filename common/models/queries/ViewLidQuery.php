<?php

namespace common\models\queries;

/**
 * This is the ActiveQuery class for [[\common\models\ViewLid]].
 *
 * @see \common\models\ViewLid
 */
class ViewLidQuery extends \common\components\BaseActiveQueryModel
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\ViewLid[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\ViewLid|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
