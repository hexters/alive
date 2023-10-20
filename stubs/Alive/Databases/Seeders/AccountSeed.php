<?php

namespace Modules\Alive\Databases\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Alive\Models\AliveAccount;
use Modules\Alive\Models\AliveRole;

class AccountSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role = AliveRole::create([
            'name' => 'Super User',
            'description' => '',
            'menus' => alive()->menus(),
            'gates' => [],
        ]);

        AliveAccount::factory(3)
            ->create()
            ->each(function (AliveAccount $account) use ($role) {
                $account->roles()->attach($role);
            });
    }
}
