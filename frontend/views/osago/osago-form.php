<?php
//use Yii;
use yii\helpers\Html;
use frontend\helpers\HtmlCns;
use yii\helpers\Url;
use frontend\assets\osago\OsagoFormJsAsset;

OsagoFormJsAsset::register($this);
$this->registerMetaTag([
    'name' => 'robots',
    'content' => 'noindex, nofollow'
]);
$this->title = 'Заказ - ОСАГО';
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
                    'title' => 'ОСАГО',
                    'href' => "/osago",
                ],
                [
                    'title' => 'Калькулятор ОСАГО',
                    'href' => Yii::$app->links->mainMenuLink(2),
                ],
                [
                    'title' => 'Выбор тарифа',
                    'href' => Yii::$app->links->mainMenuLink(2),
                ],
                [
                    'title' => 'Оформление',
                    'active' => true
                ],
                [
                    'title' => 'Готово',
                ]
            ]); ?>
            <h1 class="b-page__title">Страхование ОСАГО <small>(Автогражданка)</small></h1>
            <div class="row">
                <div class="col s12 l9">
                    <div class="g-table-wrap" data-match-height>
                        <table class="bordered b-ch-table">
                            <thead>
                                <tr>
                                    <th class="hide-on-small-only">Условия страхования</th>
                                    <th class="center" colspan="2">Страховая компания</th>
                                    <th class="center">Стоимость</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="hide-on-small-only">
                                        <strong><?= $translations['srok_deystviya']['label'] ?></strong>: <?= $translations['srok_deystviya']['values'][$offer_info['srok_deystviya']] ?><br />
                                        <strong><?= $translations['tip_ts']['label'] ?></strong>: <?= $translations['tip_ts']['values'][$offer_info['tip_ts']] ?><br />
                                        <strong><?= $translations['mesto_registratsii']['label'] ?></strong>: <?= $offer_info['registration_city'] ?><br />
                                        <strong><?= $translations['sfera_ispolzovaniya']['label'] ?></strong>: <?= $translations['sfera_ispolzovaniya']['values'][$offer_info['sfera_ispolzovaniya']] ?><br />
                                        <!--strong><?= $translations['stazh_vozhdeniya']['label'] ?></strong>: <?= $translations['stazh_vozhdeniya']['values'][$offer_info['stazh_vozhdeniya']] ?><br /-->
                                        <strong><?= $translations['god_vypuska_bm']['label'] ?></strong>: <?= $translations['god_vypuska_bm']['values'][$offer_info['god_vypuska_bm']] ?><br />
                                        <strong><?= $translations['lgoty']['label'] ?></strong>: <?= $translations['lgoty']['values'][$offer_info['lgoty']] ?><br />
                                        <strong><?= $translations['franshiza']['label'] ?></strong>: <?= (isset($translations['franshiza']['values'][$offer_info['franshiza']])) ? $translations['franshiza']['values'][$offer_info['franshiza']] : '0' ?> грн<br />                               
                                        <?php if($offer_info['company_bonuses']): ?>
                                            <strong><?= $translations['company_bonuses']['label'] ?></strong>: <?= \frontend\helpers\HtmlCns::bonuses($offer_info['company_bonuses']) ?><br />
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <img src="/images/companies/<?= $offer_info['company_id'] ?>.1.b.jpg" class="b-ch-table__logo" alt="Logo" />
                                    </td>
