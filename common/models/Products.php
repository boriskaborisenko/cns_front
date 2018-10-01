<?php

namespace common\models;

use Yii;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use common\models\ViewLid;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $alias
 * @property string $api_id
 * @property string $api_alias
 * @property integer $parent_id
 * @property integer $hide
 * @property string $sort
 * @property string $creation_time
 * @property string $update_time
 *
 * @property ProductsInfo[] $productsInfos
 */
class Products extends \common\components\BaseActiveRecordModel
{
    
    const OSAGO_ID          = 2;
    const KASKO_ID          = 3;
    const GREENCARD_ID      = 4;
    const TOURISM_ID        = 5;
    const HEALTH_ID         = 6;
    const ACCIDENT_ID       = 7;
    const NEIGHBORS_ID      = 8;
    const PROFESSIONAL_ID   = 9;
    const APPARTMENT_ID     = 10;
    const HOUSE_ID          = 11;
    const WEAPON_ID         = 12;
    const DOG_ID            = 13;
    const MOTOKASKO_ID      = 14;
    
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'api_id', 'api_alias', 'parent_id', 'hide', 'sort', 'creation_time', 'update_time'], 'required'],
            [['parent_id', 'hide', 'sort', 'creation_time', 'update_time'], 'integer'],
            [['alias', 'api_id', 'api_alias'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'alias' => Yii::t('app', 'Alias (заповнювати не обов`язково)'),
            'api_id' => Yii::t('app', 'Api ID'),
            'api_alias' => Yii::t('app', 'API alias'),
            'parent_id' => Yii::t('app', 'Принадлежит категории'),
            'hide' => Yii::t('app', 'Не відображати'),
            'sort' => Yii::t('app', 'SORT'),
            'creation_time' => Yii::t('app', 'Date of creation'),
            'update_time' => Yii::t('app', 'Date of update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsInfos()
    {
        return $this->hasMany(ProductsInfo::className(), ['record_id' => 'id']);
    }

    public function getFaqs()
    {
        return $this->hasMany(
                Faq::className(), 
                ['product_id' => 'id']
        );
    }    

    public function getInfo()
    {
        return $this->hasOne(
                ProductsInfo::className(), 
                ['record_id' => 'id']
        )->where([ProductsInfo::tableName() . '.lang' => Lang::getCurrentId()]);
    }     
    
    public function getUrl()
    {
        return Url::to(['/'.$this->alias]);
    }  
       
    public function getCalculatorUrl()
    {
        switch ($this->alias) {
            case 'osago':
                return Url::to(['/'.$this->alias.'/calculator']);
            case 'green-card':
                return Url::to(['/'.$this->alias.'/calculator']);
            case 'moto-kasko':
                return Url::to(['/'.$this->alias.'/calculator']);
            case 'tourism':
                return Url::to(['/'.$this->alias.'/calculator']);
            default:
                return Url::to(['/'.$this->alias]);
        }
        
    }
    
    /**
     * @inheritdoc
     * @return \common\models\queries\ProductsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\queries\ProductsQuery(get_called_class());
    }
    
    public static function getStaticProductId($alias)
    {
        switch ($alias) {
            case 'osago':
                $id = self::OSAGO_ID;
                break;
            case 'motokasko':
                $id = self::MOTOKASKO_ID;
                break;
            case 'tourism':
                $id = self::TOURISM_ID;
                break;
            case 'greencard':
            case 'green-card':
                $id = self::GREENCARD_ID;
                break;
            default:
                $id = -1;
        }
        return $id;
    }
    
    public static function getStaticProductUrl($id)
    {
        switch ($id) {
            case self::OSAGO_ID:
                $url = '/osago/calculator';
                break;
            case self::GREENCARD_ID:
                $url = '/green-card/calculator';
                break;
            case self::MOTOKASKO_ID:
                $url = '/moto-kasko/calculator';
                break;
            case self::TOURISM_ID:
                $url = '/tourism/calculator';
                break;
            default:
                $url = '/site';
        }
        
        $cookies = \Yii::$app->request->cookies;
        $recent_view = $cookies->get('recent_view');
        
        if (!is_null($recent_view)) {
            $data = unserialize($recent_view->value);
            $products = ArrayHelper::getColumn($data, 'product_id');
            $lid_id = array_search($id, $products);
            $lid = ViewLid::find()->andWhere(['view_lid.id' => $lid_id])->one();
            if(is_null($lid)){
                return $url;
            }
            $url = Url::to([$url.'?'.$lid->params]);
        } 

        return $url;
    }
    
    public static function getStaticProductName($id)
    {
        switch ($id) {
            case self::OSAGO_ID:
                $name = 'ОСАГО';
                break;
            case self::GREENCARD_ID:
                $name = 'Зеленая карта';
                break;
            case self::MOTOKASKO_ID:
                $name = 'Мото КАСКО';
                break;
            case self::TOURISM_ID:
                $name = 'Туризм';
                break;
            default:
                $name = 'Продукт';
        }
        return $name;
    }
}
