<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
?>
    <!--modal window callback start-->
    <div id="callback" class="modal modal-fixed-footer b-modal-callback">
        <form id="form-callback" action="/callback" method="POST" class="modal-content">
            <?= Html::input('text', '_csrf', \Yii::$app->request->getCsrfToken(), ['hidden' => '']) ?>
            <h5>Заказать обратный звонок</h5>
            <div class="input-field">
                <div class="select-wrapper">
                    <input id="phone" type="tel" name="tel" class="validate b-modal-callback__input js-input-phone" maxlength="20" required="">
                </div>
                <label for="phone" class="b-modal-callback__label">Номер телефона</label>
            </div>
            <p>
                <input type="checkbox" id="chk2" name="check_box_agree" value="very_fast" class="filled-in js-callback-check" checked />
                <label for="chk2">связаться как можно быстрее</label>
            </p>
            <div class="b-modal-callback__time hide js-callback-check-target">
                <i class="material-icons b-modal-callback__timeicon">query_builder</i>
                <div class="input-field">
                    <select name="when">
                        <option value="default_very_fast" disabled selected>Укажите предпочитаемое время звонка</option>
                        <option value="9_11">С 9 до 11</option>
                        <option value="11_15">С 11 до 15</option>
                        <option value="15_18">С 15 до 18</option>
                        <option value="18_20">С 18 до 20</option>
                        <option value="very_fast">Как можно быстрее</option>
                    </select>
                    <label>Когда вам перезвонить?</label>
                </div>
            </div>
            <input type="text" name="page_name" value="<?php echo \Yii::$app->request->pathInfo; ?>" hidden/>
            <button type="submit" class="btn">Перезвоните мне</button>
        </form>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close btn-flat ">
                <i class="material-icons">close</i>
            </a>
        </div>
    </div>
    <!--/modal window callback end-->
    <footer class="b-footer">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l6">
                    <div class="row">
                        <div class="col s12 m6 l4">
                            <span class="b-footer__title">Продукты</span>
                            <ul class="f-menu">
                                <li class="f-menu__item">
                                    <?= Html::a('Автострахование', ['/services/auto'],["class" => 'f-menu__link'])?>
                                </li>
                                <li class="f-menu__item">
                                    <?= Html::a('Здоровье', ['/services/health'],["class" => 'f-menu__link'])?>
                                </li>
                                <li class="f-menu__item">
                                    <?= Html::a('Недвижимость', ['/services/property'],["class" => 'f-menu__link'])?>
                                </li>
                                <li class="f-menu__item">
                                    <?= Html::a('Ответственность', ['/services/responsibility'],["class" => 'f-menu__link'])?>
                                </li>
                            </ul>
                        </div>
                        <div class="col s12 m6 l4">
                            <span class="b-footer__title">Сотрудничество</span>
                            <ul class="f-menu">
                                <li class="f-menu__item">
                                    <?= Html::a('Для бизнеса', '/for-business/',["class" => 'f-menu__link'])?>
                                </li>
                                <li class="f-menu__item">
                                    <?= Html::a('Страховые компании', '/insurance_companies', ['class' => 'f-menu__link']) ?>
                                </li>
                            </ul>
                        </div>
                        <div class="col s12 m6 l4">
                            <span class="b-footer__title">Информация</span>
                            <ul class="f-menu">
                                <li class="f-menu__item">
                                    <a href="/about" class="f-menu__link">О нас</a>
                                </li>
                                <li class="f-menu__item">
                                    <a href="/clients" class="f-menu__link">Наши клиенты</a>
                                </li>
                                <li class="f-menu__item">
                                    <a href="/contacts" class="f-menu__link">Контакты</a>
                                </li>
                                <li class="f-menu__item">
                                    <a href="/sitemap" class="f-menu__link">Карта сайта</a>
                                </li>
    <!--                                <li class="f-menu__item">-->
    <!--                                    <a href="#!" class="f-menu__link">Отзывы</a>-->
    <!--                                </li>-->
                            </ul>
                        </div>
                    </div><!--/row-->
                </div>
                <div class="col s12 m12 l6">
                    <div class="row">
                        <div class="col s12 m6 l5">
                            <div class="b-footer__contacts">
                                
                            <?php
                            if ($this->beginCache('footer_contacts', ['duration' => 3600])) { 
                                $footer_contacts = \frontend\widgets\WFooterContacts::widget();
                                if ($footer_contacts) :
                                    echo $footer_contacts;
                                else: ?>
                                
                                <div itemscope itemtype="http://schema.org/Organization">
                                    <div itemprop="name"><strong>ЦЕНТР НАРОДНОГО СТРАХОВАНИЯ</strong> <sup>тм</sup><br>ООО «Интелиджент Сервис»</div>
                                    <div>ЕДРПОУ 37770673</div>
                                    <div itemtype="http://schema.org/PostalAddress" itemscope="" itemprop="address">
                                        <div> <span itemprop="streetAddress"><span itemprop="postalCode">04119</span> г. <span itemprop="addressLocality">Киев</span>,<br/> ул. Мельникова, 83А,</span><br/> офис 307</div> 
                                    </div>
                                    <!--div itemtype="http://schema.org/GeoCoordinates" itemscope="" itemprop="geo">
                                        <meta itemprop="latitude" content="50.427245" />
                                        <meta itemprop="longitude" content="30.524964" />

                                    </div-->
                                    
                                    <div>Тел.: <span itemprop="telephone"><a href="tel:380445990607" >+38 (044) 599-06-07</a></span></div>
                                    <div>Тел.: <span itemprop="telephone"><a href="tel:0800758758">0 800 758 758</a></span></div>
                                    <div>Email: <span itemprop="email"><a href="mailto:info@strahovoi.com">info@strahovoi.com</a></span></div>            
                                    
                                </div>
                                <?php   
                                endif;
                                
                                $this->endCache();
                            } ?>
                                <ul class="f-social">
                                    <li class="f-social__item">
                                        <a href="http://www.facebook.com/NarodnaTM" target="_blank" rel="nofollow" class="f-social__link">
                                            <i class="icon-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="f-social__item">
                                        <a href="https://vk.com/narodnatm" target="_blank" rel="nofollow" class="f-social__link">
                                            <i class="icon-vk"></i>
                                        </a>
                                    </li>
                                    <li class="f-social__item">
                                        <a href="https://plus.google.com/+NarodnaUa" target="_blank" rel="publisher" class="f-social__link _usrLink">
                                            <i class="icon-google-plus"></i>
                                        </a>
                                    </li>
                                    <li class="f-social__item">
                                        <a href="https://twitter.com/NarodnaTM" target="_blank" rel="nofollow" class="f-social__link">
                                            <i class="icon-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="f-social__item">
                                        <a href="https://www.youtube.com/channel/UCiEfns-hHFWMA49WYCU6uYw" target="_blank" rel="nofollow" class="f-social__link">
                                            <i class="icon-youtube"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col s12 m6 l6 offset-l1">
                            <ul class="f-logo">
                                <li class="f-logo__item">
                                    <span rel="nofollow" class="f-logo__link">
                                        <img src="/img/f-logo-visa.png" class="f-logo__img" alt="Visa" />
                                    </span>
                                </li>
                                <li class="f-logo__item">
                                    <span rel="nofollow" class="f-logo__link">
                                        <img src="/img/f-logo-master.png" class="f-logo__img" alt="Master Card" />
                                    </span>
                                </li>
                                <li class="f-logo__item">
                                    <span rel="nofollow" class="f-logo__link">
                                        <img src="/img/f-logo-privat.png" class="f-logo__img" alt="Privatbank" />
                                    </span>
                                </li>
                                <li class="f-logo__item">
                                    <span rel="nofollow" class="f-logo__link">
                                        <img src="/img/f-logo-24.png" class="f-logo__img" alt="Privat24" />
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div><!--/row-->
                </div>
            </div><!--/row-->
<?php /* ?>
            <div class="row">
                <p class="footer_info_string"><?php echo date('Y'); ?> &copy; ЦЕНТР НАРОДНОГО СТРАХОВАНИЯ все права защищены. Использование материалов с обязательной ссылкой на первоисточник. <br> Права на торговую марку "Центр Народного Страхования" принадлежат ООО "Интелиджент Сервис", код ЕДРПОУ 37770673</p>
            </div>
<?php */ ?>
        </div><!--/container-->
    </footer>
</div>
