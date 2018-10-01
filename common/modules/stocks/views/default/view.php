<?php
/**
 * @var \common\modules\stocks\models\Stocks $stock
 */

use frontend\helpers\HtmlCns;
$this->title = $stock->stocksInfosByLang->name;
?>
<main class="b-page">

    <!--section main content start-->
    <section class="container b-about">
        <?= HtmlCns::breadcrumbs([
            [
                'title' => 'Специальные предложения от страховых компаний',
                'href' => '/stocks'
            ],
            [
                'title' => $stock->stocksInfosByLang->name,
                'active' => 1
            ],
        ]); ?>        
        <h1 class="b-page__title"><?=$stock->stocksInfosByLang->name?></h1>
        <div class="row">
            <div class="col s12 l12">
                <div class="b-about__line default-list">     
                    <!-- img src="<?=$stock->getLogo()?>" class="max-full-width float_left" alt="Logo" /-->
                    <?=$stock->stocksInfosByLang->scText?>
                    <hr/>
                    <!--about company-->
                        <div class="b-company">
                            <a href="<?=$stock->getCompanyUrl()?>" class="b-company__link">
                                <img src="<?=$stock->getCompanyLogo()?>" class="b-company__logo" alt="" />
                            </a>
                            <div class="b-company__entry">
                                <div class="b-company__info">
                                    <?php echo $stock->company->info->text; ?>
                                </div>
                                <a href="<?=$stock->getCompanyUrl()?>" class="b-more">
                                    Подробнее о компании
                                    <span class="b-more__icon"><i class="icon-right"></i></span>
                                </a>
                            </div>
                        </div>
                        <!--/about company-->  
                <span class='st_facebook_large' displayText='Facebook'></span>
                <span class='st_vkontakte_large' displayText='Vkontakte'></span>
                <span class='st_twitter_large' displayText='Tweet'></span>
                </div>
             
            </div>
        </div><!--/row-->
    </section>
</main>
