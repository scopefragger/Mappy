<?php

namespace Scopefragger\Mappy\Commands;

use App\User;
use App\DripEmailer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

/**
 * Class PurgeCommand
 *
 * Truncates the entire `mappy_urls` table when
 * `php artisan mappy:purge` is ran via command line
 *
 * @package Scopefragger\Mappy\Commands
 */
class PurgeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mappy:purge';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Purges the mappy_urls Table';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        DB::table('mappy_urls')->truncate();
    }
}
