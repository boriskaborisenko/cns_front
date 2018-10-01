<?php

use frontend\widgets\WPostCategories;
use frontend\helpers\HtmlCns;
use yii\helpers\Url;

$this->title = $post->info->title;
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
    'content' => $post->info->title.' - Центр Народного страхования'
],'og_title');
$this->registerMetaTag([
    'property' => 'og:description',
    'content' => strip_tags($post->info->description)
],'og_description');
$this->registerMetaTag([
    'property' => 'og:image',
    'content' => trim(Url::to(['/'],true),'/').((file_exists("./images/post/{$post->id}.1.b.jpg")) ? "/images/post/{$post->id}.1.b.jpg" : "/img/slider/slider1.jpg")
],'og_image');
?>
    <main class="b-page">
        <!--section main content start-->
        <div class="container">
            <?= HtmlCns::breadcrumbs([
                [
                    'title' => $category->info->title,
                    'href' => '/post/'.$category->alias
                ],
                [
                    'title' => $post->info->title,
                    'active' => 1
                ],
            ]); ?>

            <div class="row">
                <article class="col s12 l9">
                    <h1 class="b-page__title"><?= $post->info->title ?></h1>
                        <?php // echo $post->getThumb(['class' => 'responsive-img']); ?>
                    <?= $post->info->scText ?>
                </article>
   
                <aside class="col s12 l3">
                    <?php /* WPostCategories::widget([
                        'ul_class'=>['g-side-menu']
                    ]) */ ?>
                </aside>
            </div>
            <!--span class='st_facebook_large' displayText='Facebook'></span>
            <span class='st_vkontakte_large' displayText='Vkontakte'></span>
            <span class='st_twitter_large' displayText='Tweet'></span-->
        </div>
        <!--/section main content end-->
              
    </main>

<?php // echo \frontend\widgets\WfbLikeModal::widget(['postId' => $post->id]); ?>