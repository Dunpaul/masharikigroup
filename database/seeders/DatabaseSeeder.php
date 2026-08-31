<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call(MarketContentSeeder::class);
        $this->call(AcademyProgramSeeder::class);
        $this->call(MarketProgramSeeder::class);
        $this->call(MarketFaqSeeder::class);
        $this->call(MarketNewsSeeder::class);
        $this->call(MarketGallerySeeder::class);
        $this->call(FestivalContentSeeder::class);
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(AcademyFormFieldSeeder::class);
    }
}
