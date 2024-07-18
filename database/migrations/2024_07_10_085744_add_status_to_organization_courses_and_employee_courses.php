
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToOrganizationCoursesAndEmployeeCourses extends Migration
{
    public function up()
    {
        Schema::table('organization_courses', function (Blueprint $table) {
            $table->string('status')->default('1');
        });

        Schema::table('employee_courses', function (Blueprint $table) {
            $table->string('status')->default('1');
        });
    }

    public function down()
    {
        Schema::table('organization_courses', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('employee_courses', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
