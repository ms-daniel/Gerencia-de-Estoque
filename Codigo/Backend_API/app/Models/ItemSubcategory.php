<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ItemSubcategory extends Model
{
    protected $fillable = ['item_id', 'sub_category_id'];

    // public function item(): HasOne
    // {
    //     return $this->hasOne(Item::class);
    // }

    // public function subCategory(): HasOne
    // {
    //     return $this->hasOne(Subcategory::class);
    // }

    use HasFactory;
}
