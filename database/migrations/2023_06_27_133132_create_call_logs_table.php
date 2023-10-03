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
        Schema::create('call_logs', function (Blueprint $table) {
            $table->id();

            $table->string('caller_phonenumber')->nullable();
            $table->string('callee_phonenumber')->nullable();
            $table->string('call_id')->nullable();
            $table->foreignId('user_id')->index();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onCascade('delete');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('call_logs');
    }
};
