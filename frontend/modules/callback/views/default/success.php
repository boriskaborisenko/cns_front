<?php
$this->title = 'Обратный звонок - Заявка сохранена'; 
?>
<main class="b-page">
    <!--section main content start-->
    <section class="container b-about">
        <h1 class="b-page__title">Спасибо! Заявка сохранена.</h1>
        <div class="row">
            <div class="col s12 l12">
                <?php
                    if(isset($callback_when)) {
                        if($callback_when == 'very_fast') {
                            echo 'Мы свяжемся с Вами в ближайшее время.';
                        } else {
                            echo 'Мы свяжемся с Вами в указанное время.';
                        }
                    }
                ?>
            </div>
        </div><!--/row-->
    </section>
    <!--/section main content end-->
</main>
