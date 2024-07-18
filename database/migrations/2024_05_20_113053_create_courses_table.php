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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_name');
            $table->text('course_description')->nullable();
            $table->string('intro_video')->nullable();
            $table->string('status')->default('1');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subCategory_id')->nullable();
            $table->string('course_type');
            $table->string('course_image')->nullable();
            $table->string('course_icon')->nullable();
            $table->float('price');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('subCategory_id')->references('id')->on('categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
