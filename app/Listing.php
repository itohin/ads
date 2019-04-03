<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Eloquent\{OrderableTrait, PivotOrderableTrait};

class Listing extends Model
{
    use SoftDeletes, OrderableTrait, PivotOrderableTrait;

    public function scopeIsLive($query)
    {
        return $query->where('live', true);
    }

    public function scopeIsNotLive($query)
    {
        return $query->where('live', false);
    }

    public function scopeFromCategory($query, Category $category)
    {
        return $query->where('category_id', $category->id);
    }

    public function scopeInRegion($query, Region $region)
    {
        return $query->whereIn('region_id', array_merge([$region->id], $region->descendants()->pluck('id')->toArray()));
    }

    public function live()
    {
        return $this->live;
    }

    public function cost()
    {
        return $this->category->price;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function favorites()
    {
        return $this->morphToMany(User::class, 'favoritable');
    }

    public function favoritedBy(User $user)
    {
        return $this->favorites->contains($user);
    }
}
