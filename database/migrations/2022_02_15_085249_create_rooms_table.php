<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration {
    /**
     * Run the migrations.
     * @return void
     */
    public function up() {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 20)->unique();
        });

        DB::table('rooms')->insert([
            ['name' => 'B1-01'],
            ['name' => 'B1-02'],
            ['name' => 'B1-03'],
            ['name' => 'B1-04'],
            ['name' => 'B1-05'],
            ['name' => 'B1-06'],
            ['name' => 'B1-07']
        ]);
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down() {
        Schema::dropIfExists('rooms');
    }
}
