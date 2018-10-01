<?php
use yii\helpers\Url;
use yii\helpers\Html;
use frontend\helpers\HtmlCns;
use frontend\widgets\WFaq;
use frontend\widgets\WCallback;

if (Yii::$app->request->get('q',false)) { 
    $this->registerMetaTag([
        'name' => 'robots',
        'content' => 'noindex, follow'
    ]);
}
$this->registerLinkTag(['rel' => 'canonical', 'href' => Url::to([Yii::$app->request->getPathInfo()],true)]);
$this->title = 'ОСАГО - ЦНС';

if (Yii::$app->request->get('ctle',false)) {
    $h1 = urldecode(Yii::$app->request->get('ctle'));
} elseif (Yii::$app->page->isPage()) {
    $h1 = Yii::$app->page->getPageInfo('h1');
} else {
    $h1 = 'Калькулятор ОСАГО Онлайн';
}

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
    'content' => 'Калькулятор ОСАГО - Центр Народного страхования'
],'og_title');
$this->registerMetaTag([
    'property' => 'og:description',
    'content' => 'ОСАГО - все актуальные предложения'
],'og_description');
$this->registerMetaTag([
    'property' => 'og:image',
    'content' => trim(Url::to(['/'],true),'/')."/img/slider/slider1.jpg"
],'og_image');
?>
    <main class="b-page">

        
        <!--section main content start-->
        <header class="container">
            <h1 class="b-page__title b-page__title--calc"><?= $h1 ?></h1>
            <div class="b-page__oneClickOsago">
                <!--<a class="modal-trigger" data-target="callback" href="#!"><i class="material-icons">call</i> Оформить в один клик</a>-->
                <a style="cursor:pointer" type="button" class="modal-trigger" data-target="callback"><i class="material-icons">call</i> Оформить в один клик</a>
            </div>
        </header>
        <!--/section main content end-->
        
        <?= frontend\widgets\shortcodes\WOsagoCalculator::widget(); ?>

        <?= WFaq::widget([
            'product_alias' => 'osago'
        ]) ?>
        
        <?php $seo = \frontend\widgets\WSeoText::widget(); ?>
        <?php if($seo): ?>
            <!--seo block-->
            <section class="b-page__section b-page__section--alt">
                <div class="container">
                    <?php echo $seo; ?>
                </div>
            </section>
            <!--/seo block-->
        <?php endif; ?>
        
        <section class="b-page__section">
            <div class="container">
            <?=  \frontend\widgets\shortcodes\WOsagoLinks::widget()?>
            </div>
        </section>
        <?=WCallback::widget()?>       
    </main>