<?php

namespace App;

use App\model\Gender;
use App\model\UserCover;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','username','cover_id', 'email', 'password','gender_id','phone','img','company','role_id','is_active'
    ];

    public function users(){
        return $this->belongsTo(UserCover::class,'cover_id','id');
    }
    public function genders(){
        return $this->belongsTo(Gender::class,'gender_id','id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
