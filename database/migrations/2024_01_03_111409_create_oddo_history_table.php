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
        Schema::create('oddo_history', function (Blueprint $table) {
            $table->id();
            $table->timestamps(0);
            $table->integer('users_id');
            $table->integer('oddoout_id')->nullable();
            $table->integer('oddoin_id')->nullable();
            $table->integer('vehicles_id')->nullable();
            $table->bigInteger('total_kilometer')->nullable();
            $table->float('convert_bensin')->nullable();
            $table->bigInteger('cost')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oddo_history');
    }
};
