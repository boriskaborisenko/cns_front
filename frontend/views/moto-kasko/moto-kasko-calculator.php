<?php
use yii\helpers\Url;
use yii\helpers\Html;
use frontend\helpers\HtmlCns;
use frontend\assets\motokasko\MotokaskoOffersJsAsset;
use frontend\widgets\WFaq;
use frontend\widgets\WCallback;

MotokaskoOffersJsAsset::register($this);
if (Yii::$app->request->get('q',false)) { 
    $this->registerMetaTag([
        'name' => 'robots',
        'content' => 'noindex, follow'
    ]);
}
$this->registerLinkTag(['rel' => 'canonical', 'href' => Url::to([Yii::$app->request->getPathInfo()],true)]);
$this->title = 'Мото КАСКО - ЦНС';
$h1 = ( (Yii::$app->page->isPage()) ? Yii::$app->page->getPageInfo('h1') : 'Калькулятор Мото КАСКО Онлайн' );
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
    'content' => 'Калькулятор Мото КАСКО - Центр Народного страхования'
],'og_title');
$this->registerMetaTag([
    'property' => 'og:description',
    'content' => 'КАСКО - все актуальные предложения'
],'og_description');
$this->registerMetaTag([
    'property' => 'og:image',
    'content' => trim(Url::to(['/'],true),'/')."/img/slider/slider1.jpg"
],'og_image');
?>
    <main class="b-page">
        <!--section main content start-->
<!--        <section class="container">             
            <h1 class="b-page__title">Страхование ОСАГО <small>(Автогражданка)</small></h1>           -->
<!--            <div class="row">
                <div class="col s12 l9">
                    <p class="b-big-text">Обязательное страхование гражданско-правовой ответственности владельцев наземных транспортных средств.</p>
                    <a href="#!" class="btn waves-effect waves-light">Детальнее »</a>
                    <blockquote>
                        Вводите параметры авто - выбираете тарифы - оформляете - оплачиваете - получаете полис.<br />
                        Всего за 5 минут!
                    </blockquote>
                </div>

                <aside class="col s12 l3 b-service-info">
                    <div class="b-phone b-phone--top">
                        <a href="tel:+0800758758" class="b-phone__link">
                            <i class="icon-phone"></i>
                            <span class="b-phone__num">0 800-758-758</span>
                        </a>
                        <div class="b-phone__content">
                            <span class="b-phone__icon">24/7</span>
                            компетентно<br />
                            и бесплатно<br />
                            по Украине
                        </div>
                    </div>
                </aside>
            </div>-->
        <!--</section>-->
        <!--/section main content end-->
        
        <!--section main content start-->
        <header class="container">
            <h1 class="b-page__title b-page__title--calc"><?= $h1 ?></h1>
            <div class="b-page__oneClickOsago">
                <!--<a class="modal-trigger" data-target="callback" href="#!"><i class="material-icons">call</i> Оформить в один клик</a>-->
                <a style="cursor:pointer" type="button" class="modal-trigger" data-target="callback"><i class="material-icons">call</i> Оформить в один клик</a>
            </div>
            <div class="row">
                <div class="col s12 l12">
                    <div class="b-about__line">
                        <?= Yii::$app->page->getPageInfo('text') ?>
                    </div>
                </div>
            </div>
        </header>
        <!--/section main content end-->
        
        <!--form start-->
        <form id="moto-kasko-offers-form" class="pg-form__wrapper gtm-moto-kasko-form">
            <div style="" class="overlay" id="overlay">
                <div style="" class="loader" id="loader">
                    <div class="preloader-wrapper big active">
                        <div class="spinner-layer spinner-blue-only">
                          <div class="circle-clipper left">
                            <div class="circle"></div>
                          </div><div class="gap-patch">
                            <div class="circle"></div>
                          </div><div class="circle-clipper right">
                            <div class="circle"></div>
                          </div>
                        </div>
                    </div>        
                </div>                
            </div>        
            
            <div class="b-page__section b-page__section--alt b-page__section--compact" >
                <div class="container">
                    <!--ul class="g-action-list">
                        <li>
                            <i class="material-icons">mode_edit</i> Оформить ОСАГО
                        </li>
                        <li>
                            <a href="#!"><i class="material-icons">done_all</i> Продлить</a>
                        </li>
                    </ul-->
