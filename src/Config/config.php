<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Blacklisted Routes
    |--------------------------------------------------------------------------
    |
    | This option allows you to stop Mappy from listing routes that start with
    | key words or strings such as `admin` or `login`,  typicaly used for
    | directorys that will 404 / 500 for users who are not logged in or for
    | directorys that it may be un desirable to allow Google to find.
    |
    */

    'blacklist' => [
        '/admin',
        '/my-account'
    ],

    /*
    |--------------------------------------------------------------------------
    | Strip
    |--------------------------------------------------------------------------
    |
    | Usefull when running development or staging enviroments,  Allows you to
    | specify parts of a URL such as `/public/www/yoursite/ that may be part
    | of a sites URL while in development
    |
    */

    'strip' => '',

    /*
    |--------------------------------------------------------------------------
    | Domain
    |--------------------------------------------------------------------------
    |
    | The domain you wish to be recorded and used when generating the .XML
    | like `Strip` this is usefull for when your running in a dev or staging
    | enviroment
    |
    */

    'domain' => 'http://example.com',

];
