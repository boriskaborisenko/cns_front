<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cities".
 *
 * @property integer $id
 * @property string $name_ru
 * @property string $name_ua
 * @property string $alias
 * @property string $koatuu
 * @property integer $zone_code
 * @property integer $zone_alias
 * @property integer $last_date
 */
class Cities extends \common\components\BaseActiveRecordModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'zone_code', 'last_date'], 'integer'],
            [['name_ua', 'name_ru', 'koatuu'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name_ua' => Yii::t('app', 'Name ua'),
            'name_ru' => Yii::t('app', 'Name ru'),
            'koatuu' => Yii::t('app', 'Koatuu'),
            'zone_code' => Yii::t('app', 'Zone Code'),
            'last_date' => Yii::t('app', 'Last Date'),
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\queries\CitiesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\CitiesQuery(get_called_class());
    }
    
    public static function getSpecifiedCity(){
        
        // из ГЕТа берем название города. если он не задан - ищем по ip. если и так не находим - возвращаем null
        // потом по название ищем город в базе
        
        $get = Yii::$app->request->get();
        $city = null;
        $selected = null;
        $koatuu = null;
        
        if(isset($get['registration_city'])) {
            $city = $get['registration_city'];
        } else {
            $city_array = Yii::$app->spxgeo->city();
            if($city_array) {
                $city = $city_array['name_ru'];
            } else {
                return ['city' => $city, 'selected' => $selected, 'koatuu' => $koatuu];
            }
        }
        
        $found_city = self::find()->where(['like','name_ru',$city])
                                            ->orderBy('zone_code ASC')
                                            ->asArray()
                                            ->one();

        if(!is_null($found_city)) {
            $city = $found_city['name_ru'];
            $selected = $found_city['zone_alias']; 
            $koatuu = $found_city['koatuu'];
            
            if (!Yii::$app->cities->isCityCalculator) {
                Yii::$app->cities->findCityByAlias($found_city['alias']); // Init founded City
            }
        } else {
            $city = null;
        }
        
        return ['city' => $city, 'selected' => $selected, 'koatuu' => $koatuu];
    }
}
