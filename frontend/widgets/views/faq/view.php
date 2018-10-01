<?php

use yii\helpers\Url;
?>
        <!--info section start-->
        <section class="b-page__section b-page__section--alt">
            <div class="container">
                <h2 class="b-page__subtitle">Вопросы и ответы по <?= $product->info->name ?></h2>
                <div class="row">
                    
                    <?php
                    foreach ($product->faqs as $faq) { ?>
                    
                    <div class="b-info z-depth-1" data-match-height>
                        <span class="b-info__title"><?= $faq->info->title ?></span>
                        <?= $faq->info->text ?>
                    </div>
                    
                    <?php
                    } ?>
                    
                </div><!--/row-->
                <div class="center">
                    <a href="<?= Url::to(['/'.$product->alias]) ?>" class="b-more">
                        Все об <?= $product->info->name ?> <span class="b-more__icon"><i class="icon-right"></i></span>
                    </a>
                </div>
            </div><!--/container-->
        </section>
        <!--/info section end-->