<?php
use frontend\widgets\SLinkPager;
use frontend\widgets\WPostCategories;
use yii\helpers\Url;
use frontend\helpers\HtmlCns;

$this->title = $category->info->title;
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
    'content' => $category->info->title.' - Центр Народного страхования'
],'og_title');
$this->registerMetaTag([
    'property' => 'og:description',
    'content' => 'Свежие '.$category->info->title.' на ЦНС'
],'og_description');
$this->registerMetaTag([
    'property' => 'og:image',
    'content' => trim(Url::to(['/'],true),'/')."/img/slider/slider1.jpg"
],'og_image');
?>
    <main class="b-page">
        <!--section main content start-->
        <section class="container">
            <?= HtmlCns::breadcrumbs([
                [
                    'title' => $category->info->title,
                    'active' => 1
                ]
            ]); ?>
            <h1 class="b-page__title"><?= $category->info->title ?></h1>
            <div class="row">
                <div class="col s12 l9">
                    <ul class="b-postlist">
                        
                        <?php
                        foreach ($posts as $post) { ?>
                        
                        <li class="b-postlist__item">
                            <?php
                            if ($post->isThumb()) { 
                               $article_class = "b-postlist__inner"; ?>
                            
                            <figure class="b-postlist__thumb">
                                <a href="<?= Url::to(["/post/".$category->alias."/".$post->alias]) ?>" class="b-postlist__link">
                                    <?= $post->getThumb(['class'=>'b-postlist__img']) ?>
                                </a>
                            </figure>
                            
                            <?php
                            } else {
                                $article_class = "";
                            }  ?>
                            <article class="<?= $article_class ?>">
                                <h3 class="b-postlist__title">
                                    <a href="<?= Url::to(["/post/".$category->alias."/".$post->alias]) ?>"><?= $post->info->title ?></a>
                                </h3>
                                <p><?= $post->info->description ?></p>
                                <p><?= $post->pub_date ?></p>
                                <a href="<?= Url::to(["/post/".$category->alias."/".$post->alias]) ?>" class="btn waves-effect waves-light">Читать далее</a>
                            </article>
                        </li>
                        
                        <?php
                        } ?>
                        
                    </ul>

<?= SLinkPager::widget([
    'pagination' => $pages,
    'nextPageLabel' => '<i class="material-icons">chevron_right</i>',
    'prevPageLabel' => '<i class="material-icons">chevron_left</i>',
    'lastPageLabel' => True,
    'firstPageLabel' => True,
    'activePageCssClass' => "active",
    'linkOptions' => ['class'=>"waves-effect"],
    'disabledPageCssClass' => "disabled",
    'maxButtonCount' => 5,
    'options' => ['class' => "pagination center"]
]);?>                    
                    
<!--                    <ul class="pagination center">
                        <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                        <li class="active"><a href="#!">1</a></li>
                        <li class="waves-effect"><a href="#!">2</a></li>
                        <li class="waves-effect"><a href="#!">3</a></li>
                        <li class="waves-effect"><a href="#!">4</a></li>
                        <li class="waves-effect"><a href="#!">5</a></li>
                        <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                    </ul>-->
                </div>
                <aside class="col s12 l3">
                    <?php /* WPostCategories::widget([
                        'ul_class'=>['g-side-menu']
                    ]) */ ?>
                </aside>
            </div><!--/row-->
        </section>
        <!--/section main content end-->

    </main>
