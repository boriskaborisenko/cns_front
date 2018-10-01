<?php

namespace common\models\queries;

/**
 * This is the ActiveQuery class for [[\common\models\ProductsInfo]].
 *
 * @see \common\models\ProductsInfo
 */
class ProductsInfoQuery extends \common\components\BaseActiveQueryModel
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\ProductsInfo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\ProductsInfo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
