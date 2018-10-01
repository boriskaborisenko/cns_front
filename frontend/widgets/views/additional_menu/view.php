<!--additional menu section start-->
<div class="b-page__section">
    <div class="container">
        <div class="row">

            <?php
            /*
             * $var \common\models\Services
             */
            foreach ($services as $element) { ?>

            <div class="col s12 m6 l3">
                <ul class="b-part-menu">
                    <li class="b-part-menu__item">
                        <figure class="b-part-menu__img">
                            <!--<svg height="100%" width="100%" version="1.1" y="0" x="0"
                                 viewBox="0 0 32.125984 40.000001">
                                <path
                                    d="M 16.062992,0 C 7.181102,0 0,7.181102 0,16.062992 0,24.692913 14.614173,39.05512 15.181102,39.62205 15.433071,39.87402 15.748031,40 16.062992,40 c 0.314961,0 0.629921,-0.12598 0.88189,-0.37795 C 17.574803,38.99213 32.125984,24.629921 32.125984,16.062992 32.125984,7.244094 24.944882,0 16.062992,0 Z"/>
                            </svg>-->
                            <i class="icon-<?= $element->serviceIcon ?>"></i>
                        </figure>
                        <a href="<?= $element->url ?>" class="b-part-menu__title"><?= $element->info->name ?></a>
                    </li>

                    <?php
                    /*
                     * $var \common\models\Products
                     */
                    foreach ($element->products as $product): ?>

                    <li class="b-part-menu__item">
                        <?=\yii\helpers\Html::a($product->info->name, $product->calculatorUrl, ['class' => 'b-part-menu__link'])?>
                    </li>

                    <?php endforeach; ?>

                </ul>
            </div>

            <?php
            } ?>

        </div>
    </div>
</div>
<!--/additional menu section end-->