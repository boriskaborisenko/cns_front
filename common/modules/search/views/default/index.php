<?php
use yii\helpers\Html;

$this->title = 'Поиск';
?>
    <main class="b-page">
        <!--section main content start-->
        <section class="container">
            <h1 class="b-page__title">Результаты поиска по запросу <span class="font-blue">"<?= \Yii::$app->request->get('s'); ?>"</span></h1>
            <div class="row">
                <div class="col s12 l12">
                    <ul class="b-postlist">
                        
                        <?php
                        if ($rows) {
                            foreach ($rows as $row) { ?>
                        
                        <li class="b-postlist__item pg-mt-50">
                            <h3 class="b-postlist__title">
                                <a href="<?= $row->alias ?>"><?= $row->info->title ?></a>
                            </h3>
                            <?= $row->info->description ?>
                            <a href="<?= $row->alias ?>" class="btn waves-effect waves-light">Читать далее</a>
                        </li>
                        
                        <?php
                            }
                        } else {
                            echo Html::tag('p','Ничего не найдено');
                        }  ?>
                        
                    </ul>

<?php /*SLinkPager::widget([
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
]); */ ?>                    
                    
            </div><!--/row-->
        </section>
        <!--/section main content end-->

    </main>
