<?php

namespace frontend\controllers;

use common\models\DocsCategories;
use common\models\Employees;
use yii\helpers\ArrayHelper;

class AboutController extends \frontend\components\BaseController
{
    public function actionIndex()
    {
        $about = DocsCategories::find()->byAlias('about')->joinWith('docs')->one();
        $employees = Employees::find()
                ->joinWith('info')
                ->andWhere(['employees.show_contacts_page' => 1])
                ->orderBy('sort DESC')
                ->all();
        $sections = ArrayHelper::index($about->docs,'alias');
        return $this->render('index',[
            'sections' => $sections,
            'employees' => $employees,
            'about' => $about
        ]);
    }
}
