<?php

namespace App\Models;

use App\Enums\StatusCall;
use App\Enums\TypeCall;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Call extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'type',
        'start_date',
        'end_date',
        'requirements',
        'status',
        'application_url',
        'contact_person',
    ];

    protected function casts(): array
    {
        return [
            'application_url' => 'string',
            'type' => TypeCall::class,
            'status' => StatusCall::class,
        ];
    }
}
