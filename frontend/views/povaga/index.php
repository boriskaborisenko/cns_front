<?php

use frontend\widgets\WCallback;
use frontend\helpers\HtmlCns;
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\povaga\PovagaAsset;

PovagaAsset::register($this);

$this->title = ( (Yii::$app->page->isPage()) ? Yii::$app->page->getPageInfo('title') : 'Культура паркования' );;
$h1 = ( (Yii::$app->page->isPage()) ? Yii::$app->page->getPageInfo('h1') : 'Культура паркования' );
$this->registerMetaTag([
    'property' => 'og:type',
    'content' => "website"
],'og_type');
$this->registerMetaTag([
    'property' => 'og:url',
    'content' => Yii::$app->request->getAbsoluteUrl()
],'og_url');
$this->registerMetaTag([
    'property' => 'og:title',
    'content' => 'Культура паркования - Центр Народного страхования'
],'og_title');
$this->registerMetaTag([
    'property' => 'og:description',
    'content' => strip_tags("")
],'og_description');
$this->registerMetaTag([
    'property' => 'og:image',
    'content' => trim(Url::to(['/'],true),'/')."/img/slider/slider1.jpg"
],'og_image');
?>
<main class="b-page">

    <section class="container b-about">
        <?= HtmlCns::breadcrumbs([
            [
                'title' => 'Культура паркования',
                'active' => 1
            ],
        ]); ?>
        <h1 class="b-page__title b-page__title--povaga"><?= $h1 ?></h1>
    </section>
    
    <section class="container">
        <div class="row b-povaga__media">
            <div class="col s12 m12 l6 b-bg-povaga" style="background-image: url(/img/povaha/povaha_card.png);">
                <div class="b-text-bottom-fixed" style="font-family: 'BRNumber';">
                    <input type="tel" class="js-input-phone--brn" value="0000000000" style="height: 5rem;border-bottom:none"/>
                </div>
            </div>
            <div class="col s12 m12 l6 b-povaga__prev">
                <img src="/img/povaha/prev.png" class="max-full-width" alt="" />
            </div>
        </div>
        
    </section>
    <section class="container">
        <div class="b-page__subtitle povaga-excl">
            <img class="povaga-excl__img" src="/img/povaha/exclamation.png" alt="exclamation">
            <div class="povaga-excl__text">Чем больше информации будет введено - тем дешевле!</div>
        </div>
    </section>    
    <div class="b-povaga-form">
        <div class="container">
            <form action="/povaga/create-card" method="POST" id="povaga-form">
                <?= Html::input('text', '_csrf', \Yii::$app->request->getCsrfToken(), ['hidden' => '']) ?>
                <div class="row">
                    <div class="col s12 m12 l6">
                        <div class="row">
                            <div class="col s12 m12 l6">
                                <label class="b-callback__label">Оставьте номер для связи</label>
                                <input type="tel" name="tel" class="b-callback__input js-input-phone--for-brn" placeholder="+38 (0__) ___-__-__"  required/>
                            </div>
                           <div class="col s12 m12 l6">
                                <label class="b-callback__label">Имя получателя</label>
                                <input type="text" name="name" class="b-callback__input" required="" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l6">
                                <label class="b-callback__label">Укажите адрес доставки</label>
                                <input id="autocomplete" onFocus="geolocate()" type="text" name="address" class="b-callback__input" style="font-size:12px;"  placeholder="Введите свой адрес"required=""/>
                            </div>
                            <div class="col s6 m6 l3">
                                <label class="b-callback__label">№ дома</label>
                                <input type="text" name="house" class="b-callback__input"  required=""/>
                            </div>
                            <div class="col s6 m6 l3">
                                <label class="b-callback__label">№ квартиры</label>
                                <input type="text" name="flat" class="b-callback__input" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l6">
                                <label class="b-callback__label">Ваш e-mail</label>
                                <input type="email" name="email" class="b-callback__input" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12 b-callback__agree">
                                <input type="checkbox" id="chk1" name="osago_want" value="1" class="filled-in js-callback-check" checked/>
                                <label for="chk1">Хочу получить предложение по ОСАГО</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <div class="b-callback__time">
                                    <i class="material-icons b-callback__timeicon">query_builder</i>
                                    <div class="input-field">
                                        <input type="text" id="t_date1" name="osago_expires" class="b-callback__input g-placeholder--alt" maxlength="20" placeholder="Укажите дату окончания вашего полиса" required="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m12 l6 center">
                        <p style="margin-top:0;text-align: center;font-size:20px">Ваша цена, грн:</p>
                        <div style="position: relative">
                            <svg width="320" height="200" xmlns="http://www.w3.org/2000/svg" style="filter: drop-shadow( 3px 3px 2px #000 );display:block;margin:0 auto;">
                                <rect x='20' y='0' width='130' height='190' 
                                    transform='translate(140 105) skewX(-8) translate(-140 -105)' fill="#ffec92" rx="15" ry="15" />
                                <rect x='170' y='0' width='130' height='190' 
                                    transform='translate(140 105) skewX(-8) translate(-140 -105)' fill="#ffec92" rx="15" ry="15" />
                            </svg>
                            <div class="povaha-price">39</div>
                        </div>
                        <button type="submit" class="btn b-callback__btn b-povaga-form__submit waves-effect waves-light">Заказать</button>
                    </div>
                </div>
                <input type="hidden" value="39" name="price" class="hidden" hidden="" />
            </form>


        </div>
    </div>
    
    <section>
        <div class="row b-povaga-adv js-animate" data-animate="fade-in-up">
            <div class="col s12 l6 b-povaga-adv__left mt-40">
                <img src="/img/povaha/1.png" alt="scratch" class="max-full-width" />
                <div class="b-povaga-adv__desc">
                    <h4 class="b-page__subtitle">
                        Стоп царапины
                    </h4>
                    <p class="b-povaga-adv__text">На 89% меньше царапин! Вас не будут ненавидеть пешеходы</p>
                    
                </div>
            </div>
            <div class="col s12 l6 b-povaga-adv__right">
                <svg width="350" height="280" xmlns="http://www.w3.org/2000/svg" class="b-povaga-adv__quote-bg">
                    <polygon points="10,50 310,40 290,200 40,220"
                             fill="#ecedc8"  />
                </svg>
                <div class="b-povaga-adv__quote">
                    <p class="b-povaga-quote">
                        <span class="b-povaga-quote__quotes">&#8221; </span>
                        Да, я не умею парковаться. Но с тех пор, как начала оставлять номер под лобовым стеклом - мою машину перестали царапать!
                        <span class="b-povaga-quote__quotes"> &#8222;</span>
                        <div class="b-povaga-quote__author">- Светлана</div>
                    </p>
                </div>
            </div>
        </div>
        <div class="row  b-povaga-adv js-animate" data-animate="fade-in-up">
            <div class="col s12 l6 b-povaga-adv__left" >
                <img src="/img/povaha/2.png" alt="scratch" class="max-full-width" />
                <div class="b-povaga-adv__desc" >
                    <h4 class="b-page__subtitle">
                        Стоп эвакуатор
                    </h4>
                    <p class="b-povaga-adv__text">Авто не заберут, если будет возможность связаться с собственником</p>
                    
                </div>
            </div>
            <div class="col s12 l6 b-povaga-adv__right">
                <svg width="350" height="290" xmlns="http://www.w3.org/2000/svg" class="b-povaga-adv__quote-bg">
                    <polygon points="25,20 336,75 286,239 4,189"
                             fill="#b3d5e1"  />
                </svg>
                <div class="b-povaga-adv__quote">
                    <p class="b-povaga-quote">
                        <span class="b-povaga-quote__quotes b-povaga-quote__quotes--blue">&#8221; </span>
                        За год дважды спасала меня от штрафплощадки. Опаздывал на встречу и неудачно припарковался. Позвонили с полиции и дали 5 минут переставить авто, прежде чем эвакуировать
                        <span class="b-povaga-quote__quotes b-povaga-quote__quotes--blue"> &#8222;</span>
                        <div class="b-povaga-quote__author b-povaga-quote__author--blue">- Александр</div>
                    </p>
                </div>
            </div>
        </div>
        <div class="row  b-povaga-adv js-animate" data-animate="fade-in-up">
            <div class="col s12 l6 b-povaga-adv__left" >
                <img src="/img/povaha/3.png" alt="scratch" class="max-full-width" />
                <div class="b-povaga-adv__desc" >
                    <h4 class="b-page__subtitle">
                        Анти каратист
                    </h4>
                    <p class="b-povaga-adv__text" >Авто не будут бить по колесах, чтобы включить сигнализацию</p>
                    
                </div>
            </div>
            <div class="col s12 l6 b-povaga-adv__right">
                <svg width="350" height="290" xmlns="http://www.w3.org/2000/svg" class="b-povaga-adv__quote-bg">
                    <polygon points="3,55 257,13 329,205 73,219"
                             fill="#e1d4c9"  />
                </svg>
                <div class="b-povaga-adv__quote">
                    <p class="b-povaga-quote">
                        <span class="b-povaga-quote__quotes b-povaga-quote__quotes--red">&#8221; </span>
                        У нас во дворе очень маленькая парковка. Уже стало традицией активировать сигнализацию тех автомобилей, которые мешают выехать. Мою машину перестали лупить по колесам и стеклам.
                        <span class="b-povaga-quote__quotes b-povaga-quote__quotes--red"> &#8222;</span>
                        <div class="b-povaga-quote__author b-povaga-quote__author--red">- Петр</div>
                    </p>
                </div>
            </div>
        </div>
        <div class="row  b-povaga-adv js-animate" data-animate="fade-in-up">
            <div class="col s12 l6 b-povaga-adv__left">
                <img src="/img/povaha/4.png" alt="scratch" class="max-full-width" />
                <div class="b-povaga-adv__desc" >
                    <h4 class="b-page__subtitle">
                        Будь на связи
                    </h4>
                    <p class="b-povaga-adv__text">Авто может кому-то мешать, лучше дать возможность связаться с вами</p>
                    
                </div>
            </div>
            <div class="col s12 l6 b-povaga-adv__right">
                <svg width="350" height="290" xmlns="http://www.w3.org/2000/svg" class="b-povaga-adv__quote-bg">
                    <polygon points="43,50 320,10 337,183 3,259"
                             fill="#dfedc8"  />
                </svg>
                <div class="b-povaga-adv__quote">
                    <p class="b-povaga-quote">
                        <span class="b-povaga-quote__quotes b-povaga-quote__quotes--green">&#8221; </span>
                        Я постоянно мотаюсь по городу. Часто припарковаться негде. Я не могу исправить проблему с парковками, но в моих силах быть культурным человеком.
                        <span class="b-povaga-quote__quotes b-povaga-quote__quotes--green"> &#8222;</span>
                        
                        <div class="b-povaga-quote__author b-povaga-quote__author--green">- Станислав</div>
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <?php if(Yii::$app->page->getPageInfo('scText')): ?>
    <section class="b-page__section b-page__section--alt">
        <div class="container">
            <?= Yii::$app->page->getPageInfo('scText') ?>
        </div>
    </section>
    <?php endif; ?>
    
</main>

<script>
    // This example displays an address form, using the autocomplete feature
    // of the Google Places API to help users fill in the information.

    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    var placeSearch, autocomplete;
    function initAutocomplete() {
      // Create the autocomplete object, restricting the search to geographical
      // location types.
      autocomplete = new google.maps.places.Autocomplete(
          /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
          {types: ['geocode'],
          componentRestrictions: {country: "ua"}});
    }

    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.
    function geolocate() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var geolocation = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };
          var circle = new google.maps.Circle({
            center: geolocation,
            radius: position.coords.accuracy
          });
          autocomplete.setBounds(circle.getBounds());
        });
      }
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAyk-xyjKX6G1uO80ewx534OyLI8qMuQKw&libraries=places&callback=initAutocomplete"
      async defer></script>