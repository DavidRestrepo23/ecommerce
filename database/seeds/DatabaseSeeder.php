<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {      
        $this->call(GroupUsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        App\Administrator::create([
            'name' => 'David',
            'lastname' => 'Restrepo',
            'email' => 'drv404@hotmail.com',
            'password' => bcrypt('admin'),
        ]);

        $this->call(SuppliersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(FeaturesTableSeeder::class);
        $this->call(AttributesTableSeeder::class);



    }
}
