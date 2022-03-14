<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateMeasuresTable extends Migration {
    /**
     * Run the migrations.
     * @return void
     */
    public function up() {
        Schema::create('measures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('temperature');
            $table->float('humidity');
            $table->unsignedBigInteger('time');
            $table->unsignedBigInteger('id_device');
            $table->unsignedBigInteger('id_room');
        });

        Schema::table('measures', function (Blueprint $table) {
            $table->foreign('id_device')->references('id')->on('devices');
            $table->foreign('id_room')->references('id')->on('rooms');
        });

        DB::table('measures')->insert([
            ['temperature' => 25.4, 'humidity' => 17, 'time' => 1646697600, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 25.3, 'humidity' => 18, 'time' => 1646701200, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 25.2, 'humidity' => 18, 'time' => 1646704800, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 25.1, 'humidity' => 18, 'time' => 1646708400, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 25.0, 'humidity' => 18, 'time' => 1646712000, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 24.9, 'humidity' => 18, 'time' => 1646715600, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 24.8, 'humidity' => 19, 'time' => 1646719200, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 24.7, 'humidity' => 19, 'time' => 1646722800, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 24.5, 'humidity' => 18, 'time' => 1646726400, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 24.5, 'humidity' => 17, 'time' => 1646730000, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 25.6, 'humidity' => 15, 'time' => 1646733600, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 26.0, 'humidity' => 12, 'time' => 1646737200, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 27.3, 'humidity' => 12, 'time' => 1646740800, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 28.2, 'humidity' => 14, 'time' => 1646744400, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 27.8, 'humidity' => 12, 'time' => 1646748000, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 27.5, 'humidity' => 14, 'time' => 1646751600, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 27.5, 'humidity' => 12, 'time' => 1646755200, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 26.2, 'humidity' => 13, 'time' => 1646758800, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 22.9, 'humidity' => 16, 'time' => 1646762400, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 25.0, 'humidity' => 17, 'time' => 1646766000, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 25.3, 'humidity' => 17, 'time' => 1646769600, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 25.3, 'humidity' => 17, 'time' => 1646773200, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 25.3, 'humidity' => 18, 'time' => 1646776800, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 25.2, 'humidity' => 18, 'time' => 1646780400, 'id_device' => 1, 'id_room' => 5],


            ['temperature' => 25.1, 'humidity' => 19, 'time' => 1646784000, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 25.0, 'humidity' => 19, 'time' => 1646787600, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 24.9, 'humidity' => 19, 'time' => 1646791200, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 24.8, 'humidity' => 19, 'time' => 1646794800, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 24.8, 'humidity' => 19, 'time' => 1646798400, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 24.7, 'humidity' => 20, 'time' => 1646802000, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 24.7, 'humidity' => 20, 'time' => 1646805600, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 24.6, 'humidity' => 20, 'time' => 1646809200, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 24.5, 'humidity' => 19, 'time' => 1646812800, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 24.5, 'humidity' => 19, 'time' => 1646816400, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 25.4, 'humidity' => 21, 'time' => 1646820000, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 27.2, 'humidity' => 16, 'time' => 1646823600, 'id_device' => 1, 'id_room' => 5],
            ['temperature' => 27.3, 'humidity' => 16, 'time' => 1646820000, 'id_device' => 1, 'id_room' => 5],
        ]);
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down() {
        Schema::dropIfExists('measures');
    }
}
