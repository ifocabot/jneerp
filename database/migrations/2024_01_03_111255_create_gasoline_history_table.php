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
        Schema::create('gasoline_history', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicles_id');
            $table->integer('users_id');
            $table->integer('gasoline_id');
            $table->integer('oddo_terakhir');
            $table->integer('total_pembelian');
            $table->float('total_liter');
            $table->string('lokasi_pengisian', 11)->nullable();
            $table->integer('total_penggunaan');
            $table->float('ratio');
            $table->text('foto_struk');
            $table->date('tanggal')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gasoline_history');
    }
};
