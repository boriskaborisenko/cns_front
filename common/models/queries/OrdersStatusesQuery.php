<?php

namespace common\models\queries;

/**
 * This is the ActiveQuery class for [[\common\models\OrdersStatuses]].
 *
 * @see \common\models\OrdersStatuses
 */
class OrdersStatusesQuery extends \common\components\BaseActiveQueryModel
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\OrdersStatuses[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\OrdersStatuses|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
