<?php
use yii\helpers\Html;
use frontend\helpers\HtmlCns;
use yii\helpers\Url;
use frontend\assets\tourism\TourismFormJsAsset;

TourismFormJsAsset::register($this);
$this->registerMetaTag([
    'name' => 'robots',
    'content' => 'noindex, nofollow'
]);
$this->title = 'Заказ - Туризм';
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
                    'title' => 'Туризм',
                    'href' => "/tourism",
                ],
                [
                    'title' => 'Калькулятор туризма',
                    'href' => "/tourism/calculator",
                ],
                [
                    'title' => 'Выбор тарифа',
                    'href' => "/tourism/calculator",
                ],
                [
                    'title' => 'Оформление',
                    'active' => true
                ],
                [
                    'title' => 'Готово',
                ]
            ]); ?>
            <h1 class="b-page__title">Страхование Туризм</h1>
            <div class="row">
                <div class="col s12 l9">
                    <div class="g-table-wrap" data-match-height>
                        <table class="bordered b-ch-table">
                            <thead>
                                <tr>
                                    <th class="hide-on-small-only">Условия страхования</th>
                                    <th colspan="2">Страхование</th>
                                    <th class="center">Стоимость</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="hide-on-small-only">
                                        <strong>Компания</strong>: <?php echo $offer_info['company_name']; ?><br />
                                        <strong>Программа</strong>: <?php echo $offer_info['programm']; ?><br />
                                        <strong>Страховая сумма несчастного случая</strong>: <?php echo $offer_info['ns_insurance_sum']; ?><br /><br />
                                        
                                    </td>
                                    <td>
                                        <img src="/images/companies/<?= $offer_info['company_id'] ?>.1.b.jpg" class="b-ch-table__logo" alt="Logo" />
                                    </td>
                                    <td>
                                        <?php // echo $translations['zk_srok_deystviya']['values'][$offer_info['zk_srok_deystviya']] ?>
                                    </td>
                                    <td class="center">
                                        <span class="b-ch-table__price"><span class="g-brand-color"><?= $offer_info['price'] ?> грн</span></span>
                                    </td>
                                </tr>
 
                            </tbody>
                        </table>
                    </div>
                </div>

                <aside class="col s12 l3">
                    <form action="<?= Url::to(["/tourism/buy-on-click"]); ?>" id="tourism-order-form-1-click" method="POST" class="b-ch-table-form hoverable" data-match-height>
                        <span class="b-page__subtitle">Оформить в 1 клик</span>
                        <div class="input-field">
                            <input id="phone1" name="phone" type="tel" maxlength="20" class="js-input-phone" placeholder="Ваш номер телефона" required />
                        </div>
                        <?= Html::input('text', '_csrf', \Yii::$app->request->getCsrfToken(), ['hidden' => '']) ?>
                        <?= Html::input('text', 'product_id', $product->id, ['hidden' => '']) ?>
                        <?= Html::input('text', 'product_name', $product->info->name, ['hidden' => '']) ?>
                        <?= Html::input('text', 'country', $offer_info['country'], ['hidden' => '']) ?>
                        <?= Html::input('text', 'purpose', $offer_info['purpose'], ['hidden' => '']) ?>
                        <?= Html::input('text', 'purpose', $offer_info['purpose'], ['hidden' => '']) ?>
                        <?= Html::input('text', 'insurance_sum', $offer_info['insurance_sum'], ['hidden' => '']) ?>
                        <?= Html::input('text', 'ns_insurance_sum', $offer_info['ns_insurance_sum'], ['hidden' => '']) ?>
                        <?= Html::input('text', 'date_start', $offer_info['date_start'], ['hidden' => '']) ?>
                        <?= Html::input('text', 'date_end', $offer_info['date_end'], ['hidden' => '']) ?>
                        <?= Html::input('text', 'programm', $offer_info['programm'], ['hidden' => '']) ?>
                        <?= Html::input('text', 'price', $offer_info['price'], ['hidden' => '']) ?>
                        <?= Html::input('text', 'company_id', $offer_info['company_id'], ['hidden' => '']) ?>
                        <?= Html::input('text', 'company_name', $offer_info['company_name'], ['hidden' => '']) ?>
                        <?php
                        
                            foreach ($offer_info['ages'] as $age) {
                                echo Html::input('text', 'ages[]', $age, ['hidden' => '']);
                            } 
                        ?> 
                        <div class="right-align">
                            <button type="submit" class="btn waves-effect waves-light">Подтвердить заказ</button>
                        </div>
                    </form>
                </aside>
            </div><!--/row-->
            
        </section>
        <!--/section main content end-->
        <form id="tourism-order-form-oform" method="POST" action="<?= Url::to(["/tourism/buy"]); ?>">
            <section class="b-page__section">
                <div class="container">
                    <div class="row">
                        <div class="col s12 l9">
                            <h2 class="b-page__subtitle">
                                <span class="g-brand-color"><i class="material-icons">account_circle</i></span>&nbsp;Ваши данные
                            </h2>
 
                            <div class="row">
                                <div class="col s12 m6 l4 input-field">
                                    <div class="select-wrapper">
                                        <input type="text" id="surname" class="" name="surname" required>
                                    </div>
                                    <label for="surname">Фамилия*</label>
                                </div>
                                <div class="col s12 m6 l4 input-field">
                                    <div class="select-wrapper">
                                        <input type="text" id="name" class="" name="name" required>
                                    </div>
                                    <label for="name">Имя*</label>
                                </div>
                                <div class="col s12 m6 l4 input-field">
                                    <div class="select-wrapper">
                                        <input type="text" id="father_name" class="" name="father_name">
                                    </div>
                                    <label for="father_name">Отчество</label>
                                </div>
                            </div><!--/row-->
                          
                            <h3 class="b-page__subtitle"><span class="g-brand-color"><i class="material-icons">room</i></span>&nbsp;Доставка полиса</h3>
                            <div class="row">
                                <div class="col s6 m4 l3">
                                    <input class="with-gap" name="delivery_type" value="own_delivery" type="radio" id="test13" checked />
                                    <label for="test13">Самовывоз в Киеве</label>
                                </div>
                                <div class="col s6 m4 l3">
                                    <input class="with-gap" name="delivery_type" value="new_post" type="radio" id="test14" />
                                    <label for="test14">Новой Почтой</label>
                                </div>
                                <div class="col s6 m4 l3">
                                    <input class="with-gap" name="delivery_type" value="courier" type="radio" id="test014" />
                                    <label for="test014">Курьером по Киеву</label>
                                </div>
                            </div><!--/row-->
                            <div class="row">
                                <div class="pg-address__wrap hide">
                                    <div class="col s12 m6 l4 input-field">
                                        <div class="select-wrapper">
                                            <input type="text" id="delivery_city" class="" name="delivery_city" value="<?php echo $city; ?>" >
                                        </div>
                                        <label for="delivery_city">Город</label>
                                    </div>
                                    <!-- Kyiv courier -->
                                    <div class="col s12 m6 l4 input-field">
                                        <div class="select-wrapper">
                                            <input type="text" id="delivery_street" class="" name="delivery_street" >
                                        </div>
                                        <label for="delivery_street">Улица</label>
                                    </div>
                                    <div class="col s12 m4 l2 input-field">
                                        <div class="select-wrapper">
                                            <input type="text" id="delivery_house" class="" name="delivery_house" >
                                        </div>
                                        <label for="delivery_house">Дом</label>
                                    </div>
                                    <div class="col s12 m4 l2 input-field">
                                        <div class="select-wrapper">
                                            <input type="text" id="delivery_apartments" class="" name="delivery_apartments">
                                        </div>
                                        <label for="delivery_apartments">Квартира</label>
                                    </div>
                                    <!-- New post -->
                                    <div class="col s12 m3 l4 input-field hide">
                                        <div class="select-wrapper">
                                            <input type="text" id="new_post_department" class="" name="new_post_department">
                                        </div>
                                        <label for="new_post_department">Номер отделения</label>
                                    </div>
                                    <div id="new-post-offices" class="col s12 m3 l4 input-field hide">
                                        <?= Html::a('Отделения Новой почты <i class="icon-right"></i>','https://novaposhta.ua/ru/office',['target'=>'_blank']); ?> 
                                    </div>
                                </div>
                                <div class="pg-own-delivery__wrap">
                                    <div class="col s12 m12 l12">
                                        <p><strong>Лукьяновка</strong> - ул. Мельникова 83/А, офис 307<br/> (Пн-Пт 09:00-20:00 и Сб-Вс 10:00-18:00)</p>
                                    </div>
                                </div>
                            </div><!--/row-->
                        </div><!--/left column-->

                        <aside class="col s12 l3 b-service-info hide-on-med-and-down">
                            <span class="b-service-info__title">
                                <i class="icon-dollar"></i>
                                Способствуем выплатам
                            </span>
                            <p>
                                по купленной страховке при наступлении страхового случая
                            </p>

                            <div class="b-phone">
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

                            <span class="b-service-info__title">
                                <i class="material-icons">play_arrow</i>
                                Как это работает
                            </span>

                            <ol>
                                <li>Показываем актуальные тарифы страховых компаний</li>
                                <li>Подбираем самый подходящий</li>
                                <li>Оформляем страховку онлайн</li>
                                <li>Оплачивайте онлайн удобным способом</li>
                                <li>Доставляем полис</li>
                            </ol>
                        </aside><!--/rigth column-->
                    </div><!--/row-->
                </div><!--/container-->
