<?php
session_start();
if ($_SESSION['converted'] && !$_SESSION['lead_generated']) {
    $_SESSION['lead_generated'] = true;
    ?>
    <!DOCTYPE html>
    <html lang="ru" dir="ltr">

    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/counter.css">
        <link rel="stylesheet" href="css/complete.css">
        <!-- Google Tag Manager -->
        <!-- <script>
            (function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    'gtm.start': new Date().getTime(),
                    event: 'gtm.js'
                });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s),
                    dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-T2NDN39');
        </script> -->
        <!-- End Google Tag Manager -->

        <!-- Hotjar Tracking Code for https://nkavd.com/ -->
        <!-- <script>
            (function (h, o, t, j, a, r) {
                h.hj = h.hj || function () {
                    (h.hj.q = h.hj.q || []).push(arguments)
                };
                h._hjSettings = {hjid: 2745255, hjsv: 6};
                a = o.getElementsByTagName('head')[0];
                r = o.createElement('script');
                r.async = 1;
                r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
                a.appendChild(r);
            })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
        </script> -->
        <!-- Facebook Pixel Code -->
        <!-- <script>
            !function (f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function () {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '1185247878667986');
            fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
                       src="https://www.facebook.com/tr?id=1185247878667986&ev=PageView&noscript=1"/></noscript> -->
        <!-- End Facebook Pixel Code -->

    </head>

    <body>
    <div class="form_result" id="form_result">
        <div class="circle-loader" id="circleLoader">
            <div class="checkmark draw" id="checkmark"></div>
        </div>
        <p>??????????????! ???????? ???????????? ??????????????.</p>
        <p id="form_result_text"></p>
        <button class="block__button" id="button" onclick="history.back()">
            <div class=" block__button_desktop-text">
                <div id="circle"></div>
                <span>
                    ???? ??????????????
                </span>
            </div>
            <div class="block__button_mobile-text">
                <div id="circle"></div>
                <span>
                    ???? ??????????????
                </span>
            </div>
        </button>
    </div>
    <figure>
        <div class="left_complete"></div>
        <div class="right_complete"></div>
    </figure>
    <script>
        let circles = document.getElementsByClassName("circle-loader");
        let checkmark = document.getElementsByClassName("checkmark");
        const formResult = document.getElementById('form_result');
        const formResultText = document.getElementById('form_result_text');
        for (var j = 0; j < circles.length; j++)
            circles[j].classList.toggle("load-complete");
        checkmark[0].classList.toggle('checkmarkActive');


        function worktime() {
            let now = new Date();
            let nowHour = now.getUTCHours();
            let nowDay = now.getDay();
            if (nowHour < 7 | nowHour > 16 | nowDay === 6 | nowDay === 0) {
                formResultText.innerHTML = "???????? ?????????????? ?????????? ???? - ???? ?? 9:00 ???? 18:00";
            } else {
                formResultText.innerHTML = "?????? ???????????????? ???????????????? ?? ???????? ?? ?????????????? 15-???? ??????????!";
            }
        }

        worktime();
    </script>
    </body>
    <!-- Google Tag Manager (noscript) -->
    <!-- <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T2NDN39" height="0" width="0"
                style="display:none;visibility:hidden"></iframe>
    </noscript> -->
    <!-- End Google Tag Manager (noscript) -->

    </html>
    <?php
} else {
    ?>

    <!DOCTYPE html>
    <html lang="ru" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="icon" href="favicon.png">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/counter.css">
        <link rel="stylesheet" href="css/complete.css">
    </head>
    <body>
    <div class="form_result" id="form_result">
        <div class="circle-loader" id="circleLoader">
            <div class="checkmark draw" id="checkmark"></div>
        </div>
        <p>???????? ???????????? ?????? ??????????????. ?????? ???????????????? ???????????????? ?? ???????? ?? ???????????? ??????????????.</p>
        <p id="form_result_text"></p>
        <button class="block__button" id="button" onclick="history.back()">
            <div class=" block__button_desktop-text">
                <div id="circle"></div>
                <span>
                    ???? ??????????????
                </span>
            </div>
            <div class="block__button_mobile-text">
                <div id="circle"></div>
                <span>
                    ???? ??????????????
                </span>
            </div>
        </button>
    </div>
    <figure>
        <div class="left_complete"></div>
        <div class="right_complete"></div>
    </figure>
    </body>
    </html>

    <?php
}
?>