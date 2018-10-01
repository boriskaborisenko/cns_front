<div class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <ul class="b-part-menu">
                <li class="b-part-menu__item">
                    <figure class="b-part-menu__img">
                        <svg height="100%" width="100%" version="1.1" y="0" x="0"
                                 viewBox="0 0 32.125984 40.000001">
                                <path
                                    d="M 16.062992,0 C 7.181102,0 0,7.181102 0,16.062992 0,24.692913 14.614173,39.05512 15.181102,39.62205 15.433071,39.87402 15.748031,40 16.062992,40 c 0.314961,0 0.629921,-0.12598 0.88189,-0.37795 C 17.574803,38.99213 32.125984,24.629921 32.125984,16.062992 32.125984,7.244094 24.944882,0 16.062992,0 Z"/>
                        </svg>
                        <i class="icon-car"></i>
                    </figure>
                    <a href="/services/auto" class="b-page__title">Дополнительно об ОСАГО</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m6 l3">
            <ul class="b-part-menu">
                <?php
                foreach ($col1 as $link): ?>
                <li class="b-part-menu__item">
                    <a href="<?= rtrim($link->alias,'/') ?>"><?= $link->info->h1 ?></a>                   
                </li>
                <?php
                endforeach; ?>
            </ul>
        </div>
        <div class="col s12 m6 l3">
            <ul class="b-part-menu">
                <?php
                foreach ($col2 as $link): ?>
                <li class="b-part-menu__item">
                    <a href="<?= rtrim($link->alias,'/') ?>"><?= $link->info->h1 ?></a>                   
                </li>
                <?php
                endforeach; ?>
            </ul>
        </div>
        <div class="col s12 m6 l3">
            <ul class="b-part-menu">
                <?php
                foreach ($col3 as $link): ?>
                <li class="b-part-menu__item">
                    <a href="<?= rtrim($link->alias,'/') ?>"><?= $link->info->h1 ?></a>                   
                </li>
                <?php
                endforeach; ?>
            </ul>
        </div>
        <div class="col s12 m6 l3">

        </div>

    </div>
</div>