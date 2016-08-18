<?php

use App\Color;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table for storing colors
        Schema::create('colors', function (Blueprint $table) {
            $table->string('name')->primary();
        });

        // Create colors
        Color::create(['name' => 'red']);
        Color::create(['name' => 'orange']);
        Color::create(['name' => 'yellow']);
        Color::create(['name' => 'olive']);
        Color::create(['name' => 'green']);
        Color::create(['name' => 'teal']);
        Color::create(['name' => 'blue']);
        Color::create(['name' => 'violet']);
        Color::create(['name' => 'purple']);
        Color::create(['name' => 'pink']);
        Color::create(['name' => 'brown']);
        Color::create(['name' => 'grey']);
        Color::create(['name' => 'black']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('colors');
    }
}
