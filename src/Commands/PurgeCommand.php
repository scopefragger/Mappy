<?php

namespace scopefragger\mappy\Commands;

use App\User;
use App\DripEmailer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

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
    protected $description = 'Purges the URL Table';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        DB::table('urls')->truncate();
    }
}
