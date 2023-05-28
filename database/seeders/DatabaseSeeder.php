<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(AdminSeeder::class);
        if (App::environment(['local']) ||  App::environment(['staging']) || App::environment(['acceptance'])) {
            $this->call(UserFirebaseDeleteSeeder::class);
        }
    }
}
