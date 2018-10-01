<?php
use common\models\Products;
?>
        <!--history section start-->
        <div class="b-history">
            <div class="container">
                <span class="b-history__title">Ранее вы интересовались</span>
            </div>
            <div class="container b-history__slider">    
                <ul class="b-history__list js-history">
                    
                    <?php
                    foreach ($lids as $element) { ?>
                   
                    <li class="b-history__item">
                        <figure class="b-history__inner">
                            <a href="<?= Products::getStaticProductUrl($element['product'])."?".$element['params'] ?>" class="b-history__link">
                                <!--<img src="/img/del/insurance-osago-320x110.jpeg" class="b-history__img" />-->
                                <img src="<?= '/images/products/'.$element['product_id']['product_id'].'.1.b.jpg'; ?>" class="b-history__img" />
                            </a>
                            <span class="b-history__del js-del" data-lid_id="<?= $element['id'] ?>"><i class="icon-cross"></i></span>
                            <figcaption class="b-history__content">
                                <span class="b-history__subtitle">
                                    <?= Products::getStaticProductName($element['product']) ?>
                                </span>
                                <span class="b-history__price">от <?= $element['price'] ?> грн</span>
                                <a href="<?= Products::getStaticProductUrl($element['product'])."?".$element['params'] ?>" class="btn-floating btn-large waves-effect waves-light b-history__btn"><i class="icon-arrow-right"></i></a>
                            </figcaption>
                        </figure>
                    </li>
                    
                    <?php
                    } ?>
                    
                </ul>
                <div class="b-history__nav">
                    <span class="b-history__arrow b-history__arrow--next js-history-next"></span>
                    <span class="b-history__arrow b-history__arrow--prev js-history-prev"></span>
                </div>
            </div>
        </div>
        <!--/history section end-->

