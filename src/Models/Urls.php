<?php

namespace Scopefragger\Mappy\Models;

use Illuminate\Database\Eloquent\Model;

class Urls extends Model
{
    protected $table = 'mappy_urls';
    protected $fillable = ['urls'];
}
