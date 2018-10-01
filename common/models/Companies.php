<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "companies".
 *
 * @property integer $id
 * @property string $alias
 * @property string $api_alias
 * @property integer $hide
 * @property string $sort
 * @property string $creation_time
 * @property string $update_time
 *
 * @property CompaniesInfo[] $companiesInfos
 */
class Companies extends \common\components\BaseActiveRecordModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'companies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'api_id', 'api_alias', 'hide', 'creation_time', 'update_time'], 'required'],
            [['api_id', 'hide', 'sort', 'creation_time', 'update_time'], 'integer'],
            [['alias'], 'string', 'max' => 250],
            [['api_alias'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'api_id' => Yii::t('app', 'Api ID'),
            'alias' => Yii::t('app', 'Alias (заповнювати не обов`язково)'),
            'api_alias' => Yii::t('app', 'Api Alias'),
            'hide' => Yii::t('app', 'Не відображати'),
            'sort' => Yii::t('app', 'SORT'),
            'creation_time' => Yii::t('app', 'Date of creation'),
            'update_time' => Yii::t('app', 'Date of update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInfo()
    {
        return $this->hasOne(
            CompaniesInfo::className(),
            ['record_id' => 'id']
        )->where([CompaniesInfo::tableName() . '.lang' => Lang::getCurrentId()]);
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\CompaniesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\CompaniesQuery(get_called_class());
    }

    public function beforeValidate()
    {
        if ($this->isNewRecord) {
            $this->hide = 1;
            $this->sort = 0;
            $this->creation_time = time();
            $this->update_time = time();
        }

        return parent::beforeValidate();
    }
}
