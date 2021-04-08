<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Transaksi;

class DeleteTransaction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'truncate:transaction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete transaction if there is no action after 24 hours';

    /**
     * Create a new command instance.
     *
     * @return void
     */
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
        Transaksi::where('created_at', '<=',Carbon::now()->subDay())
                    ->whereNull('confirmed')
                    ->whereNull('payment')
                    ->delete();   
    }
}
