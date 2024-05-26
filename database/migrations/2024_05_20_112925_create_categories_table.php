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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_name');
            $table->text('category_description')->nullable();
            $table->string('category_image')->nullable();
            $table->string('category_icon')->nullable();
            $table->enum('category_status', ['active', 'inactive'])->default('active');
            $table->unsignedBigInteger('parent_category_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('parent_category_id')->references('id')->on('categories')->onDelete('cascade');//store sub category of courses 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
