<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameUrlTable extends Migration
{
    /**
     * Renames the `urls` table to `mappy_urls`
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('urls', 'mappy_urls');
    }
}
