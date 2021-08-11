<?php

namespace App\Models;

use App\Tenant\Models\Tenant;
use App\Tenant\Traits\ForSystem;
use App\Tenant\Traits\IsTenant;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Organization extends Model implements Tenant, HasMedia
{
    use IsTenant, ForSystem, HasMediaTrait;

    protected $fillable = [
        'name',
        'subdomain',
        'description',
        'website',
        'uuid'
    ];

    // make subdomains lower-case before insertion
    public function setSubdomainAttribute($value)
    {
        $this->attributes['subdomain'] = strtolower($value);
    }

    public function getWorkspaceAttribute()
    {
        return route('tenant.public.home', $this->attributes['subdomain']);
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(30)
            ->height(30)
            ->performOnCollections('logos');

        $this->addMediaConversion('profile')
            ->width(200)
            ->height(200)
            ->performOnCollections('logos');

    }

}
