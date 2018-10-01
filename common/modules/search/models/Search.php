<?php

namespace common\modules\search\models;

use Yii; 
use common\models\Seo;

class Search extends \yii\base\Model
{
    public function __construct()
    {
        parent::__construct();
    }    

    public static function findRecords()
    {
        $s = Yii::$app->request->get('s');
        if(!empty($s)){
            $seoRowsQ = Seo::find()->joinWith([
                'info' => function(\yii\db\ActiveQuery $query) use ($s) {
                    $query->andWhere([
                        'or',
                        ['like','title',$s],
                        ['like','text',$s]
                    ]);
                }
            ]);
            $seoPagi = $seoRowsQ->pagination('id',20);
            $seoPages = $seoRowsQ
                        ->offset($seoPagi->offset)
                        ->limit($seoPagi->limit)
                        ->orderBy('creation_date DESC, id DESC')
                        ->all(); 
            return $seoPages;
        }
        return false;
    }

}

