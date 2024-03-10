<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Mensaje;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MensajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Mensaje::count() > 0) {
            return;
        }

        $users_count = User::count();
        for ($i = 1; $i <= $users_count; $i++) {
            Mensaje::factory()->count(2)->user($i)->create();
        }
    }
}
