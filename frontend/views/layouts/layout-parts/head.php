<?php
use frontend\widgets\WSeoMeta;
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= WSeoMeta::widget(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1">
    <meta name='B-verify' content='cd2548778067567618d29d29b9001856f7306f8e' />
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <script src="/js/vendor/modernizr.js"></script>
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php $this->head() ?>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter38188910 = new Ya.Metrika({
                        id:38188910,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true,
                        webvisor:true
                    });
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
//            s.src = "https://mc.yandex.ru/metrika/watch.js";
            s.src = "https://d31j93rd8oukbv.cloudfront.net/metrika/watch_ua.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/38188910" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->    
    
    <!-- Start SiteHeart code -->
    <script>
        var winW = document.documentElement.clientWidth;
        
        if(winW > 990) {
            (function(){
            var widget_id = 848478;
            _shcp =[{widget_id : widget_id}];
            var lang =(navigator.language || navigator.systemLanguage
            || navigator.userLanguage ||"en")
            .substr(0,2).toLowerCase();
            var url ="widget.siteheart.com/widget/sh/"+ widget_id +"/"+ lang +"/widget.js";
            var hcc = document.createElement("script");
            hcc.type ="text/javascript";
            hcc.async =true;
            hcc.src =("https:"== document.location.protocol ?"https":"http")
            +"://"+ url;
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hcc, s.nextSibling);
            })();
        }
        </script>
    <!-- End SiteHeart code -->
</head>
