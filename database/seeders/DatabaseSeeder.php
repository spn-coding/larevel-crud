<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\Appointment;
use App\Models\Drugstore;
use App\Models\Message;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Room::factory(100)->create();    
        Appointment::factory(100)->create();
        Drugstore::factory(100)->create();
        Message::factory(100)->create();
    }
}
