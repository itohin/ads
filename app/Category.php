<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use NodeTrait;

    protected $fillable = ['name', 'slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeWithListingsInRegion($query, Region $region)
    {
        return $query->with(['listings' => function ($query) use ($region) {
            $query->isLive()->inRegion($region);
        }]);
    }

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
}
