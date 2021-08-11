<?php

namespace App\Models;

use App\Models\Traits\HasPrice;
use App\Tenant\Traits\ForTenants;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Product extends Model implements HasMedia
{
    use ForTenants, HasPrice, HasMediaTrait;

    protected $fillable = ['name', 'price', 'unit'];

    public function variations()
    {
        return $this->hasMany(ProductVariation::class)->orderBy('sort_order', 'asc');
    }
    public function packages()
    {
        return $this->hasMany(ProductPackage::class);
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('large')
            ->width(400)
            ->height(400)
            ->performOnCollections('images');

        $this->addMediaConversion('medium')
            ->width(200)
            ->height(200)
            ->performOnCollections('images');

        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(100)
            ->performOnCollections('images');

    }

}
