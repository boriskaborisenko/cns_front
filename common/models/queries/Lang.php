<?php

namespace common\models\queries;

/**
 * This is the ActiveQuery class for [[\frontend\models\Lang]].
 *
 * @see \frontend\models\Lang
 */
class Lang extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \frontend\models\Lang[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \frontend\models\Lang|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    /**
     * @inheritdoc
     * @return array|null|\yii\db\ActiveRecord
     */
    public function getDefault()
    {
        return parent::where('`default` = :default', [':default' => 1])->one();
    }

    /**
     * @inheritdoc
     * @param $url
     * @return array|null|\yii\db\ActiveRecord
     */
    public function byUrl($url)
    {
        return parent::where('url = :url', [':url' => $url])->one();
    }

    public function allWithoutCurrent($current_id)
    {
        return parent::where('id != :current_id', [':current_id' => $current_id])->all();
    }
}
