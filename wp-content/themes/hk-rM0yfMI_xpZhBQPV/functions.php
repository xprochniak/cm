<?php
/**
 * @package HK
 */

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('widgets');
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        )
    );
});

add_action('wp_enqueue_scripts', function () {
    wp_register_style('hk', false);
    wp_enqueue_style('hk');

    wp_add_inline_style('hk',
        '@font-face' .
        "{ font-family: 'Roboto I50'; font-style: normal; font-weight: 100 1000; font-stretch: 100%; font-display: swap; src: url('" . get_template_directory_uri() . "/roboto-I20.woff2') format('woff2-variations'); unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7, U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF; }" .

        '@font-face' .
        "{ font-family: 'Roboto I50'; font-style: normal; font-weight: 100 1000; font-stretch: 100%; font-display: swap; src: url('" . get_template_directory_uri() . "/roboto-I00.woff2') format('woff2-variations'); unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD; }" .

        '@font-face' .
        "{ font-family: 'Lora I50'; font-style: normal; font-weight: 400 700; font-stretch: 100%; font-display: swap; src: url('" . get_template_directory_uri() . "/lora-I20.woff2') format('woff2-variations'); unicode-range: U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7, U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF; }" .

        '@font-face' .
        "{ font-family: 'Lora I50'; font-style: normal; font-weight: 400 700; font-stretch: 100%; font-display: swap; src: url('" . get_template_directory_uri() . "/lora-I00.woff2') format('woff2-variations'); unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD; }" .

        '*,*::before,*::after' .
        '{ box-sizing: border-box; }' .

        'html,body,div,span,applet,object,iframe,' .
        'h1,h2,h3,h4,h5,h6,p,blockquote,pre,' .
        'a,abbr,acronym,address,big,cite,code,' .
        'del,dfn,em,img,ins,kbd,q,s,samp,' .
        'small,strike,strong,sub,sup,tt,var,' .
        'b,u,i,center,' .
        'dl,dt,dd,ol,ul,li,' .
        'fieldset,form,label,legend,' .
        'table,caption,tbody,tfoot,thead,tr,th,td,' .
        'article,aside,canvas,details,embed,' .
        'figure,figcaption,footer,header,hgroup,' .
        'menu,nav,output,ruby,section,summary,' .
        'time,mark,audio,video' .
        '{ margin: 0; padding: 0; border: 0; font: inherit; }' .

        'article,aside,details,figcaption,figure,' .
        'footer,header,hgroup,menu,nav,section' .
        '{ display: block; }' .

        'body' .
        '{ -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }' .

        'body' .
        "{ font-family: 'Roboto I50'; }" .

        'h1,h2,h3,h4,h5,h6' .
        "{ font-family: 'Lora I50'; }" .

        'ol,ul' .
        '{ list-style: none; }' .

        'blockquote,q' .
        '{ quotes: none; }' .

        'blockquote:before,blockquote:after,' .
        'q:before,q:after' .
        '{ content: none; }'
    );
}, 0);

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('hk', get_template_directory_uri() . '/hk.js', array(), null, true);
}, 0);

add_action('wp_enqueue_scripts', function () {
    wp_dequeue_style('classic-theme-styles');
    wp_deregister_style('classic-theme-styles');

    wp_dequeue_style('wp-block-library');
    wp_deregister_style('wp-block-library');

    wp_dequeue_style('global-styles');
    wp_deregister_style('global-styles');
}, 100);
