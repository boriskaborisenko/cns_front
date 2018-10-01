<?php

namespace common\modules\stocks\models\queries;

/**
 * This is the ActiveQuery class for [[\common\modules\stocks\models\Stocks]].
 *
 * @see \common\modules\stocks\models\Stocks
 */
class StocksQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\modules\stocks\models\Stocks[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\modules\stocks\models\Stocks|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
