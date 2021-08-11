<?php

namespace App\Models\Traits;

use App\Cart\Money;

trait HasPrice
{
    public function getPriceAttribute($value)
    {
        return $value ? new Money($value) : null;
    }

    public function getFormattedPriceAttribute()
    {
        return optional($this->price)->formatted();
    }

    public function getFormattedPriceUnitAttribute()
    {
        return $this->formatted_price . ' ' . ($this->unit ? '/ '. $this->unit : '');
    }

    public function getFormattedAmountAttribute()
    {
        return $this->price ? number_format(optional($this->price)->amount() / 100, 2) : null;
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value ? $value * 100 : null;
    }
}