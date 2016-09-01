<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Log\Writer;
use Monolog\Logger;

class LogApacheStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'apache-status:log';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Log apache status.';

    public static $logger;

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public static function initLogger()
    {
        if (is_null(self::$logger)) {
            self::$logger = new Writer(new Logger('StatusLog'));
            self::$logger->useDailyFiles(storage_path('logs-status/mod-status.log'), 365);
        }
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //self::$logger->info('Test');
    }

    protected function getServerStatus()
    {
    }
}

LogApacheStatus::initLogger();
