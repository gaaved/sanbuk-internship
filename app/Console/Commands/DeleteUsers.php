<?php

namespace App\Console\Commands;

use App\Models\Interfaces\StatusInterface;
use App\Models\User;
use Illuminate\Console\Command;

class DeleteUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:users:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all inactive users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        User::where('status', StatusInterface::STATUS_INACTIVE)->delete();
        return Command::SUCCESS;
    }
}
