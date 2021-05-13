<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <script src="/public/tarteaucitron/tarteaucitron.js"></script>
    <script>
        tarteaucitron.init({
            "privacyUrl": "/main/confidentialite",
            /* Privacy policy url */
            "hashtag": "#tarteaucitron",
            /* Open the panel with this hashtag */
            "cookieName": "tarteaucitron",
            /* Cookie name */
            "orientation": "middle",
            /* Banner position (top - bottom) */
            "showAlertSmall": false,
            /* Show the small banner on bottom right */
            "cookieslist": false,
            /* Show the cookie list */
            "showIcon": false,
            /* Show cookie icon to manage cookies */
            "iconPosition": "BottomRight",
            /* Position of the icon between BottomRight, BottomLeft, TopRight and TopLeft */
            "adblocker": false,
            /* Show a Warning if an adblocker is detected */
            "DenyAllCta": true,
            /* Show the deny all button */
            "AcceptAllCta": true,
            /* Show the accept all button when highPrivacy on */
            "highPrivacy": true,
            /* HIGHLY RECOMMANDED Disable auto consent */
            "handleBrowserDNTRequest": false,
            /* If Do Not Track == 1, disallow all */
            "removeCredit": false,
            /* Remove credit link */
            "moreInfoLink": true,
            /* Show more info link */
            "useExternalCss": false,
            /* If false, the tarteaucitron.css file will be loaded */
            /*"cookieDomain": ".ronald-begoc.fr", /* Shared cookie for subdomain website */
            "readmoreLink": "",
            /* Change the default readmore link pointing to tarteaucitron.io */
            "mandatory": true /* Show a message about mandatory cookies */
        });
        (tarteaucitron.job = tarteaucitron.job || []).push('astroweb');

        tarteaucitron.services.astroweb = {
            "key": "astroweb",
            "type": "other",
            "name": "astroweb",
            "needConsent": true,
            "cookies": ['astroweb'],
            "readmoreLink": "", // If you want to change readmore link
            "js": function() {
                "use strict";
                tarteaucitron.fallback(['astroweb'], function(x) {
                    return '<div class="testing_replaced"></div>';
                });
            },
            "fallback": function() {
                "use strict";
                var id = 'astroweb';
                tarteaucitron.fallback(['astroweb'], function(elem) {
                    return tarteaucitron.engage(id);
                });
            }
        };
    </script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AstroWeb</title>
    <link rel="shortcut icon" href="/public/images/favicon.ico" type="image/x-icon">

    <script src="/public/js/jquery.min.js"></script>
    <script src="/public/js/popper.min.js"></script>
    <script src="/public/js/bootstrap.min.js"></script>
    <script src="/public/js/bootstrap-table.min.js"></script>
    <script src="/public/js/bootstrap-table-fr-FR.min.js"></script>
    <script src="/public/js/bootstrap-table-mobile.min.js"></script>
    <script src="/public/js/jquery.fancybox.min.js"></script>
    <script src="/public/js/all.js"></script>
    <script src="/public/BBCode/js/jquery.wysibb.js"></script>
    <script src="/public/BBCode/js/jquery.wysibb.fr.js"></script>

    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/bootstrap-table.min.css">
    <link rel="stylesheet" href="/public/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="/public/css/styleDefault.css">
    <link rel="stylesheet" href="/public/css/styleForum.css">
    <link rel="stylesheet" href="/public/BBCode/css/wbbtheme.css">
</head>

<body>
    <a id="button"><i class="fas fa-arrow-up"></i></a>
    <div class="container">
        <header>
            <?= $header ?>
        </header>
        <?= $menu ?>
        <div class="minTaille">
            <?= $contenu ?>
        </div>
        <footer>
            <?= $footer ?>
        </footer>
    </div>

    <script src="/public/js/script.js"></script>

</body>

</html>