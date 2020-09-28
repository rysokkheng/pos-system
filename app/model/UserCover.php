<?php
namespace App\model;

use Illuminate\Database\Eloquent\Model;

class UserCover extends Model
{
    protected $table='user_cover';
    protected $fillable = [
        'id',
        'base_name',
    ];
}
