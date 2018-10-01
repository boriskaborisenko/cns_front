<?php

use frontend\helpers\HtmlCns;
use yii\helpers\Url;

$this->registerMetaTag([
    'name' => 'robots',
    'content' => 'noindex, nofollow'
]);
$this->title = 'Отмена - Зеленая Карта';
?>
    <main class="b-page">

        <!--section main content start-->
        <section class="container">
            <h1 class="b-page__title">Отмена оплаты Online</h1>
            <?= HtmlCns::calcSteps([
                [
                    'title' => Yii::t('app','Main'),
                    'href' => "/",
                ],
                [
                    'title' => 'Зеленая карта',
                    'href' => "/green-card",
                ],
                [
                    'title' => 'Калькулятор Зеленой Карты',
                    'href' => Yii::$app->links->mainMenuLink(4),
                ],
                [
                    'title' => 'Выбор тарифа',
                    'href' => Yii::$app->links->mainMenuLink(4),
                ],
                [
                    'title' => 'Оформление',
                    'href' => "/green-card/form",
                ],
                [
                    'title' => 'Отмена оплаты Online',
                    'active' => true
                ]
            ]); ?>            
        </section>
        <!--/section main content end-->

        <section class="b-page__section">
            <div class="container">
                <h2 class="b-page__subtitle">
                    <span class="g-brand-color"><i class="material-icons">error_outline</i></span>
                    <?= $order['name'] ?>, ваш заказ не завершен.
                </h2>
                <div class="row">
                    <!--left-->
                    <div class="col s12 m12 l6">
                        <p>
                            Заказ не завершен либо по причине отмены полаты on-line, либо произошла ошибка. Свяжитесь с нами.<br/>
                            Благодарим Вас за проявленный интерес к нашему сервису!
                        </p>
                        <p>
                            Номер вашего заказа: <b><?= $order['order_id'] ?></b>.
                        </p>
                        <p>
                            Возможны, вы хотите оплатить полис наличными при получении?
                        </p>
                        <form action="/greencard/buy-after-cancel-online-pay" method="POST">
                            <?= \yii\helpers\Html::input('text', '_csrf', \Yii::$app->request->getCsrfToken(), ['hidden' => '']) ?>
                            <button type="submit" class="btn btn-large waves-effect waves-light">Оформить с оплатой наличными при получении »</button>
                        </form>
                    </div>
                    <!--left-->
                </div>
            </div>
        </section>

        <!--special proposition section start-->
        <div class="b-page__section b-page__section--alt b-prop">
            <div class="container">
                <span class="b-page__subtitle">Специальные предложения от страховых компаний</span>
                <ul class="b-prop__list">
                    <li class="b-prop__item">
                        <a href="#!" class="b-prop__link">
                            <figure class="b-prop__inner b-prop__inner--alt">
                                <header class="b-prop__company">
                                    <img src="img/company/logo01.png" class="b-prop__logo" alt="Company" />
                                </header>
                                <div class="b-prop__thumb">
                                    <img src="http://placehold.it/272x100" class="b-prop__img" alt="Proposition" />
                                </div>
                                <figcaption class="b-prop__content" data-match-height>
                                    <span class="b-prop__title">ОСАГО</span>
                                    <p class="b-prop__subtitle">
                                        10 литров бензина<br />
                                        в подарок
                                    </p>
                                    <span class="btn btn-large waves-effect waves-light b-prop__btn">Рассчитать онлайн</span>
                                </figcaption>
                            </figure>
                        </a>
                    </li>
                    <li class="b-prop__item">
                        <a href="#!" class="b-prop__link">
                            <figure class="b-prop__inner">
                                <header class="b-prop__company">
                                    <img src="img/company/logo02.png" class="b-prop__logo" alt="Company" />
                                </header>
                                <div class="b-prop__thumb">
                                    <img src="http://placehold.it/272x100" class="b-prop__img" alt="Proposition" />
                                </div>
                                <figcaption class="b-prop__content" data-match-height>
                                    <span class="b-prop__title">Зеленая карта +<br />имущество</span>
                                    <p>
                                        Страхователь самостоятельно определяет перечень объектов, которые будут застрахованы по договору...
                                    </p>
                                    <span class="b-prop__arrow"><i class="icon-right"></i></span>
                                </figcaption>
                            </figure>
                        </a>
                    </li>
                    <li class="b-prop__item">
                        <a href="#!" class="b-prop__link">
                            <figure class="b-prop__inner">
                                <header class="b-prop__company">
                                    <img src="img/company/logo03.png" class="b-prop__logo" alt="Company" />
                                </header>
                                <div class="b-prop__thumb">
                                    <img src="http://placehold.it/272x100" class="b-prop__img" alt="Proposition" />
                                </div>
                                <figcaption class="b-prop__content" data-match-height>
                                    <span class="b-prop__title">Медицинское<br />страхование</span>
                                    <p>
                                        За найпростішою програмою «Екстрена» буде забезпечено оперативне прибуття бригади лікарів приватної швидкої...
                                    </p>
                                    <span class="b-prop__arrow"><i class="icon-right"></i></span>
                                </figcaption>
                            </figure>
                        </a>
                    </li>
                    <li class="b-prop__item">
                        <a href="#!" class="b-prop__link">
                            <figure class="b-prop__inner">
                                <header class="b-prop__company">
                                    <img src="img/company/logo04.png" class="b-prop__logo" alt="Company" />
                                </header>
                                <div class="b-prop__thumb">
                                    <img src="http://placehold.it/272x100" class="b-prop__img" alt="Proposition" />
                                </div>
                                <figcaption class="b-prop__content" data-match-height>
                                    <span class="b-prop__title">Страхование<br />недвижимости</span>
                                    <p>
                                        Страхователь самостоятельно определяет перечень объектов, которые будут застрахованы по договору...
                                    </p>
                                    <span class="b-prop__arrow"><i class="icon-right"></i></span>
                                </figcaption>
                            </figure>
                        </a>
                    </li>
                </ul>
                <div class="center">
                    <a href="#!" class="b-more">
                        Все предложения <span class="b-more__icon"><i class="icon-right"></i></span>
                    </a>
                </div>
            </div>
        </div>
        <!--/special proposition section end-->
    </main>