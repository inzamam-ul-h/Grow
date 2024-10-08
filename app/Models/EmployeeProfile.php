<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeProfile extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'address',
        'post',
        'qualification',
        'experence',
        'deleted_at',
        'updated_by',
        'user_id',
    ];

    // Define the inverse relationship with users
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
