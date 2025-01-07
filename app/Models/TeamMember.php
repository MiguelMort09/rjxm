<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TeamMember extends Model
{
    protected $fillable = [
        'name',
        'position',
        'biography',
        'photo',
        'email',
        'phone',
    ];

    public function socialLinks(): HasMany
    {
        return $this->hasMany(SocialLink::class);
    }
}
