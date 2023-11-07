<?php

namespace Modules\Alive\Databases\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Alive\Models\AliveAccount;
use Modules\Alive\Models\AliveRole;

use function Laravel\Prompts\info;
use function Laravel\Prompts\table;

class AccountSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = alive()->menus();
        $role = AliveRole::create([
            'name' => 'Super User',
            'description' => '',
            'menus' => [],
            'gates' => alive()->gates($menus),
        ]);

        $role2 = AliveRole::create([
            'name' => 'member',
            'description' => '',
            'menus' => [],
            'gates' => alive()->gates($menus),
        ]);

        AliveAccount::factory(3)
            ->create()
            ->each(function (AliveAccount $account) use ($role, $role2) {
                $account->roles()->attach($role);
                $account->roles()->attach($role2);
            });

        info('ADMIN ACCOUNTS');
        info(route('alive.welcome'));
        table(
            ['Email', 'Password'],
            AliveAccount::get()->map(fn ($account) => [
                $account->email,
                'password'
            ])
        );
    }
}
