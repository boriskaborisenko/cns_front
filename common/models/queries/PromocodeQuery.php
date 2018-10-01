<?php

namespace common\models\queries;

/**
 * This is the ActiveQuery class for [[\common\models\Promocode]].
 *
 * @see \common\models\Promocode
 */
class PromocodeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\Promocode[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Promocode|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
