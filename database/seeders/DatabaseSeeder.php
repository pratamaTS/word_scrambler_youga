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
        $this->call(UsersTableSeeder::class);
        $this->command->info('User table seeded!');

        $this->call(CategoriesTableSeeder::class);
        $this->command->info('Categories table seeded!');

        $this->call(WordsTableSeeder::class);
        $this->command->info('Words table seeded!');
    }
}
