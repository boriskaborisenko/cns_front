<?php
use yii\helpers\Html;
?>
<ul class="<?= reset($ul_class) ?>">
    <?php
    foreach ($categories as $value) {
        echo Html::tag(
                'li',
                Html::a(
                    $value->info->title,
                    '/'.$value->alias
                )
        );
    }
    ?>
</ul>