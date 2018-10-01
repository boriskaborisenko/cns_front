<?php

namespace common\modules\stocks\models;

use common\models\Lang;
use yii\helpers\Url;
use Yii;

/**
 * This is the model class for table "stocks".
 *
 * @property integer $id
 * @property integer $company_id
 * @property string $url_to
 * @property integer $hide
 * @property integer $creation_time
 * @property integer $update_time
 *
 * @property StocksInfo[] $stocksInfos
 * @property StocksInfo $stocksInfosByLang
 */
class Stocks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stocks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'hide', 'alias','creation_time', 'update_time'], 'required'],
            [['alias',], 'string'],
            [['company_id', 'hide', 'creation_time', 'update_time'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'company_id' => 'Company ID',
            'hide' => 'Hide',
            'creation_time' => 'Creation Time',
            'update_time' => 'Update Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStocksInfos()
    {
        return $this->hasMany(StocksInfo::className(), ['record_id' => 'id']);
    }

    public function getStocksInfosByLang()
    {
        return $this->hasOne(
            StocksInfo::className(),
            ['record_id' => 'id']
        )
            ->where(['lang' => Lang::getCurrentId()])
            ->one();
    }

    /**
     * @inheritdoc
     * @return \common\modules\stocks\models\queries\StocksQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\modules\stocks\models\queries\StocksQuery(get_called_class());
    }

    public function getCompanyUrl()
    {
        return '/company/' . $this->company_id;
    }
    public function getCompanyLogo()
    {
        return '/images/companies/' . $this->company_id . '.1.b.jpg';
    }

    public function getLogo()
    {
        return '/images/stocks/' . $this->id . '.1.b.jpg';
    }
    
    public function getCompany(){
        return $this->hasOne(\common\models\Companies::className(), ['id' => 'company_id']);
    }
    
    public function getUrl(){
        if (!empty($this->url_to)) {
            return Url::to([$this->url_to]);
        }
        return Url::to(["/stocks/".$this->alias]);
    }
}
