<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'title',
        'bio',
        'education',
        'phone',
        'email',
        'address',
        'tagline',
    ];
}
