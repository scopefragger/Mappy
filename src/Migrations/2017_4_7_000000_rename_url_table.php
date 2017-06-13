<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class RenameUrlTable
 *
 * Migration file renames the `urls` table to the more constructive `mappy_urls`
 */
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