<!--            </section>-->

            <!--<section class="b-page__section">-->
                <div class="container">
                    <h4 class="b-page__subtitle"><span class="g-brand-color"><i class="material-icons">call</i></span>&nbsp;Контакты для связи</h4>
                    <div class="row">
                        <div class="col s12 m6 l4 input-field">
                            <div class="select-wrapper">
                                <input type="email" id="email" class="" name="email" required>
                            </div>
                            <label for="email">Эл.почта*</label>
                        </div>
                        <div class="col s12 m6 l4 input-field">
                            <div class="select-wrapper">
                                <input type="tel" id="phone" class="js-input-phone" maxlength="20" name="phone"  required>
                            </div>
                            <label for="phone">Телефон*</label>
                        </div>
                    </div><!--/row-->
                    <div class="row">
                        <div class="input-field col s12 m12 l8">
                            <div class="select-wrapper">
                                <textarea id="comment" class="materialize-textarea" name="comment" ></textarea>
                            </div>
                            <label for="comment">Комментарий к заказу <i class="material-icons">chat_bubble_outline</i></label>
                        </div>
                    </div><!--/row-->

                </div>
            </section>

            <section class="b-page__section" style="padding-top: 0px">
                <div class="container">
                    <div class="row">
                        <div class="col s12 m12 l3">
                            <h4 class="b-page__subtitle"><span class="g-brand-color"><i class="material-icons">credit_card</i></span> Оплата</h4>
                            <p>
                                <input class="with-gap" name="payment_type" value="cache" type="radio" id="test26" checked />
                                <label for="test26">Наличными при получении</label>
                            </p>
                            <p>
                                <input class="with-gap" name="payment_type" value="card" type="radio" id="test27"/>
                                <label for="test27">Банковской картой</label>
                            </p>
                            <p>&nbsp;</p>
                        </div>
                        <div class="col s12 m12 l2" style="position:relative">
                            <h4 class="b-page__subtitle">
                                <span class="g-brand-color"><img src="/img/percentage.svg" alt="promocode" style="width:27px;vertical-align:middle;" /></span>&nbsp;Промокод
                            </h4>
                            <div class="input-field">
                                <div class="select-wrapper" data-error="Условия промокода не выполнены" data-not-found="Промокод не найден">
                                    <input type="text" id="promocode" name="promocode" >
                                    <?= Html::input('text', 'promocode_value', 0, ['hidden' => '']) ?>
                                </div>
                            </div>
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
                        </div>
                    </div>
                    <p>&nbsp;</p>
                    <span class="b-page__subtitle">
                        Всего к оплате: <span class="g-brand-color js-total-price"><?= $offer_info['price'] ?></span><span class="g-brand-color"> грн</span>
                    </span>
                    <?= Html::input('text', '_csrf', \Yii::$app->request->getCsrfToken(), ['hidden' => '']) ?>
                    <?= Html::input('text', 'product_id', $product->id, ['hidden' => '']) ?>
                    <?= Html::input('text', 'product_name', $product->info->name, ['hidden' => '']) ?>
                    <?= Html::input('text', 'country', $offer_info['country'], ['hidden' => '']) ?>
                    <?= Html::input('text', 'purpose', $offer_info['purpose'], ['hidden' => '']) ?>
                    <?= Html::input('text', 'purpose', $offer_info['purpose'], ['hidden' => '']) ?>
                    <?= Html::input('text', 'insurance_sum', $offer_info['insurance_sum'], ['hidden' => '']) ?>
                    <?= Html::input('text', 'ns_insurance_sum', $offer_info['ns_insurance_sum'], ['hidden' => '']) ?>
                    <?= Html::input('text', 'date_start', $offer_info['date_start'], ['hidden' => '']) ?>
                    <?= Html::input('text', 'date_end', $offer_info['date_end'], ['hidden' => '']) ?>
                    <?= Html::input('text', 'programm', $offer_info['programm'], ['hidden' => '']) ?>
                    <?= Html::input('text', 'price', $offer_info['price'], ['hidden' => '']) ?>
                    <?= Html::input('text', 'company_id', $offer_info['company_id'], ['hidden' => '']) ?>
                    <?= Html::input('text', 'company_name', $offer_info['company_name'], ['hidden' => '']) ?>
                    <?php

                        foreach ($offer_info['ages'] as $age) {
                            echo Html::input('text', 'ages[]', $age, ['hidden' => '']);
                        } 
                    ?>                   
                    <?= Html::input('text', '_csrf', \Yii::$app->request->getCsrfToken(), ['hidden' => '']) ?>
                    <button type="submit" class="btn btn-large waves-effect waves-light">Оформить »</button>
                </div>
            </section>
        </form>
    </main>