<!--                                    <td>
                                        ОСАГО<br />
                                        <?php // echo $translations['srok_deystviya']['values'][$offer_info['srok_deystviya']] ?>
                                    </td>-->
                                    <td class="center" colspan="2">
                                        <span class="b-ch-table__price"><span class="g-brand-color"><?= $offer_info['price'] ?> грн</span></span>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

                <aside class="col s12 l3">
                    <form action="/osago/buy-on-click" id="osago-order-form-1-click" data-income-ras="<?= $income_ras ?>"  method="POST" class="b-ch-table-form hoverable" onsubmit="dataLayer.push({'event': 'UAevent', 'gtmFormID': 'osago-order-form-1-click','eventValue': <?= $income_ras ?>});fbq('track', 'Purchase', {currency: 'UAH', value: <?= $income_ras ?>});">
                        <span class="b-page__subtitle">Оформить в 1 клик</span>
                        <div class="input-field">
                            <input id="phone1" name="phone" type="tel" class="validate js-input-phone" maxlength="20" placeholder="Ваш номер телефона" required="" />
                        </div>
                        <?php
                            foreach ($offer_info as $key=>$element) {
                                echo Html::input('text', $key, $element, ['hidden' => '']);
                            } 
                        ?>                    
                        <?= Html::input('text', '_csrf', \Yii::$app->request->getCsrfToken(), ['hidden' => '']) ?>
                        <?= Html::input('text', 'product_id', $product->id, ['hidden' => '']) ?>
                        <?= Html::input('text', 'product_name', $product->info->name, ['hidden' => '']) ?>
                        <div class="right-align">
                            <button type="submit" class="btn waves-effect waves-light">Подтвердить заказ</button>
                        </div>
                    </form>
                </aside>
            </div><!--/row-->
        </section>
        <!--/section main content end-->
        <form id="osago-order-form-oformit" onsubmit="dataLayer.push({'event': 'gtm.formSubmit', 'gtmFormID': 'osago-order-form-oformit', 'eventValue': <?= $income ?>}); fbq('track', 'Purchase', {currency: 'UAH', value: <?= $income ?>});" method="POST" action="/osago/buy">
            <section class="b-page__section">
                <div class="container">
                    <div class="row">
                        <div class="col s12 l9">
                            <h2 class="b-page__subtitle">
                                <span class="g-brand-color"><i class="material-icons">account_circle</i></span>&nbsp;Владелец авто
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

                            <h2 class="b-page__subtitle">
                                <span class="g-brand-color"><i style="font-size: 15px;vertical-align: middle;" class="icon-car g-brand-color"></i></span>&nbsp;Транспортное средство
                            </h2>

                            <div class="row">
                                <div class="col s12 m4 l4 input-field">
                                    <div class="select-wrapper">
                                        <input type="text" id="auto_gos_num" class="" name="auto_gos_num" required>
                                    </div>
                                    <label for="auto_gos_num">Гос.номер*</label>
                                </div>
                                <div class="col s12 m4 l4 input-field">
                                    <div class="select-wrapper">
                                        <input type="text" id="auto_mark" class="" name="auto_mark" required>
                                    </div>
                                    <label for="auto_mark">Марка авто*</label>
                                </div>
                                <div class="col s12 m4 l4 input-field">
                                    <div class="select-wrapper">
                                        <input type="text" id="auto_model" class="" name="auto_model" required>
                                    </div>
                                    <label for="auto_model">Модель*</label>
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
                                            <input type="text" id="delivery_city" class="" name="delivery_city" value="<?php echo $offer_info['registration_city']; ?>" >
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
                            <br/>
                        </div>
                        <div class="col s12 m12 l3">
                            <h4 class="b-page__subtitle">
                                <span class="g-brand-color"><i style="font-size: 15px;vertical-align: middle;" class="icon-car g-brand-color"></i></span>&nbsp;Доставка
                            </h4>
                            <div>
                                <p class="hide b-page__subtitle js-delivery-price">
                                    <span class="g-brand-color js-delivery-price__value"></span><span class="g-brand-color"> грн</span>
                                </p>
                                <p class="hide js-delivery-price-new-post">
                                    <span>Стоимость доставки согласно тарифам </span><strong class="g-brand-color">Новой Почты</strong>
                                </p>
                            </div>
                            <br/>
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
                    <?php
                        foreach ($offer_info as $key=>$element) {
                            echo Html::input('text', $key, $element, ['hidden' => '']);
                        } 
                    ?>                    
                    <?= Html::input('text', '_csrf', \Yii::$app->request->getCsrfToken(), ['hidden' => '']) ?>
                    <?= Html::input('text', 'product_id', $product->id, ['hidden' => '']) ?>
                    <?= Html::input('text', 'product_name', $product->info->name, ['hidden' => '']) ?>
                    <?= Html::input('text', 'income', $income, ['hidden' => '']) ?>
                    <button type="submit" class="btn btn-large waves-effect waves-light">Оформить »</button>
                </div>
            </section>
        </form>
    </main>
