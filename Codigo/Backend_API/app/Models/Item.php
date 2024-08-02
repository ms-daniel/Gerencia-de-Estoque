<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Sanctum\HasApiTokens;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'description', 'category_id', 'store_id'];

    public function stocks(): HasMany
    {
        return $this->hasMany(Stock::class);
    }

    public function itemSubcategories(): HasMany
    {
        return $this->HasMany(ItemSubcategory::class);
    }

    public function itemSuppliers(): HasMany
    {
        return $this->HasMany(ItemSupplier::class);
    }

    public function category(): HasOne
    {
        return $this->HasOne(Category::class);
    }

}
