    <!--special proposition section start-->
    <div class="<?= $sectionClass ?>">
        <div class="container">
            <a href="/stocks" class="b-page__subtitle special_offers">Специальные предложения от страховых компаний</a>
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
                                    <img src="<?=$stock->getCompanyLogo()?>" class="b-prop__logo" alt="Company"/>
                                </header>
                                <div class="b-prop__thumb">
                                    <img src="<?=$stock->getLogo()?>" class="b-prop__img" alt="Proposition"/>
                                </div>
                                <figcaption class="b-prop__content" data-match-height>
                                    <span class="b-prop__title"><?=$stock->stocksInfosByLang->name?></span>
                                    <?=$stock->stocksInfosByLang->short_text?>
                                    <!--                                        <span class="btn btn-large waves-effect waves-light b-prop__btn">Рассчитать онлайн</span>-->
                                </figcaption>
                            </figure>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="center">
                <?=\yii\helpers\Html::a('Все предложения <span class="b-more__icon"><i class="icon-right"></i></span>',
                    Yii::$app->urlManager->createUrl(['stocks']), ['class' => 'b-more'])?>
            </div>
        </div>
    </div>
    <!--/special proposition section end-->