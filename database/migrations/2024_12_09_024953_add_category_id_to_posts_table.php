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
           Schema::table('posts', function (Blueprint $table) {
                $table->unsignedBigInteger('category_id')->nullable(); // Tạo cột khóa ngoại
                $table->foreign('category_id') // Thêm ràng buộc khóa ngoại
                      ->references('id')->on('categories') // Liên kết với cột `id` của bảng `categories`
                      ->onDelete('cascade'); // Xóa cascade nếu cần
            });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
            Schema::table('posts', function (Blueprint $table) {
                $table->dropForeign(['category_id']); // Xóa ràng buộc khóa ngoại
                $table->dropColumn('category_id'); // Xóa cột
            });
       
    }
};
