<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'michael',
            'email' => 'admin@michael.com',
            'role' => 'admin',
            'password' => bcrypt('adminmichael'),
        ]);
    }
}
