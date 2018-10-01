<?php
/* @var $this yii\web\View */
use frontend\widgets\WCallback;
use frontend\widgets\WBuyProduct;
use frontend\helpers\HtmlCns; 
use yii\helpers\Url; 

$this->title = $company->info->name;
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
    'content' => $company->info->name
],'og_title');
$this->registerMetaTag([
    'property' => 'og:description',
    'content' => strip_tags($company->info->text)
],'og_description');
$this->registerMetaTag([
    'property' => 'og:image',
    'content' => trim(Url::to(['/'],true),'/').((file_exists("../../../images/companies/{$company->id}.1.b.jpg")) ? "/images/companies/{$company->id}.1.b.jpg" : "/img/slider/slider1.jpg")
],'og_image');
?>
    <main class="b-page">

        <!--section main content start-->
        <section class="container">
            <?= HtmlCns::breadcrumbs([
                [
                    'title' => 'Страховые компании',
                    'href' => '/insurance_companies'
                ],
                [
                    'title' => $company->info->name,
                    'active' => 1
                ]
            ]); ?>
            <h1 class="b-page__title"><?= $company->info->name ?></h1>
            
            <!--table class="responsive-table">
                <thead>
                    <tr>
                        <th class="center-align">Выплаты на 2015г.</th>
                        <th class="center-align">Средний срок выплат</th>
                        <th class="center-align">Работает на рынке</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="center-align"><b>250</b> млн.грн.</td>
                        <td class="center-align"><b>2-3</b> дня</td>
                        <td class="center-align"><b>9</b> лет</td>
                    </tr>
                </tbody>
            </table-->
        </section>
        <!--/section main content end-->

        <!--tabs section start-->
        <section class="">
            <div class="container">
                <div class="row">
                    <div class="col s12 m5 l3">
                        <!--tabs start-->
                        
                            <ul class="b-review__list--alt js-tabs">
								<p>
									<img src="/images/companies/<?= $company->id ?>.1.b.jpg" class="responsive-img" alt="Logo" />
								</p>
                                <li class="b-review__item">
                                    <a href="#tab1" class="b-review__link">О компании</a>
                                </li>
                                
                            </ul>

                        <!--/tabs end-->
                    </div>
                    <div class="col s12 m12 l9">
						<div class="row b-page__section--alt"><!--inner row-->
							<div class="col s12 m12 l8">
								<!--tabs start-->
								<div class="b-review">
		
									<div class="js-tabs-content">
		
										<div class="b-review__inner" id="tab1">
											<?= $company->info->text ?>
											
										</div>
		
									</div><!--/b-review__tabs-->
								</div><!--/b-review-->
								<!--/tabs end-->
							</div>
							
							<aside class="col s12 m12 l4">
								<!--banner start-->
								<?php echo WBuyProduct::widget([
										'company' => $company,
								]); ?>
								<!--/banner end-->
							</aside>
						</div><!--/inner row-->
					</div>
                </div><!--/row-->
            </div>
        </section>
        <!--/tabs section end-->

        <!--table section start>
        <section class="b-page__section">
            <div class="container">
                <h2 class="b-page__title">Другие страховые компании</h2>
                <table class="highlight responsive-table">
                    <thead>
                        <tr>
                            <th>Страховые</th>
                            <th><img src="img/company/logo01.png" alt="Company" class="g-table-logo" /></th>
                            <th><img src="img/company/logo02.png" alt="Company" class="g-table-logo" /></th>
                            <th><img src="img/company/logo03.png" alt="Company" class="g-table-logo" /></th>
                            <th><img src="img/company/logo04.png" alt="Company" class="g-table-logo" /></th>
                            <th><img src="img/company/logo05.png" alt="Company" class="g-table-logo" /></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Выплаты на 2015</th>
                            <td>250 млн грн</td>
                            <td>250 млн грн</td>
                            <td>250 млн грн</td>
                            <td>250 млн грн</td>
                            <td>250 млн грн</td>
                        </tr>
                        <tr>
                            <th>Средний срок выплат</th>
                            <td>2-3 дня</td>
                            <td>2-3 дня</td>
                            <td>2-3 дня</td>
                            <td>2-3 дня</td>
                            <td>2-3 дня</td>
                        </tr>
                        <tr>
                            <th>Работает на рынке</th>
                            <td>9 лет</td>
                            <td>9 лет</td>
                            <td>9 лет</td>
                            <td>9 лет</td>
                            <td>9 лет</td>
                        </tr>
                        <tr>
                            <th>Рейтинг отзывов</th>
                            <td><span class="g-brand-color">4.5</span></td>
                            <td><span class="g-brand-color">4.5</span></td>
                            <td><span class="g-brand-color">4.5</span></td>
                            <td><span class="g-brand-color">4.5</span></td>
                            <td><span class="g-brand-color">4.5</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <!--/table section end-->

        <?=WCallback::widget()?>       
    </main>
