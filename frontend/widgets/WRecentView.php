<?php
namespace frontend\widgets;
use common\models\ViewLid;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Widget;

class WRecentView extends Widget
{	
    public function init(){
        parent::init();
    }

    public function run() {
        $cookies = \Yii::$app->request->cookies;
        if (($cookie = $cookies->get('recent_view')) !== null) {
            $data = unserialize($cookie->value);
            $keys = array_keys($data);
            $lids = ViewLid::find()->where(['id'=>$keys])->andWhere(['not in','product',[1,3]])->asArray()->all();
            if ($lids) {
                foreach ($lids as &$element) {
                    $element['price'] = $data[$element['id']]['min_price'];
                    $element['product_id'] = $data[$element['id']];
                }
                return $this->render('recent_view/view', [
                    'lids' => $lids,
                ]);
            } else {
                return false;
            }
        } else {
            return false;
        }	
    }
}