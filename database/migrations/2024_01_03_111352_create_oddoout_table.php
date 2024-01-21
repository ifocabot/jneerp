<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('oddoout', function (Blueprint $table) {
            $table->id();
            $table->timestamps(0);
            $table->bigInteger('oddo_meter_out')->nullable();
            $table->string('foto_oddo_out')->nullable();
            $table->string('areas_id')->nullable();
            $table->string('vehicles_id')->nullable();
            $table->string('safetytools_id')->nullable();
            $table->integer('area_awal_id')->nullable();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oddoout');
    }
};
