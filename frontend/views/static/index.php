<?php

use frontend\widgets\WCallback;
use frontend\helpers\HtmlCns;
use yii\helpers\Url;

$this->title = $info->title;
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
    'content' => $info->title.' - Центр Народного страхования'
],'og_title');
$this->registerMetaTag([
    'property' => 'og:description',
    'content' => strip_tags($info->text)
],'og_description');
$this->registerMetaTag([
    'property' => 'og:image',
    'content' => trim(Url::to(['/'],true),'/')."/img/slider/slider1.jpg"
],'og_image');
?>
<main class="b-page">

    <!--section main content start-->
    <section class="container b-about">
        <?= HtmlCns::breadcrumbs([
            [
                'title' => $info->h1,
                'active' => 1
            ],
        ]); ?>
        <h1 class="b-page__title"><?=$info->h1?></h1>
        <div class="row">
            <div class="col s12 l12">
                <div class="b-about__line">
                    <?=$info->text?>
                </div>
            </div>
        </div><!--/row-->
    </section>
    <?=WCallback::widget()?> 
</main>
