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
        Schema::create('lectures', function (Blueprint $table) {
            $table->id();
            $table->string('lecture_name');
            $table->text('lecture_description')->nullable();
            $table->unsignedBigInteger('topic_id');
            // $table->string('lecture_file')->nullable();
            $table->string('lecture_video')->nullable();

            $table->string('lecture_status')->default('1');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lectures');
    }
};
