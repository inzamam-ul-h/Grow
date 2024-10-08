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
        Schema::table('employee_profiles', function (Blueprint $table) {
            $table->softDeletes(); // This will add the 'deleted_at' column
        });
    }

    public function down()
    {
        Schema::table('employee_profiles', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
