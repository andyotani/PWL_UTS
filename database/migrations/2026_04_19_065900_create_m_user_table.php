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
Schema::create('m_user', function (Blueprint $table) {
    $table->id('user_id');

    $table->unsignedBigInteger('level_id')->default(1);

    $table->string('email', 100)->unique();
    $table->string('username', 50)->unique()->default('admin');
    $table->string('nama', 100)->default('Administrator');

    $table->string('password');

    $table->timestamps();

    $table->foreign('level_id')
        ->references('level_id')
        ->on('m_level')
        ->cascadeOnDelete();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_user');
    }
};
