<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\helpers\HtmlCns;

$i=0;
foreach($offers as $offer): ?>

    <?php if (isset($companies[$offer->companyInfo->alias])): 
        $i++;
        ?>

        <tr class="grey lighten-5">
            <td rowspan="3">
                <figure class="b-choice-table__company">
                    <img src="/images/companies/<?= $companies[$offer->companyInfo->alias]->id  ?>.1.b.jpg" class="b-ch-table__logo" alt="Logo">
                </figure>
            </td>
            <td>
                <input name="group<?= $i ?>" data-id="<?= $i ?>" class="js-program" value="ekonom" type="radio" id="test<?= $i ?>1" checked />
                <label for="test<?= $i ?>1">Эконом&nbsp;<!--i class="material-icons tiny js-tooltip" data-tooltip="Контент подсказки">info_outline</i--></label>
            </td>
            <td>
                <?php 
                if (round($offer->price->classic) > round($offer->price_special->classic)) {
                    echo Html::tag('span',
                            round($offer->price->classic + $offer->ns->price)." грн",
                            ['class'=>'b-ch-table__price b-ch-table__price--old'])
                        .Html::tag('span',round($offer->price_special->classic + $offer->ns->price)." грн",['class'=>'b-ch-table__price b-ch-table__price-1 js-program-ekonom']);
                } else {
                    if ($offer->price->classic != 0) {
                        $price = $offer->price->classic + $offer->ns->price;
                    } else {
                        $price = $offer->price->classic;
                    }
                    echo Html::tag('span',round($price)." грн",['class'=>'b-ch-table__price b-ch-table__price-1 js-program-ekonom']);
                }
                ?>
            </td>

            <td class="center" rowspan="3">
                <form id="tourism-offer-form-<?= $i ?>" method="post" action="<?= Url::to(["/tourism/form"]); ?>">
                    <?php echo Html::input('text', 'country', $get['country'], ['hidden' => '']); ?>
                    <?php echo Html::input('text', 'purpose', $get['purpose'], ['hidden' => '']); ?>
                    <?php echo Html::input('text', 'insurance_sum', $get['insurance_sum'], ['hidden' => '']); ?>
                    <?php echo Html::input('text', 'ns_insurance_sum_alias', $offer->ns->alias, ['hidden' => '']); ?>
                    <?php echo Html::input('text', 'ns_insurance_sum', $offer->ns->value.' '.$offer->ns->currency, ['hidden' => '']); ?>
                    <?php echo Html::input('text', 'date_start', $get['date_start'], ['hidden' => '']); ?>
                    <?php echo Html::input('text', 'date_end', $get['date_end'], ['hidden' => '']); ?>
                    <?php echo Html::input('text', 'programm', 'ekonom', ['hidden' => '']); ?>
                    <?php echo Html::input('text', 'price', round($offer->price->classic + $offer->ns->price), ['hidden' => '']); ?>
                    <?php echo Html::input('text', 'company_id', $companies[$offer->companyInfo->alias]->id, ['hidden' => '']); ?>
                    <?php echo Html::input('text', 'company_name', $offer->companyInfo->name, ['hidden' => '']); ?>
                    <?php foreach ($get['ages'] as $age) {
                        echo Html::input('text', 'ages[]', $age, ['hidden' => '']);
                    } ?>
                    <?php echo Html::input('text', '_csrf', \Yii::$app->request->getCsrfToken(), ['hidden' => '']) ?>
                    <button type="submit" class="btn waves-effect waves-light b-ch-table__btn">Оформить...</button>
                </form>
                
            </td>
            <td class="hide-on-med-and-down" rowspan="3">
                <?= HtmlCns::bonusFlag($offer->companyInfo->bonuses) ?>
            </td>
        </tr>
        <?php
        if ($offer->price->gold != 0) : ?>
        <tr class="grey lighten-5">
            <td>
                <input name="group<?= $i ?>" data-id="<?= $i ?>" class="js-program" value="standart" type="radio" id="test<?= $i ?>2" />
                <label for="test<?= $i ?>2">Стандарт&nbsp;<!--i class="material-icons tiny js-tooltip" data-tooltip="Контент подсказки">info_outline</i--></label>
            </td>
            <td>
                <?php 
                if (round($offer->price->gold) > round($offer->price_special->gold)) {
                    echo Html::tag('span',
                            round($offer->price->gold + $offer->ns->price)." грн",
                            ['class'=>'b-ch-table__price b-ch-table__price--old'])
                        .Html::tag('span',round($offer->price_special->gold + $offer->ns->price)." грн",['class'=>'b-ch-table__price b-ch-table__price-1 js-program-standart']);
                } else {
                    if ($offer->price->gold != 0) {
                        $price = $offer->price->gold + $offer->ns->price;
                    } else {
                        $price = $offer->price->gold;
                    }
                    echo Html::tag('span',round($price)." грн",['class'=>'b-ch-table__price b-ch-table__price-1 js-program-standart']);
                }
                ?>
            </td>

        </tr>
        <?php
        else : ?>
        <tr></tr>
        <?php
        endif; ?>
        <?php
        if ($offer->price->platinum != 0) : ?>
        <tr class="grey lighten-5">
            <td>
                <input name="group<?= $i ?>" data-id="<?= $i ?>" class="js-program" value="premium" type="radio" id="test<?= $i ?>3" />
                <label for="test<?= $i ?>3">Премиум&nbsp;<!--i class="material-icons tiny js-tooltip" data-tooltip="Контент подсказки">info_outline</i--></label>
            </td>
            <td>
                <?php 
                if (round($offer->price->platinum) > round($offer->price_special->platinum)) {
                    echo Html::tag('span',
                            round($offer->price->platinum + $offer->ns->price)." грн",
                            ['class'=>'b-ch-table__price b-ch-table__price--old'])
                        .Html::tag('span',round($offer->price_special->platinum + $offer->ns->price)." грн",['class'=>'b-ch-table__price b-ch-table__price-1 js-program-premium']);
                } else {
                    if ($offer->price->platinum != 0) {
                        $price = $offer->price->platinum + $offer->ns->price;
                    } else {
                        $price = $offer->price->platinum;
                    }
                    echo Html::tag('span',round($price)." грн",['class'=>'b-ch-table__price b-ch-table__price-1 js-program-premium']);
                }
                ?>
            </td>

        </tr>
        <?php
        else : ?>
        <tr></tr>
        <?php
        endif; ?>
    <?php endif; ?>
<?php endforeach; ?>                   
                        