<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\widgets\WSearchForm;
?>
    <header class="b-header navbar-fixed">
        <nav>
            <div class="container">
                <div class="nav-wrapper">
                    <!--Logo start-->
                    <a href="<?= Url::to('/') ?>" class="b-logo">
                        <span class="b-logo__img">
                        </span>
                        <span class="b-logo__title">Центр страхования</span>
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
                            <a href="#" class="b-menu__userlink">
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
