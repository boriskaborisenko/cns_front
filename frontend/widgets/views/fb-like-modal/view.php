<div id="fb-like-modal" class="modal modal-fixed-footer">
        <div class="modal-content">
            <div class="b-page__subtitle center">Спасибо за интерес к нашему материалу! Нажмите "нравится" - нам будет очень приятно;)</div>
            <div class="fb-like" 
                 data-href="<?= Yii::$app->request->getAbsoluteUrl() ?>" 
                data-layout="standard" 
                data-action="like" 
                data-show-faces="true"
                data-size="large"
                data-width="280"
                data-post_id="<?= $postId ?>"
                >
                <div cite="<?= Yii::$app->request->getAbsoluteUrl() ?>" class="fb-xfbml-parse-ignore">
                    <a href="<?= Yii::$app->request->getAbsoluteUrl() ?>">
                        <div class="preloader-wrapper small active">
                            <div class="spinner-layer spinner-green-only">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div><div class="gap-patch">
                                    <div class="circle"></div>
                                </div><div class="circle-clipper right">
                                    <div class="circle"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close btn-flat ">
                <i class="material-icons">close</i>
            </a>
        </div>
</div>