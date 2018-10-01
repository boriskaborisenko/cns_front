<?php

use frontend\helpers\HtmlCns;
$this->title = 'Специальные предложения от страховых компаний';
?>
<main class="b-page">
    <!--special proposition section start-->
    <div class="b-page__section b-page__section--alt b-prop">
        <div class="container">
            <?= HtmlCns::breadcrumbs([
                [
                    'title' => 'Специальные предложения от страховых компаний',
                    'active' => 1
                ]
            ]); ?>
            <span class="b-page__subtitle">Специальные предложения от страховых компаний</span>
            <ul class="b-prop__list">
                <?php
                /**
                 * @var \common\modules\stocks\models\Stocks $stock
                 */
                foreach ($stocks as $stock):?>
                    <li class="b-prop__item">
                        <a href="<?= $stock->url ?>" class="b-prop__link">
                            <figure class="b-prop__inner b-prop__inner--alt">
                                <header class="b-prop__company">
                                    <img src="<?=$stock->getCompanyLogo()?>" class="b-prop__logo" alt="Company" />
                                </header>
                                <div class="b-prop__thumb">
                                    <img src="<?=$stock->getLogo()?>" class="b-prop__img" alt="Proposition" />
                                </div>
                                <figcaption class="b-prop__content" data-match-height>
                                    <span class="b-prop__title"><?=$stock->stocksInfosByLang->name?></span>
                                    <p class="b-prop__subtitle"><?=$stock->stocksInfosByLang->short_text?></p>
                                    <!--                                        <span class="btn btn-large waves-effect waves-light b-prop__btn">Рассчитать онлайн</span>-->
                                </figcaption>
                            </figure>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <!--div class="center">
                <?php /* \yii\helpers\Html::a('Все предложения <span class="b-more__icon"><i class="icon-right"></i></span>', ['/stocks/'], ['class' => 'b-more']) */ ?>
            </div-->
        </div>
    </div>
    <!--/special proposition section end-->

</main>