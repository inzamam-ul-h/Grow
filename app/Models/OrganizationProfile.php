<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'register_no',
        'contact',
        'updated_by',
        'user_id',
    ];

    // Define the inverse relationship with users
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
