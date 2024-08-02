<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Supplier extends Model
{
    protected $fillable = ['name', 'phone', 'email', 'user_id'];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    use HasFactory;
}
