<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use frontend\helpers\HtmlCns;
use yii\helpers\Url;
use frontend\widgets\WSeoText;

$this->title = 'Страховые компании';
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
    'content' => 'Страховые компании - Центр Народного страхования'
],'og_title');
$this->registerMetaTag([
    'property' => 'og:description',
    'content' => 'Лучшие страховые компании от ЦНС'
],'og_description');
$this->registerMetaTag([
    'property' => 'og:image',
    'content' => trim(Url::to(['/'],true),'/')."/img/slider/slider1.jpg"
],'og_image');
?>
<main class="b-page b-seoWrap">
    <section class="container">
        <?= HtmlCns::breadcrumbs([
            [
                'title' => 'Страховые компании',
                'active' => 1
            ]
        ]); ?>
        <h1 class="b-page__title">Страховые компании</h1>
    </section>
    <div class="divider"></div>
    
    <?php $seo = WSeoText::widget(); ?>
    <?php if($seo): ?>
        <!--seo block-->
        <div class="b-page__section b-page__section--alt b-seo">
            <article class="container b-seo__text">
                <?php echo $seo; ?>
            </article>
        </div>
        <!--/seo block-->
    <?php endif; ?>
        
    <div id="pg-page__offers1" class="b-page__section scrollspy">
        <div class="container">
            <!--<p class="hide-on-large-only"><i class="material-icons">info_outline</i> Эту таблицу можно "скроллить"!</p>-->
            <div class="g-table-wrap">
                <table class="highlight bordered b-ch-table">
                    <thead>
                    <tr>
                        <th>Компания</th>
                        <th class="b-ch-table__trustLevelTh js-sort-col center hide-on-small-only">Уровень доверия<span class="tooltipped" data-position="top" data-tooltip="Шкала показывает как часто наши клиенты выбирают ту или иную страховую компанию"><i class="material-icons">info_outline</i></span></th>
                        <th  class="center"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($companies as $company): ?>
                    <?php   // округляем значение рейтинга для его дальнейшего вывода   
                            $js_rating = round((($company->rating / $max_rating) * 10), 0);
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
                                    <?=Html::a('<img src="/images/companies/' . $company->id . '.1.b.jpg" class="b-ch-table__logo"
                                         alt="' . $company->info->name . '"/>', ["/company/{$company->id}"])?>
                                    <figcaption>
                                        <!--a href="#">? отзывов</a-->
                                        <?=Html::a('О компании', ["/company/{$company->id}"])?>
                                    </figcaption>
                                </figure>
                            </td>
                            <td class="center hide-on-small-only">
                                <span style="display:none" class="js_pg-sort"><?= $js_rating; ?></span>
                                <span class="i-level-<?= $js_rating; ?> js-tooltip" data-position="top" data-tooltip="Популярность компании"></span>
                            </td>
                            <td class="center" >
                                <?=Html::a('Перейти', ["/company/{$company->id}"],
                                    ['class' => 'btn waves-effect waves-light b-ch-table__btn'])?>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
