// CONTENT
// FB SDK
// Recent view on home page
// Validate phone input
// Show fb like modal

// SCRIPT
// FB SDK
/*
var fbLikeModal = function(url, html_element) {
    console.log(url);
    var postId = $(html_element).data('post_id');
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: '/cookie/post/set-viewed-post',
        data:{id:postId},
        success: function (data) {
            $('#fb-like-modal').closeModal();
        },
        complete: function (jqXHR, textStatus) {

        }
    });
}
*/    
window.fbAsyncInit = function() {
  FB.init({
    appId      : '935184403238621',
    xfbml      : true,
    version    : 'v2.8'
  });
  FB.AppEvents.logPageView();

  //FB.Event.subscribe('edge.create', fbLikeModal);
};

(function(d, s, id){
   var js, fjs = d.getElementsByTagName(s)[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement(s); js.id = id;
   js.src = "//connect.facebook.net/en_US/sdk.js";
   fjs.parentNode.insertBefore(js, fjs);
 }(document, 'script', 'facebook-jssdk'));
   
// Recent view on home page
$('.js-history').on('click', '.js-del', function () {//удаляем элементы
    $.ajax({
        type: 'DELETE',
        dataType: 'json',
        url: '/cookie/default/delete-recent-view'+ '?' + $.param({"lid_id":$(this).data('lid_id')}),
        success: function (data) {
        },
        complete: function (jqXHR, textStatus) {

        }
    });
});

// Validate phone input
/*$('#form-callback, #osago-order-form-1-click, greencard-order-form-1-click').on('submit', function (e) {
    e.preventDefault();
    var $tel = $(this).find('.js-input-phone');
    if ($tel.val() == '') {
        $tel.addClass('invalid')
    } else {
        var income_ras = $(this).data('income-ras');
        // GTM tracking
        var resDL = dataLayer.push({'eventValue': income_ras}); 
        var resFBQ = fbq('track', 'Purchase', {currency: 'UAH', value: income_ras});
        console.log(resDL,resFBQ);
        var self = this;
        setTimeout(function () {
            self.submit();
        }, 500);
    }
});*/

jQuery(document).ready(function ($) {
    //
    // Анимация секций при скролле на десктопе
    //---------------------------------------------------------------------------------------
    function animateOnScroll() {
        var $elems = $('.js-animate'),
            $window = $(window);

        //проверка при загрузке страницы
        $elems.each(function () {
            var $el = $(this);
            if ($.inViewport($el)) {//если блок видим
                animateElem($el);//анимируем
            };
        });

        //проверка при скролле
        $elems = $('.js-animate');//возьмем те что остались после первой проверки
        $elems.each(function () {
            var $el = $(this);
            $window.bind('scroll', checkInView);

            function checkInView() {
                if ($.inY($el, -50)) {
                    $window.unbind('scroll', checkInView);//отключили отслеживание
                    animateElem($el);//анимировали
                }
            }
        });
        

        function animateElem(el) {
            var animateClass = el.data('animate');
            el.removeClass('js-animate').addClass('animated ' + animateClass);
            setTimeout(function () {//уберем мусор
                el.removeAttr('data-animate').removeClass('animated ' + animateClass);
            }, 2000);
        };
    };

    if ($.viewportW() > 992) {
        animateOnScroll();
    };
});


// Show fb like modal
/*
$(document).ready(function(){
    if ($('.b-page').length != 0 && $('#fb-like-modal').length != 0) {
        var pageHeight = $('.b-page').height();
            pageHeight = parseInt(pageHeight/2);
            $(window).scroll(function() {
                var height = $(window).scrollTop();
                console.log(pageHeight,height);
                if(height  > pageHeight) {
                    $('#fb-like-modal').openModal({
                        complete: function () {}
                    });
                    $(window).unbind('scroll');
                }
            });
    }
});
*/