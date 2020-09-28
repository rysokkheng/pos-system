<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $table = 'gender';
    protected $fillable = [
        'id',
        'name_en',
        'name_kh',
    ];
}
