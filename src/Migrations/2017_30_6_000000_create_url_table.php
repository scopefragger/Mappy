<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUrlTable
 *
 * Standrd migration file for laravel
 * Creates the `url` table with soft deletes and one field,  `url`
 */
class CreateUrlTable extends Migration
{
    /**
     * Inserts the additional rows required for authentication
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url')->default('/');
            $table->softDeletes();
            $table->timestamps();
        });
    }
}
