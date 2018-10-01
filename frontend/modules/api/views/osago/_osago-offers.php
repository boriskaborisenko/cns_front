<?php
use yii\helpers\Html;
use frontend\helpers\HtmlCns;
use yii\helpers\Url;

// такой вариант решения проблемы со шкалой нужно обсудить (180 таск)
$ratings = [];
foreach($offers as $offer) {
    $ratings[] = $offer->companyInfo->rating;
}

$max_rating = max($ratings);

foreach($offers as $offer):
    foreach($offer->price_special as $depend_factor => $price):
        if ($price != 0 && isset($companies[$offer->companyInfo->alias])): 

        // округляем значение рейтинга для его дальнейшего вывода   
        $js_rating = round((($offer->companyInfo->rating / $max_rating) * 10), 0);
        switch ($js_rating) {
            case 0:
                $js_rating = '01';
                break;
            case 10:
                $js_rating = '10';
                break;
            default :
                $js_rating = '0'.$js_rating;
        }
        
        // значения КС и КВ
        $franshize = (int)$depend_factor;
        $ksCoef = $offer->factors_values->ks->$franshize;
        $kvCoef = (isset($offer->kv->kv)) ? $offer->kv->kv : reset($offer->kv)->$depend_factor;
?>
            <tr>
                <td>
                    <?= HtmlCns::bonusSticker($offer->companyInfo->bonuses) ?>
                    <figure class="b-choice-table__company">
                        <img src="/images/companies/<?= $companies[$offer->companyInfo->alias]->id  ?>.1.b.jpg" class="b-ch-table__logo" alt="<?= $offer->companyInfo->name ?>" />
                        <figcaption>
                            <!--<a href="#">5 отзывов</a>-->
                            <a href="<?= Url::to("/company/{$companies[$offer->companyInfo->alias]->id}?product={$product_id}") ?>">О компании</a>
                        </figcaption>
                    </figure>
                </td>
                <td class="hide-on-small-only center">
                    <span style="display:none" class="js_pg-sort"><?= $js_rating; ?></span>
                    <span class="i-level-<?= $js_rating; ?> js-tooltip" data-position="top" data-tooltip="Популярность компании"></span>
                </td>
                <td class="hide-on-small-only center">
                    <?= HtmlCns::bonuses($offer->companyInfo->bonuses) ?>
                </td>
                <td class="center">
                    <span class="b-ch-table__price b-ch-table__price_franshiza"><span class="js_pg-sort"><?= (preg_match('/^\d+$/', $depend_factor)) ? $depend_factor : '0' ?></span> грн</span>
                </td>
                <td class="center">
                    <span class="b-ch-table__price b-ch-table__price-1"> <?php 
                        if (round($offer->price->$depend_factor) > round($price)) {
                            echo Html::tag('span',
                                    round($offer->price->$depend_factor).' <span class="currency_span">грн</span>',
                                    ['style'=>'text-decoration:line-through;color:gray;'])
                                .'<br/>'
                                .Html::tag('span',round($price),['class'=>'js_pg-sort']).' <span class="currency_span">грн</span>';
                        } else {
                            echo Html::tag('span',round($price),['class'=>'js_pg-sort']).' <span class="currency_span">грн</span>';
                        }
                        ?></span>
                    <form method="POST" action="<?= Url::to(["/osago/form"]); ?>" class="gtm-osago-form">
                        <?php
                        echo Html::input('text', '_csrf', \Yii::$app->request->getCsrfToken(), ['hidden' => '']);
                        foreach (\Yii::$app->request->get() as $factor_key => $factor_value) {
                            echo Html::input('text', $factor_key, $factor_value, ['hidden' => '']);
                        } 
                        echo Html::input('text', 'franshiza', $depend_factor, ['hidden' => '']);
                        echo Html::input('text', 'init_price', $offer->price->$depend_factor, ['hidden' => '']);
                        echo Html::input('text', 'price', round($price), ['hidden' => '']);
                        echo Html::input('text', 'company_id', $companies[$offer->companyInfo->alias]->id, ['hidden' => '']);
                        echo Html::input('text', 'company_name', $offer->companyInfo->name, ['hidden' => '']);
                        echo Html::input('text', 'company_bonuses', $offer->companyInfo->bonuses, ['hidden' => '']);
                        echo Html::input('text', 'ks', $ksCoef, ['hidden' => '']);
                        echo Html::input('text', 'kv', $kvCoef, ['hidden' => '']);
                        ?>
                        <button type="submit" class="btn waves-effect waves-light b-ch-table__btn">Оформить</button>
                    </form>

                </td>
                <td class="hide-on-med-and-down">
                    <?= HtmlCns::bonusFlag($offer->companyInfo->bonuses) ?>
                </td>
            </tr>
            <tr class="b-ch-table__smScrBonusRow">
                <td colspan="5">
                    <span class="hide-on-med-and-up">
                        <div>Бонусы:&nbsp;</div>
                        <!-- Бонусы в мобильной версии заполняются js-ом --> 
                    </span>
                </td>
                <!-- <td colspan="3">
                </td>
                <td colspan="1" class="hide-on-med-and-down">
                </td> -->
            </tr>

        <?php
        endif;
    endforeach;                
endforeach; ?>     
                                    
                        
