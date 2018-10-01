 <?php
 use yii\helpers\Html;
 use frontend\helpers\HtmlCns;
 \frontend\assets\osago\OsagoOffersJsAsset::register($this);
 ?>
        <!--form start-->
        <form id="osago-offers-form" class="pg-form__wrapper gtm-osago-form">
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
            
            <div class="b-page__section b-page__section--alt b-page__section--compact" >
                <div class="container">
                   
                    <div class="row">
                        <input type="text" name="q" value="get" hidden="" />
                        <div class="input-field col s12 m6 l4">
                            <?= HtmlCns::factorSelectAutoType($factors['tip_ts']) ?>
                        </div>
                        <div class="input-field col s12 m6 l4">
                            <?= HtmlCns::factorSelectPlace($factors['mesto_registratsii']) ?>
                            <?= HtmlCns::osagoPrettyCities(Yii::$app->cities->findOsagoPrettyCities()) ?>
                        </div>
                        
                        <div class="input-field col s12 m8 l4 custom_warning">
                            <strong>
                                <i class="material-icons">error_outline</i>
                                <span class="custom_warning_text">
                                    <?php echo Yii::t('factors', 'ukazhite_gorod_registratsii_avto'); ?>
                                </span>
                            </strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l3">
                            <?= HtmlCns::factorSelect($factors['sfera_ispolzovaniya']) ?>
                        </div>
                        <div class="input-field col s12 m6 l3">
                            <?= HtmlCns::factorSelect($factors['lgoty']) ?>
                        </div>
                        <div class="input-field col s12 m6 l3">
                            <?= HtmlCns::factorSelect($factors['srok_deystviya']) ?>
                        </div>
                        <div class="input-field col s12 m6 l3">
                            <?= HtmlCns::factorSelect($factors['god_vypuska_bm'],[
                                'selected' => $factors['god_vypuska_bm']->values[4]->alias
                            ]) ?>
                        </div>
                    </div>                    
                </div>
            </div>
            <?= HtmlCns::companyAliasInput() ?>
            <?= Html::input('text', 'stazh_vozhdeniya', 'do_3_kh_let', ['hidden' => '']) ?>
        </form>
        <!--/form end-->

        <div class="divider"></div>
            <?= HtmlCns::allCompaniesOffersButton() ?>
        <div class="divider"></div>

        <!--choice table start-->
        <div id="pg-page__offers" class="b-page__section b-page__section--mini scrollspy">           
            <div class="container">
                <!--<p class="hide-on-large-only"><i class="material-icons">info_outline</i> Эту таблицу можно "скроллить"!</p>-->
                <div class="g-table-wrap">
                    <table class="highlight bordered b-ch-table js-sortable">
                        <thead>
                            <tr>
                                <th class="b-ch-table__companyTh">Компания</th>
                                <th class="b-ch-table__trustLevelTh hide-on-small-only center js-sort-col">Уровень доверия<span class="tooltipped" data-position="top" data-tooltip="Шкала показывает как часто наши клиенты выбирают ту или иную страховую компанию"><i class="material-icons">info_outline</i></span></th>
                                <th class="b-ch-table__bonusTh hide-on-small-only center">Бонусы</th>
                                <th class="b-ch-table__franshizaTh center js-sort-col">Франшиза<span class="tooltipped" data-position="top" data-tooltip="Сумма, которая не будет возмещаться Страховщиком при выплате страхового возмещения"><i class="material-icons">info_outline</i></span></th>
                                <th class="b-ch-table__paymentTh center js-sort-col">К оплате</th>
                                <th class="hide-on-med-and-down center"></th>
                            </tr>
                        </thead>
                        <tbody>     
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/choice table end-->
        
        
    <!--modal window transit start-->
    <div id="transit" class="modal modal-fixed-footer b-modal-transit">
            <div class="modal-content transit-modal-content">
            <?php echo Html::input('text', '_csrf', \Yii::$app->request->getCsrfToken(), ['hidden' => '']) ?>
            <h5>ВАЖНО!</h5>
            <p>Срок действия менее 6 месяцев допускается исключительно для транспортных средств на временных/транзитных номерах.</p>
            </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close btn-flat ">
                <i class="material-icons">close</i>
            </a>
        </div>
    </div>
    <!--/modal window transit end-->