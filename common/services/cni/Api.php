<?php
namespace common\services\cni;

use yii\base\Component;
use common\models\Companies;
use common\models\CompaniesInfo;

class Api extends Component
{
    private $client;

    private $productsList = [];
    private $companiesList = [];
    private $products = [];

    public function __construct()
    {
        $this->client = new JsonApiClient(\Yii::$app->params['cni.calculator']);
        $this->client->setAuth('user', 'password');
    }
    
    public function getBaseUrl()
    {
        return $this->client->getBaseUrl();
    }
    
    public function setBaseUrl($base_url)
    {
        $this->client->setBaseUrl($base_url);
    }
    
    public function getProducts($new = false)
    {
        if ($new || empty($this->productsList)) {
            $products = $this->client->get('/products');
            $this->productsList = ($products->meta->code == 200) ? $products->data : [];
        }

        return $this->productsList;
    }

    public function getProduct($alias, $new = false)
    {
        if ($new || !array_key_exists($alias, $this->products)) {
            $product = $this->client->get(sprintf('/products/%s', $alias));
            $this->products[$alias] = ($product->meta->code == 200) ? $product->data : [];
        }

        return $this->products[$alias];
    }

    public function calculateProduct($alias, $data)
    {
        $answer = $this->client->post(sprintf('/products/%s', $alias), $data);
        
        return ($answer->meta->code == 200) ? $answer->data : [];
    }

    public function getCompanies($new = false)
    {
        if ($new || empty($this->companiesList)) {
            $companies = $this->client->get('/companies');
            $this->companiesList = ($companies->meta->code == 200) ? $companies->data : [];
        }

        return $this->companiesList;
    }

    public function importCompanies()
    {
        $companies = $this->getCompanies();
        foreach ($companies as $key => $item) {
            $model = new Companies();
            $model->api_id = $key+1;
            $model->alias = $item->alias;
            $model->api_alias = $item->alias;

            $model_info = new CompaniesInfo();
            $model_info->lang = 1;
            $model_info->name = $item->name;
            $model_info->text = $item->description;

            if ($model->validate() && $model->save()) {
                $model_info->link('record', $model);
            }
        }
        return true;
    }
}
