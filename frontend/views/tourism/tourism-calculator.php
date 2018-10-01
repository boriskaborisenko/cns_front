<?php
use yii\helpers\Url;
use yii\helpers\Html;
use frontend\helpers\HtmlCns;
use frontend\assets\tourism\TourismOffersJsAsset;
use frontend\widgets\WFaq;
use frontend\widgets\WCallback;

TourismOffersJsAsset::register($this);

$this->title = 'Туризм - ЦНС';
?>

    <main class="b-page">

        <header class="container">
            <h1 class="b-page__title b-page__title--calc">Туристическое страхование</h1>
            <div class="b-page__oneClickOsago">
                <a href="" role="button" class="g-action-list__links modal-trigger" data-target="callback">
                    <i class="material-icons">call</i>
                    Оформить в один клик
                </a>
            </div>
        </header>

        <!--tourism start form section-->
        <div class="b-page__section b-page__section--compact grey lighten-5">
            <div class="container">
                <!--breadcrumbs start-->
                <!--/breadcrumbs end-->

<!--
                <ul class="g-action-list">
                    <li>
                        <i class="material-icons">mode_edit</i>
                        Оформить
                    </li>
                    <li>
                        <a href="" role="button" class="g-action-list__links modal-trigger" data-target="callback">
                            <i class="material-icons">call</i>
                            Оформить в один клик
                        </a>
                    </li>
                </ul>
-->

                <form id="tourism-offers-form-debug">
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
                    
                    <div class="row">
                        <div class="col s12 m3 l3 input-field">
                            <?php echo HtmlCns::tourismFactorSelectCountry($factors['country']);
                            ?>
                        </div>
                        <div class="col s12 m3 l3 input-field">
                            <input type="text" id="t_date1" name="date_start" placeholder="ДД.ММ.ГГГГ" required value="<?= HtmlCns::currentSelectedDate($factors['date_start'],[ 'selected'=>date('d.m.Y'),
                                                                                                                                                                            'format'=>'d.m.Y']) ?>" />
                            <label for="t_date1">Начало поездки</label>
                        </div>
                        <div class="col s12 m3 l3 input-field">
                            <input type="text" id="t_date2" name="date_end" placeholder="ДД.ММ.ГГГГ" required value="<?= HtmlCns::currentSelectedDate($factors['date_end'],['selected'=>date('d.m.Y',time()+30*24*3600), 
                                                                                                                                                                        'format'=>'d.m.Y']) ?>" />
                            <label for="t_date2">Конец поездки</label>
                        </div>
                        <div class="col s12 m3 l3 input-field">
                            <?php echo HtmlCns::factorSelect($factors['purpose']) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m6 l3 input-field">
                            <?php echo HtmlCns::tourismInsuranceSumSelect($factors['insurance_sum']) ?>
                        </div>
                        <div class="col s12 m6 l3 input-field">
                            <?php echo HtmlCns::factorSelect($factors['transport']) ?>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <label>Добавьте нужное количество путешественников и укажите их возраст:</label>
                        </div>
                    </div>


                    <div class="row js-age">
                        <!--div class="col s6 m4 l3 js-age-block">
                            <div class="col s3 input-field">
                                <button type="button" class="btn-floating waves-effect waves-light red g-hidden js-age-del" disabled title="Удалить поле">
                                    <i class="material-icons">remove</i>
                                </button>
                            </div>
                            <div class="col s6 input-field">
                                <i class="icon-user prefix grey-text"></i>
                                <input type="text" id="t_user1" placeholder="30" name="ages[]" required />
                                <label for="t_user1">Возраст</label>
                            </div>
                            <div class="col s3 input-field">
                                <button type="button" class="btn-floating waves-effect waves-light js-age-add" title="Добавить поле">
                                    <i class="material-icons">add</i>
                                </button>
                            </div>
                        </div-->
                        <?= HtmlCns::tourismAges($factors['ages']); ?>
                    </div>


                    <button type="submit" class="btn btn-large">Подобрать тариф</button>
                </form>
            </div>
        </div>
        
        <div id="tourism-calc-result"></div>
        
        <!--choice table section-->
        <div class="b-page__section">
            <div class="container">
<!--
                <div class="row">
                    <div class="col s12 m1 l1">
                        <svg viewBox="0 0 402.577 402.577" width="36" version="1.1">
                            <path fill="#9e9e9e" d="M400.858 11.427c-3.24-7.42-8.85-11.132-16.854-11.136H18.564C10.57.29 4.954 4.007 1.718 11.428c-3.234 7.8-1.903 14.467 4 19.985l140.756 140.753V310.92c0 4.955 1.81 9.232 5.424 12.854l73.085 73.083c3.43 3.614 7.71 5.428 12.85 5.428 2.283 0 4.66-.48 7.136-1.43 7.425-3.238 11.14-8.85 11.14-16.845V172.166L396.86 31.413c5.905-5.518 7.233-12.182 3.998-19.986z" />
                        </svg>
                    </div>
                    <div class="col s12 m5 l3 input-field">
                        <select id="t_filter1">
                            <option selected>Все программы</option>
                            <option>Эконом</option>
                            <option>Стандарт</option>
                            <option>Премиум</option>
                        </select>
                        <label for="t_filter1">Подобрать программу</label>
                    </div>
                </div>
