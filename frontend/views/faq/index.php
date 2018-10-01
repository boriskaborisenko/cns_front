<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use frontend\helpers\HtmlCns;
use frontend\widgets\WSeoText;

$this->title = 'Все об '.$product->info->name;
$h1 = ( (Yii::$app->page->isPage()) ? Yii::$app->page->getPageInfo('h1') : $product->info->name );
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
    'content' => $product->info->name.' - Центр Народного страхования'
],'og_title');
$this->registerMetaTag([
    'property' => 'og:description',
    'content' => 'Все об '.$product->info->name
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
                    'title' => $product->info->name,
                    'active' => 1
                ]
            ]); ?>
            <div>
                <h1 class="b-page__title b-page__title--left"><?= $h1 ?></h1>
                <a href="/<?= $product->alias ?>/calculator" id="gtm-btn-calc-osago-onl" class="btn b-hero__btn waves-effect waves-light right">Калькулятор <?= $product->info->name ?></a>
            </div>
            <div class="row">
                <div class="col s12 l12">
                    <?php $seo = WSeoText::widget(); 
                        if($seo):
                            echo $seo;    
                        else: 
                    ?>
                        <?php
                        /*foreach ($product->faqs as $faq): ?>
                            <div class="b-about__line">
                                <i class="material-icons small b-about__icon">live_help</i>
                                <span class="b-about__title"><?= $faq->info->title ?></span>
                                <?= $faq->info->text ?>
                            </div>
                        <?php endforeach;*/ ?>
                    <?php endif; ?>
                </div>
            </div><!--/row-->
            <span class='st_facebook_large' displayText='Facebook'></span>
            <span class='st_vkontakte_large' displayText='Vkontakte'></span>
            <span class='st_twitter_large' displayText='Tweet'></span>
        </section>
        <!--/section main content end-->
    </main>