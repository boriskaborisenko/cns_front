<?php
use yii\helpers\Html;
?>
<!--callback section start-->
    <div class="b-callback widget-callback">
        <div class="container">
            <span class="b-callback__title">Мы готовы оформить страховой полис прямо сейчас</span>
            <form action="/callback" method="POST" id="gtm-callback">
                <?= Html::input('text', '_csrf', \Yii::$app->request->getCsrfToken(), ['hidden' => '']) ?>
                <div class="row">
                    <div class="col s12 m6 l4">
                        <label class="b-callback__label">Оставьте номер для связи</label>
                        <input type="tel" name="tel" class="b-callback__input js-input-phone" maxlength="20" required/>
                        <input type="text" name="page_name" value="<?php echo \Yii::$app->request->url; ?>" hidden/>
                    </div>
                    <div class="col s12 m6 l4">
                        <label class="b-callback__label">&nbsp;</label>
                        <button type="submit" class="btn b-callback__btn waves-effect waves-light">Перезвоните мне</button>
                    </div>
                </div>
                <p class="b-callback__agree">
                    <input type="checkbox" id="chk1" name="check_box_agree" value="very_fast" class="filled-in js-callback-check" checked/>
                    <label for="chk1">связаться как можно быстрее</label>
                </p>
                <div class="row hide js-callback-check-target">
                    <div class="col s12 m12 l6">
                        <div class="b-callback__time">
                            <i class="material-icons b-callback__timeicon">query_builder</i>
                            <div class="input-field">
                                <select name="when">
                                    <option value="default_very_fast" disabled selected>Укажите предпочитаемое время звонка</option>
                                    <option value="9_11">С 9 до 11</option>
                                    <option value="11_15">С 11 до 15</option>
                                    <option value="15_18">С 15 до 18</option>
                                    <option value="18_20">С 18 до 20</option>
                                    <option value="very_fast">Как можно быстрее</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="text" hidden name="page_name" value="<?php echo \Yii::$app->request->url; ?>">
            </form>
        </div>
    </div>
    <!--/callback section end-->