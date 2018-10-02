<?php

use yii\helpers\Url;
use frontend\widgets\WCallback;
use frontend\helpers\HtmlCns;

$this->title = $category->info->name.' - ЦНС';
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
    'content' => $category->info->name.' - Центр Народного страхования'
],'og_title');
$this->registerMetaTag([
    'property' => 'og:description',
    'content' => strip_tags($category->info->text)
],'og_description');
$this->registerMetaTag([
    'property' => 'og:image',
    'content' => trim(Url::to(['/'],true),'/').((file_exists("../../../images/services/{$category->id}.1.b.jpg")) ? "/images/post/{$category->id}.1.b.jpg" : "/img/slider/slider1.jpg")
],'og_image');
?>
    <main class="b-page">
		<div class="b-seoWrap">
			<!--section main content start-->
			<section class="container">
				<?= HtmlCns::breadcrumbs([
					[
						'title' => $category->info->name,
						'active' => 1
					],
				]); ?>
				<h1 class="b-page__title"><?= $category->info->name ?></h1>
				<!--Tabs list start-->
				<ul class="b-service js-tabs">
					
					<?php
					/*
					* @var common\models\Services
					*/
					foreach ($categories as $element) { ?>
					
					<li class="b-service__item <?= ($element->id == $category->id) ? 'current' : '' ?>">
						<a href="<?= ($element->id == $category->id) ? '#'.$element->alias : $element->url ?>" class="b-service__link">
							<figure class="b-service__img">
								<!--
								<svg height="100%" width="100%" version="1.1" y="0" x="0" viewBox="0 0 32.125984 40.000001">
									<path d="M 16.062992,0 C 7.181102,0 0,7.181102 0,16.062992 0,24.692913 14.614173,39.05512 15.181102,39.62205 15.433071,39.87402 15.748031,40 16.062992,40 c 0.314961,0 0.629921,-0.12598 0.88189,-0.37795 C 17.574803,38.99213 32.125984,24.629921 32.125984,16.062992 32.125984,7.244094 24.944882,0 16.062992,0 Z" />
								</svg>
								<i class="icon-<?= $element->serviceIcon ?>"></i>
								-->
								<img src="/newicons/<?= $element->serviceIcon ?>.svg" alt="">
							</figure>
							<?= $element->info->name ?>
						</a>
					</li>
					
					<?php
					} ?>
					
				</ul>
				<!--/Tabs list end-->
	
				<div class="row">
					<!--Tabs content start-->
					<div class="col s12 l9 js-tabs-content">
						<div class="b-service__inner" id="<?= $category->alias ?>">
							<ul class="b-service-list">
								
								<?php
								/*
								* @var common\models\Products
								*/
								foreach ($category->products as $element) { ?>
	
								<li class="b-service-list__item">
									<div class="b-service-list__info">
										<a href="<?= $element->url ?>" class="b-service-list__title"><?= $element->info->name ?>&emsp;<i class="icon-right"></i></a>
										<?= $element->info->text ?>
									</div>
									<div class="b-service-list__action">
										<a id="gtm-btn-calc-<?= $element->alias ?>-onl" href="<?= $element->calculatorUrl ?>" class="btn btn-large waves-effect waves-light b-service-list__btn">Узнать стоимость</a>
									</div>
								</li>
								
								<?php
								} ?>
							
							</ul>
						</div>
					</div>
					<!--/Tabs content end-->
	
					<!--Info sidebar start-->
					<aside class="col s12 l3 b-service-info">
						<span class="b-service-info__title">
							<i class="material-icons">play_arrow</i>
								<?= strip_tags($custom_fields['right_text_block_title']->info->text); ?>
						</span>
								<?=$custom_fields['right_text_block_content']->info->text; ?>
<!--    	                <ol>
							<li>Показываем актуальные тарифы страховых компаний</li>
							<li>Подбираем самый подходящий</li>
							<li>Оформляем страховку онлайн</li>
							<li>Оплачивайте онлайн удобным способом</li>
							<li>Доставляем полис</li>
						</ol>-->
					</aside>
					<!--/Info sidebar end-->
				</div><!--/row-->
			</section>
			<!--/section main content end-->
        
                        <?php $seo = \frontend\widgets\WSeoText::widget(); ?>
                        <?php if($seo): ?>
                            <!--seo block-->
                            <div class="b-page__section b-page__section--alt b-seo">
                                <article class="container b-seo__text">
                                    <?php echo $seo; ?>
                                </article>
                            </div>
                            <!--/seo block-->
                        <?php endif; ?>
		</div>
        <?= (!empty($three_myths)) ? $three_myths->info->text : '' ?>

        <!--section video review start-->
