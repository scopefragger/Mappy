[![Codacy Badge](https://api.codacy.com/project/badge/Grade/27102c8cbcf542c2aa1b7a969ffa6db3)](https://www.codacy.com/app/m-jones/Mappy?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=scopefragger/Mappy&amp;utm_campaign=Badge_Grade)
[![GitHub issues](https://img.shields.io/github/issues/scopefragger/Mappy.svg)](https://github.com/scopefragger/Mappy/issues)
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://raw.githubusercontent.com/scopefragger/Mappy/master/LICENSE)

# Mappy - Laravel Site Map Generator
Mappy is a PHP 5.6 + library for Laravel 5+ that generates a sitemap in the background while users utilise the site

The site map will be generated at http://yourdomain.com/sitemap.xml

## Installation

1. The preferred method of installation is via [Packagist][] and [Composer][]. Run the following command to install the package and add it as a requirement to your project's `composer.json`:

    ```bash
    composer require scopefragger/mappy
    ```

- Add the following to your config/app.php

    ```bash
    scopefragger\mappy\MappyServiceProvider::class
    ```
    
- Add the following to any middlware you wish to be tracked ( App/Http/Kernel.php ),  Typicaly you want this to be your web group

    ```bash
    \scopefragger\mappy\Middleware\MappyMiddleware::class
    ```
    
- You must then publish a copy ofthe config to your application ( run the following ! ) a new config file ``` config/mappy.php``` wil be created
    ```bash
    php artisan vendor:publish --tag=mappy --force
    ```



- For this package,  no facade is required

## Config

As with most Laravel packages,  Mappy has the abuilty to define some options

1. Blacklist | ``` Array ```
This option allows you to stop Mappy from listing routes that start with key words or strings such as `admin` or `login`,  typicaly used for directorys that will 404 / 500 for users who are not logged in or for directorys that it may be un desirable to allow Google to find.
    ```php
    'blacklist' => [
         '/admin',
         '/my-account'
    ],
    ```

2. Strip | ``` String ```
Usefull when running development or staging enviroments,  Allows you to specify parts of a URL such as `/public/www/yoursite/ that may be part of a sites URL while in development
    ```php
    'strip' => '/blog/public',
    ```

3. Enable | ``` Bool ```
Usefull for quickly tuning off the package.  False will disable the package
    ```php
    'enable' => 'true',
    ```


4. Domain | ``` String ```
The domain you wish to be recorded and used when generating the .XML like `Strip` this is usefull for when your running in a dev or staging enviroment
    ```php
    'domain' => 'http://example.com',
    ```

## Requirements

- PHP 5.6
- LARAVEL 5.1+
- Mysql / Sqlite or any other DB that has a valid Laravel driver


## Final Comments
This Package was created to solve a problem,  it has helped in anyway feel free to link back, give a star or recomend the package to others.

If by anychance you find a bug or can reccomend a feature,  feel free to log a bug or raise a ticket in the issue tracker

## Copyright and license
MIT License

Copyright (c) 2017 Mark Anthony Jones

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

[app]: http://tools.ietf.org/html/rfc4122
[packagist]: https://packagist.org/packages/scopefragger/mappy
[composer]: http://getcomposer.org/
[source]: https://github.com/scopefragger/mappy
[release]: https://packagist.org/packages/scopefragger/mappy



