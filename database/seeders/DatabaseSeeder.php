<?php

namespace Database\Seeders;
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

        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            UserSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            AttributeSetSeeder::class,
            AttributeSeeder::class,
            OptionSeeder::class,

        ]);
       // \App\Models\User::factory(50)->create();
    }
}
