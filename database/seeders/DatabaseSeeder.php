<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // generate dummy user data from UserFactory
        \App\Models\User::factory(10)->create();

        // create a custom user data
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('12345678'),
            'phone' => '1234567890',
        ]);

        // seeder profile_clinics manual
        \App\Models\ProfileClinic::factory()->create([
            'name' => 'Noeni Medika',
            'address' => 'Jl. Poros Pammanjengan, Moncongloe, Kec. Moncong Loe, Kabupaten Maros, Sulawesi Selatan 90562',
            'phone' => '081341097688',
            'email' => 'kliniknoen@gmail.com',
        ]);

        // call Doctor seeder
        $this->call(DoctorSeeder::class);
    }
}
