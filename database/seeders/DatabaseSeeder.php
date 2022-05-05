<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $viktor = new User(['name' => 'Victor', 'email'=>'victor@victor.ru',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
        ]);
        $nastya = new User(['name' => 'Nastya', 'email'=>'nastya@victor.ru',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
        ]);
        $viktor->save();
        $nastya->save();

        $this->call([
            ArticleSeeder::class,
        ]);
    }
}
