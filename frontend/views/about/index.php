<?php

use frontend\widgets\WCategories;
use frontend\helpers\HtmlCns;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'О нас - ЦНС';
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
    'content' => 'О нас - Центр Народного страхования'
],'og_title');
$this->registerMetaTag([
    'property' => 'og:description',
    'content' => 'Ответь себе на 5 вопросов и выбери Центр страхования'
],'og_description');
$this->registerMetaTag([
    'property' => 'og:image',
    'content' => trim(Url::to(['/'],true),'/')."/img/slider/slider1.jpg"
],'og_image');
?>
    <main class="b-page">

        <!--section main content start-->
        <section class="container b-about">
            <?= HtmlCns::breadcrumbs([
                [
                    'title' => $about->info->title,
                    'active' => 1
                ]
            ]); ?>
            <h1 class="b-page__title">Ответь себе на 5 вопросов и выбери Центр страхования</h1>
            <div class="row">
                <div class="col s12 l12">
                    <?= $sections['about-content']->info->text ?>
                </div>
            </div><!--/row-->
            <div class="row">
                <div class="col s12 m3">
                    <svg viewBox="0 0 169.057 160" version="1.1" class="b-about__img">
                        <g fill="#119ec9">
                            <path d="M105.66 111.698h-6.036c-1.667 0-3.02 1.35-3.02 3.02 0 1.666 1.353 3.017 3.02 3.017h6.036c1.668 0 3.02-1.35 3.02-3.018 0-1.668-1.352-3.02-3.02-3.02z" />
                            <path d="M149.434 57.358c-.508 0-1.01.026-1.51.064v-36.29C147.924 9.48 138.444 0 126.794 0h-84.53C30.612 0 21.132 9.48 21.132 21.132v36.29c-.5-.038-1-.064-1.51-.064C8.802 57.358 0 66.16 0 76.98c0 6.77 3.426 12.946 9.057 16.535v39.818c0 .135.012.268.03.398.467 7.91 7.044 14.2 15.064 14.2v3.02c0 5 4.07 9.06 9.06 9.06s9.06-4.06 9.06-9.05v-3.02h84.53v3.02c0 4.997 4.07 9.06 9.06 9.06s9.06-4.062 9.06-9.056v-3.02c8.02 0 14.6-6.29 15.07-14.195.02-.13.03-.263.03-.398V93.52c5.63-3.59 9.06-9.767 9.06-16.535 0-10.82-8.802-19.62-19.622-19.62zM27.17 21.132c0-8.323 6.77-15.094 15.094-15.094h84.528c8.323 0 15.095 6.77 15.095 15.094V58.87c-7.084 2.963-12.076 9.964-12.076 18.11v13.594c-2.52-1.9-5.66-3.027-9.05-3.027H48.3c-3.396 0-6.532 1.128-9.057 3.027V76.98c0-8.146-4.99-15.147-12.075-18.11V21.132zm9.056 129.81c0 1.666-1.354 3.02-3.018 3.02-1.665 0-3.02-1.354-3.02-3.02v-3.017h6.038v3.018zm102.642 0c0 1.666-1.354 3.02-3.02 3.02-1.663 0-3.018-1.354-3.018-3.02v-3.017h6.038v3.018zm16.74-61.86c-1.01.515-1.646 1.553-1.646 2.687v41.06c0 4.99-4.062 9.05-9.056 9.05H24.15c-4.993 0-9.056-4.07-9.056-9.06V91.77c0-1.135-.635-2.173-1.644-2.69-4.572-2.337-7.412-6.973-7.412-12.1 0-7.49 6.094-13.584 13.585-13.584 7.49 0 13.585 6.094 13.585 13.585v25.67c0 8.33 6.77 15.1 15.094 15.1h39.244c1.668 0 3.02-1.35 3.02-3.02s-1.352-3.02-3.02-3.02H48.302c-4.994 0-9.057-4.06-9.057-9.05 0-4.993 4.063-9.056 9.057-9.056h72.453c4.993 0 9.056 4.063 9.056 9.057 0 4.99-4.06 9.054-9.05 9.054h-3.02c-1.66 0-3.02 1.35-3.02 3.02 0 1.667 1.35 3.018 3.02 3.018h3.02c8.32 0 15.1-6.77 15.1-15.09V76.99c0-7.49 6.1-13.585 13.59-13.585s13.59 6.095 13.59 13.585c0 5.127-2.84 9.763-7.413 12.1z" />
                        </g>
                    </svg>
                </div>
                <div class="col s12 m9">
                    <div class="b-about__hero valign-wrapper">
                        <p class="valign">
                            У нас ты сможешь оформить страховку не выходя из дома.<br />
                            Мы среди первых, кто запустил онлайн страхование.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!--/section main content end-->

        <section class="b-page__section b-page__section--alt">
            <div class="container">
                <h2 class="b-page__subtitle">Остались вопросы?</h2>
                <div class="row">
                    <!--form-->
                    <form action="/feedback" method="POST" class="col s12 l7">
                        Позвони, и наши консультанты помогут во всем разобраться!<br />
                        <div class="input-field">
                            <div class="select-wrapper">
                                <textarea id="text01" name="msg" class="materialize-textarea" required="" ></textarea>
                            </div>
                            <label for="text01">Как мы можем Вам помочь? <i class="material-icons">chat_bubble_outline</i></label>
                        </div>
                        <div class="input-field">
                            <div class="select-wrapper">
                                <input type="text" name="email_or_phone" id="inp01" required="" />
                            </div>
                            <label for="inp01">Электронная почта или телефон</label>
                        </div>
                        <div class="input-field">
                            <div class="select-wrapper">
                                <input type="text" name="person_name" id="inp02" required="" />
                            </div>
                            <label for="inp02">Как Вас зовут?</label>
                        </div>
                        <button type="submit" class="btn btn-large waves-effect waves-light">Жду ответ</button>
                        <p>&nbsp;</p>
                        <?= Html::input('text', '_csrf', \Yii::$app->request->getCsrfToken(), ['hidden' => '']) ?>
                    </form>
                    <!--/form-->
                    <aside class="col s12 l4 offset-l1">
                        <?php foreach ($employees as $employee): ?>
                            <div class="row">
                                <div class="col l3 m3 s3">
                                    <img alt="<?=$employee->info->position ?>" class="responsive-img circle" src="<?=$employee->sImg ?>" />
                                </div>
                                <div class="col l9 m9 s9">
                                    <strong><?=$employee->info->position ?></strong><br />
                                    <?=$employee->info->name ?><br />
                                    <?=$employee->info->text ?>
                                    <a href="mailto:<?=$employee->email ?>"><?=$employee->email ?></a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </aside>
                </div>
            </div>
        </section>

        <section class="b-page__section">
            <div class="container">
                <?= $sections['about-bottom']->info->text ?>
            </div>
        </section>
    </main>
