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
                            <!--
                            <svg height="100%" width="100%" version="1.1" y="0" x="0" viewBox="0 0 78.708664 98.000002" style="max-width: 80px;">
                                <g transform="matrix(1.5433 0 0 1.5433 -95.531 -61.887)">
                                    <g>
                                        <path fill="#f68b1f" d="m87.4 40.1c-14.1 0-25.5 11.4-25.5 25.5 0 13.7 23.2 36.5 24.1 37.4 0.4 0.4 0.9 0.6 1.4 0.6s1-0.2 1.4-0.6c1-1 24.1-23.8 24.1-37.4 0-14-11.4-25.5-25.5-25.5z" />
                                        <path fill="#fff" d="m89.2 66.5h12.6c0-7.9-6.4-14.3-14.3-14.3s-14.3 6.4-14.3 14.3h13.2v8.7 0.1 0.1c0 1-0.8 1.8-1.8 1.8s-1.8-0.8-1.8-1.8c0-0.8-0.6-1.4-1.4-1.4s-1.4 0.6-1.4 1.4c0 2.6 2.1 4.6 4.6 4.6 2.6 0 4.6-2.1 4.6-4.6v-0.1-0.1-8.7z" />
		                            </g>
	                            </g>
                            </svg>
                            -->
                            <img src="/images/companies/19.1.b.jpg" alt="" class="mainlogo">
                        </span>
                        <span class="b-logo__title">
                        страховой Центр 
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
 
    <div class="clear_header">
        <div id="particles">
				<div id="particles-js"></div>
		</div>
        
        <div class="clear_header_inner">

            <div class="pulsebtn">
                <a  class="pulse-button" href="/osago/calculator">Расчет<br>online</a>
            </div>

            <div class="top_menu">
                <div class="menu_wrap">
                
                    <div class="menu_part inl">
                        <div class="menu_item inl2 tooltip">
                            
                        <span class="tooltiptext">
                            <div class="hidden_menu">
                                <div class="hidden_menu_wrap down-arrow">
                                    <ul>
                                        <li><a href="#">ОСАГО</li>
                                        <li><a href="#">Зеленая карта</li>
                                        <li><a href="#">Каско</li>
                                    </ul>
                                </div>
                            </div>
                        </span>    
                            
                            <a href="/services/auto">
                                <div class="head_menu_icon">
                                    <img src="newicons/car.svg" alt="">
                                </div>
                                <div class="head_menu_text">Автомобиль</div>
                            </a>
                        </div>
                        <div class="menu_item inl2">
                            <a href="/services/health">
                                <div class="head_menu_icon">
                                    <img src="newicons/swimming.svg" alt="">
                                </div>
                                <div class="head_menu_text">Здоровье</div>
                            </a>
                        </div>
                    </div>

                    <div class="menu_part inl">
                    <div class="menu_item inl2">
                            <a href="/services/property">
                                <div class="head_menu_icon">
                                    <img src="newicons/house.svg" alt="">
                                </div>
                                <div class="head_menu_text">Недвижимость</div>
                            </a>
                        </div>
                        <div class="menu_item inl2">
                            <a href="/services/responsibility">
                                <div class="head_menu_icon">
                                    <img src="newicons/hands.svg" alt="">
                                </div>
                                <div class="head_menu_text">Ответственность</div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="/js/particles.js"></script>
    <script src="/js/particles-app.js"></script>