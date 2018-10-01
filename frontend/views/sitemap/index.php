<?php

use yii\helpers\Url;
use yii\helpers\Html;
use frontend\helpers\HtmlCns;

$this->title = Yii::t('app', 'Sitemap');
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
    'content' => 'Карта сайта - Центр Народного страхования'
],'og_title');
$this->registerMetaTag([
    'property' => 'og:description',
    'content' => "Все разделы сайта ЦНС" 
],'og_description');
$this->registerMetaTag([
    'property' => 'og:image',
    'content' => trim(Url::to(['/'],true),'/')."/img/slider/slider1.jpg"
],'og_image');
?>
    <main class="b-page">
        <!--section main content start-->
        <div class="container">
            <div class="row">
                <article class="col s12 l12">
                    <?= HtmlCns::breadcrumbs([
                        [
                            'title' => Yii::t('app','Sitemap'),
                            'active' => 1
                        ],
                    ]); ?>
                    <h1 class="b-page__title"><?= Yii::t('app', 'Sitemap'); ?></h1>
                    <ul>
                        <li>
                            <a href="<?= Url::to(['/']) ?>"><?= Yii::t('app', 'Main'); ?></a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/about']) ?>"><?= Yii::t('app', 'About'); ?></a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/for-business']) ?>"><?= Yii::t('app', 'For business'); ?></a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/insurance_companies']) ?>"><?= Yii::t('app', 'Insurance companies'); ?></a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/stocks']) ?>">Специальные предложения</a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/services/auto']) ?>"><?= Yii::t('app', 'Auto Insurance'); ?></a>
                            <ul>
                                <li>
                                    <a href="<?= Url::to(['/osago']) ?>"><?= Yii::t('app', 'OSAGO'); ?></a>
                                    <ul>
                                        <li>
                                            <a href="<?= Url::to(['/osago/calculator']) ?>">Калькулятор <?= Yii::t('app', 'OSAGO'); ?></a>
                                        </li>
                                        <?php
                                        foreach ($osagolinks as $link) { ?>
                                        <li>
                                            <a href="<?= Url::to([$link->alias]) ?>"><?= $link->info->h1 ?></a>
                                        </li>
                                        <?php
                                        } ?>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['/kasko']) ?>"><?= Yii::t('app', 'KASKO'); ?></a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['/moto-kasko/calculator']) ?>">Калькулятор Мото-КАСКО</a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['/green-card']) ?>"><?= Yii::t('app', 'Greencard'); ?></a>
                                    <ul>
                                        <li>
                                            <a href="<?= Url::to(['/green-card/calculator']) ?>">Калькулятор <?= Yii::t('app', 'Greencard'); ?></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/services/health']) ?>"><?= Yii::t('app', 'Health Insurance'); ?></a>
                            <ul>
                                <li>
                                    <a href="<?= Url::to(['/tourism']) ?>"><?= Yii::t('app', 'Tourism'); ?></a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['/tourism/calculator']) ?>">Калькулятор <?= Yii::t('app', 'Tourism'); ?></a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['/health']) ?>"><?= Yii::t('app', 'Med Insurance'); ?></a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['/accident']) ?>"><?= Yii::t('app', 'Accident'); ?></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/services/property']) ?>"><?= Yii::t('app', 'Property Insurance'); ?></a>
                            <ul>
                                <li>
                                    <a href="<?= Url::to(['/apartment']) ?>"><?= Yii::t('app', 'Appartment'); ?></a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['/house']) ?>"><?= Yii::t('app', 'House'); ?></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/services/responsibility']) ?>"><?= Yii::t('app', 'Responsibility Insurance'); ?></a>
                            <ul>
                                <li>
                                    <a href="<?= Url::to(['/neighbors']) ?>">Перед соседями</a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['/professional']) ?>">Профессиональная</a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['/weapon']) ?>">Владельца оружия</a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['/dog']) ?>">Владельцев собак</a>
                                </li>
                            </ul>
                        </li>
                        <?php
                        foreach ($categories as $cat) {
                            $list="";
                            foreach ($cat->posts as $post) {
                                $list .= Html::tag('li',
                                        Html::a($post->info->title,  
                                        Url::to(['/post/'.$cat->alias.'/'.$post->alias]))
                                        );
                            }
                            echo Html::tag('li',
                                    Html::a($cat->info->title,$cat->url).
                                    Html::tag('ul',$list)
                            );
                        } ?>
                    </ul>
                </article>
            </div>
        </div>
        <!--/section main content end-->
        
        
    </main>
