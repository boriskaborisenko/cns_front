<?php

//use frontend\assets\ContactsJsAsset;
use yii\helpers\Html;
use frontend\helpers\HtmlCns;
use yii\helpers\Url;

//ContactsJsAsset::register($this);
$this->title = 'Контакты - ЦНС';
$this->registerMetaTag([
    'property' => 'og:type',
    'content' => "website"
]);
$this->registerMetaTag([
    'property' => 'og:url',
    'content' => Yii::$app->request->getAbsoluteUrl()
]);
$this->registerMetaTag([
    'property' => 'og:title',
    'content' => 'Контакты - Центр Народного страхования'
]);
$this->registerMetaTag([
    'property' => 'og:description',
    'content' => 'Мы всегда рядом'
]);
$this->registerMetaTag([
    'property' => 'og:image',
    'content' => trim(Url::to(['/'],true),'/')."/img/slider/slider1.jpg"
]);
?>
    <main class="b-page">
        <!--section main content start-->
        <section class="container">
            <?= HtmlCns::breadcrumbs([
                [
                    'title' => $contacts->info->title,
                    'active' => 1
                ]
            ]); ?>            
            <?= $contacts->info->text ?>
            <ul class="b-tabs b-tabs--big js-tabs js-tabs--main">
                
                <?php 
                foreach ($cities as $city) { ?>
                
                <li class="b-tabs__item">
                    <a href="#<?= $city->alias ?>" class="b-tabs__link"><?= $city->info->title ?></a>
                </li>

                <?php 
                } ?>
                
            </ul>
            
            <div class="js-tabs-content">
                
                <?php 
                foreach ($cities as $c_key => $city) { ?>
                
                <div id="<?= $city->alias ?>">
                    <div class="row">
                        <div class="col s12 m12 l6 offset-l3">
                            <ul class="b-tabs b-tabs--justify js-tabs">
                                
                                <?php
                                foreach ($city->children as $place) { ?>
                                
                                <li class="b-tabs__item" style="text-align: center;">
                                    <a href="#<?= $place->alias ?>" class="b-tabs__link"><?= $place->info->title ?></a>
                                </li>
                                
                                <?php 
                                } ?>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="js-tabs-content">
                        
                        <?php
                        foreach ($city->children as $p_key => $place) { ?>
                        
                        <div id="<?= $place->alias ?>">
                            <section>
                                <div class="row">
                                    <div class="col s12 l7">
                                        <!--div class="g-map" id="map<?= $c_key."_".$p_key ?>"></div-->
                                        <?php
                                        //if ($p_key == 0) {
                                            echo $place->getDocByAlias('2gis')->info->text; 
                                        //} ?>
                                    </div>
                                    <aside class="col s12 l5">
                                        <?= $place->getDocByAlias('content')->info->text ?>
                                    </aside>
                                </div><!--/row-->
                            </section>
                        </div>
                        
                        <?php 
                        } ?>
                        
                    </div><!--/.js-tabs-content-->
                    
                </div>

                <?php 
                } ?>
                
            </div><!--/.js-tabs-content-->
        </section>
        <!--/section main content end-->        

        <section class="b-page__section">
            <div class="container">
                <h3 class="b-page__subtitle">У нас компетентные консультанты</h3>
                <div class="row">
                    <!--form-->
                    <form action="/feedback" method="POST" class="col s12 l7">
                        Напишите, и наши консультанты помогут во всем разобраться!<br />
                        <div class="input-field">
                            <div class="select-wrapper">
                                <textarea id="text01" name="msg" class="materialize-textarea" required="" ></textarea>
                            </div>
                            <label for="text01">Как мы можем Вам помочь? <i class="material-icons">chat_bubble_outline</i></label>
                        </div>
                        <div class="input-field">
                            <div class="select-wrapper">
                                <input type="text" name="email_or_phone" id="inp01" required="" />
                            </div>
                            <label for="inp01">Электронная почта или телефон</label>
                        </div>
                        <div class="input-field">
                            <div class="select-wrapper">
                                <input type="text" name="person_name" id="inp02" required=""/>
                            </div>
                            <label for="inp02">Как Вас зовут?</label>
                        </div>
                        <button type="submit" class="btn btn-large waves-effect waves-light">Жду ответ</button>
                        <p>&nbsp;</p>
                        <?= Html::input('text', '_csrf', \Yii::$app->request->getCsrfToken(), ['hidden' => '']) ?>
                    </form>
                    <!--/form-->
                    <aside class="col s12 l4 offset-l1">
                        <!--ul class="g-side-menu">
                            <li>
                                <a href="#">Вопросы и ответы</a>
                            </li>
                            <li>
                                <a href="#">Свидетельства и сертификаты</a>
                            </li>
                            <li>
                                <a href="#">Пожаловаться директору</a>
                            </li>
                            <li>
                                <a href="#">Фейсбук</a>
                            </li>
                            <li>
                                <a href="#">Вконтакте</a>
                            </li>
                        </ul-->
                    </aside>
                </div>
            </div>
        </section>
    </main>

<!--script>
    function initialize() {
        
        <?php
        foreach ($cities as $c_key => $city) { 
            foreach ($city->children as $p_key => $place) { 
                $index = $c_key."_".$p_key; ?>
        
        var map<?= $index ?>_lating = new google.maps.LatLng(<?= $place->getDocByAlias('latlng')->info->title ?>),
            map<?= $index ?>_options = {
                zoom: 16,
                center: map<?= $index ?>_lating,
                panControl: false,
                zoomControl: true,
                scrollwheel: false,
                streetViewControl: false,
                scaleControl: true,
                mapTypeId: google.maps.MapTypeId.ROAD
            },
            map<?= $index ?> = new google.maps.Map(document.getElementById(`map<?= $index ?>`),
            map<?= $index ?>_options),
            marker<?= $index ?> = new google.maps.Marker({
                position: map<?= $index ?>_lating,
                icon: "img/marker.png",
                map: map<?= $index ?>
            }),
            info<?= $index ?> = new google.maps.InfoWindow({
                content: `<div class="g-map__title"><b><?= $place->info->title ?></b></div>`
            });

        google.maps.event.addListener(marker<?= $index ?>, `mouseover`, function () {
            info<?= $index ?>.open(map<?= $index ?>, marker<?= $index ?>);
        });
        google.maps.event.addListener(marker<?= $index ?>, `mouseout`, function () {
            info<?= $index ?>.close(map<?= $index ?>, marker<?= $index ?>);
        });
        
        
        
            <?php
            }
        } ?>
        
        google.maps.event.addDomListener(window, `resize`, function () {
        
        <?php
        foreach ($cities as $c_key => $city) { 
            foreach ($city->children as $p_key => $place) { 
                $index = $c_key."_".$p_key; ?>
        
            var center<?= $index ?> = map<?= $index ?>.getCenter();
            google.maps.event.trigger(map<?= $index ?>, `resize`);
            map<?= $index ?>.setCenter(center<?= $index ?>);

            <?php
            }
        } ?>
        
        });
    };

    function loadScript() {
        var script = document.createElement(`script`);
        script.type = `text/javascript`;
        script.src = `https://maps.googleapis.com/maps/api/js?key=AIzaSyDUQBnEb1KOIfMf8sBrdm-A-RpFSGcIs_Q&v=3.exp&sensor=false&` +
            `callback=initialize`;
        document.body.appendChild(script);
    };
    window.onload = loadScript;
</script--> 