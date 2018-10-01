<?php
use frontend\helpers\HtmlCns;

$this->title = 'Заказ карточки "Культура паркования" - Заявка сохранена'; 
?>
<main class="b-page">
    <!--section main content start-->
    <section class="container">
        <?= HtmlCns::calcSteps([
                [
                    'title' => Yii::t('app','Main'),
                    'href' => "/",
                ],
                [
                    'title' => 'Культура паркования',
                    'href' => "/povaga",
                ],
                [
                    'title' => 'Заказать',
                    'active' => true
                ]
            ]); ?>
        <h1 class="b-page__title">Спасибо! Заявка сохранена.</h1>
        <div class="row">
            <div class="col s12 l12">
                <div class="g-table-wrap" data-match-height>
                    <table class="bordered b-ch-table">
                        <thead>
                            <tr>
                                <th class="">Ваши данные</th>
                                <th class="center">Стоимость карточки</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="">
                                    <strong>Адрес</strong>: <?= $order->address ?><br />
                                    <strong>Имя</strong>: <?= $order->name ?><br />
                                    <strong>Телефон</strong>: <?= $order->tel ?><br />
                                    <?php if($order->email): ?>
                                        <strong>Email</strong>: <?= $order->email ?><br />
                                    <?php endif; ?>
                                    <?php if($order->osago_want): ?>
                                        <strong>Дата окончания полиса ОСАГО</strong>: <?= $order->osago_expires ?><br />
                                    <?php endif; ?>
                                </td>
                                <td class="center">
                                    <span class="b-ch-table__price"><span class="g-brand-color"><?= $order->price ?> грн</span></span>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <p>
                <?= \Yii::$app->liqpay->getPovagaCardForm($order->price, "Покупка карточки Культура паркования №{$order->id} ", $order->id); ?>
                </p>
            </div>
        </div><!--/row-->
    </section>
    <!--/section main content end-->
</main>
