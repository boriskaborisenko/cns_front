<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\widgets\WSearchForm;
?>
    <header class="b-header b-header--hero navbar-fixed js-header">
        <nav>
            <div class="container">
                <div class="nav-wrapper">
                    <!--Logo start-->
                    <a href="<?= Url::to('/') ?>" class="b-logo">
                        <span class="b-logo__img">
                            <!--svg height="100%" width="100%" version="1.1" y="0" x="0" viewBox="0 0 78.708664 98.000002" style="max-width: 80px;">
                                <g transform="matrix(1.5433 0 0 1.5433 -95.531 -61.887)">
                                    <g>
                                        <path fill="#f68b1f" d="m87.4 40.1c-14.1 0-25.5 11.4-25.5 25.5 0 13.7 23.2 36.5 24.1 37.4 0.4 0.4 0.9 0.6 1.4 0.6s1-0.2 1.4-0.6c1-1 24.1-23.8 24.1-37.4 0-14-11.4-25.5-25.5-25.5z" />
                                        <path fill="#fff" d="m89.2 66.5h12.6c0-7.9-6.4-14.3-14.3-14.3s-14.3 6.4-14.3 14.3h13.2v8.7 0.1 0.1c0 1-0.8 1.8-1.8 1.8s-1.8-0.8-1.8-1.8c0-0.8-0.6-1.4-1.4-1.4s-1.4 0.6-1.4 1.4c0 2.6 2.1 4.6 4.6 4.6 2.6 0 4.6-2.1 4.6-4.6v-0.1-0.1-8.7z" />
		                            </g>
	                            </g>
                            </svg-->
                        </span>
                        <span class="b-logo__title">
                             Центр страхованияxxx
                        </span>
                    </a>
                    <!--/Logo end-->

                    <!--Mobile buttons start-->
                    <button type="button" data-activates="mobile-menu" class="button-collapse b-header__btn">
                        <i class="material-icons">menu</i>
                    </button>
                    <button type="button" class="b-header__btn modal-trigger" data-target="callback">
                        <i class="material-icons">phone</i>
                    </button>
                    <button type="button" class="b-header__btn" data-searchform>
                        <i class="material-icons">search</i>
                    </button>
                    <!--/Mobile buttons end-->

                    <!--Left desktop menu start-->
                    <?php
                    $this->beginContent('@frontend/views/layouts/layout-parts/main-menu.php'); $this->endContent();
                    ?>
                    <!--/Left desktop menu end-->

                    <!--Right desktop menu start-->
                    <ul class="b-menu b-menu--right">
                        <li class="b-menu__item">
                            <a href="#" data-searchform>
                                <i class="icon-search"></i>
                            </a>
                        </li>
                        <!--li class="b-menu__item">
                            <a href="#!" class="b-menu__userlink">
                               <span class="b-menu__user">
                                   <i class="icon-user"></i>
                               </span>
                            </a>
                        </li>
                        <li class="b-menu__item">
                            <a href="#!" class="dropdown-button" data-activates="lang" data-constrainwidth="false" data-alignment="right">
                                рус
                                <span class="icon-triangle-down"></span>
                            </a>
                        </li-->
                    </ul>
                    <!--/Right desktop menu end-->
                </div>
            </div>
            
            <!--Lang menu start>
            <ul id="lang" class="dropdown-content">
                <li><a href="#" hreflang="ru">Русский</a></li>
                <li><a href="#" hreflang="uk">Украинский</a></li>
            </ul>
            </Lang menu end-->

            <!--Mobile menu start-->
            <ul class="side-nav" id="mobile-menu">
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li>
                            <a class="collapsible-header">Все услуги<i class="mdi-navigation-arrow-drop-down right"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="/services/auto">Автомобили</a></li>
                                    <li><a href="/services/health">Здоровье</a></li>
                                    <li><a href="/services/property">Недвижимость</a></li>
                                    <li><a href="/services/responsibility">Ответственность</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
<!--                <li><a href="#!">Отзывы</a></li>-->
                <li><?= Html::a('Для бизнеса', '/for-business/')?></li>
                <li><a href="/about">О нас</a></li>
                <li><a href="/contacts">Контакты</a></li>
                <!--li class="divider"></li>
                <li><a href="#!">Войти...</a></li-->
            </ul>
            <!--/Mobile menu end-->
        </nav>

        <?= WSearchForm::widget(); ?>
    </header>
 
    <div class="g-wrap">
        <!--hero slider start-->
        <div class="b-hero">
            <div class="b-hero__inner">
                <ul class="b-hero__slider js-hero">
                    <li class="b-hero__item">
                        <div class="b-hero__img" style="background-image:url(img/slider/slider1.jpg)"></div>
                        <div class="b-hero__inner">
                            <div class="b-hero__content">
                                <div class="b-hero__caption js-hero-caption">
                                    &mdash; Мама, не волнуйся,
                                    <br />
                                    &emsp;я застрахован
                                </div>
                            </div>
                        </div>
                        <div class="b-hero__main">
                            <div class="b-hero__content">
                                <div class="left">
                                    <span class="b-hero__title">ОСАГО</span>
                                    <a href="<?php echo Yii::$app->links->mainMenuLink(2); ?>" id="gtm-btn-main-calc-onl" class="btn b-hero__btn waves-effect waves-light">Рассчитать онлайн</a>
                                </div>
                                <div class="right">
                                    <div class="b-phone">
                                        <a href="tel:+0800758758" class="b-phone__link">
                                            <span class="b-phone__num">0 800-758-758</span>
                                        </a>
                                        <div class="b-phone__content">
                                            <span class="b-phone__icon">24/7</span>
                                            бесплатно<br />
                                            по Украине
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </li>
                    <li class="b-hero__item">
                        <div class="b-hero__img" style="background-image:url(img/slider/slider3.jpg)"></div>
                        <div class="b-hero__inner">
                            <div class="b-hero__content">
                                <div class="b-hero__caption b-hero__caption--left js-hero-caption" style="color:#000">
                                    &mdash; Папа, не волнуйся,
                                    <br />
                                    &emsp;я застрахована
                                </div>
                            </div>
                        </div>
                        <div class="b-hero__main">
                            <div class="b-hero__content">
                                <div class="left">
                                    <span class="b-hero__title">Зеленая карта</span>
                                    <a href="<?php echo Yii::$app->links->mainMenuLink(4); ?>" class="btn b-hero__btn waves-effect waves-light">Рассчитать онлайн</a>
                                </div>
                                <div class="right">
                                    <div class="b-phone">
                                        <a href="tel:+0800758758" class="b-phone__link">
                                            <span class="b-phone__num">0 800-758-758</span>
                                        </a>
                                        <div class="b-phone__content">
                                            <span class="b-phone__icon">24/7</span>
                                            бесплатно<br />
                                            по Украине
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </li>
                </ul>

                
                

                <div class="b-hero__pager">
                    <div class="b-hero__content">
                        <div class="b-hero__nav js-hero-nav">
                            <a href="#" class="b-hero__dot" data-slide-index="0"></a>
                            <a href="#" class="b-hero__dot" data-slide-index="1"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/hero slider end-->
