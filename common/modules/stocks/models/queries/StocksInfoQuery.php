<?php

namespace common\modules\stocks\models\queries;

/**
 * This is the ActiveQuery class for [[\common\modules\stocks\models\StocksInfo]].
 *
 * @see \common\modules\stocks\models\StocksInfo
 */
class StocksInfoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\modules\stocks\models\StocksInfo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\modules\stocks\models\StocksInfo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
