<?php

namespace Modules\Alive\Console\Commands;

use Illuminate\Console\Command;
use Modules\Alive\Models\AliveAccount;

use function Laravel\Prompts\table;

class AliveAccountCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'alive:account';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show list of alive account';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        table(
            ['ID', 'Name', 'E-Mail Address'],
            AliveAccount::get()->map(fn ($account) => [$account->id, $account->name, $account->email]),
        );
    }
}
