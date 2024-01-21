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
        Schema::create('type_vehicles', function (Blueprint $table) {
            $table->id();
            $table->timestamps(0);
            $table->string('nama_tipe');
            $table->integer('ratio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_vehicles');
    }
};
