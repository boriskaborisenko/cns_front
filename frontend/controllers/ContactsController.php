<?php

namespace frontend\controllers;

use common\models\DocsCategories;
use yii\web\HttpException;

class ContactsController extends \frontend\components\BaseController
{
    public function actionIndex()
    {
        $contacts = DocsCategories::find()->joinWith('info')->byAlias('contacts-test')->one();
        if ($contacts) {
            return $this->render('index',[
                'contacts' => $contacts,
                'cities' => $contacts->children
            ]);    
        } else {
            throw new HttpException(404);
        } 
        
    }
}
