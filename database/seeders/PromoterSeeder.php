<?php

namespace Database\Seeders;

use App\Models\Promoter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromoterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Iron Gate Events
        Promoter::create([
            'name' => 'Iron Gate Events',
            'type' => 'indie',
            'bio' => 'A scrappy independent promoter focused on rock, metal, and mid-sized destination festivals.',
            'starting_cash' => 250000.00, // 250K
            'current_cash' => 250000.00, // 250K
            'reputation' => 12,
            'experience' => 10,
            'is_player_controlled' => false,
            'founded_at' => '2018-03-15',
            'status' => 'active',
        ]);

        // Black Harbor Promotions
        Promoter::create([
            'name' => 'Black Harbor Promotions',
            'type' => 'regional',
            'bio' => 'A respected regional organizer known for dependable touring circuits and strong venue partnerships.',
            'starting_cash' => 800000.00, // 800K
            'current_cash' => 800000.00, // 800K
            'reputation' => 28,
            'experience' => 25,
            'is_player_controlled' => false,
            'founded_at' => '2009-06-22',
            'status' => 'active',
        ]);

        // Skyline Live Group
        Promoter::create([
            'name' => 'Skyline Live Group',
            'type' => 'national',
            'bio' => 'A growing national promoter with a strong presence in major festivals, amphitheaters, and touring events.',
            'starting_cash' => 5000000.00, // 5M
            'current_cash' => 5000000.00, // 5M
            'reputation' => 55,
            'experience' => 50,
            'is_player_controlled' => false,
            'founded_at' => '1998-09-10',
            'status' => 'active',
        ]);

        // Apex Entertainment Group
        Promoter::create([
            'name' => 'Apex Entertainment Group',
            'type' => 'national',
            'bio' => 'A polished entertainment company specializing in premium festivals, arena tours, and large-scale event operations.',
            'starting_cash' => 12000000.00, // 12M
            'current_cash' => 12000000.00, // 12M
            'reputation' => 75,
            'experience' => 75,
            'is_player_controlled' => false,
            'founded_at' => '1987-04-18',
            'status' => 'active',
        ]);

        // WorldStage Live
        Promoter::create([
            'name' => 'WorldStage Live',
            'type' => 'global',
            'bio' => 'The dominant global promoter, known for flagship festivals, international tours, and premier venue relationships.',
            'starting_cash' => 50000000.00, // 50M
            'current_cash' => 50000000.00, // 50M
            'reputation' => 95,
            'experience' => 100,
            'is_player_controlled' => false,
            'founded_at' => '1974-11-01',
            'status' => 'active',
        ]);
    }
}
