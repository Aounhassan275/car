<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('chassis_no')->nullable();
            $table->float('price');
            $table->string('condition')->nullable();
            $table->string('year')->nullable();
            $table->string('mileage')->nullable();
            $table->string('engine')->nullable();
            $table->string('cylinder')->nullable();
            $table->string('exterior_color')->nullable();
            $table->string('interior_color')->nullable();
            $table->string('fuel_type')->nullable();
            $table->string('transmission')->nullable();
            $table->text('description')->nullable();
            $table->boolean('air_conditioning')->default(0)->nullable();
            $table->boolean('power_window')->default(0)->nullable();
            $table->boolean('power_mirror')->default(0)->nullable();
            $table->boolean('central_locking')->default(0)->nullable();
            $table->boolean('airbag')->default(0)->nullable();
            $table->boolean('anti_theft_system')->default(0)->nullable();
            $table->boolean('power_steering')->default(0)->nullable();
            $table->boolean('anti_brake_system')->default(0)->nullable();
            $table->boolean('tv')->default(0)->nullable();
            $table->boolean('trip_speedometer')->default(0)->nullable();
            $table->boolean('speedometer_light')->default(0)->nullable();
            $table->boolean('front_headlights_button')->default(0)->nullable();
            $table->boolean('vehicle_assist')->default(0)->nullable();
            $table->boolean('eco_mode_engine')->default(0)->nullable();
            $table->boolean('hd_navigation')->default(0)->nullable();
            $table->boolean('handle_right')->default(0)->nullable();
            $table->boolean('aux')->default(0)->nullable();
            $table->boolean('alloy_wheels')->default(0)->nullable();
            $table->boolean('new_tires_sport')->default(0)->nullable();
            $table->boolean('car_navigation')->default(0)->nullable();
            $table->boolean('back_monitor_camera')->default(0)->nullable();
            $table->boolean('fresh_interior')->default(0)->nullable();
            $table->boolean('neat_clean_seats')->default(0)->nullable();
            $table->boolean('dvd_options')->default(0)->nullable();
            $table->boolean('remote_entry')->default(0)->nullable();
            $table->boolean('discharged_lamp')->default(0)->nullable();
            $table->boolean('aluminum_foil')->default(0)->nullable();
            $table->boolean('drive_system')->default(0)->nullable();
            $table->boolean('power_outlet')->default(0)->nullable();
            $table->boolean('video_input')->default(0)->nullable();
            $table->boolean('tyres_condition')->default(0)->nullable();
            $table->boolean('exterior_and_interior_condition')->default(0)->nullable();
            $table->unsignedBigInteger('make_id')->nullable();
            $table->foreign('make_id')->references('id')->on('car_models')->onDelete('cascade');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
