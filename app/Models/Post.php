<?php

namespace App\Models;

use App\Enums\StatusPost;
use App\Enums\TypePost;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
        'type',
        'cover_image',
        'is_featured'
    ];


    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected function casts(): array
    {
        return [
            'status' => StatusPost::class,
            'type' => TypePost::class,
        ];
    }
}
