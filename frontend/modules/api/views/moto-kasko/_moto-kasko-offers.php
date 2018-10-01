<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\helpers\HtmlCns;

$ratings = [];
foreach($offers as $offer) {
    $ratings[] = $offer->companyInfo->rating;
}

$max_rating = max($ratings);

foreach($offers as $offer):
        if ($offer->price != 0 && isset($companies[$offer->companyInfo->alias])): 

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
?>

            <tr>
                <td>
                    <figure class="b-choice-table__company">
                        <img src="/images/companies/<?= $companies[$offer->companyInfo->alias]->id  ?>.1.b.jpg" class="b-ch-table__logo" alt="<?= $offer->companyInfo->name ?>" />
                        <figcaption>
                            <!--a href="#">? отзывов</a-->
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
                    <span class="b-ch-table__price b-ch-table__price_franshiza"><span class="js_pg-sort">2</span>%</span>
                </td>
                <td class="center">
                    <span class="b-ch-table__price b-ch-table__price-1">
                        <?php 
                        if (round($offer->price) > round($offer->price_special)) {
                            echo Html::tag('span',
                                    round($offer->price).' <span class="currency_span">грн</span>',
                                    ['style'=>'text-decoration:line-through;color:gray;'])
                                .'<br/>'
                                .Html::tag('span',round($offer->price_special),['class'=>'js_pg-sort']).' <span class="currency_span">грн</span>';
                        } else {
                            echo Html::tag('span',round($offer->price),['class'=>'js_pg-sort']).' <span class="currency_span">грн</span>';
                        }
                        ?>
                    </span>
                    <form method="POST" action="<?= Url::to(["/moto-kasko/form"]); ?>" class="gtm-moto-kasko-form">
                        <?php
                        echo Html::input('text', '_csrf', \Yii::$app->request->getCsrfToken(), ['hidden' => '']);
                        foreach (\Yii::$app->request->get() as $factor_key => $factor_value) {
                            echo Html::input('text', $factor_key, $factor_value, ['hidden' => '']);
                        } 
                        echo Html::input('text', 'price', round($offer->price_special), ['hidden' => '']);
                        echo Html::input('text', 'company_id', $companies[$offer->companyInfo->alias]->id, ['hidden' => '']);
                        echo Html::input('text', 'company_name', $offer->companyInfo->name, ['hidden' => '']);
                        echo Html::input('text', 'company_bonuses', $offer->companyInfo->bonuses, ['hidden' => '']);

                        ?>
                        <button type="submit" class="btn waves-effect waves-light b-ch-table__btn">Купить</button>
                    </form>
                </td>
            </tr>
        <?php
        endif;
endforeach; ?>     
                                    
                        
