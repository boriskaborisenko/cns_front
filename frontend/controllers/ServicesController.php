<?php

namespace frontend\controllers;

use Yii;
use common\models\Docs;
use common\models\Services;
use common\models\DocsCategories;
use yii\helpers\ArrayHelper;
use yii\web\HttpException;

class ServicesController extends \frontend\components\BaseController
{
    public function actionIndex()
    {
        return $this->redirect("/services/auto", 301);
    }
    
    public function actionCategory($alias)
    {
        $category = Services::find()->byAlias($alias)->joinWith([
            'info',
            'products' => function(\yii\db\ActiveQuery $query) {
                $query->joinWith('info')->active();
            }
        ])->one();
        if ($category) {
            $service = DocsCategories::find()->joinWith('docs')->byAlias($alias)->one();
             
            return $this->render('category',[
                'category' => $category,
                'categories' => Services::find()->joinWith('info')->byParentId('-1')->all(),
                'how_we_choose_companies' => Docs::find()->joinWith('info')->byAlias('how-we-choose-companies')->one(),
                'three_myths' => Docs::find()->joinWith('info')->byAlias('3-myths')->one(),
                'custom_fields' => \yii\helpers\ArrayHelper::index($service->docs,'alias')
            ]);
        } else {
            throw new HttpException(404);
        } 
    }
}
