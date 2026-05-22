<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Promoter;
use App\Models\Venue;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $promoters = Promoter::orderByDesc('reputation')
            ->take(3)
            ->get();

        foreach ($promoters as $promoter) {
            $venue = Venue::query()->inRandomOrder('')->first();

            Event::create([
                'name' => $promoter->name . ' Presents',
                'type' => 'festival',
                'bio' => 'A flagship event promoted by ' . $promoter->name . '.',
                'promoter_id' => $promoter->id,
                'venue_id' => $venue->id,
                'starts_at' => now()->addMonths(rand(1, 6))->startOfDay(),
                'duration' => rand(2, 4),
                'expected_attendance' => rand(25000, 70000),
                'actual_attendance' => 0,
                'base_ticket_price' => rand(149, 249) . '.00',
                'vip_ticket_price' => rand(299, 599) . '.00',
                'production_cost' => rand(250000, 900000) . '.00',
                'marketing_cost' => rand(50000, 180000) . '.00',
                'staffing_cost' => rand(30000, 100000) . '.00',
                'misc_cost' => rand(10000, 50000) . '.00',
                'revenue' => '0.00',
                'profit' => '0.00',
                'status' => 'planning',
                'prestige' => $promoter->reputation,
                'fan_satisfaction' => 0,
                'is_recurring' => true,
                'is_active' => true,
            ]);
        }
    }
}
