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
        Schema::create('oddoin', function (Blueprint $table) {
            $table->id();
            $table->timestamps(0);
            $table->bigInteger('oddo_meter_in');
            $table->string('foto_oddo_in');
            $table->integer('areas_id');
            $table->text('keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oddoin');
    }
};
