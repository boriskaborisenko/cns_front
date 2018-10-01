jQuery(document).ready(function ($) {
    $('.js-tabs').on('click', 'a', function () {
        google.maps.event.trigger(window, 'resize', {});
    });

//    $('ul.tabs').attr('style',"width:100%");
//    $('.indicator').attr('style',"right: 747px; left: 0px;");   
});
