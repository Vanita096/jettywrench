<?php

namespace App\Models;

use App\Models\Traits\HasPrice;
use App\Tenant\Traits\ForTenants;
use Illuminate\Database\Eloquent\Model;
use App\Cart\Money;

class ProductVariation extends Model
{
    use ForTenants, HasPrice;

    protected $fillable = ['name', 'price', 'product_variation_type_id', 'unit'];

    public function getPriceAttribute($value)
    {
        if ($value === null) {
            return $this->product->price;
        }

        return new Money($value);
    }

    public function getUnitAttribute($value)
    {
        if ($value === null) {
            return $this->product->unit;
        }

        return $value;
    }

    public function priceVariesFromParent()
    {
        return $this->price->amount() !== $this->product->price->amount();
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function type()
    {
        return $this->hasOne(ProductVariationType::class, 'id', 'product_variation_type_id');
    }

    public function ingredients(){
        return $this->belongsToMany(Ingredient::class, 'product_variation_ingredient')->withPivot('sort_order')->orderBy('pivot_sort_order', 'asc');
    }

}
