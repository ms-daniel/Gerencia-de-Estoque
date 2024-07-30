<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['item_id','price', 'quantity', 'manufactured', 'validity'];

    use HasFactory;
}
