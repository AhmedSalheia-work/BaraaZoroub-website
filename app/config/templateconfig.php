<?php

return [
    'template'=>[
        'loader'              => TEMPLATE_PATH . 'loader.php',
        'wraperstart'         => TEMPLATE_PATH . 'wraperstart.php',
        'header'              => TEMPLATE_PATH . 'header.php',
        ':view'               => ':action_view',
        'footer'              => TEMPLATE_PATH . 'footer.php'
    ],
    'about'=>[
        'wraperstart'              => TEMPLATE_PATH . 'wraperstart.php'
    ],

    'header'=>[
        'css' => [
            'plugin'            => CSS.'plugins.css',
            'fontawesome'       => 'https://use.fontawesome.com/releases/v5.11.2/css/all.css',
            'google_font'       => 'https://fonts.googleapis.com/css?family=Roboto',
            'swiper'            => CSS . 'swiper.min.css',
            'style'             => CSS . 'style.css',
            'stylel'             => CSS . 'style:lang.css',
            'fullpage'          => CSS . 'fullpage.min.css',
            'jquery.fancybox'   => CSS . 'jquery.fancybox.min.css',
            'animate.css'       => CSS . 'animate.css'
        ],
        'js'  => [
            'google'            => 'https://www.googletagmanager.com/gtag/js?id=G-E5FCPFJ9EC',
            'gtag'              => JS.'gtag.js'
        ]
    ],

    'footer'=>[
        'js' => [
            'JQuery'            => JS . 'jQuery3.4.1.js',
            'bootstrap'         => JS . 'bootstrap.bundle.min.js',
            'swiper'            => JS . 'swiper.min.js',
            'wow'               => JS . 'wow.js',
            'fullpage'          => JS . 'fullpage.min.js',
            'jquery.fancybox'   => JS . 'jquery.fancybox.min.js',
            'typed.js'          => JS . 'typed.min.js',
            'script'            => JS . 'script.js'
        ]
    ]
];