<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $appends = [
        'is_admin',
        'is_teacher',
        'is_student',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getIsAdminAttribute()
    {
        return !is_null( $this->roles()->where('role_id', 1)->first() );
    }

    public function getIsTeacherAttribute()
    {
        return !is_null( $this->roles()->where('role_id', 2)->first() );
    }

    public function getIsStudentAttribute()
    {
        return !is_null( $this->roles()->where('role_id', 3)->first() );
    }
    
    public function clases()
    {
        return $this->belongsToMany(Clase::class);
    }
}
