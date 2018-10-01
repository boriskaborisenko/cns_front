<?php

namespace frontend\modules\callback\models\queries;

/**
 * This is the ActiveQuery class for [[\common\modules\callback\models\Callbacks]].
 *
 * @see \common\modules\callback\models\Callbacks
 */
class CallbacksQuery extends \common\components\BaseActiveQueryModel
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\modules\callback\models\Callbacks[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\modules\callback\models\Callbacks|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
