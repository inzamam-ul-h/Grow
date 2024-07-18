<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'category_name',
        'category_description',
        'category_image',
        'category_icon',
        'category_status',
        'parent_category_id',
        'updated_by',
    ];

    // Parent category relationship
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }

    // Subcategories relationship
    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_category_id');
    }


    public function courses()
    {
        return $this->hasMany(Course::class,'category_id');
    }

}
