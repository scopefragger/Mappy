<?php

return [


    /*
    |--------------------------------------------------------------------------
    | Enabled
    |--------------------------------------------------------------------------
    |
    | Allows you to quickly disbale the package in the event of a compleate disaster
    | Accepts ( Bool ) : true | false
    |
    */

    'enabled' => env(MAPPY_ENABLED, true),

    /*
    |--------------------------------------------------------------------------
    | Blacklisted Routes
    |--------------------------------------------------------------------------
    |
    | This option allows you to stop Mappy from listing routes that start with
    | key words or strings such as `admin` or `login`,  typicaly used for
    | directorys that will 404 / 500 for users who are not logged in or for
    | directorys that it may be un desirable to allow Google to find.
    | Accepts ( Array ) : []
    |
    */

    'blacklist' => env(MAPPY_BLACKLIST, [
        '/admin',
        '/my-account'
    ]),

    /*
    |--------------------------------------------------------------------------
    | Strip
    |--------------------------------------------------------------------------
    |
    | Usefull when running development or staging enviroments,  Allows you to
    | specify parts of a URL such as `/public/www/yoursite/ that may be part
    | of a sites URL while in development
    | Accepts ( String ) : ""
    |
    */

    'strip' => env(MAPPY_STRIP, ''),

    /*
   |--------------------------------------------------------------------------
   | Disable Logged in users
   |--------------------------------------------------------------------------
   |
   | Usefull for disabling the plugin for users who are logged in,  can protect
   | routes that may be to complicated for the blacklist rules. When enabled
   | Usess who are logged in with not generate new urls in the sitemap
   | Accepts ( Bool ) : true | false

   */

    'disabled_authed' => env(MAPPY_DISABLED_AUTHED, false),

];