-->
                <hr />
                <!--<p class="hide-on-large-only"><i class="material-icons">info_outline</i> Эту таблицу можно "скроллить"!</p>-->
                <div class="g-table-wrap">
                    <table class="bordered b-ch-table b-ch-table--compact">
                        <thead>
                            <tr>
                                <th>Компания</th>
                                <th>Программа</th>
                                <th>Стоимость</th>
                                <!--th class="center">Франшиза</th>
                                <th class="hide-on-small-only center">Ассистирующая компания</th-->
                                <th></th>
                                <th class="hide-on-med-and-down center"></th>
                            </tr>
                        </thead>
                        <tbody class="tbody_result">
                            
<!--                            <tr class="grey lighten-5">
                                <td rowspan="3">
                                    <figure class="b-choice-table__company">
                                        <img src="img/company/logo01.png" class="b-ch-table__logo" alt="Logo">
                                        <figcaption>
                                            <a href="#">5 отзывов</a>
                                            <a href="#">О компании</a>
                                        </figcaption>
                                    </figure>
                                </td>
                                <td>
                                    <input name="group1" type="radio" id="test01" checked />
                                    <label for="test01">Эконом&nbsp;<i class="material-icons tiny js-tooltip" data-tooltip="Контент подсказки">info_outline</i></label>
                                </td>
                                <td>
                                    <span class="b-ch-table__price b-ch-table__price--old">47 800 грн</span>
                                    <span class="b-ch-table__price b-ch-table__price-1">45 020 грн</span>
                                </td>
                                <td class="center">
                                    <span class="b-ch-table__price">0</span>
                                </td>
                                <td class="hide-on-small-only center">
                                    «Ремед Ассистанс»
                                </td>
                                <td class="center" rowspan="3">
                                    <button type="button" class="btn waves-effect waves-light b-ch-table__btn">Оформить...</button>
                                </td>
                            </tr>
                            
                            <tr class="grey lighten-5">
                                <td>
                                    <input name="group1" type="radio" id="test02" />
                                    <label for="test02">Стандарт&nbsp;<i class="material-icons tiny js-tooltip" data-tooltip="Контент подсказки">info_outline</i></label>
                                </td>
                                <td>
                                    <span class="b-ch-table__price b-ch-table__price--old">5 800 грн</span>
                                    <span class="b-ch-table__price b-ch-table__price-1">25 010 грн</span>
                                </td>
                                <td class="center">
                                    <span class="b-ch-table__price">10%</span>
                                </td>
                                <td class="hide-on-small-only center">
                                    «Ремед Ассистанс»
                                </td>
                            </tr>
                            <tr class="grey lighten-5">
                                <td>
                                    <input name="group1" type="radio" id="test03" />
                                    <label for="test03">Премиум&nbsp;<i class="material-icons tiny js-tooltip" data-tooltip="Контент подсказки">info_outline</i></label>
                                </td>
                                <td>
                                    <span class="b-ch-table__price b-ch-table__price--old">5 800 грн</span>
                                    <span class="b-ch-table__price b-ch-table__price-1">15 900 грн</span>
                                </td>
                                <td class="center">
                                    <span class="b-ch-table__price">10%</span>
                                </td>
                                <td class="hide-on-small-only center">
                                    «Ремед Ассистанс»
                                </td>
                            </tr>-->

                        </tbody>
                    </table>
                </div>
<!--                <p class="hide-on-large-only"><i class="material-icons">info_outline</i> Эту таблицу можно "скроллить"!</p>-->
            </div>
        </div>
        <!--/choice table section-->

        <?=WCallback::widget()?>  
    </main>

<script>
var g_countries = [
    <?php
    foreach($factors['country']->values as $country) {
        $insurance_sum = '{';
        foreach ($country->insurance_sum as $sum) {
            $insurance_sum .= "\"{$sum->alias}\":\"{$sum->value}\",";
        }
        $insurance_sum .= '}';
        echo "{'name':'"."{$country->name}"."',"
                . "'alias':"."'{$country->alias}',"
                . "'currency':"."'{$country->currency}',"
                . "'insurance_sum':".$insurance_sum
                . "},";
    }
    ?>
];
</script>
