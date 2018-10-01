<?php

use frontend\helpers\HtmlCns;
use yii\helpers\Url;

$this->registerMetaTag([
    'name' => 'robots',
    'content' => 'noindex, nofollow'
]);
$this->title = 'Оплата LiqPay - Туризм';
?>
    <main class="b-page">

        <!--section main content start-->
        <section class="container">
            <h1 class="b-page__title">Оплата LiqPay</h1>
            <?= HtmlCns::calcSteps([
                [
                    'title' => Yii::t('app','Main'),
                    'href' => "/",
                ],
                [
                    'title' => 'Туризм',
                    'href' => "/tourism",
                ],
                [
                    'title' => 'Калькулятор Туризма',
                    'href' => "/tourism/calculator",
                ],
                [
                    'title' => 'Выбор тарифа',
                    'href' => "/tourism/calculator",
                ],
                [
                    'title' => 'Оформление',
                    'active' => "/tourism/form",
                ],
                [
                    'title' => 'Оплата LiqPay',
                    'active' => true
                ]
            ]); ?>            
        </section>
        <!--/section main content end-->

        <section class="b-page__section">
            <div class="container">
                <h2 class="b-page__subtitle">
                    <span class="g-brand-color"><i class="material-icons">thumb_up</i></span>
                    <?= $order['name'] ?>, спасибо за заказ!
                </h2>
                <div class="row">
                    <!--left-->
                    <div class="col s12 m12 l6">
                        <p>
                            Номер вашего заказа: <b><?= $order['order_id'] ?></b>.
                        </p>
                        <?= \Yii::$app->liqpay->getForm($order['price'], "Покупка Туризм у компании ЦНС, номер заказа №{$order['order_id']} ", $order['order_id']); ?>
                    </div>
                    <!--left-->
                </div>
            </div>
        </section>

       
    </main>