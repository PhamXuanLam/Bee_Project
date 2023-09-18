<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Session;

class ResetConfirmTokenCommend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:confirm_token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete confirm code';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Session::forget('confirmToken');
    }
}
