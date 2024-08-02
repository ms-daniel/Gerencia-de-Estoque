<?php

namespace App\Models;

use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;

class PersonalAccessToken extends SanctumPersonalAccessToken
{
    protected $fillable = [
        'name', 'token', 'abilities', 'last_used_at',
        'created_at', 'updated_at', 'tokenable_id'
    ];

    protected $hidden = [
        'tokenable_type'
    ];
}
