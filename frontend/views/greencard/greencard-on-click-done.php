<?php

use frontend\helpers\HtmlCns;
use yii\helpers\Url;

$this->registerMetaTag([
    'name' => 'robots',
    'content' => 'noindex, nofollow'
]);
$this->title = 'Готово - ОСАГО';
?>
    <main class="b-page">

        <!--section main content start-->
        <section class="container">
            <h1 class="b-page__title">Готово!</h1>
            <?= HtmlCns::calcSteps([
                [
                    'title' => Yii::t('app','Main'),
                    'href' => "/",
                ],
                [
                    'title' => 'Зеленая Карта',
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
                    'active' => true
                ],
                [
                    'title' => 'Готово',
                ]
            ]); ?>
        </section>
        <!--/section main content end-->

        <section class="b-page__section">
            <div class="container">
                <h2 class="b-page__subtitle">
                    <span class="g-brand-color"><i class="material-icons">thumb_up</i></span>
                    Cпасибо за заказ!
                </h2>
                <div class="row">
                    <!--left-->
                    <div class="col s12 m12 l6">
                        <p>
                            Номер вашего заказа: <b><?= $order['order_id'] ?></b>.
                            <br />
                            Мы свяжемся с Вами по телефону, который Вы указали: <strong><?= $order['phone'] ?></strong>
                        </p>
                        <!--p>
                            Посмотреть детали вашего заказа можно в <a href="#">личном кабинете</a>
                        </p-->
                        <!--p>&nbsp;</p>
                        <a href="#!" class="btn btn-large waves-effect waves-light">Купить полис КАСКО</a>
                        <p>&nbsp;</p-->
                    </div>
                    <!--left-->

                    <!--right-->
                    <aside class="col s12 m12 l6">
                        <div class="card-panel blue-grey lighten-5">
                            <div class="row">
                                <div class="col s12 m4 l3">
                                    <img src="/images/companies/<?= $order['company_id'] ?>.1.b.jpg" class="responsive-img" alt="Logo" />
                                </div>
                                <div class="col s12 m8 l9">
                                    <span class="b-page__subtitle">
                                        Спасибо что стали нашим клиентом!
                                    </span>
                                </div>
                            </div>
                            <p>
                                Мы сделаем все возможное чтобы оправдать ваше доверие.
                            </p>
                            <!--p>
                                <a href="#">Застраховать имущество</a>
                                <br />
                                <a href="#">Застраховаться от несчастных случаев в отпуске</a>
                            </p>
                            <button type="button" class="btn light-green waves-effect waves-light">Отправить предложение на почту</button-->
                        </div>
                    </aside>
                    <!--/right-->
                </div>
            </div>
        </section>

    </main>
