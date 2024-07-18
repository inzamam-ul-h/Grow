<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'course_name',
        'course_description',
        'intro_video',
        'status',
        'category_id',
        'course_type',
        'course_image',
        'course_icon',
        'price',
        'subCategory_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Category::class,'subCategory_id');
    }


    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }


    public function organizationCourses()
    {
        return $this->hasMany(Organization_courses::class, 'course_id');
    }

    public function employeeCourses()
    {
        return $this->hasMany(employee_courses::class, 'course_id');
    }
}
