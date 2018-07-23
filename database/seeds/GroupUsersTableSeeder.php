<?php

use Illuminate\Database\Seeder;

class GroupUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\GroupUser::create(['name' => 'Invitado']);
        App\GroupUser::create(['name' => 'Cliente']);
        App\GroupUser::create(['name' => 'Distribuidor']);

    }
}
