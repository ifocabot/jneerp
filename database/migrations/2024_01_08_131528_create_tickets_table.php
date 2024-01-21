<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('owner_id')->nullable();
            $table->integer('target_id')->nullable();
            $table->integer('guest_id')->nullable();
            $table->integer('is_it_guest')->nullable();
            $table->integer('cc')->nullable();
            $table->string('subject');
            $table->integer('ticket_status_id');
            $table->integer('help_topic_id')->nullable();
            $table->integer('department_id');
            $table->integer('type_id');
            $table->integer('assigned_id');
            $table->integer('priority_id');
            $table->text('description');
            $table->date('due_date');
            $table->integer('is_it_accepted')->default('0');
            $table->timestamp('accepted_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
