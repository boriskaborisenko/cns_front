<?php

namespace frontend\controllers;

use common\models\Clients;
//use yii\helpers\ArrayHelper;

class ClientsController extends \frontend\components\BaseController
{
    public function actionIndex()
    {
        $clients = Clients::find()->joinWith('info')->orderBy('clients.sort DESC')->all();
        return $this->render('index',[
            'clients' => $clients,
        ]);
    }
    
    public function actionClient($id)
    {
        return false;
    }
}
