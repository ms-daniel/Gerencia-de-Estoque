<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMovements extends Model
{
    protected $fillable = ['stock_id', 'movement_type', 'quantity'];

    use HasFactory;
}
