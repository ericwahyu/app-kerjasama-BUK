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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id');
            $table->string('agency');
            $table->string('number')->nullable();
            $table->text('title')->nullable();
            $table->string('faculty')->nullable();
            $table->string('course')->nullable();
            $table->text('description')->nullable();
            $table->text('file')->nullable();
            $table->text('partner')->nullable();
            $table->text('activity')->nullable();
            $table->enum('status', ['aktif', 'kadaluarsa'])->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
