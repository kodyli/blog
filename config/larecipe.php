<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Documentation Routes
    |--------------------------------------------------------------------------
    |
    | These options configure the behavior of the LaRecipe docs basic route
    | where you can specify the url of your documentations, the location
    | of your docs and the landing page when a user visits /docs route.
    |
    |
    */


    /*
    |--------------------------------------------------------------------------
    | Cache
    |--------------------------------------------------------------------------
    |
    | Obviously rendering markdown at the back-end is costly especially if
    | the rendered files are massive. Thankfully, caching is considered
    | as a good option to speed up your app when having high traffic.
    |
    | Caching period unit: minutes
    |
    */

    'cache'       => [
        'enabled' => false,
        'period'  => 5
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Appearance
    |--------------------------------------------------------------------------
    |
    | Here you can add configure the appearance of your docs. For example,
    | you can set the primary and secondary colors that will give your
    | documentation a unique look. You can set the fav of your docs.
    |
    |
    */

    'ui'                 => [
        'code_theme'     => 'dark', // or: light
        'fav'            => '',     // eg: fav.png
        'fa_v4_shims'    => true, // Add FontAwesome v4 shims prevent BC break
        'show_side_bar'  => true,
        'colors'         => [
            'primary'    => '#787AF6',
            'secondary'  => '#2b9cf2'
        ],

        'theme_order'    => null // ['LaRecipeDarkTheme', 'customTheme']
    ],

    /*
    |--------------------------------------------------------------------------
    | SEO
    |--------------------------------------------------------------------------
    |
    | These options configure the SEO settings of your docs. You can set the
    | author, the description and the keywords. Also, LaRecipe by default
    | sets the canonical link to the viewed page's link automatically.
    |
    |
    */

    'seo'                 => [
        'author'          => '',
        'description'     => '',
        'keywords'        => '',
        'og'              => [
            'title'       => '',
            'type'        => 'article',
            'url'         => '',
            'image'       => '',
            'description' => '',
        ]
    ],


    /*
    |--------------------------------------------------------------------------
    | Components and Packages
    |--------------------------------------------------------------------------
    |
    | Once you create a new asset or theme, its directory will be
    | published under `larecipe-components` folder. However, If
    | you want a different location, feel free to change it.
    |
    |
    */

    'packages' => [
        'path' => 'larecipe-components',
    ],

    'blade-parser' => [
        'regex' => [
            'code-blocks' => [
                'match' => '/\<pre\>(.|\n)*?<\/pre\>/',
                'replacement' => '<code-block>',
            ]
        ]
    ]
];
