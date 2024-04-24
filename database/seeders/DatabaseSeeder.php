<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Job;
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
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'first_name' => 'Adam',
             'last_name' => 'Emir',
             'email' => 'adamemir@gmail.com',
         ]);

        $this->call(JobSeeder::class);
    }
}
