<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'usertype',
        'reference_id',
        'updated_by',
        'deleted_at',
        'status'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function updatedQuizzes()
    {
        return $this->hasMany(Quiz::class, 'updated_by');
    }

    public function organizationProfile()
    {
        return $this->hasOne(OrganizationProfile::class);
    }

    public function employeeProfile()
    {
        return $this->hasOne(EmployeeProfile::class);
    }


      // Relationship with organization courses
      public function organizationCourses()
      {
          return $this->hasMany(Organization_courses::class, 'user_id');
      }

      // Relationship with courses updated by
      public function updatedBy()
      {
          return $this->belongsTo(User::class, 'updated_by');
      }


      // Relationship with employee courses
      public function employeeCourses()
      {
          return $this->hasMany(employee_courses::class, 'user_id');
      }


      public function assignmentSubmissions()
      {
          return $this->hasMany(AssignmentSubmission::class, 'user_id');
      }

      public function updatedQuestions()
      {
          return $this->hasMany(Question::class, 'updated_by');
      }


      public function atemptQuizzes()
    {
        return $this->hasMany(AtemptQuiz::class);
    }
}
