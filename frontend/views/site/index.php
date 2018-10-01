<?php

use frontend\widgets\WRecentView;
use frontend\widgets\WCallback;
use frontend\widgets\WStocks;
use frontend\widgets\WPublications;
use frontend\widgets\WAdditionalMenu;
use yii\helpers\Url;

$this->title = 'Главная - ЦНС';
$this->registerMetaTag([
    'property' => 'og:type',
    'content' => "website"
],'og_type');
$this->registerMetaTag([
    'property' => 'og:url',
    'content' => Yii::$app->request->getAbsoluteUrl()
],'og_url');
$this->registerMetaTag([
    'property' => 'og:title',
    'content' => 'Центр Народного страхования'
],'og_title');
$this->registerMetaTag([
    'property' => 'og:description',
    'content' => 'Специальные предложения от страховых компаний'
],'og_description');
$this->registerMetaTag([
    'property' => 'og:image',
    'content' => trim(Url::to(['/'],true),'/')."/img/slider/slider1.jpg"
],'og_image');
?>
<main class="b-page">  
    <?php
    $recent_view = WRecentView::widget();
    if ($recent_view) {
        echo $recent_view;
    } else {
        echo WStocks::widget([
            'sectionClass' => 'b-history'
        ]);
    } ?>

    <?=WCallback::widget()?>
    
    <?php
    if ($recent_view) {
        echo WStocks::widget();  
    } ?>

    <?php echo WAdditionalMenu::widget(); ?>

    <hr/>
    
    <?php
        echo WPublications::widget([
            'alias' => 'publications'
        ]); 
    ?>
            </div>
        </div>
    </div>
</main>

<!--modal window video start-->
<div id="videomodal" class="modal">
    <div class="modal-content">
        <div class="video-container">
            <iframe width="560" height="315" src="img/review/review01.jpg"></iframe>
        </div>
    </div>
</div>
<!--modal window callback start-->