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
        Schema::create('image_post', function (Blueprint $table) {
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->foreignId('image_id')->constrained()->onDelete('cascade');
            $table->integer('position')->nullable(); // Tuỳ chọn: thêm thứ tự hình ảnh
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_post');
    }
};
