<?php
namespace Database\Seeders;

use App\Models\Device;
use App\Models\Room;
use App\Models\Measure;
use Illuminate\Database\Seeder;

class ThermometreSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Device::factory()->count(5)->create();
        Room::factory()->count(5)->create();
        Measure::factory()->count(50)->create();
    }
}
