<?php

namespace frontend\controllers;

use yii\web\HttpException;
use common\models\Companies;

class CompanyController extends \frontend\components\BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView($id)
    {
        $company = Companies::find()->active()->joinWith('info')->byId($id)->one();
        if (!$company) {
            throw new HttpException(404);
        }

        return $this->render('view', [
            'company' => $company,
        ]);
    }

    public function actionList()
    {
        $companies = Companies::find()->active()->joinWith('info')->all();
        $max_rating = Companies::find()->active()->max('rating');
//        echo '<pre>';
//        print_r($company);exit;
        if (!$companies) {
            throw new HttpException(404);
        }

        return $this->render('list', [
            'companies' => $companies,
            'max_rating' => $max_rating,
        ]);
    }
}
