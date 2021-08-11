<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    protected $fillable = ['name', 'code'];

    public $timestamps = false;

    public function countries()
    {
        return $this->hasMany(Country::class);
    }
}