<!--        <section class="b-page__section">-->
<!--            <div class="container">-->
<!--                <h3 class="b-page__subtitle">Отзывы автовладельцев</h3>-->
<!--                <div class="b-review">-->
<!--                    <ul class="b-review__list js-tabs">-->
<!--                        <li class="b-review__item">-->
<!--                            <a href="#review1" class="b-review__link">Возмещение по PZU</a>-->
<!--                        </li>-->
<!--                        <li class="b-review__item">-->
<!--                            <a href="#review2" class="b-review__link">Возмещение по UNIQA</a>-->
<!--                        </li>-->
<!--                        <li class="b-review__item">-->
<!--                            <a href="#review3" class="b-review__link">Возмещение по AXA</a>-->
<!--                        </li>-->
<!--                        <li class="b-review__item">-->
<!--                            <a href="#review4" class="b-review__link">Возмещение по Провидна</a>-->
<!--                        </li>-->
<!--                        <li class="b-review__item">-->
<!--                            <a href="#review5" class="b-review__link">Возмещение по ВУСО</a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                    <div class="b-review__tabs js-tabs-content">-->
<!--                        <div class="b-review__inner" id="review1">-->
<!--                            <figure class="b-review__thumb">-->
<!--                                <a href="https://youtu.be/v2AC41dglnM" class="b-review__videolink js-videolink">-->
<!--                                    <img src="img/review/review01.jpg" class="b-review__img" alt="Review" />-->
<!--                                    <span class="b-review__icon"><i class="icon-play"></i></span>-->
<!--                                </a>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="b-review__inner" id="review2">-->
<!--                            <figure class="b-review__thumb">-->
<!--                                <a href="https://youtu.be/gEPmA3USJdI" class="b-review__videolink js-videolink">-->
<!--                                    <img src="http://placehold.it/630x354" class="b-review__img" alt="Review" />-->
<!--                                    <span class="b-review__icon"><i class="icon-play"></i></span>-->
<!--                                </a>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="b-review__inner" id="review3">-->
<!--                            <figure class="b-review__thumb">-->
<!--                                <a href="https://youtu.be/pAgnJDJN4VA" class="b-review__videolink js-videolink">-->
<!--                                    <img src="http://placehold.it/630x354/f55c4d" class="b-review__img" alt="Review" />-->
<!--                                    <span class="b-review__icon"><i class="icon-play"></i></span>-->
<!--                                </a>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="b-review__inner" id="review4">-->
<!--                            <figure class="b-review__thumb">-->
<!--                                <a href="https://youtu.be/v2AC41dglnM" class="b-review__videolink js-videolink">-->
<!--                                    <img src="http://placehold.it/630x354/119ec9" class="b-review__img" alt="Review" />-->
<!--                                    <span class="b-review__icon"><i class="icon-play"></i></span>-->
<!--                                </a>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="b-review__inner" id="review5">-->
<!--                            <figure class="b-review__thumb">-->
<!--                                <a href="https://youtu.be/gEPmA3USJdI" class="b-review__videolink js-videolink">-->
<!--                                    <img src="http://placehold.it/630x354/000000" class="b-review__img" alt="Review" />-->
<!--                                    <span class="b-review__icon"><i class="icon-play"></i></span>-->
<!--                                </a>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div><!--/container-->
<!--        </section>-->
        <!--/section video review end-->

        <?= (!empty($how_we_choose_companies)) ? $how_we_choose_companies->info->text : '' ?>
        <?=WCallback::widget()?>           
    </main>

    <!--modal window video start-->
    <div id="videomodal" class="modal">
        <div class="modal-content">
            <div class="video-container">
                <iframe width="560" height="315" src="img/review/review01.jpg"></iframe>
            </div>
        </div>
    </div>
    <!--/modal window video end-->
