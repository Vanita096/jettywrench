<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Support\Facades\Cache;

class Region extends Model
{
    use Sluggable, NodeTrait {
        Sluggable::replicate insteadof NodeTrait;
    }

    public $timestamps = false;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'unique' => false,
            ]
        ];
    }

    public function getTypeAttribute()
    {
        $types = Cache::rememberForever('region_types', function() {
            return RegionType::all();
        });

        return $types->find($this->type_id);
    }
}
