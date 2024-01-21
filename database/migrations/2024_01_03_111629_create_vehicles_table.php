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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->timestamps(0);
            $table->string('nomor_plat')->nullable();
            $table->string('tahun')->nullable();
            $table->string('model_kendaraan')->nullable();
            $table->string('vendor_kendaraan')->nullable();
            $table->string('brand_kendaraan');
            $table->string('expire_tax')->nullable();
            $table->string('expire_plat')->nullable();
            $table->string('expire_kir')->nullable();
            $table->bigInteger('last_oddo')->nullable();
            $table->integer('gasoline_id')->nullable();
            $table->integer('type_vehicles_id')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('is_available')->default(1);
            $table->tinyInteger('is_service')->default(0);
            $table->tinyInteger('is_pickup')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
