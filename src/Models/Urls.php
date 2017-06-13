<?php

namespace Scopefragger\Mappy\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Urls
 *
 * Standard laravel Model,  manages the mappy_urls table
 * Only fillable value is `urls` and time stamps are enabled
 *
 * @package Scopefragger\Mappy\Models
 */
class Urls extends Model
{
    protected $table = 'mappy_urls';
    public $timestamps = true;
    protected $fillable = ['urls'];
}
