<?php
namespace frontend\components;
  
use Yii;
use yii\base\Component;
use common\models\Seo;

class Page extends Component
{
    private $page;
    
    public function __construct()
    {
        $page = Seo::find()
                ->where(['alias' => '/'.trim(Yii::$app->request->pathInfo,'/').'/'])
                ->joinWith(['info'])
                ->one();
        if ($page) {
            $this->page = $page;
        }
    }
    
    public function getData()
    {
        if (!empty($this->page)) {
            return $this->page;
        }
        return false;
    }
    
    public function isPage()
    {
        if (!empty($this->page)) {
            return true;
        }
        return false;
    }
    
    public function getGet()
    {
        if (!empty($this->page)) {
            return $this->page;
        }
        return false;
    }
    
    public function getPage($property)
    {
        if (!empty($this->page)) {
            return $this->page->$property;
        }
        return false;
    }
    
    public function getPageInfo($property)
    {
        if (!empty($this->page->info)) {
            return trim($this->page->info->$property,' ');
        }
        return false;
    }
    
    public function getSeoText()
    {
        if (!empty($this->page) && !empty($this->page->info->text)) {
            return $this->page->info->text;
        }
        return false;
    }
}