<!--                    <ul class="g-action-list pg-display__inline-block">
                        <li>
                            <a style="cursor:pointer" type="button" class="modal-trigger" data-target="callback"><i class="material-icons">call</i> Оформить в один клик</a>
                        </li>
                        li>
                            <a href="#section1"><i class="material-icons">done_all</i> Продлить</a>
                        </li
                    </ul>-->
                    <div class="row">
                        <div class="input-field col s12 m6 l3">
                            <?= HtmlCns::factorSelect($factors['moto_age']) ?>
                        </div>
                        <div class="input-field col s12 m6 l3">
                            <?= HtmlCns::factorSelect($factors['moto_srok_deystviya']) ?>
                        </div>
                        <div class="input-field col s12 m6 l3">
                            <?= HtmlCns::factorMotoMarketPrice() ?>
                            <div class="custom_warning" style="margin:0;font-size: inherit">
                                <span class="custom_warning_text">
                                    <i class="material-icons">error_outline</i> Рыночная стоимость должна быть минимум 60 тыс. грн
                                </span>
                            </div>
                        </div>
                        <div class="input-field col s12 m6 l3">
                            <button type="submit" class="btn waves-effect waves-light">Показать предложения</button>
                        </div>
                    </div>                    
                </div>
<!--                <div class="custom_warning">
                    <strong>
                        <i class="material-icons">error_outline</i>
                        <?php // echo Yii::t('factors', 'vyberite_vash_gorod'); ?>
                    </strong>
                </div>-->
            </div>
        </form>
        <!--/form end-->

        <!--choice table start-->
        <div id="pg-page__offers" class="b-page__section b-page__section--mini scrollspy">           
            <div class="container">
                <!--<p class="hide-on-large-only"><i class="material-icons">info_outline</i> Эту таблицу можно "скроллить"!</p>-->
                <div class="g-table-wrap">
                    <table class="highlight bordered b-ch-table js-sortable">
                        <thead>
                            <tr>
                                <th class="b-ch-table__companyTh">Компания</th>
                                <th class="b-ch-table__trustLevelTh hide-on-small-only center js-sort-col">Уровень доверия<span class="tooltipped" data-position="top" data-tooltip="Шкала показывает как часто наши клиенты выбирают ту или иную страховую компанию"><i class="material-icons">info_outline</i></span></th>
                                <th class="b-ch-table__bonusTh hide-on-small-only center">Бонусы</th>
                                <th class="b-ch-table__franshizaTh center js-sort-col">Франшиза<span class="tooltipped tooltipped--alt" data-position="top" data-tooltip="Сумма, которая не будет возмещаться Страховщиком при выплате страхового возмещения"><i class="material-icons">info_outline</i></span></th>
                                <th class="b-ch-table__paymentTh center js-sort-col">К оплате</th>
                            </tr>
                        </thead>
                        <tbody>     
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/choice table end-->

        <?= WFaq::widget([
            'product_alias' => 'moto-kasko'
        ]) ?>
        
        <!--table section start>
        <section class="b-page__section">
            <div class="container">
                <h3 class="b-page__title">Как мы выбираем страховые</h3>
                <table class="highlight responsive-table">
                    <thead>
                        <tr>
                            <th>Страховые</th>
                            <th><img src="img/company/logo01.png" alt="Company" class="g-table-logo" /></th>
                            <th><img src="img/company/logo02.png" alt="Company" class="g-table-logo" /></th>
                            <th><img src="img/company/logo03.png" alt="Company" class="g-table-logo" /></th>
                            <th><img src="img/company/logo04.png" alt="Company" class="g-table-logo" /></th>
                            <th><img src="img/company/logo05.png" alt="Company" class="g-table-logo" /></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Выплаты на 2015</th>
                            <td>250 млн грн</td>
                            <td>250 млн грн</td>
                            <td>250 млн грн</td>
                            <td>250 млн грн</td>
                            <td>250 млн грн</td>
                        </tr>
                        <tr>
                            <th>Средний срок выплат</th>
                            <td>2-3 дня</td>
                            <td>2-3 дня</td>
                            <td>2-3 дня</td>
                            <td>2-3 дня</td>
                            <td>2-3 дня</td>
                        </tr>
                        <tr>
                            <th>Работает на рынке</th>
                            <td>9 лет</td>
                            <td>9 лет</td>
                            <td>9 лет</td>
                            <td>9 лет</td>
                            <td>9 лет</td>
                        </tr>
                        <tr>
                            <th>Рейтинг отзывов</th>
                            <td><span class="g-brand-color">4.5</span></td>
                            <td><span class="g-brand-color">4.5</span></td>
                            <td><span class="g-brand-color">4.5</span></td>
                            <td><span class="g-brand-color">4.5</span></td>
                            <td><span class="g-brand-color">4.5</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <!--/table section end-->
        <?=WCallback::widget()?>       
    </main>

    <!--modal window video start>
    <div id="videomodal" class="modal">
        <div class="modal-content">
            <div class="video-container">
                <iframe width="560" height="315" src="img/review/review01.jpg"></iframe>
            </div>
        </div>
    </div>
    <!--/modal window video end-->
    
    <!--modal window start-->
    <div id="moto-kasko-price-more-59999" class="modal modal-fixed-footer">
            <div class="modal-content transit-modal-content">
            <h5>Рыночная стоимость должна быть минимум 60 тыс. грн</h5>
            </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close btn-flat ">
                <i class="material-icons">close</i>
            </a>
        </div>
    </div>
    <!--/modal window end-->