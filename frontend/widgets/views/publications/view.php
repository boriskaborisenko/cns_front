    <div class="b-page__section">
        <div class="container">
            <a href="/post/publications" class="b-page__subtitle special_offers"><?php echo $category->info->title; ?></a>
            <ul class="b-prop__list">
                <?php foreach ($category->posts as $post):?>
                    <li class="b-prop__item">
                        <a href="<?php echo $post->url ?>" class="b-prop__link">
                            <figure class="b-prop__inner b-prop__inner--alt">
                                <div class="b-prop__thumb">
                                    <?php echo $post->getThumb(["class" => 'b-prop__img'], 's'); ?>
                                </div>
                                <figcaption class="b-prop__content" data-match-height>
                                    <p><?php echo $post->getPubDate('d.m.Y'); ?></p>
                                    <span class="b-prop__title"><?php echo $post->info->title; ?></span>
                                    <?php echo $post->info->description; ?>
                                </figcaption>
                            </figure>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="center">
                <?php echo \yii\helpers\Html::a('Все публикации <span class="b-more__icon"><i class="icon-right"></i></span>', ['/post/publications'], ['class' => 'b-more']); ?>
            </div>
        </div>
    </div>
