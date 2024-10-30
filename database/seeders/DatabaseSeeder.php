<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
        ]);

        \App\Models\Header::create([
            'id' => 1,
            'logo' => '',
            'heading' => '',
            'location' => '',
            'contact' => '',
            'btn_text' => '',
            'link' => '',
        ]);
        \App\Models\Footer::create([
            'id' => 1,
            'footer_text' => '',
            'email' => '',
            'contact' => '',
        ]);
        \App\Models\PrivacyPolicy::create([
            'id' => 1,
            'description' => '  '
        ]);
        \App\Models\TermCondition::create([
            'id' => 1,
            'description' => '  '
        ]);
    }
}
