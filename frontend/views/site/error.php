<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = 'Страница не найдена';
$this->registerMetaTag([
    'name' => 'robots',
    'content' => 'noindex, nofollow'
]);
?>
<main class="b-page">
    <!--section main content start-->
    <section class="container b-about">
        <h1 class="b-page__title">404</h1>
        <div class="row">
            <div class="col s12 l12">
                <div class="b-about__line">
                    <strong><?= nl2br(Html::encode($message)) ?></strong>
                    <p>Страница по данному адресу отсутствует или переехала куда-то в другое место.</p>
                    <p>Вы можете продолжить поиск страховых предложений, перейдя по ссылке на <?= Html::a('Главную страницу',['/']) ?></p>
                    <p>Eсли вы считаете, что это ошибка сайта, пожалуйста, свяжитесь с нами, воспользовашвись <button class="btn btn-sm waves-effect waves-light modal-trigger" data-target="callback">формой обратной связи</button></p>
                </div>
            </div>
        </div><!--/row-->
    </section>
</main>