<?php

use frontend\helpers\HtmlCns;
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\widgets\WAdditionalMenu;
use frontend\widgets\WSeoText;

$this->title = 'Наши клиенты - ЦНС';
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
    'content' => 'Наши клиенты - Центр Народного страхования'
],'og_title');
$this->registerMetaTag([
    'property' => 'og:description',
    'content' => 'Наши клиенты'
],'og_description');
$this->registerMetaTag([
    'property' => 'og:image',
    'content' => trim(Url::to(['/'],true),'/')."/img/slider/slider1.jpg"
],'og_image');

?>

<main class="b-page">

    <!--section main content start-->
    <section class="container">
        <h1 class="b-page__title">Наши клиенты</h1>
        <!--breadcrumbs start-->
            <?= HtmlCns::breadcrumbs([
                [
                    'title' => 'Наши клиенты',
                    'active' => 1
                ]
            ]); ?>
        <!--/breadcrumbs end-->

        <!--client's list-->
        <div class="b-client">
            <ul class="b-client__list">
                <?php foreach ($clients as $client): ?>
                    <li class="b-client__item">
                        <figure class="b-client__inner">
                            <a href="<?php echo $client->link; ?>" class="b-client__link" rel="nofollow" target="_blank">
                                <?php echo $client->getThumb(['class' => "b-client__logo", 'alt' => $client->info->name], 's'); ?>
                            </a>
                            <figcaption class="b-client__name">
                                <?php echo $client->info->name; ?>
                            </figcaption>
                        </figure>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <!--/client's list-->
    </section>
    <!--/section main content end-->

    <!--seo block-->
    <div class="b-page__section b-page__section--alt">
        <article class="container">
            <?php echo WSeoText::widget(); ?>
        </article>
    </div>
    <!--/seo block-->

    <?php echo WAdditionalMenu::widget(); ?>
</main>