<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasOne;

class Store extends Model
{
    protected $fillable = ['name', 'street', 'city', 'state', 'country', 'postal_code', 'user_id'];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    use HasFactory;
}
