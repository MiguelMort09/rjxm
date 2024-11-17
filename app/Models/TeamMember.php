<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'name',
        'position',
        'biography',
        'photo',
        'email',
        'phone',
        'social_links'
    ];
}
