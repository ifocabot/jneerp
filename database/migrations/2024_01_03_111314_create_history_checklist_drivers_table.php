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
        Schema::create('history_checklist_drivers', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id')->nullable();
            $table->integer('vehicles_id')->nullable();
            $table->integer('kondisi_body');
            $table->integer('kondisi_lampu_depan');
            $table->integer('kondisi_lampu_belakang');
            $table->integer('kondisi_ban');
            $table->integer('kondisi_ban_serep');
            $table->integer('kondisi_kaca');
            $table->text('keterangan')->nullable();
            $table->timestamps(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_checklist_drivers');
    }
};
