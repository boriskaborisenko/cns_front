<?php
namespace frontend\widgets;
use yii\bootstrap\Widget;
use Yii;
use common\models\Seo;
use yii\helpers\Html;

class WSeoMeta extends Widget
{	
    public function init(){
        parent::init();
    }

    public function run() {
        if (Yii::$app->response->statusCode == 200) {
            $seo = Seo::find()->byAlias('/'.trim(Yii::$app->request->pathInfo,'/').'/')->one();
            if ($seo) {
                $seo->rewriteMeta();
                $seo->rewriteOg();
            }
        }
        echo Html::tag('title',Html::encode(Yii::$app->view->title));
        echo Html::csrfMetaTags();
    }
}